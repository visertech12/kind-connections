<?php

namespace App\Http\Controllers\User;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\GatewayCurrency;
use App\Models\SupportTicket;
use App\Models\Transaction;
use App\Models\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->checkAndCreateInvoiceTables();
    }

    private function checkAndCreateInvoiceTables()
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('invoices')) {
            \Illuminate\Support\Facades\Schema::create('invoices', function ($table) {
                $table->id();
                $table->integer('user_id')->unsigned()->default(0);
                $table->string('invid', 40)->unique();
                $table->decimal('amount', 28, 8)->default(0);
                $table->decimal('paid', 28, 8)->default(0);
                $table->tinyInteger('status')->default(0)->comment('0: unpaid, 1: paid, 2: partial');
                $table->string('invoice_for', 100)->nullable();
                $table->timestamps();
            });
        }
        if (!\Illuminate\Support\Facades\Schema::hasTable('invoice_items')) {
            \Illuminate\Support\Facades\Schema::create('invoice_items', function ($table) {
                $table->id();
                $table->unsignedBigInteger('invoice_id');
                $table->string('description', 255)->nullable();
                $table->text('details')->nullable();
                $table->decimal('amount', 28, 8)->default(0);
                $table->timestamps();
            });
        }
        if (!\Illuminate\Support\Facades\Schema::hasColumn('deposits', 'invoice_id')) {
            \Illuminate\Support\Facades\Schema::table('deposits', function ($table) {
                $table->integer('invoice_id')->unsigned()->default(0)->after('user_id');
            });
        }
    }

    /*--------------------------------------------------
     | Profile Completion / Authorization
     *-------------------------------------------------*/
    public function authorization()
    {
        if (auth('web')->user()->profile_complete == 1) {
            return redirect()->route('user.home');
        }
        $page_title = 'Complete Profile';
        return view('user.authorization.profile', compact('page_title'));
    }

    public function authorizationSubmit(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'country'  => 'required',
            'mobile'   => 'required',
            'address'  => 'required',
            'city'     => 'required',
            'region'   => 'required',
            'zip_code' => 'required',
            'username' => 'required|unique:users,username,' . auth('web')->id(),
        ]);

        $user = auth('web')->user();
        $user->mobile           = $request->mobile;
        $user->address          = [
            'address' => $request->address,
            'city'    => $request->city,
            'state'   => $request->region,
            'zip'     => $request->zip_code,
            'country' => $request->country,
        ];
        $user->username         = $request->username;
        $user->profile_complete = 1;
        $user->save();

        return redirect()->route('user.home')->with('success', 'Profile completed successfully.');
    }

    /*--------------------------------------------------
     | Dashboard
     *-------------------------------------------------*/
    public function dashboard()
    {
        $user = auth('web')->user();

        // Support tickets
        $tickets      = SupportTicket::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        $activeTicket = $tickets->where('status', '!=', 3)->count();

        // Latest transactions & logins
        $transactions = Transaction::where('user_id', $user->id)->latest()->take(8)->get();
        $logins       = UserLogin::where('user_id', $user->id)->latest()->take(5)->get();

        // Gateway currencies for deposit modal
        $gatewayCurrency = GatewayCurrency::whereHas('method', fn($q) => $q->where('status', 1))
            ->with('method')
            ->get();

        // Safe defaults for optional models
        $invoicePending     = false;
        $renewEnvatoSupport = false;
        $renewDirectSupport = false;
        $latestPurchase     = collect();

        $stat = [
            'envato'      => 0,
            'direct'      => 0,
            'mktorder'    => 0,
            'domain'      => 0,
            'hosting'     => 0,
            'deposit'     => 0,
            'invoice'     => 0,
            'transaction' => Transaction::where('user_id', $user->id)->count(),
        ];

        if (class_exists(\App\Models\EnvatoPurchase::class)) {
            $ep                 = \App\Models\EnvatoPurchase::where('user_id', $user->id)->get();
            $stat['envato']     = $ep->count();
            $renewEnvatoSupport = $ep->filter(fn($p) => $p->supported_until && $p->supported_until < now())->count();
            $latestPurchase     = $ep->sortByDesc('id')->take(5);
        }

        $dpInvoices = \App\Models\Invoice::where('user_id', $user->id)
            ->where('invoice_for', 'Digital Product Purchase')
            ->where('status', 1)
            ->with('items')
            ->get();
            
        $stat['direct'] = $dpInvoices->count();
        $renewDirectSupport = 0;
        foreach($dpInvoices as $dp) {
            $hasExtendedSupport = $dp->items->contains('description', 'Extended Support (6 months)');
            $supportMonths = $hasExtendedSupport ? 12 : 6;
            $supportedUntil = \Carbon\Carbon::parse($dp->created_at)->addMonths($supportMonths);
            if($supportedUntil->isPast()) {
                $renewDirectSupport++;
            }
        }
        $latestPurchase = $dpInvoices->sortByDesc('id')->take(5);

        if (class_exists(\App\Models\MarketingOrder::class)) {
            $stat['mktorder'] = \App\Models\MarketingOrder::where('user_id', $user->id)->count();
        }

        if (class_exists(\App\Models\Domain::class)) {
            $stat['domain'] = \App\Models\Domain::where('user_id', $user->id)->count();
        }

        if (class_exists(\App\Models\Hosting::class)) {
            $stat['hosting'] = \App\Models\Hosting::where('user_id', $user->id)->count();
        }

        if (class_exists(\App\Models\Deposit::class)) {
            $stat['deposit'] = \App\Models\Deposit::where('user_id', $user->id)->count();
        }

        if (class_exists(\App\Models\Invoice::class)) {
            $stat['invoice'] = \App\Models\Invoice::where('user_id', $user->id)->count();
            $invoicePending  = \App\Models\Invoice::where('user_id', $user->id)->where('status', 'unpaid')->exists();
        }

        return view('user.dashboard', compact(
            'user', 'tickets', 'activeTicket', 'transactions', 'logins',
            'gatewayCurrency', 'stat', 'latestPurchase',
            'invoicePending', 'renewEnvatoSupport', 'renewDirectSupport'
        ));
    }

    public function ticketIndex() { return redirect()->back()->with('error', 'Not implemented yet'); }
    public function ticketNew() { return redirect()->back()->with('error', 'Not implemented yet'); }
    public function ticketDetails($id) { return redirect()->back()->with('error', 'Not implemented yet'); }
    
    public function directPurchases() { 
        $pageTitle = 'Direct Purchases';
        $purchases = \App\Models\Invoice::where('user_id', auth()->id())
            ->where('invoice_for', 'Digital Product Purchase')
            ->where('status', 1)
            ->with('items')
            ->latest()
            ->paginate(15);
        return view('user.direct_purchases', compact('pageTitle', 'purchases')); 
    }

    public function directPurchaseDetails($invid) {
        $pageTitle = 'Purchase Details';
        $purchase = \App\Models\Invoice::where('user_id', auth()->id())
            ->where('invoice_for', 'Digital Product Purchase')
            ->where('invid', $invid)
            ->with('items')
            ->firstOrFail();
            
        return view('user.direct_purchase_details', compact('pageTitle', 'purchase'));
    }

    public function marketingOrders() { 
        $pageTitle = 'Marketing Orders';
        $orders = \App\Models\Invoice::where('id', '<', 0)->paginate(10); // Mock empty paginator
        return view('user.marketing.orders', compact('pageTitle', 'orders')); 
    }
    public function marketingDetails($id) {
        return redirect()->back()->with('error', 'Order not found');
    }
    public function domainList() { 
        $pageTitle = 'Domains';
        $domainCount = 0;
        $domains = [];
        $fakePage = \App\Models\Invoice::where('id', '<', 0)->paginate(10);
        return view('user.domain.list', compact('pageTitle', 'domainCount', 'domains', 'fakePage')); 
    }
    public function domainDetails($type, $id) {
        return redirect()->back()->with('error', 'Domain details not found');
    }
    public function hostingList() { 
        $pageTitle = 'Hosting';
        $hostingCount = 0;
        $hostings = [];
        $fakePage = \App\Models\Invoice::where('id', '<', 0)->paginate(10);
        return view('user.hosting.list', compact('pageTitle', 'hostingCount', 'hostings', 'fakePage')); 
    }
    public function hostingDetails($pid, $domain) {
        return redirect()->back()->with('error', 'Hosting details not found');
    }
    public function hostingCancel(\Illuminate\Http\Request $request) {
        return redirect()->back()->with('error', 'Cancel feature not implemented yet');
    }
    
    public function productOrder(\Illuminate\Http\Request $request, $slug)
    {
        // Log entry point
        \Illuminate\Support\Facades\Log::info('productOrder called', ['slug' => $slug, 'user' => auth()->id(), 'input' => $request->all()]);

        try {
            $product = \App\Models\Product::where('slug', $slug)->firstOrFail();
            
            $license = $request->input('license', '1');
            $extend_support = $request->boolean('extend_support');
            $install_service = $request->boolean('install_service');
            
            $pRegular = (float) $product->getOriginal('regular_price');
            $attrs    = $product->getOriginal('attributes');
            $attrs    = is_array($attrs) ? $attrs : (json_decode($attrs, true) ?: []);
            $pExtended = isset($attrs['Extended Price']) ? (float) $attrs['Extended Price'] : 0;
            $installFee = isset($attrs['Install Fee']) ? (float) $attrs['Install Fee'] : 19;

            $price = ($license == '1') ? $pRegular : ($pExtended > 0 ? $pExtended : $pRegular * 6);

            if ($price <= 0) {
                \Illuminate\Support\Facades\Log::warning('productOrder: price <= 0', ['slug' => $slug, 'price' => $price]);
                return redirect()->to(url()->previous())->with('error', 'This product has no price set. Please contact support.');
            }

            $supportPrice = $price * 0.3;
            $supportPromo  = $supportPrice * 0.8;

            // Total: license price (regular or extended) + optional extended support
            $licensePrice = $price; // already set to pExtended when license==2
            $total = $licensePrice;
            if ($extend_support) {
                $total += $supportPromo;
            }
            if ($install_service) {
                $total += $installFee;
            }

            // Create Invoice
            $invoice = new \App\Models\Invoice();
            $invoice->user_id     = auth()->id();
            $invoice->invid       = getTrx(); 
            $invoice->amount      = $total;
            $invoice->paid        = 0;
            $invoice->status      = 0;
            $invoice->invoice_for = 'Digital Product Purchase';
            $invoice->save();

            $licenseLabel = ($license == '1') ? 'Regular License' : 'Extended License';

            $item1              = new \App\Models\InvoiceItem();
            $item1->invoice_id  = $invoice->id;
            $item1->description = $product->getOriginal('name') . ' (' . $licenseLabel . ')';
            $item1->amount      = $price;
            $item1->details     = json_encode([
                'product_id'   => $product->id,
                'slug'         => $slug,
                'license_type' => $licenseLabel,
            ]);
            $item1->save();

            if ($extend_support) {
                $item2              = new \App\Models\InvoiceItem();
                $item2->invoice_id  = $invoice->id;
                $item2->description = 'Extended Support (6 months)';
                $item2->amount      = $supportPromo;
                $item2->save();
            }

            if ($install_service) {
                $item3              = new \App\Models\InvoiceItem();
                $item3->invoice_id  = $invoice->id;
                $item3->description = 'Server Install Service — install & configure on buyer server (' . $product->getOriginal('name') . ')';
                $item3->amount      = $installFee;
                $item3->details     = json_encode([
                    'product_id' => $product->id,
                    'slug'       => $slug,
                    'addon'      => 'server_install_service',
                ]);
                $item3->save();
            }

            \Illuminate\Support\Facades\Log::info('productOrder success', ['invoice_id' => $invoice->id, 'invid' => $invoice->invid]);

            return redirect()->route('user.invoice.details', $invoice->invid)
                ->with('success', 'Order placed! Your invoice is ready — please proceed to payment.');

        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('productOrder error', [
                'slug'    => $slug,
                'user'    => auth()->id(),
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
                'trace'   => $e->getTraceAsString(),
            ]);
            return redirect()->to(url()->previous() ?: route('user.home'))
                ->with('error', 'Order failed: ' . $e->getMessage());
        }
    }

    public function productOrderGuest(\Illuminate\Http\Request $request, $slug)
    {
        $request->validate([
            'license' => 'required|in:1,2',
        ]);

        session()->put('pending_order', [
            'slug' => $slug,
            'license' => $request->input('license'),
            'extend_support' => $request->boolean('extend_support'),
            'install_service' => $request->boolean('install_service'),
        ]);

        return redirect()->route('user.login')->with('info', 'Please log in to complete your purchase.');
    }

    public function processPendingOrder(\Illuminate\Http\Request $request)
    {
        $pending = session()->get('pending_order');
        if (!$pending) {
            return redirect()->route('user.home');
        }

        $slug = $pending['slug'];
        
        try {
            $product = \App\Models\Product::where('slug', $slug)->firstOrFail();
            
            $license = $pending['license'];
            $extend_support = $pending['extend_support'];
            $install_service = !empty($pending['install_service']);
            
            $pRegular = (float) $product->getOriginal('regular_price');
            $attrs    = $product->getOriginal('attributes');
            $attrs    = is_array($attrs) ? $attrs : (json_decode($attrs, true) ?: []);
            $pExtended = isset($attrs['Extended Price']) ? (float) $attrs['Extended Price'] : 0;
            $installFee = isset($attrs['Install Fee']) ? (float) $attrs['Install Fee'] : 19;

            $price = ($license == '1') ? $pRegular : ($pExtended > 0 ? $pExtended : $pRegular * 6);

            if ($price <= 0) {
                session()->forget('pending_order');
                return redirect()->route('product.details', $slug)->with('error', 'This product has no price set. Please contact support.');
            }

            $supportPrice = $price * 0.3;
            $supportPromo  = $supportPrice * 0.8;

            $licensePrice = $price;
            $total = $licensePrice;
            if ($extend_support) {
                $total += $supportPromo;
            }
            if ($install_service) {
                $total += $installFee;
            }

            // Create Invoice
            $invoice = new \App\Models\Invoice();
            $invoice->user_id     = auth()->id();
            $invoice->invid       = getTrx(); 
            $invoice->amount      = $total;
            $invoice->paid        = 0;
            $invoice->status      = 0;
            $invoice->invoice_for = 'Digital Product Purchase';
            $invoice->save();

            $licenseLabel = ($license == '1') ? 'Regular License' : 'Extended License';

            $item1              = new \App\Models\InvoiceItem();
            $item1->invoice_id  = $invoice->id;
            $item1->description = $product->getOriginal('name') . ' (' . $licenseLabel . ')';
            $item1->amount      = $price;
            $item1->details     = json_encode([
                'product_slug' => $product->slug, 
                'license_type' => $licenseLabel
            ]);
            $item1->save();

            if ($extend_support) {
                $item2              = new \App\Models\InvoiceItem();
                $item2->invoice_id  = $invoice->id;
                $item2->description = 'Extended Support (6 months)';
                $item2->amount      = $supportPromo;
                $item2->save();
            }

            if ($install_service) {
                $item3              = new \App\Models\InvoiceItem();
                $item3->invoice_id  = $invoice->id;
                $item3->description = 'Server Install Service — install & configure on buyer server (' . $product->getOriginal('name') . ')';
                $item3->amount      = $installFee;
                $item3->details     = json_encode([
                    'product_id' => $product->id,
                    'slug'       => $slug,
                    'addon'      => 'server_install_service',
                ]);
                $item3->save();
            }

            session()->forget('pending_order');

            return redirect()->route('user.invoice.details', $invoice->invid)
                ->with('success', 'Order placed! Your invoice is ready — please proceed to payment.');

        } catch (\Throwable $e) {
            session()->forget('pending_order');
            \Illuminate\Support\Facades\Log::error('processPendingOrder error', [
                'slug'    => $slug,
                'user'    => auth()->id(),
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
            ]);
            return redirect()->route('user.home')->with('error', 'Order failed: ' . $e->getMessage());
        }
    }

    public function invoiceList()
    {
        $invoiceList = \App\Models\Invoice::where('user_id', auth()->id())->latest()->paginate(15);
        return view('user.invoice.list', compact('invoiceList'));
    }

    public function invoiceDetails($id)
    {
        $user = auth()->user();
        $invoice = \App\Models\Invoice::where('user_id', $user->id)
            ->where(function($q) use ($id) {
                $q->where('invid', $id)->orWhere('id', $id);
            })->firstOrFail();
            
        $items = \App\Models\InvoiceItem::where('invoice_id', $invoice->id)->get();
        $trxs = []; 
        $gatewayCurrency = \App\Models\GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->with('method')->orderby('method_code')->get();

        return view('user.invoice.details', compact('invoice', 'items', 'trxs', 'user', 'gatewayCurrency'));
    }

    public function invoiceDownload($id)
    {
        $user = auth()->user();
        $invoice = \App\Models\Invoice::where('user_id', $user->id)
            ->where(function($q) use ($id) {
                $q->where('invid', $id)->orWhere('id', $id);
            })->firstOrFail();

        $items = \App\Models\InvoiceItem::where('invoice_id', $invoice->id)->get();
        $address = \App\Models\Frontend::where('data_keys', 'contact_us.content')->first();

        return view('user.invoice.download', compact('invoice', 'items', 'user', 'address'));
    }

    public function invoicePay(\Illuminate\Http\Request $request)
    {
        try {
            $payload = decrypt($request->payload);
            $exp = explode('|', $payload);
            $invoiceType = $exp[0];
            $invoiceID = $exp[1];
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Invalid payload');
        }

        $user = auth()->user();
        $invoice = \App\Models\Invoice::where('user_id', $user->id)->where(function($q) use ($invoiceID) {
            $q->where('invid', $invoiceID)->orWhere('id', $invoiceID);
        })->firstOrFail();

        if ($invoice->status == 1) {
            return redirect()->back()->with('error', 'Invoice is already paid.');
        }

        $amountToPay = $invoice->amount - $invoice->paid;

        if ($user->balance < $amountToPay) {
            return redirect()->back()->with('error', 'Insufficient account balance.');
        }

        // Deduct balance
        $user->balance -= $amountToPay;
        $user->save();

        // Update invoice
        $invoice->status = 1; // Paid
        $invoice->paid = $invoice->amount;
        $invoice->save();

        // Log transaction
        $trx = getTrx();
        $transaction = new \App\Models\Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = $amountToPay;
        $transaction->post_balance = $user->balance;
        $transaction->charge = 0;
        $transaction->trx_type = '-';
        $transaction->details = 'Paid for Invoice #' . $invoice->invid;
        $transaction->trx = $trx;
        $transaction->remark = 'invoice_payment';
        $transaction->save();

        return redirect()->back()->with('success', 'Invoice paid successfully via Account Balance.');
    }
    
    public function transactions()
    {
        $transactions = \App\Models\Transaction::where('user_id', auth()->id())->latest()->paginate(15);
        return view('user.report.transactions', compact('transactions'));
    }
    public function logins()
    {
        $pageTitle = 'Login History';
        $logins = \App\Models\UserLogin::where('user_id', auth()->id())->latest()->paginate(15);
        return view('user.report.logins', compact('pageTitle', 'logins'));
    }
    public function emails() { return redirect()->back()->with('error', 'Not implemented yet'); }

    public function setting()
    {
        $pageTitle = 'Profile Setting';
        $user = auth()->user();
        return view('user.setting', compact('pageTitle', 'user'));
    }

    public function profileSubmit(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'mkt_mail' => 'required|in:0,1',
        ]);

        $user = auth()->user();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->mkt_mail = $request->mkt_mail;
        $user->save();

        return back()->with('success', 'Profile updated successfully');
    }

    public function passwordSubmit(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = auth()->user();
        if (!\Illuminate\Support\Facades\Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password does not match');
        }

        $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password changed successfully');
    }

    /*--------------------------------------------------
     | Manual Deposit
     *-------------------------------------------------*/
    public function depositIndex()
    {
        $pageTitle = 'Make a Deposit';
        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($q) {
            $q->where('status', 1)->where('code', '>=', 1000);
        })->with('method')->orderBy('method_code')->get();

        return view('user.deposit.index', compact('pageTitle', 'gatewayCurrency'));
    }

    public function depositInsert(Request $request)
    {
        $methodCode = $request->method_code ?? $request->gateway;
        
        if (!$methodCode) {
            return back()->with('error', 'Please select a payment gateway.');
        }

        $gatewayCurrency = GatewayCurrency::where('method_code', $methodCode);
        if ($request->method_currency) {
            $gatewayCurrency = $gatewayCurrency->where('currency', $request->method_currency);
        }
        $gatewayCurrency = $gatewayCurrency->first();

        if (!$gatewayCurrency) {
            return back()->with('error', 'Invalid payment gateway. Please select a valid gateway and try again.');
        }

        $request->validate([
            'amount' => 'required|numeric|gt:0',
            'proof'  => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:4096',
        ]);

        $amount = $request->amount;

        if ($amount < $gatewayCurrency->min_amount || $amount > $gatewayCurrency->max_amount) {
            return back()->with('error', "Amount must be between {$gatewayCurrency->min_amount} and {$gatewayCurrency->max_amount} {$gatewayCurrency->currency}.");
        }

        $charge      = $gatewayCurrency->fixed_charge + ($amount * $gatewayCurrency->percent_charge / 100);
        $finalAmount = $amount - $charge;
        $rate        = $gatewayCurrency->rate;

        // If it's from the invoice modal and no proof is uploaded yet, we show a detail page to confirm and upload proof
        if ($request->has('payload') && !$request->hasFile('proof') && $gatewayCurrency->method_code >= 1000) {
            $pageTitle = 'Confirm Invoice Payment';
            $payload = $request->payload;
            return view('user.invoice.payment_confirm', compact('pageTitle', 'gatewayCurrency', 'amount', 'charge', 'finalAmount', 'payload'));
        }

        // Handle proof file upload
        $proofFilename = null;
        if ($request->hasFile('proof')) {
            $file     = $request->file('proof');
            $filename = Str::random(18) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/deposit_proofs'), $filename);
            $proofFilename = $filename;
        }

        $deposit                  = new Deposit();
        $deposit->user_id         = auth()->id();
        $deposit->method_code     = $gatewayCurrency->method_code;
        $deposit->method_currency = $gatewayCurrency->currency;
        $deposit->amount          = $finalAmount;
        $deposit->charge          = $charge;
        $deposit->rate            = $rate;
        $deposit->final_amo       = round($amount * $rate, 2);
        $deposit->btc_amo         = 0;
        $deposit->btc_wallet      = '';
        $deposit->trx             = getTrx();
        $deposit->status          = Status::PAYMENT_PENDING;
        $deposit->from_api        = 0;
        
        $detailData = [
            'note'  => $request->note ?? '',
            'proof' => $proofFilename,
        ];
        
        if ($request->has('payload')) {
            $detailData['invoice_payload'] = $request->payload;
        }
        
        $deposit->detail          = (object)$detailData;
        $deposit->save();

        return redirect()->route('user.report.deposits')
            ->with('success', 'Deposit request submitted. It will be reviewed within 24 hours.');
    }

    public function deposits()
    {
        $pageTitle = 'My Deposits';
        $deposits  = Deposit::where('user_id', auth()->id())
            ->where('method_code', '>=', 1000)
            ->latest()
            ->paginate(15);

        return view('user.report.deposits', compact('pageTitle', 'deposits'));
    }
}

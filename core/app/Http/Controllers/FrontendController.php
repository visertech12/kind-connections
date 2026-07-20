<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /*--------------------------------------------------
     | General Pages
     *-------------------------------------------------*/
    public function index()   { return view('template.home'); }
    public function about()   { return view('template.about'); }
    public function faq()     { return view('template.faq'); }
    public function privacy() { return view('template.privacy'); }
    public function refund()  { return view('template.refund'); }
    public function tos()     { return view('template.tos'); }
    public function support() { return view('template.support'); }
    public function bookMeeting() { return view('template.book_meeting'); }

    public function contact() { return view('template.contact'); }
    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:120',
            'email'   => 'required|email|max:190',
            'subject' => 'required|string|max:190',
            'message' => 'required|string|max:5000',
        ]);

        \App\Models\ContactMessage::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'subject'    => $request->subject,
            'message'    => $request->message,
            'ip'         => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 250),
            'status'     => 0,
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully. We will get back to you soon!');
    }

    /*--------------------------------------------------
     | Services
     *-------------------------------------------------*/
    public function serviceWeb()         { return view('template.service.web'); }
    public function serviceApp()         { return view('template.service.app'); }
    public function serviceUiux()        { return view('template.service.uiux'); }
    public function serviceHosting()     { return view('template.service.hosting'); }
    public function serviceMarketing()   { return view('template.service.marketing'); }
    public function serviceConsultancy() { return view('template.service.consultancy'); }

    /*--------------------------------------------------
     | Products
     *-------------------------------------------------*/
    public function productAll()
    {
        $page_title = 'All Digital Items';
        $seoConfigs = config('seo');
        $seo_title = $seoConfigs['product.all']['title'] ?? null;
        $seo_description = $seoConfigs['product.all']['description'] ?? null;
        $seo_keywords = $seoConfigs['product.all']['keyword'] ?? null;
        
        $products   = \App\Models\Product::with('category')->where('status', 1);
        if (request()->search) {
            $products->where('name', 'like', '%' . request()->search . '%');
        }
        $products = $products->orderBy(request()->order_by ?? 'id', 'desc')->paginate(getPaginate());
        return view('template.product.list', compact('page_title', 'seo_title', 'seo_description', 'seo_keywords', 'products'));
    }

    public function productFeatured()
    {
        $page_title = 'Featured Products';
        $seoConfigs = config('seo');
        $seo_title = $seoConfigs['product.featured']['title'] ?? null;
        $seo_description = $seoConfigs['product.featured']['description'] ?? null;
        $seo_keywords = $seoConfigs['product.featured']['keyword'] ?? null;
        
        $products   = \App\Models\Product::with('category')->where('status', 1)->where('featured', 1);
        if (request()->search) {
            $products->where('name', 'like', '%' . request()->search . '%');
        }
        $products = $products->orderBy(request()->order_by ?? 'id', 'desc')->paginate(getPaginate());
        return view('template.product.list', compact('page_title', 'seo_title', 'seo_description', 'seo_keywords', 'products'));
    }

    public function productCategory($slug)
    {
        $category   = \App\Models\Category::where('slug', $slug)->firstOrFail();
        $page_title = $category->name;
        $seo_title = $category->seo_title;
        $seo_description = $category->seo_description;
        $seo_keywords = $category->seo_keywords;
        
        $products   = \App\Models\Product::with('category')->where('category_id', $category->id)->where('status', 1);
        if (request()->search) {
            $products->where('name', 'like', '%' . request()->search . '%');
        }
        $products = $products->orderBy(request()->order_by ?? 'id', 'desc')->paginate(getPaginate());
        return view('template.product.list', compact('page_title', 'seo_title', 'seo_description', 'seo_keywords', 'products'));
    }

    public function productDetails($slug)
    {
        $product = \App\Models\Product::with('category')
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $page_title = $product->name;
        $canonical_url = route('product.details', $product->slug);

        $related_products = \App\Models\Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 1)
            ->latest()
            ->take(4)
            ->get();

        // Track unique view — wrapped in try/catch so a missing table won't crash the page
        try {
            $ip = request()->ip();
            $existingView = \App\Models\ProductView::where('product_id', $product->id)->where('ip_address', $ip)->first();
            if (!$existingView) {
                $ipInfo   = \App\Lib\ClientInfo::ipInfo();
                $osBrowser = \App\Lib\ClientInfo::osBrowser();

                // ipInfo() uses "?? []" fallbacks so values can be empty arrays — cast safely
                $country = is_string($ipInfo['country'] ?? null) && !empty($ipInfo['country']) ? (string) $ipInfo['country'] : null;
                $city    = is_string($ipInfo['city'] ?? null)    && !empty($ipInfo['city'])    ? (string) $ipInfo['city']    : null;
                $os      = is_string($osBrowser['os_platform'] ?? null) ? (string) $osBrowser['os_platform'] : null;
                $browser = is_string($osBrowser['browser'] ?? null)     ? (string) $osBrowser['browser']     : null;

                \App\Models\ProductView::create([
                    'product_id' => $product->id,
                    'ip_address' => $ip,
                    'country'    => $country,
                    'city'       => $city,
                    'os'         => $os,
                    'browser'    => $browser,
                ]);
            }
        } catch (\Throwable $e) {
            // Silently fail — don't break the product page if tracking fails
            \Illuminate\Support\Facades\Log::warning('ProductView tracking failed: ' . $e->getMessage());
        }

        return view('template.product.details', compact('product', 'page_title', 'related_products', 'canonical_url'));
    }

    public function downloadFreeProduct(Request $request, $slug)
    {
        $product = \App\Models\Product::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        if ($product->regular_price > 0) {
            $notify[] = ['error', 'This product is not free.'];
            return back()->withNotify($notify);
        }

        if (!$product->file_link) {
            $notify[] = ['error', 'Download link is not available right now. Please try again later.'];
            return back()->withNotify($notify);
        }

        // Log the download
        \App\Models\ProductDownload::create([
            'product_id' => $product->id,
            'ip_address' => $request->ip(),
        ]);

        return redirect($product->file_link);
    }

    public function productCheckout(Request $request, $slug)
    {
//        dd(auth()->check());
        $product = \App\Models\Product::with('category')
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $license = $request->license; // 1 = regular, 2 = extended
        $extend_support = $request->extend_support ? true : false;
        $install_service = $request->boolean('install_service');

        $page_title = 'Checkout - ' . $product->name;

        return view('template.product.checkout', compact('product', 'page_title', 'license', 'extend_support', 'install_service'));
    }

    public function productPlaceOrder(Request $request, $slug)
    {
        // If user is NOT logged in, save to session and redirect to login
        if (!auth()->check()) {
            $request->validate(['license' => 'required|in:1,2']);
            session()->put('pending_order', [
                'slug' => $slug,
                'license' => $request->input('license'),
                'extend_support' => $request->boolean('extend_support'),
                'install_service' => $request->boolean('install_service'),
            ]);
            return redirect()->route('user.login')->with('info', 'Please log in to complete your purchase.');
        }

        // User IS logged in — create the invoice directly
        try {
            $product = \App\Models\Product::where('slug', $slug)->firstOrFail();

            $license = $request->input('license', '1');
            $extend_support = $request->boolean('extend_support');
            $install_service = $request->boolean('install_service');

            $pRegular = (float) $product->getOriginal('regular_price');
            $attrs    = $product->getOriginal('attributes');
            $attrs    = is_array($attrs) ? $attrs : (json_decode($attrs, true) ?: []);
            $pExtended = isset($attrs['Extended Price']) ? (float) $attrs['Extended Price'] : 0;
            $installFee = isset($attrs['Install Fee']) ? (float) $attrs['Install Fee'] : 0;

            $price = ($license == '1') ? $pRegular : ($pExtended > 0 ? $pExtended : $pRegular * 6);

            if ($price <= 0) {
                return redirect()->route('product.details', $slug)->with('error', 'This product has no price set.');
            }

            $supportPromo = $price * 0.3 * 0.8;
            $total = $price;
            if ($extend_support) {
                $total += $supportPromo;
            }
            if ($install_service && $installFee > 0) {
                $total += $installFee;
            }

            $invoice = new \App\Models\Invoice();
            $invoice->user_id     = auth()->id();
            $invoice->invid       = getTrx();
            $invoice->amount      = $total;
            $invoice->paid        = 0;
            $invoice->status      = 0;
            $invoice->invoice_for = 'Digital Product Purchase';
            $invoice->save();

            $licenseLabel = ($license == '1') ? 'Regular License' : 'Extended License';

            $item1 = new \App\Models\InvoiceItem();
            $item1->invoice_id  = $invoice->id;
            $item1->description = $product->getOriginal('name') . ' — ' . $licenseLabel;
            $item1->amount      = $price;
            $item1->details     = json_encode(['product_slug' => $product->slug, 'license_type' => $licenseLabel]);
            $item1->save();

            if ($extend_support) {
                $item2 = new \App\Models\InvoiceItem();
                $item2->invoice_id  = $invoice->id;
                $item2->description = 'Extended Support (6 months)';
                $item2->amount      = $supportPromo;
                $item2->save();
            }

            if ($install_service && $installFee > 0) {
                $item3 = new \App\Models\InvoiceItem();
                $item3->invoice_id  = $invoice->id;
                $item3->description = 'Server Install Service';
                $item3->amount      = $installFee;
                $item3->details     = json_encode(['addon' => 'server_install_service']);
                $item3->save();
            }

            return redirect()->route('user.invoice.details', $invoice->invid)
                ->with('success', 'Order placed! Your invoice is ready.');

        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('productPlaceOrder error', [
                'slug' => $slug, 'user' => auth()->id(), 'error' => $e->getMessage()
            ]);
            return redirect()->route('product.details', $slug)
                ->with('error', 'Order failed: ' . $e->getMessage());
        }
    }




    /*--------------------------------------------------
     | Hosting
     *-------------------------------------------------*/
    public function hostingBudget()    { return view('template.hosting.budget'); }
    public function hostingBudgetSg()  { return view('template.hosting.budget'); }
    public function hostingPremium()
    {
        $page_title = 'Premium Hosting';
        $plans      = [];
        return view('template.hosting.premium', compact('page_title', 'plans'));
    }
    public function hostingPremiumSg()  { return redirect()->back()->with('error', 'SG Premium not implemented'); }
    public function hostingVps()        { return view('template.hosting.vps'); }
    public function hostingDedicated()  { return view('template.hosting.dedicated'); }
    public function hostingCluster()    { return view('template.hosting.cluster'); }
    public function hostingSmtp()       { return view('template.hosting.smtp'); }
    public function hostingOrderReview(){ return view('template.hosting.order_review'); }
    public function hostingOrder($id)   { return redirect()->back()->with('error', 'Order endpoint not implemented'); }

    /*--------------------------------------------------
     | Domain
     *-------------------------------------------------*/
    public function domainRegister() { return view('template.domain.register'); }

    /*--------------------------------------------------
     | Digital Marketing
     *-------------------------------------------------*/
    public function marketingBacklink()   { return view('template.marketing.backlink'); }
    public function marketingLinkpyramid(){ return view('template.marketing.linkpyramid'); }
    public function marketingPr()         { return view('template.marketing.pr'); }
    public function marketingAdvertising(){ return view('template.marketing.advertising'); }
    public function marketingBranding()   { return view('template.marketing.branding'); }
    public function marketingSeo()        { return view('template.marketing.seo'); }

    public function sitemap()
    {
        $products = \App\Models\Product::where('status', 1)->get();
        $categories = \App\Models\Category::where('status', 1)->get();
        return response()->view('template.sitemap', compact('products', 'categories'))->header('Content-Type', 'text/xml');
    }
}

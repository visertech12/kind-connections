<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\TicketController;

/*
|--------------------------------------------------------------------------
| Public / Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/privacy-policy', [FrontendController::class, 'privacy'])->name('privacy');
Route::get('/refund-policy', [FrontendController::class, 'refund'])->name('refund');
Route::get('/terms-of-services', [FrontendController::class, 'tos'])->name('tos');
Route::get('/sitemap.xml', [FrontendController::class, 'sitemap'])->name('sitemap');
Route::get('/support', [FrontendController::class, 'support'])->name('support');
Route::get('/book-meeting', [FrontendController::class, 'bookMeeting'])->name('book.meeting');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontendController::class, 'contactSubmit'])->name('contact.send');

// Services
Route::prefix('service')->name('service.')->group(function () {
    Route::get('/web-application',  [FrontendController::class, 'serviceWeb'])->name('web');
    Route::get('/mobile-application',[FrontendController::class, 'serviceApp'])->name('app');
    Route::get('/ui-ux-design',     [FrontendController::class, 'serviceUiux'])->name('uiux');
    Route::get('/domain-hosting',   [FrontendController::class, 'serviceHosting'])->name('hosting');
    Route::get('/digital-marketing',[FrontendController::class, 'serviceMarketing'])->name('marketing');
    Route::get('/tech-consultancy', [FrontendController::class, 'serviceConsultancy'])->name('consultancy');
});

// Products
Route::get('/products',          [FrontendController::class, 'productAll'])->name('product.all');
Route::get('/products/featured', [FrontendController::class, 'productFeatured'])->name('product.featured');
Route::get('/product/{slug}',    [FrontendController::class, 'productCategory'])->name('product.category');
Route::get('/item/{slug}',       [FrontendController::class, 'productDetails'])->name('product.details');
Route::get('/item/download/{slug}', [FrontendController::class, 'downloadFreeProduct'])->name('product.download.free');
Route::get('/item/purchased/download/{slug}', [FrontendController::class, 'downloadPurchasedProduct'])->middleware('auth')->name('product.download.paid');
Route::post('/item/checkout/{slug}', [FrontendController::class, 'productCheckout'])->name('product.checkout');
Route::post('/item/order-guest/{slug}', [UserController::class, 'productOrderGuest'])->name('product.order.guest');

// Hosting
Route::prefix('hosting')->name('hosting.')->group(function () {
    Route::get('/budget',            [FrontendController::class, 'hostingBudget'])->name('budget');
    Route::get('/budget/sg',         [FrontendController::class, 'hostingBudgetSg'])->name('budget.sg');
    Route::get('/premium',           [FrontendController::class, 'hostingPremium'])->name('premium');
    Route::get('/premium/sg',        [FrontendController::class, 'hostingPremiumSg'])->name('premium.sg');
    Route::get('/vps',               [FrontendController::class, 'hostingVps'])->name('vps');
    Route::get('/dedicated-server',  [FrontendController::class, 'hostingDedicated'])->name('dedicated');
    Route::get('/server-cluster',    [FrontendController::class, 'hostingCluster'])->name('cluster');
    Route::get('/smtp-server',       [FrontendController::class, 'hostingSmtp'])->name('smtp');
    Route::get('/order/review',      [FrontendController::class, 'hostingOrderReview'])->name('order.review');
    Route::get('/order/{id}',        [FrontendController::class, 'hostingOrder'])->name('order');
});

// Domain
Route::get('/domain/register', [FrontendController::class, 'domainRegister'])->name('domain.register');

// Digital Marketing
Route::prefix('marketing')->name('marketing.')->group(function () {
    Route::get('/backlink',      [FrontendController::class, 'marketingBacklink'])->name('backlink');
    Route::get('/link-pyramid',  [FrontendController::class, 'marketingLinkpyramid'])->name('linkpyramid');
    Route::get('/press-release', [FrontendController::class, 'marketingPr'])->name('pr');
    Route::get('/advertising',   [FrontendController::class, 'marketingAdvertising'])->name('advertising');
    Route::get('/branding',      [FrontendController::class, 'marketingBranding'])->name('branding');
    Route::get('/seo',           [FrontendController::class, 'marketingSeo'])->name('seo');
});

/*
|--------------------------------------------------------------------------
| Auth Routes  (guests only)
|--------------------------------------------------------------------------
*/

Route::middleware('guest:web')->group(function () {
    Route::get('/login',    [AuthController::class, 'login'])->name('user.login');
    Route::post('/login',   [AuthController::class, 'loginSubmit'])->name('user.login.submit');
    Route::get('/register', [AuthController::class, 'register'])->name('user.register');
    Route::post('/register',[AuthController::class, 'registerSubmit'])->name('user.register.submit');
    Route::get('/password/forgot', [AuthController::class, 'forgotPassword'])->name('user.password.forgot');
});

Route::get('/social-login/{provider}', [AuthController::class, 'socialLogin'])->name('user.social.login');
Route::get('/social-login/callback/{provider}', [AuthController::class, 'socialLoginCallback'])->name('user.social.login.callback');
Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout')->middleware('auth:web');

/*
|--------------------------------------------------------------------------
| Authenticated User Panel Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:web')->prefix('user')->name('user.')->group(function () {
    
    // Profile Completion (No check.profile middleware here)
    Route::get('/authorization', [UserController::class, 'authorization'])->name('profile.complete');
    Route::post('/authorization/information', [UserController::class, 'authorizationSubmit'])->name('profile.complete.submit');

    // All other user panel routes require profile to be complete
    Route::middleware('check.profile')->group(function () {

        // Dashboard
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('home');

        // Tickets
        Route::get('/tickets',          [TicketController::class, 'ticketIndex'])->name('ticket.index');
        Route::get('/tickets/new/{department?}', [TicketController::class, 'ticketNew'])->name('ticket.new');
        Route::post('/tickets/create',  [TicketController::class, 'ticketStore'])->name('ticket.store');
        Route::get('/tickets/view/{ticket}', [TicketController::class, 'ticketDetails'])->name('ticket.details');
        Route::post('/tickets/reply/{ticket}', [TicketController::class, 'ticketReply'])->name('ticket.reply');
        Route::post('/tickets/close/{ticket}', [TicketController::class, 'ticketClose'])->name('ticket.close');
        Route::get('/tickets/download/{ticket}', [TicketController::class, 'ticketDownload'])->name('ticket.download');

        // Direct Purchases
        Route::get('/direct-purchases', [UserController::class, 'directPurchases'])->name('direct.purchases');
        Route::get('/direct-purchases/details/{invid}', [UserController::class, 'directPurchaseDetails'])->name('direct.purchase.details');

        // Marketing Orders
        Route::get('/marketing-orders', [UserController::class, 'marketingOrders'])->name('marketing.orders');
        Route::get('/marketing-orders/details/{id}', [UserController::class, 'marketingDetails'])->name('marketing.details');

        // Domains
        Route::get('/domains',          [UserController::class, 'domainList'])->name('domain.list');
        Route::get('/domains/details/{type}/{id}', [UserController::class, 'domainDetails'])->name('domain.details');

        // Hosting
        Route::get('/hosting',          [UserController::class, 'hostingList'])->name('hosting.list');
        Route::get('/hosting/details/{pid}/{domain}', [UserController::class, 'hostingDetails'])->name('hosting.details');
        Route::post('/hosting/cancel',  [UserController::class, 'hostingCancel'])->name('hosting.cancel');

        // Invoices
        Route::get('/invoices',         [UserController::class, 'invoiceList'])->name('invoice.list');
        Route::get('/invoice/details/{id}', [UserController::class, 'invoiceDetails'])->name('invoice.details');
        Route::get('/invoice/download/{id}', [UserController::class, 'invoiceDownload'])->name('invoice.download');
        Route::post('/invoice/pay',      [UserController::class, 'invoicePay'])->name('invoice.pay');
        
        // Order Product
        Route::get('/item/order/process-pending', [UserController::class, 'processPendingOrder'])->name('product.order.process');
        Route::post('/item/order/{slug}', [UserController::class, 'productOrder'])->name('product.order');

        // Reports
        Route::get('/transactions',     [UserController::class, 'transactions'])->name('report.transactions');
        Route::get('/deposits',         [UserController::class, 'deposits'])->name('report.deposits');
        Route::get('/logins',           [UserController::class, 'logins'])->name('report.logins');
        Route::get('/emails',           [UserController::class, 'emails'])->name('report.emails');

        // Settings
        Route::get('/settings',          [UserController::class, 'setting'])->name('setting');
        Route::post('/settings/profile',  [UserController::class, 'profileSubmit'])->name('profile');
        Route::post('/settings/password', [UserController::class, 'passwordSubmit'])->name('password');

        // Deposit
        Route::get('/deposit',          [UserController::class, 'depositIndex'])->name('deposit.index');
        Route::post('/deposit',         [UserController::class, 'depositInsert'])->name('deposit.insert');
        Route::get('/deposits',         [UserController::class, 'deposits'])->name('report.deposits');

    });
});

Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return 'Application cache, view cache, and config cache cleared successfully.';
});

Route::get('/debug-db', function () {
    return [
        'invoices' => \Illuminate\Support\Facades\Schema::getColumnListing('invoices'),
        'invoice_items' => \Illuminate\Support\Facades\Schema::getColumnListing('invoice_items'),
    ];
});

Route::get('/debug-log', function () {
    $logPath = storage_path('logs/laravel.log');
    if (!file_exists($logPath)) {
        return 'No log file found.';
    }
    $lines = file($logPath);
    return implode('', array_slice($lines, -400));
});

Route::get('/debug-order-log', function () {
    $logPath = storage_path('logs/laravel.log');
    if (!file_exists($logPath)) {
        return 'No log file found.';
    }
    $lines = file($logPath);
    $matches = [];
    foreach ($lines as $line) {
        if (stripos($line, 'productOrder') !== false || stripos($line, 'pendingOrder') !== false) {
            $matches[] = $line;
        }
    }
    return implode('', array_slice($matches, -100));
});

Route::get('/debug-controller', function () {
    $reflector = new \ReflectionClass(\App\Http\Controllers\User\UserController::class);
    return [
        'file' => $reflector->getFileName(),
        'methods' => array_map(fn($m) => $m->name, $reflector->getMethods()),
    ];
});

Route::get('/debug-invoices', function () {
    return \App\Models\Invoice::all();
});

Route::get('/test-order', function () {
    try {
        $invoice = new \App\Models\Invoice();
        $invoice->user_id     = 1;
        $invoice->invid       = getTrx();
        $invoice->amount      = 10;
        $invoice->paid        = 0;
        $invoice->status      = 0;
        $invoice->invoice_for = 'Test Order';
        $invoice->save();

        $item = new \App\Models\InvoiceItem();
        $item->invoice_id  = $invoice->id;
        $item->description = 'Test Product';
        $item->amount      = 10;
        $item->details     = json_encode(['test' => true]);
        $item->save();

        return 'SUCCESS! Invoice created with ID: ' . $invoice->invid . ' (DB ID: ' . $invoice->id . ')';
    } catch (\Throwable $e) {
        return 'ERROR: ' . $e->getMessage() . ' | File: ' . $e->getFile() . ':' . $e->getLine();
    }
});
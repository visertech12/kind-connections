<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SupportTicketController;
use App\Http\Controllers\Admin\LubricantController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\ContactMessageController;

Route::namespace('Admin')->group(function () {

    Route::namespace('Auth')->group(function () {
        Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/', [LoginController::class, 'login'])->name('login.submit');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    });

    Route::middleware('admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('a', [AdminController::class, 'dashboard'])->name('dashboard');

        // Products
        Route::prefix('product')->name('product.')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('create', [ProductController::class, 'create'])->name('create');
            Route::post('store', [ProductController::class, 'store'])->name('store');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [ProductController::class, 'update'])->name('update');
            Route::post('delete/{id}', [ProductController::class, 'delete'])->name('delete');
            Route::get('envato-import', [ProductController::class, 'envatoImport'])->name('envato.import');
            Route::post('envato-import', [ProductController::class, 'envatoImportStore'])->name('envato.import.store');
            Route::get('inspect-seo/{id}', [ProductController::class, 'inspectSeo'])->name('inspect-seo');
        });

        // Lubricants
        Route::prefix('lubricant')->name('lubricant.')->group(function () {
            Route::get('/', [LubricantController::class, 'index'])->name('index');
            Route::get('create', [LubricantController::class, 'create'])->name('create');
            Route::post('store', [LubricantController::class, 'store'])->name('store');
            Route::get('edit/{id}', [LubricantController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [LubricantController::class, 'update'])->name('update');
            Route::post('delete/{id}', [LubricantController::class, 'delete'])->name('delete');
        });

        // Categories
        Route::prefix('category')->name('category.')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::post('store', [CategoryController::class, 'store'])->name('store');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::post('delete/{id}', [CategoryController::class, 'delete'])->name('delete');
        });

        // Settings
        Route::prefix('setting')->name('setting.')->group(function () {
            Route::get('/', [GeneralSettingController::class, 'index'])->name('index');
            Route::post('update', [GeneralSettingController::class, 'update'])->name('update');
        });

        // Users
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('detail/{id}', [UserController::class, 'detail'])->name('detail');
            Route::post('update/{id}', [UserController::class, 'update'])->name('update');
        });
        // Manual Gateways
        Route::prefix('gateway/manual')->name('gateway.manual.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\ManualGatewayController::class, 'index'])->name('index');
            Route::get('new', [\App\Http\Controllers\Admin\ManualGatewayController::class, 'create'])->name('create');
            Route::post('new', [\App\Http\Controllers\Admin\ManualGatewayController::class, 'store'])->name('store');
            Route::get('edit/{alias}', [\App\Http\Controllers\Admin\ManualGatewayController::class, 'edit'])->name('edit');
            Route::post('update/{code}', [\App\Http\Controllers\Admin\ManualGatewayController::class, 'update'])->name('update');
            Route::post('status/{id}', [\App\Http\Controllers\Admin\ManualGatewayController::class, 'status'])->name('status');
        });

        // Support Tickets
        Route::prefix('ticket')->name('ticket.')->group(function () {
            Route::get('/', [SupportTicketController::class, 'tickets'])->name('index');
            Route::get('pending', [SupportTicketController::class, 'pendingTicket'])->name('pending');
            Route::get('closed', [SupportTicketController::class, 'closedTicket'])->name('closed');
            Route::get('answered', [SupportTicketController::class, 'answeredTicket'])->name('answered');
            Route::get('view/{id}', [SupportTicketController::class, 'ticketReply'])->name('view');
            Route::post('reply/{id}', [SupportTicketController::class, 'ticketReplySend'])->name('reply');
            Route::post('delete/{id}', [SupportTicketController::class, 'ticketDelete'])->name('delete');
            Route::get('download/{ticket}', [SupportTicketController::class, 'ticketDownload'])->name('download');
        });

        // Contact Messages
        Route::prefix('contact-messages')->name('contact.')->group(function () {
            Route::get('/', [ContactMessageController::class, 'index'])->name('index');
            Route::get('view/{id}', [ContactMessageController::class, 'show'])->name('show');
            Route::post('reply/{id}', [ContactMessageController::class, 'reply'])->name('reply');
            Route::post('delete/{id}', [ContactMessageController::class, 'destroy'])->name('delete');
        });

        // Manual Deposits — Approve / Reject
        Route::prefix('deposit')->name('deposit.')->group(function () {
            Route::get('/', [DepositController::class, 'index'])->name('index');
            Route::get('pending', [DepositController::class, 'pending'])->name('pending');
            Route::get('approved', [DepositController::class, 'approved'])->name('approved');
            Route::get('rejected', [DepositController::class, 'rejected'])->name('rejected');
            Route::get('detail/{id}', [DepositController::class, 'details'])->name('details');
            Route::post('approve/{id}', [DepositController::class, 'approve'])->name('approve');
            Route::post('reject/{id}', [DepositController::class, 'reject'])->name('reject');
        });
    });
});


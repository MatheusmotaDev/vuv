<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\BudgetController;

use App\Models\Quotation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/saudacao', [UserController::class, 'saudacaoUsuario'])->name('saudacao');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    })->name('dashboard');

    Route::get('/customer/new-quotation', [QuotationController::class, 'create'])->name('customer.new-quotation');
    Route::post('/customer/new-quotation', [QuotationController::class, 'store'])->name('customer.quotation.store');

    Route::get('/customer/edit', function () {
        return view('customer.edit');
    })->name('customer.edit');

    Route::get('/customer/quotations', [QuotationController::class, 'index'])->name('customer.quotations');
    Route::get('/customer/quotations/{quotation}/items', [QuotationController::class, 'showItems'])->name('customer.quotations.items');
    Route::get('/customer/quotations/{quotation}/budgets', [BudgetController::class, 'showBudgets'])->name('customer.quotations.budgets');
    Route::post('/customer/quotations/{quotation}/budgets/{budget}/accept', [BudgetController::class, 'acceptBudget'])->name('customer.budgets.accept');
    Route::post('/customer/quotations/{quotation}/budgets/{budget}/refuse', [BudgetController::class, 'refuseBudget'])->name('customer.budgets.refuse');
    Route::get('/customer/quotations/{quotation}/budgets/{budget}/accepted', [BudgetController::class, 'acceptedBudget'])->name('customer.budgets.accepted');
    Route::post('/customer/quotations/{quotation}/close', [QuotationController::class, 'closeQuotation'])->name('customer.quotation.close');
   
    Route::middleware(['role:seller'])->group(function () {
        Route::prefix('vendedor')->group(function () {
            Route::get('/dashboard', function () {
                return view('seller.dashboard');
            })->name('seller.dashboard');

            Route::get('/cotacoes-disponiveis', function () {
                $quotations = Quotation::where('status', 'open')->with('items')->get();
                return view('seller.new-budget', ['quotations' => $quotations]);
            })->name('seller.newBudget');

            Route::get('/cotacoes-disponiveis/{quotation}/criar-orcamento', function (Quotation $quotation) {
                return view('seller.create-budget', compact('quotation'));
            })->name('quotations.createBudget');

            Route::post('/cotacoes-disponiveis/{quotation}/store-budget', [BudgetController::class, 'store'])->name('quotations.storeBudget');

            Route::get('/orcamentos', [BudgetController::class, 'index'])->name('seller.budgets');
            Route::get('/orcamentos/{budget}/acompanhar', [BudgetController::class, 'track'])->name('budgets.track');

            Route::post('/notifications/clear', [QuotationController::class, 'clearNotifications'])->name('seller.notifications.clear');
        });
    });

    Route::middleware(['auth', 'role:admin', 'verified'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    
        Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');


        Route::get('/admin/quotations', [QuotationController::class, 'adminIndex'])->name('admin.quotations.index');
        Route::delete('/admin/quotations/{quotation}', [QuotationController::class, 'destroy'])->name('admin.quotations.destroy');
    });
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

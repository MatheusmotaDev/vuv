<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuotationController;
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

Route::get('/dashboard', function () {
    return view('customer.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/customer/new-quotation', function () {
    return view('customer.new-quotation');
})->middleware(['auth', 'verified'])->name('customer.new-quotation');

Route::post('/customer/new-quotation', [QuotationController::class, 'store'])->name('customer.quotation.store');

Route::get('/customer/edit', function () {
    return view('customer.edit');
})->name('customer.edit');

Route::get('/customer/quotations', [QuotationController::class, 'index'])->name('customer.quotations');

Route::get('/customer/quotations/{quotation}/items', [QuotationController::class, 'showItems'])->name('customer.quotations.items');


Route::get('/vendedor/dashboard', function () {
    return view('seller.dashboard');
})->middleware(['auth', 'role:seller', 'verified'])->name('seller.dashboard');

// Rota para listar cotações disponíveis para o vendedor
Route::get('/vendedor/cotacoes-disponiveis', function () {
    $quotations = Quotation::where('status', 'open')->with('items')->get();
    return view('seller.new-budget', ['quotations' => $quotations]);
})->middleware(['auth', 'role:seller', 'verified'])->name('seller.newBudget');

// Rota para exibir a view de criar orçamento
Route::get('/vendedor/cotacoes-disponiveis/{quotation}/criar-orcamento', function (Quotation $quotation) {
    return view('seller.create-budget', compact('quotation'));
})->middleware(['auth', 'role:seller', 'verified'])->name('quotations.createBudget');

Route::middleware(['auth', 'role:admin', 'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/quotations', [QuotationController::class, 'adminIndex'])->name('admin.quotations.index');
    Route::delete('/admin/quotations/{quotation}', [QuotationController::class, 'destroy'])->name('admin.quotations.destroy');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

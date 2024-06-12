<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\{BudgetController, DashboardController, ProductController, RegionController};

Route::get('/', function () {

    if (Auth::check()) {
        return redirect()->route('home');
    }
    
    return Inertia::render('Auth/Login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    Route::resource('region', RegionController::class);

    Route::resource('product', ProductController::class);

    Route::resource('budget', BudgetController::class);
    Route::get('/budget/{budget}/pay', [BudgetController::class, 'payCreate'])->name('payCreate');
    Route::put('/budget/{budget}/pay', [BudgetController::class, 'payStore'])->name('payStore');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

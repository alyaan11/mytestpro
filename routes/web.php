<?php

use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesInfoController;
use App\Http\Controllers\UserController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::resource('products', ProductController::class);


    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


    Route::resource('category', CategoryController::class);
    Route::resource('users', UserController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('roles', RolesInfoController::class);
    Route::get('/roles/{role}/permissions', [RolesInfoController::class, 'givePermissions'])->name('roles.givePermissions');
    Route::post('/roles/{role}/permissions', [RolesInfoController::class, 'storePermissions'])->name('roles.storePermissions');
    Route::get('/roles/{role}/assignRolesToUser', [RolesInfoController::class, 'assignRolesToUser'])->name('roles.assignRolesToUser');
    Route::post('/roles/{role}/assignRolesToUser', [RolesInfoController::class, 'storeAssignedRoles'])->name('roles.storeAssignedRoles');
    Route::resource('/accessories', AccessoriesController::class);
});


require __DIR__.'/auth.php';

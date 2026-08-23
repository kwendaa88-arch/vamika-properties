<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Website
|--------------------------------------------------------------------------
*/

Route::get('/', [PropertyController::class, 'home'])
    ->name('home');

Route::get('/properties', [PropertyController::class, 'index'])
    ->name('properties.index');

Route::get('/properties/{property:slug}', [PropertyController::class, 'show'])
    ->name('properties.show');


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Property CRUD
        |--------------------------------------------------------------------------
        */

        Route::resource('properties', AdminPropertyController::class)
            ->except(['show']);

        /*
        |--------------------------------------------------------------------------
        | Delete Property Image
        |--------------------------------------------------------------------------
        */

        Route::delete(
            '/properties/{property}/images/{image}',
            [AdminPropertyController::class, 'destroyImage']
        )->name('properties.images.destroy');
    });


require __DIR__ . '/auth.php';
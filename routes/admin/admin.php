<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Detect browser language and redirect to the appropriate URL
Route::get('/', function (Request $request) {
    $availableLocales = ['en', 'ar'];
    $browserLocale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

    // If browser language is available, use it; otherwise, fallback to 'en'
    $locale = in_array($browserLocale, $availableLocales) ? $browserLocale : 'en';

    return redirect("/$locale");
});

// Localized routes with language prefix
Route::group([
    'prefix' => '{lang}/admin',
    'where' => ['lang' => 'en|ar'],
    'middleware' => ['auth','setlocale'],
], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.page');
    Route::resource('sliders', SliderController::class);
    Route::resource('users', UserController::class);
});

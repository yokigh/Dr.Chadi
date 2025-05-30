<?php

use App\Http\Controllers\StaticController;
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
    'prefix' => '{lang}',
    'where' => ['lang' => 'en|ar'],
    'middleware' => ['setlocale'],
], function () {
    Route::get('/',[StaticController::class,'index'])->name('home.page');
    Route::get('/about',[StaticController::class,'about'])->name('about.page');
    Route::get('/product',[StaticController::class,'product'])->name('product.page');
    Route::get('/product/{product}',[StaticController::class,'showproduct'])->name('showproduct.page');
    Route::get('/contact',[StaticController::class,'contact'])->name('contact.page');
    Route::get('/blog',[StaticController::class,'blog'])->name('blog.page');
    Route::get('/blog/{blog}',[StaticController::class,'showblog'])->name('showblog.page');
    Route::get('/certificate',[StaticController::class,'Certificate'])->name('Certificate.page');
    Route::get('/certificate/{certificate}',[StaticController::class,'showcertificate'])->name('showcertificate.page');
    Route::get('/howitswork',[StaticController::class,'howitswork'])->name('howitswork.page');
    Route::get('/feedback',[StaticController::class,'feedback'])->name('feedback.page');
});

require __DIR__.'/admin/admin.php';
require __DIR__.'/auth/auth.php';
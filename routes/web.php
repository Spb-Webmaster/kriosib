<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\TestController;
use App\MoonShine\Controllers\MoonshineCatalogController;
use App\MoonShine\Controllers\MoonshineGalleryController;
use App\MoonShine\Controllers\MoonshineIndexController;
use App\MoonShine\Controllers\MoonshinePartnerController;
use App\MoonShine\Controllers\MoonshinePriceController;
use App\MoonShine\Controllers\MoonshineSettingController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {

    Route::get('/', 'index')
        ->name('home');
});


/**
 * контроллеры Moonshine
 */

Route::post('/moonshine/setting', MoonshineSettingController::class);
Route::post('/moonshine/index', MoonshineIndexController::class);
Route::post('/moonshine/catalog', MoonshineCatalogController::class);
Route::post('/moonshine/price', MoonshinePriceController::class);
Route::post('/moonshine/gallery', MoonshineGalleryController::class);
Route::post('/moonshine/partner', MoonshinePartnerController::class);


/**
 * /////контроллеры Moonshine
 */



/**
 * AjaxController
 */
Route::controller(AjaxController::class)->group(function () {

    Route::post('/send-mail/order-call', 'OrderCall');


});
/**
 * /// AjaxController
 */

/**
 * Цены
 */
Route::controller(PriceController::class)->group(function () {

    Route::get('/price', 'page')->name('price');

});
/**
 * /// Цены
 */


Route::controller(GalleryController::class)->group(function () {

    Route::get('/gallery', 'gallery')->name('gallery');

});

Route::controller(ContactController::class)->group(function () {

    Route::get('/contacts', 'contacts')->name('contacts');

});

Route::controller(PartnerController::class)->group(function () {

    Route::get('/partners', 'partners')->name('partners');

});

Route::controller(TestController::class)->group(function () {

    Route::get('/test', 'import');

});


/*Route::controller(PageController::class)->group(function () {

    Route::get('{page:slug}', 'page')->name('page');

});
*/

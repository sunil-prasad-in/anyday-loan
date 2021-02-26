<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('backend')->group(function() {
    Route::get('/', 'BackendController@dashboard');
    Route::get('/about-us', 'BackendController@aboutUs');
    Route::post('/add-pages', 'BackendController@addPages');
    Route::get('/partner-with-us', 'BackendController@partnerWithUs');
    Route::get('/terms-and-condition', 'BackendController@termsAndCondition');
    Route::get('/privacy-policy', 'BackendController@privacyPolicy');
    Route::get('/contact-us', 'BackendController@contactUs');
    Route::get('/how-to-apply', 'BackendController@howToApply');
    Route::get('/why-any-day-money', 'BackendController@whyAnyDayMoney');
    Route::get('/product-1', 'BackendController@product_1');
    Route::get('/product-2', 'BackendController@product_2');
    Route::get('/product-3', 'BackendController@product_3');
    Route::get('/product-4', 'BackendController@product_4');
    Route::get('/theme-settings', 'BackendController@themeSettings');
    Route::get('/emi-calculation', 'BackendController@emiCalculation');
    Route::get('/testimonials', 'BackendController@testimonials');
    Route::get('/products', 'BackendController@products');
    Route::get('/add-product', 'BackendController@addProduct');
    Route::post('/add-product', 'BackendController@addProduct');
    Route::get('/add-testimonials', 'BackendController@addTestimonials');
    Route::post('/add-testimonials', 'BackendController@addTestimonials');
    Route::get('/edit-testimonials/{id}', 'BackendController@editTestimonials');
    Route::get('/edit-home-slider/{id}', 'BackendController@editSlider');
    Route::get('/edit-product/{id}', 'BackendController@editProduct');
    Route::get('/home-slider', 'BackendController@homeSlider');
    Route::get('/faq', 'BackendController@faq');
    Route::get('/add-faq', 'BackendController@addFaq');
    Route::post('/add-faq', 'BackendController@addFaq');
    Route::get('/edit-faq/{id}', 'BackendController@editFaq');
    Route::get('/add-home-slider', 'BackendController@addHomeSlider');
    Route::post('/add-home-slider', 'BackendController@addHomeSlider');
    Route::get('/apply-now', 'BackendController@applyNow');
    Route::get('/contact-us', 'BackendController@contactUsForm');
    Route::get('/partner-with-us', 'BackendController@partnerWithUsForm');
    Route::get('/product-detail/{id}', 'BackendController@productDetail');
    Route::post('/add-product-detail', 'BackendController@addProductDetail');
});

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

Route::prefix('web')->group(function() {
    //Route::get('/', 'WebController@instruction');
    Route::get('/', 'WebController@index');
	Route::get('/contact-us', 'WebController@contactUs');
	Route::post('/add-contact-form', 'WebController@addContactForm');
	Route::get('/terms-conditions', 'WebController@termsConditions');
	Route::get('/privacy-policy', 'WebController@privacyPolicy');
	Route::get('/about-us', 'WebController@aboutUs');
	Route::get('/partner-with-us', 'WebController@partnerWithUs');
	Route::get('/personal-loan', 'WebController@personalLoan');
	Route::get('/business-loan', 'WebController@businessLoan');
	Route::get('/medical-loan', 'WebController@medicalLoan');
	Route::get('/education-loan', 'WebController@educationLoan');
	Route::get('/faq', 'WebController@FAQ');
	Route::post('/apply-now', 'WebController@applyNow');
	Route::get('/thank-you', 'WebController@thankYou');
	Route::get('/product/product-detail/{id}', 'WebController@productDetail');
});

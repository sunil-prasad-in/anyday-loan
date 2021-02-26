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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/','Home@index')->name('user.home');
Route::get('login','Home@login');
Route::post('do-login','Home@do_login');
Route::get('logout','Home@logout');
Route::get('register','Home@register');
// Route::get('safe-data','Home@safe_data');
Route::post('do-register','Home@do_register');
Route::post('resend-otp','Home@resend_otp');
Route::post('verify-otp','Home@verify_otp');

Route::middleware('verifier')->group(function () {
    /*apply*/
    Route::get('safe-data','Apply@safe_data');
    Route::get('apply-now', 'Apply@apply_now')->name('dash.apply_now');
    Route::get('loan-calculation-type', 'Apply@loan_calculation_type');
    Route::get('loan-calculation', 'Apply@loan_calculation')->name('dash.loan_calculation');
	Route::get('loan-calculation-fill','Apply@loan_calculation_fill');
	
	
	
	/*LoanApplication routes starts*/
	Route::get('personal-detail', 'LoanApplication@personal_detail')->name('dash.personal_detail');
	Route::post('personal-detail-fill','LoanApplication@personal_detail_fill')->name('personal_detail_fill');
	Route::get('address-info', 'LoanApplication@address_info')->name('dash.address_info');
	Route::post('address-info-fill','LoanApplication@address_info_fill');
	Route::get('address-info-pincode','LoanApplication@address_info_pincode');
	Route::get('employment-info', 'LoanApplication@employment_info')->name('dash.employment_info');
	Route::post('employment-info-fill','LoanApplication@employment_info_fill');
	
	Route::get('pre-approved', 'LoanApplication@pre_approved')->name('dash.pre_approved');
	/*LoanApplication routes end*/
	
	
	
	/*KycDocument routes start*/
	Route::get('kyc-documents', 'KycDocument@kyc_documents')->name('dash.kyc_documents');
	Route::get('kyc-documents-check', 'KycDocument@kyc_documents_check');
	Route::post('kyc-documents-fill','KycDocument@kyc_documents_fill');
	
	Route::get('bank-details', 'KycDocument@bank_details')->name('dash.bank_details');
	Route::post('bank-details-fill','KycDocument@bank_details_fill');
	Route::get('bank-info-ifsc','KycDocument@bank_info_ifsc');
	
	Route::get('loan-complete-evalution', 'KycDocument@loan_application_complete_evalution')->name('dash.loan_application_complete_evalution');
	
	/*KycDocument routes end*/
	
	
	/*SignAgreement routes start*/
	Route::get('approved-amount', 'SignAgreement@approved_amount')->name('dash.approved_amount');
	Route::get('sanction-letter', 'SignAgreement@sanction_letter')->name('dash.sanction_letter');
	Route::get('sanction-letter-upload', 'SignAgreement@sanction_letter_upload')->name('dash.sanction_letter_upload');
	
    Route::get('sign-eligibilty', 'SignAgreement@sign_eligibilty')->name('dash.sign_eligibilty');
    Route::get('sign-agreement', 'SignAgreement@sign_agreement')->name('dash.sign_agreement');
    
    Route::post('signed-proceding','SignAgreement@signed_proceding')->name('signed-proceding');
    Route::get('sign-agreement-success', 'SignAgreement@sign_agreement_success')->name('dash.sign_agreement_success');
    Route::get('loan-reject', 'SignAgreement@loan_reject')->name('dash.loan_reject');
    /*SignAgreement routes end*/
    
    
    /*RegisterAutoDebit routes start*/
	Route::get('pre-proceding', 'RegisterAutoDebit@pre_proceding')->name('dash.pre_proceding');
	Route::get('confirm-payment-detail', 'RegisterAutoDebit@confirm_payment_detail')->name('dash.confirm_payment_detail');
	Route::post('payment-registration','RegisterAutoDebit@payment_registration')->name("payment_registration");
	Route::get('enach-success', 'RegisterAutoDebit@enach_success')->name('dash.enach_success');
    /*RegisterAutoDebit routes end*/
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'verifier', 'namespace' => 'Dashboard'], function () {

	Route::get('/', 'Dashboard@index')->name('dash.home');
	Route::get('loan-card','Dashboard@get_loan_card');

});
Route::group(['prefix' => 'products', 'middleware' => 'verifier', 'namespace' => 'Dashboard'], function () {

	Route::get('/','Product@index')->name('dash.products');

});

Route::get('verification','Home@verification');
Route::get('terms-condition','Pages@terms');
Route::get('privacy-policy','Pages@privacy');
Route::get('contact-us','Pages@contact');
Route::get('about','Pages@about');
Route::get('faq','Pages@faq');
Route::get('personal-loan','Pages@personal_loan');
Route::get('business-loan','Pages@business_loan');
Route::get('medical-loan','Pages@medical_loan');
Route::get('education-loan','Pages@education_loan');
Route::get('/home', function () {
    return view('welcome');
});




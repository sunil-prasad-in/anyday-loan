<?php

namespace Modules\Web\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests;
use Validator;
use Modules\Web\Entities\ContactForm;
use Modules\Web\Entities\Page;
use Modules\Web\Entities\Common;
use Modules\Web\Entities\ApplyNow;
use Modules\Web\Entities\Testimonial;
use Modules\Web\Entities\HomeSlider;
use Modules\Web\Entities\Faq;
use Modules\Web\Entities\Product;
use Modules\Web\Entities\ProductDetail;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $testimonials = Testimonial::get_testimonials();
        $product = Product::getProducts();
        $slider = HomeSlider::get_home_slider();
        $faq = Faq::get_faq();
        return view('web::home',['testimonial'=>$testimonials,'product'=>$product,'slider'=>$slider,'faq'=>$faq]);
    }

    public function productDetail($id)
    {
        $product = ProductDetail::get_product_detail($id);
        return view('web::product-detail',['product'=>$product]);
    }

    public function aboutUs()
    {
        return view('web::about-us');
    }

    public function partnerWithUs()
    {
        return view('web::partner-with-us');
    }

    public function contactUs()
    {
        return view('web::contact-us');
    }

    public function personalLoan()
    {
        return view('web::personal-loan');
    }

    public function businessLoan()
    {
        return view('web::business-loan');
    }

    public function medicalLoan()
    {
        return view('web::medical-loan');
    }

    public function educationLoan()
    {
        return view('web::education-loan');
    }

    public function addContactForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('contact-us')
                        ->withErrors($validator)
                        ->withInput();
        }

        $contact = ContactForm::save_form($request->all());
        if($contact)
        {
            return redirect('web/thank-you');
        }
        else
        {
            return redirect()->back()->withError('Something went wrong!');

        }
    }

    public function applyNow(Request $request)
    {
        $applyNow = ApplyNow::save_form($request->all());
        if($applyNow)
        {
            return redirect('web/thank-you');
        }
        else
        {
            return redirect()->back()->withError('Something went wrong!');
        }
    }

    public function termsConditions()
    {
        return view('web::terms-conditions');
    }

    public function privacyPolicy()
    {
        return view('web::privacy-policy');
    }

    public function FAQ(){
        return view('web::faq');
    }

    public function thankYou()
    {
        return view('web::thankyou');
    }
}

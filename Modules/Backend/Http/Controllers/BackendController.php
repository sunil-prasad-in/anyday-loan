<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Validator;
use Modules\Backend\Entities\ContactForm;
use Modules\Backend\Entities\Page;
use Modules\Backend\Entities\Testimonial;
use Modules\Backend\Entities\Product;
use Modules\Backend\Entities\HomeSlider;
use Modules\Backend\Entities\Faq;
use Modules\Backend\Entities\ApplyNow;
use Modules\Backend\Entities\ProductDetail;
use Modules\Backend\Entities\helpers;
use Image;

class BackendController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function dashboard()
    {
        return view('backend::index');
    }

    public function aboutUs()
    {
        return view('backend::about-us');
    }

    public function  partnerWithUs()
    {
        return view('backend::partner-with-us');
    }

    public function termsAndCondition()
    {
        return view('backend::terms-condition');
    }

    public function privacyPolicy()
    {
        return view('backend::privacy-policy');
    }

    public function contactUs()
    {
        return view('backend::contact-us');
    }

    public function howToApply()
    {
        return view('backend::how-to-apply');
    }

    public function whyAnyDayMoney()
    {
        return view('backend::why-anyday-money');
    }

    public function emiCalculation()
    {
        return view('backend::emi-calculation');
    }

    public function product_1()
    {
        return view('backend::product-1');
    }

    public function product_2()
    {
        return view('backend::product-2');
    }

    public function product_3()
    {
        return view('backend::product-3');
    }

    public function product_4()
    {
        return view('backend::product-4');
    }

    public function themeSettings()
    {
        return view('backend::theme-settings');
    }

    /*==========Testimonial module=========*/

    public function testimonials()
    {
        $testimonials = Testimonial::get_testimonials();
        return view('backend::testimonials',['testimonials'=>$testimonials]);
    }

    public function addTestimonials(Request $request)
    {
        if($request->all())
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'content' => 'required',
                'rating' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('backend/add-testimonials')
                            ->withErrors($validator)
                            ->withInput();
            }
            $testi = Testimonial::save_form($request->all());
            if($testi)
            {
                return redirect('backend/testimonials');
            }
            else
            {
                return redirect()->back()->withError('Something went wrong!');

            }
        }
        return view('backend::add-testimonials');
    }

    public function editTestimonials($id)
    {
        $getTes = Testimonial::editTestimonial($id);
        return view('backend::add-testimonials',['getTes'=>$getTes]);
    }

    /*===========Product Module==========*/

    public function products()
    {
        $product = Product::getProducts();
        return view('backend::products',['product'=>$product]);
    }

    public function addProduct(Request $request)
    {
        if($request->all())
        {
            $validator = Validator::make($request->all(), [
                'product_name' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('backend/add-product')
                            ->withErrors($validator)
                            ->withInput();
            }
            $product = Product::save_form($request->all());
            if($product)
            {
                return redirect('backend/products');
            }
            else
            {
                return redirect()->back()->withError('Something went wrong!');

            }
        }
        return view('backend::add-product');
    }

    public function editProduct($id)
    {
        $getProduct = Product::editProduct($id);
        return view('backend::add-product',['getProduct'=>$getProduct]);
    }

    public function productDetail($id)
    {
        $productName = Product::editProduct($id);
        $productDetail = ProductDetail::get_product_detail($id);
        return view('backend::product-detail',['productName'=>$productName,'productDetail'=>$productDetail]);
    }

    public function addProductDetail(Request $request)
    {
        if($request->all())
        {
            $validator = Validator::make($request->all(), [
                //'banner_image' => 'required',
                'main_title' => 'required',
                'title' => 'required',
                //'sub_title' => 'required',
                'main_content_title' => 'required',
                'main_content' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('backend/product-detail/'.$request->product_id)
                            ->withErrors($validator)
                            ->withInput();
            }
            $product = ProductDetail::save_form($request->all());
            if($product)
            {
                return redirect('backend/products');
            }
            else
            {
                return redirect()->back()->withError('Something went wrong!');

            }
        }
    }

    /*=============Home Slider Module============*/

    public function homeSlider()
    {
        $slider = HomeSlider::get_home_slider();
        return view('backend::home-slider',['slider'=>$slider]);
    }

    public function addHomeSlider(Request $request)
    {
        if($request->all())
        {
            $validator = Validator::make($request->all(), [
                'main_title' => 'required',
                'title' => 'required',
                //'banner_image' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('backend/add-home-slider')
                            ->withErrors($validator)
                            ->withInput();
            }
            
            $slider = HomeSlider::save_form($request->all());
            if($slider)
            {
                return redirect('backend/home-slider');
            }
            else
            {
                return redirect()->back()->withError('Something went wrong!');

            }
        }
        return view('backend::add-home-slider');
    }

    public function editSlider($id)
    {
        $slider = HomeSlider::editSlider($id);
        return view('backend::add-home-slider',['slider'=>$slider]);
    }

    /*==============FAQ Module=========*/

    public function faq()
    {
        $faq = Faq::get_faq();
        return view('backend::faq',['faq'=>$faq]);
    }

    public function addFaq(Request $request)
    {
        if($request->all())
        {
            $validator = Validator::make($request->all(), [
                'question' => 'required',
                'answer' => 'required',
                
            ]);

            if ($validator->fails()) {
                return redirect('backend/add-faq')
                            ->withErrors($validator)
                            ->withInput();
            }
            
            $faq = Faq::save_form($request->all());
            if($faq)
            {
                return redirect('backend/faq');
            }
            else
            {
                return redirect()->back()->withError('Something went wrong!');

            }
        }
        return view('backend::add-faq');
    }

    public function editFaq($id)
    {
        $faq = Faq::editFaq($id);
        return view('backend::add-faq',['faq'=>$faq]);
    }

    public function applyNow()
    {
        $applyNow = ApplyNow::get_detail();
        return view('backend::apply-now',['applyNow'=>$applyNow]);
    }

    public function contactUsForm()
    {
        $contact = ContactForm::get_detail('contact-us');
        return view('backend::contact-us-form',['contact'=>$contact]);
    }

    public function partnerWithUsForm()
    {
        $partner = ContactForm::get_detail('partner-with-us');
        return view('backend::partner-with-us-form',['partner'=>$partner]);
    }

    public function addPages(Request $request)
    {
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
            $page = Page::get_detail('banner_image',$request->type);
            if($page != '')
            {
                $page = Page::update_detail('banner_image',$name,$request->type);
            }
            else
            {
                $page = Page::add_detail('banner_image',$name,$request->type);
            }
        }
        foreach($request->all() as $key=>$val)
        {
            if($key != '_token' && $key != 'type' && $key != 'banner_image')
            {

                $page = Page::get_detail($key,$request->type);
                if($page != '')
                {
                    $page = Page::update_detail($key,$val,$request->type);
                }
                else
                {
                    $page = Page::add_detail($key,$val,$request->type);
                }
            }
        }
        return redirect('backend/'.$request->type);
    }
}

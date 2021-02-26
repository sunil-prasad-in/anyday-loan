<?php

	use Modules\Web\Entities\Page;
    use Modules\Web\Entities\Product;
	
	function changeToUpperCase($string){
	  return strtoupper($string);
	}

	function get_page_detail($meta_key,$type)
    {
        $page = Page::where('meta_key',$meta_key)->where('type',$type)->first();
        if($page != '')
        {
            return $page->meta_value;
        }
        else
        {
            return '';
        }
    }

    function get_products()
    {
        $product = Product::get();
        return $product;
    }


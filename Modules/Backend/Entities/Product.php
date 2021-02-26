<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public static function getProducts()
    {
    	$products = Product::orderBy('id','DESC')->get();
    	return $products;
    }

    public static function save_form($data)
    {
        if($data['id'] == '')
        {
            $product = new Product;
        }
        else
        {
            $product = Product::find($data['id']);
        }
        $name = strtolower($data['product_name']);
        $url = str_replace(" ","-",$name);
        $product->product_name = $data['product_name'];
        $product->url = $url;
        $product->save();
    	return $product;
    }

    public static function editProduct($id)
    {
        $product = Product::find($id);
        return $product;
    }

    
     
    
}

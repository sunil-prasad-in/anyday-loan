<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProductDetail extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public static function save_form($data)
    {
        $detail = ProductDetail::where('product_id',$data['product_id'])->first();
        if($detail == '')
        {
            $product = new ProductDetail;
        }
        else
        {
            $product = ProductDetail::where('product_id',$data['product_id'])->first();
        }
        
        $product->product_id = $data['product_id'];
        $product->main_title = $data['main_title'];
        $product->title = $data['title'];
        $product->sub_title = $data['sub_title'];
        $product->main_content_title = $data['main_content_title'];
        $product->main_content = $data['main_content'];
        $product->e_title = $data['e_title'];
        $product->e_title_second = $data['e_title_second'];
        $product->content_title = implode("=",$data['content_title']);
        $product->content_sub_title = implode("=",$data['content_sub_title']);
        $product->features_title = $data['features_title'];
        $product->features_title_second = $data['features_title_second'];
        $product->feature_title = implode("=",$data['feature_title']);
        $product->feature_sub_title = implode("=",$data['feature_sub_title']);
        if (isset($data['banner_image'])) {
            $image = $data['banner_image'];
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
            $product->banner_image = $name;
        }
        $product->save();
        return $product;
    }

    public static function get_product_detail($id)
    {
        $detail = ProductDetail::where('product_id',$id)->first();
        return $detail;
    }
    
}

<?php

namespace Modules\Web\Entities;

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

    public static function get_product_detail($id)
    {
        $detail = ProductDetail::where('product_id',$id)->first();
        return$detail;
    }
    
}

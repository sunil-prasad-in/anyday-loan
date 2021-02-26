<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Page extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public static function get_detail($key,$type)
    {
    	$detail = Page::where('meta_key',$key)->where('type',$type)->first();
        return $detail;
    }

    public static function update_detail($key,$val,$type)
    {
        $detail = Page::where('meta_key',$key)->where('type',$type)->first();
    	$detail->meta_key = $key;
	    $detail->meta_value = $val;
	    $detail->type = $type;
	    $detail->save();
    }

    public static function add_detail($key,$val,$type)
    {
    	$addPage = new Page();
        $addPage->meta_key = $key;
        $addPage->meta_value = $val;
        $addPage->type = $type;
        $addPage->save();
    }

    
     
    
}

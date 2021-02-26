<?php

namespace Modules\Web\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class HomeSlider extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public static function get_home_slider()
    {
    	$slider = HomeSlider::orderBy('id','ASC')->get();
    	return $slider;
    }

    
    
}

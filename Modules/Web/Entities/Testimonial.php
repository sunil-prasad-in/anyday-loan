<?php

namespace Modules\Web\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Testimonial extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public static function get_testimonials()
    {
    	$testi = Testimonial::orderBy('id','DESC')->get();
    	return $testi;
    }

    
    
     
    
}

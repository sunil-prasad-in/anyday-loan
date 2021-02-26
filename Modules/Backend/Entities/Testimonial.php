<?php

namespace Modules\Backend\Entities;

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

    public static function save_form($data)
    {
        if($data['id'] == '')
        {
            $testi = new Testimonial;
        }
        else
        {
            $testi = Testimonial::find($data['id']);
        }
        $testi->name = $data['name'];
        $testi->rating = $data['rating'];
        $testi->content = $data['content'];
        $testi->save();
    	
    	return $testi;
    }

    public static function editTestimonial($id)
    {
        $testi = Testimonial::find($id);
        return $testi;
    }

    
     
    
}

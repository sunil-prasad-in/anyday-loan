<?php

namespace Modules\Backend\Entities;

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
    	$slider = HomeSlider::orderBy('id','DESC')->get();
    	return $slider;
    }

    public static function save_form($data)
    {
        if($data['id'] == '')
        {
            $slider = new HomeSlider;
        }
        else
        {
            $slider = HomeSlider::find($data['id']);
        }
        if (isset($data['banner_image'])) {
            $image = $data['banner_image'];
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
            $slider->banner_image = $name;
        }
        $slider->main_title = $data['main_title'];
        $slider->title = $data['title'];
        $slider->sub_title = $data['sub_title'];
        $slider->content = implode(",",$data['content']);
        $slider->save();
    	
    	return $slider;
    }

    public static function editSlider($id)
    {
        $slider = HomeSlider::find($id);
        return $slider;
    }

    
     
    
}

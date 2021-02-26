<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ContactForm extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public static function get_detail($type)
    {
    	$form = ContactForm::where('type',$type)->orderBy('id','DESC')->get();
    	return $form;
    }

    
     
    
}

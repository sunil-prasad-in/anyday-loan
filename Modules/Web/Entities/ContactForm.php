<?php

namespace Modules\Web\Entities;

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

    public static function save_form($data)
    {
    	$contact = new ContactForm();
        $contact->full_name = $data['full_name'];
        $contact->email = $data['email'];
        $contact->phone = $data['phone'];
        $contact->message = $data['message'];
        $contact->type = $data['type'];
        $contact->save();
        return $contact;
    }

    
     
    
}

<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Faq extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public static function get_faq()
    {
    	$faq = Faq::orderBy('id','DESC')->get();
    	return $faq;
    }

    public static function save_form($data)
    {
        if($data['id'] == '')
        {
            $faq = new Faq;
        }
        else
        {
            $faq = Faq::find($data['id']);
        }
        $faq->question = $data['question'];
        $faq->answer = $data['answer'];
        $faq->save();
    	return $faq;
    }

    public static function editFaq($id)
    {
        $faq = Faq::find($id);
        return $faq;
    }

    
     
    
}

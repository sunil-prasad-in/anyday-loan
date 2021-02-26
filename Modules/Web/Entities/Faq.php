<?php

namespace Modules\Web\Entities;

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
    	$faq = Faq::orderBy('id','ASC')->get();
    	return $faq;
    }

    
    
}

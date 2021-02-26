<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class ApplyNow extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public static function get_detail()
    {
        $applyNow = ApplyNow::orderBy('id','DESC')->get();
        return $applyNow;
    }

    
     
    
}

<?php

namespace Modules\Web\Entities;

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

    public static function save_form($data)
    {
        $applyNow = new ApplyNow();
        $applyNow->full_name = $data['full_name'];
        $applyNow->email = $data['email'];
        $applyNow->phone = $data['phone'];
        $applyNow->loan_type = $data['loan_type'];
        $applyNow->city = $data['city'];
        $applyNow->state = $data['state'];
        $applyNow->save();
        return $applyNow;
    }

    
     
    
}

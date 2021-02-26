<?php

namespace Modules\Web\Entities;

use Illuminate\Database\Eloquent\Model;

class Common extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function get_page_detail($meta_key,$type)
    {
        $page = Page::where('meta_key',$meta_key)->where('type',$type)->first();
        if($page != '')
        {
            return $page->meta_value;
        }
        else
        {
            return '';
        }
        
    }

}

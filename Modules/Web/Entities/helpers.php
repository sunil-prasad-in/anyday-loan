<?php

use App\Page;

function get_page_detail($meta_key,$type)
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

?>
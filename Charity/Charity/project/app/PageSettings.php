<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageSettings extends Model
{
    protected $table = "page_settings";

    protected $fillable = ['contact', 'contact_email', 'about', 'faq','welcome_title', 'welcome_image', 'welcome_description', 'welcome_link','slider_status', 'split_status', 'welcome_status', 'service_status', 'category_status', 'counter_status', 'latest_status', 'featured_status', 'volunteer_status', 'portfolio_status', 'testimonial_status', 'blog_status', 'partners_status', 'home_reg_status', 'w_b_status', 'c_status', 'a_status', 'f_status'];

    public $timestamps = false;

//    public function getA_statusAttribute($data)
//    {
//        if ($data == 1){
//            $check = "checked";
//        }
//        else{
//            $check = "";
//        }
//        return $check;
//    }
}

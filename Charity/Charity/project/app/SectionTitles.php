<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionTitles extends Model
{
    protected $fillable = ['category_title', 'category_text','volunteer_title', 'volunteer_text','service_title', 'service_text','pricing_title', 'pricing_text','newcamp_title','newcamp_text', 'portfolio_title', 'portfolio_text', 'testimonial_title', 'testimonial_text', 'blog_title', 'blog_text'];
    public $timestamps = false;
}

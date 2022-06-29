<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SplitSection extends Model
{
    protected $table = "split_section";
    protected $fillable = ['icon', 'title', 'text', 'status'];
    public $timestamps = false;
}

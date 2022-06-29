<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = "gallery_images";
    protected $fillable = ['packageid', 'image'];
    public $timestamps = false;
}

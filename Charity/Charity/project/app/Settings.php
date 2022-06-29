<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public $table = "settings";
    protected $fillable = ['logo', 'favicon', 'anonym_donation', 'title', 'url', 'about', 'address', 'phone', 'fax', 'email', 'footer', 'background', 'currency_sign', 'currency_code', 'paypal_business', 'stripe_key', 'stripe_secret', 'success_msg', 'withdraw_charge', 'paypal_donate', 'stripe_donate', 'theme_color'];
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = ['donation_number', 'campid', 'campby', 'amount', 'donator_name', 'donator_email', 'donator_phone', 'donator_address', 'donator_city', 'donator_zip', 'donation_method', 'txn_id', 'charge_id', 'status'];
    public $timestamps = false;
    public static $withoutAppends = false;

    public function getCampidAttribute($campid)
    {
        if(self::$withoutAppends){
            return $campid;
        }
        return Campaign::findOrFail($campid);
    }
    public static function getPercent($campid)
    {
        $campaign = Campaign::findOrFail($campid);
        $donations = Donation::where('campid',$campid)->
            where('status','Completed')->sum('amount');
        $percent = (100/$campaign->goal) * $donations;
        return $percent;
    }

    public static function getFund($campid)
    {
        $donations = Donation::where('campid',$campid)->
            where('status','Completed')->sum('amount');
        return $donations;
    }

    public static function getDonations($campid)
    {
        $donations = Donation::where('campid',$campid)->
            where('status','Completed')->count();
        return $donations;
    }

//    public function getCampbyAttribute($campby)
//    {
//        if(self::$withoutAppends){
//            return $campby;
//        }
//        return UserProfile::findOrFail($campby);
//    }
}

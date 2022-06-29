<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable = ['campid', 'method', 'acc_email', 'iban', 'country', 'acc_name', 'address', 'swift', 'reference', 'amount', 'fee', 'created_at', 'updated_at', 'status'];

    public static $withoutAppends = false;

    public function getCampidAttribute($campid)
    {
        if(self::$withoutAppends){
            return $campid;
        }
        return Campaign::findOrFail($campid);
    }

    public static function campWithdraw($id)
    {
        $withdraws = Withdraw::where('campid',$id)->
        where('status','completed')->sum('amount');
        $charges = Withdraw::where('campid',$id)->
        where('status','completed')->sum('fee');
        $withdraw = $withdraws + $charges;
        return $withdraw;
    }
    public static function pendWithdraw($id)
    {
        $withdraws = Withdraw::where('campid',$id)->
        where('status','pending')->sum('amount');
        $charges = Withdraw::where('campid',$id)->
        where('status','pending')->sum('fee');
        $withdraw = $withdraws + $charges;
        return $withdraw;
    }

}

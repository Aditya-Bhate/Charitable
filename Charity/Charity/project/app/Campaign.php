<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = ['title','createdby','category', 'description', 'start_date', 'end_date', 'goal', 'available_fund','admin_aproved', 'preloaded_amount', 'end_after','video_link', 'feature_image', 'cost_adult', 'featured', 'created_at', 'updated_at','status'];

    public function getCreatedbyAttribute($createdby)
    {
        if($createdby == 0){
            return User::where('id',1)->first();
        }
        return UserProfile::where('id',$createdby)->first();
    }

    public static function getVideo($id)
    {
        $campaign = Campaign::findOrFail($id);
        if($campaign->video_link == ""){
            return "No Video";
        }
        return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        "<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
            $campaign->video_link);

    }

    public static function campDonations($id)
    {

        $donations = Donation::where('campid',$id)->
        where('status','Completed')->get();
        return $donations;
    }

    public static function campWithdraws($id)
    {
        $withdraws = Withdraw::where('campid',$id)->
        orderBy('id','desc')->get();
        return $withdraws;
    }

    public static function campPending()
    {
        $pending = Campaign::where('status','pending')
        ->where('admin_aproved','no')
        ->count();
        return $pending;
    }

    public static function campExpire()
    {
        $camps = Campaign::where('status','running')
        ->where('admin_aproved','yes')
        ->get();

        foreach ($camps as $camp){
            if ($camp->end_after == "goal"){
                if ($camp->goal <= Donation::getFund($camp->id)){
                    $expire = Campaign::findOrFail($camp->id);
                    $data['status'] = 'closed';
                    $expire->update($data);
                }
            }

            if ($camp->end_after == "date"){
                if ($camp->end_date < date('Y-m-d')){
                    $expire = Campaign::findOrFail($camp->id);
                    $data['status'] = 'closed';
                    $expire->update($data);
                }
            }
        }
    }

    public static function totalDonations()
    {
        $total = Donation::where('status','Completed')->count();
        return $total;
    }

    public static function totalFunds()
    {
        $total = Donation::where('status','Completed')->sum('amount');
        return $total;
    }

}

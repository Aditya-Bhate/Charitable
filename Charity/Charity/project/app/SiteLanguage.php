<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteLanguage extends Model
{
    protected $table = "site_language";
    protected $fillable = ['home', 'about_us', 'my_account', 'goal',  'days_left', 'donate_anonymous',  'enter_details', 'recent_posts', 'contact_us', 'faq', 'log_in', 'sign_up', 'forgot_password', 'campaigns', 'running_campaigns', 'completed_campaigns', 'donations', 'funded', 'campaign_details', 'donate', 'created_by', 'dates', 'action', 'amount', 'withdraw', 'settings', 'transactions', 'total', 'subscription', 'subscribe', 'address', 'contact_us_today', 'street_address', 'phone', 'email', 'fax', 'submit', 'name', 'dashboard', 'update_profile', 'change_password', 'latest_blogs', 'footer_links', 'view_details', 'blog', 'api_documentation', 'share_in_social', 'logout'];
    public $timestamps = false;
}

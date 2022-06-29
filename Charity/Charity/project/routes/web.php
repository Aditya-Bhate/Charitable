<?php

use App\UsersModel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontEndController@index');
Route::get('/about', 'FrontEndController@about');
Route::get('/faq', 'FrontEndController@faq');
Route::get('/contact', 'FrontEndController@contact');
Route::get('/campaigns', 'FrontEndController@campaigns');
Route::get('/services/{category}', 'FrontEndController@category');
Route::post('/campaign/{id}/donate', 'FrontEndController@donate');
Route::get('/campaign/{id}/donate', 'FrontEndController@donates');
Route::post('/subscribe', 'FrontEndController@subscribe');
Route::post('/profile/email', 'FrontEndController@usermail');
Route::post('/contact/email', 'FrontEndController@contactmail');
Route::get('/campaign/{id}', 'FrontEndController@viewcampaign');
Route::get('/category/{category}', 'FrontEndController@category');
Route::get('/blogs', 'FrontEndController@allblog');
Route::get('/blog/{id}', 'FrontEndController@blogdetails');

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.login');

Route::get('/login', function () {
    return view('admin.login');
});

Auth::routes();

Route::get('/admin/dashboard', 'HomeController@index');

Route::get('admin/settings/logo', 'SettingsController@logoform');
Route::get('admin/settings/favicon', 'SettingsController@faviconform');
Route::get('admin/settings/contents', 'SettingsController@contentsform');
Route::get('admin/settings/address', 'SettingsController@addressform');
Route::get('admin/settings/background', 'SettingsController@backgroundform');
Route::get('admin/settings/payment', 'SettingsController@paymentform');
Route::get('admin/settings/info', 'SettingsController@aboutform');
Route::get('admin/settings/footer', 'SettingsController@footerform');

Route::post('admin/settings/title', 'SettingsController@title');
Route::post('admin/settings/payment', 'SettingsController@payment');
Route::post('admin/settings/about', 'SettingsController@about');
Route::post('admin/settings/address', 'SettingsController@address');
Route::post('admin/settings/footer', 'SettingsController@footer');
Route::post('admin/settings/logo', 'SettingsController@logo');
Route::post('admin/settings/favicon', 'SettingsController@favicon');
Route::post('admin/settings/background', 'SettingsController@background');
Route::resource('/admin/settings', 'SettingsController');

Route::get('admin/language-settings', 'SettingsController@setlanguage');
Route::post('admin/settings/language', 'SettingsController@language');

Route::get('admin/theme-color', 'SettingsController@themecolors');
Route::post('admin/theme-color', 'SettingsController@themecolor');

Route::get('/admin/blog/titles', 'BlogController@titleform');
Route::post('/admin/blog/titles', 'BlogController@titles');
Route::resource('/admin/blog', 'BlogController');

Route::resource('/admin/sliders', 'SliderController');
Route::resource('/admin/staffs', 'StaffController');

Route::get('/admin/service/titles', 'ServiceSectionController@titlesform');
Route::post('/admin/service/title', 'ServiceSectionController@titles');
Route::resource('/admin/service', 'ServiceSectionController');

Route::get('/admin/testimonial/titles', 'TestimonialController@titlesform');
Route::post('/admin/testimonial/titles', 'TestimonialController@titles');
Route::resource('/admin/testimonial', 'TestimonialController');

Route::post('/admin/package/titles', 'PackageController@titles');
Route::resource('/admin/package', 'PackageController');

Route::get('/admin/campaign/pending', 'CampaignController@pending');
Route::get('/admin/campaign/{id}/pending', 'CampaignController@pendingview');
Route::get('/admin/campaign/{id}/accept', 'CampaignController@accept');
Route::get('/admin/campaign/{id}/reject', 'CampaignController@reject');
Route::get('/admin/campaign/{id}/hardreject', 'CampaignController@hardreject');

Route::get('/admin/campaign/titles', 'CampaignController@title');
Route::post('/admin/campaign/titles', 'CampaignController@titles');
Route::get('/admin/campaign/{id}/delete', 'CampaignController@delete');
Route::get('/admin/campaign/{id}/open', 'CampaignController@open');
Route::get('/admin/campaign/{id}/close', 'CampaignController@close');
Route::get('/admin/campaign/{id}/withdraw', 'CampaignController@withdraw');
Route::post('/admin/campaign/{id}/withdraw', 'CampaignController@withdraws');
Route::resource('/admin/campaign', 'CampaignController');

Route::resource('/admin/counter', 'CounterController');

Route::get('/admin/portfolio/titles', 'PortfolioController@titlesform');
Route::post('/admin/portfolio/titles', 'PortfolioController@titles');
Route::resource('/admin/portfolio', 'PortfolioController');

Route::get('/admin/volunteer/titles', 'VolunteerController@titlesform');
Route::post('/admin/volunteer/titles', 'VolunteerController@titles');
Route::resource('/admin/volunteer', 'VolunteerController');

Route::get('/admin/category/titles', 'CategoryController@titlesform');
Route::post('/admin/category/titles', 'CategoryController@titles');
Route::resource('/admin/category', 'CategoryController');

Route::resource('/admin/services', 'ServiceController');

Route::get('admin/faq/{id}/edit', 'PageSettingsController@faqedit');

Route::get('admin/faq/add', 'PageSettingsController@addfaq');
Route::get('admin/faq/{id}/delete', 'PageSettingsController@faqdelete');
Route::get('admin/faq/{id}/edit', 'PageSettingsController@faqedit');
Route::post('admin/faq/{id}/update', 'PageSettingsController@faqupdate');
Route::post('admin/pagesettings/faqsave', 'PageSettingsController@faqsave');

Route::get('admin/pagesettings/splits', 'PageSettingsController@splits');
Route::get('admin/pagesettings/brands', 'PageSettingsController@brands');
Route::get('admin/brand/create', 'PageSettingsController@brandform');
Route::post('admin/brand/save', 'PageSettingsController@brandstore');
Route::get('admin/brand/delete/{id}', 'PageSettingsController@branddelete');
Route::get('admin/split/{id}/edit', 'PageSettingsController@splitedit');
Route::post('admin/splits/{id}/edit', 'PageSettingsController@splitupdate');
Route::get('admin/pagesettings/about', 'PageSettingsController@aboutpage');
Route::get('admin/pagesettings/faq', 'PageSettingsController@faqpage');
Route::get('admin/pagesettings/contact', 'PageSettingsController@contactpage');
Route::post('admin/pagesettings/about', 'PageSettingsController@about');
Route::post('admin/pagesettings/faq', 'PageSettingsController@faq');
Route::post('admin/pagesettings/contact', 'PageSettingsController@contact');
Route::resource('/admin/pagesettings', 'PageSettingsController');

Route::get('admin/ads/status/{id}/{status}', 'AdvertiseController@status');

Route::resource('/admin/ads', 'AdvertiseController');
Route::resource('/admin/social', 'SocialLinkController');

Route::get('/admin/tools/meta', 'SeoToolsController@metaform');
Route::post('/admin/tools/meta', 'SeoToolsController@metaupdate');
Route::resource('/admin/tools/google', 'SeoToolsController');
Route::get('admin/subscribers/download', 'SubscriberController@download');

Route::resource('/admin/subscribers', 'SubscriberController');
Route::post('/admin/adminpassword/change/{id}', 'AdminProfileController@changepass');
Route::get('/admin/adminpassword', 'AdminProfileController@password');
Route::resource('/admin/adminprofile', 'AdminProfileController');

Route::get('/admin/withdraws/accept/{id}', 'AdminWithdrawController@accept');
Route::get('/admin/withdraws/reject/{id}', 'AdminWithdrawController@reject');
Route::resource('/admin/withdraws', 'AdminWithdrawController');

Route::get('/admin/users/email/{id}', 'UsersController@email');
Route::get('/admin/users/status/{id}/{status}', 'UsersController@status');
Route::post('/admin/users/emailsend', 'UsersController@sendemail');
Route::resource('/admin/users', 'UsersController');

Route::post('/payment', 'PaymentController@store')->name('payment.submit');
Route::get('/payment/cancle', 'PaymentController@paycancle')->name('payment.cancle');
Route::get('/payment/return', 'PaymentController@payreturn')->name('payment.return');
Route::post('/payment/notify', 'PaymentController@notify')->name('payment.notify');

Route::post('/stripe-submit', 'StripeController@store')->name('stripe.submit');

Route::get('user/dashboard', 'UserProfileController@index')->name('user.dashboard');

Route::post('/user/password/change/{id}', 'UserProfileController@changepass');
Route::get('/user/password', 'UserProfileController@password');
Route::get('/user/profile', 'UserProfileController@profile');
Route::post('/user/update/{id}', 'UserProfileController@update');

Route::get('/user/campaign/{id}/delete', 'UserCampaignController@delete');
Route::get('/user/campaign/{id}/open', 'UserCampaignController@open');
Route::get('/user/campaign/{id}/close', 'UserCampaignController@close');
Route::get('/user/campaign/{id}/withdraw', 'UserCampaignController@withdraw');
Route::post('/user/campaign/{id}/withdraw', 'UserCampaignController@withdraws');
Route::resource('user/campaign', 'UserCampaignController');

Route::get('/user/login', 'Auth\ProfileLoginController@showLoginFrom')->name('user.login');
Route::post('/user/login', 'Auth\ProfileLoginController@login')->name('user.login.submit');
Route::get('/user/registration', 'Auth\ProfileRegistrationController@showRegistrationForm')->name('user.reg');
Route::post('/user/registration', 'Auth\ProfileRegistrationController@register')->name('user.reg.submit');

Route::get('/user/forgot', 'Auth\ProfileResetPassController@showForgotForm')->name('user.forgotpass');
Route::post('/user/forgot', 'Auth\ProfileResetPassController@resetPass')->name('user.forgotpass.submit');


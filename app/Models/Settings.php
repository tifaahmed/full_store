<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable=[
        'vendor_id',
        'currency',
        'currency_position',
        'maintenance_mode',
        'checkout_login_required',
        'logo',
        'favicon',
        'delivery_type',
        'timezone',
        'address',
        'email',
        'description',
        'contact',
        'copyright',
        'website_title',
        'meta_title',
        'meta_description',
        'og_image',
        'mail_driver',
        'mail_host',
        'mail_port',
        'mail_username',
        'mail_password',
        'mail_encryption',
        'mail_fromname',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'linkedin_link',
        'whatsapp_widget',
        'whatsapp_message',
        'telegram_message',
        'telegram_access_token',
        'telegram_chat_id',
        'item_message',
        'language',
        'template',
        'template_type',
        'primary_color',
        'secondary_color',
        'landing_website_title',
        'custom_domain',
        'cname_title',
        'cname_text',
        'interval_time',
        'interval_type', 
        'time_format',
        'banner',  
        'tracking_id',  
        'view_id', 
        'firebase',  
        'cover_image', 
        'notification_sound',  
        'recaptcha_version', 
        'facebook_client_id',
        'facebook_client_secret',
        'facebook_redirect_url',
        'google_client_id', 
        'google_client_secret',
        'google_redirect_url',
        'google_recaptcha_site_key', 
        'google_recaptcha_secret_key', 
        'score_threshold', 'cookie_text',
        'cookie_button_text', 
        'facebook_login', 
        'google_login', 
        'subscribe_background', 
        'created_at', 
        'updated_at', 
        'pixel_header', 
        'pixel_footer', 
        'home_background_color',
        'footer_background' 
    ];
    public function getfooterBackgroundFirstAttribute() { // footer_background_first footerBackgroundFirst 
        return isset($this->footer_background) ? json_decode($this->footer_background)[0] : null ;
    }
    public function getfooterBackgroundSecondAttribute() { // footer_background_second footerBackgroundSecond
        return isset($this->footer_background) ? json_decode($this->footer_background)[1] : null ;
    }
}

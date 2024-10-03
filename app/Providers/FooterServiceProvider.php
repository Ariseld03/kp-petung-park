<?php

namespace App\Providers;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use App\Models\Generic;
class FooterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $footerData = [];
        $footerData = Generic::where('status',1)->get();
        $footerInfo = [
            'instagram' => null,
            'whatsapp' => null,
            'tiktok' => null,
            'alamat' => null,
            'youtube' => null,
            'websiteDesa' => null,
        ];

        // Loop through the data and assign values
        foreach ($footerData as $item) {
            switch ($item->key) {
                case 'sosial_media_instagram':
                    $footerInfo['instagram'] = $item->value; // Instagram link
                    $footerInfo['instagram_logo'] = $item->icon_picture_link; // Instagram logo
                    break;
                case 'kontak_whatsapp':
                    $footerInfo['whatsapp'] = $item->value; // WhatsApp link
                    $footerInfo['whatsapp_logo'] = $item->icon_picture_link; // WhatsApp logo
                    break;
                case 'sosial_media_tiktok':
                    $footerInfo['tiktok'] = $item->value; // TikTok link
                    $footerInfo['tiktok_logo'] = $item->icon_picture_link; // TikTok logo
                    break;
                case 'sosial_media_youtube':
                    $footerInfo['youtube'] = $item->value; 
                    $footerInfo['youtube_logo'] = $item->icon_picture_link;
                    break;
                case 'link_tautan_website_desa':
                    $footerInfo['websiteDesa'] = $item->value; 
                    break;
                case 'alamat_petung_park_trawas':
                    $footerInfo['alamat'] = $item->value; 
                    break;
            }
        }
        // dd($footerInfo);
        view()->share('footerInfo', $footerInfo);
    }
    
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */

}

<?php

namespace App\Providers;

use App\Models\Content;
use App\Models\Setting;
use App\Services\FrontendServices;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('*',function($view){
            $settings = $this->getPageEssentials();

            $view->with('settings' , collect($settings))
                ->with('genelAyarlar',Setting::select('key','value')
                    ->where('segment','genel')->get())
                ->with('nasilDesteklerim',Content::where('parent_id',8)
                    ->orWhere('parent_id',10)->where('type','pages')->where('status',true)
                    ->where('show_on_footer',true))
                ->with('nelerYapiyoruz',Content::where('parent_id',28)
                    ->where('type','pages')->where('status',true)
                    ->where('show_on_footer',true));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function getPageEssentials()
    {
        $frontend                = new FrontendServices;
        $settings['meta']        = $frontend->setting('meta');
        $settings['seo']         = $frontend->setting('seo');
        $settings['genel']       = $frontend->setting('genel');
        $settings['breadcrumbs'] = $frontend->breadcrumb();

        return $settings;
    }


}

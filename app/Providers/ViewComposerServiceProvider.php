<?php

namespace App\Providers;

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
            $view->with('settings' , collect($settings));
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
        $frontend = new FrontendServices;
        $settings['meta'] = $frontend->setting('meta');
        $settings['seo'] = $frontend->setting('seo');
        $settings['genel'] = $frontend->setting('genel');
        $settings['destekler'] = $frontend->footerLinks_howToSupport();
        $settings['neYapiyoruz'] = $frontend->footerLinks_whatWeDo();

        return $settings;
    }
}

<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use App\Models\Location;
use App\Models\Page;
use App\Models\PropertyType;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        $general = GeneralSetting::first();


        view()->share('general', $general);

        $urlSections = [];

        $jsonUrl = resource_path('views/') . 'sections.json';

        $urlSections = array_filter(json_decode(file_get_contents($jsonUrl), true));

        $pages = Page::where('name', '!=', 'home')->where('status', 1)->get();

        $locations = Location::latest()->get();
        $types = PropertyType::latest()->get();
        view()->share('locations', $locations);
        view()->share('types',  $types);
        view()->share('pages', $pages);
        view()->share('urlSections', $urlSections);
    }

    function removeSpecialChar($str)
    {

        $res = trim(str_replace(array(
            '[', ']',
            '\''
        ), '', $str));
        return $res;
    }
}

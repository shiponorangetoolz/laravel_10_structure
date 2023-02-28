<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // get all data from menu.json file
        $verticalMenuJson = file_get_contents(base_path('resources/data/menu-data/verticalMenu.json'));
        $verticalMenuData = json_decode($verticalMenuJson);
        $horizontalMenuJson = file_get_contents(base_path('resources/data/menu-data/horizontalMenu.json'));
        $horizontalMenuData = json_decode($horizontalMenuJson);

        // get all data from admin-menu.json file
        $adminVerticalMenuJson = file_get_contents(base_path('resources/data/admin-menu-data/adminVerticalMenu.json'));
        $adminVerticalMenuData = json_decode($adminVerticalMenuJson);
        $adminHorizontalMenuJson = file_get_contents(base_path('resources/data/admin-menu-data/adminHorizontalMenu.json'));
        $adminHorizontalMenuData = json_decode($adminHorizontalMenuJson);

        // Share all menuData to all the views
        \View::share('menuData',[$verticalMenuData, $horizontalMenuData]);
        \View::share('adminMenuData',[$adminVerticalMenuData, $adminHorizontalMenuData]);
    }
}

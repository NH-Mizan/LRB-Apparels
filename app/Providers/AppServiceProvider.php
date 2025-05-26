<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use App\Models\GeneralSetting;
use App\Models\SocialMedia;
use App\Models\Contact;
use App\Models\CreatePage;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\About;
use Config;
use Session;

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

        view()->composer('*', function ($view) {

            $blogcategories = BlogCategory::get();
             view()->share('blogcategories',$blogcategories);

            $categories = Category::get();
             view()->share('categories'. $categories);

             $socialicons =  SocialMedia::where('status', 1)->get();
             view()->share('socialicons',$socialicons);


            $generalsetting = Cache::remember('generalsetting', now()->addDays(7), function () {
                return GeneralSetting::where('status', 1)->first();
            });

            $contact = Cache::remember('contact', now()->addDays(7), function () {
                return Contact::where('status', 1)->first();
            });

          
            

            $pages = Cache::remember('pages', now()->addDays(7), function () {
                return CreatePage::where('status', 1)->get();
            });

            $recentblogs = Cache::remember('recentblogs', now()->addDays(7), function () {
                return Blog::where('status', 1)->orderBy('id', 'DESC')->get();
            });

            $topblogs = Cache::remember('topblogs', now()->addDays(7), function () {
                return Blog::where('status', 1)->orderBy('id', 'DESC')->limit(5)->get();
            });


            $footeraddress = Cache::remember('about', now()->addDays(7), function () {
                return About::where('status', 1)->first();
            });

            $view->with([
                'pages' => $pages,
                'contact' => $contact,
                'topblogs' => $topblogs,
                'recentblogs' => $recentblogs,
                'categories' => $categories,
                'footeraddress' => $footeraddress,
                'generalsetting' => $generalsetting,
            ]);
        });
    }
}

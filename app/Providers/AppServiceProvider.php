<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\Category;
use App\Models\News;
use App\Models\User;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
          /**
     * NIVEL DE ACESSO 
     */

        Gate::define('acess', function (User $user) {
            return $user->acesso === 1;
        });

     /**
     * FIM DO NIVEL DE ACESSO
     */
        Paginator::useBootstrapFive();

        $categoria = Category::all();
        view()->share('categoria', $categoria);

        $desNews = News::orderBy('id','desc')->skip(5)->limit(3)->get();
        view()->share('desNews', $desNews);

        $listNews = News::all();
        $listNews = count($listNews);
        view()->share('listNews', $listNews);

        $listCategory = Category::all();
        $listCategory = count($listCategory);
        view()->share('listCategory', $listCategory);

       


    }
}
    
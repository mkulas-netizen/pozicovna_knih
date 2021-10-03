<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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

        Blade::directive('is_borrowed', function ($book){
            return "<?php if($book == true  ) : ?>";
        });

        Blade::directive('borrowed_else',function (){
            return "<?php else : ?>";
        });

        Blade::directive('borrowed_end', function() {
            return "<?php endif; ?>";
        });

        Paginator::useBootstrap();
    }
}

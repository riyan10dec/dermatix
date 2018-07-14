<?php namespace App\Modules\Articles\Providers;

use App\Modules\Articles\Models\Article;
use App\Modules\Main\Observers\FileObserver;
use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider
{

    public function boot()
    {
        // Observers
        //Article::observe(new FileObserver);
    }

    public function register()
    {



    }
}

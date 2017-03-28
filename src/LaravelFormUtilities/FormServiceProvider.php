<?php

namespace DanSmith\LaravelFormUtilities;

use DanSmith\Form\PersistsWhenResolved;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'form');
    }

    public function register()
    {
        $this->app->afterResolving(function(PersistsWhenResolved $resolved) {
            $resolved->persist();
        });
    }
}

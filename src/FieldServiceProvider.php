<?php

namespace Kraftbit\NovaTinymce5Editor;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-tinymce5-editor', __DIR__.'/../dist/js/field.js');
            Nova::style('nova-tinymce5-editor', __DIR__.'/../dist/css/field.css');
        });

        $this->publishes([
            __DIR__.'/../config/nova-tinymce5-editor.php' => config_path('nova-tinymce5-editor.php'),
        ], 'config');
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}

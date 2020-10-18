<?php

namespace Dipenparmar12\ImportCsv;

use Dipenparmar12\ImportCsv\Commands\CsvLoadFileCommand;
use Dipenparmar12\ImportCsv\Commands\LargeCsvLoadCommand;
use Illuminate\Support\ServiceProvider;

class ImportCsvServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/importcsv.php', 'importcsv');

        // Register the service the package provides.
        $this->app->singleton('importcsv', function ($app) {
            return new ImportCsv;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['importcsv'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/importcsv.php' => config_path('importcsv.php'),
        ], 'importcsv.config');

        // Registering package commands.
        $this->commands([
            LargeCsvLoadCommand::class,
            CsvLoadFileCommand::class,
        ]);
    }
}

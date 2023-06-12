<?php

namespace Drewlabs\Envoyer\Laravel;

use Drewlabs\Envoyer\DriverRegistryFacade;
use Drewlabs\Envoyer\Drivers;
use Drewlabs\Envoyer\Utils\StackDriver;
use Illuminate\Support\ServiceProvider as AbstractServiceProvider;
use Illuminate\Contracts\Config\Repository;

class ServiceProvider extends AbstractServiceProvider
{
    /**
     * Boot application services and configurations
     * 
     * @return void 
     */
    public function boot()
    {

        $this->publishes([
            __DIR__ . '/config' => $this->app->basePath('config'),
        ], 'envoyer');

        // Configure stack driver for the notification
        // we do not override in case library user provides his or her own implementation of the stack driver
        DriverRegistryFacade::defineDriver(Drivers::STACK, function () {
            /**
             * @var Repository
             */
            $config = $this->app->make('config');
            $drivers = $config->get('envoyer.stack.drivers', []);
            return StackDriver::new(is_string($drivers) ? array_map(function ($item) {
                return trim($item);
            }, explode(',', $drivers)) : ($drivers ?? []));
        });
    }

    /**
     * Register application services
     * 
     * @return void 
     */
    public function register()
    {
        // TODO : Register application services
    }
}

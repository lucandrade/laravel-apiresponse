<?php

/*
* This file is part of Api Response Laravel.
*
* (c) Lucas Andrade <lucas.andrade.oliveira@hotmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Lucandrade\ApiResponse;

use Illuminate\Support\ServiceProvider;

/**
 * @author     Lucas Andrade <lucas.andrade.oliveira@hotmail.com>
 * @since      2015-08-26
 *
 * @copyright  Lucandrade\ApiResponse
 */
class ApiResponseServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $source = realpath(__DIR__.'/config/apiresponse.php');
        $this->publishes([$source => config_path('apiresponse.php')], 'config');
        $this->mergeConfigFrom($source, 'apiresponse');
    }

    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->singleton('apiresponse', function ($app) {
            return new \Lucandrade\ApiResponse\Responses\ApiResponse();
        });
    }
}

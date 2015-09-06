<?php

/*
 * This file is part of JWT Laravel.
 *
 * (c) Lucas Andrade <lucas.andrade.oliveira@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lucandrade\ApiResponse\Lumen;

use Lucandrade\ApiResponse\ApiResponseServiceProvider as BaseProvider;

class ApiResponeServiceProvider extends BaseProvider
{
    
    /**
     * @author Lucas Andrade <lucas.andrade.oliveira@hotmail.com>
     * @return void
     */
    public function boot()
    {

    }

    /**
     * @author Lucas Andrade <lucas.andrade.oliveira@hotmail.com>
     * @return void
     */
    public function register()
    {
        parent::register();
        $this->registerConfiguration();
    }

    /**
     * @author Lucas Andrade <lucas.andrade.oliveira@hotmail.com>
     * @return void
     */
    public function registerConfiguration()
    {
        if (!class_exists("ApiResponse")) {
            class_alias('Lucandrade\ApiResponse\Facades\ApiResponse', 'ApiResponse');
        }
        $this->app->configure('apiresponse');
    }
}

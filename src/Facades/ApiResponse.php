<?php

/*
* This file is part of Api Response Laravel.
*
* (c) Lucas Andrade <lucas.andrade.oliveira@hotmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Lucandrade\ApiResponse\Facades;

use Illuminate\Support\Facades\Facade;

class ApiResponse extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'apiresponse';
    }
}

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

class ApiResponseConfig
{
    public static function get()
    {
    	$config = config("apiresponse");
    	if(empty($config)) {
    		throw new \Exception("ApiResponse: configuration file not found");
    	} else {
    		return $config;
    	}
    }
}

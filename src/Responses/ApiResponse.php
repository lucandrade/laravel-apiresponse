<?php

/*
* This file is part of Api Response Laravel.
*
* (c) Lucas Andrade <lucas.andrade.oliveira@hotmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Lucandrade\ApiResponse\Responses;

use Lucandrade\ApiResponse\Responses\ResponseAbstract;
use Lucandrade\ApiResponse\ApiResponseConfig;

/**
 * Classe responsável criar response
 *
 * @package    Lucandrade\ApiResponse
 *
 * @author     Lucas Andrade <lucas.andrade.oliveira@hotmail.com>
 * @since      2015-08-26
 *
 * @copyright  Lucandrade\ApiResponse
 */
class ApiResponse extends ResponseAbstract
{
    public function get()
    {
        $data = $this->getResponseData();
        $response = response()->json($data, $this->getStatusCode());
        $headers = $this->getHeaders();
        foreach ($headers as $header => $value) {
            $response->header($header, $value);
        }
        return $response;
    }

    protected function getResponseData()
    {
        $config = ApiResponseConfig::get();
        $data[$config["keys"]["status"]] = $this->getStatus();
        $data[$config["keys"]["payload"]] = $this->getPayload();
        $data[$config["keys"]["status_message"]] = $this->getStatusMessage();
        $data[$config["keys"]["time"]] = date('Y-m-d H:i:s');
        $data[$config["keys"]["request_code"]] = $this->getRequestCode();
        return $data;
    }
}

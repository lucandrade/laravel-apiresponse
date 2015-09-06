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

/**
 * @package    Lucandrade\ApiResponse
 *
 * @author     Lucas Andrade <lucas.andrade.oliveira@hotmail.com>
 * @since      2015-08-26
 *
 * @copyright  Lucandrade\ApiResponse
 */
abstract class ResponseAbstract
{
    protected $statusCode = 200;
    protected $payload = "";
    protected $status = true;
    protected $statusMessage = "";
    protected $requestCode = 0;
    protected $headers = [];

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setAsFail()
    {
        $this->status = false;
        return $this;
    }

    public function setAsSuccess()
    {
        $this->status = true;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setPayload($payload)
    {
        $this->payload = $payload;
        return $this;
    }

    public function getPayload()
    {
        return $this->payload;
    }

    public function setStatusMessage($statusMessage)
    {
        $this->statusMessage = $statusMessage;
        return $this;
    }

    public function getStatusMessage()
    {
        return $this->statusMessage;
    }

    public function setRequestCode($requestCode)
    {
        $this->requestCode = $requestCode;
        return $this;
    }

    public function getRequestCode()
    {
        return $this->requestCode;
    }

    public function setHeaders(array $header)
    {
        $this->headers = array_merge($this->getHeaders(), $header);
        return $this;
    }

    public function setHeader($key, $value)
    {
        $this->headers[$key] = $value;
        return $this;
    }

    public function removeHeader($key)
    {
        if (isset($this->getHeaders()[$key])) {
            unset($this->headers[$key]);
        }
        return $this;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    abstract public function get();
}

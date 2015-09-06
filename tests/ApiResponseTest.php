<?php

use \Lucandrade\ApiResponse\Responses\ApiResponse;

/**
 * Credentials Test
 * @author     Lucas Andrade <lucas.andrade.oliveira@hotmail.com>
 */
class ApiResponseTest extends PHPUnit_Framework_TestCase
{

    protected $class;

    public function setUp()
    {
        parent::setUp();
        $this->class = new ApiResponse();
    }

    public function testPayload()
    {
        $payload = "payload";
        $this->class->setPayload($payload);
        $this->assertEquals($payload, $this->class->getPayload());
    }

    public function testStatusCode()
    {
        $code = 200;
        $this->class->setStatusCode($code);
        $this->assertEquals($code, $this->class->getStatusCode());
    }

    public function testHeaders()
    {
        $this->class->setHeader("header1", "value1");
        $this->class->setHeaders([
            "header2" => "value2"
        ]);
        $this->assertEquals([
            "header1" => "value1",
            "header2" => "value2"
        ], $this->class->getHeaders());
        $this->class->removeHeader("header2");
        $this->assertEquals([
            "header1" => "value1"
        ], $this->class->getHeaders());
    }

    public function testStatusMessage()
    {
        $message = "test message";
        $this->class->setStatusMessage($message);
        $this->assertEquals($message, $this->class->getStatusMessage());
    }

    public function testSuccess()
    {
        $this->class->setAsFail();
        $this->assertEquals(false, $this->class->getStatus());
        $this->class->setAsSuccess();
        $this->assertEquals(true, $this->class->getStatus());
    }

    public function testRequestCode()
    {
        $code = 123;
        $this->class->setRequestCode($code);
        $this->assertEquals($code, $this->class->getRequestCode());
    }
}

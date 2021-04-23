<?php

use Itech\Controller\UserController;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class UserTest extends TestCase
{

    public function testRegisterPostWithGoodParams(){
        $_POST = [
            "Itech" => [
                "User" => [
                    "firstName" => "jean-luc",
                    "lastName" => "Deshayes",
                    "email" => "jeanluc.deshayes92@gmail.com",
                    "password" => "123456"
                ]
            ]
                ];
        $request = Request::createFromGlobals();
        $request->setMethod(Request::METHOD_POST);

        $controller = new UserController();
        $response = $controller->register($request);

        $this->assertEquals(200 , $response->getStatusCode());
    }

    public function testRegisterGetForm(){
        $request = Request::createFromGlobals();
        $request->setMethod(Request::METHOD_GET);

        $controller = new UserController();
        $response = $controller->register($request);

        $this->assertEquals(200 , $response->getStatusCode());
        $this->assertStringContainsString('<!doctype html>' , $response->getContent());
    }
}
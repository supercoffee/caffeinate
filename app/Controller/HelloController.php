<?php


namespace App\Controller;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HelloController
{

    public function hello(ServerRequestInterface $request, ResponseInterface $response) {
        $name  = $request->getQueryParams()['name'];
        $response->getBody()->write("hello $name");
        return $response;
    }


}
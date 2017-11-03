<?php


namespace App\Controller;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HelloController
{

    public function hello(ServerRequestInterface $request, ResponseInterface $response) {
        $response->getBody()->write('hello world');
        return $response;
    }


}
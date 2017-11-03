<?php
require __DIR__.'/../vendor/autoload.php';

use App\Controller\HelloController;
use League\Container\Container;
use League\Container\ReflectionContainer;
use League\Route\RouteCollection;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequestFactory;

$container = new Container();
$container->delegate(new ReflectionContainer());

$container->share(RouteCollection::class, function() use ($container) {
    return new RouteCollection($container);
});

$container->share('response', Response::class);
$container->share('request', function () {
    return ServerRequestFactory::fromGlobals(
        $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
    );
});

$container->share('emitter', Zend\Diactoros\Response\SapiEmitter::class);

/** @var RouteCollection $router */
$router = $container->get(RouteCollection::class);

$router->map('GET', '/hello', [$container->get(HelloController::class), 'hello']);

$response = $router->dispatch($container->get('request'), $container->get('response'));

$container->get('emitter')->emit($response);

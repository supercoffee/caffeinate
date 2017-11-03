<?php

namespace Caffeinate;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class StripTagsMiddleWare
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        $params = $request->getQueryParams();

        $safe = array_map(function($unsafeValue) {
            return strip_tags($unsafeValue);
        }, $params);

        $request = $request->withQueryParams($safe);

        return $next($request, $response);
    }


}
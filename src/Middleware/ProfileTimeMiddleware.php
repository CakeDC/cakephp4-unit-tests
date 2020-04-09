<?php
declare(strict_types=1);

namespace App\Middleware;

use Cake\I18n\Number;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * ProfileTime middleware
 */
class ProfileTimeMiddleware implements MiddlewareInterface
{
    /**
     * Process method.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request The request.
     * @param \Psr\Http\Server\RequestHandlerInterface $handler The request handler.
     * @return \Psr\Http\Message\ResponseInterface A response.
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $now = microtime(true);
        $response = $handler->handle($request);
        $time = (microtime(true) - $now) * 1000;

        return $response->withHeader('X-Profile-Time', Number::precision($time, 2) . ' ms');
    }
}

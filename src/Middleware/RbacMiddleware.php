<?php
declare(strict_types=1);

namespace App\Middleware;

use Authorization\AuthorizationService;
use Authorization\Controller\Component\AuthorizationComponent;
use Authorization\Exception\ForbiddenException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Rbac middleware
 */
class RbacMiddleware implements MiddlewareInterface
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
        /**
         * @var AuthorizationService $authorization
         */
        $authorization = $request->getAttribute('authorization');
        $identity = $request->getAttribute('identity');

        if (
            $identity &&
            !$authorization->can($request->getAttribute('identity'), 'access', $request)
        ) {
            throw new ForbiddenException();
        }

        return $handler->handle($request);
    }
}

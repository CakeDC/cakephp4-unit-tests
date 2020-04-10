<?php
namespace App\Test\TestCase\Middleware;

use App\Middleware\ProfileTimeMiddleware;
use App\Test\TestRequestHandler;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\TestSuite\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Test Case
 */
class ProfileTimeMiddlewareTest extends TestCase
{
    public function testInvokeShouldAddNewHeader()
    {
        $request = new ServerRequest();
        $profileTimeMiddleware = new ProfileTimeMiddleware();
        $handler = new TestRequestHandler();
        $result = $profileTimeMiddleware->process($request, $handler);
        $header = $result->getHeader('X-Profile-Time');
        $this->assertNotNull($header);
        $this->assertRegExp('/^\d\.\d\d ms/', reset($header));
    }
}

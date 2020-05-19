<?php

namespace App\Auth;

use App\Policy\RequestPolicy;
use App\Policy\SuperuserPolicy;
use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Authorization\AuthorizationService;
use Authorization\AuthorizationServiceInterface;
use Authorization\AuthorizationServiceProviderInterface;
use Authorization\Policy\MapResolver;
use Authorization\Policy\OrmResolver;
use Authorization\Policy\ResolverCollection;
use Cake\Http\ServerRequest;
use Psr\Http\Message\ServerRequestInterface;

class AppAuth implements AuthenticationServiceProviderInterface, AuthorizationServiceProviderInterface
{
    public function getAuthenticationService(ServerRequestInterface $request): AuthenticationServiceInterface
    {
        $authenticationService = new AuthenticationService([
            'unauthenticatedRedirect' => '/users/login',
            'queryParam' => 'redirect',
        ]);

        // Load identifiers, ensure we check email and password fields
        $authenticationService->loadIdentifier('Authentication.Password', [
            'fields' => [
                'username' => 'email',
                'password' => 'password',
            ],
        ]);

        // Load the authenticators, you want session first
        $authenticationService->loadAuthenticator('Authentication.Session');
        // Configure form data check to pick email and password
        $authenticationService->loadAuthenticator('Authentication.Form', [
            'fields' => [
                'username' => 'email',
                'password' => 'password',
            ],
            'loginUrl' => '/users/login',
        ]);

        return $authenticationService;
    }

    public function getAuthorizationService(ServerRequestInterface $request): AuthorizationServiceInterface
    {
        return new AuthorizationService(new OrmResolver());
    }
}

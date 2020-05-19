<?php
namespace App\Policy;

use Authorization\IdentityInterface;
use Authorization\Policy\RequestPolicyInterface;
use Cake\Core\InstanceConfigTrait;
use Cake\Http\ServerRequest;
use Cake\Utility\Hash;

class RequestPolicy implements RequestPolicyInterface
{

    public function canSkipAuthorization(IdentityInterface $identity, ServerRequest $request)
    {
        if (in_array($request->getRequestTarget(), [
            '/',
            '/users/login',
            '/users/logout',
            '/users/register',
        ])) {
            return true;
        }
        return false;
    }

    public function canAccess(?IdentityInterface $identity, ServerRequest $request)
    {
        return false;
    }
}

<?php
namespace App\Auth;

use Cake\Auth\BaseAuthorize;
use Cake\Http\ServerRequest;

class SuperuserAuthorize extends BaseAuthorize
{
    /**
     * Superuser authorized to all actions
     *
     * @param array|\ArrayAccess $user
     * @param ServerRequest $request
     * @return bool
     */
    public function authorize($user, ServerRequest $request): bool
    {
        return $user['is_superuser'] === true;
    }
}

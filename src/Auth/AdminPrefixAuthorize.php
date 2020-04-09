<?php
namespace App\Auth;

use Cake\Auth\BaseAuthorize;
use Cake\Http\ServerRequest;

class AdminPrefixAuthorize extends BaseAuthorize
{
    /**
     * Admin access blocked, other granted
     *
     * @param array|\ArrayAccess $user
     * @param ServerRequest $request
     * @return bool
     */
    public function authorize($user, ServerRequest $request): bool
    {
        return $request->getParam('prefix') !== 'admin';
    }
}

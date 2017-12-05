<?php

namespace Tests;

use App\Models\User;
use JWTAuth;


/**
 * Trait AuthorizedUser
 *
 * @mixin TestCase
 * @package Tests
 */
trait AuthenticatedRequests {
    /**
     * @var User
     */
    protected $authUser;

    protected function login(User $user)
    {
        $this->authUser = $user;
        return $this;
    }

    protected function loginSimpleUser()
    {
        $this->authUser = factory(User::class)->create([
            'status' => 1,
        ]);

        return $this;
    }


    protected function logout()
    {
        $this->authUser = null;
        return $this;
    }


    public function json($method, $uri, array $data = [], array $headers = [])
    {
        $authHeaders = [];
        if ($this->authUser) {
            $token = JWTAuth::fromUser($this->authUser);
            $authHeaders['Authorization'] = "Bearer {$token}";
        }

        return parent::json($method, $uri, $data, array_merge($authHeaders, $headers));
    }
}

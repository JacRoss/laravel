<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class AdminMiddleware
 * @package App\Http\Middleware
 * @property \Illuminate\Http\Request $request
 */
class AdminMiddleware
{
    private const ADMIN_USERNAME = 'admin';
    private const PASSWORD_HASH = '7c4a8d09ca3762af61e59520943dc26494f8941b';
    private $request;


    public function handle($request, Closure $next)
    {
        $this->request = $request;

        if (!$this->validAdmin()) {
            return response(null, 401);
        }

        return $next($request);
    }

    private function validAdmin(): bool
    {
        return $this->hasAdmin() && $this->passwordValid();
    }

    private function hasAdmin(): bool
    {
        return $this->request->header('X-UserName') === self::ADMIN_USERNAME;
    }

    private function passwordValid(): bool
    {
        return sha1($this->request->header('X-Password')) == self::PASSWORD_HASH;
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use function Psy\sh;

/**
 * Class AdminMiddleware
 * @package App\Http\Middleware
 * @property \Illuminate\Http\Request $request
 */
class AdminMiddleware
{
    private const ADMIN_USERNAME = 'admin';
    private const PASSWORD = '123456';
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
        return $this->request->header('X-Password') === sha1(self::PASSWORD);
    }
}

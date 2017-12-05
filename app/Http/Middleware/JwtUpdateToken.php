<?php


namespace App\Http\Middleware;


use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JWTAuth;


class JwtUpdateToken
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param null    $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        /** @var Response $response */
        $response = $next($request);
        $token = $request->bearerToken();

        if ($token && auth()->check()) {
            $payload = JWTAuth::getPayload($token);

            $ttl = config('jwt.ttl') * 60;
            $expiry = $payload->get('exp');
            $now = Carbon::now()->timestamp;

            $expired = ($expiry - $now) < $ttl / 4;

            if ($expired) {
                $response->withHeaders(['Api-Token' => JWTAuth::fromUser(auth()->user())]);
            }
        }

        return $response;
    }
}

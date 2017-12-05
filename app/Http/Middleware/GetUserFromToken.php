<?php


namespace App\Http\Middleware;


use Exception;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\JWTAuth;
use Symfony\Component\HttpKernel\Exception\HttpException;


class GetUserFromToken
{
    /**
     * @var Dispatcher
     */
    private $dispatcher;

    /**
     * @var JWTAuth
     */
    private $auth;


    public function __construct(Dispatcher $dispatcher, JWTAuth $auth)
    {
        $this->dispatcher = $dispatcher;
        $this->auth = $auth;
    }


    /**
     * @param Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        $token = $request->input('token', $this->auth->setRequest($request)->getToken());

        if (! $token) {
            $this->error('tymon.jwt.absent', new HttpException(403, 'token_not_provided'));
        }

        $user = null;
        try {
            $user = $this->auth->authenticate($token);
        } catch (TokenExpiredException $e) {
            $this->error('tymon.jwt.expired', new TokenExpiredException('token_expired', $e->getStatusCode()));
        } catch (JWTException $e) {
            $this->error('tymon.jwt.invalid', new JWTException('token_invalid', $e->getStatusCode()), [$e]);
        }

        if (! $user) {
            $this->error('tymon.jwt.user_not_found', new HttpException(404, 'user_not_found'));
        }

        $this->dispatcher->fire('tymon.jwt.valid', $user);

        return $next($request);
    }


    protected function error(string $event, Exception $e, $payload = [])
    {
        $this->dispatcher->fire($event, $payload, true);
        throw $e;
    }
}

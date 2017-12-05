<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if (Str::startsWith($request->getRequestUri(), '/api')) {
            if ($exception instanceof HttpException) {
                $code = $exception->getStatusCode();
            } else {
                $code = 500;
            }

            $response = [
                'message' => $exception->getMessage(),
                'type'    => class_basename($exception),
                'errors'   => null,
            ];

            if (config('app.debug')) {
                $response['line'] = $exception->getLine();
                $response['file'] = $exception->getFile();
                $response['trace'] = $exception->getTrace();
            }

            if ($exception instanceof ValidationException) {
                $response['errors'] = $exception->errors();
                $code = 422;
            }

            if (config('app.debug') && app()->runningUnitTests()) {
                if ($exception instanceof ValidationException) {
                    echo "ValidationException:\n";
                    echo $this->formatValidationErrors($exception), PHP_EOL;
                } elseif ($exception instanceof AuthorizationException || $exception instanceof AccessDeniedHttpException) {
                    echo class_basename($exception), ': ', $exception->getMessage(), "\n\n";
                } else {
                    echo class_basename($exception), " в файле {$exception->getFile()} на строке {$exception->getLine()}:\n\n",
                    $exception->getMessage(), "\n\n", $this->limitTrace($exception->getTraceAsString(), 20), PHP_EOL;
                }
            }

            return response($response, $code);
        }

        return parent::render($request, $exception);
    }

    protected function formatValidationErrors(ValidationException $e)
    {
        $result = '';
        foreach ($e->validator->errors()->messages() as $attr => $errors) {
            $result .= '    ' . $attr . ' => ' . implode(', ', $errors) . PHP_EOL;
        }
        return $result;
    }

    protected function limitTrace($trace, $lines)
    {
        $vendor = base_path('vendor');
        $trace = array_filter(explode(PHP_EOL, $trace), function ($line) use ($vendor) {
            return strpos($line, $vendor) === false;
        });
        return implode(PHP_EOL, array_slice($trace, 0, $lines)) . "\n...\n";
    }
}

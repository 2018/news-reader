<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Http\Exceptions\MaintenanceModeException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param \Exception $exception Exception
     *
     * @return void
     */
    public function report(Exception $exception)
    {
        unset($exception);
        //parent::report($exception); //disable error logging
        return true;
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request   Request
     * @param \Exception               $exception Exception
     *
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // handle api exception
        if (!is_null($request->route()) and in_array('api', $request->route()->middleware())) {
            return $this->handleApiExceptions($exception);
        }
        return parent::render($request, $exception);
    }

    /**
     * Handle REST API exceptions
     *
     * @param \Exception $exception Exception
     *
     * @return \Illuminate\Http\Response
     */
    protected function handleApiExceptions(Exception $exception)
    {
        if (($exception instanceof \ErrorException) and (config('app.debug') === false)) {
            return response()->json(['errors' => 'Internal server error.'], 500);
        }
        if ($exception instanceof MaintenanceModeException) {
            return response()->json(['errors' => 'Service unavailable.'], 503);
        }
        if (($exception instanceof ModelNotFoundException)
            or ($exception instanceof NotFoundHttpException)
        ) {
            return response()->json(['errors' => 'Not found.'], 404);
        }
        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json(['errors' => 'Method not allowed.'], 405);
        }
        if (($exception instanceof CustomException)) {
            return response()->json(['errors' => $exception->getMessage()], $exception->getCode());
        }
        if ($exception instanceof UnauthorizedHttpException) {
            return response()->json(['errors' => 'Invalid credentials.'], 401);
        }
        if (($exception instanceof ValidationException)) {
            return response()->json(['data' => $exception->validator->getData(), 'errors' => $exception->validator->errors()->toArray()], 400);
        }
    }
}

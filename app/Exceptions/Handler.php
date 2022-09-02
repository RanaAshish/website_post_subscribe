<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Response;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ThrottleRequestsException && ($request->wantsJson() || $request->is('api/*'))) {
            return response()->json([
                'message' => 'Too many attempts, please slow down the request.',
            ], Response::HTTP_TOO_MANY_REQUESTS);
        }

        if ($exception instanceof UnauthorizedException && ($request->wantsJson() || $request->is('api/*'))) {
            return response()->json([
                'message' => 'You do not have required authorization.',
            ], Response::HTTP_FORBIDDEN);
        }

        if ($exception instanceof NotFoundHttpException && ($request->wantsJson() || $request->is('api/*'))) {
            return response()->json([
                'message' => 'Requested resource does not exist.',
            ], Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof ModelNotFoundException && ($request->wantsJson() || $request->is('api/*'))) {
            return response()->json([
                'message' => 'Requested resource does not exist.',
            ], Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $exception);
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}

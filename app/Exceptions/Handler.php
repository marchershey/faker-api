<?php

namespace App\Exceptions;

use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        $rendered = parent::render($request, $exception);

        // if ($rendered->getStatusCode() == 404) {
        //     return response()->json([
        //         'error' => [
        //             'code' => $rendered->getStatusCode(),
        //         ],
        //     ]);
        // } elseif ($rendered->getStatusCode() == 500) {
        //     return response()->json([
        //         'error' => [
        //             'code' => $rendered->getStatusCode(),
        //             'message' => 'Server Error - This error has been logged and will be fixed.',
        //         ],
        //     ]);
        // }

        return $rendered;
    }
}

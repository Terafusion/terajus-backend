<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Auth\Access\AuthorizationException;
use Throwable;

trait ApiExceptionHandlerTrait
{
    public function handleApiExceptions(Throwable $exception)
    {
        $statusCode = $this->getHttpStatusCode($exception);

        if ($exception instanceof NotFoundHttpException) {
            return $this->generateResponse('Route doesn\'t exist', Response::HTTP_NOT_FOUND);
        } elseif ($exception instanceof AccessDeniedHttpException || $exception instanceof AuthorizationException) {
            return $this->generateResponse('Access denied', Response::HTTP_FORBIDDEN);
        } elseif ($exception instanceof BadRequestHttpException) {
            return $this->generateResponse('Bad request', Response::HTTP_BAD_REQUEST);
        } elseif ($exception instanceof ModelNotFoundException) {
            return $this->generateResponse('Resource not found', Response::HTTP_NOT_FOUND);
        } elseif ($exception instanceof MethodNotAllowedHttpException) {
            return $this->generateResponse('Method not allowed', Response::HTTP_METHOD_NOT_ALLOWED);
        }

        return $this->generateResponse('Server error', Response::HTTP_INTERNAL_SERVER_ERROR, $statusCode);
    }

    private function generateResponse($message, $statusCode, $customStatusCode = null)
    {
        return response()->json([
            'error' => $message,
            'statusCode' => $customStatusCode ?? $statusCode,
        ], $statusCode);
    }

    private function getHttpStatusCode(Throwable $exception)
    {
        $statusCode = method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : Response::HTTP_INTERNAL_SERVER_ERROR;

        return $statusCode;
    }
}

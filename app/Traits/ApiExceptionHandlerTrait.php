<?php

namespace App\Traits;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Passport\Exceptions\AuthenticationException as ExceptionsAuthenticationException;
use Laravel\Passport\Exceptions\OAuthServerException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

trait ApiExceptionHandlerTrait
{
    public function handleApiExceptions(Throwable $exception)
    {
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
        } elseif ($exception instanceof AuthenticationException || $exception instanceof ExceptionsAuthenticationException) {
            return $this->generateResponse('Unauthenticated', Response::HTTP_UNAUTHORIZED);
        } elseif ($exception instanceof ValidationException) {
            return $this->handleValidationException($exception);
        } elseif ($exception instanceof OAuthServerException) {
            return $this->handleOAuthServerException($exception);
        } elseif ($this->isUniqueConstraintViolationException($exception)) {
            $errorMessage = $exception->getMessage();
            $constraintKey = $this->extractConstraintKey($errorMessage);
            return $this->generateResponse("Unique constraint violation for key '$constraintKey'", Response::HTTP_CONFLICT);
        }

        return $this->generateResponse($exception->getMessage() ?? 'Server error', $exception->getCode() ?? Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    private function handleValidationException(ValidationException $exception)
    {
        $errors = $exception->errors();

        return response()->json(['error' => 'Validation error', 'errors' => $errors], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    private function handleOAuthServerException(OAuthServerException $exception)
    {
        return $this->generateResponse($exception->getMessage() ?? 'OAuth Server error', $exception->statusCode() ?? Response::HTTP_BAD_REQUEST);
    }

    private function generateResponse($message, $statusCode)
    {
        return response()->json([
            'error' => $message,
        ], $statusCode);
    }

    private function isUniqueConstraintViolationException(Throwable $exception)
    {
        // Verifica se a exceção é devido a uma violação de chave única (SQLSTATE[23000])
        return $exception instanceof \Illuminate\Database\QueryException && $exception->getCode() == '23000';
    }

    private function extractConstraintKey(string $errorMessage)
    {
        // Extrai a chave da restrição única da mensagem de erro usando expressão regular
        preg_match("/key '(.+?)'/", $errorMessage, $matches);
        return $matches[1] ?? 'Unknown';
    }
}

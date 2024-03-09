<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;

class JsonPaginate
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (
            ! $response->exception
            && $response instanceof JsonResponse
            && $response->original instanceof LengthAwarePaginator
        ) {
            $paginator = $response->original;

            // Adiciona informações adicionais à resposta de paginação
            $paginationInfo = [
                'current_page' => $paginator->currentPage(),
                'prev_page_url' => $paginator->previousPageUrl(),
                'next_page_url' => $paginator->nextPageUrl(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
                'total_pages' => $paginator->lastPage(),
                'links' => $paginator->getUrlRange(1, $paginator->lastPage()),
            ];

            // Cria um novo array com a estrutura desejada
            $modifiedContent = [
                'data' => $paginator->items(),
                'statusCode' => $response->getStatusCode(),
                'metadata' => $paginationInfo,
            ];

            // Atualiza a resposta original com a nova estrutura
            $response->setData($modifiedContent);
        }

        return $response;
    }
}

<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ResourceResponseTrait
{
    protected function showMessage($message, $statusCode = 200)
    {
        return response()->json(['message' => $message], $statusCode);
    }

    protected function showOne($model, $statusCode = 200, $resource = null)
    {
        $resource = $resource ?? $this->getResource();
        return response()->json(new $resource($model), $statusCode);
    }

    protected function showAll($collection, $statusCode = 200, $resource = null)
    {
        if ($collection instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $paginator = $collection;

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
                'statusCode' => $statusCode,
                'metadata' => $paginationInfo,
            ];

            return response()->json($modifiedContent, $statusCode);
        }

        // Se a coleção não for uma instância de LengthAwarePaginator, continua como antes
        if (is_null($collection) || $collection->isEmpty()) {
            return response()->json([], Response::HTTP_OK);
        }

        $resource = $resource ?? $this->getResource(true);
        return response()->json($resource::collection($collection), $statusCode);
    }

    protected function getResource()
    {
        $routeName = request()->route()->getName();
        $pos = strripos($routeName, '.');
        $modelSegment = substr($routeName, 0, $pos - 1);
        $modelSegments = explode('-', $modelSegment);
        $modelName = '';

        foreach ($modelSegments as $segment) {
            $modelName .= ucfirst($segment);
        }

        $resourceName = 'App\\Http\\Resources\\' . $modelName . '\\' . $modelName . 'Resource';

        return $resourceName;
    }
}

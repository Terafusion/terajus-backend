<?php

namespace App\Traits;

use Illuminate\Pagination\LengthAwarePaginator;

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

    protected function showAll(LengthAwarePaginator $paginator, $statusCode = 200, $resource = null)
    {
        $resource = $resource ?? $this->getResource();

        $modifiedContent = [
            'data' => $resource::collection($paginator->items()),
            'statusCode' => $statusCode,
            'meta' => [
                'current_page' => $paginator->currentPage(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
                'total_pages' => $paginator->lastPage(),
            ],
            'links' => [
                'first' => $paginator->url(1),
                'last' => $paginator->url($paginator->lastPage()),
                'prev' => $paginator->previousPageUrl(),
                'next' => $paginator->nextPageUrl(),
            ],
        ];

        if ($paginator->isEmpty()) {
            return response()->json($modifiedContent, $statusCode);
        }

        return response()->json($modifiedContent, $statusCode);
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

        $resourceName = 'App\\Http\\Resources\\'.$modelName.'\\'.$modelName.'Resource';

        return $resourceName;
    }
}

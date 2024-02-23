<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
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

    protected function showAll($collection, $statusCode = 200, $resource = null, $perPage = 10)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $paginator = new LengthAwarePaginator($currentItems, $collection->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        if ($resource) {
            $modifiedContent = [
                'data' => $resource::collection($paginator->items()),
                'statusCode' => $statusCode,
                'metadata' => [
                    'current_page' => $paginator->currentPage(),
                    'prev_page_url' => $paginator->previousPageUrl(),
                    'next_page_url' => $paginator->nextPageUrl(),
                    'per_page' => $paginator->perPage(),
                    'total' => $paginator->total(),
                    'total_pages' => $paginator->lastPage(),
                    'links' => $paginator->getUrlRange(1, $paginator->lastPage()),
                ],
            ];
        } else {
            $modifiedContent = [
                'data' => $paginator->items(),
                'statusCode' => $statusCode,
                'metadata' => [
                    'current_page' => $paginator->currentPage(),
                    'prev_page_url' => $paginator->previousPageUrl(),
                    'next_page_url' => $paginator->nextPageUrl(),
                    'per_page' => $paginator->perPage(),
                    'total' => $paginator->total(),
                    'total_pages' => $paginator->lastPage(),
                    'links' => $paginator->getUrlRange(1, $paginator->lastPage()),
                ],
            ];
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

        $resourceName = 'App\\Http\\Resources\\' . $modelName . '\\' . $modelName . 'Resource';

        return $resourceName;
    }
}

<?php declare(strict_types=1);

namespace App\Presenters;

use Illuminate\Http\JsonResponse;

class JsonPresenter
{
    public function present(array $response): JsonResponse
    {
        return response()->json($response);
    }
}

<?php

namespace App\Http\Controllers\Api\Arti;

use App\Http\Controllers\Controller;
use App\Models\Arti\Deity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeityController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $includeAartis = $request->boolean('include_aartis');

        $query = Deity::query();

        if ($includeAartis) {
            $query->with('aartis');
        }

        $deities = $query->get();

        return response()->json([
            'status' => 'success',
            'data' => $deities
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api\Arti;

use App\Http\Controllers\Controller;
use App\Models\Arti\Aarti;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AartiController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Aarti::query();

        if ($request->has('deity_id')) {
            $query->where('deity_id', $request->deity_id);
        }

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        $aartis = $query->with('deity')->get();

        return response()->json([
            'status' => 'success',
            'data' => $aartis
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $aarti = Aarti::with('deity')->find($id);

        if (!$aarti) {
            return response()->json([
                'status' => 'error',
                'message' => 'Aarti not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $aarti
        ]);
    }
}

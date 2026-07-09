<?php

namespace App\Http\Controllers\Api\Arti;

use App\Http\Controllers\Controller;
use App\Models\Arti\GalleryImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = GalleryImage::query();

        if ($request->has('deity_id')) {
            $query->where('deity_id', $request->deity_id);
        }

        $images = $query->with('deity')->get();

        return response()->json([
            'status' => 'success',
            'data' => $images
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api\Arti;

use App\Http\Controllers\Controller;
use App\Models\Arti\Favorite;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();
        
        $favorites = Favorite::where('user_id', $user->id)
            ->with('aarti.deity')
            ->get()
            ->pluck('aarti');

        return response()->json([
            'status' => 'success',
            'data' => $favorites
        ]);
    }

    public function toggle(Request $request): JsonResponse
    {
        $user = $request->user();

        $request->validate([
            'aarti_id' => 'required|exists:arti_aartis,id',
        ]);

        $favorite = Favorite::where('user_id', $user->id)
            ->where('aarti_id', $request->aarti_id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            $favorited = false;
            $message = 'Aarti removed from favorites';
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'aarti_id' => $request->aarti_id
            ]);
            $favorited = true;
            $message = 'Aarti added to favorites';
        }

        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => [
                'favorited' => $favorited
            ]
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api\Arti;

use App\Http\Controllers\Controller;
use App\Models\Arti\Reminder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();
        $reminders = Reminder::where('user_id', $user->id)->get();

        return response()->json([
            'status' => 'success',
            'data' => $reminders
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $user = $request->user();

        $request->validate([
            'title' => 'required|string|max:255',
            'time' => 'required|date_format:H:i:s',
            'is_enabled' => 'sometimes|boolean',
        ]);

        $reminder = Reminder::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'time' => $request->time,
            'is_enabled' => $request->get('is_enabled', true)
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Reminder created successfully',
            'data' => $reminder
        ], 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $user = $request->user();
        $reminder = Reminder::where('user_id', $user->id)->find($id);

        if (!$reminder) {
            return response()->json([
                'status' => 'error',
                'message' => 'Reminder not found'
            ], 404);
        }

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'time' => 'sometimes|required|date_format:H:i:s',
            'is_enabled' => 'sometimes|required|boolean',
        ]);

        $reminder->update($request->only(['title', 'time', 'is_enabled']));

        return response()->json([
            'status' => 'success',
            'message' => 'Reminder updated successfully',
            'data' => $reminder
        ]);
    }

    public function destroy(Request $request, int $id): JsonResponse
    {
        $user = $request->user();
        $reminder = Reminder::where('user_id', $user->id)->find($id);

        if (!$reminder) {
            return response()->json([
                'status' => 'error',
                'message' => 'Reminder not found'
            ], 404);
        }

        $reminder->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Reminder deleted successfully'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api\Arti;

use App\Http\Controllers\Controller;
use App\Models\Arti\PrayerHistory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProfileController extends Controller
{
    public function show(Request $request): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => $request->user()
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $user = $request->user();

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'gotra' => 'nullable|string|max:255',
            'rashi' => 'nullable|string|max:255',
        ]);

        $user->update($request->only(['name', 'gotra', 'rashi']));

        return response()->json([
            'status' => 'success',
            'message' => 'Profile updated successfully',
            'data' => $user
        ]);
    }

    public function incrementStreak(Request $request): JsonResponse
    {
        $user = $request->user();
        $today = Carbon::today();
        $lastPrayerDate = $user->last_prayer_date ? Carbon::parse($user->last_prayer_date) : null;

        if ($lastPrayerDate) {
            if ($lastPrayerDate->equalTo($today)) {
                // Already prayed today, streak unchanged
                return response()->json([
                    'status' => 'success',
                    'message' => 'Streak already counted for today',
                    'data' => [
                        'streak_count' => $user->streak_count,
                        'last_prayer_date' => $user->last_prayer_date->toDateString()
                    ]
                ]);
            } elseif ($lastPrayerDate->equalTo(Carbon::yesterday())) {
                // Prayed yesterday, increment streak
                $user->streak_count += 1;
            } else {
                // Prayed long ago, reset streak to 1
                $user->streak_count = 1;
            }
        } else {
            // First time praying
            $user->streak_count = 1;
        }

        $user->last_prayer_date = $today;
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Streak updated successfully',
            'data' => [
                'streak_count' => $user->streak_count,
                'last_prayer_date' => $user->last_prayer_date->toDateString()
            ]
        ]);
    }

    public function history(Request $request): JsonResponse
    {
        $user = $request->user();
        $history = PrayerHistory::where('user_id', $user->id)
            ->with('aarti')
            ->orderBy('played_at', 'desc')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $history
        ]);
    }

    public function logHistory(Request $request): JsonResponse
    {
        $user = $request->user();

        $request->validate([
            'aarti_id' => 'required|exists:arti_aartis,id',
            'duration_played' => 'required|integer|min:0',
        ]);

        $log = PrayerHistory::create([
            'user_id' => $user->id,
            'aarti_id' => $request->aarti_id,
            'played_at' => Carbon::now(),
            'duration_played' => $request->duration_played,
        ]);

        // Automatically trigger streak increment when history is logged
        $this->incrementStreak($request);

        // Reload log with aarti details
        $log->load('aarti');

        return response()->json([
            'status' => 'success',
            'message' => 'Prayer history logged successfully',
            'data' => $log
        ], 201);
    }
}

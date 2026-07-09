<?php

namespace App\Http\Controllers\Admin\Arti;

use App\Http\Controllers\Controller;
use App\Models\Arti\ArtiUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = ArtiUser::paginate(10);
        return view('admin.arti.users.index', compact('users'));
    }

    public function show(int $id): View
    {
        $user = ArtiUser::with(['reminders', 'prayerHistories.aarti'])->findOrFail($id);
        return view('admin.arti.users.show', compact('user'));
    }

    public function destroy(int $id): RedirectResponse
    {
        $user = ArtiUser::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.arti.users.index')->with('success', 'User deleted successfully.');
    }

    public function generateToken(int $id): RedirectResponse
    {
        $user = ArtiUser::findOrFail($id);
        $tokenName = 'Admin Generated Token (' . now()->toDateTimeString() . ')';
        $token = $user->createToken($tokenName)->plainTextToken;

        return redirect()->route('admin.arti.users.show', $id)
            ->with('generated_token', $token);
    }

    public function tokenGenerator(): View
    {
        $users = ArtiUser::all();
        return view('admin.arti.users.tokens', compact('users'));
    }

    public function generateTokenFromGenerator(Request $request): RedirectResponse
    {
        $request->validate([
            'user_id' => 'required|exists:arti_users,id',
        ]);

        $user = ArtiUser::findOrFail($request->user_id);
        $tokenName = 'Admin Generated Token (' . now()->toDateTimeString() . ')';
        $token = $user->createToken($tokenName)->plainTextToken;

        return redirect()->route('admin.arti.users.tokens')
            ->with([
                'generated_token' => $token,
                'selected_user_id' => $user->id,
            ]);
    }

    public function apiDocs(): View
    {
        return view('admin.arti.docs');
    }
}

<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordGeneratorController extends Controller
{
    public function index()
    {
        // Purely client-side generation (JS). Server just renders the page.
        return view('tools.password-generator');
    }

    // Optional: server-side generator if you ever want an API/POST endpoint
    public function generate(Request $request)
    {
        $data = $request->validate([
            'length' => 'required|integer|min:4|max:128',
            'lower' => 'boolean',
            'upper' => 'boolean',
            'number' => 'boolean',
            'symbol' => 'boolean',
            'no_ambiguous' => 'boolean',
        ]);

        $length = (int) $data['length'];
        $sets = [];

        $lower = 'abcdefghijklmnopqrstuvwxyz';
        $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $number = '0123456789';
        $symbol = '!@#$%^&*()-_=+[]{};:,.<>?';

        if (!empty($data['no_ambiguous'])) {
            // Remove characters commonly confused
            $lower = str_replace(['l', 'o'], '', $lower);
            $upper = str_replace(['I', 'O'], '', $upper);
            $number = str_replace(['0', '1'], '', $number);
        }

        if (!empty($data['lower']))  $sets[] = $lower;
        if (!empty($data['upper']))  $sets[] = $upper;
        if (!empty($data['number'])) $sets[] = $number;
        if (!empty($data['symbol'])) $sets[] = $symbol;

        if (empty($sets)) {
            return response()->json(['error' => 'Select at least one character set.'], 422);
        }

        // Ensure at least one char from each selected set
        $password = '';
        foreach ($sets as $set) {
            $password .= $set[random_int(0, strlen($set) - 1)];
        }

        // Fill remaining with combined set
        $all = implode('', $sets);
        for ($i = strlen($password); $i < $length; $i++) {
            $password .= $all[random_int(0, strlen($all) - 1)];
        }

        // Shuffle
        $password = str_shuffle($password);

        return response()->json(['password' => $password]);
    }
}

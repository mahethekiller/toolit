<?php
namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $num1 = rand(1, 9);
        $num2 = rand(1, 9);
        session(['captcha_answer' => $num1 + $num2]);

        return view('contact', compact('num1', 'num2'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'captcha' => 'required|numeric',
        ]);

        // Check captcha
        if ($request->captcha != session('captcha_answer')) {
            return back()->withErrors(['captcha' => '❌ Incorrect answer to the math question.'])->withInput();
        }

        // Save to DB
        ContactMessage::create($request->only('name', 'email', 'subject', 'message'));

        return back()->with('success', '✅ Thank you for contacting us!');
    }

}

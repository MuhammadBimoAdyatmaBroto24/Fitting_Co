<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // In a real application, you would send an email here.
        // For now, we'll just simulate it.
        // Mail::to('your-email@example.com')->send(new ContactFormMail($request->all()));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
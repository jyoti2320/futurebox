<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
            'agreecheck' => 'accepted',
        ]);

        Newsletter::create([
            'email' => $request->email,
            'agreed' => true,
        ]);

        // return back()->with('newsletter_success', 'Thank you for subscribing to our newsletter!');
        return redirect()->to(url()->previous() . '#newsletter')
                 ->with('newsletter_success', 'Thank you for subscribing to our newsletter!');

    }
}

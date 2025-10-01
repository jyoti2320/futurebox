<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:newsletters,email',
                'agreecheck' => 'accepted',
            ]);

            Newsletter::create([
                'email' => $request->email,
                'agreed' => true,
            ]);

            return redirect()->to(url()->previous() . '#newsletter')
                ->with('newsletter_success', 'Thank you for subscribing to our newsletter!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // throw $e;
            return redirect()->to(url()->previous() . '#newsletter')
            ->with('newsletter_error', $e->validator->errors()->first());
        } catch (\Exception $e) {
            return redirect()->to(url()->previous() . '#newsletter')
                ->with('newsletter_error', 'Something went wrong. Please try again later.');
        }
    }
}

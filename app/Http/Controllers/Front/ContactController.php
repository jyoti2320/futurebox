<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Contact;
use Exception;
use Illuminate\Support\Facades\Log;


class ContactController extends Controller
{
    public function contact(){
        try {
            $setting = Setting::first();
            return view('front.contact', compact('setting'));

        } catch (Exception $e) {
            Log::error('Failed to load Contact Us page: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading the Contact Us page.');
        }
    }

    public function contactForm(Request $request, $id = null){
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email',
            'message' => 'required|string',
        ]);

        $data = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'message' => $request->message,
        ];
        // dd($data);
        try {
            $created = Contact::create($data);
            Log::info("Your data add successfully. ID: {$created->id}", $data);
            return redirect()->route('front.contact')->with('success', 'Your data add successfully');
            
        } catch (Exception $e) {
            Log::error("Contact data store error", [
                'error' => $e->getMessage(),
                'id' => $id
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again..');
        }
    }

}

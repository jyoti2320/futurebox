<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Contact;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Headerbanner;

class ContactController extends Controller
{
    public function contact(){
        try {
            $setting = Setting::first();
            $headerbanner = Headerbanner::where('page_name', 'Contact')->first();
            return view('front.contact', compact('setting','headerbanner'));

        } catch (Exception $e) {
            Log::error('Failed to load Contact Us page: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading the Contact Us page.');
        }
    }

    public function contactForm(Request $request, $id = null){
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email',
            'furnishing' => 'required|string',
            'reason' => 'required|string',
            'message' => 'required|string',
        ]);

        $data = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'furnishing' => $request->furnishing,
            'reason' => $request->reason,
            'message' => $request->message,
        ];
        // dd($data);
        try {
            $created = Contact::create($data);
            Mail::to('jahirwar1920@gmail.com')->send(new ContactMail($data));
            Log::info("Your data add successfully. ID: {$created->id}", $data);
            // return redirect()->route('contact')->with('success', 'Data saved and email sent to admin');
            return back()->with('contact_success', 'Data saved and email sent to admin!');
            
        } catch (Exception $e) {
            Log::error("Contact data store error", [
                'error' => $e->getMessage(),
            ]);
            return redirect()->back()->with('contact_error', 'Something went wrong. Please try again..');

        }
    }

}

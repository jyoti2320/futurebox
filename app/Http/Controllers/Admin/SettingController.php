<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class SettingController extends Controller
{
    public function addSetting($id = null)
    {
        try {
            $setting = Setting::findOrFail($id);
            return view('admin.setting', compact('setting'));
        } catch (\Exception $e) {
            // Log the error if needed
            Log::channel('custom_error')->error('Failed to load setting: ' . $e->getMessage());
            return redirect()->route('admin.setting')->with('error', 'setting not found or something went wrong.');
        }
    }

    public function storeSetting(Request $request, $id = null)
    {
        $request->validate([
            'website_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',

        ]);

        $data = [
            'website_name' => $request->website_name,
            'email' => $request->email,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'address' => $request->address,
            'fb_link' => $request->fb_link,
            'twitter_link' => $request->twitter_link,
            'yb_link' => $request->yb_link,
            'insta_link' => $request->insta_link,
            'linkedin_link' => $request->linkedin_link,

        ];

        try {
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                if ($id) {
                    $setting = Setting::find($id);
                    if ($setting && !empty($setting->logo) && file_exists(public_path($setting->logo))) {
                        unlink(public_path($setting->logo));
                    }
                }

                $file = $request->file('logo');
                $filename = time() . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('website'), $filename);

                $data['logo'] = 'website/' . $filename; // path for public access
            }

            if ($request->hasFile('favicon')) {
                $file = $request->file('favicon');
                if ($id) {
                    $setting = Setting::find($id);
                    if ($setting && !empty($setting->favicon) && file_exists(public_path($setting->favicon))) {
                        unlink(public_path($setting->favicon));
                    }
                }

                $file = $request->file('favicon');
                $filename = time() . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('website'), $filename);

                $data['favicon'] = 'website/' . $filename; // path for public access
            }

                $setting = Setting::findOrFail($id);
                if (!$setting) {
                    Log::error("Update failed: setting with ID {$id} not found.");
                    return redirect()->back()->with('error', 'setting not found.');
                }

                $setting->update($data);
                Log::info("setting updated successfully. ID: {$id}", $data);
                return redirect()->route('admin.setting,1')->with('success', 'setting updated successfully');
            
        } catch (\Exception $e) {
            Log::error("setting update error", [
                'error' => $e->getMessage(),
                'id' => $id
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }


}

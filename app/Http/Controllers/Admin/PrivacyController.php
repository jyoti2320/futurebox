<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class PrivacyController extends Controller
{
    public function addPrivacy($id = null)
    {
        try {
            $privacy = Privacy::findOrFail($id);
            return view('admin.privacy', compact('privacy'));
        } catch (\Exception $e) {
            // Log the error if needed
            Log::channel('custom_error')->error('Failed to load privacy: ' . $e->getMessage());
            return redirect()->route('admin.privacy')->with('error', 'privacy not found or something went wrong.');
        }
    }

    public function storePrivacy(Request $request, $id = null)
    {
        $request->validate([
            'privacy' => 'required|string',
        ]);

        $data = [
            'privacy' => $request->privacy,
        ];

        try {
                $privacy = Privacy::findOrFail($id);
                if (!$privacy) {
                    Log::error("Update failed: privacy with ID {$id} not found.");
                    return redirect()->back()->with('error', 'privacy not found.');
                }

                $privacy->update($data);
                Log::info("privacy updated successfully. ID: {$id}", $data);
                return redirect()->route('admin.privacy',$id)->with('success', 'privacy updated successfully');
            
        } catch (\Exception $e) {
            Log::error("privacy update error", [
                'error' => $e->getMessage(),
                'id' => $id
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Team;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function dashboard(){
        try {
            $blogCount = Blog::where('status', 1)->count() ?? 0;
            $eventCount = Event::where('status', 1)->count() ?? 0;
            $teamCount = Team::where('status', 1)->count() ?? 0;
            return view('admin.dashboard',compact('blogCount','eventCount','teamCount'));
        } catch (Exception $e) {
            Log::error('Dashboard data load failed: ' . $e->getMessage());

            return view('admin.dashboard', [
                'blogCount' => 0,
                'eventCount' => 0,
                'teamCount' => 0
            ]);
        }
    }

    public function contactList(Request $request)
    {
        try {
            $query = Contact::query();
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where('fullname', 'like', '%' . $search . '%');
            }
            $contactList = $query->latest()->paginate(10)->withQueryString();

            return view('admin.contact-list', compact('contactList'));
        } catch (\Exception $e) {
            Log::channel('custom_error')->error('Failed to load contact list: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading contacts.');
        }
    }
}

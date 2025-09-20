<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Team;
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
}

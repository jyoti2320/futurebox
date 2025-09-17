<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        try {
            return view('admin.dashboard');
        } catch (Exception $e) {
            Log::error('Failed to load page: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while loading page.');
        }
    }
}

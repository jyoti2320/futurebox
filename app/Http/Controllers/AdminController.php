<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function adminLogin()
    {
        return view('admin.login');
    }
    public function loginCheck(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        try {
            if (Auth::guard('admin')->attempt($validated)) {
                Log::info('Admin login successful', ['email' => $request->email]);
                return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
            }

            Log::warning('Admin login failed', ['email' => $request->email]);
            return redirect()->back()->with('error', 'Incorrect email or password!');
        } catch (Exception $e) {
            Log::error('Admin login error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login')->with('success', 'Logout successful!');
    }
}

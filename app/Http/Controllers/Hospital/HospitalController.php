<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class HospitalController extends Controller
{   

    public function dashboard(){
        return view('hospital.dashboard');
    }
    public function loginCheck(Request $request)
    {
        $validated = $request->validate([
            'email' => 'email|required',
            'password' => 'min:6|required'
        ]);
        if (Auth::guard('hospital')->attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route('hospital.dashbaord');
        }
        return back()->withErrors(['email' => 'Incorrect email/password']);
    }

    public function logout(){
        Auth::guard('hospital')->logout();
        return redirect(url('/hospital/login'));
    }
}

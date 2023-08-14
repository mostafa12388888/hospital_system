<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\adminLoginRequest;
use App\Http\Requests\Auth\docutorLoginRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\douctorLognReequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function create() :View
    {
        return view('Dashbord.User.auth.signin');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(douctorLognReequest $request): RedirectResponse
    {
        // dd(509);
       if( $request->authenticate()){

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::Doctor);
    }
        return redirect()->back()->withErrors(['email'=>trans('Dashbord/auth.failed')]);
    }

   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): RedirectResponse
    {
        
        Auth::guard('doctor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/user/login');
    }
}

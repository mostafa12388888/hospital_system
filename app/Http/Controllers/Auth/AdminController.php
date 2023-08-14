<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\adminLoginRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   

    /**
     * Show the form for creating a new resource.
     */
    public function create() :View
    {
        return view('Dashbord.User.auth.signin');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(adminLoginRequest $request): RedirectResponse
    {
        // dd($request);
       if( $request->authenticate()){

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::ADMIN);}
        return redirect()->back()->withErrors(['email'=>trans('Dashbord/auth.failed')]);
    }

   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): RedirectResponse
    {
        
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/user/login');
    }
}

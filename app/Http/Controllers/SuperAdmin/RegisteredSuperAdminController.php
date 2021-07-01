<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\SuperAdmin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredSuperAdminController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function createSuperAdmin()
    {
        return view('superadmin.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeSuperAdmin(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'superadmin_username' => 'required|string|max:255|unique:super_admins',
            'email' => 'required|string|email|max:255|unique:super_admins',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = SuperAdmin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'superadmin_username' => $request->superadmin_username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::guard('superadmin')->login($user);

        // Auth::login($user);

        return redirect('/dashboard');
    }
}

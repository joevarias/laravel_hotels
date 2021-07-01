<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredEmployeeController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function createEmployee()
    {
        return view('employee.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeEmployee(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'employee_username' => 'required|string|max:255|unique:employees',
            'email' => 'required|string|email|max:255|unique:employees',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'date_of_birth'=> 'required|date_format:Y-m-d|before:today',
            'address' => 'required|string|max:255',
        ]);

        $user = Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'employee_username' => $request->employee_username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
        ]);

        event(new Registered($user));

        Auth::guard('employee')->login($user);

        // Auth::login($user);

        return redirect('/dashboard');
    }
}

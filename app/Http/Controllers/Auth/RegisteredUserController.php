<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

//Custom validations
use App\Rules\sinNumeros;
use App\Rules\formatoDNI;
use App\Rules\formatoEmail;
use App\Rules\formatoTelefono;
use App\Rules\formatoIBAN;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:2', 'max:20', new sinNumeros],
            'apellidos' => ['required', 'string', 'min:2', 'max:40', new sinNumeros], 
            'DNI' => ['required', 'string', 'max:9', new formatoDNI],
            'email' => ['required', 'string', 'email', 'max:50', new formatoEmail, 'unique:'.User::class], 
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'repeatPassword' => ['required', 'confirmed', Rules\Password::defaults()],
            'telefono' => ['string', 'min:9', 'max:12', new formatoTelefono], 
            'pais' => [ 'string', 'min:2', 'max:40'], 
            'IBAN' => ['required', 'string', 'min:24', 'max:24', new formatoIBAN],  
            'sobreTi' => ['string', 'min:20', 'max:250'],
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'DNI' => $request->DNI,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'pais' => $request->pais,
            'IBAN' => $request->IBAN,
            'sobreTi' => $request->sobreTi,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('success', 'Usuario registrado correctamente.');
    }
}
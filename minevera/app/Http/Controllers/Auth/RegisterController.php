<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if ($user) {
            return redirect()->back()->with('error', 'El usuario ya existe.');
        }

        // Verificar si se está utilizando OAuth o registro directo en la web
        if (Auth::guard('oauth')->check()) {
            // Registro mediante OAuth
            $oauth_user = Auth::guard('oauth')->user();

            if ($oauth_user instanceof \Laravel\Socialite\Two\User) {
                // Para proveedores OAuth2 como Google, Facebook, etc.
                $oauth_provider = $oauth_user->provider;
            } elseif ($oauth_user instanceof \Laravel\Socialite\One\User) {
                // Para proveedores OAuth1 como Twitter, LinkedIn, etc.
                $oauth_provider = $oauth_user->providerName;
            } else {
                // En caso de otro tipo de proveedor OAuth
                $oauth_provider = null;
            }

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'oauth_provider' => $oauth_provider,
            ]);
        } else {
            // Registro directo en la web
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
        }

        // Realizar acciones adicionales después del registro, como enviar correos electrónicos de confirmación, iniciar sesión, etc.

        return redirect('/')->with('success', 'Registro exitoso. Inicia sesión para continuar.');
    }
}

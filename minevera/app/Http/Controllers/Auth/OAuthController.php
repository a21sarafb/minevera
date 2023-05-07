<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Verificar si el usuario ya está registrado
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            // Autenticar al usuario existente
            Auth::login($existingUser);
        } else {
            // Crear un nuevo usuario
            $newUser = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make('password'), // Asignar una contraseña aleatoria o generar una
            ]);

            // Autenticar al nuevo usuario
            Auth::login($newUser);
        }

        // Redirigir al usuario a la página deseada después del inicio de sesión
        return redirect('/');
    }
}

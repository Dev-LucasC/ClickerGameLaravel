<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        try {
            return Socialite::driver('google')->redirect();
        } catch (\Exception $e) {
            return redirect()->route('home')->withErrors(['error' => 'Erro ao redirecionar para o Google.']);
        }
    }

    public function handleGoogleCallback()
{
    try {
        $socialiteUser = Socialite::driver('google')->user();
    } catch (\Exception $e) {
        return redirect()->route('home')->withErrors(['error' => 'Erro ao obter dados do usuário do Google.']);
    }

    try {
        $user = User::where('email', $socialiteUser->getEmail())->first();

        if (!$user) {
            $user = new User([
                'name' => $socialiteUser->getName(),
                'email' => $socialiteUser->getEmail(),
            ]);
            $user->save();
        }

        auth()->login($user);

        return redirect()->route('dashboard'); // Ajuste para 'dashboard'
    } catch (\Exception $e) {
        return redirect()->route('home')->withErrors(['error' => 'Erro ao processar dados do usuário.']);
    }
}



    public function showLoginForm()
{
    return view('welcome'); // Substitua 'welcome' pelo nome da sua visão inicial
}

}

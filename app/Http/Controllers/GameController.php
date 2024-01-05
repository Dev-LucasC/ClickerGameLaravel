<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $game = Game::where('user_id', $user->id)->first();

        return view('game', ['user' => $user, 'game' => $game]);
    }

    public function buyUpgrade(Request $request, $upgradeId)
    {
        $user = auth()->user();
        $game = Game::where('user_id', $user->id)->first();

        // Lógica para verificar se o usuário pode comprar o upgrade
        // Atualizar o banco de dados com as informações do upgrade
        // Atualizar o dinheiro do usuário

        return redirect()->route('dashboard')->with('success', 'Upgrade comprado com sucesso!');
    }
}

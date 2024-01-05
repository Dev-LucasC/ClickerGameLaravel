<!-- resources/views/game.blade.php -->

@extends('layouts.app') <!-- Certifique-se de que você tem uma layout chamada 'app' -->

@section('content')
    <div>
        <h2>Bem-vindo ao Jogo!</h2>
        <p>Aqui está o seu incrível jogo.</p>
        <!-- Adicione qualquer conteúdo do jogo aqui -->
        <button onclick="startGame()">Jogar</button>
    </div>

    <script>
        // Adicione scripts ou referências a bibliotecas do jogo aqui
        function startGame() {
            alert('Jogo iniciado!'); // Exemplo simples, substitua por lógica real do jogo
        }
    </script>
@endsection

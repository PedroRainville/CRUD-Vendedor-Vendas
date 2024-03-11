<!-- resources/views/vendedores/cadastrar.blade.php -->

@extends('main')

@section('content')

<style>
    form {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }


    button {
        background-color: #3498db;
        color: #fff;
        padding: 10px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .centraliza-botao{
        text-align: center;
    }

</style>
    <form action="{{ route('atualizar-vendedor', ['id'=>$vendedores->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nome">Nome:</label>
        <input type="text" id="nome" placeholder="Digite seu nome" name="nome" value="{{ $vendedores->nome}}">
        <br><br>
        <label for="email">Email:</label>
        <input type="text" id="email" placeholder="Digite seu email" name="email" value="{{ $vendedores->email}}">
        <br><br>
        <div class="centraliza-botao">
            <button type="submit">Atualizar</button>
        </div>
    </form>

@endsection
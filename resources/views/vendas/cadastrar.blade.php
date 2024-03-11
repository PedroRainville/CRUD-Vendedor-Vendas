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
        border: 3px solid black;
        border-radius: 10px;
    }


    button {
        background-color: #2ecc71;
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
    <form action="{{ url('/vendas/adicionar-vendasweb') }}" method="POST">
        @csrf
        <label for="id_vendedor">ID Vendedor:</label>
        <input type="text" id="id_vendedor" placeholder="Digite o ID do vendedor" name="id_vendedor">
        @error('id_vendedor')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>
        <label for="valor">Valor:</label>
        <input type="text" id="valor" placeholder="Digite o valor da venda" name="valor">
        <br><br>
        <label for="data_venda">Data:</label>
        <input type="date" id="data_venda" placeholder="Digite a data da venda" name="data_venda">
        <br><br>
        <div class="centraliza-botao">
            <button type="submit">Cadastrar</button>
        </div>
    </form>

@endsection

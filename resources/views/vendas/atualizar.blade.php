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
    <form action="{{ route('atualizar-vendaweb', ['id'=>$venda->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="id_vendedor">ID Vendedor:</label>
        <input type="text" id="id_vendedor" placeholder="Digite o id do vendedor" name="id_vendedor" value="{{ $venda->id_vendedor}}">
        <br><br>
        <label for="valor">Valor:</label>
        <input type="text" id="valor" placeholder="Digite o valor da venda" name="valor" value="{{ $venda->valor}}">
        <br><br>
        <label for="data_venda">Data da Venda:</label>
        <input type="text" id="data_venda" placeholder="Digite a data da venda" name="data_venda" value="{{ $venda->data_venda}}">
        <br><br>
        <div class="centraliza-botao">
            <button type="submit">Atualizar</button>
        </div>
    </form>

@endsection
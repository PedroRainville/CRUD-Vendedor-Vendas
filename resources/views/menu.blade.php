<!-- resources/views/mostrar.blade.php -->

@extends('main')

@section('content')

<style>
    .irvendedor{
        padding: 8px 14px;
        background-color: #2ecc71;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        margin-right: 10px;
        border: #3498db;
        font-size: 15px;
    }

    .irvenda{
        padding: 8px 14px;
        background-color: #f39c12;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        margin-right: 10px;
        border: #3498db;
        font-size: 15px;
    }
</style>

    <section style="text-align: center;">
        <h2>Bem-vindo ao nosso gerenciador</h2>
        <h3>Escolha qual categoria deseja gerenciar!</h3>
        <div>
            <a href="{{ route('tudo') }}" class="irvendedor">Vendedores</a>
            <a href="{{ route('tudovendas') }}" class="irvenda">Vendas</a>
        </div>
    </section>
@endsection

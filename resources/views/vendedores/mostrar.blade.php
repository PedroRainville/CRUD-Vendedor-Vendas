<!-- resources/views/mostrar.blade.php -->

@extends('main')

@section('content')

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f8f8;
        margin: 0;
    }
    
    header {
        text-align: center;
        background-color: #3498db;
        color: #fff;
        padding: 10px;
    }
    
    h1 {
        margin: 0;
    }
    
    main {
        margin: 20px;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    thead {
        background-color: #3498db;
        color: #fff;
    }
    
    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }
    
    footer {
        margin-top: 20px;
        text-align: center;
        color: #888;
        padding: 10px;
    }
    
    .deletar {
        display: inline-block;
        padding: 8px 16px;
        background-color: #e74c3c;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        border: #e74c3c;    
        font-size: 15px;
    }

    .editar{
        display: inline-block;
        padding: 8px 16px;
        background-color: #3498db;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        margin-right: 10px;
        border: #3498db;
        font-size: 15px;
    }

    .novo-botao{
        text-align: center; 
        margin-top: 20px;
    }

    .novo-botao a {
        display: inline-block;
        padding: 8px 16px;
        background-color: #2ecc71;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
    }

    .config{
        display: flex
    }

    .voltar{
        text-align: center; 
        margin-top: 20px;
    }

    .voltar a{
        display: inline-block;
        padding: 8px 16px;
        background-color: #8e44ad;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
    }

</style>
<h2>Lista de Vendedores</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vendedores as $vendedor)
            <tr>
                <td>{{ $vendedor->id }}</td>
                <td>{{ $vendedor->nome }}</td>
                <td>{{ $vendedor->email }}</td>
                <td class="config">
                    <a href="{{ route('buscar-vendedor', ['id'=>$vendedor->id]) }}" class="editar">Editar</a>
                    <form action="{{ route('deletar-vendedor', ['id'=>$vendedor->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="deletar" type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="novo-botao">
    <a href="{{ url('/vendedores/adicionar-vendedorweb') }}">Adicionar Vendedor</a>
</div>
<div class="voltar">
    <a href="{{route('tudovendas')}}">Consultar Vendas</a>
</div>
@endsection

    

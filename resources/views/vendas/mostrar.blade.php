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
<h2>Lista de Vendas</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>ID_Vendedor</th>
            <th>Valor</th>
            <th>Data da Venda</th>
            <th>Comissao</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vendas as $venda)
            <tr>
                <td>{{ $venda->id }}</td>
                <td>{{ $venda->id_vendedor ? $venda->id_vendedor : 'Removido' }}</td>
                <td>{{ $venda->valor }}</td>
                <td>{{ $venda->data_venda }}</td>
                <td>{{ $venda->comissao }}</td>
                <td class="config">
                    <a href="{{ route('buscar-venda', ['id'=>$venda->id]) }}" class="editar">Editar</a>
                    <form action="{{ route('deletar-vendaweb', ['id'=>$venda->id]) }}" method="POST">
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
    <a href="{{ url('/vendas/adicionar-vendasweb') }}">Adicionar Venda</a>
</div>
<div class="voltar">
    <a href="{{route('tudo')}}">Consultar Vendedores</a>
</div>
@endsection

    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Vendas</title>
</head>
<body>
    <form action="/venda-cadastro" method="POST">
        @csrf
        <label for="">Vendedor</label>
        <input type="text" placeholder="Digite o seu ID" name="id_vendedor">
        </br>
        </br>
        <label for="">Valor</label>
        <input type="numeric" placeholder="Digite o valor da venda" name="valor">
        </br>
        </br>
        <label for="">Data</label>
        <input type="date" placeholder="Digite a data da venda" name="data_venda">
        </br>
        </br>
        <button>Cadastrar</button>
    </form>
</body>
</html>
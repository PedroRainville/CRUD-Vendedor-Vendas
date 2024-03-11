<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Vendedores</title>
</head>
<body>
    <form action="/atualizar-vendedor/{{ $vendedor->id }}" method="POST">
    @csrf
    @method("PUT")
        <label for="">Nome:</label>
        <input type="text" placeholder="Digite seu nome" name="nome" value="{{$vendedor->nome}}">
        </br>
        </br>
        <label for="">Email:</label>
        <input type="text" placeholder="Digite seu email" name="email" value="{{$vendedor->email}}">
        </br>
        </br>
        <button>Atualizar</button>
    </form>
</body>
</html>
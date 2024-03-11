<!-- resources/views/main.blade.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Aplicação</title>
</head>

<style>

    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
        background-color: #f8f8f8;
    }

    header {
        background-color: #3498db;
        color: #fff;
        text-align: center;
        padding: 1em 0;
    }

    h1 {
        margin: 0;
    }

    main {
        margin: 30px;
    }

    footer {
        background-color: #3498db;
        color: #fff;
        text-align: center;
        padding: 1em 0;
        position: fixed;
        bottom: 0;
        width: 100%;
    }

    p {
        color: #fff
    }
</style>

<body>

    <header>
        <h1>Gerenciador de Mercado</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} By Pedro Rainville</p>
    </footer>

</body>
</html>

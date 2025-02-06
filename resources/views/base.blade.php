<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    @isset($arquivosCSS)
        @foreach ($arquivosCSS as $arquivoCSS)
            <link rel="stylesheet" href="{{ asset($arquivoCSS) }}">
        @endforeach
    @endisset    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: "Century Gothic", Arial, Helvetica, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #44A64A;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #368B36;
        }
    </style>
</head>
<body>
    @yield('conteudo')
    
    @isset($arquivosJS)
        @foreach ($arquivosJS as $arquivoJS)
            <script src="{{ asset($arquivoJS) }}"></script>
        @endforeach
    @endisset
</body>
</html>
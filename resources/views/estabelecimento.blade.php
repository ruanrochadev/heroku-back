<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estabelecimento</title>
</head>
<body>
    @if ($estabelecimento)
        <h1>{{ $estabelecimento->nome }}</h1>
        <p>{{ $estabelecimento->tipo }}</p>
        <ul>
            <li>endereco: {{ $estabelecimento->endereco }}</li>
            <li>qtd_oleo: {{ $estabelecimento->qtd_oleo }}</li>
            <li>telefone: {{ $estabelecimento->telefone }}</li>
            <li>aprovado: {{ $estabelecimento->aprovado ? 'Sim' : 'Não' }}</li>
        </ul>
    @else
        <p>Estabelecimento não encontrado! </p>
    @endif
    <a href="{{route('indexEstab')}}">&#9664;Voltar</a>
</body>
</html>
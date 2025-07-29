<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Transportadores</title>
</head>
<body>
    @if ($transportador)
        <h1>{{ $transportador->nome_motorista }}</h1>
        <p>Placa:{{ $transportador->placa_veiculo }}</p>
        <ul>
            <li>Capacidade do veiculo(L): {{ $transportador->capacidade_veiculo}}</li>
            <li>Telefone: {{ $transportador->telefone }}</li>
            <li>CNPJ: {{ $transportador->cnpj }}</li>
            <li>Disponibilidade: {{ $transportador->disponivel ? 'Sim' : 'Não' }}</li>
        </ul>
    @else
        <p>Transportadores não encontrado! </p>
    @endif
    <a href="{{route('indexTransp')}}">&#9664;Voltar</a>
</body>
</html>
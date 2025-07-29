<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Transportador</title>
</head>

<body>
    @if ($transportador)
        <h1>Transportador: {{ $transportador->nome_motorista }}</h1>
        <p>Placa do Veículo: {{ $transportador->placa_veiculo }}</p>
        <ul>
            <li>Capacidade do Veículo: {{ $transportador->capacidade_veiculo }} Litros</li>
            <li>Telefone: {{ $transportador->telefone }}</li>
            <li>CNPJ: {{ $transportador->cnpj }}</li>
            <li>Disponível: {{ $transportador->disponivel ? 'Sim' : 'Não' }}</li>
        </ul>

        <h3>Tem certeza que deseja deletar este transportador?</h3>
        <form action="{{route('removeTransp', $transportador->id)}}" method="POST">
            @csrf
            <input type="submit" name="confirmar" value="Deletar" />
            <input type="button" value="Cancelar" onclick="window.history.back();" />
        </form>
    @else
        <p>Transportador não encontrado!</p>
    @endif

    <a href="/transportadores">&#9664; Voltar para a lista de transportadores</a>
</body>

</html>

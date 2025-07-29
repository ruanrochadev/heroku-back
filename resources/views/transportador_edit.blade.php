<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Transportador</title>
</head>

<body>
    <h1>Editar Transportador</h1>
    <form action="{{route('updateTransp', $transportador->id) }}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome do Motorista:</td>
                <td><input type="text" name="nome_motorista" value="{{ $transportador->nome_motorista }}" required/></td>
            </tr>
            <tr>
                <td>Placa do Veículo:</td>
                <td><input type="text" name="placa_veiculo" value="{{ $transportador->placa_veiculo }}" required/></td>
            </tr>
            <tr>
                <td>Capacidade do Veículo (L):</td>
                <td><input type="number" name="capacidade_veiculo" value="{{ $transportador->capacidade_veiculo }}" required/></td>
            </tr>
            <tr>
                <td>Telefone:</td>
                <td><input type="tel" name="telefone" value="{{ $transportador->telefone }}" required/></td>
            </tr>
            <tr>
                <td>CNPJ:</td>
                <td><input type="text" name="cnpj" value="{{ $transportador->cnpj }}" required/></td>
            </tr>
            <tr>
                <td>Disponível:</td>
                <td><input type="checkbox" name="disponivel" {{ $transportador->disponivel ? 'checked' : '' }} /></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Atualizar Transportador"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/transportadores" style="display: inline">&#9664;&nbsp;Voltar</a></td>
            </tr>
        </table>
    </form>
</body>

</html>

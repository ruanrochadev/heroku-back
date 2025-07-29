<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Estabelecimento</title>
</head>

<body>
    <h1>Editar Estabelecimento</h1>
    <form action="{{route('updateEstab', $estabelecimento->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{ $estabelecimento->nome }}" required/></td>
            </tr>
            <tr>
                <td>Tipo:</td>
                <td><input type="text" name="tipo" value="{{ $estabelecimento->tipo }}" required/></td>
            </tr>
            <tr>
                <td>Endereço:</td>
                <td><input type="text" name="endereco" value="{{ $estabelecimento->endereco }}" required/></td>
            </tr>
            <tr>
                <td>Quantidade de Óleo (L):</td>
                <td><input type="number" name="qtd_oleo" value="{{ $estabelecimento->qtd_oleo }}" required/></td>
            </tr>
            <tr>
                <td>Telefone:</td>
                <td><input type="tel" name="telefone" value="{{ $estabelecimento->telefone }}" required/></td>
            </tr>
            <tr>
                <td>Aprovado:</td>
                <td><input type="checkbox" name="aprovado" {{ $estabelecimento->aprovado ? 'checked' : '' }} /></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Salvar"/></td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <a href="/estabelecimentos" style="display: inline"><button form=cancel >Cancelar</button></a>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>

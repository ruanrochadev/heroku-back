<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Administrador</title>
</head>

<body>
    <h1>Editar Administrador</h1>
    <form action="{{ route('updateAdm', $administrador->id) }}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{ $administrador->nome }}" required/></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" value="{{ $administrador->email }}" required/></td>
            </tr>
            <tr>
                <td>Telefone:</td>
                <td><input type="tel" name="telefone" value="{{ $administrador->telefone }}" required/></td>
            </tr>
            <tr>
                <td>CPF:</td>
                <td><input type="text" name="cpf" value="{{ $administrador->cpf }}" required/></td>
            </tr>
            <tr>
                <td>Conta Ativa:</td>
                <td><input type="checkbox" name="conta_ativa" {{ $administrador->conta_ativa ? 'checked' : '' }} /></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Atualizar Administrador"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/administradores" style="display: inline"><button form=cancel >Cancelar</button></a></td>
            </tr>
        </table>
    </form>
</body>

</html>

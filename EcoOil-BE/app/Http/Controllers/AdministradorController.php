<?php
namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    private $administrador;

    public function index()
    {
        $this->administrador = new Administrador();
        return view('administradores', ['administradores' => $this->administrador->all()]);
    }

    public function show($id)
    {

        return view('administrador', ['administrador' =>Administrador::find($id)]);
    }

    public function create()
    {
        return view('administrador_create');
    }

    public function store(Request $request)
    {
        $novoAdministrador = $request->all();
        $novoAdministrador['conta_ativa']=($request->conta_ativa)?true:false;  
        if (Administrador::create($novoAdministrador)) {
            return redirect('/administradores');
        } else {
            dd('Erro ao cadastrar administrador');
        }
    }

    public function edit($id)
    {
        return view('administrador_edit', ['administrador' => Administrador::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $updAdm = $request->all();
        $updAdm['conta_ativa']=($request->conta_ativa)?true:false;    
        if (Administrador::find($id)->update($updAdm)) {
            return redirect('/administradores');
        } else {
            dd('Erro ao atualizar o administrador');
        }
    }

    public function delete($id)
    {
        return view('administrador_remove', ['administrador' => Administrador::find($id)]);
    }

    public function remove(Request $request, $id)
    {
        if ($request->confirmar === 'Deletar') {
            if (!Administrador::destroy($id)) {
                dd("Erro ao deletar administrador $id");
            }
        }
        return redirect('/administradores');
    }
}


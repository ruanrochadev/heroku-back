<?php

namespace App\Http\Controllers;

use App\Models\Transportador;
use Illuminate\Http\Request;

class TransportadorController extends Controller
{
    private $transportador;

    public function index()
    {
        $this->transportador = new Transportador();
        return view('transportadores', ['transportadores' => $this->transportador->all()]);
    }

    public function show($id)
    {
        return view('transportador', ['transportador' => Transportador::find($id)]);
    }

    public function create()
    {
        return view('transportador_create');
    }

    public function store(Request $request)
    {
        $newTransportador = $request->all();
        $newTransportador['disponivel']=($request->disponivel)?true:false;    
        if (Transportador::create($newTransportador)) {
            return redirect('/transportadores');
        } else {
            dd('Erro ao cadastrar transportador');
        }
    }

    public function edit($id)
    {
        return view('transportador_edit', ['transportador' => Transportador::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $updTransportador = $request->all();
        $updTransportador['disponivel']=($request->disponivel)?true:false;  
        if (Transportador::find($id)->update($updTransportador)) {
            return redirect('/transportadores');
        } else {
            dd('Erro ao atualizar o transportador');
        }
    }

    public function delete($id)
    {
        return view('transportador_remove', ['transportador' => Transportador::find($id)]);
    }

    public function remove(Request $request, $id)
    {
        if ($request->confirmar === 'Deletar') {
            if (!Transportador::destroy($id)) {
                dd("Erro ao deletar transportador $id");
            }
        }
        return redirect('/transportadores');
    }
}

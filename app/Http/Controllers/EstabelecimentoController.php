<?php

namespace App\Http\Controllers;

use App\Models\Estabelecimento;
use Illuminate\Http\Request;

class EstabelecimentoController extends Controller
{
    private $estabelecimento;

    public function index()
    {
        $this->estabelecimento = new Estabelecimento();
        return view('estabelecimentos', ['estabelecimentos' => $this->estabelecimento->all()]);
    }

    public function show($id)
    {
        return view('estabelecimento', ['estabelecimento'=>Estabelecimento::find($id)]); 
    }


    public function create()
    {
        return view('estabelecimento_create');
    }

    public function store(Request $request){
        $newEstabelecimento = $request->all();
        $newEstabelecimento['aprovado']=($request->aprovado)?true:false;    
        if(Estabelecimento::create($newEstabelecimento)){
            return redirect('/estabelecimentos');
        }else dd('Erro ao cadastrar o estabelecimento');

    }

    public function edit($id)
    {
        return view('estabelecimento_edit', ['estabelecimento' => Estabelecimento::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $updEstab = $request->all();
        $updEstab['aprovado'] = ($request->aprovado)?true:false;    
        if(Estabelecimento::find($id)->update($updEstab)){
            return redirect('/estabelecimentos');
        }else dd('Erro ao cadastrar produto');

    }

    public function delete($id)
    {
        return view('estabelecimento_remove', ['estabelecimento' => Estabelecimento::find($id)]);
    }

    public function remove(Request $request, $id)
    {
        if($request->confirmar === 'Deletar')
            if(!Estabelecimento::destroy($id))         
                dd("erro ao deletar estabelecimento $id");            
        return redirect('/estabelecimentos');
        
    }
}

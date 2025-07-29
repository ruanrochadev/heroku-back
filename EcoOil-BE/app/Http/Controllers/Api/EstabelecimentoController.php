<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EstabelecimentoResource;
use App\Http\Resources\EstabelecimentoCollection;
use App\Http\Requests\EstabelecimentoStoreRequest;
use App\Http\Requests\EstabelecimentoUpdateRequest;
use App\Models\Estabelecimento;
use Illuminate\Http\Request;

class EstabelecimentoController extends Controller
{
    public function index()
    {
        $estabelecimentos = Estabelecimento::with(['user', 'coletas'])->get();
        return new EstabelecimentoCollection($estabelecimentos);
    }

    public function store(EstabelecimentoStoreRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = auth()->id(); 
            
            return (new EstabelecimentoResource(Estabelecimento::create($data)))
                ->additional(['message' => 'Estabelecimento criado com sucesso!!']);
        } catch (\Exception $error) {
            return response()->json([
                'message' => 'Erro ao criar estabelecimento!!',
                'error' => $error->getMessage()
            ], 500);
        }
    }

    public function show(Estabelecimento $estabelecimento)
    {
        return new EstabelecimentoResource($estabelecimento->load(['user', 'coletas']));
    }

    public function update(EstabelecimentoUpdateRequest $request, Estabelecimento $estabelecimento)
    {
        $user = auth()->user();
        
        if ($user->tipo !== 'admin' && $estabelecimento->user_id !== $user->id) {
            return response()->json(['message' => 'Não autorizado'], 403);
        }
        
        try {
            $estabelecimento->update($request->validated());
            return (new EstabelecimentoResource($estabelecimento))
                ->additional(['message' => 'Estabelecimento atualizado com sucesso!!']);
        } catch (\Exception $error) {
            return response()->json([
                'message' => 'Erro ao atualizar estabelecimento!!',
                'error' => $error->getMessage()
            ], 500);
        }
    }

    public function destroy(Estabelecimento $estabelecimento)
    {
        $user = auth()->user();
        
        if ($user->tipo !== 'admin' && $estabelecimento->user_id !== $user->id) {
            return response()->json(['message' => 'Não autorizado'], 403);
        }
        
        try {
            $estabelecimento->delete();
            return response()->json(['message' => 'Estabelecimento excluído com sucesso!!']);
        } catch (\Exception $error) {
            return response()->json([
                'message' => 'Erro ao excluir estabelecimento!!',
                'error' => $error->getMessage()
            ], 500);
        }
    }
}

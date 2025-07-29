<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransportadorResource;
use App\Http\Resources\TransportadorCollection;
use App\Http\Requests\TransportadorStoreRequest;
use App\Http\Requests\TransportadorUpdateRequest;
use App\Models\Transportador;
use Illuminate\Http\Request;

class TransportadorController extends Controller
{
    public function index()
    {
        $transportadores = Transportador::with(['user', 'coletas'])->get();
        return new TransportadorCollection($transportadores);
    }

    public function store(TransportadorStoreRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = auth()->id(); 
            
            return (new TransportadorResource(Transportador::create($data)))
                ->additional(['message' => 'Transportador criado com sucesso!!']);
        } catch (\Exception $error) {
            return response()->json([
                'message' => 'Erro ao criar Transportador!!',
                'error' => $error->getMessage()
            ], 500);
        }
    }

    public function show(Transportador $transportador)
    {
        return new TransportadorResource($transportador->load(['user', 'coletas']));
    }

    public function update(TransportadorUpdateRequest $request, Transportador $transportador)
    {
        $user = auth()->user();
        
        if ($user->tipo !== 'admin' && $transportador->user_id !== $user->id) {
            return response()->json(['message' => 'Não autorizado'], 403);
        }
        
        try {
            $transportador->update($request->validated());
            return (new TransportadorResource($transportador))
                ->additional(['message' => 'Transportador atualizado com sucesso!!']);
        } catch (\Exception $error) {
            return response()->json([
                'message' => 'Erro ao atualizar Transportador!!',
                'error' => $error->getMessage()
            ], 500);
        }
    }

    public function destroy(Transportador $transportador)
    {
        $user = auth()->user();
        
        if ($user->tipo !== 'admin' && $transportador->user_id !== $user->id) {
            return response()->json(['message' => 'Não autorizado'], 403);
        }
        
        try {
            $transportador->delete();
            return response()->json(['message' => 'Transportador excluído com sucesso!!']);
        } catch (\Exception $error) {
            return response()->json([
                'message' => 'Erro ao excluir Transportador!!',
                'error' => $error->getMessage()
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ColetaResource;
use App\Http\Resources\ColetaCollection;
use App\Http\Requests\ColetaStoreRequest;
use App\Http\Requests\ColetaUpdateRequest;
use App\Models\Coleta;
use Illuminate\Http\Request;

class ColetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ColetaCollection(Coleta::with(['estabelecimento', 'transportador'])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColetaStoreRequest $request)
    {
        try {
            $user = auth()->user();
            
            // Só estabelecimentos podem criar coletas
            if ($user->tipo !== 'admin' && $user->tipo !== 'estabelecimento') {
                return response()->json(['message' => 'Apenas estabelecimentos podem criar coletas'], 403);
            }

            $data = $request->validated();
            
            // Se não for admin, usar o estabelecimento do usuário logado
            if ($user->tipo === 'estabelecimento') {
                $estabelecimento = $user->estabelecimento;
                if (!$estabelecimento) {
                    return response()->json(['message' => 'Usuário não possui estabelecimento vinculado'], 400);
                }
                $data['estabelecimento_id'] = $estabelecimento->id;
            }
            
            return (new ColetaResource(Coleta::create($data)))
                ->additional(['message' => 'Coleta registrada com sucesso!!']);
        } catch (\Exception $error) {
            return response()->json([
                'message' => 'Erro ao registrar coleta!!',
                'error' => $error->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Coleta $coleta)
    {
        return new ColetaResource($coleta->load(['estabelecimento', 'transportador']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColetaUpdateRequest $request, Coleta $coleta)
    {
        try {
            $user = auth()->user();
            
            if ($user->tipo === 'estabelecimento') {
                if ($coleta->estabelecimento->user_id !== $user->id) {
                    return response()->json(['message' => 'Não autorizado'], 403);
                }
            } elseif ($user->tipo === 'transportador') {
                $allowedFields = ['status', 'transportador_id'];
                $requestData = array_keys($request->validated());
                if (array_diff($requestData, $allowedFields)) {
                    return response()->json(['message' => 'Transportador só pode alterar status'], 403);
                }
            } elseif ($user->tipo !== 'admin') {
                return response()->json(['message' => 'Não autorizado'], 403);
            }

            $data = $request->validated();
            
            if ($user->tipo === 'transportador' && isset($data['status']) && $data['status'] === 'aceita') {
                $transportador = $user->transportador;
                if (!$transportador) {
                    return response()->json(['message' => 'Usuário não possui transportador vinculado'], 400);
                }
                $data['transportador_id'] = $transportador->id;
            }
            
            $coleta->update($data);
            
            return (new ColetaResource($coleta->load(['estabelecimento', 'transportador'])))
                ->additional(['message' => 'Coleta atualizada com sucesso!!']);
        } catch (\Exception $error) {
            return response()->json([
                'message' => 'Erro ao atualizar coleta!!',
                'error' => $error->getMessage()
            ], 500);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coleta $coleta)
    {
        try {
            $user = auth()->user();
            
            if ($user->tipo !== 'admin' && $coleta->estabelecimento->user_id !== $user->id) {
                return response()->json(['message' => 'Não autorizado'], 403);
            }
            
            $coleta->delete();
            return response()->json(['message' => 'Coleta excluída com sucesso!!']);
        } catch (\Exception $error) {
            return response()->json([
                'message' => 'Erro ao excluir coleta!!',
                'error' => $error->getMessage()
            ], 500);
        }
    }
    public function disponiveis()
    {
        $coletas = Coleta::with(['estabelecimento'])
            ->where('status', 'disponivel')
            ->get();
            
        return new ColetaCollection($coletas);
    }
}

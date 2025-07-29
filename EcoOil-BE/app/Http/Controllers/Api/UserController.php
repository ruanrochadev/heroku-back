<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Estabelecimento;
use App\Models\Transportador;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with(['estabelecimento', 'transportador'])->get();
        return new UserResourceCollection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
{
    try {
        DB::beginTransaction();
        
        $validatedData = $request->validated();
        $user = User::create($validatedData);
        
        if ($user->tipo === 'estabelecimento') {
            Estabelecimento::create([
                'user_id' => $user->id,
                'nome' => $user->name,
                'endereco' => $validatedData['endereco'] ?? '',
                'telefone' => $validatedData['telefone'] ?? '',
                'cnpj' => $validatedData['cnpj'],
            ]);
        } elseif ($user->tipo === 'transportador') {
            Transportador::create([
                'user_id' => $user->id,
                'nome_motorista' => $user->name,
                'telefone' => $validatedData['telefone'] ?? '',
                'cnpj' => $validatedData['cnpj'],
            ]);
        }
        // Admin não precisa criar registro adicional
        
        DB::commit();
        
        return (new UserResource($user))
            ->additional(['message' => 'Usuário criado com sucesso!!']);
    } catch(\Exception $error) {
        DB::rollback();
        return response()->json([
            'message' => 'Erro ao criar novo usuário!!',
            'error' => $error->getMessage()
        ], 500);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        if (auth()->user()->tipo !== 'admin' && auth()->id() !== $user->id) {
            return response()->json(['message' => 'Não autorizado'], 403);
        }
        
        try {
            $user->update($request->validated());
            return (new UserResource($user))
                ->additional(['message' => 'Usuário atualizado com sucesso!!']);
        } catch (\Exception $error) {
            return response()->json([
                'message' => 'Erro ao atualizar usuário!!',
                'error' => $error->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (auth()->user()->tipo !== 'admin' && auth()->id() !== $user->id) {
            return response()->json(['message' => 'Não autorizado'], 403);
        }
        
        try {
            $user->delete();
            return response()->json(['message' => 'Usuário excluído com sucesso!!']);
        } catch (\Exception $error) {
            return response()->json([
                'message' => 'Erro ao excluir usuário!!',
                'error' => $error->getMessage()
            ], 500);
        }
    }
    public function getAllUsersForAdmin()
    {
        $user = auth()->user();
        
        if ($user->tipo !== 'admin') {
            return response()->json(['message' => 'Acesso negado'], 403);
        }
        
        $users = User::with(['estabelecimento', 'transportador'])
            ->whereIn('tipo', ['estabelecimento', 'transportador'])
            ->get();
        

        
        return response()->json($users);
    }

    public function deleteUserAsAdmin($id)
    {
        $user = auth()->user();
        
        if ($user->tipo !== 'admin') {
            return response()->json(['message' => 'Acesso negado'], 403);
        }
        
        $userToDelete = User::findOrFail($id);
        
        if ($userToDelete->tipo === 'admin') {
            return response()->json(['message' => 'Não é possível deletar admin'], 403);
        }
        
        $userToDelete->delete();
        return response()->json(['message' => 'Usuário excluído com sucesso']);
    }
}

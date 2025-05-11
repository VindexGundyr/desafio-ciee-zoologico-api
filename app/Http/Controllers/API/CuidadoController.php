<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cuidado;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;



class CuidadoController extends Controller
{
  
    public function index(Request $request): JsonResponse
    {
        $query = Cuidado::query(); 
        if ($request->has('animal_id')) {
        // Valida se o animal_id é um número e existe na tabela animais
        $request->validate(['animal_id' => 'sometimes|integer|exists:animais,id']);
        $query->where('animal_id', $request->input('animal_id'));
        }

        $cuidados = $query->with('animal')->orderBy('created_at', 'desc')->get();
        return response()->json($cuidados);  
    }

  
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
        'animal_id' => 'required|integer|exists:animais,id', // animal_id é obrigatório 
        'nome_cuidado' => 'required|string|max:255',
        'descricao' => 'nullable|string',
        'frequencia' => 'nullable|string|max:255',
    ]);

    $cuidado = Cuidado::create($validatedData);// Se a validação der certo, cria o cuidado
    $cuidado->load('animal'); 
    return response()->json($cuidado, 201);// Retorna o cuidado criado (201 - criado com sucesso)
    }

    
    public function show(Cuidado $cuidado): JsonResponse
    {
        $cuidado->load('animal'); // Carrega o animal relacionado ao cuidado
        return response()->json($cuidado); // Retorna o cuidado com o animal relacionado em Json
    }

  
    public function update(Request $request, Cuidado $cuidado): JsonResponse
    {
        $validatedData = $request->validate([
            'animal_id' => 'sometimes|integer|exists:animais,id',
            'nome_cuidado' => 'sometimes|string|max:255',
            'descricao' => 'sometimes|string',
            'frequencia' => 'sometimes|string|max:255',
        ]);

        $cuidado->update($validatedData); // Atualiza o cuidado com os dados validados
        $cuidado->load('animal'); // Carrega o animal relacionado ao cuidado
        return response()->json($cuidado); // Retorna o cuidado atualizado 
    }

    public function destroy(Cuidado $cuidado): JsonResponse
    {
        $cuidado->delete();
        return response()->json(null, 204);
    }
}

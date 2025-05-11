<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class AnimalController extends Controller
{
   
    public function index(): JsonResponse
    {
        
        $animais = Animal::orderBy('nome')->get();//Fazer a busca de todos os animais e os cuidados relacionados a cada um deles (Ordenado em ordem alfabética pelo nome do animal)
        
        return response()->json($animais);// retorna a resposta em formato JSON
    }

    
    public function store(Request $request): JsonResponse // Adiciona o tipo de retorno JsonResponse
    {
        // Validação dos dados recebidos com forme as regras definidas
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'data_nascimento' => 'nullable|date_format:Y-m-d',
            'especie' => 'required|string|max:255',
            'habitat' => 'nullable|string|max:255',
            'pais_origem' => 'nullable|string|max:255',
        ]);
        // Se a validação der certo, cria o animal
        $animal = Animal::create($validatedData);// Cria um novo animal com os dados validados
        return response()->json($animal, 201);// Retorna o animal criado (201 - criado com sucesso)
    }

    
    public function show(Animal $animal): JsonResponse 
    {
        // Busca o animal específico com os cuidados relacionados a ele
        $animal->load('cuidados');
        
        return response()->json($animal);
        
    
     
    }

    
    public function update(Request $request, Animal $animal): JsonResponse
    {
        
        $validatedData = $request->validate([
            'nome' => 'sometimes|string|max:255', // Sometimes significa que o campo pode ser opcional
            'descricao' => 'nullable|string',
            'data_nascimento' => 'nullable|date_format:Y-m-d',
            'especie' => 'sometimes|string|max:255',
            'habitat' => 'nullable|string|max:255',
            'pais_origem' => 'nullable|string|max:255',
        ]);

        $animal->update($validatedData);// Atualiza o animal com os dados validados
        $animal->load('cuidados');
        return response()->json($animal);// Retorna o animal atualizado em formato JSON
    }

    
    public function destroy(Animal $animal): JsonResponse
    {
       
        $animal->delete();// Deleta o animal
        return response()->json(null, 204);// Retorna uma resposta vazia (204 - sem conteúdo)
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Preco;

class PrecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getPreco(Request $request)
    {
        $validated = $request->validate([
            'material_id' => 'required|integer|exists:materiais,id',
            'medida_id' => 'required|integer|exists:medidas,id',
            'quantidade_id' => 'required|integer|exists:quantidades,id',
            'impressao' => 'nullable|string|in:F,FV',
            'tem_acabamento' => 'nullable|string|in:S,N',
        ]);
    
        // Cria a consulta inicial
        $precoQuery = Preco::where('material_id', $validated['material_id'])
                        ->where('medida_id', $validated['medida_id'])
                        ->where('quantidade_id', $validated['quantidade_id']);
    
        // Adiciona o filtro para tem_acabamento, se presente
        if (isset($validated['tem_acabamento'])) {
            $precoQuery->where('tem_acabamento', $validated['tem_acabamento']);
        }
    
        // Verifica se é necessário aplicar o filtro adicional para impressao
        if (in_array($validated['material_id'], [10, 11, 12])) {
            if (isset($validated['impressao'])) {
                $precoQuery->where('impressao', $validated['impressao']);
            } else {
                return response()->json(['message' => 'Selecione um tipo de impressão'], 400);
            }
        }
    
        // Busca o preço
        $preco = $precoQuery->first();
    
        if ($preco) {
            return response()->json(['preco' => $preco->preco]);
        } else {
            return response()->json(['message' => 'Preço não encontrado'], 404);
        }
    }

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getPreco(Request $request)
    {
        // Receba os dados do POST
        $quantidade = $request->input('quantidade');
        $largura_cm = $request->input('largura');
        $altura_cm = $request->input('altura');
        $idAcabamento = $request->input('produtoId');

        // Converter altura e largura para metros quadrados
        $altura_m = $altura_cm / 100; // Convertendo de cm para metros
        $largura_m = $largura_cm / 100; // Convertendo de cm para metros

        // Aqui você faz o cálculo do preço com base nos dados recebidos
        // Exemplo de cálculo fictício:
        $precoPorMetroQuadrado = 150; // Preço fictício por metro quadrado
        $area_m2 = $largura_m * $altura_m; // Área em metros quadrados
        $precoTotal = ($area_m2 * $precoPorMetroQuadrado) * $quantidade;

        // Retorne o preço total como resposta em JSON
        return response()->json(['precoTotal' => $precoTotal]);
    }

    
    public function index()
    {
        $nome = 'Novos Produtos';

        $produtos = Produto::all();

        return view('produtos', Compact('nome', 'produtos'));
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

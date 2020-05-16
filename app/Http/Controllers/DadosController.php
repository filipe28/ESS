<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dados;

class DadosController extends Controller
{
    public function criarDados(Request $request)
    {

        $dados = new Dados;

        $dados->temperatura = $request->input('temperatura');
        $dados->humidade = $request->input('humidade');
        $dados->percBateria = $request->input('percBateria');
        $dados->claridade = $request->input('claridade');
        $dados->haMovimento = $request->input('haMovimento');
        $dados->ledAceso = $request->input('ledAceso');

        $dados->save();

    }

    public function listarDados()
    {

        $query = Dados::query();

        $dados = $query->orderBy('dados_id','desc')->paginate(10);

        return view('dados.listarDados',compact('dados'));
    }
}

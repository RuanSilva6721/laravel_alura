<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mesagemSucesso = $request->session()->get('messagem.sucesso');
        $request->session()->forget('messagem.sucesso');

        return view('series.index')->with('series', $series)->with('mesagemSucesso', $mesagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        // $nomeSerie = $request->nome;
        // $serie = new Serie();
        // $serie->nome = $nomeSerie;
        // $serie->save();
        Serie::create($request->all());

        return redirect('/series');
    }

    public function destroy(Request $request){
        Serie::destroy($request->id);

        $request->session()->put('messagem.sucesso', 'Série removida com sucesso!');


        return redirect(route('series.index'));

    }
}

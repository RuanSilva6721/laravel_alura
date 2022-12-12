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
        // $mesagemSucesso = $request->session()->get('messagem.sucesso');
        $mesagemSucesso = session('messagem.sucesso');


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
        $serie = Serie::create($request->all());
        $request->session()->flash('messagem.sucesso', 'Série '.$serie->nome.' adicionada com sucesso!');

        return redirect('/series');
    }

    public function destroy(Request $request){

        $serie = Serie::find($request->id);

        Serie::destroy($request->id);


        return redirect(route('series.index'))->with('messagem.sucesso', 'Serie '.$serie->nome.' removida com sucesso!');

    }

    public function edit(Serie $serie){
        return view('series.edit', ['serie' => $serie]);

    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use App\Repositories\EloquentSeriesRepository;
use App\Repositories\SeriesRepository;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{

    public function __construct(private SeriesRepository $repository)
    {

    }

    public function index(Request $request)
    {

        $series = Series::with(['seasons'])->get();
        $series = Series::orderBy('nome', 'asc')->get()->pluck('nome', 'id');
        $mensagemExclui = $request->session()->get('mensagem.apagado');
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        return view(
            'series.index',
            compact('series', 'mensagemSucesso', 'mensagemExclui')
        );
    }
    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {

        $serie = $this->repository->add($request);

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$request->nome}' Adicionada com sucesso");
    }

    public function delete(Series $series, Request $request)
    {

        $series->delete();

        return redirect()->back()
            ->with('mensagem.apagado', "Serie '{$series->nome}' removida com sucesso");
    }
    public function edit(Series $series, Request $request)
    {

        return view('series.edit', compact('series'));
    }
    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return redirect()->route('series.index')->with('mensagem.sucesso', 'Série atualizada');
    }
}

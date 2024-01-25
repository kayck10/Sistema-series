<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use File;
use Illuminate\Http\Request;


class SeriesController extends Controller
{

    public function __construct(private SeriesRepository $repository)
    {
    }

    public function index(Request $request)
    {

        $series = Series::with(['seasons'])->get();
        $series = Series::orderBy('nome', 'asc')->get();
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
        $coverPath = $request->hasFile ('cover')
            ? $request->file('cover')->store('series_cover','public')
            :null;
      $request->coverPath = $coverPath;
      $serie = $this->repository->add($request);
      $ultimaSerie = Series::orderBy('id', 'desc')->get()->first();
        \App\Events\SeriesCreated::dispatch(
            (string)$request->nome,
            (int)$ultimaSerie->id,
            (int)$request->seasonsQty,
            (int)$request->episodesPerseason
        );
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$request->nome}' adicionada com sucesso");
    }

    public function delete(Series $series, Request $request)
    {

        File::delete('storage/' . $series->cover);
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

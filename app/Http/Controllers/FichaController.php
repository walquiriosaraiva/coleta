<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class FichaController
 * @package App\Http\Controllers
 */
class FichaController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $fichas = Ficha::all();
        return view('ficha.index', compact('fichas'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('ficha.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'titulo' => 'required|max:255',
            'descricao' => 'required',
            'autor' => 'required',
            'numero_pagina' => 'required|numeric'
        ]);

        $storeData['data_cadastro'] = Carbon::now();

        try {
            Ficha::create($storeData);

            return redirect()->route('fichas.index')
                ->withInput()
                ->with(['success' => 'Ficha gravado com sucesso']);

        } catch (\Exception $e) {
            return redirect()->route('fichas.index')
                ->withInput()
                ->with(['error' => 'Erro ao tentar gravar o ficha']);
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $ficha = Ficha::findOrFail($id);
        return view('ficha.show', compact('ficha'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $ficha = Ficha::findOrFail($id);
        return view('ficha.edit', compact('ficha'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'titulo' => 'required|max:255',
            'descricao' => 'required',
            'autor' => 'required',
            'numero_pagina' => 'required|numeric'
        ]);

        try {
            Ficha::whereId($id)->update($updateData);

            return redirect()->route('fichas.index')
                ->withInput()
                ->with(['success' => 'Ficha atualizado com sucesso']);

        } catch (\Exception $e) {
            return redirect()->route('fichas.index')
                ->withInput()
                ->with(['error' => 'Erro ao tentar atualizar o ficha']);
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $destroyData = Ficha::findOrFail($id);

        if ($destroyData->delete()):
            return redirect()->route('fichas.index')
                ->withInput()
                ->with(['success' => 'Ficha excluido com sucesso']);
        else:
            return redirect()->route('fichas.index')
                ->withInput()
                ->with(['error' => 'Erro ao tentar excluir o ficha']);
        endif;
    }

}

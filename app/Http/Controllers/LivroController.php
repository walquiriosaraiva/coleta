<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class LivroController
 * @package App\Http\Controllers
 */
class LivroController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $livros = Livro::all();
        return view('livro.index', compact('livros'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('livro.create');
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
            Livro::create($storeData);

            return redirect()->route('livros.index')
                ->withInput()
                ->with(['success' => 'Livro gravado com sucesso']);

        } catch (\Exception $e) {
            return redirect()->route('livros.index')
                ->withInput()
                ->with(['error' => 'Erro ao tentar gravar o livro']);
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $livro = Livro::findOrFail($id);
        return view('livro.show', compact('livro'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $livro = Livro::findOrFail($id);
        return view('livro.edit', compact('livro'));
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
            Livro::whereId($id)->update($updateData);

            return redirect()->route('livros.index')
                ->withInput()
                ->with(['success' => 'Livro atualizado com sucesso']);

        } catch (\Exception $e) {
            return redirect()->route('livros.index')
                ->withInput()
                ->with(['error' => 'Erro ao tentar atualizar o livro']);
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $destroyData = Livro::findOrFail($id);

        if ($destroyData->delete()):
            return redirect()->route('livros.index')
                ->withInput()
                ->with(['success' => 'Livro excluido com sucesso']);
        else:
            return redirect()->route('livros.index')
                ->withInput()
                ->with(['error' => 'Erro ao tentar excluir o livro']);
        endif;
    }

}

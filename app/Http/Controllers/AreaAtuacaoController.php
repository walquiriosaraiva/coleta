<?php

namespace App\Http\Controllers;

use App\Models\AreaAtuacao;
use App\Models\Ficha;
use Illuminate\Http\Request;

/**
 * Class AreaAtuacaoController
 * @package App\Http\Controllers
 */
class AreaAtuacaoController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $areaAtuacao = AreaAtuacao::all();
        return view('area-atuacao.index', compact('areaAtuacao'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('area-atuacao.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255'
        ]);

        try {
            AreaAtuacao::create($storeData);

            return redirect()->route('area-atuacao.index')
                ->withInput()
                ->with(['success' => 'Área de atuação gravado com sucesso']);

        } catch (\Exception $e) {
            return redirect()->route('area-atuacao.index')
                ->withInput()
                ->with(['error' => 'Erro ao tentar gravar']);
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $areaAtuacao = AreaAtuacao::findOrFail($id);
        return view('area-atuacao.show', compact('areaAtuacao'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $areaAtuacao = AreaAtuacao::findOrFail($id);
        return view('area-atuacao.edit', compact('areaAtuacao'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255'
        ]);

        try {
            AreaAtuacao::whereId($id)->update($updateData);

            return redirect()->route('area-atuacao.index')
                ->withInput()
                ->with(['success' => 'Área de atuação atualizado com sucesso']);

        } catch (\Exception $e) {
            return redirect()->route('area-atuacao.index')
                ->withInput()
                ->with(['error' => 'Erro ao tentar atualizar']);
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $destroyData = AreaAtuacao::findOrFail($id);
        $fichaVinculada = Ficha::where('id_area_atuacao', '=', $id)->count();

        if ($fichaVinculada === 0):
            if ($destroyData->delete()):
                return redirect()->route('area-atuacao.index')
                    ->withInput()
                    ->with(['success' => 'Área de atuação excluido com sucesso']);
            else:
                return redirect()->route('area-atuacao.index')
                    ->withInput()
                    ->with(['error' => 'Erro ao tentar excluir']);
            endif;
        else:
            return redirect()->route('area-atuacao.index')
                ->withInput()
                ->with(['error' => 'Área de atuação não pode ser excluida, pois já está vinculada']);
        endif;
    }

}

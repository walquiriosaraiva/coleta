<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class PerfilController
 * @package App\Http\Controllers
 */
class PerfilController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $perfis = Perfil::all();
        return view('perfil.index', compact('perfis'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('perfil.create');
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
            Perfil::create($storeData);

            return redirect()->route('perfil.index')
                ->withInput()
                ->with(['success' => 'Perfil gravado com sucesso']);

        } catch (\Exception $e) {
            return redirect()->route('perfil.index')
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
        $perfil = Perfil::findOrFail($id);
        return view('perfil.show', compact('perfil'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $perfil = Perfil::findOrFail($id);
        return view('perfil.edit', compact('perfil'));
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
            Perfil::whereId($id)->update($updateData);

            return redirect()->route('perfil.index')
                ->withInput()
                ->with(['success' => 'Perfil atualizado com sucesso']);

        } catch (\Exception $e) {
            return redirect()->route('perfil.index')
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
        $destroyData = Perfil::findOrFail($id);
        $usuarioVinculado = User::where('id_perfil', '=', $id)->count();

        if ($usuarioVinculado === 0):
            if ($destroyData->delete()):
                return redirect()->route('perfil.index')
                    ->withInput()
                    ->with(['success' => 'Perfil excluido com sucesso']);
            else:
                return redirect()->route('perfil.index')
                    ->withInput()
                    ->with(['error' => 'Erro ao tentar excluir']);
            endif;
        else:
            return redirect()->route('perfil.index')
                ->withInput()
                ->with(['error' => 'Perfil não pode ser excluido, pois já está vinculada']);
        endif;
    }

}

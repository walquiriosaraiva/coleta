<?php

namespace App\Http\Controllers;

use App\Models\AreaAtuacao;
use App\Models\Ficha;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if (auth()->user()->id_perfil === 3):
            $fichas = Ficha::where('id_user_cadastro', '=', auth()->user()->id)->get();
        else:
            $fichas = Ficha::all();
        endif;

        return view('ficha.index', compact('fichas'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function relatorio(Request $request)
    {
        $lideranca = DB::table('users')
            ->select('users.id', 'users.name')
            ->join('perfil', 'perfil.id', '=', 'users.id_perfil')
            ->get();

        $data = $request->all();
        if (isset($data['id_user_cadastro']) && $data['id_user_cadastro']):
            $userSelecionado = (int)$data['id_user_cadastro'];
            $fichas = Ficha::where('id_user_cadastro', '=', $data['id_user_cadastro'])->get();
        else:
            $userSelecionado = 0;
            $fichas = Ficha::all();
        endif;

        return view('ficha.relatorio', compact('fichas', 'lideranca', 'userSelecionado'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $areaAtuacao = AreaAtuacao::all();
        return view('ficha.create', compact('areaAtuacao'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'nome' => 'required|max:255',
            'cep' => 'required'
        ]);

        $storeData['data_cadastro'] = Carbon::now();
        $storeData['id_user_cadastro'] = auth()->user()->id;
        $storeData['telefone_whatsapp'] = $request->get('telefone_whatsapp');
        $storeData['telefone_telegram'] = $request->get('telefone_telegram');
        $storeData['cep'] = $request->get('cep');
        $storeData['rua'] = $request->get('rua');
        $storeData['numero'] = $request->get('numero');
        $storeData['bairro'] = $request->get('bairro');
        $storeData['cidade'] = $request->get('cidade');
        $storeData['uf'] = $request->get('uf');
        $storeData['ibge'] = $request->get('ibge');
        $storeData['telefone'] = $request->get('telefone');
        $storeData['email'] = $request->get('email');
        $storeData['facebook'] = $request->get('facebook');
        $storeData['instagram'] = $request->get('instagram');
        $storeData['id_area_atuacao'] = $request->get('id_area_atuacao');
        $storeData['outra_atuacao'] = $request->get('outra_atuacao');
        $storeData['aniversario'] = $request->get('aniversario');

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
        $areaAtuacao = AreaAtuacao::all();
        return view('ficha.show', compact('ficha', 'areaAtuacao'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $ficha = Ficha::findOrFail($id);
        $areaAtuacao = AreaAtuacao::all();
        return view('ficha.edit', compact('ficha', 'areaAtuacao'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'nome' => 'required|max:255',
            'cep' => 'required'
        ]);

        $updateData['data_cadastro'] = Carbon::now();
        $updateData['id_user_cadastro'] = auth()->user()->id;
        $updateData['telefone_whatsapp'] = $request->get('telefone_whatsapp');
        $updateData['telefone_telegram'] = $request->get('telefone_telegram');
        $updateData['cep'] = $request->get('cep');
        $updateData['rua'] = $request->get('rua');
        $updateData['numero'] = $request->get('numero');
        $updateData['bairro'] = $request->get('bairro');
        $updateData['cidade'] = $request->get('cidade');
        $updateData['uf'] = $request->get('uf');
        $updateData['ibge'] = $request->get('ibge');
        $updateData['telefone'] = $request->get('telefone');
        $updateData['email'] = $request->get('email');
        $updateData['facebook'] = $request->get('facebook');
        $updateData['instagram'] = $request->get('instagram');
        $updateData['id_area_atuacao'] = $request->get('id_area_atuacao');
        $updateData['outra_atuacao'] = $request->get('outra_atuacao');
        $updateData['aniversario'] = $request->get('aniversario');

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

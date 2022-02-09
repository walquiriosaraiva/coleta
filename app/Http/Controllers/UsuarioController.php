<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class UsuarioController
 * @package App\Http\Controllers
 */
class UsuarioController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        if ($this->perfil()):
            $users = User::where('id_user_cadastrou', '=', auth()->user()->id)->get();
        else:
            $users = User::all();
        endif;

        return view('user.index', compact('users'));
    }

    /**
     * @return bool
     */
    public function perfil()
    {
        return in_array(auth()->user()->id_perfil, [2]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        if ($this->perfil()):
            $perfis = Perfil::whereIn('id', [3, 4])->get();
        else:
            $perfis = Perfil::all();
        endif;

        return view('user.create', compact('perfis'));
    }

    public function store(Request $request)
    {
        try {
            User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'id_perfil' => $request->get('id_perfil'),
                'id_user_cadastrou' => auth()->user()->id
            ]);

            return redirect()->route('users.index')
                ->withInput()
                ->with(['success' => 'Usuário gravado com sucesso']);

        } catch (\Exception $e) {
            return redirect()->route('users.index')
                ->withInput()
                ->with(['error' => 'Erro ao tentar gravar o usuário']);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        if ($this->perfil()):
            $perfis = Perfil::whereIn('id', [3, 4])->get();
        else:
            $perfis = Perfil::all();
        endif;

        return view('user.edit', compact('user', 'perfis'));
    }

    public function editPerfil($id)
    {
        $user = User::findOrFail($id);
        $perfis = Perfil::all();

        if (in_array(auth()->user()->id_perfil, [2, 3, 4])):
            return view('user.perfil', compact('user', 'perfis'));
        else:
            return view('user.edit', compact('user', 'perfis'));
        endif;
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email'
        ]);

        $updateData['id_perfil'] = (int)$request->get('id_perfil');

        if ($request->get('password')):
            $updateData['password'] = Hash::make($request->get('password'));
        endif;

        if (User::whereId($id)->update($updateData)):
            return redirect()->route('users.index')
                ->withInput()
                ->with(['success' => 'Usuário atualizado com sucesso']);
        else:
            return redirect()->route('users.edit', $id)
                ->withInput()
                ->with(['error' => 'Erro ao tentar atualizar o usuário']);
        endif;

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePerfil(Request $request, $id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email'
        ]);

        if ($request->get('password')):
            $updateData['password'] = Hash::make($request->get('password'));
        endif;

        if (User::whereId($id)->update($updateData)):
            return redirect()->route('user.edit', $id)
                ->withInput()
                ->with(['success' => 'Perfil atualizado com sucesso']);
        else:
            return redirect()->route('user.edit', $id)
                ->withInput()
                ->with(['error' => 'Erro ao tentar atualizar o perfil']);
        endif;

    }

}

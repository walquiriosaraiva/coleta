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
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $perfis = Perfil::all();
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
        return view('user.edit', compact('user'));
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

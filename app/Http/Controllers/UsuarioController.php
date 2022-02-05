<?php

namespace App\Http\Controllers;

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

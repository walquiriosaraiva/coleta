<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) :
            Session::put('user', Auth::user());
            return redirect()->route('dashboard')
                ->withInput()
                ->with(['success' => 'Login realizado com sucesso']);
        endif;

        return redirect()->route('login')
            ->withInput()
            ->with(['error' => 'Error! Você inseriu credenciais inválidas']);

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $data = $request->all();
        if ($user = $this->create($data)):
            $credentials = $request->only('email', 'password');
            Auth::attempt($credentials);
            Session::put('user', Auth::user());
        endif;

        return redirect()->route('dashboard')
            ->withInput()
            ->with(['success' => 'Excelente! Você fez login com sucesso']);

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function dashboard()
    {
        if (Auth::check()) :
            $users = User::all();
            $countAdmin = 0;
            $countLiderCidade = 0;
            $countLideranca = 0;
            $countPessoas = 0;

            foreach ($users as $key => $value):
                if ($value->id_perfil === 1):
                    $countAdmin++;
                endif;

                if ($value->id_perfil === 2):
                    $countLiderCidade++;
                endif;

                if ($value->id_perfil === 3):
                    $countLideranca++;
                endif;

                if ($value->id_perfil === 4):
                    $countPessoas++;
                endif;
            endforeach;

            $arrayPerfis = [
                'Administrador' => $countAdmin,
                'Líder cidade' => $countLiderCidade,
                'Liderança' => $countLideranca,
                'Pessoa' => $countPessoas
            ];

            return view('dashboard', compact('arrayPerfis'));
        endif;

        return redirect()->route('login')
            ->withInput()
            ->with(['error' => 'Ops! Você não tem acesso']);

    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}

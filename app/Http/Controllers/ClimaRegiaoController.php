<?php

namespace App\Http\Controllers;

/**
 * Class ClimaRegiaoController
 * @package App\Http\Controllers
 */
class ClimaRegiaoController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $dados = $this->hgRequest(array(
            'city_name' => 'Brasília'
        ), env('APP_CHAVE_HGBRASIL'));

        return view('clima.index', compact('dados'));
    }

    /**
     * @param $parametros
     * @param null $chave
     * @param string $endpoint
     * @return bool|mixed
     */
    function hgRequest($parametros, $chave = null, $endpoint = 'weather')
    {
        $url = env('APP_URL_HGBRASIL') . '/' . $endpoint . '/?format=json&';

        if (is_array($parametros)) :
            if (!empty($chave)) :
                $parametros = array_merge($parametros, array('key' => $chave));
            endif;

            foreach ($parametros as $key => $value) :
                if (empty($value)) continue;
                $url .= $key . '=' . urlencode($value) . '&';
            endforeach;

            $resposta = file_get_contents(substr($url, 0, -1));
            return json_decode($resposta, true);

        else :
            return false;
        endif;
    }
}

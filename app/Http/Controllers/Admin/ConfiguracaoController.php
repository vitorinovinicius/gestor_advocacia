<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuracao;

class ConfiguracaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $configuracoes = [];

        $dbconfigs = Configuracao::get();

        foreach($dbconfigs as $dbconfig ){
            $configuracoes[ $dbconfig['nome'] ] = $dbconfig['conteudo'];
        }

        return view('admin.config.index', [
            'configuracoes' => $configuracoes
        ]);
    }

    public function save(Request $request)
    {
        $data = $request->only([
            'titulo',
            'sub-titulo',
            'e-mail',
            'bgcolor',
            'textcolor'
        ]);
        $validator = $this->validator($data);

        if($validator->fails()){
            return redirect()->route('config')
            ->withErrors($validator);
        }
        foreach($data as $item => $value){

            Configuracao::where('nome', $item)->update([
                'conteudo' => $value
            ]);
        }

        return redirect()->route('config')
            ->with('warning', 'Dados alterados com sucesso!');
    }

    protected function validator($data)
    {
        return Validator::make($data, [
            'titulo' => ['string', 'max:100'],
            'sub-titulo' => ['string', 'max:100'],
            'e-mail' => ['string', 'email'],
            'bgcolor' => ['string', 'regex:/#[A-Z0-9]{6}/i'],
            'textcolor' => ['string', 'regex:/#[A-Z0-9]{6}/i']
        ]);
    }
}

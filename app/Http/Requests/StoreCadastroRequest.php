<?php

namespace App\Http\Requests;

use App\Rules\NomeCompleto;
use Illuminate\Foundation\Http\FormRequest;

class StoreCadastroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => ['required', new NomeCompleto],
            'cpf' => 'required',
            'pis' => 'required',
            'profissao' => 'required',
            'sexo' => 'required',
            'estadoCivil' => 'required',
            'tratamento' => 'required',
            'numCtps' => 'required',
            'serieCtps' => 'required',
            'nacionalidade' => 'required',
            'dtNascimento' => 'required',
            'tituloEleitor' => 'required',
            'idtCivil' => 'required',
            'dtExpedicao' => 'required',
            'orgExpeditor' => 'required',
            'nomaMae' => 'required',
            'email' => 'required',
            'celular' => 'required',
            'logradouro' => 'required',
            'complemento' => 'required',
            'numEndereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'cep' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'cpf' => 'O campo cpf é obrigatório.',
            'pis.required' => '',
            'profissao.required' => '',
            'sexo.required' => '',
            'estadoCivil.required' => '',
            'tratamento.required' => '',
            'numCtps.required' => '',
            'serieCtps.required' => '',
            'nacionalidade.required' => '',
            'dtNascimento.required' => '',
            'tituloEleitor.required' => '',
            'idtCivil.required' => '',
            'dtExpedicao.required' => '',
            'orgExpeditor.required' => '',
            'nomaMae.required' => '',
            'email.required' => '',
            'celular.required' => '',
            'logradouro.required' => '',
            'numEndereco.required' => '',
            'bairro.required' => '',
            'cidade.required' => '',
            'uf.required' => '',
            'cep.required' => ''
        ];
    }
}

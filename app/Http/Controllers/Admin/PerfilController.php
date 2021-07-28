<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $loggedId = Auth::id();

        $usuario = User::find($loggedId);

        if($usuario){
            return view('admin.perfil.index', [
                'usuario' => $usuario
            ]);
        }

        return redirect()->route('admin');

    }

    public function save(Request $request)
    {
        $loggedId = Auth::id();
        $usuario = User::find($loggedId);

        if($usuario) {
            $data = $request->only([
                'name',
                'email',
                'password',
                'password_confirmation'
            ]);

            $validator = Validator::make([
                'name' => $data['name'],
                'email' => $data['email']
            ], [
                'name' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'email', 'max:100']
            ]);


            $usuario->name = $data['name'];

            if($usuario->email != $data['email']) {
                $hasEmail = User::where('email', $data['email'])->get();

                if(count($hasEmail) === 0) {
                    $usuario->email = $data['email'];
                } else {
                    $validator->errors()->add('email', __('validation.unique', [
                        'attribute' => 'email'
                    ]));
                }
            }

            if(!empty($data['password'])) {
                if(strlen($data['password']) >= 4) {
                    if($data['password'] === $data['password_confirmation']) {
                        $usuario->password = Hash::make($data['password']);

                    } else {
                        $validator->errors()->add('password', __('validation.confirmed', [
                            'attribute' => 'password'
                        ]));
                    }
                } else {
                    $validator->errors()->add('password', __('validation.min.string', [
                        'attribute' => 'password',
                        'min' => 4
                    ]));
                }
            }

            if(count($validator->errors()) > 0) {
                return redirect()->route('perfil', [
                    'usuario' => $loggedId
                ])->withErrors($validator);
            }

            $usuario->save();

            return redirect()->route('perfil')
            ->with('warning', 'Dados alterados com sucesso!');
        }

        return redirect()->route('perfil');
    }
}

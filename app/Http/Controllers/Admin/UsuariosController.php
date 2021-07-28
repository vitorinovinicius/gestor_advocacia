<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsuariosController extends Controller
{public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:edita_usuarios');
    }

    public function index()
    {
        $usuarios = User::paginate(10);
        $loggedId = Auth::id();
        return view('admin.usuarios.index', [
            'usuarios' => $usuarios,
            'loggedId' => $loggedId
        ]);
    }

    public function create()
    {
        return view('admin.usuarios.adicionar');
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'email',
            'password',
            'password_confirmation'
        ]);
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'max:200', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed']
        ]);
        if($validator->fails()) {
            return redirect()->route('usuarios.create')
                ->withErrors($validator)
                ->withInput();
        }
        $usuario = new User;
        $usuario->name = $data['name'];
        $usuario->email = $data['email'];
        $usuario->password = Hash::make($data['password']);
        $usuario->save();
        return redirect()->route('usuarios.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $usuario = User::find($id);
        if($usuario) {
            return view('admin.usuarios.editar', [
                'usuario' => $usuario
            ]);
        }
        return redirect()->route('usuarios.index');
    }

    public function update(Request $request, $id)
    {
        $usuario = User::find($id);

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
                return redirect()->route('usuarios.edit', [
                    'usuario' => $id
                ])->withErrors($validator);
            }

            $usuario->save();
        }

        return redirect()->route('usuarios.index');
    }

    public function destroy($id)
    {
        $loggedId = Auth::id();

        if($loggedId != $id) {
            $usuario = User::find($id);
            $usuario->delete();
        }

        return redirect()->route('usuarios.index');
    }
}

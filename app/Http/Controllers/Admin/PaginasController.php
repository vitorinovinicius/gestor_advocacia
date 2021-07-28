<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Pagina;

class PaginasController extends Controller
{public function index()
    {
        $this->middleware('auth');

        $paginas = Pagina::paginate(10);
        return view('admin.pages.index', [
            'paginas' => $paginas
        ]);
    }

    public function create()
    {
        return view('admin.pages.adicionar');
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'titulo',
            'corpo'
        ]);

        $data['slug'] = Str::slug($data['titulo'], '-');

        $validator = Validator::make($data, [
            'titulo' => ['required', 'string', 'max:200'],
            'corpo' => ['string'],
            'slug' => ['required', 'string', 'max:200', 'unique:paginas']
        ]);

        if($validator->fails()) {
            return redirect()->route('paginas.create')
                ->withErrors($validator)
                ->withInput();
        }

        $pagina = new Pagina;
        $pagina->titulo = $data['titulo'];
        $pagina->slug = $data['slug'];
        $pagina->corpo = $data['corpo'];
        $pagina->save();

        return redirect()->route('paginas.index');
    }

    public function edit($id)
    {
        $pagina = Pagina::find($id);
        if($pagina) {
            return view('admin.pages.editar', [
                'pagina' => $pagina
            ]);
        }
        return redirect()->route('paginas.index');
    }

    public function update(Request $request, $id)
    {
        $pagina = Pagina::find($id);

        if($pagina) {
            $data = $request->only([
                'titulo',
                'corpo'
            ]);

            if($pagina['titulo'] !== $data['titulo']){
                $data['slug'] = Str::slug($data['titulo'], '-');

                $validator = Validator::make($data, [
                    'titulo' => ['required', 'string', 'max:200'],
                    'corpo' => ['string'],
                    'slug' => ['required', 'string', 'max:200', 'unique:paginas']
                ]);
            } else{
                $validator = Validator::make($data, [
                    'titulo' => ['required', 'string', 'max:200'],
                    'corpo' => ['string']
                ]);
            }

            if($validator->fails()) {
                return redirect()->route('paginas.edit', [
                    'pagina' => $id
                ])
                    ->withErrors($validator)
                    ->withInput();
            }

            $pagina->titulo = $data['titulo'];
            $pagina->corpo = $data['corpo'];

            if(!empty($data['slug'])){
                $pagina->slug = $data['slug'];
            }

            $pagina->save();
        }

        return redirect()->route('paginas.index');
    }

    public function destroy($id)
    {
            $pagina = Pagina::find($id);
            $pagina->delete();

        return redirect()->route('paginas.index');
    }
}

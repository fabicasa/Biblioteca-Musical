<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use Illuminate\Http\Request;

class ArtistaController extends Controller
{


    function index()
    {
        $listaArtistas = Artista::all();
        return view('artistas.index', compact('listaArtistas'));

    }

    function create()
    {
        return view('artistas.form');
    }

    function store(Request $request)
    {
        $nombres = $request->get("nombres");
        $name = '';
        if ($request->hasFile('perfil')) {
            $file = $request->file('perfil');
            $name = md5($nombres) . '.' . $file->extension();
            $file->move (public_path() . '/images/perfil/',$name);
        }
        $objArtista = new Artista();
        $objArtista->nombres = $nombres;
        $objArtista->perfil = $name;
        $objArtista->save();
        return redirect('/artistas');
    }

    function edit($id)
    {
        $objArtista = Artista::find($id);
        return view('artistas.edit', compact('objArtista'));
    }

    function update(Request $request, $id)
    {
        $nombres = $request->get("nombres");
        $perfil=$request->get("perfil");
        $objArtista = Artista::find($id);
        $objArtista->nombres = $nombres;
        $objArtista->perfil=$perfil;
        $objArtista->save();
        return redirect('/artistas');
    }

    function delete($id)
    {
        $objArtista = Artista::find($id);
        $objArtista->delete();
        return redirect('/artistas');
    }

}

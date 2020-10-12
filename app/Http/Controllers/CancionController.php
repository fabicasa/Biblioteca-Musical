<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\cancion;
use Illuminate\Http\Request;

class CancionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaCanciones = Cancion::with('album')->get();
        return view('canciones.index', compact('listaCanciones'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaAlbumes=Album::all();
        return view('canciones.form',compact('listaAlbumes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombres = $request->get("nombres");
        $cantidad_veces_accedidas = 0;
        $album_id = $request->get("album_id");
        $name = '';
        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $name = md5($nombres) . '.mp3';
            $file->move (public_path() . '/images/archivo/',$name);
        }
        $objCancion = new Cancion();
        $objCancion->archivo = $name;
        $objCancion->nombres = $nombres;
        $objCancion->cantidad_veces_accedidas = $cantidad_veces_accedidas;
        $objCancion->album_id = $album_id;
        $objCancion->save();
        return redirect('/canciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function show(cancion $cancion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listaAlbumes=Album::all();
        $objCancion = Cancion::find($id);
        return view('canciones.edit', compact('objCancion','listaAlbumes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nombres = $request->get("nombres");
        $cantidad_veces_accedidas = 0;
        $album_id = $request->get("album_id");
        $archivo = $request->get("archivo");
        $objCancion = Cancion::find($id);
        $objCancion->nombres = $nombres;
        $objCancion->cantidad_veces_accedidas = $cantidad_veces_accedidas;
        $objCancion->album_id = $album_id;
        $objCancion->archivo=$archivo;
        $objCancion->save();
        return redirect('/canciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cancion  $cancion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objCancion = Cancion::find($id);
        $objCancion->delete();
        return redirect('/canciones');
    }
}

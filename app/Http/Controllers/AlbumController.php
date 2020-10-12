<?php

namespace App\Http\Controllers;

use App\Models\Album;

use App\Models\Artista;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaAlbumes = Album::with('artista')->get();
        return view('albumes.index', compact('listaAlbumes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaArtistas=Artista::all();
        return view('albumes.form',compact('listaArtistas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombres = $request->get("nombres");
        $artistas_id = $request->get("artistas_id");
        $lanzamiento = $request->get("lanzamiento");
        $name = '';
        if ($request->hasFile('caratula')) {
            $file = $request->file('caratula');
            $name = md5($nombres) . '.' . $file->extension();
            $file->move (public_path() . '/images/caratula/',$name);
        }
        $objAlbum = new Album();
        $objAlbum->caratula = $name;
        $objAlbum->nombres = $nombres;
        $objAlbum->artistas_id = $artistas_id;
        $objAlbum->lanzamiento = $lanzamiento;
        $objAlbum->save();
        return redirect('/albumes');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Album $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
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
        $listaArtistas=Artista::all();
        $objAlbum = Album::find($id);
        return view('albumes.edit', compact('objAlbum','listaArtistas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Album $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nombres = $request->get("nombres");
        $artistas_id = $request->get("artistas_id");
        $lanzamiento = $request->get("lanzamiento");
        $objAlbum = Album::find($id);
        $objAlbum->nombres = $nombres;
        $objAlbum->artistas_id = $artistas_id;
        $objAlbum->lanzamiento = $lanzamiento;
        $objAlbum->save();
        return redirect('/albumes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Album $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objAlbum = Album::find($id);
        $objAlbum->delete();
        return redirect('/albumes');
    }
}

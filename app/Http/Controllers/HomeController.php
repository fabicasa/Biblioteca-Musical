<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Cancion;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $artistas = Artista::All()->sortBy('nombres');
        $topCanciones = Cancion::All()->sortByDesc('candidate_veces_accedidas');

        return view('home', compact('artistas', 'topCanciones'));
    }

    public function search(Request $request) {
        $searchResults = [];
        if ($request->has('search')) {
            $search = $request->input('search');

            $searchResults = DB::table('canciones')
                                ->join('albumes', 'canciones.album_id', '=', 'albumes.id')
                                ->join('artistas', 'albumes.artistas_id', '=', 'artistas.id')
                                ->select('canciones.*')
                                ->where('canciones.nombres', 'like', "%$search%")
                                ->orWhere('albumes.nombres', 'like', "%$search%")
                                ->orWhere('artistas.nombres', 'like', "%$search%")
                                ->get();

        }
        

        $artistas = Artista::All()->sortBy('nombres');
        $topCanciones = Cancion::All()->sortByDesc('candidate_veces_accedidas');
        
        return view('home', compact('artistas', 'topCanciones', 'search', 'searchResults'));
    }
}

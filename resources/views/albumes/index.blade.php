@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Lista de Albumes') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre de Albúm</th>
                                <th>Artista</th>
                                <th>Año de lanzamiento</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listaAlbumes as $objAlbum)
                                <tr>
                                    <td>{{$objAlbum->id}}</td>
                                    <td>{{$objAlbum->nombres}}</td>
                                    <td>{{$objAlbum->artista->nombres}}</td>
                                    <td>{{$objAlbum->lanzamiento}}</td>
                                    <td><a href="/albumes/{{$objAlbum->id}}/edit" class="btn btn-primary">Editar</a>
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('¿Estás seguro que desea eliminar este albúm?')"
                                              method="post" action="{{route("albumes.destroy",$objAlbum->id)}}">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-danger" value="Eliminar"/>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

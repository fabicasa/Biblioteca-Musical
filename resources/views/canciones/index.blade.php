@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Lista de Canciones') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre canción</th>
                                <th>Veces Accedidas</th>
                                <th>Album</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listaCanciones as $objCancion)
                                <tr>
                                    <td>{{$objCancion->id}}</td>
                                    <td>{{$objCancion->nombres}}</td>
                                    <td>{{$objCancion->cantidad_veces_accedidas}}</td>
                                    <td>{{$objCancion->album->nombres}}</td>
                                    <td></td>
                                    <td><a href="/canciones/{{$objCancion->id}}/edit" class="btn btn-primary">Editar</a>
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('¿Estás seguro que desea eliminar este albúm?')"
                                              method="post" action="{{route("canciones.destroy",$objCancion->id)}}">
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

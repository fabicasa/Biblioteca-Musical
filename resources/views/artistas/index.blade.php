@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Lista de Artistas') }}</div>

                <div class="card-body">
                   <table class="table">
                       <thead>
                       <tr>
                           <th>ID</th>
                           <th>Nombres:</th>
                           <th></th>
                           <th></th>
                       </tr>
                       </thead>
                       <tbody>
                       @foreach($listaArtistas as $objArtista)
                           <tr>
                               <td>{{$objArtista->id}}</td>
                               <td>{{$objArtista->nombres}}</td>
                               <td><a href="/artistas/{{$objArtista->id}}" class="btn btn-primary">Editar</a></td>
                               <td>
                                   <form onsubmit="return confirm('¿Estás seguro que desea eliminar este artista?')" method="post" action="{{route("artistaDelete",$objArtista->id)}}">
                                       @csrf
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

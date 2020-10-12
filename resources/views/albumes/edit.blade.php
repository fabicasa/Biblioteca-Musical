@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Formulario Album') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('albumes.update',$objAlbum->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="nombres">Nombre:</label>
                                <input class="form-control" name="nombres" value="{{$objAlbum->nombres}}" id="nombres"/>
                            </div>
                            <div class="form-group">
                                <label for="artistas_id">Artista:</label>
                               <select class="form-control" name="artistas_id" id="artistas_id">
                                   @foreach($listaArtistas as $objArtista)
                                       <option value="{{$objArtista->id}}"{{$objArtista->artistas_id==$objArtista->id ? "selected":""}}>
                                           {{$objArtista->nombres}}
                                       </option>
                                   @endforeach
                               </select>
                            </div>
                            <div class="form-group">
                                <label for="lanzamiento">Lanzamiento:</label>
                                <input type="date" class="form-control" value="{{$objAlbum->lanzamiento}}"
                                       name="lanzamiento" id="lanzamiento"/>
                            </div>
                            <div class="form-group">
                                <label for="caratula">Caratula:</label>
                                <input type="file" class="form-control" value="{{$objAlbum->caratula}}"
                                       name="caratula" id="caratula"/>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary " value="Guardar"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

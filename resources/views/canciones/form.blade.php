@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">{{ __('Formulario Canciones') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('canciones.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nombres">Nombres:</label>
                                <input class="form-control" name="nombres" id="nombres"/>
                            </div>
                            <div class="form-group">
                                <label for="album_id">Album:</label>
                               <select class="form-control" name="album_id" id="album_id">
                                  @foreach($listaAlbumes as $objAlbum)
                                      <option value="{{$objAlbum->id}} ">{{$objAlbum->nombres}}</option>
                                   @endforeach
                               </select>
                            </div>
                            <div class="form-group">
                                <label for="archivo">Archivo:</label>
                                <input type="file" class="form-control" name="archivo" id="archivo"/>
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

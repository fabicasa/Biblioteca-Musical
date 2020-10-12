@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Formulario Artista') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('artistaUpdate',$objArtista->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="nombres">Nombre:</label>
                                <input class="form-control" name="nombres" value="{{$objArtista->nombres}}" id="nombres"/>
                            </div>
                            <div class="form-group">
                                <label for="perfil">Perfil:</label>
                                <input type="file" class="form-control" value="{{$objArtista->perfil}}"
                                       name="perfil" id="perfil"/>
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

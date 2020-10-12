@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">{{ __('Formulario Artista') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('artistas.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nombres">Nombres</label>
                                <input class="form-control" name="nombres" id="nombres"/>
                            </div>
                            <div class="form-group">
                                <label for="perfil">Perfil:</label>
                                <input type="file" class="form-control" name="perfil" id="perfil"/>
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <form class="form-group" method="post" action="{{route("home.search")}}">
            @csrf
                <div class="form-row">
                    <div class="col-11">
                    <input name="search"  class="form-control form-control-lg" type="text" value="{{$search ?? ''}}" placeholder="Buscar por artista, album, o cancion..." />
                    </div>

                    <div class="col-auto">
                    <button class="btn btn-dark" type="submit" id="search">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                </div>
            </form>
        </div>
    </div>

    @if(isset($search))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">
                Se encontraron los siguientes resultados para: <strong>{{$search}}</strong>
            </div>
            @if ($searchResults->count() > 0)
                <ul class="list-group">
                    @foreach($searchResults as $result)
                        <li class="list-group-item">
                            <i class="fas fa-play-circle"></i>
                            {{$result->nombres}}</li>
                    @endforeach
                </ul>    
            @else
                <div class="alert alert-warning">
                    No se encontraron resultados
                </div>
            @endif

            <br />
        </div>
    </div>
    
    @endif
    

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h5>Artistas</h5></div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach ($artistas ?? '' as $artista)
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="media">
                                <img src="/images/perfil/{{$artista->perfil}}" class="mr-3" alt="{{$artista->nombres}}" />
                                    <div class="media-body">
                                        <h5>{{$artista->nombres}}</h5>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Top 20 canciones</h5>
                </div>

                <div class="card-body">     
                    <div class="list-group">
                            @foreach ($topCanciones as $cancion)
                                <a href="#" class="list-group-item list-group-item-action">
                                    <i class="fas fa-play-circle"></i>
                                    {{$cancion->nombres}}
                                    -
                                    <strong>
                                        {{$cancion->Album->nombres}}
                                    </strong>
                                </a>
                            @endforeach
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

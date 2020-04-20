@extends('layouts.app')

@section('content')


<!-- Vista rápida del sitio -->
<div class="panel-default card mt-3">
    <h3 class="panel-heading card-header h5">Vista Rápida</h3>

    <div class="card-body row">
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><i class="far fa-file"></i></span>{{-- $numPost --}} 508</h2>
                <h4>Entradas</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><i class="fas fa-user-tie"></i> {{-- $numAuthors --}}17</h2>
                <h4>Usuarios</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><i class="fas fa-tags"></i></span>{{-- $numTags --}} 33</h2>
                <h4>Etiquetas</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><i class="fas fa-clone"></i></span>{{-- $numCategories --}} 15,336</h2>
                <h4>Categorias</h4>
            </div>
        </div>
    </div>
</div>

<!-- Vista rápida del sitio -->
<div class="panel-default card mt-4">
    <h3 class="panel-heading card-header h5">Actividad</h3>

    <div class="card-body">
        <h5 class="card-subtitle">Publicaciones recientes</h5>
        <ul class="list-group list-group-flush">
           {{-- @foreach($posts as $post)
                <li class="list-group-item"><span class="ml-4"> {{ $post->created_at }} </span> <span>{{ $post->title }}</span></li>
            @endforeach
            --}}
        </ul>
    </div>
</div>
@endsection

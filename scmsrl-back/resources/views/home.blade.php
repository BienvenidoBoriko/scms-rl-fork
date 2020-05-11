@extends('layouts.app')

@section('content')


<!-- Vista rápida del sitio -->
<div class="panel-default card mt-3">
    <h3 class="panel-heading card-header h5">Vista Rápida</h3>

    <div class="card-body row">
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><i class="far fa-file"></i>{{ $numPost }} </h2>
                <h4>Entradas</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><i class="fas fa-user-tie"></i> {{ $numAuthors }}</h2>
                <h4>Usuarios</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><i class="fas fa-tags"></i>{{ $numTags }}</h2>
                <h4>Etiquetas</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><i class="fas fa-clone"></i>{{ $numCategories }}</h2>
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
            @foreach($posts as $post)
                <li class="list-group-item d-flex justify-content-start "><span class="mr-5 h6">
                        {{ $post->created_at }} </span> <span class="ml-5 h7">{{ $post->title }}</span></li>
            @endforeach


        </ul>
    </div>
</div>
@endsection

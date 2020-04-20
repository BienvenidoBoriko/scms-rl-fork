@extends('layouts.app')

@section('content')


<!-- Vista rápida del sitio -->
<div class="panel-default card mt-3">
    <h3 class="panel-heading card-header h5">Vista Rápida</h3>

    <div class="card-body row">
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 508</h2>
                <h4>Entradas</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 17</h2>
                <h4>Usuarios</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 33</h2>
                <h4>Etiquetas</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 15,336</h2>
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
    </div>
</div>
@endsection

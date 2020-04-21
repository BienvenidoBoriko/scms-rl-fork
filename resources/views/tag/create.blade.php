@extends('layouts.app')

@section('content')

<section>

    <form class="mt-4 mb-2">
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="titulo">nombre<br></label><input class="form-control" type="text" id="titulo" required="required"></div>
                <div class="col"><label for="titulo">slug<br></label><input class="form-control" type="password"></div>
            </div>
        </div>
        <div class="form-group"><label for="contenido">descripcion<br></label><textarea class="form-control" id="contenido" placeholder="esto sera un editor integrado ckeditor"></textarea></div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="mDesc">Meta Descripcion<br></label><textarea class="form-control" id="mDesc"></textarea></div>
                <div class="col"><label for="pClaves">Meta Titulo<br></label><textarea class="form-control" id="pClaves"></textarea></div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="mDesc">Imagen de cabecera<br></label><input type="file"></div>
            </div>
        </div><button class="btn btn-primary mr-5" type="button">Guardar</button><button class="btn btn-primary ml-3 btn-secondary" type="button">Volver</button></form>
</section>
@endsection

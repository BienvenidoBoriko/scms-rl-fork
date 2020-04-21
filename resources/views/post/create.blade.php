@extends('layouts.app')



@section('content')
<form class="mt-4 mb-2">
    <div class="form-group"><label for="titulo">Titulo<br></label><input class="form-control" type="text" id="titulo"
            required="required"></div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label for="mDesc">Meta Descripcion<br></label><textarea class="form-control"
                    id="mDesc"></textarea></div>
            <div class="col"><label for="pClaves">Meta Palabras clave<br></label><textarea class="form-control"
                    id="pClaves"></textarea></div>
        </div>
    </div>
    <div class="form-group"><label for="contenido">Contenido<br></label><textarea class="form-control" id="contenido"
            placeholder="esto sera un editor integrado ckeditor"></textarea></div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label for="categoria">Categoria<br></label><select class="form-control" id="categoria">
                    <optgroup label="This is a group">
                        <option value="12" selected="">This is item 1</option>
                        <option value="13">This is item 2</option>
                        <option value="14">This is item 3</option>
                    </optgroup>
                </select></div>
            <div class="col"><label for="etiquetas">Etiquetas<br></label><input class="form-control" type="text"
                    id="etiquetas"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-check"><input class="form-check-input" type="checkbox" id="destacado"><label
                class="form-check-label" for="destacado">Destacado</label></div>
    </div>
    <div class="form-group"><label for="autor">Autor<br></label><select class="form-control" id="autor">
            <optgroup label="This is a group">
                <option value="12" selected="">This is item 1</option>
                <option value="13">This is item 2</option>
                <option value="14">This is item 3</option>
            </optgroup>
        </select></div>
</form><button class="btn btn-primary mr-5" type="button">Guardar</button><button
    class="btn btn-primary ml-3 btn-secondary" type="button">Volver</button></section>
</div>
@endsection

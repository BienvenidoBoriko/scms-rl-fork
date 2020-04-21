@extends('layouts.app')

@section('content')

<section>
    <form class="mt-4 mb-2" id="author-create-form" action="{{ route('author.store') }}">
        <div class="form-group">
            <div class="form-row">
                <div class="col col-sm-4 col-lg-3"><label for="titulo">Nombre<br></label><input class="form-control"
                        type="text" id="titulo" required="required"></div>
                <div class="col col-sm-4 col-lg-3"><label for="titulo">correo<br></label><input class="form-control"
                        type="password"></div>
                <div class="col col-sm-4 col-lg-2"><label for="titulo">contraseña<br></label><input class="form-control"
                        type="password"></div>
                <div class="col col-sm-4 col-lg-2"><label for="titulo">rol<br></label><select class="form-control">
                        <optgroup label="This is a group">
                            <option value="12" selected="">This is item 1</option>
                            <option value="13">This is item 2</option>
                            <option value="14">This is item 3</option>
                        </optgroup>
                    </select></div>
                <div class="col col-sm-4 col-lg-2"><label for="titulo">slug<br></label><input class="form-control"
                        type="password"></div>
            </div>
        </div>
        <div class="form-group"><label for="contenido">biografia<br></label><textarea class="form-control"
                id="contenido" placeholder="esto sera un editor integrado ckeditor"></textarea></div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="titulo">pagina web<br></label><input class="form-control" type="text"
                        id="titulo" required="required"></div>
                <div class="col"><label for="titulo">github<br></label><input class="form-control" type="password">
                </div>
                <div class="col"><label for="titulo">twitter<br></label><input class="form-control" type="password">
                </div>
                <div class="col"><label for="titulo">facebook<br></label><input class="form-control" type="password">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="mDesc">Meta Descripcion<br></label><textarea class="form-control"
                        id="mDesc"></textarea></div>
                <div class="col"><label for="pClaves">Meta Titulo<br></label><textarea class="form-control"
                        id="pClaves"></textarea></div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="mDesc">Imagen de usuario<br></label><input type="file"></div>
                <div class="col"><label for="pClaves">Imagen de cabecera<br></label><input type="file"></div>
            </div>
        </div><button class="btn btn-primary mr-5" type="button">Guardar</button><button
            class="btn btn-primary ml-3 btn-secondary" type="button">Volver</button>
    </form>
</section>
@endsection

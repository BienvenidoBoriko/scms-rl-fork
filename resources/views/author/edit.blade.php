@extends('layouts.app')

@section('content')

<section>
    <form class="mt-4 mb-2" id="author-create-form" action="{{ route('author.update',$author->id) }}" method="POST"
    enctype="multipart/form-data">
    @method('put')
        @csrf
        <div class="form-group">
            <div class="form-row">
                <div class="col col-sm-4 col-lg-3"><label for="titulo">Nombre<br></label><input name="name" class="form-control"
                    value="{{$author->name}}" type="text" id="titulo" required="required"></div>
                <div class="col col-sm-4 col-lg-3"><label for="titulo">correo<br></label><input name="email" class="form-control"
                    value="{{$author->email}}"    type="email"></div>
                <div class="col col-sm-4 col-lg-2"><label for="titulo">contraseña<br></label><input name="password" class="form-control"
                        type="password"></div>
                <div class="col col-sm-4 col-lg-2"><label for="titulo">rol<br></label><select name="rol_id" class="form-control">
                        <optgroup label="Roles">
                            @foreach($rols as $rol)
                                <option value="{{$rol->id}}" selected="{{$author->rol_id==$rol->id?'selected':''}}">{{$rol->name}}</option>
                            @endforeach
                        </optgroup>
                    </select></div>
                <div class="col col-sm-4 col-lg-2"><label for="titulo">slug<br></label><input name="slug" class="form-control"
                    value= "{{$author->slug}}"   type="text"></div>
            </div>
        </div>
        <div class="form-group"><label for="contenido">biografia<br></label><textarea name="bio" class="form-control"
                id="contenido" placeholder="esto sera un editor integrado ckeditor">{{$author->bio}}</textarea></div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="titulo">pagina web<br></label><input name="website" class="form-control" type="text"
                    value= "{{$author->website}}"    id="titulo" required="required"></div>
                <div class="col"><label for="titulo">github<br></label><input value= "{{$author->github}}" name="github" class="form-control" type="text">
                </div>
                <div class="col"><label for="titulo">twitter<br></label><input value= "{{$author->twitter}}" name="twitter" class="form-control" type="text">
                </div>
                <div class="col"><label for="titulo">facebook<br></label><input value= "{{$author->facebook}}" name="facebook" class="form-control" type="text">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="mDesc">Meta Descripcion<br></label><textarea name="meta_desc" class="form-control"
                        id="mDesc">{{$author->meta_desc}}</textarea></div>
                <div class="col"><label for="pClaves">Meta Titulo<br></label><textarea name="meta_title" class="form-control"
                        id="pClaves">{{$author->meta_title}}</textarea></div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="mDesc">Imagen de usuario<br></label><input name="profile_img" type="file"></div>
                <div class="col"><label for="pClaves">Imagen de cabecera<br></label><input name="cover_img" type="file"></div>
            </div>
        </div><button class="btn btn-primary mr-5" type="submit">Guardar</button><button
            class="btn btn-primary ml-3 btn-secondary" type="button">Volver</button>
    </form>
</section>
@php
    print_r($errors)
@endphp
@endsection

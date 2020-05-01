@extends('layouts.app')

@section('content')

<section>

    <form class="mt-4 mb-2" id="tag-create-form" action="{{ route('tag.update',$tag->id) }}" method="POST"
        enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="titulo">nombre<br></label><input class="form-control" type="text"
                value="{{$tag->name}}"    name="name" id="titulo" required="required"></div>
                <div class="col"><label for="titulo">slug<br></label><input name="slug" class="form-control"
                    value="{{$tag->slug}}"    type="text"></div>
            </div>
        </div>
        <div class="form-group">
            <label for="contenido">descripcion<br></label>
            <textarea class="form-control" id="contenido" name="description" placeholder="esto sera un editor integrado ckeditor">
                {{$tag->description}}</textarea>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="mDesc">Meta Descripcion<br></label><textarea name="meta_desc"
                        class="form-control" id="mDesc">{{$tag->meta_desc}}</textarea></div>
                <div class="col"><label for="pClaves">Meta Titulo<br></label><textarea name="meta_title"
                        class="form-control" id="pClaves">{{$tag->meta_title}}</textarea></div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="mDesc">Imagen de cabecera<br></label><input name="featured_img"
                        type="file"></div>
            </div>
        </div><button class="btn btn-primary mr-5" type="submit">Guardar</button><button
            class="btn btn-primary ml-3 btn-secondary" type="button">Volver</button>
    </form>
</section>
@php
    print_r($errors)
@endphp
@endsection

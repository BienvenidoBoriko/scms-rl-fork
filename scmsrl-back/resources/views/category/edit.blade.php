@extends('layouts.app')

@section('content')

<section>
    <form class="mt-4 mb-2" id="category-create-form" action="{{ route('category.update',$category->id )}}" method="POST"
    enctype="multipart/form-data">
    @method('put')
        @csrf
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="titulo">nombre<br></label><input name="name" class="form-control" type="text"
                id="titulo" value="{{$category->name}}" required="required"></div>
                <div class="col"><label for="titulo">slug<br></label><input value="{{$category->slug}}" name="slug" class="form-control" type="text"></div>
            </div>
        </div>
        <div class="form-group"><label for="contenido">descripcion<br></label><textarea class="form-control"
                id="contenido" name="description">{{$category->description}}</textarea></div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="mDesc">Meta Descripcion<br></label><textarea name="meta_desc" class="form-control"
                      id="mDesc">{{$category->meta_desc}}</textarea></div>
                <div class="col"><label for="pClaves">Meta Titulo<br></label><textarea name="meta_title" class="form-control"
                   id="pClaves">{{$category->meta_title}}</textarea></div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="mDesc">Imagen de cabecera<br></label><input name="featured_img" type="file"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check"><input class="form-check-input" {{$category->visibility=='true'?'checked="checked"':'' }} name="visibility" value="true" type="radio" id="destacado"><label
                    class="form-check-label" for="destacado">que se muestre en la pagina principal</label></div>
        </div><button class="btn btn-primary mr-5" type="submit">Guardar</button><button
            class="btn btn-primary ml-3 btn-secondary" type="button">Volver</button>
    </form>
</section>
@endsection

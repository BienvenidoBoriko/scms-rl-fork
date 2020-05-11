@extends('layouts.app')

@section('content')

<section>
    <form class="mt-4 mb-2" id="category-create-form" action="{{ route('category.store') }}" method="POST"
    enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="titulo">nombre<br></label><input name="name" class="form-control" type="text"
                value="{{old('name')}}" id="name" required="required"></div>
                <div class="col"><label for="slug">slug<br></label><input id="slug" value="{{old('slug')}}" name="slug" class="form-control" type="text"></div>
            </div>
        </div>
        <div class="form-group"><label for="description">descripcion<br></label><textarea class="form-control"
        id="description" name="description">{{old('description')}}</textarea></div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="meta_desc">Meta Descripcion<br></label><textarea name="meta_desc" class="form-control"
                id="meta_desc">{{old('meta_desc')}}</textarea></div>
                <div class="col"><label for="meta_title">Meta Titulo<br></label><textarea name="meta_title" class="form-control"
                id="meta_title">{{old('meta_title')}}</textarea></div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label class="custom-file-label" for="featured_img">Imagen de cabecera<br></label><input class="custom-file-input" id="featured_img" name="featured_img" type="file"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check"><input class="form-check-input" name="visibility" value="si" type="radio" id="destacado"><label
                    class="form-check-label" for="destacado">que se muestre en la pagina principal</label></div>
        </div><button class="btn btn-primary mr-5" type="submit">Guardar</button><button
            class="btn btn-primary ml-3 btn-secondary" type="button">Volver</button>
    </form>
</section>
@php
        print_r($errors)
    @endphp
@endsection

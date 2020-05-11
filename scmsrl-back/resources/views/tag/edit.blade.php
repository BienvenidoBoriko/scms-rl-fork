@extends('layouts.app')

@section('content')

<section>

    <form class="mt-4 mb-2" id="tag-create-form" action="{{ route('tag.update',$tag->id) }}" method="POST"
        enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="name">nombre<br></label><input class="form-control" type="text"
                value="{{$tag->name}}" id="name" name="name" id="titulo" required="required"></div>
                <div class="col"><label for="slug">slug<br></label><input name="slug" class="form-control"
                    value="{{$tag->slug}}" id="slug"   type="text"></div>
            </div>
        </div>
        <div class="form-group">
            <label for="description">descripcion<br></label>
            <textarea class="form-control" id="description" name="description">
                {{$tag->description}}</textarea>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="meta_desc">Meta Descripcion<br></label><textarea name="meta_desc"
                        class="form-control" id="meta_desc">{{$tag->meta_desc}}</textarea></div>
                <div class="col"><label for="meta_title">Meta Titulo<br></label><textarea name="meta_title"
                        class="form-control" id="meta_title">{{$tag->meta_title}}</textarea></div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label class="custom-file-label" for="featured_img">Imagen de cabecera<br></label><input name="featured_img"
                     class="custom-file-input" id="featured_img"  type="file"></div>
            </div>
        </div><button class="btn btn-primary mr-5" type="submit">Guardar</button><button
            class="btn btn-primary ml-3 btn-secondary" type="button">Volver</button>
    </form>
</section>
@endsection

@extends('layouts.app')

@section('content')

<section>
    <form class="mt-4 mb-2" id="category-create-form" action="{{ route('category.update',$category->id )}}" method="POST"
    enctype="multipart/form-data">
    @method('put')
        @csrf
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="name">nombre<br></label><input name="name" class="form-control @error('name') is-invalid @enderror" type="text"
                id="name" value="{{$category->name}}" required="required">
            <x-error-message name="name"/>
            </div>
                <div class="col"><label for="slug">slug<br></label><input value="{{$category->slug}}" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" type="text">
                <x-error-message name="slug"/>
                </div>
            </div>
        </div>
        <div class="form-group"><label for="description">descripcion<br></label><textarea class="form-control @error('description') is-invalid @enderror"
                id="description" name="description">{{$category->description}}</textarea>
            <x-error-message name="description"/>
            </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="meta_desc">Meta Descripcion<br></label><textarea name="meta_desc" class="form-control @error('meta_desc') is-invalid @enderror"
                      id="meta_desc">{{$category->meta_desc}}</textarea>
                    <x-error-message name="meta_desc"/>
                    </div>
                <div class="col"><label for="meta_title">Meta Titulo<br></label><textarea name="meta_title" class="form-control @error('meta_title') is-invalid @enderror"
                   id="meta_title">{{$category->meta_title}}</textarea>
                <x-error-message name="meta_title"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label class="custom-file-label" for="featured_img">Imagen de cabecera<br></label><input id="featured_img" class="custom-file-input @error('featured_img') is-invalid @enderror" name="featured_img" type="file">
                <x-error-message name="featured_img"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check"><input class="form-check-input @error('visibility') is-invalid @enderror" {{$category->visibility=='true'?'checked="checked"':'' }} name="visibility" value="true" type="radio" id="visibility"><label
                    class="form-check-label" for="visibility">que se muestre en la pagina principal</label>
                <x-error-message name="visibility"/>
                </div>
        </div><button class="btn btn-primary mr-5" type="submit">Guardar</button><button
            class="btn btn-primary ml-3 btn-secondary" type="button">Volver</button>
    </form>
</section>
@endsection

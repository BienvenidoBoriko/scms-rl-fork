@extends('layouts.app')

@section('content')

<section>

    <form class="mt-4 mb-2" id="tag-create-form" action="{{ route('tag.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="name">nombre<br></label><input
                        class="form-control @error('name') is-invalid @enderror" type="text" id="name"
                        value="{{ old('name') }}" name="name" required="required">
                    <x-error-message name="name"/>
                </div>
                <div class="col"><label for="slug">slug<br></label><input name="slug"
                        class="form-control @error('slug') is-invalid @enderror" id="slug"
                        value="{{ old('slug') }}" type="text">
                    <x-error-message name="slug"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="description">descripcion<br></label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                name="description">
            {{ old('description') }}</textarea>
            <x-error-message name="description"/>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="meta_desc">Meta Descripcion<br></label><textarea name="meta_desc"
                        class="form-control @error('meta_desc') is-invalid @enderror"
                        id="meta_desc">{{ old('meta_desc') }} </textarea>
                    <x-error-message name="meta_desc"/>
                </div>
                <div class="col"><label for="meta_title">Meta Titulo<br></label><textarea name="meta_title"
                        id="meta_title"
                        class="form-control @error('meta_title') is-invalid @enderror">{{ old('meta_title') }} </textarea>
                     <x-error-message name="meta_title"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label class="custom-file-label" for="featured_img">Imagen de
                        cabecera<br></label><input name="featured_img" id="featured_img"
                        class="custom-file-input @error('featured_img') is-invalid @enderror" type="file">
                    <x-error-message name="featured_img"/>
                </div>
            </div>
        </div><button class="btn btn-primary mr-5" type="submit">Guardar</button><button
            class="btn btn-primary ml-3 btn-secondary" type="button">Volver</button>
    </form>
</section>
@endsection

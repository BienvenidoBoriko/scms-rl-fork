@extends('layouts.app')

@section('content')
<section>
    <form class="mt-4 mb-2" action="{{ route('setting.store') }}" method="POST"
        enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="title">titulo del sitio<br></label><input value="
            {{ $title->value }}" name="title" id="title" class="form-control @error('title') is-invalid @enderror" type="text" required="required">
            <x-error-message name="title"/>
        </div>
                <div class="col"><label for="desc">descripcion corta<br></label><input value="
                    {{ $desc->value }}" name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" type="text">
                <x-error-message name="desc"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="lang">idioma del sitio<br></label><input value="
                    {{ $lang->value }}" name="lang" class="form-control @error('lang') is-invalid @enderror" type="text" id="lang" required="required">
                    <x-error-message name="lang"/>
                </div>
                <div class="col mt-4">
                     <div class="custom-file">
                         <input class="custom-file-input" name="cover_img" id="cover_img" type="file">
                         <label class="custom-file-label @error('cover_img') is-invalid @enderror" for="cover_img" >Imagen de cabecera</label>
                     </div>
                     <x-error-message name="cover_img"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="facebook">facebook<br></label><input name="facebook" class="form-control @error('facebook') is-invalid @enderror"
                    value="{{ $facebook->value }}"    type="text" id="facebook" required="required">
                <x-error-message name="facebook"/>
                </div>
                <div class="col"><label for="twitter">twitter<br></label><input name="twitter" id="twitter"
                    value="{{ $twitter->value }}"    class="form-control @error('twitter') is-invalid @enderror" type="text">
                    <x-error-message name="twitter"/>
                </div>
                <div class="col"><label for="email">email<br></label><input name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ $email->value }}"  type="text">
                    <x-error-message name="email"/>
                </div>
                <div class="col"><label for="github">github<br></label><input name="github" id="github"
                    value="{{ $github->value }}" class="form-control @error('github') is-invalid @enderror" type="text">
                    <x-error-message name="github"/>
                </div>
            </div>
        </div>

        <hr><button class="btn btn-primary mr-5" type="submit">Guardar</button><a
            class="btn btn-primary ml-3 btn-secondary" href="{{ URL::previous() }}">Volver</a>
    </form>
</section>

@endsection

@extends('layouts.app')

@section('content')
<section>
    <form class="mt-4 mb-2" action="{{ route('setting.store') }}" method="POST"
        enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="titulo">titulo del sitio<br></label><input value="
            {{ $title->value }}" name="title" class="form-control" type="text" id="titulo" required="required"></div>
                <div class="col"><label for="titulo">descripcion corta<br></label><input value="
                    {{ $desc->value }}" name="desc" class="form-control" type="text"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="titulo">idioma del sitio<br></label><input value="
                    {{ $lang->value }}" name="lang" class="form-control" type="text" id="titulo" required="required">
                </div>
                <div class="col"><label for="cover_img">Imagen de cabecera<br></label><input name="cover_img" id="cover_img" type="file">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="facebook">facebook<br></label><input name="facebook" class="form-control"
                    value="{{ $facebook->value }}"    type="text" id="facebook" required="required"></div>
                <div class="col"><label for="twitter">twitter<br></label><input name="twitter" id="twitter"
                    value="{{ $twitter->value }}"    class="form-control" type="text">
                </div>
                <div class="col"><label for="email">email<br></label><input name="email" id="email" class="form-control"
                    value="{{ $email->value }}"  type="text">
                </div>
                <div class="col"><label for="github">github<br></label><input name="github" id="github"
                    value="{{ $github->value }}" class="form-control" type="text">
                </div>
            </div>
        </div>

        <hr><button class="btn btn-primary mr-5" type="submit">Guardar</button><a
            class="btn btn-primary ml-3 btn-secondary" href="{{ URL::previous() }}">Volver</a>
    </form>
</section>

@php
    print_r( $errors)
@endphp
@endsection

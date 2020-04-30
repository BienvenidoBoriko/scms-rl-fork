@extends('layouts.app')

@section('content')
<section>
    <form class="mt-4 mb-2" action="{{ route('setting.store') }}" method="POST"
    enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <div class="form-row">
            <div class="col"><label for="titulo">titulo del sitio<br></label><input value="
            {{$title->value}}" name="title" class="form-control" type="text"
                        id="titulo" required="required"></div>
                <div class="col"><label for="titulo">descripcion corta<br></label><input value="
                    {{$desc->value}}" name="desc" class="form-control"
                        type="text"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="titulo">idioma del sitio<br></label><input value="
                    {{ $lang->value}}" name="lang" class="form-control" type="text"
                        id="titulo" required="required"></div>
                <div class="col"><label for="titulo">Admin general<br></label><select name="admin" class="form-control">
                        <optgroup label="Administradores">
                            @foreach($users as $user)
                                @if( $user->rol->name === 'admin')
                                    @if($admin->value==$user->id || $loop->first  || $admin->value === $user->id))
                                        <option value="{{ $user->id }}" selected="selected">{{ $user->name }}
                                        </option>
                                    @else
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                @endif
                            @endforeach
                        </optgroup>
                    </select></div>
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

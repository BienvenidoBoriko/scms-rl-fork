@extends('layouts.app')

@section('content')

<section>
    <form class="mt-4 mb-2" action="{{ route('post.store') }}" method="POST"
        enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label for="titulo">Titulo<br></label><input name="title" class="form-control" type="text"
                        id="titulo" required="required">
                </div>

                <div class="col"><label for="titulo">slug<br></label><input name="slug" class="form-control"
                        type="text"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="mDesc">Meta Descripcion<br></label><textarea name="meta_desc"
                        class="form-control" id="mDesc"></textarea></div>
                <div class="col"><label for="pClaves">Meta Titulo<br></label><textarea name="meta_title"
                        class="form-control" id="pClaves"></textarea></div>
                <div class="col"><label for="dCorta">Descripcion Corta<br></label><textarea name="custom_except"
                            class="form-control" id="dCorta"></textarea></div>
            </div>
        </div>
        <div class="form-group"><label for="contenido">Contenido<br></label><textarea name="html" class="form-control"
                id="contenido" placeholder="esto sera un editor integrado ckeditor"></textarea></div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="categoria">Categoria<br></label><select name="category_id"
                        class="form-control" id="categoria">
                        <optgroup label="categorias">
                            @foreach($categories as $category)
                                @if( $loop->first )
                                    <option value="{{ $category->id }}" selected="selected">{{ $category->name }}
                                    </option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                <div class="col">
                    <fieldset class="border border-secondary p-2">
                        <legend class="h6">Etiquetas</legend>
                        @foreach($tags as $tag)
                            <div class="custom-control custom-checkbox custom-control-inline">
                                @if( $loop->first)
                                    <input class="custom-control-input" type="checkbox" id="{{ $tag->name }}"
                                        checked="checked" name="tags[]" value="{{ $tag->id }}">
                                @else
                                    <input class="custom-control-input" type="checkbox" name="tags[]"
                                        value="{{ $tag->id }}">
                                @endif
                                <label class="custom-control-label" for="{{ $tag->name }}">{{ $tag->name }}</label>
                            </div>
                        @endforeach
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="form-group">
                <div class="custom-control custom-radio custom-control-inline ">
                    <input name="featured" value="1" class="custom-control-input" type="radio"
                        id="destacado"><label class="custom-control-label" for="destacado">Destacado</label>
                </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label for="autor">Autor<br></label><select name="author_id" class="form-control" id="autor">
                        <optgroup label="posibles autores">
                            @foreach($users as $user)
                                @if( $user->id === Auth::user()->id)
                                    <option value="{{ $user->id }}" selected="selected">{{ $user->name }}</option>
                                @else
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    </select>
                </div>

                <div class="col">
                    <label for="mDesc">Imagen de cabecera<br></label><input name="featured_img" type="file">
                </div>

            </div>
        </div>
        <button class="btn btn-primary mr-5" type="submit">Guardar</button>
        <button class="btn btn-primary ml-3 btn-secondary" type="button">Volver</button>
    </form>
</section>
@php
    print_r($errors)
@endphp
@endsection

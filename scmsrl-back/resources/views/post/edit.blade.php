@extends('layouts.app')

@section('content')

<section>
    <form class="mt-4 mb-2" action="{{ route('post.update',$post->id) }}" method="POST"
        enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label for="title">Titulo<br></label><input name="title"
                        class="form-control @error('title') is-invalid @enderror" type="text"
                        value="{{ $post->title }}" id="title" required="required">
                    <x-error-message name="title" />
                </div>

                <div class="col"><label for="titulo">slug<br></label><input name="slug"
                        class="form-control @error('slug') is-invalid @enderror" value="{{ $post->slug }}"
                        type="text">
                    <x-error-message name="slug" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="meta_desc">Meta Descripcion<br></label><textarea name="meta_desc"
                        class="form-control @error('meta_desc') is-invalid @enderror"
                        id="meta_desc">{{ $post->meta_desc }}</textarea>
                    <x-error-message name="meta_desc" />
                </div>
                <div class="col"><label for="meta_title">Meta Titulo<br></label><textarea name="meta_title"
                        class="form-control @error('meta_title') is-invalid @enderror"
                        id="meta_title">{{ $post->meta_title }}</textarea>
                    <x-error-message name="meta_title" />
                </div>
                <div class="col"><label for="custom_except">Descripcion Corta<br></label><textarea name="custom_except"
                        class="form-control @error('custom_except') is-invalid @enderror"
                        id="custom_except">{{ $post->custom_except }}</textarea>
                    <x-error-message name="custom_except" />
                </div>
            </div>
        </div>
        <div class="form-group"><label for="html">Contenido<br></label><textarea name="html"
                class="form-control @error('html') is-invalid @enderror" id="html">{{ $post->html }}</textarea>
            <x-error-message name="html" />
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="category_id">Categoria<br></label><select name="category_id"
                        class="form-control @error('category_id') is-invalid @enderror" id="category_id">
                        <optgroup label="categorias">
                            @foreach($categories as $category)
                                @if($loop->first )
                                    <option value="{{ $category->id }}" selected="selected">{{ $category->name }}
                                    </option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    </select>
                    <x-error-message name="category_id" />
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
                                    <input class="custom-control-input" id="{{ $tag->name }}" type="checkbox" name="tags[]"
                                        value="{{ $tag->id }}">
                                @endif
                                <label class="custom-control-label" for="{{ $tag->name }}">{{ $tag->name }}</label>
                            </div>
                        @endforeach
                    </fieldset>
                    <x-error-message name="tags" />
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form-row">
                <div class="col-md-2">
                    <div class="custom-control custom-radio custom-control-inline ">
                        <input name="featured" class="custom-control-input @error('featured') is-invalid @enderror"
                            type="radio"
                            {{ $post->featured==1 ? 'checked=checked' : '' }}
                            value="1" id="featured"><label class="custom-control-label" for="featured">Destacado</label>
                        <x-error-message name="featured" />
                    </div>
                </div>

                <div class="col-md-3">
                    <fieldset class="border border-secondary p-2">
                        <legend class="h6">Estado</legend>
                        <div class="custom-control custom-radio">
                            <input type="radio"
                                {{ $post->status=='publiced'?'checked="checked"':'' }}
                                id="publiced" value="publiced" name="status"
                                class="custom-control-input @error('status') is-invalid @enderror">
                            <label class="custom-control-label" for="publiced">Publicar</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio"
                                {{ $post->status=='draff'?'checked="checked"':'' }}
                                id="draff" name="status" value="draff" class="custom-control-input">
                            <label class="custom-control-label @error('status') is-invalid @enderror" for="draff">Guardar
                                como borrador</label>
                        </div>
                    </fieldset>
                    <x-error-message name="status" />
                </div>

                <div class="col-md-3">
                    <label for="autor">Autor<br></label><select name="author_id"
                        class="custom-select @error('author_id') is-invalid @enderror" id="autor">
                        <optgroup label="posibles autores">
                            @foreach($users as $user)
                                @if($user->id === Auth::user()->id)
                                    <option value="{{ $user->id }}" selected="selected">{{ $user->name }}</option>
                                @else
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    </select>
                    <x-error-message name="author_id" />
                </div>

                <div class="col-md-4 mt-4">
                    <div class="custom-file">
                        <input class="custom-file-input @error('featured_img') is-invalid @enderror" id="featured_img"
                            name="featured_img" type="file">
                        <label class="custom-file-label" for="featured_img">Imagen de
                            cabecera</label>
                        <x-error-message name="featured_img" />
                    </div>
                </div>

            </div>
        </div>

        <button class="btn btn-primary mr-5" type="submit">Guardar</button>
        <button class="btn btn-primary ml-3 btn-secondary" type="button">Volver</button>
    </form>
</section>
<script>
    CKEDITOR.replace('html', {
        filebrowserUploadUrl: "{{ route('post.image.upload', ['_token' => csrf_token() ]) }}",
        filebrowserUploadMethod: 'form'
    });

</script>
@endsection

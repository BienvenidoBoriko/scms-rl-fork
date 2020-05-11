@extends('layouts.app')

@section('content')

<section>
    <form class="mt-4 mb-2" id="author-create-form" action="{{ route('author.store') }}" method="POST"
    enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <div class="form-row">
                <div class="col col-sm-4 col-lg-3"><label for="name">Nombre<br></label><input id="name" name="name" class="form-control"
                    value="{{old('name')}} "   type="text" id="titulo" required="required"></div>
                <div class="col col-sm-4 col-lg-3"><label for="email">correo<br></label><input id="email" name="email" class="form-control"
                     value="{{old('email')}} "  type="email"></div>
                <div class="col col-sm-4 col-lg-2"><label for="password">contraseña<br></label><input id="password" name="password" class="form-control"
                    value="{{old('password')}}"    type="password"></div>
                <div class="col col-sm-4 col-lg-2"><label for="rol_id">rol<br></label><select id="rol_id" name="rol_id" class="form-control">
                        <optgroup label="Roles">
                            @foreach($rols as $rol)
                                <option value="{{$rol->id}}" selected="">{{$rol->name}}</option>
                            @endforeach
                        </optgroup>
                    </select></div>
                <div class="col col-sm-4 col-lg-2"><label for="slug">slug<br></label><input name="slug" class="form-control"
                     value="{{old('slug')}}" type="text" id="slug"></div>
            </div>
        </div>
        <div class="form-group"><label for="bio">biografia<br></label><textarea name="bio" class="form-control"
            value="{{old('bio')}} "   id="bio"></textarea></div>
        <div class="form-group">
            <div class="form-row">
                <div class="col"><label for="website">pagina web<br></label><input name="website" class="form-control" type="text"
                    value="{{old('website')}} "   id="website" required="required"></div>
                <div class="col"><label for="github">github<br></label><input value="{{old('github')}}" id="github" name="github" class="form-control" type="text">
                </div>
                <div class="col"><label for="twitter">twitter<br></label><input value="{{old('twitter')}}" id="twitter" name="twitter" class="form-control" type="text">
                </div>
                <div class="col"><label for="facebook">facebook<br></label><input id="facebook" value="{{old('facebook')}}" name="facebook" class="form-control" type="text">
                </div>
            </div>
        </div>
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
                <div class="col"><label class="custom-file-label" for="profile_img">Imagen de usuario</label><input class="custom-file-input" id="profile_img" name="profile_img" type="file"></div>
                <div class="col"><label class="custom-file-label" for="cover_img">Imagen de cabecera</label><input class="custom-file-input" id="cover_img" name="cover_img" type="file"></div>
            </div>
        </div><button class="btn btn-primary mr-5" type="submit">Guardar</button><button
            class="btn btn-primary ml-3 btn-secondary" type="button">Volver</button>
    </form>
</section>
@endsection

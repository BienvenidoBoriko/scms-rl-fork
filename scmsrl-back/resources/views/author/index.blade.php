@extends('layouts.app')

@section('content')

<a class="btn btn-secondary" href="{{ route('author.create') }}">Crear autor<br></a>
<div class="row">
    <div class="col-9">
        <form class="mt-4 mb-2" action="{{ route('author.filter') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
            <div class="form-row">
                <div class="col col-md-2">
                    <label class="mr-sm-2 sr-only" for="filtrar">filtrar</label>
                <select class="custom-select mr-sm-2" name="filterParameter" id="filtrar">
                    <option selected="selected" value="name">Nombre</option>
                    <option value="rol">Rol</option>
                </select>
                </div>
                <div class="col col-md-5"><input value="{{old('value')}}" name='value' class="form-control" type="text"></div>
                <div class="col col-md-2"><button class="btn btn-primary" type="submit">Buscar</button></div>
            </div>
        </form>
    </div>
</div>
<div class="table-responsive mt-4 mb-4">
    <table class="table">
        <thead>
            <tr>
                <th>Role</th>
                <th>Avatar</th>
                <th>Nombre</th>
                <th>Numero de entradas</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
                <tr>
                <td>{{$author->rol->name}}</td>
                    <td><img class="profileImg"
                            src="{{ asset("$author->profile_img") }}"
                            alt="imagen de usuario {{ $author->name }}"> </td>
                    <td> {{ $author->name }} </td>
                    <td>{{ $author->posts_count }}</td>
                    <td>
                        <a href="{{route('author.edit', $author->id)}}" class="btn btn-sml btn-secondary">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('author.destroy', $author->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sml btn-danger" onClick="return confirm('Estas seguro de querrer eliminarlo?')"> Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<nav class="d-flex justify-content-end">
    {{ $authors->links() }}
</nav>
</section>
@endsection

@extends('layouts.app')

@section('content')

<a class="btn btn-secondary" href="{{ route('author.create') }}">Crear autor<br></a>
<div class="row">
    <div class="col-9">
        <form class="mt-4 mb-2">
            <div class="form-row">
                <div class="col col-md-2">
                    <div class="dropdown"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Nombre</button>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                    </div>
                </div>
                <div class="col col-md-5"><input class="form-control" type="text"></div>
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

 {{ session('error')}}
 {{ session()->get('success') }}
 {{ session()->get('error') }}
@endsection

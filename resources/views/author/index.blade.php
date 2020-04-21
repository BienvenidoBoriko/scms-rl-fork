@extends('layouts.app')

@section('content')

<a class="btn btn-secondary" href="{{ route('author.create') }}">Crear autor<br></a>
<form class="mt-4 mb-2">
    <div class="form-row">
        <div class="col col-md-2">
            <div class="dropdown"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false" type="button">Nombre</button>
                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First
                        Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a
                        class="dropdown-item" role="presentation" href="#">Third Item</a></div>
            </div>
        </div>
        <div class="col col-md-5"><input class="form-control" type="text"></div>
        <div class="col col-md-2"><button class="btn btn-primary" type="button">Buscar</button></div>
        <div class="col col-md-3"><button class="btn btn-primary ml-5 btn-danger" type="button">Borrar</button></div>
    </div>
</form>
<div class="table-responsive mt-4 mb-4">
    <table class="table">
        <thead>
            <tr>
                <th>&nbsp; &nbsp;&nbsp;<input type="checkbox"></th>
                <th>Avatar</th>
                <th>Nombre</th>
                <th>Numero de entradas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
                    <tr>
                        <td>&nbsp; &nbsp;&nbsp;<input type="checkbox"></td>
                    <td><img class="profileImg" src="{{asset("storage/$author->profile_img") }}" alt="imagen de usuario {{$author->name}}"> </td>
                        <td>  {{ $author->name }} </td>
                        <td>{{ $author->posts_count  }}</td>
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

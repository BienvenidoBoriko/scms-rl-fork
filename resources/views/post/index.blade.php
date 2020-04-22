@extends('layouts.app')

@section('content')
<section>
    <a class="btn btn-secondary" href="{{ route('post.create') }}">Crear entrada</a>
    <form class="mt-4 mb-2">
        <div class="form-row">
            <div class="col col-md-2 col-lg-1">
                <div class="dropdown"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false" type="button">Titulo</button>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First
                            Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a
                            class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                </div>
            </div>
            <div class="col col-md-5"><input class="form-control" type="text"></div>
            <div class="col col-md-2"><button class="btn btn-primary" type="button">Buscar</button></div>
            <div class="col col-md-3"><button class="btn btn-primary ml-5 btn-danger" type="button">Borrar</button>
            </div>
        </div>
    </form>
    <div class="table-responsive mt-4 mb-4">
        <table class="table">
            <thead>
                <tr>
                    <th>&nbsp; &nbsp;&nbsp;<input type="checkbox"></th>
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>Etiquetas</th>
                    <th>Featured</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>&nbsp; &nbsp;&nbsp;<input type="checkbox"></td>
                        <td> {{ $post->title }} </td>
                        <td> {{ $post->category->name }} </td>
                        <td>
                            @foreach($post->tags as $tag)
                            <span class="badge badge-secondary">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @if($post->featured==true) si @else no @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <nav class="d-flex justify-content-end">
        {{ $posts->links() }}
    </nav>
</section>
@endsection

@extends('layouts.app')

@section('content')
<section>
    <a class="btn btn-secondary" href="{{ route('post.create') }}">Crear entrada</a>
    <form class="mt-4 mb-2">
        <div class="form-row">
            <div class="col col-md-2 col-lg-1">
                <label class="mr-sm-2 sr-only" for="filtrar">Preference</label>
                <select class="custom-select mr-sm-2" id="filtrar">
                    <option selected>nombre</option>
                </select>
            </div>
            <div class="col col-md-5"><input class="form-control" type="text"></div>
            <div class="col col-md-2"><button class="btn btn-primary" type="button">Buscar</button></div>
        </div>
    </form>
    <div class="table-responsive mt-4 mb-4">
        <table class="table">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>Etiquetas</th>
                    <th>Featured</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td> {{ Str::limit( $post->title,50) }} </td>
                        <td> {{ $post->category->name }} </td>
                        <td>
                            @foreach($post->tags as $tag)
                                <span class="badge badge-secondary">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @if($post->featured==true) si @else no @endif
                        </td>

                        <td>
                            <a href="{{ route('post.edit', $post->id) }}"
                                class="btn btn-sml btn-secondary"> Editar</a>

                        </td>
                        <td>
                            <form action="{{ route('post.destroy', $post->id) }}"
                                method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sml btn-danger"
                                    onClick="return confirm('Estas seguro de querrer eliminarlo?')"><i
                                        class="fa fa-timex"></i> Borrar</button>
                            </form>
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

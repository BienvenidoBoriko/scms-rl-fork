@extends('layouts.app')

@section('content')

<section>
    <a class="btn btn-secondary" href="{{ route('tag.create') }}">Crear etiqueta</a>
    <form class="mt-4 mb-2" action="{{ route('tag.filter') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col col-md-2">
                <label class="mr-sm-2 sr-only" for="filtrar">filtrar</label>
                <select class="custom-select mr-sm-2" name="filterParameter" id="filtrar">
                    <option selected="selected" value="name">Nombre</option>
                </select>
            </div>
            <div class="col col-md-5"><input value="{{old('name')}}" name='name' class="form-control" type="text"></div>
            <div class="col col-md-2"><button class="btn btn-primary" type="submit">Buscar</button></div>
        </div>
    </form>
    <div class="table-responsive mt-4 mb-4">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Numero de entradas</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td> <a href="{{ config('settings.host-front').':'.config('settings.port-front').'/tags/'.$tag->id }}"> {{ $tag->name }}</a> </td>
                        <td> {{ $tag->posts_count }} </td>
                        <td>
                            <a href="{{route('tag.edit', $tag->id)}}" class="btn btn-sml btn-secondary"> Editar</a>
                        </td>
                        <td>
                            <form action="{{route('tag.destroy', $tag->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sml btn-danger" onClick="return confirm('Estas seguro de querrer eliminarlo?')"><i class="fa fa-timex"></i> Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <nav class="d-flex justify-content-end">
        {{ $tags->links() }}
    </nav>
</section>

@endsection

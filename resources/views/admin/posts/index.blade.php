@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('deleted'))
            <div class="alert alert-success"><strong>{{ session('deleted') }}</strong> eliminato correttamente</div>
        @endif
        <h1 class="mt-4">Elenco Articoli</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-4">Nuovo articolo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titolo</th>
                    <th>Slug</th>
                    <th>Categoria</th>
                    <th>Tags</th>
                    <th colspan="3">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>
                            @if ($post->category)
                            <h3><a href="{{ route('admin.categories.show', $post->category->id) }}" class="badge badge-info">{{ $post->category->name }}</a></h3>
                            @endif
                        </td>
                        <td>
                            @foreach ($post->tags as $tag)
                            <span class="badge badge-pill badge-dark">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('admin.posts.show', $post->id) }}">SHOW</a>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">EDIT</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onSubmit="return confirm('Sei sicuro di voler eliminare questo articolo?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
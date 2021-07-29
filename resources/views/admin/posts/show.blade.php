@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>{{ $post->title }}
            @if ($post->category)
                <a href="{{ route('admin.categories.show', $post->category->id) }}" class="badge badge-info">{{ $post->category->name }}</a>
            @else
                <span class="badge badge-secondary">Nessuna categoria associata</span>
            @endif
        </h1>
        <small>{{ $post->slug }}</small>

        <div class="mt-3 h4">
            @forelse ($post->tags as $tag)
                <span class="badge badge-pill badge-dark">{{ $tag->name }}</span>
            @empty
                <h5 class="mt-3">Nessun tag associato</h5>
            @endforelse
        </div>

        <div class="mt-3">
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Modifica</a>
            <a class="btn btn-secondary ml-2" href="{{ route('admin.posts.index') }}">Elenco post</a>
        </div>
        <div class="mt-4">{{ $post->content }}</div>
    </div>
@endsection
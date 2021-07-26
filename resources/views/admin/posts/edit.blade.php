@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Modifica l'articolo: <span class="text-info">{{ $post->title }}</span></h1>
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Inserisci il titolo dell'articolo" value="{{ old('title', $post->title) }}">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Testo</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="6" placeholder="Inserisci il testo dell'articolo">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary ml-2">Elenco post</a>
        </form>
    </div>
@endsection
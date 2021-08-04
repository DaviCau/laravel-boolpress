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
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
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

            <div class="form-group">
                <label for="cover">Immagine di copertina</label>

                @if ($post->cover)
                    <div class="mb-3">
                        <img style="width: 200px" src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title }}"> 
                    </div>
                @endif

                <input type="file" name="cover" class="form-control-file @error('cover') is-invalid @enderror" id="cover">
                @error('cover')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                    <option value="">-- Seleziona una categoria --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <h5>Tags</h5>
                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        @if ($errors->any())
                            <input class="form-check-input" name="tags[]" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                        @else
                            <input class="form-check-input" name="tags[]" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" {{ $post->tags->contains($tag->id) ? 'checked' : '' }}>
                        @endif
                        <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                    </div>
                @endforeach
                @error('tags')
                    <div>
                        <small class="text-danger">{{ $message }}</small>
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary ml-2">Elenco post</a>
        </form>
    </div>
@endsection
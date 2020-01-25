@extends('layout.layout')

@section('content')
    @forelse ($articles as $article)
        <p><a href="{{ route('articles.show', $article->id)}}">Article Title: {{ $article->title}}</a> </p>
        <p>Article excerpt: {{ $article->excerpt}}</p>
        <p>Article body: {{ $article->body}}</p>
        
        @foreach ($article->tags as $tag)
            <p>Tag: {{ $tag->name }}</p>
        @endforeach
        <br>
    @empty
        <p>No relevant articles yet</p>
    @endforelse

    <a href="{{ route('articles.create') }}">CREATE NEW ARTICLE</a>
@endsection
@extends('layout.layout')

@section('content')

    <p> Article Title: {{ $article->title}}</p>
    <p>Article excerpt: {{ $article->excerpt}}</p>
    <p>Article body: {{ $article->body}}</p>

    <h2>Display related tags name</h2>
    <p style="margin-top: 30px">
      @foreach ($article->tags as $tag)
        {{-- <a href="/articles?tag={{ $tag->name }}">{{ $tag->name}}</a> --}}
        <a href="{{ route('articles.index', ['tag' => $tag->name]) }}">{{ $tag->name}}</a>
      @endforeach
    </p>

@endsection


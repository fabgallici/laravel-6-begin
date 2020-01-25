@extends('layout.layout')

@section('content')

    <form action="{{ route('articles.store') }}" method="POST">
      @csrf
      @method('POST')

      <label for="title">Article Title:</label>
      <input type="text" name="title">
      <br>
      <label for="excerpt">Excerpt:</label>
      <input type="text" name="excerpt">
      <br>
      <label for="body">Body text</label>
      <textarea class="@error('body') is-danger @enderror" name="body" id="body">{{ old('body') }}</textarea>
      @error('body')
        <p class="help is-danger">{{ $errors->first('body') }}</p>
      @enderror
      <br>

      <label for="tags">TAGS:</label>
      <select name="tags[]" id=""></select>
      @error('tags')
        {{-- <p class="is-danger">{{ $errors->first('tags') }}</p> --}}
        <p class="is-danger">{{ $message }}</p>
      @enderror

      <button type="submit">NEW ARTICLE</button>
    </form>

@endsection
@extends('layouts.base')

@section('title', "Crear una película")

@section('content')

    @if (count($errors)>0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>
            {{$error}}
          </li>
        @endforeach
      </ul>
    </div>
    @endif

  <form action="/movies" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label>Title</label>
      <input type="text"
        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
        name="title"
        value="{{old('title')}}"
      >
      @if ($errors->has('title'))
        <div class="alert alert-danger">
          {{ $errors->first('title') }}
        </div>
      @endif
    </div>
    <div class="form-group">
      <label>Rating</label>
      <input type="text" class="form-control" name="rating" value="{{old('rating')}}">
    </div>
    <div class="form-group">
      <label>Awards</label>
      <input type="text" class="form-control" name="awards" value="{{old('awards')}}">
    </div>
    <div class="form-group">
      <label>Release date</label>
      <input type="date" class="form-control" name="release_date" value="{{old('release_date')}}">
    </div>
    <div class="form-group">
      <label>Poster</label>
      <input type="file" class="form-control" name="poster">
    </div>
    <button type="submit" class="btn btn-info">GUARDAR</button>
  </form>
@endsection

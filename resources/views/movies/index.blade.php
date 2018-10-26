@extends('layouts.base')

@section('title', "Listado de peliculas")

@section('content')
  <h1>Películas del sitio</h1>
  <a href="/movies/create" class="btn btn-success">crear película</a>
  <ul>
    @foreach ($movies as $movie)
      <li>
        <a href="/movies/{{$movie->id}}">
          {{ $movie->getTitleAndRating() }} /
          {{ $movie->genre ? $movie->genre->name : 'No genre'  }}
        </a>
      </li>
    @endforeach
  </ul>
@endsection

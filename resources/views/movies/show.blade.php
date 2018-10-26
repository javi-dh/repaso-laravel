@extends('layouts.base')

@section('title', "Detalle de la pelicula")

@section('content')
  <h1>{{$movie->title}}</h1>
  <p>Rating: {{$movie->rating}}</p>
  <p>Premios: {{$movie->awards}}</p>
  <p>Género: {{$movie->genre_id}}</p>
  <img src="/storage/posters/{{ $movie->poster }}" width="200">
  <hr>
  <a href="/" class="btn btn-success">Volver atrás</a>
@endsection

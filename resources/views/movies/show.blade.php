@extends('layouts.app')
@section('content')
    <h1>Movie ID: {{ $movie->id }}</h1>
    <hr>
    <h2>{{ $movie->name }}</h2>
    <p>{{ $movie->description }}</p>

    <a href="/movies/{{ $movie->id }}/edit">Editar</a>
@endsection

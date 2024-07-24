@extends('layouts.app')
@section('content')
<h1>Editar Tarea: {{ $movie->id }}</h1>

<form action="/movies/{{ $movie->id }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label class="form-label" for="name">Title</label>
        <input class="form-control" type="text" name="title" id="title" value="{{ $movie->title }}">
    </div>

    <div>
            <label for="year">Año</label>
            <input type="number" name="year" id="year" value="{{ $movie->year }}">
        </div>
        <div>
            <label for="studio">Estudio</label>
            <input type="text" name="studio" id="studio" value="{{ $movie->studio }}">
        </div>
    <div>
        <label class="form-label" for="category">Genero</label>
        <select class="form-select" name="category[]" id="category" required multiple>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $movie->category_id ? 'selected' : '' }}>{{ $category->name }}>
                </option>
            @endforeach
        </select>
       
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
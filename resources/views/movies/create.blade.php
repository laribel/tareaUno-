@extends('layouts.app')
@section('content')
<h1>Añadir Pelicula</h1>
<form action="/movies" method="POST">
    @csrf

    <div>
        <label class="form-label" for="title">Titulo</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>
   
    <div>
        <label class="form-label" for="year">Year</label>
        <input type="number" name="year" id="year" class="form-control">
    </div>
    
    <div>
        <label class="form-label" for="studio">Studio</label>
        <input type="text" name="studio" id="studio" class="form-control">
    </div>

    <div>
        <label class="form-label" for="category">Genero</label>
        <select name="category[]" id="category" class="form-control" multiple>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create Movie</button>
</form>
@endsection
@extends('layouts.app')
@section('content')
<h2 class="display-6 text-center mb-4">Tareas</h2>

<a href="/movies/create" class="btn btn-outline-primary">Nueva Tarea</a>
<div class="table-responsive">
    <table class="table text-left">
        <thead>
            <tr>
                <th style="width: 5%">ID</th>
                <th style="width: 5%">Title</th>
                <th style="width: 22%;">Year</th>
                <th style="width: 22%;">Studio</th>
                <th style="width: 22%;">Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr>

                <th scope="row" class="text-start">{{ $movie->id }}</th>
              
                <th scope="row" class="text-start">
                    <a href="/movies/{{ $movie->id}}">{{ $movie->title }}</a>
                </th>

                <td class="text-start">
                    {{ $movie->year }}
                </td>

                <td class="text-start">
                    {{ $movie->studio }}
                </td>

                <td class="text-start">
                    <span class="badge text-bg-warning">{{ $movie->category?->name ?? 'No Category' }}</span> <!-- Muestra un mensaje si la categoría es nula -->
                </td>
            </tr>
            @endforeach
          
        </tbody>


    </table>
</div>
@endsection




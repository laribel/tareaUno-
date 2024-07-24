<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', [
            'movies' => $movies,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('movies.create', [
            'categories' => $categories,
        ]);
    }

    public function show(Movie $movie)
    {
        return view('movies.show', [
            'movie' => $movie,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'year' => ['required', 'min:3'],
            'studio' => ['required', 'min:3', 'max:255'],
            'category_id' => 'required|exists:categories,id', // Cambiado a category_id
        ]);

        // Crear la película y asignar la categoría
        $movie = Movie::create([
            'title' => $request->title,
            'year' => $request->year,
            'studio' => $request->studio,
            'category_id' => $request->category_id, // Guardar category_id directamente
        ]);

        return redirect('/movies');
    }

    public function edit(Movie $movie)
    {
        $categories = Category::all();
        return view('movies.edit', [
            'movie' => $movie,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'year' => ['required', 'min:3'],
            'studio' => ['required', 'min:3', 'max:255'],
            'category_id' => 'required|exists:categories,id', // Cambiado a category_id
        ]);

        // Actualizar la película con los datos proporcionados
        $movie->update([
            'title' => $request->title,
            'year' => $request->year,
            'studio' => $request->studio,
            'category_id' => $request->category_id, // Actualizar category_id directamente
        ]);

        return redirect('/movies/' . $movie->id);
    }
}
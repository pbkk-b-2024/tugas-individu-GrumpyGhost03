<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;

class MovieController extends Controller
{
    /**
     * Display a listing of the movies.
     */
    public function index(): Response
    {
        $movies = Movie::all();
        return Inertia::render('Index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new movie.
     */
    public function create(): Response
    {
        return Inertia::render('Create');
    }

    /**
     * Store a newly created movie in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'director' => 'nullable|string|max:255',
            'release_date' => 'nullable|date',
            'genre' => 'nullable|string|max:255',
        ]);

        Movie::create($validatedData);

        return Redirect::route('movies.index')->with('success', 'Movie created successfully.');
    }

    /**
     * Display the specified movie.
     */
    public function show(Movie $movie): Response
    {
        return Inertia::render('Show', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified movie.
     */
    public function edit(Movie $movie): Response
    {
        return Inertia::render('Edit', ['movie' => $movie]);
    }

    /**
     * Update the specified movie in storage.
     */
    public function update(Request $request, Movie $movie): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'director' => 'nullable|string|max:255',
            'release_date' => 'nullable|date',
            'genre' => 'nullable|string|max:255',
        ]);

        $movie->update($validatedData);

        return Redirect::route('movies.index')->with('success', 'Movie updated successfully.');
    }

    /**
     * Remove the specified movie from storage.
     */
    public function destroy(Movie $movie): RedirectResponse
    {
        $movie->delete();

        return Redirect::route('movies.index')->with('success', 'Movie deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // retorna todas as noticias
        return News::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author' => 'required|string|max:255',
            'published_at' => 'nullable|date'
        ]);

        return News::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return News::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'title' => 'string|max:255',
            'content' => 'nullable',
            'author' => 'string|max:255',
            'published_at' => 'nullable|date'
        ]);

        $news = News::findOrFail($id);
        $news->update($validated);

        return $news;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $news = News::findOrFail($id);
        $news->delete();

        return response(null, 204);
    }
}
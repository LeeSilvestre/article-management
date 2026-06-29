<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $articles = Article::query()
            ->when($search, function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            })
            ->latest()
            ->get();

        return view('dashboard', compact('articles'));
    }

    public function store(Request $request)
    {
        // Add new validation rules for fields to ensure data integrity
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author' => 'nullable|string|max:255',
            'category' => 'required|in:tech,news,general',
            'status' => 'required|in:draft,published'
        ]);

        // Using the safe, validated data array
        Article::create($validated);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Article created successfully.');
    }

    public function update(Request $request, Article $article)
    {
        // Mirror the validation rules for the update array block
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author' => 'nullable|string|max:255',
            'category' => 'required|in:tech,news,general',
            'status' => 'required|in:draft,published'
        ]);

        $article->update($validated);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Article deleted successfully.');
    }
}
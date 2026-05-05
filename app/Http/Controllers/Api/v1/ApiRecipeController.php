<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ApiRecipeController extends Controller
{
    public function index()
    {
        return Recipe::orderBy('created_at', 'desc')->with('user')->get();
    }

    public function show(string $id)
    {
        return Recipe::with('user')->findOrFail($id);
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Recipe::class);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'ingredients' => 'required|string|max:5000',
            'prep_time'   => 'required|integer|min:1|max:1440',
            'difficulty'  => 'required|in:facile,moyen,difficile',
        ]);

        $recipe = new Recipe();
        $recipe->fill($validated);
        $recipe->user()->associate($request->user());
        $recipe->save();

        return $recipe;
    }

    public function destroy(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        Gate::authorize('delete', $recipe);
        $recipe->delete();
        return response()->noContent();
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::orderBy('created_at', 'desc')->with('user')->get();
        return view('recipes.index', ['recipes' => $recipes]);
    }

    public function create()
    {
        Gate::authorize('create', Recipe::class);
        return view('recipes.create');
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
        $recipe->title       = $validated['title'];
        $recipe->description = $validated['description'];
        $recipe->ingredients = $validated['ingredients'];
        $recipe->prep_time   = $validated['prep_time'];
        $recipe->difficulty  = $validated['difficulty'];
        $recipe->user()->associate($request->user());
        $recipe->save();

        return redirect("/recipes/{$recipe->id}");
    }

    public function show(string $id)
    {
        $recipe = Recipe::with('user')->findOrFail($id);
        return view('recipes.show', ['recipe' => $recipe]);
    }

    public function edit(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        Gate::authorize('update', $recipe);
        return view('recipes.edit', ['recipe' => $recipe]);
    }

    public function update(Request $request, string $id)
    {
        $recipe = Recipe::findOrFail($id);
        Gate::authorize('update', $recipe);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'ingredients' => 'required|string|max:5000',
            'prep_time'   => 'required|integer|min:1|max:1440',
            'difficulty'  => 'required|in:facile,moyen,difficile',
        ]);

        $recipe->title       = $validated['title'];
        $recipe->description = $validated['description'];
        $recipe->ingredients = $validated['ingredients'];
        $recipe->prep_time   = $validated['prep_time'];
        $recipe->difficulty  = $validated['difficulty'];
        $recipe->save();

        return redirect("/recipes/{$recipe->id}");
    }

    public function destroy(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        Gate::authorize('delete', $recipe);
        $recipe->delete();
        return redirect('/recipes');
    }
}
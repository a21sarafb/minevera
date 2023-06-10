<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryRecipe;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Auth;

class EditRecipesController extends Controller
{

    public function edit(Recipe $recipe)
    {
        $categories = Category::all();
        $user = Auth::user();
        $registrationType = ($user->external_auth) ? 'oauth' : 'traditional';
        $recipes = Recipe::where('user_id', $user->id)->get();
        return view('recipe.edit', compact('user', 'registrationType', 'recipes', 'recipe', 'categories'));
    }



    public function update(Request $request, Recipe $recipe)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'pax' => 'required',
            'photo' => 'required',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
            'ingredients' => 'required|array',
            'ingredients.*' => 'string',
            'amounts' => 'required|array',
            'amounts.*' => 'string',
        ]);

        // Procesar la imagen si se cargó una
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public');
            $validatedData['photo'] = basename($photoPath);
        }

        // Actualizar la receta existente
        $recipe->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'pax' => $validatedData['pax'],
            'photo' => $validatedData['photo'] ?? null,
        ]);

        // Actualizar los ingredientes y cantidades asociadas
        $recipe->ingredients()->detach();
        for ($i = 0; $i < count($validatedData['ingredients']); $i++) {
            $ingredient = Ingredient::firstOrCreate(['name' => $validatedData['ingredients'][$i]]);
            $recipe->ingredients()->attach($ingredient->id, ['amount' => $validatedData['amounts'][$i]]);
        }

        // Actualizar las categorías asociadas
        $recipe->categories()->sync($validatedData['categories']);

        return redirect()->route('home')->with('success', 'Receta actualizada exitosamente');
    }
}

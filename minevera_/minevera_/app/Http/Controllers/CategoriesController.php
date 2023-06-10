<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CategoriesController extends Controller
{
    public function show($category)
    {
        $recipes = $this->getRecipesByCategory($category);
        return view('categories', ['recipes' => $recipes, 'title' => $category]);
    }

    private function getRecipesByCategory($categoryName)
    {
        $category = Category::where('name', $categoryName)->firstOrFail();
        $recipes = $category->recipesCat()->with('ingredients')->get()->map(function ($recipe) {
            return [
                'id' => $recipe->id,
                'title' => $recipe->title,
                'description' => $recipe->description,
                'pax' => $recipe->pax,
                'img' => $recipe->photo,
                'ingredients' => $recipe->ingredients->map(function ($ingredient) {
                    return [
                        'name' => $ingredient->name,
                        'amount' => $ingredient->pivot->amount
                    ];
                })
            ];
        });

        // Obtener el usuario autenticado
        $user = auth()->user(); // Obtener el usuario autenticado

        //$user = Auth::user();

        if ($user) {
            // Obtener los IDs de las recetas favoritas del usuario
            $favoriteRecipeIds = $user->favorites()->pluck('recipe_id');

            // Marcar las recetas como favoritas si su ID está en el arreglo de favoritas del usuario
            $recipes = $recipes->map(function ($recipe) use ($favoriteRecipeIds) {
                $recipe['is_favorite'] = $favoriteRecipeIds->contains($recipe['id']);
                return $recipe;
            });
        }

        return $recipes;
    }
}

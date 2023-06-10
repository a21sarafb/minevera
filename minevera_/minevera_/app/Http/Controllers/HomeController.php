<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\IngredientRecipe;
use App\Models\Recipe;
use App\Models\Favorite;

class HomeController extends Controller
{
    public function index()
    {
        // Lógica para cargar la vista de inicio o realizar otras acciones necesarias
        return view('home');
    }


    public function buscarRecetas(Request $request)
    {
        // Validaciones
        $ingredientes = $request->input('ingredientes');
        if (!is_array($ingredientes)) {
            return view('home');
        } else {
            // Obtener ids de ingredientes a partir de sus nombres
            $ingredientIds = Ingredient::whereIn('name', $ingredientes)->pluck('id');

            // Obtener ids de recetas que contienen todos los ingredientes especificados
            $recipeIds = Recipe::whereHas('ingredients', function ($query) use ($ingredientIds) {
                $query->whereIn('ingredient_id', $ingredientIds);
            }, '=', count($ingredientIds))->pluck('id');

            // Obtener recetas con sus ingredientes que tienen todos los ingredientes especificados
            $recipes = Recipe::with(['ingredients' => function ($query) {
                $query->select('name', 'ingredients_recipes.amount', 'ingredients_recipes.recipe_id');
            }])->find($recipeIds)->map(function ($recipe) {
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
            return view('recetasBuscador', ['recipes' => $recipes]);
        }

        
    }
}

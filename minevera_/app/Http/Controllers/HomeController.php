<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\IngredientRecipe;
use App\Models\Recipe;

class HomeController extends Controller
{
    public function index()
    {
        // Lógica para cargar la vista de inicio o realizar otras acciones necesarias
        return view('home');
    }

    /**
     * @method POST
     */
    public function buscarRecetas(Request $request)
    {
        // Validaciones
        $ingredientes = $request->input('ingredientes');

        // Obtener ids de ingredientes a partir de sus nombres
        $ingredientIds = Ingredient::whereIn('name', $ingredientes)->pluck('id');

        // Obtener ids de recetas que contienen todos los ingredientes especificados
        $recipeIds = Recipe::whereHas('ingredients', function ($query) use ($ingredientIds) {
            $query->whereIn('ingredient_id', $ingredientIds);
        }, '=', count($ingredientIds))->pluck('id');

        // Obtener recetas con sus ingredientes que tienen todos los ingredientes especificados
        $recetas = Recipe::with(['ingredients' => function ($query) {
            $query->select('name', 'ingredients_recipes.amount', 'ingredients_recipes.recipe_id');
        }])->find($recipeIds)->map(function ($recipe) {
            return [
                'title' => $recipe->title,
                'description' => $recipe->description,
                'pax' => $recipe->pax,
                'ingredients' => $recipe->ingredients->map(function ($ingredient) {
                    return [
                        'name' => $ingredient->name,
                        'amount' => $ingredient->pivot->amount
                    ];
                })
            ];
        });

        return view('recetasBuscador', ['recipes' => $recetas]);
    }
}

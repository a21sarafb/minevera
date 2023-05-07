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
        //Validations

        $ingredientes = $request->input('ingredientes');
        
        $ingredientIds = Ingredient::whereIn('name', $ingredientes)->pluck('id');
    
        $ingredientRecipeIds = IngredientRecipe::whereIn('ingredient_id', $ingredientIds)->pluck('id');
    
        $recipeIds = IngredientRecipe::whereIn('id', $ingredientRecipeIds)->pluck('recipe_id');

        $recetas = Recipe::with(['ingredients' => function($query) {
            $query->select('name', 'ingredients_recipes.amount', 'ingredients_recipes.recipe_id');
        }])->find($recipeIds)->map(function ($recipe) {
            return [
                'title' => $recipe->title,
                'description' => $recipe->description,
                'ingredients' => $recipe->ingredients->map(function ($ingredient) {
                    return [
                        'name' => $ingredient->name,
                        'amount' => $ingredient->pivot->amount
                    ];
                })
            ];
        });
        //dd($recetas);
                
        return view('recetasBuscador', ['recetas' => $recetas]);
    }
}

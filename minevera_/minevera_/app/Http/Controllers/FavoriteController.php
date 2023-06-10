<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Recipe;


class FavoriteController extends Controller
{

    public function showFavorites()
    {
        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            $favorites = $this->getRecipesByUserFavorites(Auth::user());
            return view('favorites', ['favorites' => $favorites, 'title' => 'Recetas Favoritas']);
        }
        

        return redirect()->route('login');
    }

    private function getRecipesByUserFavorites($user)
    {
        $favorites = $user->favorites()
            ->join('recipes as r', 'favorites.recipe_id', '=', 'r.id')
            ->where('favorites.user_id', $user->id)
            ->get(['favorites.*', 'favorites.user_id as pivot_user_id', 'favorites.recipe_id as pivot_recipe_id']);

        return $favorites->map(function ($favorite) {
            $recipe = $favorite->recipe;
            return [
                'id' => $recipe->id,
                'title' => $recipe->title,
                'description' => $recipe->description,
                'pax' => $recipe->pax,
                'img' => $recipe->photo,
                'ingredients' => $recipe->ingredients->map(function ($ingredient) use ($favorite) {
                    return [
                        'name' => $ingredient->name,
                        'amount' => $ingredient->pivot->amount
                    ];
                })
            ];
        });
    }

    public function addFavorite(Request $request)
    {
        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            // Obtener el ID de la receta desde el formulario
            $recipeId = $request->input('recipe_id');

            // Verificar si la receta ya está en favoritos del usuario
            $existingFavorite = Favorite::where('user_id', Auth::user()->id)
                ->where('recipe_id', $recipeId)
                ->first();

            if ($existingFavorite) {
                return redirect()->back()->with('error', 'La receta ya está en favoritos.');
            }

            // Crear una nueva entrada en la tabla "favorites"
            Favorite::create([
                'user_id' => Auth::user()->id,
                'recipe_id' => $recipeId
            ]);

            return redirect()->back()->with('success', 'Receta agregada a favoritos.');
        }

        return redirect()->back()->with('error', 'Debes iniciar sesión para agregar recetas a favoritos.');
    }

    public function removeFavorite(Request $request)
    {
        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            // Obtener el ID de la receta desde el formulario
            $recipeId = $request->input('recipe_id');

            // Buscar y eliminar la entrada en la tabla "favorites"
            $favorite = Favorite::where('user_id', Auth::id())
                ->where('recipe_id', $recipeId)
                ->first();

            if ($favorite) {
                $favorite->delete();
                return redirect()->back()->with('success', 'Receta eliminada de favoritos.');
            }
        }

        return redirect()->back()->with('error', 'No se pudo eliminar la receta de favoritos.');
    }
}

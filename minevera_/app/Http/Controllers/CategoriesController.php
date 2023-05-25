<?php

namespace App\Http\Controllers;

use App\Models\Category;

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
        return $recipes;
    }
}

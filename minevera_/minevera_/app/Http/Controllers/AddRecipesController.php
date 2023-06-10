<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryRecipe;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Auth;

class AddRecipesController extends Controller
{

    public function create()
    {
        $categories = Category::all();
        return view('recipes', compact('categories'));
    }

    public function store(Request $request)
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

        // Procesamiento y guardado de la imagen
        $photoFile = $request->file('photo'); // Obtiene el objeto UploadedFile
        $photoPath = $photoFile->store('/img', 'public'); // Guarda la imagen en la carpeta public/img
        $photoName = basename($photoPath);
        
        // Crear la receta
        $recipe = Recipe::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'user_id' => Auth::id(),
            'pax' => $validatedData['pax'],
            'photo' => $validatedData['photo'] ?? null,
        ]);

        // Asociar ingredientes con cantidades
        for ($i = 0; $i < count($validatedData['ingredients']); $i++) {
            $ingredient = Ingredient::firstOrCreate(['name' => $validatedData['ingredients'][$i]]);
            $recipe->ingredients()->attach($ingredient->id, ['amount' => $validatedData['amounts'][$i]]);
        }

        // Asociar categorías
        foreach ($validatedData['categories'] as $categoryId) {
            $category = Category::find($categoryId);
            if ($category) {
                CategoryRecipe::create([
                    'recipe_id' => $recipe->id,
                    'category_id' => $categoryId,
                ]);
            }
        }

        return redirect()->route('home')->with('success', 'Receta creada exitosamente');
    }
}

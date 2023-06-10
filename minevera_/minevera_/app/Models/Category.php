<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function recipesCat()
    {
        return $this->belongsToMany(Recipe::class, 'categories_recipes', 'category_id', 'recipe_id');
    }
}

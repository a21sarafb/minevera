<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Ingredient;
use App\Models\Favorite;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'user_id', 'pax', 'photo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredients_recipes')->withPivot('amount');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_recipes', 'recipe_id', 'category_id');
    }
}

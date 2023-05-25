<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'user_id', 'pax'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredients_recipes')->withPivot('amount');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_recipes');
    }
}

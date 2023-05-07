<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vip extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'date_ini', 'date_fin'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

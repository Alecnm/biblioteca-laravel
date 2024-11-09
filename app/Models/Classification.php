<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // Relación: Una clasificación puede tener muchos libros
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}

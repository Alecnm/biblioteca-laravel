<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'published_year', 'classification_id', 'isbn', 'copies', 'available_copies'];

    // Relación: Un libro pertenece a una clasificación
    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    // Relación: Un libro puede tener muchos préstamos
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    // Método para verificar si hay copias disponibles para préstamo
    public function hasAvailableCopies()
    {
        return $this->available_copies > 0;
    }
}

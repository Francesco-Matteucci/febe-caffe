<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    /**
     * I campi che possono essere popolati tramite mass assignment.
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'is_available',
        'image',
    ];

    /**
     * Impostazioni di default per alcuni campi.
     */
    protected $attributes = [
        'is_available' => true,
    ];
}

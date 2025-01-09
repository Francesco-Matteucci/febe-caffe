<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * I campi che possono essere popolati tramite mass assignment.
     */
    protected $fillable = [
        'name',
        'role',
        'email',
        'phone',
    ];
}
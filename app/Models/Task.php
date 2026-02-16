<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $casts = [
        'due_date' => 'date',
        'is_completed' => 'boolean',
    ];


    protected $fillable = ['title', 'description', 'due_date', 'is_completed'];
}

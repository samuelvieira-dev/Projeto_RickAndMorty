<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    // Defina as colunas que você quer que sejam preenchíveis
    protected $fillable = ['name', 'species', 'image', 'url'];
}

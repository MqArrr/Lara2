<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reader extends Model
{
    use HasFactory;


    protected $table = 'readers';

    protected $fillable = ['name', 'birth_date'];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}


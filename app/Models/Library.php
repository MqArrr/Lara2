<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Library extends Model
{
use HasFactory;


    protected $table = 'libraries';

    protected $fillable = ['name', 'address'];

    public function books(): HasMany
    {
    return $this->hasMany(Book::class);
    }

    public function readers(): HasMany
    {
        return $this->hasMany(Reader::class);
    }
}

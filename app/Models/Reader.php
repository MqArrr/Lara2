<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;


    protected $table = 'readers';

    protected $fillable = ['name', 'birth_date'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}


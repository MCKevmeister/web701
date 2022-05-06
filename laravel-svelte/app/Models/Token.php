<?php

namespace App\Models;

use Database\Factories\TokenFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $guarded = [];

    protected static function newFactory()
    {
        return TokenFactory::new();
    }
}

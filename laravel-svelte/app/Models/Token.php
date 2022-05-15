<?php

namespace App\Models;

use Database\Factories\TokenFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Token extends Model
{
    use HasFactory;

    protected $table = 'tokens';

    protected $guarded = [];

    private string $value;

    private int $user_id;

    protected static function newFactory()
    {
        return TokenFactory::new();
    }
}

<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Money\Money;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = [];

    private string $imageSource;

    private string $name;

    private string $description;

    private Money $price;

    protected static function newFactory()
    {
        return ProductFactory::new();
    }
}

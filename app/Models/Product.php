<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}

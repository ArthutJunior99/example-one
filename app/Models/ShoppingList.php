<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
    public function items()
    {
        return $this->hasMany(Items::class);
    }

}

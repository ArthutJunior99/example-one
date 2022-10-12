<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    public $timestamps = false;
    use HasFactory;


    public function items()
    {
        return $this->hasMany(Items::class);
    }
    public function users()
    {
        return $this->belongsTo(Users::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

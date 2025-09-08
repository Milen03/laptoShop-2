<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Laptop extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'processor',
        'ram',
        'storage',
        'price',
        'image',
        'description',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

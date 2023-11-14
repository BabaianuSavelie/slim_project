<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'produse';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image'];
}
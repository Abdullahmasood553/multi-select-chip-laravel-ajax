<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['title', 'category', 'description', 'image', 'quantity', 'price', 'rate', 'count'];

    use HasFactory;
}

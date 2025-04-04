<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'address',
        'country',
        'city',
        'postal_code',
        'products',
        'total_amount',
    ];
}

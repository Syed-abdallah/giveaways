<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unhappy extends Model
{
    use HasFactory;
    protected $fillable = [
        'amazon_id',
        'option',
        'email',
        'name',
        'shipping_address',
        'reason',
    ];
}

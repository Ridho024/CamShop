<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyCamera extends Model
{
    use HasFactory;

    protected $table = 'buy_product';
    protected $primaryKey = 'no';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'camera_id',
        'user_id',
        'camera_name',
        'quantity',
        'total_price',
        'address',
        'status',
    ];
}

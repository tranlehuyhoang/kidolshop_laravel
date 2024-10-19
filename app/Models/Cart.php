<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $timestamp = false;
    protected $fillable = ['idCustomer','idProduct','AttributeProduct','PriceNew','QuantityBuy','idProAttr','Total'];
    protected $primaryKey = 'idCart';
    protected $table = 'cart';
}

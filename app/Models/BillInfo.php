<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillInfo extends Model
{
    public $timestamp = false;
    protected $fillable = ['idBill','idProduct','AttributeProduct','Price','QuantityBuy','idProAttr'];
    protected $table = 'billinfo';
    public $incrementing = false;
}

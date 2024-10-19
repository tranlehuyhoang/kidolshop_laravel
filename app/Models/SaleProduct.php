<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    public $timestamp = false;
    protected $fillable = ['idProduct','SaleName','SaleStart','SaleEnd','Percent'];
    protected $primaryKey = 'idSale';
    protected $table = 'saleproduct';
}

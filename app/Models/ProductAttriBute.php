<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttriBute extends Model
{
    public $timestamp = false;
    public $incrementing = false;
    protected $fillable = ['idProduct','idAttrValue','Quantity'];
    protected $primaryKey = ['idProAttr'];
    protected $table = 'product_attribute';
}

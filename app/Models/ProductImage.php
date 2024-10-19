<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public $timestamp = false;
    protected $fillable = ['idProduct','ImageName'];
    protected $primaryKey = 'idImage';
    protected $table = 'productimage';

    // public function product(){
    //     return $this->belongsTo('App\Models\Product','idProduct');
    // }
}

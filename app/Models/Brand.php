<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamp = false;
    protected $fillable = ['BrandName','BrandSlug'];
    protected $primaryKey = 'idBrand';
    protected $table = 'brand';

    // public function product(){
    //     return $this->hasMany('App\Models\Product');
    // }
}

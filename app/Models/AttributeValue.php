<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    public $timestamp = false;
    protected $fillable = ['idAttribute','AttrValName'];
    protected $primaryKey = 'idAttrValue';
    protected $table = 'attribute_value';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $timestamp = false;
    protected $fillable = ['AttributeName'];
    protected $primaryKey = 'idAttribute';
    protected $table = 'attribute';
}

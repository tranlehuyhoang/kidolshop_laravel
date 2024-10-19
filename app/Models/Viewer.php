<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{
    public $timestamp = false;
    protected $fillable = ['idCustomer','idProduct','created_at','updated_at'];
    protected $primaryKey = 'idView';
    protected $table = 'viewer';
}

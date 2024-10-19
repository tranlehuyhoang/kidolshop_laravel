<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $timestamp = false;
    protected $fillable = ['AdminName','AdminUser','AdminPass','Position','Address','NumberPhone','Email','Avatar'];
    protected $primaryKey = 'idAdmin';
    protected $table = 'admin';
}

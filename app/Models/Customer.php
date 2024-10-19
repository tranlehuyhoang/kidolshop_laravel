<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamp = false;
    protected $fillable = ['username','password','PhoneNumber','CustomerName','Avatar'];
    protected $primaryKey = 'idCustomer';
    protected $table = 'customer';
}

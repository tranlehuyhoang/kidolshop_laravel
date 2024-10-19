<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressCustomer extends Model
{
    public $timestamp = false;
    protected $fillable = ['idCustomer','Address','PhoneNumber','CustomerName'];
    protected $primaryKey = 'idAddress';
    protected $table = 'addresscustomer';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public $timestamp = false;
    protected $fillable = ['idCustomer','Address','Payment','Voucher','PhoneNumber','CustomerName','ReceiveDate','created_at','Status','TotalBill'];
    protected $primaryKey = 'idBill';
    protected $table = 'bill';
}

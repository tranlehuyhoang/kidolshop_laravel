<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillHistory extends Model
{
    public $timestamp = false;
    protected $fillable = ['idBill','AdminName','Status','created_at'];
    protected $primaryKey = ['idBill'];
    protected $table = 'billhistory';
    public $incrementing = false;
}

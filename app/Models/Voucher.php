<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    public $timestamp = false;
    protected $fillable = ['VoucherName','VoucherQuantity','VoucherCondition','VoucherNumber','VoucherCode','VoucherStart','VoucherEnd'];
    protected $primaryKey = 'idVoucher';
    protected $table = 'voucher';
}

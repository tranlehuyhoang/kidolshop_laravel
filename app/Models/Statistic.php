<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    public $timestamp = false;
    protected $fillable = ['Date','Sale','Quantity','QtyBill'];
    protected $primaryKey = 'idStatistic';
    protected $table = 'statistic';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $timestamp = false;
    protected $fillable = ['BlogContent','Status','BlogDesc','BlogTitle','BlogSlug','BlogImage','created_at','updated_at'];
    protected $primaryKey = 'idBlog';
    protected $table = 'blog';
}

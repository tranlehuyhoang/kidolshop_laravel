<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamp = false;
    protected $fillable = ['idCategory','idBrand','QuantityTotal','ProductName','ProductSlug','DesProduct','ShortDes','Price','Sold','StatusPro','created_at'];
    protected $primaryKey = 'idProduct';
    protected $table = 'product';

    protected static function fullTextWildcards($term)
   {
       // removing symbols used by MySQL
       $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
       $term = str_replace($reservedSymbols, '', $term);

       $words = explode(' ', $term);

       foreach ($words as $key => $word) {
           /*
            * applying + operator (required word) only big words
            * because smaller ones are not indexed by mysql
            */
           if (strlen($word) >= 1) {
               $words[$key] = $word .',';
           }
       }
       
       $searchTerm = implode(' ', $words);

       return $searchTerm;
   }

   public function scopeFullTextSearch($query, $columns, $term)
   {
       $query->whereRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)", $this->fullTextWildcards($term));

       return $query;
   }
}

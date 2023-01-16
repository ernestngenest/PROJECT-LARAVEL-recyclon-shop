<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name','category','description','image','price','id'];
    use HasFactory;
    public function carts(){
        return $this->belongsTo(Cart::class);
    }
    public function scopeFilter($query, array $fillters){
       if($fillters['search']??false){
           $query->where('name', 'like', '%'. $fillters['search']. '%');
       }
    }
}

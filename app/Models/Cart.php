<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['quantity','item_id','user_id','total_price'];
    use HasFactory;
    public function items(){
        return $this->belongsTo(Item::class,'item_id','id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}

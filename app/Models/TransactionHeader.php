<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;
    protected $fillable = ['grand_total','user_id'];

    public function TransactionDetails(){
        return $this->hasMany(TransactionDetail::class,'transaction_header_id','id');
    }
}

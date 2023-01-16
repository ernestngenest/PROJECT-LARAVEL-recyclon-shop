<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    public function Item(){
        return $this->belongsTo(Item::class,'item_id','id');
    }
    public function TransactionHeader(){
        return $this->belongsTo(TransactionHeader::class,'transaction_header_id','id');
    }
}

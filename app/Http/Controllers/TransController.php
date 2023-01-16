<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class TransController extends Controller
{
    public function index()
    {
        $transHeader = TransactionHeader::all();
        $transDetail = TransactionDetail::all();
        return view('items.history',['transHeader' => $transHeader, 'transDetail' => $transDetail]);
    }
}

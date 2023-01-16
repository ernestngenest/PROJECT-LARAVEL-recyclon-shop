<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $totals = DB::table('carts')->pluck('total_price');
        $grand_total = $totals->sum();
        $ctr = 1;
        $carts=Cart::all();
        return view('items.cartList',['carts' => $carts ,'grand_total' => $grand_total, 'ctr'=> $ctr]);
    }
    public function Checkout($grand_total)
    {

        $carts = Cart::all();
        $HeaderTransaction =  TransactionHeader::create([
            'grand_total' => $grand_total,
            'user_id' => auth()->user()->id,
        ]);
        // dd($HeaderTransaction);
        foreach($carts as $cart){
            $DetailTransaction = new TransactionDetail();
            $DetailTransaction->transaction_header_id = $HeaderTransaction->id;
            $DetailTransaction->quantity = $cart->quantity;
            $DetailTransaction->total_price = $cart->total_price;
            $DetailTransaction->item_id = $cart->items->id;
            $DetailTransaction->save();
            // dd($DetailTransaction);
        }
        Cart::truncate();
        return redirect('/index');
    }

    public function viewUpdate(Cart $cart)
    {
        $cart_update = DB::table('carts')->find($cart->id);
        return view('items.cart-update', ['cart' => $cart_update]);
    }
    public function update(Request $request,Cart $cart)
    {
    //    dd($cart->items->price);
          $cart->quantity = $request->quantity;
          $cart->total_price = $request->quantity * $cart->items->price;
          $cart->save();
          return redirect('/cartList');
    }
    public function delete(Cart $cart)
    {
        $cart->delete();
        return redirect('/cartList');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_cart(Request $request,Item $item)
    {
        $formfields = $request->validate([
            'quantity' => 'min:1',
        ]);
        Cart::create([
            'item_id' => $item->id,
            'user_id' => auth()->user()->id,
            'quantity' => $formfields['quantity'],
            'total_price' => $formfields['quantity'] * $item->price
        ]);
        return back()->with('message', 'product berasil di tambahkan ke cart');
    }   
    
    public function index()
    {
        return view ('items.index',[
            'items' => Item::inRandomOrder()->filter(request(['search']))->paginate(3)
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $get_item = DB::table('items')->find($item->id);
        return view('items.show',[
            'item' => $get_item
        ]);
    }
}

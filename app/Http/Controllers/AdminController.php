<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Item;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function viewitem()
    {
        $items = Item::all();
        return view('admin.viewitem', ['items' => $items]);
    }
    public function index()
    {
        $td = TransactionDetail::all();
        $th = TransactionHeader::all();
        return view('admin.index',['TransactionDs' => $td, 'TransactionHs' => $th]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function viewStore()
    {
        return view('admin.add');
    }
    
    public function store(Request $request)
    {
        // dd($request);
        $formfields = $request->validate([
            'id' =>['required' , Rule::unique('items','id')],
            'name' => ['required','max:20',Rule::unique('items','name')],
            'price' => ['required','numeric','min:1000'],
            'description' => ['required','max:200'],
            'category' => ['required','in:Recycle,Second'],
            'image' => ['required']
        ]);
        if($request->hasFile('image')){
            $formfields['image'] = $request->file('image')->store('images','public');
        }
        // dd($formfields);
        Item::create($formfields);
        return redirect('/admin/viewitem')->with('message','berhasil menambahkan item');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin, Item $item )
    {
        $data = DB::table('items')->find($item->id);
        return view('admin.show',['item' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function updateItem(Request $request, Item $item)
    {
        $item = Item::find($item->id);
        return view('admin.update',['item' => $item]);
    }
    public function update(Request $request, Item $item)
    {
        $formfields = $request->validate([
            'id' => ['required',Rule::unique('items','id')],
            'name' => ['required',Rule::unique('items','name'),'max:20'],
            'price' => ['required' , 'numeric' , 'min:1000'],
            'description' => ['required','max:200'],
            'category' => ['required','in:Recycle,Second'],
        ]);
        // dd($formfields);
        $item->update($formfields);
        return redirect('/admin/viewitem')->with('message','berhasil update item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return back();
    }
}

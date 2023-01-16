@extends('layout')

@section('content')
<h1>Manage Item</h1>
<table class="table">
    {{-- {{ dd($items->all()) }} --}}
    @if(!$carts->count())
    <div>
        <p>cart is empty! Let’s go shopping :)</p>
    </div>
    @else
    <thead>
      <tr style="background-color:yellow">
        <th scope="col">NO</th>
        <th scope="col">item image</th>
        <th scope="col">item name </th>
        <th scope="col">item price</th>
        <th scope="col">quantity</th>
        <th scope="col">total price</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <div>
        @foreach($carts as $cart)
            <x-cart :cart="$cart" :ctr="$ctr"/>   
            @php
                $ctr++;
            @endphp
        @endforeach
      </div>
    </tbody>
</table>
<div class="m-3 fs-3">
    grand total = {{ $grand_total }};
</div>
<div class="m-3">
    <form action="/checkout/{{ $grand_total }}" method="post">
        @csrf
        <div class="form-floating mb-3">
            <input name="receiver_name" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">receiver name</label>
        </div>
        <div class="form-floating mb-3">
            <input name="receiver_address" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">receiver address</label>
        </div>
        
        <button type="submit" class="btn btn-warning">Checkout ({{ $ctr-1 }})</button>
    </form>
</div>
@endif
@endsection
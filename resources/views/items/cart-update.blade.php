@extends('layout')

@section('content')
<form action="/cart/update_cart/{{ $cart->id }}" method="post" class="m-3">
    @csrf
    insert new quantity: 
    <input type="number" value="1" min="1" class='form-control' style="width: 100px" name="quantity">
    <br>
    <button type="submit" class="btn btn-danger">add to cart</button>
  </form>
@endsection
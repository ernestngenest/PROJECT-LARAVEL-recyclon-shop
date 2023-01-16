@extends('layout')

@section('content')
<div>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ $item->image ? asset('storage/'. $item->image) : asset('images/no-image.png' )}}" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <p class="card-text">{{ $item->name}}</p>
              <p class="card-text">{{ $item->category }}</p>
              <p class="card-text">{{ $item->description }}</p>
              <p class="card-text"><small class="text-muted">Price: IDR {{ $item->price }},00</small></p>
              @auth
              <form action="{{ route('cart' , $item->id) }}" method="post">
                @csrf
                <input type="number" value="1" min="1" class='form-control' style="width: 100px" name="quantity">
                <br>
                <button type="submit" class="btn btn-danger">add to cart</button>
              </form>
              @else
              <a href="/get_login" class="btn btn-danger">Login to buy</a>
              @endauth
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
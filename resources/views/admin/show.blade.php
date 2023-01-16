@extends('layout')

@section('content')
<div>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ $item->image ? asset('storage/'. $item->image) : asset('images/no-image.png' )}}" 
            class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <p class="card-text">{{ $item->name}}</p>
              <p class="card-text">{{ $item->category }}</p>
              <p class="card-text">{{ $item->description }}</p>
              <p class="card-text"><small class="text-muted">Price: IDR {{ $item->price }},00</small></p>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
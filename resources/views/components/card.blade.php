@props(['item'])
<div class="card" style="width: 18rem;">
    <img src="{{ $item->image ? asset('storage/'. $item->image) : asset('images/no-image.png' )}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ $item->name }}</h5>
      <p class="card-text">{{ $item->description }}</p>
      @if(auth()->check() && auth()->user()->role == '1')
        <a href="admin/item/detail/{{ $item->id }}" class="btn btn-primary">see detail</a>
      @else
      <a href="/item/detail/{{ $item->id }}" class="btn btn-primary">see detail</a>
      @endif
    </div>
  </div>
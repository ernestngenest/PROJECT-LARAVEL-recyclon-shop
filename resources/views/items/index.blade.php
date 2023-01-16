@extends('layout')

@section('content')
    <h1 class="text-center">Our Products</h1>
    <div class="d-flex justify-content-center">
    @foreach ($items as $item)
        <div class="m-2">
            <x-card :item="$item"/>
        </div>
    @endforeach
    </div>
    <div class="mt-5 p-4">
        {{ $items->links() }}
    </div>
@endsection

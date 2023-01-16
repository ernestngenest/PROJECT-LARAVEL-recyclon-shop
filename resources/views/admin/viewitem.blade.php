@extends('layout')

@section('content')
<h1>Manage Item</h1>
<table class="table">
    <thead>
      <tr style="background-color:yellow">
        <th scope="col">NO</th>
        <th scope="col">itemID</th>
        <th scope="col">itemImage</th>
        <th scope="col">itemName</th>
        <th scope="col">itemDescription</th>
        <th scope="col">itemPrice</th>
        <th scope="col">itemCategory</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      {{-- {{ dd($items->all()) }} --}}
      <div>
        @foreach($items as $item)
          <tr style="background-color:yellow; border-color:black;">
            <th scope="row" ></th>
            <td>{{ $item->id }}</td>
            <td><img class="m-3" src="{{ $item->image ? asset('storage/'. $item->image) : asset('images/no-image.jpeg') }}"
               alt="" style="width:8em;height:8em;"></td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->category }}</td>
            <td>
              <a href="update/{{ $item->id }}" type="submit" class="btn btn-warning">Update</a>
              <form action="{{ route('destroy',[$item->id]) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger">
                  delete
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </div>
     
    </tbody>
  </table>
@endsection
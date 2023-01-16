@props(['cart','ctr'])

<tr style="background-color:yellow; border-color:black;">
    <td>{{ $ctr }}</td>
    <td><img class="m-3" src="{{ $cart->items->image ? asset('storage/'. $cart->items->image) : asset('images/no-image.jpeg') }}" alt="" style="width:8em;height:8em;"></td>
    <td>{{ $cart->items->name }}</td>
    <td>IDR, {{ $cart->items->price }}</td>
    <td>{{ $cart->quantity }}</td>
    <td>IDR, {{ $cart->total_price }}</td>
    <td>
        <div class="d-flex">
            <a href="/cart/update/{{ $cart->id }}" class="btn btn-warning">Update</a>
            <form action="/cart/delete/{{ $cart->id }}" method="post" >
                @csrf
                @method('DELETE');
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
        </div>
    </td>
</tr>
@props(['detail','header'])


    <tr style="background-color:yellow; border-color:black;">
        <td></td>
        <td><img class="m-3" src="{{ $item->image ? asset('storage/'. $item->image) : asset('images/no-image.jpeg') }}" alt="" style="width:8em;height:8em;"></td>
        <td>{{ $detail->name }}</td>
        <td>IDR, {{ $detail->price }}</td>
        <td>{{ $detail->quantity }}</td>
        <td>IDR, {{ $detail->total_price }}</td>
    </tr>
  

@extends('layout')

@section('content')
{{-- {{ dd($transDetail) }} --}}
<div class="accordion" id="accordionExample">
    @foreach ($transHeader as $header)
    <div class="accordion-item m-3">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            {{ $header->created_at }}
            {{-- {{ dd($header) }} --}}
          </button>
        </h2>
        <div id="collapse{{ $header->id }}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <table class="table table-sm table-borderless p-0 m-0">
          <thead>
            <tr style="background-color:yellow">
              <th scope="col">NO</th>
              <th scope="col">item image</th>
              <th scope="col">item name </th>
              <th scope="col">item price</th>
              <th scope="col">quantity</th>
              <th scope="col">total price</th>
            </tr>
          </thead>
          <div class="accordion-body">
            <tbody>
              {{-- {{ dd($transDetail->all()) }} --}}
              {{-- {{ dd($header->transDetail) }}  --}}
              @php
                $ctr =1;
              @endphp
              @foreach ($header->transactionDetails as $detail )
                  {{-- <x-history-detail :detail="$detail" :header="$header" /> --}}
                  <tr style="background-color:yellow; border-color:black;">
                    <td>{{ $ctr }}</td>
                    <td><img class="m-3" src="{{ $detail->item->image ? asset('storage/'. $detail->item->image) : asset('images/no-image.jpeg') }}" 
                      alt="" style="width:8em;height:8em;"></td>
                    <td>{{ $detail->Item->name }}</td>
                    <td>IDR, {{ $detail->item->price }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>IDR, {{ $detail->total_price }}</td>
                </tr>
                @php
                    $ctr++;
                @endphp
              @endforeach
            </tbody>
          </div>
        </table> 
        Grand total:{{ $header->grand_total }} 
        </div>
      </div>
    @endforeach
  </div>
@endsection
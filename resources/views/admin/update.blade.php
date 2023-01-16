@extends('layout')

@section('content')
<h1>Update Item</h1>

<div>
    <form action={{ route('update',[$item->id]) }} method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="d-flex">
            <div class="m-3">
                <label for="exampleFormControlInput1" class="form-label">itemID</label>
                <input name="id" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $item->id }}">
            </div>
            <div class="m-3">
                <label for="exampleFormControlInput1" class="form-label">ItemPrice</label>
                <input name="price" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $item->price }}">
            </div>
            <div class="m-3">
                <label for="exampleFormControlInput1" class="form-label">ItemCategory</label>
                <select class="form-select" aria-label="Default select example" name="category">
                    <option selected>{{ $item->category }}</option>
                    <option name="category" value="Recycle">Recycle</option>
                    <option name="category" value="Second">Second</option>
                </select>
            </div>
        </div>
        <div class="m-3">
            <label for="exampleFormControlInput1" class="form-label">Item Name</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1" style="width: 60em" value="{{ $item->name }}">
        </div>
        <div class="m-3">
            <label for="exampleFormControlTextarea1" class="form-label">Item Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" style="width: 60em" value="{{ $item->description }}"></textarea>
        </div>
        <div class="d-flex m-3">
            Item Image
            <img class="m-3" src="{{ $item->image ? asset('storage/'. $item->image) : asset('images/no-image.jpeg') }}" alt="" style="width:8em;height:8em;">
            <div class="mb-3">
                <label for="formFileSm" class="form-label">Item Image_file</label>
                <input class="form-control" type="text" value="{{ $item->image }}" aria-label="Disabled input example" disabled readonly>
            </div>
        </div>
        <div class="m-3">
            <label for="formFileSm" class="form-label">New Image</label>
            <input name="image" class="form-control form-control-sm" id="formFileSm" type="file" style="width: 50em">
        </div>
        <div class="m-3">
            <button
                class="btn btn-warning" type="submit">
                Update
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>
</div>

@endsection
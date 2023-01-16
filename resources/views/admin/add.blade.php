@extends('layout')
@section('content')
<h1>Create Item</h1>
<div>
    <form action="/admin/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="d-flex">
            <div class="m-3">
                <label for="exampleFormControlInput1" class="form-label">itemID</label>
                <input name="id" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Item ID">
            </div>
            <div class="m-3">
                <label for="exampleFormControlInput1" class="form-label">ItemPrice</label>
                <input name="price" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter item Price">
            </div>
            <div class="m-3">
                <label for="exampleFormControlInput1" class="form-label">ItemCategory</label>
                <select class="form-select" aria-label="Default select example" name="category">
                    <option selected disabled>choose one</option>
                    <option name="category" value="Recycle">Recycle</option>
                    <option name="category" value="Second">Second</option>
                </select>
            </div>
        </div>
        <div class="m-3">
            <label for="exampleFormControlInput1" class="form-label">Item Name</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1" style="width: 60em" placeholder="enter item name">
        </div>
        <div class="m-3">
            <label for="exampleFormControlTextarea1" class="form-label">Item Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" style="width: 60em" placeholder="enter item description"></textarea>
        </div>
        <div class="m-3">
            <label for="formFileSm" class="form-label">New Image</label>
            <input name="image" class="form-control form-control-sm" id="formFileSm" type="file" style="width: 50em">
        </div>
        <div class="m-3">
            <button
                class="btn btn-warning" type="submit">
               Add Item
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>
</div>
@endsection
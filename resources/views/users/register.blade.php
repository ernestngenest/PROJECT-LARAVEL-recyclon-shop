@extends('layout')

@section('content')
<div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-header p-5 pb-4 border-bottom-0">
          <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
          <h1 class="fw-bold mb-0 fs-2">Sign up Now</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-5 pt-0">
          <form  method="POST" action="/register" >
            @csrf
            <div class="form-floating mb-3">
              <input type="text" name="name" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">username</label>
              @error('name')
                <p class="text-danger mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="email" name="email" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
              @error('email')
                <p class="text-danger mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
              @error('password')
                <p class="text-danger mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="password_confirmation" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">confim password</label>
              @error('password_confirmation')
                <p class="text-danger mt-1">{{ $message }}</p>
              @enderror
            </div>
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Sign up</button>
            <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
            <hr class="my-4">
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
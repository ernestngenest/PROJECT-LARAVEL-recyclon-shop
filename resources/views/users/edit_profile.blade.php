@extends('layout')

@section('content')
<div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-header p-5 pb-4 border-bottom-0">
          <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
          <h1 class="fw-bold mb-0 fs-2">Edit Profile</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-5 pt-0">
            {{-- {{ dd($user) }} --}}
          <form class="" method="POST" action="/update_profile/{{ $user->id }}">
            @csrf
            <div class="form-floating mb-3">
                <input name="name" type="text" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">username</label>
              </div>
            <div class="form-floating mb-3">
              <input name="email" type="email" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
            </div>
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Edit</button>
            <hr class="my-4">
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
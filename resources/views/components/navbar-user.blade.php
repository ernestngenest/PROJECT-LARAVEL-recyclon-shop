<nav class="navbar navbar-expand-lg bg-primary ">
  <div class="container-fluid text-light">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse p-2" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-light" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/index">Show Product </a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link text-light" href="/cartList">My Cart </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/history">Transaction History </a>
        </li>
      <form action="" class="d-flex" role="search">
        <input class="form-control me-2" style="width: 70em;" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          profile
        </a>
        <ul class="dropdown-menu">
          <span class="fw-bold"> welcome {{ auth()->user()->name }}</span>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item"r hef="/edit_profile/{{ auth()->user()->id }}">Edit Profile</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="/edit_password/{{ auth()->user()->id }}">Change Password</a></li>
        </ul>
      </li>
    </ul>
      <form action="/logout" method="POST">
        @csrf
        <button class="btn btn-outline-light" type="submit">Logout</button>
      </form>
      @else
      <div class="d-flex justify-content-end">
        <a href="/get_login" class="btn btn-outline-light mx-2 ">Login</a>
        <a href="/get_register"  class="btn btn-outline-light mx-2">Register</a>
      </div>
      @endauth
    </div>
  </div>
</nav>
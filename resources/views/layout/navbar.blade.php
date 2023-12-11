<nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">

        <a class="navbar-brand me-auto" href="{{ route('home') }}"><img src="{{ asset('img/Cimollicon.png') }}" alt="icon" width="27" class="ml-2">Dry Cimoll</a>
        <ul class="navbar-nav">
          <li class="nav-item me-3">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" href="{{ route('produk') }}">Menu</a>
          </li>
          @auth
          <li class="nav-item me-3">
              <a class="nav-link" href="{{ route('cart') }}"><i class="bi bi-cart"></i> Cart
              @php
                $cartCount = session()->get('cartCount', 0);
              @endphp
            @if($cartCount > 0)
                <span class="badge bg-info position-absolute top-1 start-100 translate-middle p-1">{{ $cartCount }}</span>
            @endif</a>
          </li>
          <li class="nav-item me-3">
              <a class="nav-link" href="{{ route('logout') }}">Logout</a>
          </li>
      @else
          <li class="nav-item me-3">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
      @endauth

          {{-- <li class="nav-item me-3">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" href="{{ route('cart') }}" style="position: relative;">
              <i class="bi bi-cart"></i> Cart
              @php
              $cartCount = session()->get('cartCount', 0);
          @endphp
          @if($cartCount > 0)
              <span class="badge bg-info position-absolute top-1 start-100 translate-middle p-1">{{ $cartCount }}</span>
          @endif
        </a>
          </li> --}}
        </ul>
      </div>
    </div>
  </nav>

  Cannot use empty array elements in arrays
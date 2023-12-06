<nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <a class="navbar-brand me-auto" href="{{ route('home') }}">Ecommerce</a>
        <ul class="navbar-nav">
          <li class="nav-item me-3">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" href="{{ route('produk') }}">Menu</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" href="{{ route('cart') }}"><i class="bi bi-cart"></i> Cart</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
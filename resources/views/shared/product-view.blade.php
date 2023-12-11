<style>
.mt-3 {
    margin-top: 4em !important;

}

.ini {
    margin-top: 5em;
    background-color: #ffffff;
    padding: 15px;
    color: rgb(0, 0, 0) !important;
    }

.ini-title {
    font-size: 1.5rem;
    font-weight: bold;
    cursor: default;
}

.collection-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.collection-item {
    background-color: rgb(170, 193, 115);
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(252, 246, 246, 0.1);
    transition: transform 0.3s ease-in-out;
}

.collection-item:hover {
    transform: scale(1.05);
}

.collection-img img {
    width: 100%;
    height: auto;
    border-bottom: 1px solid #ddd;
}

.collection-text {
    padding: 15px;
    text-align: center;
}

.collection-text p {
    margin: 0;
}

.btn-primart {
    display: block;
    margin-top: 15px;
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.btn-primart:hover {
    background-color: #45a049;
}

.footer{
    margin-top: 7.5em;
}
</style>
    
<div class="ini">
    <h2><span class="position-absolute ini-title">Menu</span></h2>
</div>

<div class="collection-list mt-5 row gx-0 gy-3 justify-content-center">    
    @foreach ($product as $key => $data)
    <div class="col-md-6 col-lg-4 col-xl-3 p-2 best collection-item mx-auto">
        <div class="collection-img position relative">
            <img src="{{ asset ('img/'.$data->image) }}" class="w-100" style="height: 200px; object-fit: cover;">
        </div>
        <div class="collection-text text-center">
            <p class="text-capitalize my-2"> {{ $data->name }}</p>
            <span class ="fw-bold"> ${{ $data->price }}</span><br>
            <a href="{{ route('addtocart', ['id' => $data->id]) }}" class="btn btn-primart mt-3">Add to cart</a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

{{-- <div class="container mt-4">
    <div class="row justify-content-center">
        <h1>Menu</h1>
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ asset('img/1.jpeg') }}" class="card-img-top img-hover" alt="Produk 1" style="object-fit: cover; height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">Cimol Pedas</h5>
                    <p class="card-text">Deskripsi produk 1.</p>
                    <a href="#" class="btn btn-primary btn-sm mb-2">$ 4.5</a> <br>
                    <a href="{{ route('cart') }}" class="btn btn-success btn-sm">Tambah ke keranjang</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ asset('img/2.jpeg') }}" class="card-img-top img-hover" alt="Produk 2" style="object-fit: cover; height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">Cimol Mayonaise</h5>
                    <p class="card-text">Deskripsi produk 2.</p>
                    <a href="#" class="btn btn-primary btn-sm mb-2">$ 6</a> <br>
                    <a href="{{ route('cart') }}" class="btn btn-success btn-sm">Tambah ke keranjang</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ asset('img/3.jpeg') }}" class="card-img-top img-hover" alt="Produk 3" style="object-fit: cover; height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">Cimol Balado</h5>
                    <p class="card-text">Deskripsi produk 3.</p>
                    <a href="#" class="btn btn-primary btn-sm mb-2">$ 5.5</a> <br>
                    <a href="{{ route('cart') }}" class="btn btn-success btn-sm">Tambah ke keranjang</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ asset('img/4.jpeg') }}" class="card-img-top img-hover" alt="Produk 4" style="object-fit: cover; height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">Cimol Mozarella</h5>
                    <p class="card-text">Deskripsi produk 4.</p>
                    <a href="#" class="btn btn-primary btn-sm mb-2">$ 6.6</a> <br>
                    <a href="{{ route('cart')}}" class="btn btn-success btn-sm">Tambah ke keranjang</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
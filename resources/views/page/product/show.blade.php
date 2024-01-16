@extends('layout.index')

@section('judul',)
    @section('isi')
    <div class="collection-list mt-5 row gx-0 gy-3 justify-content-center">    
        <div class="col-md-6 col-lg-4 col-xl-3 p-2 best collection-item mx-auto">
            <div class="collection-img position relative">
                <a href="{{ route('products.show', $product->id) }}">
                <img src="{{ asset ('img/'.$product->image) }}" class="w-100" style="height: 200px; object-fit: cover;">
            </a>
            </div>
            <div class="collection-text text-center">
                <p class="text-capitalize my-2"> {{ $product->name }}</p>
                <span class ="fw-bold"> ${{ $product->price }}</span><br><br>
                <p>{{ $product->penjelasan }}</p>
                <a href="{{ route('addtocart', ['id' => $product->id]) }}" class="btn btn-primary mt-3">Add to cart</a>
            </div>
            </div>
        
        </div>
    
        <div class="mt-3">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
@endsection
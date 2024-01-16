@extends('layout.index')

@section('judul',)
    @section('isi')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-4 offset-md-3">
                <center><h3 class="mt-5">Product add</h3></center>
                <form method="post" action="{{ route('products.store') }}">
                    @csrf
    
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
    
                    <div class="mb-4">
                        <label class="form-label" for="name">Name Product</label>
                        <input class="form-control @error('name') is-invalid @enderror" name="name" id="name" type="text" value="{{ old('name') }}" />
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="mb-4">
                        <label class="form-label" for="price">Price</label>
                        <input class="form-control @error('price') is-invalid @enderror" name="price" id="price" type="text" value="{{ old('price') }}" />
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="penjelasan">Penjelasan</label>
                        <input class="form-control @error('penjelasan') is-invalid @enderror" name="penjelasan" id="penjelasan" type="text-area" value="{{ old('penjelasan') }}" />
                        @error('penjelasan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="mb-4">
                        <label class="form-label" for="image">Picture</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" />
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" name="submit" type="submit" value="Add">add</button>
                    </div> <br>
                </form>
            </div>
        </div>
    </div>
@endsection
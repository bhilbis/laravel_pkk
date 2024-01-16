<style>
    .tabel {
        max-width: 800px;
        margin-top: 6em !important;
        margin: 2em auto;
        background-color: rgb(255, 255, 255);
        padding: 1em;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20.5em;
    }

    table { 
        width: 100%;
        border-collapse: collapse;
        margin-top: 1em;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #4caf50;
        color: white;
    }

    .checkout-button {
        background-color: #4caf50;
        color: white;
        padding: 0.5em 1em;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
        margin-top: 1em;
    }
    .quantity-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .quantity-button,
    .remove-button {
        cursor: pointer;
        padding: 5px;
        margin: 0 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        background-color: #f8f8f8;
        font-size: 14px;
        line-height: 1;
    }
    .remove-button {
        /* cursor: pointer;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        background-color: #f8f8f8; */
        color: #e74c3c; /* Warna merah untuk tombol remove */
        /* font-size: 14px;
        line-height: 1; */
    }
</style>

<div id="cart-container" class="tabel mt-2">
    <h2>Cart</h2>
    @if(count($cart) > 0)
        <table class="text-center">
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="cart-items">
                @php
                $totalPrice = 0; // Inisialisasi variabel total harga
             @endphp
                @foreach($cart as $id => $item)
                    <tr>
                        <td>{{ $item['order_number'] }}</td>
                        <td><img src="{{ asset('img/' . $item['image']) }}" alt="{{ $item['name'] }}" style="max-width: 150px; max-height: 80px;"></td>
                        <td>{{ $item['name'] }}</td>
                        <td>${{ $item['price'] }}</td>
                        <td>
                            <div class="quantity-container">
                                <form action="{{ route('updateProductQuantity') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="productId" value="{{ $id }}">
                                    <button type="submit" name="action" value="decrement" class="quantity-button">-</button>
                                </form>
            
                                {{ $item['quantity'] }}
            
                                <form action="{{ route('updateProductQuantity') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="productId" value="{{ $id }}">
                                    <button type="submit" name="action" value="increment" class="quantity-button">+</button>
                                </form>
                            </div>
                        </td>
                        <td>
                            @if(isset($item['total_price']))
                                ${{ $item['total_price'] }}
                            @else
                                ${{ $item['price'] }}
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('removeProduct') }}" method="post">
                                @csrf
                                <input type="hidden" name="productId" value="{{ $id }}">
                                <button type="submit" class="remove-button">Remove</button>
                            </form>
                        </td>            
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('checkout') }}" class="checkout-button mb-2">Checkout</a>
        <a href="{{ route('products.index') }}" class="checkout-button mb-2">Add product</a>
    @else
        <p>Your cart is empty.</p>

        <a href="{{ route('products.index') }}" class="btn btn-primary mb-2">Add cart</a>
    @endif

    @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
</div>


    

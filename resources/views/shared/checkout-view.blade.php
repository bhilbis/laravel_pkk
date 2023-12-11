<style>
    #checkout-container {
        text-align: center  !important;
    }
    .tabel {
        margin: 20px !important;
        margin-top: 5em !important;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #4caf50;
    }

    #cart-items img {
        max-width: 50px;
        height: auto;
    }

    .process-checkout-button {
        display: block;
        margin-top: 20px;
        padding: 10px 15px;
        background-color: #4caf50;
        color: white;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
    }

    .process-checkout-button:hover {
        background-color: #45a049;
    }

    #checkout-container {
        margin-bottom: 31em;
    }
    .payment-icon {
        width: 60px; /* Sesuaikan dengan ukuran yang Anda inginkan */
        height: 20px; /* Sesuaikan dengan ukuran yang Anda inginkan */
        margin-right: 1px; /* Atur margin jika diperlukan */
    }
    .payment-icon1{
        width: 20px;
        height: 30px;
    }
    .payment-icon2{
        width: 30px;
        height: 30px;
    }
    h3{
        margin-top: 6.5em;
    }
    form label{
        margin: 5px 10px 20px 10px;
    }
    </style>

{{-- <div id="checkout-container">
    <h2>Checkout</h2>

    @if(count($cart) > 0)
        <table>
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody id="cart-items">
                @foreach($cart as $id => $item)
                    <tr>
                        <td>{{ $item['order_number'] }}</td>
                        <td><img src="{{ asset('img/' . $item['image']) }}" alt="{{ $item['name'] }}" width="50"></td>
                        <td>{{ $item['name'] }}</td>
                        <td>${{ $item['price'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>
                            @if(isset($item['total_price']))
                                ${{ $item['total_price'] }}
                            @else
                                ${{ $item['price'] }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Add form or payment information here --}}

        {{-- <a href="{{ route('processcheckout') }}" class="process-checkout-button">Process Checkout</a>
    @else
        <p>Your cart is empty. There are no products to check out.</p>
    @endif
</div> --}}


<div id="checkout-container" class="tabel mt-5">
    <h2>Checkout</h2>

    @if(count($cart) > 0)
        <form action="{{ route('processcheckout') }}" method="post">
            @csrf
            <table>
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>

                <tbody id="cart-items">
                    @php
                        $totalPrice = 0; // Inisialisasi total harga
                    @endphp
                    @foreach($cart as $id => $item)
                        <tr>
                            <td>{{ $item['order_number'] }}</td>
                            <td><img src="{{ asset('img/' . $item['image']) }}" alt="{{ $item['name'] }}" style="max-width: 150px; max-height: 80px;"></td>
                            <td>{{ $item['name'] }}</td>
                            <td>${{ $item['price'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            {{-- <td>
                                @if(isset($item['total_price']))
                                    ${{ $item['total_price'] }}
                                @else
                                    ${{ $item['price'] }}
                                @endif
                            </td> --}}
                            <td>
                                @php
                                    $itemTotalPrice = isset($item['total_price']) ? $item['total_price'] : $item['price'];
                                    $totalPrice += $itemTotalPrice;
                                @endphp
                                ${{ $itemTotalPrice }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="mt-3">
                <tr>
                    <th>Total Price</th>
                    <td>${{ $totalPrice }}</td>
                </tr>
            </table>

            <!-- Formulir Metode Pembayaran -->
            <h3>Choose Payment Method</h3>
            <label class="payment-method">
                <input type="radio" name="payment_method" value="credit_card">
                <img src="{{ asset('img/Card.png') }}" alt="Credit Card" class="payment-icon2">
            </label>
            <label class="payment-method">
                <input type="radio" name="payment_method" value="dana">
                <img src="{{ asset('img/Dana.png') }}" alt="Dana" class="payment-icon">
            </label>
            <label class="payment-method">
                <input type="radio" name="payment_method" value="ovo">
                <img src="{{ asset('img/Ovo.png') }}" alt="OVO" class="payment-icon1">
            </label>
            <label class="payment-method">
                <input type="radio" name="payment_method" value="gopay">
                <img src="{{ asset('img/Gopay.png') }}" alt="Gopay" class="payment-icon">
            </label>
            <label class="payment-method">
                <input type="radio" name="payment_method" value="shopeepay">
                <img src="{{ asset('img/Shopee.png') }}" alt="ShopeePay" class="payment-icon">
            </label>
            <br>
            <!-- Tombol Proses Checkout -->
            <center><button type="submit" class="process-checkout-button">Process Checkout</button></center>
            @error('payment_method')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
        </form>
    @else
        <p>Your cart is empty. There are no products to check out.</p>
    @endif
</div>
<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class EcomController extends Controller
{
    public function index(){
    return view('page.home');
    }
    public function product(){
        $product = Product::all();
        return view('page.product', compact('product'));
    }
    public function cart(){
        return $this->showCart();
    }

    public function showCart()
{
    $cart = session()->get('cart', []);

    return view('page.cart', compact('cart'));
}

    public function addtocart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []); 

        $existingOrderNumber = null;

        foreach ($cart as $existingId => $existingItem) {
            if ($existingItem['order_number']) {
                $existingOrderNumber = $existingItem['order_number'];
                break;
            }
        }

    $orderNumber = $existingOrderNumber ?: count($cart) + 1; // Jika sudah ada, gunakan yang sudah ada, jika tidak, tambahkan 1

    
        if (isset($cart[$id])) {
            // Jika kunci 'quantity' sudah ada, tambahkan nilainya
            $cart[$id]['quantity']++;

            $cart[$id]['total_price'] = $cart[$id]['quantity'] * $product->price;

            $cart[$id]['order_number'] = $existingOrderNumber;
            } 
            
        
        else {
            // Jika produk belum ada di keranjang, tambahkan produk ke keranjang
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "quantity" => 1, // Set jumlah awal menjadi 1
                "total_price" => $product->price, // Total harga untuk satu produk
                "order_number" => $orderNumber, // Nomor urutan pesanan
            ];
        }
    
        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Product has been added to cart!');
    }
    
    
        public function destroy(Request $request)
        {
            if ($request->id) {
                $cart = session()->get('cart');
                if (isset($cart[$request->id])) {
                    unset($cart[$request->id]);
                    session()->put('cart', $cart);
                }
    
                session()->flash('success', 'Product successfully deleted.');
            }
        }

        public function checkout()
            {
            // Ambil informasi keranjang dari session
            $cart = session()->get('cart', []);

            // Tampilkan halaman checkout dengan informasi keranjang
            return view('page.checkout', compact('cart'));
        }

        public function processCheckout(Request $request)
        {
            $request->validate([
                'payment_method' => 'required|in:credit_card,dana,ovo,gopay,shopeepay',
            ], [
                'payment_method.required' => 'Please choose a payment method before proceeding to checkout.',
            ]
        );
    
            $cart = session()->get('cart', []);
    
            // Logika bisnis untuk proses checkout
            // Misalnya, menyimpan informasi checkout ke database atau sistem pembayaran
    
            // Hapus isi keranjang setelah proses checkout
            session()->forget('cart');
    
            // Set pesan sukses untuk ditampilkan pada halaman checkout
            $successMessage = 'Checkout successful! Thank you for your purchase.';
    
            // Redirect kembali ke halaman checkout dengan menyertakan pesan sukses
            return redirect()->route('cart')->with('success', $successMessage);
        }


        public function updateProductQuantity(Request $request)
    {
        $productId = $request->input('productId');
        $action = $request->input('action');

        $product = Product::findOrFail($productId);

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            if ($action === 'increment') {
                // Increment quantity
                $cart[$productId]['quantity']++;
            } elseif ($action === 'decrement' && $cart[$productId]['quantity'] > 1) {
                // Decrement quantity, but ensure it doesn't go below 1
                $cart[$productId]['quantity']--;
            }

            // Update total price based on the new quantity
            $cart[$productId]['total_price'] = $cart[$productId]['quantity'] * $product->price;

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product quantity updated.');
    }

    public function removeProduct(Request $request)
    {
        $productId = $request->input('productId');

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart.');
    }

}


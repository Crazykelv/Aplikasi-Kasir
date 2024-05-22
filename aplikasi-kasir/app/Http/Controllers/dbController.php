<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dbController extends Controller
{
    public function addProduk(Request $request) {

        $produk = new Produk;

        $produk -> nama = $request -> nama;
        $produk -> kategori = $request -> kategori;
        $produk -> kelamin = $request -> kelamin;
        $produk -> harga = $request -> harga;
        $produk -> stok = $request -> stok;
        
        $gambar = $request -> foto;

        if ($gambar) {

            $gambarname = time().'.'. $gambar -> getClientOriginalExtension();
            $request -> foto -> move('images/foto-produk',$gambarname);
            $produk -> fotoP = $gambarname;

        }

        $produk->save();

        return view('tambah-produk');
    }

    public function addTransaksi($id) {

        $user = User::all();

        if ($user -> id == $id) {

        }
        else {
            $user = new User;  
            
        }

        

        return view('');
    }

    public function addcart(Request $request, $produkid)
    {
        if (Auth::id()) {
            $user = auth()->user();
            $produk = Produk::find($produkid);

            // Check if the product is already in the cart
            $cartItem = Cart::where('namaProduk', $produk->nama)->first();

            if ($cartItem) {
                // If the product is already in the cart, increment the quantity
                $cartItem->kuantitasProduk += $request->kuantitasProduk;
                $cartItem->save();
            } else {
                // If the product is not in the cart, add a new item
                $cart = new Cart;
                $cart->namaProduk = $produk->nama;
                $cart->kuantitasProduk = $request->kuantitasProduk;
                $cart->hargaProduk = $produk->harga;
                $cart->save();
            }

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        } else {
            return redirect('login')->with('error', 'You need to login first!');
        }
    }


}

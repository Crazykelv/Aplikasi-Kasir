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

    // public function addTransaksi($id) {

    //     $user = User::all();
    //     $cart = Cart::all();
    //     $transaksi = new Transaksi;


    //     $namaProduks = [];
    //     foreach ($cart as $item) {
    //         $namaProduks[] = $item->nama;
    //     }

    //     $transaksi->namaProduk = implode(',', $namaProduks);
    //     $transaksi->kuantitas = $cart.count();
    //     $transaksi->jmlHarga = if ($user -> userValue === 1) {
    //                             foreach ($cart->harga as $item) {
    //                                 $jmlharga += $item->harga;
    //                             }
    //                             $jmlharga * $user->discount;
    //                             $transaksi -> discount = $user->discount;
    //                         } else {
    //                             foreach ($cart->harga as $item) {
    //                                 $jmlharga += $iitem->harga;
    //                                 $pembeli = new User;
    //                                 $pembeli -> nama = 'pembeli';
    //                                 $pembeli->save();
    //                             }
    //                         }
        
    //     $transaksi->save();
    //     foreach (Cart::all() as $item) {
    //         $item->delete();
    //       }        

    //     return redirect()->back();
    // }

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

    public function addIncrement($id) {

        $cart = Cart::find($id);

        if ($cart->kuantitasProduk === 1) {
            $harga = $cart -> hargaProduk;
        }
        
        if ($cart->kuantitasProduk != 0) {
            $cart -> kuantitasProduk += 1;
        } else if ($cart === 0) {
            return redirect()->back();
        }

        $cart->save();

        return redirect()->back();
    }

    public function minIncrement($id) {

        $cart = Cart::find($id);

        if ($cart->kuantitasProduk > 0) {
            $cart -> kuantitasProduk -= 1;
        } else if ($cart === 0) {
            return redirect()->back();
        }

        $cart->save();

        return redirect()->back();
    }

}

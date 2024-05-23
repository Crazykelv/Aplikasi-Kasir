<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Cart;
use Illuminate\Http\Request;

class dashboardHandler extends Controller
{
    // Filter
    public function filterMale() {

        $produk = Produk::where('kelamin', 'laki-laki')->get();
        $cart = Cart::all();

        return view('dashboard', [
            'produk' => $produk,
            'cart' => $cart
        ]);
    } 

    public function filterFemale() {

        $produk = Produk::where('kelamin', 'perempuan')->get();
        $cart = Cart::all();

        return view('dashboard', [
            'produk' => $produk,
            'cart' => $cart
        ]);

    }

    public function filterSetelan() {

        $produk = Produk::where('kategori', 'celana')->get();
        $cart = Cart::all();


        return view('dashboard', [
            'produk' => $produk,
            'cart' => $cart
        ]);
    }

    public function filterCelana() {

        $produk = Produk::where('kategori', 'celana')->get();
        $cart = Cart::all();

        return view('dashboard', [
            'produk' => $produk,
            'cart' => $cart
        ]);
    }

    public function filterBaju() {

        $produk = Produk::where('kategori', 'baju')->get();
        $cart = Cart::all();

        return view('dashboard', [
            'produk' => $produk,
            'cart' => $cart
        ]);
    }
    // Filter

    // public function tambahCart(Produk $produkid) {

    //     // $produks = Produk::all();
    //     $produk = Produk::find($produkid);
    //     // $cart = new Cart;

    //     // $cart -> namaProduk = $produk->namaProduk;
    //     // $cart -> kuantitasProduk = $produk->kuantitasProduk;
    //     // $cart -> hargaProduk = $produk->hargaProduk;

    //     // $cart->save();

    //     // dd($produkid);

    //     return view('dashboard', [
    //         'produk' => $produk
    //     ]);
    // }

    // Sidebar

    public function cancel() {

        foreach (Cart::all() as $item) {
            $item->delete();
          }

        return redirect()->back();

    }
    
}

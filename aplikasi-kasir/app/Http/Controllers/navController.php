<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Cart;
use Illuminate\Http\Request;

class navController extends Controller
{
    public function login() {

        return view('login');
    }

    public function dashboard() {
        
        $produk = Produk::all();
        $cart = Cart::all();

        return view('dashboard', [
            'produk' => $produk,
            'cart' => $cart
        ]);
    }

    public function nAddProduk() {

        return view('tambah-produk');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Cart;
use Illuminate\Http\Request;

class dashboardHandler extends Controller
{
    // Filter
    public function filterMale() {

        $produk = Produk::where('kelamin', 'pria')->get();
        $cart = Cart::all();

        $jmlharga = 0;
        $total = 0;
        
        if ($cart) {
            foreach ($cart as $item) {
                if ($item->hargaProduk) {
                    if ($item->kuantitasProduk > 1) {
                        $jmlharga += $item->hargaProduk * $item->kuantitasProduk;
                    } else {
                        $jmlharga += $item->hargaProduk;
                    }

                }
            }

            $total = $jmlharga;

        }

        $discount = 0;
        $discountLabel = '0%';
        $idMember = 0;
        
        return view('dashboard', [
            'produk' => $produk,
            'cart' => $cart,
            'jmlharga' => $jmlharga,
            'discount' => $discount,
            'dLabel' => $discountLabel,
            'idMember' => $idMember,
            'total' => $total
        ]);
    } 

    public function filterFemale() {

        $produk = Produk::where('kelamin', 'wanita')->get();
        $cart = Cart::all();

        $jmlharga = 0;
        $total = 0;
        
        if ($cart) {
            foreach ($cart as $item) {
                if ($item->hargaProduk) {
                    if ($item->kuantitasProduk > 1) {
                        $jmlharga += $item->hargaProduk * $item->kuantitasProduk;
                    } else {
                        $jmlharga += $item->hargaProduk;
                    }

                }
            }

            $total = $jmlharga;

        }

        $discount = 0;
        $discountLabel = '0%';
        $idMember = 0;
        
        return view('dashboard', [
            'produk' => $produk,
            'cart' => $cart,
            'jmlharga' => $jmlharga,
            'discount' => $discount,
            'dLabel' => $discountLabel,
            'idMember' => $idMember,
            'total' => $total
        ]);

    }

    public function filterSetelan() {

        $produk = Produk::where('kategori', 'setelan')->get();
        $cart = Cart::all();


        $jmlharga = 0;
        $total = 0;
        
        if ($cart) {
            foreach ($cart as $item) {
                if ($item->hargaProduk) {
                    if ($item->kuantitasProduk > 1) {
                        $jmlharga += $item->hargaProduk * $item->kuantitasProduk;
                    } else {
                        $jmlharga += $item->hargaProduk;
                    }

                }
            }

            $total = $jmlharga;

        }

        $discount = 0;
        $discountLabel = '0%';
        $idMember = 0;
        
        return view('dashboard', [
            'produk' => $produk,
            'cart' => $cart,
            'jmlharga' => $jmlharga,
            'discount' => $discount,
            'dLabel' => $discountLabel,
            'idMember' => $idMember,
            'total' => $total
        ]);
    }

    public function filterCelana() {

        $produk = Produk::where('kategori', 'celana')->get();
        $cart = Cart::all();

        $jmlharga = 0;
        $total = 0;
        
        if ($cart) {
            foreach ($cart as $item) {
                if ($item->hargaProduk) {
                    if ($item->kuantitasProduk > 1) {
                        $jmlharga += $item->hargaProduk * $item->kuantitasProduk;
                    } else {
                        $jmlharga += $item->hargaProduk;
                    }

                }
            }

            $total = $jmlharga;

        }

        $discount = 0;
        $discountLabel = '0%';
        $idMember = 0;
        
        return view('dashboard', [
            'produk' => $produk,
            'cart' => $cart,
            'jmlharga' => $jmlharga,
            'discount' => $discount,
            'dLabel' => $discountLabel,
            'idMember' => $idMember,
            'total' => $total
        ]);
    }

    public function filterBaju() {

        $produk = Produk::where('kategori', 'baju')->get();
        $cart = Cart::all();

        $jmlharga = 0;
        $total = 0;
        
        if ($cart) {
            foreach ($cart as $item) {
                if ($item->hargaProduk) {
                    if ($item->kuantitasProduk > 1) {
                        $jmlharga += $item->hargaProduk * $item->kuantitasProduk;
                    } else {
                        $jmlharga += $item->hargaProduk;
                    }

                }
            }

            $total = $jmlharga;

        }

        $discount = 0;
        $discountLabel = '0%';
        $idMember = 0;
        
        return view('dashboard', [
            'produk' => $produk,
            'cart' => $cart,
            'jmlharga' => $jmlharga,
            'discount' => $discount,
            'dLabel' => $discountLabel,
            'idMember' => $idMember,
            'total' => $total
        ]);
    }
    // Filter

    public function cancel() {

        foreach (Cart::all() as $item) {
            $item->delete();
          }

        return redirect()->back();

    }
    
}

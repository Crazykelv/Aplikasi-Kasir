<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class navController extends Controller
{
    public function login() {

        return view('login');
    }

    public function dashboard()
    {

        $produk = Produk::all();
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

        $growth = Produk::orderBy('frequent', 'desc')->get();

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
            'total' => $total,
            'growth' => $growth
        ]);
    }

    public function dashGrowth() {

        $produk = Produk::all();
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

        $growth = Produk::orderBy('frequent', 'desc')->get();

        $discount = 0;
        $discountLabel = '0%';
        $idMember = 0;
        
        return view('dashGrowth', [
            'produk' => $produk,
            'cart' => $cart,
            'jmlharga' => $jmlharga,
            'discount' => $discount,
            'dLabel' => $discountLabel,
            'idMember' => $idMember,
            'total' => $total,
            'growth' => $growth
        ]);

    }

    public function dashboardMember($id)
    {

        $produk = Produk::all();
        $cart = Cart::all();
        $user = User::find($id);

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
        }

        $discount = 0;
        $discountLabel = '';
        $idMember = 0;

        if ($user) {
            // $user is not boolean, so no need for foreach loop
            if ($user->userValue === 1) {
                $discount = $user->discount;
                
                if ($discount === 0.10) {
                    $discountLabel = '10%'; 
                } else if ($discount === 0.20) {
                    $discountLabel = '20%'; 
                } else if ($discount === 0.30) {
                    $discountLabel = '30%'; 
                }

                $idMember = $user->id;

                if ($jmlharga > 0) {
                    $total = $jmlharga - ($jmlharga * $user->discount);
                }

            }
        }

        
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

    public function nAddProduk() {

        return view('tambah-produk');
    }

    public function member() {

        $member = User::where('userValue', 1)->get();

        return view('member', [
            'member' => $member
        ]);
    }
    public function addMember() {

        return view('add-member');
    }

    public function history() {

        $hist = Transaksi::all();

        return view('history', [
            'hist' => $hist
        ]);
    }

}

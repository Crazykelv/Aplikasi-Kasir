<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Helpers\FPGrowth;
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
        $produk -> frequent = 0;
        
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

        if ($id == 0) {

            $cart = Cart::all();

            $transaksi = new Transaksi;

            $transaksi -> idMember = $id;
            $transaksi -> namaMember = 'Pembeli';

            $namaProduks = [];
            foreach ($cart as $item) {
                $namaProduks[] = $item->namaProduk . ' ' . $item->kuantitasProduk;
            }

            $transaksi->namaProduk = implode(',', $namaProduks);

            $totalQuantity = Cart::sum('kuantitasProduk');
            $transaksi->kuantitas = $totalQuantity;

            $jmlharga = 0;
            $transaksi -> discount = 0;

                foreach ($cart as $item) {
                    $jmlharga += $item->hargaProduk * $item->kuantitasProduk;
                    $transaksi->jmlHarga = $jmlharga;

                    // $pembeli = new User;
                    // $pembeli -> nama = 'pembeli';
                    // $pembeli->save();

                }
            

        } else if ($id != 0) {

            $idMem = $id;
            $user = User::find($idMem);
            $cart = Cart::all();

            $transaksi = new Transaksi;

            $transaksi -> idMember = $idMem;
            $transaksi -> namaMember = $user -> nama;

            $namaProduks = [];
            foreach ($cart as $item) {
                $namaProduks[] = $item->namaProduk . ' ' . $item->kuantitasProduk;
            }

            $transaksi->namaProduk = implode(', ', $namaProduks);

            $totalQuantity = Cart::sum('kuantitasProduk');
            $transaksi->kuantitas = $totalQuantity;


            if ($user -> userValue === 1) {

                $jmlharga = 0;

                foreach ($cart as $item) {
                    $jmlharga += $item->hargaProduk * $item->kuantitasProduk;
                }

                $jmlharga -= ($jmlharga * $user->discount);
                $transaksi->jmlHarga = $jmlharga;
                $transaksi -> discount = $user->discount;

            }

        }

        
        
        $transaksi->save();
        foreach (Cart::all() as $item) {
            $item->delete();
          }        

        return redirect()->back();
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
                $produk->frequent += 1;
                $produk->save();
                $cartItem->save();
            } else {
                // If the product is not in the cart, add a new item
                $cart = new Cart;
                $cart->namaProduk = $produk->nama;
                $cart->kuantitasProduk = $request->kuantitasProduk;
                $cart->hargaProduk = $produk->harga;
                $produk->frequent += 1;
                $produk->save();
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

    public function delHist($id) {

        $hist = Transaksi::find($id);
        $hist->delete();

        return redirect()->back();
    }

    public function generateFPGrowth()
    {
        $transactions = Transaksi::all()->groupBy('idMember')->map(function ($memberTransactions) {
            return $memberTransactions->pluck('namaProduk')->toArray();
        })->values()->toArray();

        $minSupport = 2; // Set minimum support threshold
        $fpGrowth = new FPGrowth($transactions, $minSupport);
        $result = $fpGrowth->minePatterns();

        $transaksis = Transaksi::all(); // Add this line to pass $transaksis to the view
        return view('dashboard', compact('result', 'transaksis'));
    }

}

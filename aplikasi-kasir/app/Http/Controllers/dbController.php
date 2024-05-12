<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class dbController extends Controller
{
    public function addProduk(Request $request) {

        $produk = new Produk;

        $produk -> nama = $request -> nama;
        $produk -> kategori = $request -> kategori;
        $produk -> harga = $request -> harga;
        $produk -> stok = $request -> stok;
        
        $gambar = $request -> foto;

        if ($gambar) {

            $gambarname = time().'.'. $gambar -> getClientOriginalExtension();
            $request -> foto -> move('foto-produk',$gambarname);
            $produk -> foto = $gambarname;

        }

        return view('');
    }

    public function addTransaksi() {

        

        return view('');
    }
}

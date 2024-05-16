<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Cart;
use Illuminate\Http\Request;

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

}

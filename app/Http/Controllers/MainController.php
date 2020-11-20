<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;

class MainController extends Controller
{
    public function index()
    {
    	$produks = Produk::paginate(10);
        return view('index', compact('produks'));
    }
    public function produk($id)
    {
    	$produk = Produk::find($id);
        return view('produk', compact('produk'));
    }
    public function kategori()
    {
    	$kategoris = Kategori::all();
        return view('kategori', compact('kategoris'));
    }
    public function produk_kategori($id)
    {
    	$produks = Produk::where('id_kategori', $id)->paginate(10);
    	$kategori = Kategori::where('id', $id)->first();
        return view('index', compact('produks', 'kategori'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use Auth;
use File;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$produks = Produk::paginate(10);
        return view('admin.produk.index', compact('produks'));
    }
    public function tambah()
    {
    	$kategoris = Kategori::all();
        return view('admin.produk.tambah', compact('kategoris'));
    }
    public function insert(Request $request)
    {
    	$gambar = $request->file('gambar');
    	$nama_gambar = time()."_".$gambar->getClientOriginalName();
    	$tujuan_upload = 'gambar';
    	Produk::create([
    		'gambar' => $nama_gambar,
    		'nama' => $request->nama,
    		'harga' => $request->harga,
    		'deskripsi' => $request->deskripsi,
    		'stok' => $request->stok,
    		'id_user' => Auth::user()->id,
    		'id_kategori' => $request->kategori,
    	]);
    	$gambar->move($tujuan_upload,$nama_gambar);
        return redirect('admin/produk');
    }
    public function edit($id)
    {
    	$produk = Produk::find($id);
    	$kategoris = Kategori::all();
        return view('admin.produk.edit', compact('produk', 'kategoris'));
    }
    public function update($id, Request $request)
    {
    	$produk = Produk::find($id);
    	if(isset($request->gambar))
    	{
    		File::delete('gambar/'.$produk->gambar);

    		$gambar = $request->file('gambar');
	    	$nama_gambar = time()."_".$gambar->getClientOriginalName();
	    	$tujuan_upload = 'gambar';

	    	$gambar->move($tujuan_upload,$nama_gambar);
	    	$produk->gambar = $nama_gambar;
    	}
    	$produk->nama = $request->nama;
    	$produk->harga = $request->harga;
    	$produk->deskripsi = $request->deskripsi;
    	$produk->stok = $request->stok;
    	$produk->id_kategori = $request->kategori;
    	$produk->save();
        return redirect('admin/produk');
    }
    public function hapus($id)
    {
    	$produk = Produk::find($id);
    	$produk->delete();
    	File::delete('gambar/'.$produk->gambar);
        return redirect('admin/produk');
    }
}

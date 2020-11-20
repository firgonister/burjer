<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$kategoris = Kategori::paginate(10);
        return view('admin.kategori.index', compact('kategoris'));
    }
    public function tambah()
    {
        return view('admin.kategori.tambah');
    }
    public function insert(Request $request)
    {
    	Kategori::create([
    		'nama' => $request->nama
    	]);
        return redirect('admin/kategori');
    }
    public function edit($id)
    {
    	$kategori = Kategori::find($id);
        return view('admin.kategori.edit', compact('kategori'));
    }
    public function update($id, Request $request)
    {
    	$kategori = Kategori::find($id);
    	$kategori->nama = $request->nama;
    	$kategori->save();
        return redirect('admin/kategori');
    }
    public function hapus($id)
    {
    	$kategori = Kategori::find($id);
    	$kategori->delete();
        return redirect('admin/kategori');
    }
}

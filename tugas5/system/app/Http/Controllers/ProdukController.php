<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $data['list_produk'] = Produk::all();
        return view('produk.index', $data);
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $produk = new Produk();
        $produk->nama = request('nama');
        $produk->harga = request('harga');
        $produk->stok = request('stok');
        $produk->berat = request('berat');
        $produk->deskripsi = request('deskripsi');
        $produk->save();

        return redirect('admin/produk')->with('success', 'data berhasil di tambahkan');
    }

    public function show(Produk $produk)
    {
        $data['produk'] = $produk;
        return view('produk.show', $data);
    }

    public function edit(Produk $produk)
    {
        $data['produk'] = $produk;
        return view('produk.edit', $data);
    }

    public function update(Produk $produk)
    {
        $produk->nama = request('nama');
        $produk->harga = request('harga');
        $produk->stok = request('stok');
        $produk->berat = request('berat');
        $produk->deskripsi = request('deskripsi');
        $produk->save();

        return redirect('admin/produk')->with('success', 'data berhasil di ubah');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect('admin/produk')->with('danger', 'data berhasil di hapus');
    }
}

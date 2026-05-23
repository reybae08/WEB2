<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product', [
            'products' => Product::all(),
        ]);
    }

    public function create()
    {
        return view('admin.product-create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_barang' => 'nullable|string|max:100',
            'name_barang' => 'required|string|max:255',
            'satuan' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
        ]);

        Product::create($validatedData);

        return redirect('/admin/product')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product-edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_barang' => 'nullable|string|max:100',
            'name_barang' => 'required|string|max:255',
            'satuan' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return redirect('/admin/product')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/admin/product')->with('success', 'Produk berhasil dihapus.');
    }
}

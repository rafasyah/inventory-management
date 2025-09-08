<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $products = Product::all();
    return view('welcome', compact('products'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('product.create');
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // handle upload before saving
        if ($request->hasFile('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        Product::create($validatedData);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
   public function show(string $id)
{
    $product = Product::findOrFail($id);
    return view('product.show', compact('product'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);

        // handle upload before saving
        if ($request->hasFile('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        $product->update($validatedData);

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
    }
}

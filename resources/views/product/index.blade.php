@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-100 mb-6">Daftar Produk</h1>

    @if (session('success'))
        <div class="mb-4 p-4 text-green-200 bg-green-800 border border-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('product.create') }}" 
           class="px-4 py-2 bg-blue-800 text-white rounded-lg shadow hover:bg-blue-900 transition">
           + Tambah Produk
        </a>
    </div>

    <div class="overflow-x-auto bg-gray-900 rounded-xl shadow-lg">
        <table class="w-full text-sm text-left text-gray-300">
            <thead class="text-xs uppercase bg-gray-800 text-gray-200">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Nama Produk</th>
                    <th class="px-6 py-3">Kategori</th>
                    <th class="px-6 py-3">Stok</th>
                    <th class="px-6 py-3">Gambar</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                    <tr class="border-b border-gray-700 hover:bg-gray-800">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 font-medium text-gray-100">{{ $product->nama_produk }}</td>
                        <td class="px-6 py-4">{{ $product->kategori }}</td>
                        <td class="px-6 py-4">{{ $product->stok }}</td>
                        <td class="px-6 py-4">
                            @if ($product->gambar)
                                <img src="{{ asset('storage/' . $product->gambar) }}" 
                                     alt="{{ $product->nama_produk }}" 
                                     class="w-16 h-16 object-cover rounded-lg shadow-md border border-gray-700">
                            @else
                                <span class="text-gray-500 italic">Tidak ada</span>
                            @endif
                        </td>
                        <!-- <td class="px-6 py-4 text-center space-x-2">
                            <a href="{{ route('product.edit', $product->id) }}" 
                               class="px-3 py-1 text-sm bg-yellow-600 text-white rounded-lg hover:bg-yellow-700">
                               Edit
                            </a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                        class="px-3 py-1 text-sm bg-red-700 text-white rounded-lg hover:bg-red-800">
                                    Hapus
                                </button>
                            </form>
                        </td> -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            Belum ada produk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

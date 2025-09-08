@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-900 py-10">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Heading -->
        <h1 class="text-4xl font-bold text-center text-white mb-10">
            Selamat Datang di Toko Kami 🛍️
        </h1>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($products as $product)
                <div class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">
                    @if($product->gambar)
                        <img src="{{ asset('storage/' . $product->gambar) }}" 
                             alt="{{ $product->nama_produk }}" 
                             class="h-48 w-full object-cover">
                    @else
                        <div class="h-48 w-full flex items-center justify-center bg-gray-700 text-gray-400">
                            No Image
                        </div>
                    @endif

                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-white mb-2">{{ $product->nama_produk }}</h2>
                          <a href="{{ route('product.show', $product->id) }}" class="text-blue-500 hover:underline">Manage</a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-400">
                    Belum ada produk tersedia.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100 dark:bg-gray-900">
    <a href="#"
       class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
             src="{{ asset('storage/' . $product->gambar) }}" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $product->nama_produk }}
            </h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{ $product->kategori }}
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{ $product->stok }}
            </p>
        </div>
        <a href="{{ route('product.edit', $product->id) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-600 border border-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:border-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-600">
            Edit
        </a>
        <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="inline-flex">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-600 border border-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:bg-red-500 dark:border-red-500 dark:hover:bg-red-600 dark:focus:ring-red-600">
                Delete
            </button>
        </form>
    </a>
</div>
@endsection

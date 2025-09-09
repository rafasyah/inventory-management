@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white dark:bg-gray-800 shadow rounded-lg p-6 mt-10">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">
        Form Peminjaman
    </h1>

    <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama Peminjam --}}
        <div class="mb-4">
            <label for="nama_peminjam" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Nama Peminjam
            </label>
            <input type="text" name="nama_peminjam" id="nama_peminjam"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                          dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500"
                   required>
        </div>

        {{-- Tanggal Pinjam --}}
        <div class="mb-4">
            <label for="tanggal_pinjam" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Tanggal Pinjam
            </label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                          dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500"
                   required>
        </div>

        {{-- Tanggal Kembali --}}
        <div class="mb-4">
            <label for="tanggal_kembali" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Tanggal Kembali
            </label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                          dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500"
                   required>
        </div>

        {{-- Nama Produk --}}
        <div class="mb-4">
            <label for="nama_produk" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Nama Produk
            </label>
            <input type="text" name="nama_produk" id="nama_produk"
                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 
                          dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500"
                   required>
        </div>

        {{-- Submit Button --}}
        <div class="flex justify-end">
            <button type="submit"
                class="px-5 py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 
                       focus:outline-none focus:ring-2 focus:ring-blue-500">
                Submit
            </button>
        </div>
    </form>
</div>
@endsection

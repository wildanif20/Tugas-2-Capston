@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6 text-red-700">Tambah Data Employer</h2>
    <form action="{{ route('employers.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama_lengkap" class="block text-gray-700">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="w-full border border-red-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-red-400" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full border border-red-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-red-400" required>
        </div>
        <div class="mb-4">
            <label for="alamat" class="block text-gray-700">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="w-full border border-red-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-red-400" required>
        </div>
        <div class="mb-4">
            <label for="nomor_telepon" class="block text-gray-700">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" id="nomor_telepon" class="w-full border border-red-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-red-400" required>
        </div>
        <div class="mb-6">
            <label for="no_ktp" class="block text-gray-700">No KTP</label>
            <input type="text" name="no_ktp" id="no_ktp" class="w-full border border-red-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-red-400" required>
        </div>
        <button type="submit" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 transition">Simpan</button>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Tambah Data Muzakki')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-6xl mx-auto">
    

    <form action="{{ route('muzakki.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
        @csrf

        <!-- Nama -->
        <div>
            <label class="block font-semibold text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama" required
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Masukkan nama lengkap">
        </div>

        <!-- Telepon -->
        <div>
            <label class="block font-semibold text-gray-700 mb-1">Nomor Telepon</label>
            <input type="text" name="telepon" required
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="08xxxx">
        </div>

        <!-- Jumlah Jiwa -->
        <div>
            <label class="block font-semibold text-gray-700 mb-1">Jumlah Jiwa</label>
            <input type="number" name="jumlah_jiwa" min="1" required
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Metode Pembayaran -->
        <div>
            <label class="block font-semibold text-gray-700 mb-1">Metode Pembayaran</label>
            <select name="payment_method" required
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Metode --</option>
                <option value="tunai">Tunai</option>
                <option value="transfer">Transfer</option>
            </select>
        </div>

        <!-- Cabang -->
        <div>
            <label class="block font-semibold text-gray-700 mb-1">Cabang Penyaluran</label>
            <input type="text" name="cabang" required
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Contoh: Masjid Al-Falah">
        </div>

        <!-- Status Pembayaran -->
        <div>
            <label class="block font-semibold text-gray-700 mb-1">Status Pembayaran</label>
            <select name="status" required
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="pending">Pending</option>
                <option value="terkonfirmasi">Terkonfirmasi</option>
            </select>
        </div>

        <!-- Tanggal Pembayaran -->
        <div>
            <label class="block font-semibold text-gray-700 mb-1">Tanggal Pembayaran</label>
            <input type="date" name="tanggal" required
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    </form>

    <!-- Tombol Aksi -->
    <div class="mt-6 flex justify-end space-x-3">
        <a href="{{ route('muzakki.index') }}"
           class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Batal</a>
        <button type="submit" form="form" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700">
            Simpan
        </button>
    </div>
</div>
@endsection

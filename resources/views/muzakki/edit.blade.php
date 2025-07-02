@extends('layouts.app')

@section('title', 'Edit Data Muzakki')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-6xl mx-auto">
   

    <form method="POST" action="{{ route('muzakki.update', $muzakki->id) }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ old('nama', $muzakki->nama) }}" required
                   class="w-full mt-1 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Masukkan nama lengkap">
        </div>

        <!-- Telepon -->
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
            <input type="text" name="telepon" value="{{ old('telepon', $muzakki->telepon) }}" required
                   class="w-full mt-1 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="08xxxx">
        </div>

        <!-- Jumlah Jiwa -->
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">Jumlah Jiwa</label>
            <input type="number" name="jumlah_jiwa" value="{{ old('jumlah_jiwa', $muzakki->jumlah_jiwa) }}" min="1" required
                   class="w-full mt-1 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Metode Pembayaran -->
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
            <select name="payment_method"
                    class="w-full mt-1 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="tunai" {{ $muzakki->payment_method === 'tunai' ? 'selected' : '' }}>Tunai</option>
                <option value="transfer" {{ $muzakki->payment_method === 'transfer' ? 'selected' : '' }}>Transfer</option>
            </select>
        </div>

        <!-- Cabang -->
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">Cabang Penyaluran</label>
            <input type="text" name="cabang" value="{{ old('cabang', $muzakki->cabang) }}" required
                   class="w-full mt-1 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Contoh: Masjid Al-Falah">
        </div>

        <!-- Status -->
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700">Status Pembayaran</label>
            <select name="status"
                    class="w-full mt-1 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="pending" {{ $muzakki->status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="terkonfirmasi" {{ $muzakki->status === 'terkonfirmasi' ? 'selected' : '' }}>Terkonfirmasi</option>
            </select>
        </div>

        <!-- Tanggal -->
        <div class="col-span-1 md:col-span-2">
            <label class="block text-sm font-medium text-gray-700">Tanggal Pembayaran</label>
            <input type="datetime-local" name="tanggal"
                   value="{{ old('tanggal', \Carbon\Carbon::parse($muzakki->tanggal_pembayaran)->format('Y-m-d\TH:i')) }}"
                   class="w-full mt-1 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Tombol -->
        <div class="col-span-1 md:col-span-2 text-right">
            <a href="{{ route('muzakki.index') }}"
               class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 mr-2">
               Batal
            </a>
            <button type="submit"
                    class="inline-block px-4 py-2 bg-blue-600 text-white font-bold rounded hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>
@endsection

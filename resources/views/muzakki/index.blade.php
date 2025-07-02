@extends('layouts.app')

@section('title', 'Daftar Muzakki')

@section('content')
<div class="bg-white rounded shadow p-6 max-w-6xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Daftar Pembayar Zakat Fitrah</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-sm border border-gray-200 rounded-lg shadow-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border text-left">Nama</th>
                    <th class="px-4 py-2 border text-left">Telepon</th>
                    <th class="px-4 py-2 border text-center">Jiwa</th>
                    <th class="px-4 py-2 border text-right">Zakat (Rp)</th>
                    <th class="px-4 py-2 border text-center">Metode</th>
                    <th class="px-4 py-2 border text-left">Cabang</th>
                    <th class="px-4 py-2 border text-center">Tanggal</th>
                    <th class="px-4 py-2 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($muzakkis as $index => $muzakki)
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $muzakki->nama }}</td>
                        <td class="px-4 py-2 border">{{ $muzakki->telepon }}</td>
                        <td class="px-4 py-2 border text-center">{{ $muzakki->jumlah_jiwa }}</td>
                        <td class="px-4 py-2 border text-right">Rp {{ number_format($muzakki->jumlah_zakat, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 border text-center capitalize">{{ $muzakki->payment_method }}</td>
                        <td class="px-4 py-2 border">{{ $muzakki->cabang }}</td>
                        <td class="px-4 py-2 border text-center">{{ \Carbon\Carbon::parse($muzakki->tanggal_pembayaran)->format('d-m-Y H:i') }}</td>
                        <td class="px-4 py-2 border text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('muzakki.edit', $muzakki->id) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-xs font-semibold transition">
                                    Edit
                                </a>
                                <form action="{{ route('muzakki.destroy', $muzakki->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-xs font-semibold transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-6 text-gray-500">Belum ada data muzakki.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('title', 'Detail Pengaduan')
@section('content')

<div id="detail-content">
    <div class="space-y-6">
        <!-- Info Grid -->
        <div class="grid grid-cols-2 gap-6">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">Tanggal</p>
                <p class="text-gray-900 font-semibold">{{ $pengaduan->created_at->format('d/m/Y') }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">Waktu</p>
                <p class="text-gray-900 font-semibold">{{ $pengaduan->created_at->format('H:i') }}</p>
            </div>
        </div>

        <div>
            <p class="text-sm text-gray-500 font-medium mb-1">Pelapor</p>
            <p class="text-gray-900 font-semibold text-lg">{{ $pengaduan->nama }}</p>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">Email</p>
                <p class="text-gray-900">{{ $pengaduan->email }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">Telepon</p>
                <p class="text-gray-900">{{ $pengaduan->telepon }}</p>
            </div>
        </div>

        <div>
            <p class="text-sm text-gray-500 font-medium mb-2">Kategori</p>
            <span class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-lg font-semibold">
                {{ $pengaduan->kategori }}
            </span>
        </div>

        <div>
            <p class="text-sm text-gray-500 font-medium mb-1">Judul</p>
            <p class="text-gray-900 font-semibold text-lg">{{ $pengaduan->judul }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500 font-medium mb-1">Lokasi</p>
            <p class="text-gray-900">{{ $pengaduan->lokasi }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500 font-medium mb-1">Deskripsi</p>
            <p class="text-gray-700 leading-relaxed">{{ $pengaduan->deskripsi }}</p>
        </div>

        <!-- Update Status -->
        <div class="pt-6 border-t border-gray-200">
            <p class="text-sm text-gray-700 font-semibold mb-3">Update Status</p>
            <div class="grid grid-cols-3 gap-3">
                <form action="{{ route('admin.pengaduan.updateStatus', $pengaduan->id) }}" method="POST">
                    @csrf @method('PUT')
                    <input type="hidden" name="status" value="diterima">
                    <button type="submit" class="w-full py-3 rounded-lg font-semibold transition {{ $pengaduan->status === 'diterima' ? 'bg-blue-600 text-white shadow-lg' : 'bg-blue-100 text-blue-700 hover:bg-blue-200' }}">
                        Diterima
                    </button>
                </form>
                <form action="{{ route('admin.pengaduan.updateStatus', $pengaduan->id) }}" method="POST">
                    @csrf @method('PUT')
                    <input type="hidden" name="status" value="diproses">
                    <button type="submit" class="w-full py-3 rounded-lg font-semibold transition {{ $pengaduan->status === 'diproses' ? 'bg-yellow-600 text-white shadow-lg' : 'bg-yellow-100 text-yellow-700 hover:bg-yellow-200' }}">
                        Diproses
                    </button>
                </form>
                <form action="{{ route('admin.pengaduan.updateStatus', $pengaduan->id) }}" method="POST">
                    @csrf @method('PUT')
                    <input type="hidden" name="status" value="selesai">
                    <button type="submit" class="w-full py-3 rounded-lg font-semibold transition {{ $pengaduan->status === 'selesai' ? 'bg-green-600 text-white shadow-lg' : 'bg-green-100 text-green-700 hover:bg-green-200' }}">
                        Selesai
                    </button>
                </form>
            </div>
        </div>

        <!-- Delete Button -->
        <div class="pt-4 border-t border-gray-200">
            <form action="{{ route('admin.pengaduan.destroy', $pengaduan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?')">
                @csrf @method('DELETE')
                <button type="submit" class="w-full py-3 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition shadow-lg">
                    Hapus Pengaduan
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
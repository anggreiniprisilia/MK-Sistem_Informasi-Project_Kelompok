@extends('layouts.app')
@section('title', 'Form Pengaduan')
@section('content')

<!-- Header -->
<div class="bg-white border-b sticky top-0 z-10">
    <div class="max-w-6xl mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <svg class="w-10 h-10 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">SIPMAS</h1>
                    <p class="text-sm text-gray-500">Sistem Informasi Pengaduan Masyarakat</p>
                </div>
            </div>
            <a href="{{ route('login') }}" class="flex items-center space-x-2 px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                </svg>
                <span>Login Admin</span>
            </a>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-6xl mx-auto px-6 py-10">
    <!-- Success Alert -->
    @if(session('success'))
    <div id="success-alert" class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg shadow-sm">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <p class="text-green-800 font-medium">{{ session('success') }}</p>
        </div>
    </div>
    @endif

    <!-- Error Alert -->
    @if($errors->any())
    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg shadow-sm">
        <div class="flex">
            <svg class="w-5 h-5 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
            </svg>
            <div>
                <p class="text-red-800 font-medium mb-2">Terdapat kesalahan:</p>
                <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- LEFT: Form Card -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
                <div class="px-8 py-6 bg-gradient-to-r from-indigo-50 to-purple-50 border-b">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Formulir Pengaduan</h2>
                    <p class="text-gray-600">Laporkan masalah lingkungan atau layanan umum di sekitar Anda</p>
                </div>

                <form action="{{ route('pengaduan.store') }}" method="POST" class="px-8 py-8">
                    @csrf
                    
                    <!-- Nama & Email -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama" value="{{ old('nama') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                                placeholder="Masukkan nama lengkap">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                                placeholder="nama@email.com">
                        </div>
                    </div>

                    <!-- Telepon & Kategori -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                No. Telepon <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" name="telepon" value="{{ old('telepon') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                                placeholder="08xxxxxxxxxx">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <select name="kategori" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition appearance-none bg-white">
                                <option value="">Pilih Kategori</option>
                                <option value="Jalan Rusak" {{ old('kategori') == 'Jalan Rusak' ? 'selected' : '' }}>Jalan Rusak</option>
                                <option value="Sampah" {{ old('kategori') == 'Sampah' ? 'selected' : '' }}>Sampah</option>
                                <option value="Lampu Jalan" {{ old('kategori') == 'Lampu Jalan' ? 'selected' : '' }}>Lampu Jalan</option>
                                <option value="Air Bersih" {{ old('kategori') == 'Air Bersih' ? 'selected' : '' }}>Air Bersih</option>
                                <option value="Drainase" {{ old('kategori') == 'Drainase' ? 'selected' : '' }}>Drainase</option>
                                <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <!-- Judul -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Judul Pengaduan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="judul" value="{{ old('judul') }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            placeholder="Ringkasan singkat masalah">
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Lokasi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="lokasi" value="{{ old('lokasi') }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            placeholder="Jl. Contoh No. 123, Kelurahan...">
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-8">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Deskripsi Masalah <span class="text-red-500">*</span>
                        </label>
                        <textarea name="deskripsi" rows="5" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition resize-none"
                            placeholder="Jelaskan masalah secara detail...">{{ old('deskripsi') }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-4 rounded-lg font-semibold hover:bg-indigo-700 transition shadow-lg hover:shadow-xl">
                        Kirim Pengaduan
                    </button>
                </form>
            </div>
        </div>

        <!-- RIGHT: Tracking Pengaduan -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden sticky top-24">
                <div class="px-6 py-5 bg-gradient-to-r from-green-50 to-blue-50 border-b">
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-800">Progress Pengaduan</h3>
                    </div>
                    <p class="text-sm text-gray-600 mt-1">Pantau status pengaduan masyarakat</p>
                </div>

                <div class="px-6 py-4 max-h-[600px] overflow-y-auto">
                    @if($pengaduans->count() == 0)
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-gray-500 text-sm">Belum ada pengaduan</p>
                    </div>
                    @else
                    <div class="space-y-4">
                        @foreach($pengaduans as $item)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                            <!-- Tanggal & Status -->
                            <div class="flex items-start justify-between mb-3">
                                <span class="text-xs text-gray-500 font-medium">
                                    {{ $item->created_at->format('d/m/Y') }}
                                </span>
                                @if($item->status == 'diterima')
                                <span class="inline-flex items-center px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                    </svg>
                                    Diterima
                                </span>
                                @elseif($item->status == 'diproses')
                                <span class="inline-flex items-center px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-semibold">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Diproses
                                </span>
                                @else
                                <span class="inline-flex items-center px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Selesai
                                </span>
                                @endif
                            </div>

                            <!-- Kategori -->
                            <span class="inline-block px-2.5 py-1 bg-indigo-100 text-indigo-700 rounded-md text-xs font-semibold mb-2">
                                {{ $item->kategori }}
                            </span>

                            <!-- Judul -->
                            <h4 class="font-semibold text-gray-800 text-sm mb-2 line-clamp-2">
                                {{ $item->judul }}
                            </h4>

                            <!-- Lokasi -->
                            <p class="text-xs text-gray-600 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ Str::limit($item->lokasi, 35) }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
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
<div class="max-w-4xl mx-auto px-6 py-10">
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

    <!-- Form Card -->
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

@endsection
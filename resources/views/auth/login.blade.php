@extends('layouts.app')
@section('title', 'Login Admin')
@section('content')

<div class="min-h-screen flex items-center justify-center px-4 py-12 bg-gradient-to-br from-indigo-100 via-purple-50 to-pink-100">
    <div class="w-full max-w-md">
        <!-- Logo & Title -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-indigo-600 rounded-2xl mb-4 shadow-lg">
                <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Login Admin</h1>
            <p class="text-gray-600">Sistem Informasi Pengaduan Masyarakat</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-2xl p-8 border border-gray-100">
            @if($errors->any())
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                <p class="text-red-800 text-sm font-medium">{{ $errors->first() }}</p>
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Username -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                    <input type="text" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="admin">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="••••••••">
                </div>

                <!-- Login Button -->
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-3.5 rounded-lg font-semibold hover:bg-indigo-700 transition shadow-lg hover:shadow-xl">
                    Login
                </button>

                <!-- Back Button -->
                <a href="{{ route('pengaduan.index') }}"
                    class="block w-full text-center bg-gray-100 text-gray-700 py-3.5 rounded-lg font-semibold hover:bg-gray-200 transition">
                    Kembali
                </a>
            </form>

            <!-- Demo Credentials -->
            <div class="mt-6 p-4 bg-indigo-50 rounded-lg border border-indigo-100">
                <p class="text-sm font-semibold text-indigo-900 mb-1">Demo Credentials:</p>
                <p class="text-sm text-indigo-700">Username: admin</p>
                <p class="text-sm text-indigo-700">Password: admin123</p>
            </div>
        </div>
    </div>
</div>

@endsection
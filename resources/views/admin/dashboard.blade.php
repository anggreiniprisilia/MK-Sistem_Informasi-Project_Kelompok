@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')

<!-- Header -->
<div class="bg-white border-b sticky top-0 z-10 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <svg class="w-10 h-10 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">SIPMAS - Dashboard Admin</h1>
                    <p class="text-sm text-gray-500">Sistem Informasi Pengaduan Masyarakat</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center space-x-2 px-5 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-medium shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-7xl mx-auto px-6 py-8">
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

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Laporan -->
        <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100 hover:shadow-lg transition">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-indigo-100 rounded-lg">
                    <svg class="w-8 h-8 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <span class="text-4xl font-bold text-gray-800">{{ $stats['total'] }}</span>
            </div>
            <p class="text-gray-600 font-semibold">Total Laporan</p>
        </div>

        <!-- Diterima -->
        <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100 hover:shadow-lg transition">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <span class="text-4xl font-bold text-gray-800">{{ $stats['diterima'] }}</span>
            </div>
            <p class="text-gray-600 font-semibold">Diterima</p>
        </div>

        <!-- Diproses -->
        <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100 hover:shadow-lg transition">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-yellow-100 rounded-lg">
                    <svg class="w-8 h-8 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <span class="text-4xl font-bold text-gray-800">{{ $stats['diproses'] }}</span>
            </div>
            <p class="text-gray-600 font-semibold">Diproses</p>
        </div>

        <!-- Selesai -->
        <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100 hover:shadow-lg transition">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-green-100 rounded-lg">
                    <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <span class="text-4xl font-bold text-gray-800">{{ $stats['selesai'] }}</span>
            </div>
            <p class="text-gray-600 font-semibold">Selesai</p>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-200 bg-gray-50">
            <h2 class="text-xl font-bold text-gray-800">Daftar Pengaduan</h2>
        </div>

        @if($pengaduans->count() == 0)
        <div class="p-16 text-center">
            <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <p class="text-gray-500 text-lg font-medium">Belum ada pengaduan masuk</p>
        </div>
        @else
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Pelapor</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($pengaduans as $p)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $p->created_at->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $p->nama }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-xs font-semibold">
                                {{ $p->kategori }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ Str::limit($p->judul, 35) }}</td>
                        <td class="px-6 py-4">
                            @if($p->status == 'diterima')
                            <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                </svg>
                                Diterima
                            </span>
                            @elseif($p->status == 'diproses')
                            <span class="inline-flex items-center px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-semibold">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                Diproses
                            </span>
                            @else
                            <span class="inline-flex items-center px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Selesai
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <button onclick="openModal({{ $p->id }})" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Detail
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
            {{ $pengaduans->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Modal Detail (akan dibuka dengan JavaScript) -->
<div id="detailModal" class="hidden fixed inset-0 z-50 overflow-y-auto modal-overlay">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full transform transition-all">
            <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between">
                <h3 class="text-2xl font-bold text-gray-800" id="modalTitle">Detail Pengaduan</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="modalContent" class="px-6 py-6">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>
</div>

<script>
function openModal(id) {
    document.getElementById('detailModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    
    // Load detail via AJAX
    fetch(`/admin/pengaduan/${id}`)
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const content = doc.querySelector('#detail-content');
            if (content) {
                document.getElementById('modalContent').innerHTML = content.innerHTML;
            }
        });
}

function closeModal() {
    document.getElementById('detailModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}
</script>

@endsection
<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller
{
    public function index()
    {
        return view('pengaduan.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'kategori' => 'required|string',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
        ], [
            'nama.required' => 'Nama lengkap wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'telepon.required' => 'Nomor telepon wajib diisi',
            'kategori.required' => 'Kategori wajib dipilih',
            'judul.required' => 'Judul pengaduan wajib diisi',
            'deskripsi.required' => 'Deskripsi masalah wajib diisi',
            'lokasi.required' => 'Lokasi wajib diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Pengaduan::create($request->all());

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil dikirim! Terima kasih atas laporan Anda.');
    }
}
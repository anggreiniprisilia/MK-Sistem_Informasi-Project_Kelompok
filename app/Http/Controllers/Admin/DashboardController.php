<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stats = [
            'total' => Pengaduan::count(),
            'diterima' => Pengaduan::where('status', 'diterima')->count(),
            'diproses' => Pengaduan::where('status', 'diproses')->count(),
            'selesai' => Pengaduan::where('status', 'selesai')->count(),
        ];

        $pengaduans = Pengaduan::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.dashboard', compact('stats', 'pengaduans'));
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.detail', compact('pengaduan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,diproses,selesai'
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update(['status' => $request->status]);

        return redirect()->back()
            ->with('success', 'Status pengaduan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Pengaduan berhasil dihapus');
    }
}
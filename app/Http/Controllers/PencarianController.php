<?php
namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class PencarianController extends Controller
{
    public function index(Request $request)
    {
        // Validasi input
        $request->validate([
            'keyword' => 'nullable|string|max:255',
            'sort_by' => 'nullable|string',
            'sort_order' => 'nullable|in:asc,desc',
        ]);

        // Ambil filter dari request
        $keyword = $request->get('keyword');
        $sortBy = $request->get('sort_by', 'kry_id'); // Default sort
        $sortOrder = $request->get('sort_order', 'asc'); // Default order

        // Query data karyawan dengan filter keyword dan paginasi
        $karyawan = Karyawan::query()
            ->with(['jabatanUtama', 'jabatanSekunder', 'golongan']) // Eager loading relasi
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('kry_id', 'like', "%{$keyword}%") // Cari berdasarkan NPK
                      ->orWhere('kry_nama_depan', 'like', "%{$keyword}%") // Cari berdasarkan nama depan
                      ->orWhere('kry_nama_blkg', 'like', "%{$keyword}%"); // Cari berdasarkan nama belakang
            })
            ->orderBy($sortBy, $sortOrder)
            ->paginate(10);

        // Tampilkan view
        return view('pencarian', compact('karyawan', 'keyword', 'sortBy', 'sortOrder'));
    }
}

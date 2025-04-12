<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StokObat;
use Illuminate\Http\Request;

class StokObatController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $stokObats = StokObat::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('nama_obat', 'like', "%$query%");
            })
            ->orderBy('nama_obat', 'asc') // Urutkan berdasarkan nama obat
            ->get();

        return view('admin.stok-obat', compact('stokObats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'jenis_obat' => 'required|in:kapsul,tablet,sirup',
            'takaran' => 'required|integer|min:1',
        ]);

        StokObat::create($request->all());

        return redirect()->back()->with('success', 'Stok obat berhasil ditambahkan!');
    }

    public function update(Request $request, StokObat $stokObat)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'jenis_obat' => 'required|in:kapsul,tablet,sirup',
            'takaran' => 'required|integer|min:1',
        ]);

        $stokObat->update($request->all());

        return redirect()->back()->with('success', 'Stok obat berhasil diperbarui!');
    }

    public function destroy(StokObat $stokObat)
    {
        $stokObat->delete();
        return redirect()->back()->with('success', 'Stok obat berhasil dihapus!');
    }
}

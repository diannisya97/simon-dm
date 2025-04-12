<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CatatanKesehatan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DataPasienController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $users = User::where('role', 0)
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', "%$query%");
            })
            ->get()
            ->map(function ($user) {
                $user->umur = Carbon::parse($user->tanggal_lahir)->age;
                $user->nama_singkat = Str::limit($user->name, 6, '..');
                $user->alamat_singkat = Str::limit($user->alamat, 8, '..');
                return $user;
            });

        $petugas = Auth::user();

        return view('admin.data-pasien', compact('users', 'petugas'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $catatanKesehatan = CatatanKesehatan::where('user_id', $id)
            ->latest()
            ->first();

        return view('admin.detail', compact('user', 'catatanKesehatan'));
    }
}

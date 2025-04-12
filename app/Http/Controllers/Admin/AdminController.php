<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CatatanKesehatan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $petugas = Auth::user();

        return view('admin.admin', compact('petugas'));
    }

    public function listUsers()
    {
        $users = User::select('id', 'name', 'role', 'tanggal_lahir')
                     ->where('role', '!=', 1) // Sembunyikan admin
                     ->get();

        foreach ($users as $user) {
            // Ambil catatan kesehatan terbaru user
            $catatanKesehatan = CatatanKesehatan::where('user_id', $user->id)->latest()->first();
            $gulaDarah = $catatanKesehatan ? $catatanKesehatan->gula : null;
    
            // Tentukan status diabetes
            if ($gulaDarah === null) {
                $user->statusDiabetes = 'Data Gula Tidak Tersedia';
            } elseif ($gulaDarah < 140) {
                $user->statusDiabetes = 'Non Diabetes';
            } elseif ($gulaDarah < 200) {
                $user->statusDiabetes = 'Waspada';
            } else {
                $user->statusDiabetes = 'Diabetes';
            }
        }

        return view('admin.users', compact('users'));
    }
    
    
    public function updateUserRole($id, Request $request)
    {
        $user = User::findOrFail($id);

        if ($request->role == 0) {
            $user->role = 0; // Set role ke user (terverifikasi)
            $user->save();
            return response()->json(['success' => true, 'message' => 'User berhasil diverifikasi.']);
        }

        return response()->json(['success' => false, 'message' => 'Aksi tidak valid.']);
    }



    // public function show($id)
    // {
    //     $user = User::findOrFail($id);
    //     $catatanKesehatan = CatatanKesehatan::where('user_id', $id)
    //         ->latest()
    //         ->first();

    //     return view('admin.detail', compact('user', 'catatanKesehatan'));
    // }
}
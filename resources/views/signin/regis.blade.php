@extends('layout.app')

@section('content')

<section
    class="container-snap h-[100vh] w-[350px] m-auto overflow-hidden overflow-y-auto bg-[#0BB4A6] scale-90 bg-cover bg-center rounded-3xl flex flex-col p-5">
    <h1 class="text-2xl font-bold text-center text-black mt-3">Daftar</h1>
    <form class="mt-4 flex flex-col gap-3" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- NIK -->
        <input id="nik" type="text" name="nik"
            class="px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-black focus:ring-black block w-full rounded-md sm:text-sm focus:ring-1"
            placeholder="NIK (16 Angka)" value="{{ old('nik') }}" required>
        <x-input-error :messages="$errors->get('nik')" class="mt-2" />
        
        <!-- Nama -->    
        <input id="name" type="text" name="name"
            class="px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-black focus:ring-black block w-full rounded-md sm:text-sm focus:ring-1"
            placeholder="Nama Lengkap" value="{{ old('name') }}" required autocomplete="name">
        <x-input-error :messages="$errors->get('name')" class="mt-2" />

        <!-- Alamat -->
        <input id="alamat" type="text" name="alamat"
            class="px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-black focus:ring-black block w-full rounded-md sm:text-sm focus:ring-1"
            placeholder="Alamat" value="{{ old('alamat') }}" required>
        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />

        <!-- Tanggal Lahir -->
        <input id="tanggal_lahir" type="date" name="tanggal_lahir"
            class="px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-black focus:ring-black block w-full rounded-md sm:text-sm focus:ring-1"
            value="{{ old('tanggal_lahir') }}" required>
        <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
        
        <div class="flex flex-row gap-3">
            <!-- Tinggi Badan -->
            <input id="tinggi_badan" type="number" name="tinggi_badan"
                class="px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-black focus:ring-black block w-full rounded-md sm:text-sm focus:ring-1"
                placeholder="Tinggi Badan" value="{{ old('tinggi_badan') }}" required>
            <x-input-error :messages="$errors->get('tinggi_badan')" class="mt-2" />

            <!-- Berat Badan -->
            <input id="berat_badan" type="number" name="berat_badan"
                class="px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-black focus:ring-black block w-full rounded-md sm:text-sm focus:ring-1"
                placeholder="Berat Badan" value="{{ old('berat_badan') }}" required>
            <x-input-error :messages="$errors->get('berat_badan')" class="mt-2" />
        </div>

        <!-- Jenis Kelamin -->
        <select id="jenis_kelamin" name="jenis_kelamin"
            class="px-3 py-3 bg-white border shadow-sm border-slate-300 focus:outline-none focus:border-black focus:ring-black block w-full rounded-md sm:text-sm focus:ring-1"
            required>
            <option value="" disabled selected>Pilih Jenis Kelamin</option>
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
        </select>
        <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />

        <!-- No. Telepon -->
        <input id="no_hp" type="text" name="no_hp"
            class="px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-black focus:ring-black block w-full rounded-md sm:text-sm focus:ring-1"
            placeholder="No. Telepon (min 10 angka)" value="{{ old('no_hp') }}" required>
        <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />

        <!-- Email -->
        <input id="email" type="email" name="email"
            class="px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-black focus:ring-black block w-full rounded-md sm:text-sm focus:ring-1"
            placeholder="you@gmail.com" value="{{ old('email') }}" required autocomplete="email">
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <!-- Password -->
        <div class="relative w-full">
            <input id="password" type="password" name="password"
                class="px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-black focus:ring-black block w-full rounded-md sm:text-sm focus:ring-1 pr-10"
                placeholder="Password" required autocomplete="new-password">
            
            <span onclick="togglePassword('password', 'eyeIcon3')"
                class="absolute inset-y-0 right-3 flex items-center cursor-pointer">
                <i id="eyeIcon3" class="fas fa-eye text-gray-400"></i>
            </span>
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
            
        <!-- Konfirmasi Password -->
        <div class="relative w-full">
            <input id="password_confirmation" type="password" name="password_confirmation"
                class="px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-black focus:ring-black block w-full rounded-md sm:text-sm focus:ring-1 pr-10"
                placeholder="Ulangi Password" required autocomplete="new-password">
            
            <span onclick="togglePassword('password_confirmation', 'eyeIcon4')"
                class="absolute inset-y-0 right-3 flex items-center cursor-pointer">
                <i id="eyeIcon4" class="fas fa-eye text-gray-400"></i>
            </span>
        </div>
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    
        <!-- Button -->
        <button type="submit"
            class="bg-white px-5 py-2 rounded-md font-bold w-full text-center text-black">DAFTAR</button>
    </form>

    <p class="text-center mt-4 text-[0.8rem] font-medium text-black">Sudah punya akun?
        <a href="{{ route('login') }}" class="font-bold text-white">Login</a>
    </p>
</section>

<!-- Tambahkan FontAwesome jika belum ada -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<!-- Tambahkan Script untuk Toggle Password -->
<script>
    function togglePassword(inputId, iconId) {
        let input = document.getElementById(inputId);
        let icon = document.getElementById(iconId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>
@endsection
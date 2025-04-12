@extends('layout.app')

@section('content')
<section
    class="h-[730px] w-[350px] m-auto overflow-hidden bg-white bg-cover bg-center rounded-3xl flex flex-col items-center p-7 gap-y-3 container-snap overflow-y-auto scale-90">

    <div class="absolute top-0 bg-[#0BB4A6] w-full px-7 py-[18px] flex flex-row items-center justify-between">
        <a href="{{ route('admin.data-pasien') }}">
            <svg width="13" height="17" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.49896 10.525L11.6722 3.35177C11.9664 3.05752 12.1212 2.70332 12.1204 2.29949C12.1196 1.89648 11.9652 1.54283 11.6727 1.24869C11.3795 0.953986 11.0231 0.796625 10.6143 0.787062C10.2014 0.777404 9.84013 0.92672 9.54363 1.22322L1.84363 8.92322C1.62092 9.14593 1.4515 9.39913 1.33829 9.68215C1.2274 9.95938 1.17041 10.2408 1.17041 10.525C1.17041 10.8092 1.2274 11.0906 1.33829 11.3678C1.4515 11.6509 1.62092 11.9041 1.84363 12.1268L1.84392 12.1271L9.54387 19.802C9.83807 20.0954 10.192 20.25 10.5954 20.25C10.9988 20.25 11.3528 20.0954 11.647 19.802C11.9401 19.5097 12.0987 19.1579 12.1083 18.756C12.1181 18.3498 11.9673 17.9933 11.6722 17.6982L4.49896 10.525Z" fill="black" stroke="black" stroke-width="0.5"/>
            </svg>                              
        </a>
        <div class="flex flex-col">
            <h1 class="text-base text-center font-bold text-black ml-2">Data Pasien</h1>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex flex-row justify-center items-center gap-2">
                <svg width="32" height="25" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9427 3.31241C12 4.17454 12 5.75166 12 8.90454V24.0955C12 27.2484 12 28.8255 12.9427 29.6877C13.8853 30.5498 15.3267 30.2913 18.2093 29.7729L21.316 29.2147C24.508 28.6399 26.104 28.3525 27.052 27.1453C28 25.9367 28 24.1904 28 20.6965V12.3035C28 8.81104 28 7.06479 27.0533 5.85616C26.104 4.64891 24.5067 4.36154 21.3147 3.78816L18.2107 3.22854C15.328 2.71016 13.8867 2.45166 12.944 3.31379M16 13.9824C16.552 13.9824 17 14.465 17 15.0604V17.9397C17 18.535 16.552 19.0177 16 19.0177C15.448 19.0177 15 18.535 15 17.9397V15.0604C15 14.465 15.448 13.9824 16 13.9824Z" fill="black"/>
                    <path d="M10.0627 6.1875C7.31867 6.19162 5.888 6.2535 4.976 7.194C4 8.2005 4 9.82025 4 13.0625V19.9375C4 23.1784 4 24.7981 4.976 25.806C5.888 26.7451 7.31867 26.8084 10.0627 26.8125C10 25.9545 10 24.9645 10 23.8934V9.10663C10 8.03413 10 7.04413 10.0627 6.1875Z" fill="black"/>
                    </svg>
            </button>
        </form>  
    </div>

    <!-- Foto Profil di Tengah Atas -->
    <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('assets/user.svg') }}" alt="User Profile"
        class="rounded-full h-[80px] w-[80px] object-cover mt-14">

    <!-- Data Pengguna -->
    <div class="flex flex-col gap-y-3 w-full text-black font-semibold">
        <div class="px-3 py-2 bg-gray-200 border-2 shadow-sm border-gray-500 block w-full rounded-md sm:text-xs focus:ring-1 text-center">
            Nama: {{ $user->name }}
        </div>
        <div class="px-3 py-2 bg-gray-200 border-2 shadow-sm border-gray-500 block w-full rounded-md sm:text-xs focus:ring-1 text-center">
            Alamat: {{ $user->alamat }}
        </div>
        <div class="px-3 py-2 bg-gray-200 border-2 shadow-sm border-gray-500 block w-full rounded-md sm:text-xs focus:ring-1 text-center">
            Tinggi Badan: {{ $user->tinggi_badan }} cm
        </div>
        <div class="px-3 py-2 bg-gray-200 border-2 shadow-sm border-gray-500 block w-full rounded-md sm:text-xs focus:ring-1 text-center">
            Berat Badan: {{ $user->berat_badan }} kg
        </div>
        <div class="px-3 py-2 bg-gray-200 border-2 shadow-sm border-gray-500 block w-full rounded-md sm:text-xs focus:ring-1 text-center">
            Umur: {{ \Carbon\Carbon::parse($user->tanggal_lahir)->age }} Tahun
        </div>
        <div class="px-3 py-2 bg-gray-200 border-2 shadow-sm border-gray-500 block w-full rounded-md sm:text-xs focus:ring-1 text-center">
            Jenis Kelamin: {{ $user->jenis_kelamin }}
        </div>
        <div class="px-3 py-2 bg-gray-200 border-2 shadow-sm border-gray-500 block w-full rounded-md sm:text-xs focus:ring-1 text-center">
            No. HP: {{ $user->no_hp }}
        </div>
        <div class="px-3 py-2 bg-gray-200 border-2 shadow-sm border-gray-500 block w-full rounded-md sm:text-xs focus:ring-1 text-center">
            Email: {{ $user->email }}
        </div>

        <!-- Informasi Tambahan Kesehatan -->
        <div class="px-3 py-2 bg-gray-200 border-2 shadow-sm border-gray-500 block w-full rounded-md sm:text-xs focus:ring-1 text-center">
            <p>Kategori Diabetes:
                @php
                $gula = $catatanKesehatan->gula ?? 0;
                $kategoriDiabetes = '';
                $borderColor = '';

                if ($gula < 140) { $kategoriDiabetes='Non Diabetes' ; $borderColor='text-green-500' ; } elseif ($gula <
                    200) { $kategoriDiabetes='Waspada' ; $borderColor='text-yellow-400' ; } else {
                    $kategoriDiabetes='Diabetes' ; $borderColor='text-red-500' ; } @endphp <span
                    class="{{ $borderColor }}">{{ $kategoriDiabetes }}</span>
            </p>
            <p>Gula Darah: {{ $gula }} mg/dL</p>
        </div>

        <div class="px-3 py-2 bg-gray-200 border-2 shadow-sm border-gray-500 block w-full rounded-md sm:text-xs focus:ring-1 text-center">
            <p>Berat Badan Ideal:
                @php
                $tinggiM = ($user->tinggi_badan ?? 1) / 100; // Pastikan tinggi tidak 0
                $jenisKelamin = $user->jenis_kelamin;
                $beratIdeal = $jenisKelamin === 'Pria' ? ($tinggiM * 100) - 100 : ($tinggiM * 100) - 105;
                $statusBerat = '';

                if ($user->berat_badan < $beratIdeal - 5) { $statusBerat='Kurang' ; $weightColor='text-yellow-500' ; }
                    elseif ($user->berat_badan > $beratIdeal + 5) {
                    $statusBerat = 'Berlebih';
                    $weightColor = 'text-red-500';
                    } else {
                    $statusBerat = 'Ideal';
                    $weightColor = 'text-green-500';
                    }
                    @endphp
                    {{ number_format($beratIdeal) }} KG - <span class="{{ $weightColor }}">{{ $statusBerat }}</span>
            </p>
        </div>
    </div>

    <!-- Tombol Kembali -->
    <a href="{{ route('admin.data-pasien') }}"
        class="bg-[#0BB4A6] px-5 py-3 text-xs rounded-md font-bold w-full text-center text-white">Kembali</a>
</section>
@endsection
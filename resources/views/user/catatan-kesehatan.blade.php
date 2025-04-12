@extends('layout.app')
@section('content')
<section
    class="h-[730px] w-[350px] m-auto overflow-hidden bg-slate-100 bg-cover bg-center rounded-3xl flex flex-col items-center p-7 container-snap overflow-y-auto scale-90">

    <div class="absolute top-0 bg-[#0BB4A6] w-full px-7 py-[18px] flex flex-row items-center justify-between">
        <a href="{{route('dashboard')}}">
            <svg width="13" height="17" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.49896 10.525L11.6722 3.35177C11.9664 3.05752 12.1212 2.70332 12.1204 2.29949C12.1196 1.89648 11.9652 1.54283 11.6727 1.24869C11.3795 0.953986 11.0231 0.796625 10.6143 0.787062C10.2014 0.777404 9.84013 0.92672 9.54363 1.22322L1.84363 8.92322C1.62092 9.14593 1.4515 9.39913 1.33829 9.68215C1.2274 9.95938 1.17041 10.2408 1.17041 10.525C1.17041 10.8092 1.2274 11.0906 1.33829 11.3678C1.4515 11.6509 1.62092 11.9041 1.84363 12.1268L1.84392 12.1271L9.54387 19.802C9.83807 20.0954 10.192 20.25 10.5954 20.25C10.9988 20.25 11.3528 20.0954 11.647 19.802C11.9401 19.5097 12.0987 19.1579 12.1083 18.756C12.1181 18.3498 11.9673 17.9933 11.6722 17.6982L4.49896 10.525Z" fill="black" stroke="black" stroke-width="0.5"/>
            </svg>                              
        </a>
        <div class="flex flex-col">
            <h1 class="text-base text-center font-bold text-black ml-2">Rekam Kesehatan</h1>
        </div>
        <form method="POST" action="{{ route('logout') }}" onsubmit="resetPopupOnLogout()">
            @csrf
            <button type="submit" class="flex flex-row justify-center items-center gap-2">
                <svg width="32" height="25" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
            
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9427 3.31241C12 4.17454 12 5.75166 12 8.90454V24.0955C12 27.2484 12 28.8255 12.9427 29.6877C13.8853 30.5498 15.3267 30.2913 18.2093 29.7729L21.316 29.2147C24.508 28.6399 26.104 28.3525 27.052 27.1453C28 25.9367 28 24.1904 28 20.6965V12.3035C28 8.81104 28 7.06479 27.0533 5.85616C26.104 4.64891 24.5067 4.36154 21.3147 3.78816L18.2107 3.22854C15.328 2.71016 13.8867 2.45166 12.944 3.31379M16 13.9824C16.552 13.9824 17 14.465 17 15.0604V17.9397C17 18.535 16.552 19.0177 16 19.0177C15.448 19.0177 15 18.535 15 17.9397V15.0604C15 14.465 15.448 13.9824 16 13.9824Z" fill="black"/>
                    <path d="M10.0627 6.1875C7.31867 6.19162 5.888 6.2535 4.976 7.194C4 8.2005 4 9.82025 4 13.0625V19.9375C4 23.1784 4 24.7981 4.976 25.806C5.888 26.7451 7.31867 26.8084 10.0627 26.8125C10 25.9545 10 24.9645 10 23.8934V9.10663C10 8.03413 10 7.04413 10.0627 6.1875Z" fill="black"/>
                    </svg>
            </button>
        </form>          
    </div>

    <div class="flex flex-row justify-center items-center gap-2 mt-10">
        @if ($catatanKesehatan)
        
        <!-- Jika catatan kesehatan sudah ada, tampilkan tombol Edit -->
        <!-- ADD -->
        <div class="flex flex-col justify-center items-center">
            <a href="#" id="addKesehatan" class="p-2 mt-2 bg-[#0BB4A6] rounded-lg">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_41_296)">
                        <path d="M1.3335 8.19522H14.6668M8.00016 1.52856V14.8619" stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_41_296"><rect width="16" height="16" fill="white"/></clipPath>
                    </defs>
                </svg>                
            </a>

            <p id="errorMessage" class="text-red-500 mt-2 text-center text-xs hidden">Anda hanya bisa rekam <br>kesehatan sekali dalam sehari.</p>
        </div>


        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let canAddNewData = @json($canAddNewData);
                let addButton = document.getElementById("addKesehatan");
                let errorMessage = document.getElementById("errorMessage");
        
                addButton.addEventListener("click", function (event) {
                    if (!canAddNewData) {
                        event.preventDefault(); // Mencegah fungsi asli berjalan
                        errorMessage.classList.remove("hidden"); // Tampilkan pesan
                    } else {
                        openModal(); // Jalankan fungsi jika bisa tambah data
                    }
                });
            });
        </script>

        <!-- EDIT -->
        {{-- <a href="#" class="p-2 mt-2 bg-[#0BB4A6] rounded-lg" onclick="openModal()">
            <svg width="19" height="16" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.1665 2.52846H3.99984C3.11578 2.52846 2.26799 2.87964 1.64286 3.50477C1.01775 4.12989 0.666504 4.97773 0.666504 5.86179V14.1951C0.666504 15.0792 1.01775 15.927 1.64286 16.5521C2.26799 17.1773 3.11578 17.5285 3.99984 17.5285H13.1665C15.0082 17.5285 15.6665 16.0285 15.6665 14.1951V10.0285M16.7332 4.5285L8.78325 12.4785C7.99158 13.2701 5.64156 13.6368 5.11656 13.1118C4.59156 12.5868 4.94989 10.2368 5.74156 9.44512L13.6999 1.48681C13.8962 1.27269 14.1337 1.10057 14.3984 0.980825C14.663 0.861075 14.9492 0.796158 15.2396 0.790042C15.5299 0.783933 15.8186 0.836717 16.088 0.945225C16.3574 1.05373 16.6021 1.21573 16.8072 1.4214C17.0122 1.62707 17.1736 1.87215 17.2813 2.14187C17.3891 2.41159 17.4412 2.70034 17.4342 2.99072C17.4273 3.28109 17.3616 3.56708 17.2412 3.83137C17.1207 4.09567 16.9479 4.33282 16.7332 4.5285Z"
                    stroke="#ffff" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a> --}}

        @else
    </div>
    <div class="flex flex-col justify-center items-center gap-2 w-full mt-4">
        <!-- Jika catatan kesehatan belum ada, tampilkan tombol Tambah -->
        <div class="flex flex-row items-center justify-center bg-[#0BB4A6] w-full py-3 rounded-xl">
            <h5 class="font-semibold text-[0.65rem] text-center">"Catat tekanan darah, kadar gula dan IMT<br>pantau kesehatan setiap hari!"</h5>
        </div>

        <!-- ADD -->
        <a href="#" class="p-2 mt-2 bg-[#0BB4A6] rounded-lg" onclick="openModal()">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_41_296)">
                    <path d="M1.3335 8.19522H14.6668M8.00016 1.52856V14.8619" stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <clipPath id="clip0_41_296"><rect width="16" height="16" fill="white"/></clipPath>
                </defs>
            </svg>                
        </a>
        @endif
    </div>

    <div class="flex flex-col mt-2 w-full gap-y-4">
        @if ($catatanKesehatan)
        <h1 class="text-center font-semibold text-sm">
            Data ini per tanggal
            <span class="text-[#0BB4A6]">
                {{ $catatanKesehatan->created_at->translatedFormat('d F Y') }}
            </span>
        </h1>
        <div class="flex flex-col gap-5">
            <div class="p-5 bg-white flex flex-row gap-3 h-[8rem] items-center justify-center w-full rounded-xl">
                <svg class="w-16 scale-110" width="42" height="54" viewBox="0 0 42 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.9417 34.4255H9.48267V39.2532H18.9417V34.4255Z" fill="#D0CFCE"/>
                    <path d="M1.79639 9.44604H27.0622V22.0744C27.0622 25.9423 24.5144 29.0779 21.3714 29.0779H19.9922C16.8291 29.6501 16.9604 34.4258 16.9604 34.4258H11.2404C11.2404 34.4258 11.3718 29.6501 8.20864 29.0779H7.48718C4.34421 29.0779 1.79639 25.9424 1.79639 22.0744V9.44604Z" fill="#D22F27"/>
                    <path d="M37.2547 10.6665H38.688C39.7497 10.6665 40.6104 11.5272 40.6104 12.589V20.4413C40.6104 21.5031 39.7497 22.3638 38.688 22.3638H37.2547C36.193 22.3638 35.3323 21.5031 35.3323 20.4413V12.589C35.3323 11.5272 36.193 10.6665 37.2547 10.6665Z" fill="#D22F27"/>
                    <path d="M17.9726 21.096C18.0952 23.0529 16.6081 24.7387 14.6511 24.8613C12.6942 24.9839 11.0084 23.4968 10.8858 21.5399C10.8765 21.3907 10.8765 21.241 10.8861 21.0919C10.8861 21.0919 10.8473 18.5569 13.8371 13.972C13.8371 13.972 14.3981 13.0206 14.9628 13.9095C17.9524 18.4943 17.9726 21.096 17.9726 21.096Z" fill="#EA5A47"/>
                    <path d="M14.429 13.5304C16.71 15.3686 17.9501 20.772 17.9501 20.772C17.9501 23.4299 16.3859 24.8692 14.429 24.8692C14.429 24.8692 18.3266 21.6579 14.429 13.5304Z" fill="#D22F27"/>
                    <path d="M14.2124 40.4297V44.4033C14.2044 47.9772 16.7543 51.0451 20.2694 51.6905C22.8567 52.2138 25.5344 52.0722 28.052 51.2791C31.432 50.1133 33.4523 46.652 32.8052 43.1356C32.6689 42.4219 32.593 41.6979 32.5786 40.9715C32.5945 38.2501 33.7643 35.663 35.797 33.8534C37.8006 31.9688 40.0591 29.2718 37.8557 22.3635" stroke="black" stroke-width="2.0212" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M1.79639 9.44594V7.69103C1.79639 4.54807 4.34421 2.00024 7.48718 2.00024H21.3717C24.5147 2.00014 27.0625 4.54797 27.0626 7.69093V9.48566" stroke="black" stroke-width="2.0212" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18.9417 34.4255H9.48267V39.2532H18.9417V34.4255Z" stroke="black" stroke-width="2.0212" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M37.2547 10.6665H38.688C39.7497 10.6665 40.6104 11.5272 40.6104 12.589V20.4413C40.6104 21.5031 39.7497 22.3638 38.688 22.3638H37.2547C36.193 22.3638 35.3323 21.5031 35.3323 20.4413V12.589C35.3323 11.5272 36.193 10.6665 37.2547 10.6665Z" stroke="black" stroke-width="2.0212" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M37.9712 10.6667V3.99365" stroke="black" stroke-width="2.0212" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M1.79639 9.44604H27.0622V22.0744C27.0622 25.9423 24.5144 29.0779 21.3714 29.0779H19.9922C16.8291 29.6501 16.9604 34.4258 16.9604 34.4258H11.2404C11.2404 34.4258 11.3718 29.6501 8.20864 29.0779H7.48718C4.34421 29.0779 1.79639 25.9424 1.79639 22.0744V9.44604Z" stroke="black" stroke-width="2.0212" stroke-miterlimit="10"/>
                    <path d="M17.9726 21.096C18.0952 23.0529 16.6081 24.7387 14.6511 24.8613C12.6942 24.9839 11.0084 23.4968 10.8858 21.5399C10.8765 21.3907 10.8765 21.241 10.8861 21.0919C10.8861 21.0919 10.8473 18.5569 13.8371 13.972C13.8371 13.972 14.3981 13.0206 14.9628 13.9095C17.9524 18.4943 17.9726 21.096 17.9726 21.096Z" stroke="black" stroke-width="1.5159" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                <div class="flex flex-col h-full gap-1">
                    <h1 class="text-base font-bold">Kadar Gula Darah</h1>

                    <div class="flex flex-col">
                        <h2 class="text-xs flex flex-col">
                            Kadar Gula : {{ $catatanKesehatan->gula ?? 'N/A' }} mg/dL
                        </h2>
                        <h2 class="text-xs flex flex-col">
                            Sistolik : {{ $catatanKesehatan->sistolik ?? 'N/A' }} mmHg
                        </h2>
                        <h2 class="text-xs flex flex-col">
                            Diastolik : {{ $catatanKesehatan->diastolik ?? 'N/A' }} mmHg
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-row gap-4">
            <div class="bg-white w-full flex flex-col justify-between items-center rounded-xl gap-2">
                <h1 class="text-base font-semibold text-black p-2">Diabetes</h1>

                @php
                $gula = $catatanKesehatan->gula ?? 0;
                if ($gula < 140) { $kategoriDiabetes='Non Diabetes' ; $borderColor='green-500' ; $img= asset('assets/green.svg') ; } elseif ($gula < 200)
                    { $kategoriDiabetes='Waspada' ; $borderColor='yellow-400' ; $img= asset('assets/yellow.svg') ; } else {
                    $kategoriDiabetes='Diabetes' ; $borderColor='red-500' ; $img= asset('assets/red.svg') ; } @endphp
                    <div class="h-[60px] w-[60px] flex justify-center items-center">
                        <img src="{{ $img }}" class="w-full h-full">
                    </div>
                <h1 class="text-sm text-center font-bold text-{{ $borderColor }} p-2">{{ $kategoriDiabetes }}</h1>
            </div>

            <div class="bg-white w-full flex flex-col justify-between items-center rounded-xl gap-2">
                <h1 class="text-base font-semibold text-black p-2">IMT</h1>
                <img src="{{ asset('assets/imt.png') }}" alt="" class="h-[60px]" />

                @php
                    $imt = $catatanKesehatan && $catatanKesehatan->berat && $catatanKesehatan->tinggi 
                        ? $catatanKesehatan->berat / (($catatanKesehatan->tinggi / 100) ** 2) 
                        : 0;
                        $keterangan = '';
                    if ($imt < 18.5 && $imt >= 17) {
                        $keterangan = 'Kurus';
                    } elseif ($imt >= 18.5 && $imt <= 25) {
                        $keterangan = 'Normal';
                    } elseif ($imt > 25 && $imt <= 27) {
                        $keterangan = 'Gemuk';
                    } elseif ($imt > 27) {
                        $keterangan = 'Obesitas';
                    } else {
                        $keterangan = 'None';
                    }
                @endphp
                <small class="text-xs text-center font-bold text-black p-2">{{ number_format($imt, 2) }} <br>
                    {{ $keterangan }}
                </small>
            </div>
        </div>

        <div class="flex flex-row gap-4">
            <div class="bg-white w-full flex flex-col justify-between items-center rounded-xl gap-2">
                <h1 class="text-base font-semibold text-black p-2">Berat Badan</h1>
                <img src="{{ asset('assets/berat-badan.svg') }}" alt="" class="h-[60px]" />
                @php
                $tinggiM = ($catatanKesehatan->tinggi ?? 1) / 100; // Pastikan tinggi tidak 0
                $berat = $catatanKesehatan->berat ?? 0;

                // Hitung IMT
                $imT = $berat / ($tinggiM * $tinggiM);

                // Ambil data umur dan jenis kelamin
                $umur = \Carbon\Carbon::parse($user->tanggal_lahir)->age;
                $jenisKelamin = $user->jenis_kelamin;

                // Hitung berat badan ideal berdasarkan jenis kelamin
                if ($jenisKelamin === 'L') {
                $beratIdeal = ($tinggiM * 100) - 100; // Berat ideal = tinggi badan (cm) - 100
                } else {
                $beratIdeal = ($tinggiM * 100) - 105; // Berat ideal = tinggi badan (cm) - 105
                }

                $statusBeratBadan = '';
                if ($imT < 18.5) { $statusBeratBadan='Kekurangan' ; } elseif ($imT>= 18.5 && $imT < 24.9) {
                        $statusBeratBadan='Ideal' ; } elseif ($imT>= 25 && $imT < 29.9) { $statusBeratBadan='Kelebihan' ; }
                            else { $statusBeratBadan='Obesitas' ; } @endphp <small
                            class="text-xs text-center font-bold text-black p-2">
                            {{ $berat }} KG - {{ $statusBeratBadan }} <br>
                            <!-- IMT: {{ number_format($imT, 2) }}<br> -->
                            Idealnya : {{ number_format($beratIdeal) }} KG<br>
                            <!-- Status: {{ $statusBeratBadan }}<br> -->
                            </small>
            </div>


            <div class="bg-white w-full flex flex-col justify-between items-center rounded-xl gap-2">
                <h1 class="text-base font-semibold text-black p-2">Tinggi Badan</h1>
                <img src="{{ asset('assets/tinggi-badan.svg') }}" alt="" class="h-[60px]" />
                <h1 class="text-sm text-center font-bold text-black p-2">{{ $catatanKesehatan->tinggi ?? 'N/A' }} CM</h1>
            </div>
        </div>
    @else

    <div class="w-full flex flex-col justify-center items-center">
        <div
            class="mt-4 w-[150px] h-[150px] flex justify-center items-center">
            <lord-icon
                src="https://cdn.lordicon.com/lltgvngb.json"
                trigger="loop"
                delay="500"
                stroke="light"
                colors="primary:#121331,secondary:#0bb4a6"
                class="w-full h-full">
            </lord-icon>
        </div>
        <p class="text-base font-semibold">Rekam Kesehatan Belum ada</p>
    </div>
    @endif

    </div>

    <div id="myModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-6 w-[90%] max-w-lg">
            <h1 class="text-xl font-bold text-center text-[#0BB4A6]">
                Catat Tekanan Darah
            </h1>

            <!-- Form di dalam modal -->
            <form class="mt-4 flex flex-col gap-2" action="{{ route('kesehatan.simpan') }}" method="POST">
                @csrf
                <input type="text" name="umur"
                    class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                    placeholder="Umur" value="{{ \Carbon\Carbon::parse($user->tanggal_lahir)->age }}" />

                <select name="kategori"
                    class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1">
                    <!-- <option>Select Kategori</option> -->
                    <option value="Balita"
                        {{ \Carbon\Carbon::parse($user->tanggal_lahir)->age <= 3 ? 'selected' : '' }}>Balita( 1-3 Tahun)
                    </option>
                    <option value="Anak-Anak"
                        {{ \Carbon\Carbon::parse($user->tanggal_lahir)->age >= 4 && \Carbon\Carbon::parse($user->tanggal_lahir)->age <= 12 ? 'selected' : '' }}>
                        Anak-Anak( 4-12 Tahun)</option>
                    <option value="Remaja"
                        {{ \Carbon\Carbon::parse($user->tanggal_lahir)->age >= 13 && \Carbon\Carbon::parse($user->tanggal_lahir)->age <= 19 ? 'selected' : '' }}>
                        Remaja( 13-19 Tahun)</option>
                    <option value="Dewasa"
                        {{ \Carbon\Carbon::parse($user->tanggal_lahir)->age >= 20 && \Carbon\Carbon::parse($user->tanggal_lahir)->age <= 39 ? 'selected' : '' }}>
                        Dewasa( 20-39 Tahun)</option>
                    <option value="Dewasa_Tengah"
                        {{ \Carbon\Carbon::parse($user->tanggal_lahir)->age >= 40 && \Carbon\Carbon::parse($user->tanggal_lahir)->age <= 64 ? 'selected' : '' }}>
                        Dewasa Tengah( 40-64 Tahun)</option>
                    <option value="Lansia"
                        {{ \Carbon\Carbon::parse($user->tanggal_lahir)->age >= 65 ? 'selected' : '' }}>Lansia( 65+
                        Tahun)</option>
                </select>

                <input type="text" name="gula"
                    class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                    placeholder="Gula Darah" value="{{ $catatanKesehatan ? $catatanKesehatan->gula : '' }}" />

                <input type="text" name="sistolik"
                    class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                    placeholder="Sistolik" value="{{ $catatanKesehatan ? $catatanKesehatan->sistolik : '' }}" />

                <input type="text" name="Diastolik"
                    class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                    placeholder="Diastolik" value="{{ $catatanKesehatan ? $catatanKesehatan->diastolik : '' }}" />

                <input type="text" name="berat"
                    class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                    placeholder="Berat Badan" value="{{ $user->berat_badan }}" />

                <input type="text" name="tinggi"
                    class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                    placeholder="Tinggi Badan" value="{{ $user->tinggi_badan }}" />
                
                <div class="flex flex-row justify-center items-center gap-2">
                    <input type="checkbox">
                    <p class="text-xs">Pastikan data rekam kesehatan ini sudah benar, karena Anda tidak dapat mengeditnya.</p>
                </div>

                <!-- Tombol Submit dan Batal -->
                <button type="submit"
                    class="bg-[#0BB4A6] px-5 py-2 rounded-md font-bold mt-1 w-full text-center text-white">
                    Simpan
                </button>
                <button type="button"
                    class="bg-white px-5 py-2 border-2 border-[#0BB4A6] rounded-md font-bold mt-1 w-full text-center text-[#0BB4A6]"
                    onclick="closeModal()">
                    Batal
                </button>
            </form>
        </div>
    </div>

</section>
<script>
// Fungsi untuk membuka modal
function openModal() {
    document.getElementById("myModal").classList.remove("hidden");
}

// Fungsi untuk menutup modal
function closeModal() {
    document.getElementById("myModal").classList.add("hidden");
}

// Menutup modal jika klik di luar konten modal
window.onclick = function(event) {
    const modal = document.getElementById("myModal");
    if (event.target === modal) {
        closeModal();
    }
};
</script>


@endsection

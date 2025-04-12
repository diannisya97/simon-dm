@extends('layout.app')
@section('content')

<section
    class="h-[730px] w-[350px] m-auto overflow-hidden bg-slate-100 bg-cover bg-center rounded-3xl flex flex-col container-snap overflow-y-auto scale-90">

    <!-- Popup Modal Setelah Login -->
    <div id="popupModal" class="fixed inset-0 flex flex-col items-center justify-center bg-[#0BB4A6] z-50 p-4 text-center hidden">
        <h2 class="text-2xl mb-4" style="font-family: 'Righteous', sans-serif">Selamat Datang di<br>SIMON-DM!!</h2>
        <p class="mb-4 text-xl" style="font-family: 'Ranchers', sans-serif">
            Saatnya cek gula darah<br>
            Anda! Jangan lupa<br>
            catat hasilnya untuk<br>
            memantau kesehatan<br>
            Anda</p>
        <button onclick="closePopup()" class="bg-white font-semibold text-black px-4 py-2 rounded-lg">Lanjutkan</button>
    </div>
    <div class="absolute top-0 bg-[#0BB4A6] w-full px-7 py-2 flex flex-row items-center justify-between">
        <div class="flex flex-col">
            <h1 class="text-lg text-start font-bold text-black">Halo, {{ $user->name }}</h1>
            <h2 class="mt-[-4px] text-sm">Pasien</h2>
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

    <div class="grid grid-cols-3 mt-20 gap-x-2 w-full px-5">
        <div class="flex flex-col gap-2 items-center bg-[#E3D8D8] rounded-xl">
            <a href="{{ route('dashboard') }}"
                class="py-2 flex flex-col justify-center items-center gap-2">
                <svg width="37" height="35" viewBox="0 0 40 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 16.625H17.5V38H10V16.625ZM12.5 35.625H15V19H12.5V35.625ZM20 21.375H27.5V38H20V21.375ZM22.5 35.625H25V23.75H22.5V35.625ZM0 26.125H7.5V38H0V26.125ZM2.5 35.625H5V28.5H2.5V35.625ZM30 11.875H37.5V38H30V11.875ZM32.5 35.625H35V14.25H32.5V35.625ZM27.1289 11.5225C27.3763 12.0296 27.5 12.543 27.5 13.0625C27.5 13.5573 27.4023 14.0212 27.207 14.4541C27.0117 14.887 26.7448 15.2643 26.4062 15.5859C26.0677 15.9076 25.6706 16.1611 25.2148 16.3467C24.7591 16.5322 24.2708 16.625 23.75 16.625C23.2292 16.625 22.7409 16.5322 22.2852 16.3467C21.8294 16.1611 21.4323 15.9076 21.0938 15.5859C20.7552 15.2643 20.4883 14.887 20.293 14.4541C20.0977 14.0212 20 13.5573 20 13.0625V12.8398C20 12.7656 20.0065 12.6914 20.0195 12.6172L16.3477 10.873C16.0091 11.1947 15.612 11.4421 15.1562 11.6152C14.7005 11.7884 14.2318 11.875 13.75 11.875C13.2031 11.875 12.6628 11.7575 12.1289 11.5225L7.12891 16.2725C7.3763 16.7796 7.5 17.293 7.5 17.8125C7.5 18.3073 7.40234 18.7712 7.20703 19.2041C7.01172 19.637 6.74479 20.0143 6.40625 20.3359C6.06771 20.6576 5.67057 20.9111 5.21484 21.0967C4.75911 21.2822 4.27083 21.375 3.75 21.375C3.22917 21.375 2.74089 21.2822 2.28516 21.0967C1.82943 20.9111 1.43229 20.6576 1.09375 20.3359C0.755208 20.0143 0.488281 19.637 0.292969 19.2041C0.0976562 18.7712 0 18.3073 0 17.8125C0 17.3177 0.0976562 16.8538 0.292969 16.4209C0.488281 15.988 0.755208 15.6107 1.09375 15.2891C1.43229 14.9674 1.82943 14.7139 2.28516 14.5283C2.74089 14.3428 3.22917 14.25 3.75 14.25C4.29688 14.25 4.83724 14.3675 5.37109 14.6025L10.3711 9.85254C10.1237 9.34538 10 8.83203 10 8.3125C10 7.81771 10.0977 7.35384 10.293 6.9209C10.4883 6.48796 10.7552 6.11068 11.0938 5.78906C11.4323 5.46745 11.8294 5.21387 12.2852 5.02832C12.7409 4.84277 13.2292 4.75 13.75 4.75C14.2708 4.75 14.7591 4.84277 15.2148 5.02832C15.6706 5.21387 16.0677 5.46745 16.4062 5.78906C16.7448 6.11068 17.0117 6.48796 17.207 6.9209C17.4023 7.35384 17.5 7.81771 17.5 8.3125V8.53516C17.5 8.60938 17.4935 8.68359 17.4805 8.75781L21.1523 10.502C21.4909 10.1803 21.888 9.93294 22.3438 9.75977C22.7995 9.58659 23.2682 9.5 23.75 9.5C24.2969 9.5 24.8372 9.61751 25.3711 9.85254L30.3711 5.10254C30.1237 4.59538 30 4.08203 30 3.5625C30 3.06771 30.0977 2.60384 30.293 2.1709C30.4883 1.73796 30.7552 1.36068 31.0938 1.03906C31.4323 0.717448 31.8294 0.463867 32.2852 0.27832C32.7409 0.0927734 33.2292 0 33.75 0C34.2708 0 34.7591 0.0927734 35.2148 0.27832C35.6706 0.463867 36.0677 0.717448 36.4062 1.03906C36.7448 1.36068 37.0117 1.73796 37.207 2.1709C37.4023 2.60384 37.5 3.06771 37.5 3.5625C37.5 4.05729 37.4023 4.52116 37.207 4.9541C37.0117 5.38704 36.7448 5.76432 36.4062 6.08594C36.0677 6.40755 35.6706 6.66113 35.2148 6.84668C34.7591 7.03223 34.2708 7.125 33.75 7.125C33.2031 7.125 32.6628 7.00749 32.1289 6.77246L27.1289 11.5225ZM3.75 19C4.08854 19 4.38151 18.8825 4.62891 18.6475C4.8763 18.4124 5 18.1341 5 17.8125C5 17.4909 4.8763 17.2126 4.62891 16.9775C4.38151 16.7425 4.08854 16.625 3.75 16.625C3.41146 16.625 3.11849 16.7425 2.87109 16.9775C2.6237 17.2126 2.5 17.4909 2.5 17.8125C2.5 18.1341 2.6237 18.4124 2.87109 18.6475C3.11849 18.8825 3.41146 19 3.75 19ZM33.75 2.375C33.4115 2.375 33.1185 2.49251 32.8711 2.72754C32.6237 2.96257 32.5 3.24089 32.5 3.5625C32.5 3.88411 32.6237 4.16244 32.8711 4.39746C33.1185 4.63249 33.4115 4.75 33.75 4.75C34.0885 4.75 34.3815 4.63249 34.6289 4.39746C34.8763 4.16244 35 3.88411 35 3.5625C35 3.24089 34.8763 2.96257 34.6289 2.72754C34.3815 2.49251 34.0885 2.375 33.75 2.375ZM13.75 9.5C14.0885 9.5 14.3815 9.38249 14.6289 9.14746C14.8763 8.91243 15 8.63411 15 8.3125C15 7.99089 14.8763 7.71256 14.6289 7.47754C14.3815 7.24251 14.0885 7.125 13.75 7.125C13.4115 7.125 13.1185 7.24251 12.8711 7.47754C12.6237 7.71256 12.5 7.99089 12.5 8.3125C12.5 8.63411 12.6237 8.91243 12.8711 9.14746C13.1185 9.38249 13.4115 9.5 13.75 9.5ZM23.75 14.25C24.0885 14.25 24.3815 14.1325 24.6289 13.8975C24.8763 13.6624 25 13.3841 25 13.0625C25 12.7409 24.8763 12.4626 24.6289 12.2275C24.3815 11.9925 24.0885 11.875 23.75 11.875C23.4115 11.875 23.1185 11.9925 22.8711 12.2275C22.6237 12.4626 22.5 12.7409 22.5 13.0625C22.5 13.3841 22.6237 13.6624 22.8711 13.8975C23.1185 14.1325 23.4115 14.25 23.75 14.25Z" fill="black"/>
                </svg>
                <p class="text-[0.8rem] text-center mt-2">Dashboard</p>
            </a>
        </div>
        <div class="flex flex-col gap-2 items-center rounded-xl">
            <a href="{{route('riwayat')}}"
                class="py-2 flex flex-col justify-center items-center gap-2">
                <svg width="33" height="35" viewBox="0 0 32 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M30.25 17V3.875C30.25 3.17881 29.9998 2.51113 29.5544 2.01884C29.109 1.52656 28.5049 1.25 27.875 1.25H4.125C3.49511 1.25 2.89102 1.52656 2.44562 2.01884C2.00022 2.51113 1.75 3.17881 1.75 3.875V30.125C1.75 30.8212 2.00022 31.4889 2.44562 31.9812C2.89102 32.4734 3.49511 32.75 4.125 32.75H16" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M22.3333 29.25C24.9566 29.25 27.0833 26.8995 27.0833 24C27.0833 21.1005 24.9566 18.75 22.3333 18.75C19.7099 18.75 17.5833 21.1005 17.5833 24C17.5833 26.8995 19.7099 29.25 22.3333 29.25Z" stroke="black" stroke-width="2"/>
                    <path d="M26.2916 27.5L30.2499 31M8.08325 10H23.9166M8.08325 17H14.4166" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    
                <p class="text-[0.8rem] text-center">Riwayat Pemeriksaan</p>
            </a>
        </div>
        <div class="flex flex-col gap-2 items-center rounded-xl">
            <a href="{{route('profile')}}"
                class="py-2 flex flex-col justify-center items-center gap-2">
                <svg width="38" height="36" viewBox="0 0 47 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M23.4999 0.333252C26.5093 0.333239 29.4893 0.893653 32.2697 1.9825C35.0501 3.07134 37.5764 4.66729 39.7045 6.67923C41.8325 8.69116 43.5205 11.0797 44.6722 13.7084C45.8239 16.3371 46.4166 19.1546 46.4166 21.9999C46.4166 33.9661 36.1564 43.6666 23.4999 43.6666C10.8434 43.6666 0.583252 33.9661 0.583252 21.9999C0.583252 10.0338 10.8434 0.333252 23.4999 0.333252ZM25.7916 24.1666H21.2083C15.5348 24.1666 10.6639 27.4153 8.56309 32.0527C11.8871 36.4596 17.3386 39.3333 23.4999 39.3333C29.6612 39.3333 35.1126 36.4596 38.4368 32.0524C36.3359 27.4153 31.4651 24.1666 25.7916 24.1666ZM23.4999 6.83325C19.7029 6.83325 16.6249 9.74343 16.6249 13.3333C16.6249 16.9231 19.7029 19.8333 23.4999 19.8333C27.2968 19.8333 30.3749 16.9231 30.3749 13.3333C30.3749 9.74343 27.2969 6.83325 23.4999 6.83325Z" fill="black"/>
                    </svg>                    
                <p class="text-[0.8rem] text-center mt-2">Profile</p>
            </a>
        </div>
    </div>

    <h1 class="font-semibold mt-3 text-sm text-center">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</h1>

    <div class="flex flex-row items-center gap-1.5 px-5 mt-2">
        <div class="h-3 w-3 rounded-full
        bg-{{ 
            $statusDiabetes == 'Waspada' ? 'yellow-500' : 
            ($statusDiabetes == 'Non Diabetes' ? 'green-500' : 
            ($statusDiabetes == 'Diabetes' ? 'red-500' : 'black'))
        }}"></div>
        <h1 class="text-start text-sm font-semibold
        text-{{ 
            $statusDiabetes == 'Waspada' ? 'yellow-500' : 
            ($statusDiabetes == 'Non Diabetes' ? 'green-500' : 
            ($statusDiabetes == 'Diabetes' ? 'red-500' : 'black'))
        }}">{{ $statusDiabetes }}</h1>
    </div>

    <div class="flex flex-row items-center gap-1.5 px-[38px] mt-0.5">
        <div class="flex flex-col">
            <h2 class="text-xs">Gula Darah</h2>
            <h2 class="text-xs">Sis/Dias</h2>
            <h2 class="text-xs">IMT</h2>
        </div>
        <div class="flex flex-col">
            <h2 class="text-xs">:</h2>
            <h2 class="text-xs">:</h2>
            <h2 class="text-xs">:</h2>
        </div>
        <div class="flex flex-col">
            <h2 class="text-xs">{{ $catatanKesehatan->gula ?? 0 }} mg/dL</h2>
            <h2 class="text-xs">{{ $catatanKesehatan->sistolik ?? 0 }}/{{ $catatanKesehatan->diastolik ?? '0' }} mmHg</h2>
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
            <h2 class="text-xs">{{ number_format($imt, 2) }} ({{ $keterangan }})</h2>
        </div>
    </div>


    <div class="grid grid-cols-3 grid-rows-2 gap-y-4 gap-x-2 mt-5 w-full p-5 bg-[#0BB4A6] rounded-2xl">
        <!-- Pengingat Obat -->
        <div class="flex flex-col gap-2 items-center">
            <a href="{{route('kesehatan')}}"
                class="bg-white rounded-xl flex flex-col justify-center items-center p-2 w-11/12">
                <svg width="33" height="43" viewBox="0 0 33 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23.6667 25.75H9.33333C8.85815 25.75 8.40244 25.9739 8.06643 26.3724C7.73043 26.7709 7.54167 27.3114 7.54167 27.875C7.54167 28.4386 7.73043 28.9791 8.06643 29.3776C8.40244 29.7761 8.85815 30 9.33333 30H23.6667C24.1418 30 24.5976 29.7761 24.9336 29.3776C25.2696 28.9791 25.4583 28.4386 25.4583 27.875C25.4583 27.3114 25.2696 26.7709 24.9336 26.3724C24.5976 25.9739 24.1418 25.75 23.6667 25.75ZM23.6667 17.25H12.9167C12.4415 17.25 11.9858 17.4739 11.6498 17.8724C11.3138 18.2709 11.125 18.8114 11.125 19.375C11.125 19.9386 11.3138 20.4791 11.6498 20.8776C11.9858 21.2761 12.4415 21.5 12.9167 21.5H23.6667C24.1418 21.5 24.5976 21.2761 24.9336 20.8776C25.2696 20.4791 25.4583 19.9386 25.4583 19.375C25.4583 18.8114 25.2696 18.2709 24.9336 17.8724C24.5976 17.4739 24.1418 17.25 23.6667 17.25ZM30.8333 4.5H25.4583V2.375C25.4583 1.81141 25.2696 1.27091 24.9336 0.872398C24.5976 0.473883 24.1418 0.25 23.6667 0.25C23.1915 0.25 22.7358 0.473883 22.3998 0.872398C22.0638 1.27091 21.875 1.81141 21.875 2.375V4.5H18.2917V2.375C18.2917 1.81141 18.1029 1.27091 17.7669 0.872398C17.4309 0.473883 16.9752 0.25 16.5 0.25C16.0248 0.25 15.5691 0.473883 15.2331 0.872398C14.8971 1.27091 14.7083 1.81141 14.7083 2.375V4.5H11.125V2.375C11.125 1.81141 10.9362 1.27091 10.6002 0.872398C10.2642 0.473883 9.80851 0.25 9.33333 0.25C8.85815 0.25 8.40244 0.473883 8.06643 0.872398C7.73043 1.27091 7.54167 1.81141 7.54167 2.375V4.5H2.16667C1.69149 4.5 1.23577 4.72388 0.899767 5.1224C0.563764 5.52091 0.375 6.06141 0.375 6.625V36.375C0.375 38.0658 0.941293 39.6873 1.9493 40.8828C2.95731 42.0784 4.32446 42.75 5.75 42.75H27.25C28.6755 42.75 30.0427 42.0784 31.0507 40.8828C32.0587 39.6873 32.625 38.0658 32.625 36.375V6.625C32.625 6.06141 32.4362 5.52091 32.1002 5.1224C31.7642 4.72388 31.3085 4.5 30.8333 4.5ZM29.0417 36.375C29.0417 36.9386 28.8529 37.4791 28.5169 37.8776C28.1809 38.2761 27.7252 38.5 27.25 38.5H5.75C5.27482 38.5 4.8191 38.2761 4.4831 37.8776C4.1471 37.4791 3.95833 36.9386 3.95833 36.375V8.75H7.54167V10.875C7.54167 11.4386 7.73043 11.9791 8.06643 12.3776C8.40244 12.7761 8.85815 13 9.33333 13C9.80851 13 10.2642 12.7761 10.6002 12.3776C10.9362 11.9791 11.125 11.4386 11.125 10.875V8.75H14.7083V10.875C14.7083 11.4386 14.8971 11.9791 15.2331 12.3776C15.5691 12.7761 16.0248 13 16.5 13C16.9752 13 17.4309 12.7761 17.7669 12.3776C18.1029 11.9791 18.2917 11.4386 18.2917 10.875V8.75H21.875V10.875C21.875 11.4386 22.0638 11.9791 22.3998 12.3776C22.7358 12.7761 23.1915 13 23.6667 13C24.1418 13 24.5976 12.7761 24.9336 12.3776C25.2696 11.9791 25.4583 11.4386 25.4583 10.875V8.75H29.0417V36.375Z" fill="black"/>
                    </svg>
                    
                <p class="text-[0.7rem] text-center mt-2">Rekam Kesehatan</p>
            </a>
        </div>

        <!-- Tanya Dokter -->
        <div class="flex flex-col gap-2 items-center">
            <a href="{{route('pola.makan')}}"
                class="bg-white rounded-xl flex flex-col justify-center items-center p-2 w-11/12">
                <svg width="44" height="43" viewBox="0 0 44 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.125 0.4375C18.9234 0.4375 22 3.16445 22 6.53125V7.75C22 8.42031 21.3813 8.96875 20.625 8.96875C16.8266 8.96875 13.75 6.2418 13.75 2.875V1.65625C13.75 0.985937 14.3687 0.4375 15.125 0.4375ZM4.8125 2.875H8.9375C10.0805 2.875 11 3.69004 11 4.70312C11 5.71621 10.0805 6.53125 8.9375 6.53125H4.8125C3.66953 6.53125 2.75 5.71621 2.75 4.70312C2.75 3.69004 3.66953 2.875 4.8125 2.875ZM2.0625 8.35938H11.6875C12.8305 8.35938 13.75 9.17441 13.75 10.1875C13.75 11.2006 12.8305 12.0156 11.6875 12.0156H2.0625C0.919531 12.0156 0 11.2006 0 10.1875C0 9.17441 0.919531 8.35938 2.0625 8.35938ZM2.75 15.6719C2.75 14.6588 3.66953 13.8438 4.8125 13.8438H8.9375C10.0805 13.8438 11 14.6588 11 15.6719C11 16.685 10.0805 17.5 8.9375 17.5H4.8125C3.66953 17.5 2.75 16.685 2.75 15.6719ZM23.375 1.65625C23.375 0.985937 23.9937 0.4375 24.75 0.4375C28.5484 0.4375 31.625 3.16445 31.625 6.53125V7.75C31.625 8.42031 31.0063 8.96875 30.25 8.96875C26.4516 8.96875 23.375 6.2418 23.375 2.875V1.65625ZM34.375 0.4375C38.1734 0.4375 41.25 3.16445 41.25 6.53125V7.75C41.25 8.42031 40.6312 8.96875 39.875 8.96875C36.0766 8.96875 33 6.2418 33 2.875V1.65625C33 0.985937 33.6188 0.4375 34.375 0.4375ZM41.25 12.625V13.8438C41.25 17.2105 38.1734 19.9375 34.375 19.9375C33.6188 19.9375 33 19.3891 33 18.7188V17.5C33 14.1332 36.0766 11.4062 39.875 11.4062C40.6312 11.4062 41.25 11.9547 41.25 12.625ZM30.25 11.4062C31.0063 11.4062 31.625 11.9547 31.625 12.625V13.8438C31.625 17.2105 28.5484 19.9375 24.75 19.9375C23.9937 19.9375 23.375 19.3891 23.375 18.7188V17.5C23.375 14.1332 26.4516 11.4062 30.25 11.4062ZM22 12.625V13.8438C22 17.2105 18.9234 19.9375 15.125 19.9375C14.3687 19.9375 13.75 19.3891 13.75 18.7188V17.5C13.75 14.1332 16.8266 11.4062 20.625 11.4062C21.3813 11.4062 22 11.9547 22 12.625ZM0.300781 24.4773C0.1375 23.3576 1.11719 22.375 2.38906 22.375H41.6109C42.8828 22.375 43.8625 23.3576 43.7078 24.4773C43.1664 28.3012 39.8922 31.2871 35.75 31.9727V32.125C35.75 33.4732 34.5211 34.5625 33 34.5625H11C9.47891 34.5625 8.25 33.4732 8.25 32.125V31.9727C4.10781 31.2871 0.833594 28.3012 0.300781 24.4773Z" fill="black"/>
                    </svg>
                    
                <p class="text-[0.7rem] text-center mt-2">Pilihan Pola Makan</p>
            </a>
        </div>

        <!-- Kontrol Pola Makan -->
        <div class="flex flex-col gap-2 items-center">
            <a href="{{ route('dokter') }}"
                class="bg-white rounded-xl flex flex-col justify-center items-center p-2 w-11/12">
                <svg width="37" height="43" viewBox="0 0 37 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M28.5388 9.96085C28.5388 13.7103 27.6609 18.6004 26.3104 17.8583C25.7581 19.7723 24.5987 21.4244 23.0289 22.5341C21.4592 23.6439 19.5759 24.1429 17.6988 23.9464C15.8217 23.7499 14.0666 22.87 12.7314 21.4561C11.3963 20.0423 10.5634 18.1816 10.3741 16.19C9.03378 13.7016 7.27591 8.71501 11.7951 4.82801C11.8768 4.79985 11.9258 4.56585 11.9993 4.22135C12.279 2.9181 12.8987 0.0212643 16.8074 0.574848C19.8219 1.0006 28.5388 2.6516 28.5388 9.96085ZM24.6536 12.3258C24.6536 12.3258 24.1921 13.7579 24.625 15.3537C24.6193 17.0551 23.9853 18.6864 22.8589 19.8973C21.7325 21.1082 20.2037 21.8021 18.6006 21.83C16.9975 21.858 15.448 21.2177 14.2847 20.0467C13.1215 18.8758 12.4373 17.2675 12.3791 15.5671C12.5271 14.9713 12.5271 13.9627 12.5261 12.8414C12.525 10.8188 12.523 8.43227 13.3958 7.45943C19.5096 11.7808 24.6536 12.3258 24.6536 12.3258Z" fill="black"/>
                    <path d="M7.27083 34.0001C7.27083 32.8279 7.85577 31.8009 8.73369 31.2289C8.70033 31.0941 8.66902 30.9586 8.63977 30.8227C8.48546 30.0824 8.36453 29.3348 8.27738 28.5823C8.19031 27.8612 8.1375 27.1359 8.11915 26.4092C3.81021 28.2043 0.125 31.3329 0.125 34.6176V40.5001H36.875V34.6176C36.875 31.4716 33.496 28.4697 29.425 26.6443V26.6746C29.4433 27.3354 29.4086 28.0938 29.3412 28.8228C29.28 29.4988 29.1891 30.1727 29.0799 30.7501H29.7292C29.9187 30.7502 30.1045 30.8063 30.2656 30.9121C30.4268 31.0179 30.5571 31.1693 30.6418 31.3492L31.6626 33.5159C31.7341 33.6664 31.7708 33.8322 31.7708 34.0001V36.1668C31.7708 36.4541 31.6633 36.7296 31.4718 36.9328C31.2804 37.136 31.0207 37.2501 30.75 37.2501H28.7083V35.0834H29.7292V34.2558L29.0983 32.9168H26.2767L25.6458 34.2558V35.0834H26.6667V37.2501H24.625C24.3543 37.2501 24.0946 37.136 23.9032 36.9328C23.7117 36.7296 23.6042 36.4541 23.6042 36.1668V34.0001C23.6042 33.8322 23.6409 33.6664 23.7124 33.5159L24.7332 31.3492C24.8179 31.1693 24.9482 31.0179 25.1094 30.9121C25.2705 30.8063 25.4563 30.7502 25.6458 30.7501H26.9882C27.0107 30.6569 27.0331 30.5537 27.0556 30.4403C27.1577 29.93 27.2485 29.2833 27.3098 28.6148C27.371 27.9453 27.3996 27.2813 27.3843 26.7353C27.381 26.509 27.3643 26.2833 27.3343 26.0593C27.3118 25.9054 27.2894 25.835 27.2853 25.8198C27.2839 25.8162 27.2839 25.8155 27.2853 25.8177L27.2884 25.8166C26.7466 25.6383 26.1987 25.4818 25.6458 25.3475C25.1324 25.2229 24.6015 25.9726 24.3698 26.4417H12.375L12.2872 26.2597C12.0708 25.8025 11.8044 25.2381 11.3542 25.3475C10.9608 25.4421 10.5678 25.5494 10.1751 25.6693C10.1629 25.8593 10.1575 26.0497 10.1588 26.2402C10.1629 26.8393 10.217 27.5727 10.3037 28.3137C10.3905 29.0525 10.5079 29.7718 10.6304 30.3395C10.6658 30.5035 10.6998 30.6494 10.7325 30.7772C11.3161 30.8586 11.8652 31.1168 12.3142 31.5208C12.7631 31.9249 13.0928 32.4577 13.2638 33.0554C13.4348 33.6532 13.4398 34.2906 13.2783 34.8913C13.1168 35.492 12.7955 36.0305 12.353 36.4425C11.9105 36.8545 11.3655 37.1224 10.7833 37.2142C10.201 37.306 9.60619 37.2177 9.06996 36.96C8.53374 36.7023 8.07886 36.2861 7.75979 35.7611C7.44071 35.2362 7.27095 34.6248 7.27083 34.0001Z" fill="black"/>
                    <path d="M11.3542 34C11.3542 34.6218 10.8825 35.0996 10.3333 35.0996C9.78413 35.0996 9.3125 34.6229 9.3125 34C9.3125 33.3781 9.78413 32.9004 10.3333 32.9004C10.8825 32.9004 11.3542 33.3771 11.3542 34Z" fill="black"/>
                    </svg>
                    
                <p class="text-[0.7rem] text-center mt-2">Konsultasi Dokter</p>
            </a>
        </div>

        <!-- Kontrol Aktivitas Fisik -->
        <div class="flex flex-col gap-2 items-center">
            <a href="{{ route('kontrol.aktivitas') }}"
                class="bg-white rounded-xl flex flex-col justify-center items-center p-2 w-11/12">
                <svg width="45" height="43" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.5001 8.41658C20.0488 8.41658 18.0834 10.2708 18.0834 12.5833C18.0834 14.8958 20.0488 16.7499 22.5001 16.7499C24.9513 16.7499 26.9167 14.8958 26.9167 12.5833C26.9167 10.2708 24.9513 8.41658 22.5001 8.41658ZM44.5834 0.083252V10.4999H40.1668V6.33325H4.83342V10.4999H0.416748V0.083252H4.83342V4.24992H40.1668V0.083252H44.5834ZM29.1251 21.4583V45.9166H24.7084V35.4999H20.2917V45.9166H15.8751V21.4583C11.3038 19.1874 8.14592 14.6666 8.14592 9.45825V8.41658H12.5626V9.45825C12.5626 14.6666 16.9792 18.8333 22.5001 18.8333C28.0209 18.8333 32.4376 14.6666 32.4376 9.45825V8.41658H36.8543V9.45825C36.8543 14.6666 33.6963 19.1874 29.1251 21.4583Z" fill="black"/>
                    </svg>
                    
                <p class="text-[0.7rem] text-center mt-2">Kontrol Olahraga</p>
            </a>
        </div>

        <!-- Catatan Kesehatan -->
        <div class="flex flex-col gap-2 items-center">
            <a href="{{route('pengingatObat')}}"
                class="bg-white rounded-xl flex flex-col justify-center items-center p-2 w-11/12">
                <svg width="38" height="43" viewBox="0 0 38 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M26.7001 3.4375C24.8667 1.3125 22.4834 0.25 20.2834 0.25C18.0834 0.25 15.5167 1.3125 13.8667 3.4375L3.2334 15.3375C-0.433268 19.5875 -0.433268 26.175 3.2334 30.425C6.90006 34.675 12.5834 34.675 16.2501 30.425L26.7001 18.3125C30.1834 14.275 30.1834 7.475 26.7001 3.4375ZM24.1334 15.3375L19.0001 21.2875L12.4001 13.85L4.3334 23.2C4.3334 21.5 4.70007 19.5875 5.9834 18.3125L16.4334 6.2C17.3501 5.1375 18.8167 4.5 20.1001 4.5C21.3834 4.5 22.8501 5.1375 23.9501 6.2C26.1501 8.9625 26.1501 12.7875 24.1334 15.3375ZM32.9334 11.0875C32.9334 12.7875 32.5667 14.275 32.2001 15.975C34.0334 18.525 34.0334 22.35 32.0167 24.6875L26.8834 30.6375L24.1334 27.45L19.0001 33.4C16.6167 36.1625 13.3167 37.65 10.2001 37.65C10.5667 38.2875 10.9334 38.925 11.4834 39.5625C15.1501 43.8125 20.8334 43.8125 24.5001 39.5625L34.9501 27.45C38.6167 23.2 38.6167 16.6125 34.9501 12.3625C34.0334 11.9375 33.4834 11.5125 32.9334 11.0875Z" fill="black"/>
                    </svg>
                    
                <p class="text-[0.7rem] text-center mt-2">Pengingat Obat</p>
            </a>
        </div>

        <!-- Dukungan Sosial -->
        <div class="flex flex-col gap-2 items-center">
            <a href="{{route('reminder')}}"
                class="bg-white rounded-xl flex flex-col justify-center items-center p-2 w-11/12">
                <svg width="45" height="43" viewBox="0 0 45 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.856 0.125C6.75238 0.125 0.96875 5.4875 0.96875 12.085C0.96875 12.4392 1.00188 12.7756 1.02672 13.125H4.3475C4.30979 12.7795 4.28824 12.4325 4.28291 12.085C4.28125 7.28312 8.57756 3.375 13.856 3.375C16.2692 3.375 18.573 4.194 20.3452 5.67925L22.5 7.48787L24.6531 5.67925C26.422 4.194 28.7258 3.375 31.1456 3.375C36.4224 3.375 40.7188 7.28475 40.7188 12.085C40.7188 20.405 32.729 25.3385 26.3044 29.3051C24.8353 30.207 23.5484 31.0065 22.5 31.7621C21.4516 31.0065 20.1647 30.207 18.6956 29.3051C15.7011 27.4575 12.3687 25.3954 9.65744 22.875H5.16072C8.44009 26.7913 13.0859 29.6805 16.9367 32.0595C18.5465 33.0508 19.9312 33.9071 20.915 34.6628C20.915 34.6628 22.4884 35.862 22.5 35.875C22.5066 35.862 24.0784 34.6628 24.0784 34.6628C25.0622 33.9071 26.4468 33.0508 28.0633 32.0595C34.7993 27.8962 44.0312 22.2022 44.0312 12.085C44.0312 5.48912 38.2476 0.125 31.144 0.125C27.9143 0.125 24.8552 1.23 22.5 3.20925C20.1448 1.23 17.0791 0.125 13.856 0.125ZM15.8237 7.25388L11.9547 16.7309L11.5919 16.375H0.96875V19.625H10.2206L13.1637 22.5191L15.9263 15.7461L20.8951 27.1211L24.3235 18.7118L24.7906 19.625H27.9159C28.2805 20.2442 28.843 20.7281 29.5164 21.0016C30.1898 21.2751 30.9363 21.323 31.6403 21.1379C32.3442 20.9527 32.9662 20.5448 33.4098 19.9775C33.8534 19.4101 34.0938 18.7151 34.0938 18C34.0938 17.2849 33.8534 16.5899 33.4098 16.0225C32.9662 15.4552 32.3442 15.0473 31.6403 14.8621C30.9363 14.677 30.1898 14.7249 29.5164 14.9984C28.843 15.2719 28.2805 15.7558 27.9159 16.375H26.8344L23.9873 10.7882L20.7908 18.6289L15.8237 7.25388Z" fill="black"/>
                    </svg>
                    
                <p class="text-[0.7rem] text-center mt-2">Daily Reminder</p>
            </a>
        </div>

    </div>
</section>

@endsection

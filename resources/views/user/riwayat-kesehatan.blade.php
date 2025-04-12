@extends('layout.app')
@section('content')
<section
    class="h-[730px] w-[350px] m-auto overflow-hidden bg-slate-100 bg-cover bg-center rounded-3xl flex flex-col items-center container-snap overflow-y-auto scale-90">

    <div class="absolute top-0 bg-[#0BB4A6] w-full px-7 py-[18px] flex flex-row items-center justify-between">
        <a href="{{route('dashboard')}}">
            <svg width="13" height="17" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.49896 10.525L11.6722 3.35177C11.9664 3.05752 12.1212 2.70332 12.1204 2.29949C12.1196 1.89648 11.9652 1.54283 11.6727 1.24869C11.3795 0.953986 11.0231 0.796625 10.6143 0.787062C10.2014 0.777404 9.84013 0.92672 9.54363 1.22322L1.84363 8.92322C1.62092 9.14593 1.4515 9.39913 1.33829 9.68215C1.2274 9.95938 1.17041 10.2408 1.17041 10.525C1.17041 10.8092 1.2274 11.0906 1.33829 11.3678C1.4515 11.6509 1.62092 11.9041 1.84363 12.1268L1.84392 12.1271L9.54387 19.802C9.83807 20.0954 10.192 20.25 10.5954 20.25C10.9988 20.25 11.3528 20.0954 11.647 19.802C11.9401 19.5097 12.0987 19.1579 12.1083 18.756C12.1181 18.3498 11.9673 17.9933 11.6722 17.6982L4.49896 10.525Z" fill="black" stroke="black" stroke-width="0.5"/>
            </svg>                              
        </a>
        <div class="flex flex-col">
            <h1 class="text-base text-center font-bold text-black ml-2">Riwayat Pemeriksaan</h1>
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
      <div class="flex flex-col gap-2 items-center rounded-xl">
          <a href="{{ route('dashboard') }}"
              class="py-2 flex flex-col justify-center items-center gap-2">
              <svg width="37" height="35" viewBox="0 0 40 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 16.625H17.5V38H10V16.625ZM12.5 35.625H15V19H12.5V35.625ZM20 21.375H27.5V38H20V21.375ZM22.5 35.625H25V23.75H22.5V35.625ZM0 26.125H7.5V38H0V26.125ZM2.5 35.625H5V28.5H2.5V35.625ZM30 11.875H37.5V38H30V11.875ZM32.5 35.625H35V14.25H32.5V35.625ZM27.1289 11.5225C27.3763 12.0296 27.5 12.543 27.5 13.0625C27.5 13.5573 27.4023 14.0212 27.207 14.4541C27.0117 14.887 26.7448 15.2643 26.4062 15.5859C26.0677 15.9076 25.6706 16.1611 25.2148 16.3467C24.7591 16.5322 24.2708 16.625 23.75 16.625C23.2292 16.625 22.7409 16.5322 22.2852 16.3467C21.8294 16.1611 21.4323 15.9076 21.0938 15.5859C20.7552 15.2643 20.4883 14.887 20.293 14.4541C20.0977 14.0212 20 13.5573 20 13.0625V12.8398C20 12.7656 20.0065 12.6914 20.0195 12.6172L16.3477 10.873C16.0091 11.1947 15.612 11.4421 15.1562 11.6152C14.7005 11.7884 14.2318 11.875 13.75 11.875C13.2031 11.875 12.6628 11.7575 12.1289 11.5225L7.12891 16.2725C7.3763 16.7796 7.5 17.293 7.5 17.8125C7.5 18.3073 7.40234 18.7712 7.20703 19.2041C7.01172 19.637 6.74479 20.0143 6.40625 20.3359C6.06771 20.6576 5.67057 20.9111 5.21484 21.0967C4.75911 21.2822 4.27083 21.375 3.75 21.375C3.22917 21.375 2.74089 21.2822 2.28516 21.0967C1.82943 20.9111 1.43229 20.6576 1.09375 20.3359C0.755208 20.0143 0.488281 19.637 0.292969 19.2041C0.0976562 18.7712 0 18.3073 0 17.8125C0 17.3177 0.0976562 16.8538 0.292969 16.4209C0.488281 15.988 0.755208 15.6107 1.09375 15.2891C1.43229 14.9674 1.82943 14.7139 2.28516 14.5283C2.74089 14.3428 3.22917 14.25 3.75 14.25C4.29688 14.25 4.83724 14.3675 5.37109 14.6025L10.3711 9.85254C10.1237 9.34538 10 8.83203 10 8.3125C10 7.81771 10.0977 7.35384 10.293 6.9209C10.4883 6.48796 10.7552 6.11068 11.0938 5.78906C11.4323 5.46745 11.8294 5.21387 12.2852 5.02832C12.7409 4.84277 13.2292 4.75 13.75 4.75C14.2708 4.75 14.7591 4.84277 15.2148 5.02832C15.6706 5.21387 16.0677 5.46745 16.4062 5.78906C16.7448 6.11068 17.0117 6.48796 17.207 6.9209C17.4023 7.35384 17.5 7.81771 17.5 8.3125V8.53516C17.5 8.60938 17.4935 8.68359 17.4805 8.75781L21.1523 10.502C21.4909 10.1803 21.888 9.93294 22.3438 9.75977C22.7995 9.58659 23.2682 9.5 23.75 9.5C24.2969 9.5 24.8372 9.61751 25.3711 9.85254L30.3711 5.10254C30.1237 4.59538 30 4.08203 30 3.5625C30 3.06771 30.0977 2.60384 30.293 2.1709C30.4883 1.73796 30.7552 1.36068 31.0938 1.03906C31.4323 0.717448 31.8294 0.463867 32.2852 0.27832C32.7409 0.0927734 33.2292 0 33.75 0C34.2708 0 34.7591 0.0927734 35.2148 0.27832C35.6706 0.463867 36.0677 0.717448 36.4062 1.03906C36.7448 1.36068 37.0117 1.73796 37.207 2.1709C37.4023 2.60384 37.5 3.06771 37.5 3.5625C37.5 4.05729 37.4023 4.52116 37.207 4.9541C37.0117 5.38704 36.7448 5.76432 36.4062 6.08594C36.0677 6.40755 35.6706 6.66113 35.2148 6.84668C34.7591 7.03223 34.2708 7.125 33.75 7.125C33.2031 7.125 32.6628 7.00749 32.1289 6.77246L27.1289 11.5225ZM3.75 19C4.08854 19 4.38151 18.8825 4.62891 18.6475C4.8763 18.4124 5 18.1341 5 17.8125C5 17.4909 4.8763 17.2126 4.62891 16.9775C4.38151 16.7425 4.08854 16.625 3.75 16.625C3.41146 16.625 3.11849 16.7425 2.87109 16.9775C2.6237 17.2126 2.5 17.4909 2.5 17.8125C2.5 18.1341 2.6237 18.4124 2.87109 18.6475C3.11849 18.8825 3.41146 19 3.75 19ZM33.75 2.375C33.4115 2.375 33.1185 2.49251 32.8711 2.72754C32.6237 2.96257 32.5 3.24089 32.5 3.5625C32.5 3.88411 32.6237 4.16244 32.8711 4.39746C33.1185 4.63249 33.4115 4.75 33.75 4.75C34.0885 4.75 34.3815 4.63249 34.6289 4.39746C34.8763 4.16244 35 3.88411 35 3.5625C35 3.24089 34.8763 2.96257 34.6289 2.72754C34.3815 2.49251 34.0885 2.375 33.75 2.375ZM13.75 9.5C14.0885 9.5 14.3815 9.38249 14.6289 9.14746C14.8763 8.91243 15 8.63411 15 8.3125C15 7.99089 14.8763 7.71256 14.6289 7.47754C14.3815 7.24251 14.0885 7.125 13.75 7.125C13.4115 7.125 13.1185 7.24251 12.8711 7.47754C12.6237 7.71256 12.5 7.99089 12.5 8.3125C12.5 8.63411 12.6237 8.91243 12.8711 9.14746C13.1185 9.38249 13.4115 9.5 13.75 9.5ZM23.75 14.25C24.0885 14.25 24.3815 14.1325 24.6289 13.8975C24.8763 13.6624 25 13.3841 25 13.0625C25 12.7409 24.8763 12.4626 24.6289 12.2275C24.3815 11.9925 24.0885 11.875 23.75 11.875C23.4115 11.875 23.1185 11.9925 22.8711 12.2275C22.6237 12.4626 22.5 12.7409 22.5 13.0625C22.5 13.3841 22.6237 13.6624 22.8711 13.8975C23.1185 14.1325 23.4115 14.25 23.75 14.25Z" fill="black"/>
              </svg>
              <p class="text-[0.8rem] text-center mt-2">Dashboard</p>
          </a>
      </div>
      <div class="flex flex-col gap-2 items-center bg-[#E3D8D8] rounded-xl">
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

    <div class="w-full flex flex-col px-5 mt-4 gap-2">
      @if ($catatanKesehatan->isNotEmpty())
          @foreach ($catatanKesehatan as $catatan)
            @php
            $gula = $catatan->gula ?? 0;
            if (
                $gula < 140) { $kategoriDiabetes='Non Diabetes' ; }
            elseif ($gula < 200)
                { $kategoriDiabetes='Waspada' ; }
            else {
                $kategoriDiabetes='Diabetes' ; }
            @endphp

            {{-- Logika IMT --}}
            @php
            $imt = $catatan && $catatan->berat && $catatan->tinggi 
                ? $catatan->berat / (($catatan->tinggi / 100) ** 2) 
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

            {{-- Logika Berat Badan --}}
            @php
            $tinggiM = ($catatan->tinggi ?? 1) / 100; // Pastikan tinggi tidak 0
            $berat = $catatan->berat ?? 0;

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
                         else { $statusBeratBadan='Obesitas' ; } @endphp

              <!-- Tampilkan setiap catatan -->
              <div class="w-full border px-3 py-2 flex flex-row justify-between items-center">
                <div class="flex flex-row justify-center items-center gap-2 font-semibold">
                    <p class="text-sm">{{ $loop->iteration }} .</p>
                    <p class="text-sm">{{ $catatan->created_at->format('d M Y') }} Jam {{ $catatan->created_at->format('H:i') }}</p>
                </div>

                <div class="flex flex-row justify-center items-center">
                    <a href="#" class="p-2 rounded-lg"
                      onclick="openDetail('{{ $catatan->umur }}', '{{ $catatan->gula }}', '{{ $catatan->sistolik }}', '{{ $catatan->diastolik }}', '{{ $catatan->tinggi }}', '{{ $berat }}', '{{ $statusBeratBadan }}', '{{ $keterangan }}', '{{ $imt }}', '{{ $kategoriDiabetes }}')">
                      <svg width="20" height="18" viewBox="0 0 22 18" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                              d="M8 1.45962C8.91153 1.16968 9.9104 1 11 1C15.1819 1 18.028 3.49956 19.7251 5.70433C20.575 6.80853 21 7.3606 21 9C21 10.6394 20.575 11.1915 19.7251 12.2957C18.028 14.5004 15.1819 17 11 17C6.81811 17 3.97196 14.5004 2.27489 12.2957C1.42496 11.1915 1 10.6394 1 9C1 7.3606 1.42496 6.80853 2.27489 5.70433C2.75612 5.07914 3.32973 4.43025 4 3.82137"
                              stroke="#000000" stroke-opacity="0.807843" stroke-width="1.5"
                              stroke-linecap="round" />
                          <path
                              d="M14 9C14 10.6569 12.6569 12 11 12C9.3431 12 8 10.6569 8 9C8 7.3431 9.3431 6 11 6C12.6569 6 14 7.3431 14 9Z"
                              stroke="#000000" stroke-opacity="0.807843" stroke-width="1.5" />
                      </svg>
                    </a>

                    <!-- DELETE -->
          <form action="{{ route('riwayat.destroy', $catatan->id) }}" method="POST"
            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="rounded-lg flex justify-center items-center">
                <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="scale-110">
                    <path d="M13.2951 3.55666H0.705566" stroke="#000000" stroke-width="1.11083"
                        stroke-linecap="round" />
                    <path
                        d="M12.0609 5.40806L11.7202 10.5172C11.5892 12.4833 11.5236 13.4664 10.883 14.0657C10.2425 14.665 9.25722 14.665 7.28675 14.665H6.71408C4.74357 14.665 3.75834 14.665 3.11775 14.0657C2.47717 13.4664 2.41163 12.4833 2.28055 10.5172L1.93994 5.40806"
                        stroke="#000000" stroke-width="1.11083" stroke-linecap="round" />
                    <path d="M5.14893 7.25945L5.5192 10.9622" stroke="#000000" stroke-width="1.11083"
                        stroke-linecap="round" />
                    <path d="M8.85172 7.25945L8.48145 10.9622" stroke="#000000" stroke-width="1.11083"
                        stroke-linecap="round" />
                    <path
                        d="M2.92725 3.55667C2.96863 3.55667 2.98932 3.55667 3.00808 3.55619C3.61788 3.54074 4.15584 3.153 4.36335 2.57937C4.36973 2.56172 4.37627 2.5421 4.38935 2.50283L4.46126 2.28714C4.52263 2.10301 4.55332 2.01095 4.59402 1.93278C4.75643 1.62091 5.05689 1.40434 5.40412 1.3489C5.49115 1.335 5.58821 1.335 5.78231 1.335H8.21829C8.41239 1.335 8.50948 1.335 8.5965 1.3489C8.94374 1.40434 9.24419 1.62091 9.40659 1.93278C9.44732 2.01095 9.47798 2.10301 9.53937 2.28714L9.61128 2.50283C9.62431 2.54205 9.6309 2.56174 9.63727 2.57937C9.84478 3.153 10.3827 3.54074 10.9926 3.55619C11.0113 3.55667 11.032 3.55667 11.0734 3.55667"
                        stroke="#000000" stroke-width="1.11083" />
                </svg>
            </button>
          </form>
                </div>

              </div>
              
          @endforeach
      @else
          <!-- Jika tidak ada data -->
          <div class="w-full flex flex-col justify-center items-center">
              <div class="mt-4 w-[150px] h-[150px] flex justify-center items-center">
                  <lord-icon
                      src="https://cdn.lordicon.com/lltgvngb.json"
                      trigger="loop"
                      delay="500"
                      stroke="light"
                      colors="primary:#121331,secondary:#0bb4a6"
                      class="w-full h-full">
                  </lord-icon>
              </div>
              <p class="text-base font-semibold">Tidak Ada Riwayat Pemeriksaan</p>
          </div>
      @endif
  </div>
    
    <!-- ModalDetail -->
    <div id="myDetail" class="fixed inset-0 z-50 flex flex-col bg-slate-100 hidden">
        <div class="absolute top-0 bg-[#0BB4A6] w-full px-7 py-[18px] flex flex-row items-center justify-between">
            <a onclick="closeDetail()" class="cursor-pointer">
                <svg width="13" height="17" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.49896 10.525L11.6722 3.35177C11.9664 3.05752 12.1212 2.70332 12.1204 2.29949C12.1196 1.89648 11.9652 1.54283 11.6727 1.24869C11.3795 0.953986 11.0231 0.796625 10.6143 0.787062C10.2014 0.777404 9.84013 0.92672 9.54363 1.22322L1.84363 8.92322C1.62092 9.14593 1.4515 9.39913 1.33829 9.68215C1.2274 9.95938 1.17041 10.2408 1.17041 10.525C1.17041 10.8092 1.2274 11.0906 1.33829 11.3678C1.4515 11.6509 1.62092 11.9041 1.84363 12.1268L1.84392 12.1271L9.54387 19.802C9.83807 20.0954 10.192 20.25 10.5954 20.25C10.9988 20.25 11.3528 20.0954 11.647 19.802C11.9401 19.5097 12.0987 19.1579 12.1083 18.756C12.1181 18.3498 11.9673 17.9933 11.6722 17.6982L4.49896 10.525Z" fill="black" stroke="black" stroke-width="0.5"/>
                </svg>                              
            </a>
            <div class="flex flex-col">
                <h1 class="text-base text-center font-bold text-black ml-2">Riwayat Pemeriksaan</h1>
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


        <h1 class="text-base font-bold text-center text-black mt-[66px]">
            {{ $catatan->created_at->format('d M Y') }}
        </h1>
        <div class="mt-3 flex flex-col gap-2 text-start px-7">
            <div class="flex flex-row gap-2">
                <div class="flex flex-col">
                    <p class="text-sm">Umur</p>
                    <p class="text-sm">Gula Darah</p>
                    <p class="text-sm">Sistolik</p>
                    <p class="text-sm">Diastolik</p>
                    <p class="text-sm">Berat Badan</p>
                    <p class="text-sm">Tinggi Badan</p>
                    <p class="text-sm">IMT</p>
                    <p class="text-sm">Status</p>
                </div>

                <div class="flex flex-col">
                    <p class="text-sm">:</p>
                    <p class="text-sm">:</p>
                    <p class="text-sm">:</p>
                    <p class="text-sm">:</p>
                    <p class="text-sm">:</p>
                    <p class="text-sm">:</p>
                    <p class="text-sm">:</p>
                    <p class="text-sm">:</p>
                </div>

                <div class="flex flex-col">
                    <p class="text-sm" id="umur"></p>
                    <p class="text-sm" id="gula"></p>
                    <p class="text-sm" id="sistolik"></p>
                    <p class="text-sm" id="diastolik"></p>
                    <p class="text-sm" id="berat"></p>
                    <p class="text-sm" id="tinggi"></p>
                    <p class="text-sm" id="imt"></p>
                    <p class="text-sm" id="kategori"></p>
                </div>
            </div>
        </div>
    </div>

</section>

<script>



function openDetail(umur, gula, sistolik, diastolik, berat, tinggi, statusBerat, keterangan, imt, kategori) {
    // Set detail obat dalam modal
    let imtFormatted = parseFloat(imt).toFixed(2);

    document.getElementById('umur').innerText = umur + ' Tahun';
    document.getElementById('gula').innerText = gula + ' mg/dL';
    document.getElementById('sistolik').innerText = sistolik + ' mmHg';
    document.getElementById('diastolik').innerText = diastolik + ' mmHg';
    document.getElementById('berat').innerText = berat + ' Kg ' + ' (' + statusBerat + ')';
    document.getElementById('tinggi').innerText = tinggi + ' Cm';
    document.getElementById('imt').innerText = imtFormatted + ' (' + keterangan + ')';
    document.getElementById('kategori').innerText = kategori;

    // Tampilkan modal
    document.getElementById("myDetail").classList.remove("hidden");
}

// Fungsi untuk menutup modal
function closeDetail() {
    document.getElementById("myDetail").classList.add("hidden");
}

// Menutup modal jika klik di luar konten modal
window.onclick = function(event) {
    const modal = document.getElementById("myDetail");
    if (event.target === modal) {
        closeDetail();
    }
};
</script>


@endsection

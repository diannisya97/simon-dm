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
            <h1 class="text-base text-center font-bold text-black ml-2">Pengingat Obat</h1>
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
    
        <!-- Jika Tidak Ada Data Pengingat Obat -->
        @if($pengingatObat->isEmpty())
        <div class="flex flex-row items-center justify-center bg-[#0BB4A6] w-full py-3 rounded-xl mt-12">
            <h5 class="font-semibold text-[0.65rem] text-center">
                "Ingat obatnya, jaga sehatnya, nikmati harinya!"
            </h5>
        </div>
        <div class="flex flex-row justify-center items-center gap-2 mt-2">
            <!-- ADD -->
            <a href="#" class="p-2 mt-2 bg-[#D9D9D9] rounded-lg flex flex-row" onclick="openModal()">
                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 17C13.866 17 17 13.866 17 10C17 6.13401 13.866 3 10 3C6.13401 3 3 6.13401 3 10C3 13.866 6.13401 17 10 17Z" stroke="black" stroke-width="2"/>
                    <path d="M3.96499 1.13623C3.28659 1.31792 2.66799 1.67502 2.17138 2.17163C1.67478 2.66823 1.31768 3.28683 1.13599 3.96523M16.035 1.13623C16.7134 1.31792 17.332 1.67502 17.8286 2.17163C18.3252 2.66823 18.6823 3.28683 18.864 3.96523M9.99999 6.00023V9.75023C9.99999 9.88823 10.112 10.0002 10.25 10.0002H13" stroke="black" stroke-width="2" stroke-linecap="round"/>
                </svg>
                    
                <h2 class="text-xs px-2">Buat Pengingat</h2>
            </a>
        </div>
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
            <p class="text-base font-semibold">Pengingat Belum ditambahkan</p>
        </div>
        @else
        <!-- Jika Data Ada -->
        <p class="text-sm font-semibold text-center mt-10 mb-2">Jadwal Konsumsi Obat</p>
        @foreach($pengingatObat as $pengingat)
        <div class="flex flex-col gap-2 w-full">
            <div class="w-full bg-white rounded-xl flex flex-row items-center gap-1">
                <div class="w-11/12 bg-[#0BB4A6] rounded-xl py-2 px-3 flex flex-col">
                    <div class="flex flex-row justify-between items-center">
                        <div class="flex flex-col items-start">
                            <p class="text-[13px] font-semibold text-black">
                                {{ \Carbon\Carbon::parse($pengingat->tanggal)->translatedFormat('l, j F Y') }}</p>
                            <p class="text-xs font-reguler text-black">
                                {{ $pengingat->obat }}</p>
                            <p class="text-xs font-reguler text-black">
                                {{ $pengingat->kategori }}</p>
                            <p class="text-xs font-reguler text-black">
                                {{ \Carbon\Carbon::parse($pengingat->pukul)->format('H:i') }} WIB</p>
                        </div>

                        <div class="flex flex-col justify-center items-center gap-1">
                            @if($pengingat->status === 'Terlewatkan')
                            <a href="#" class="flex flex-row justify-between items-center cursor-not-allowed p-1 bg-white rounded-md">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0ZM13.6 5.2C13.4949 5.12121 13.3754 5.06388 13.2482 5.03129C13.121 4.99869 12.9886 4.99148 12.8586 5.01005C12.7286 5.02862 12.6035 5.07262 12.4905 5.13953C12.3775 5.20643 12.2788 5.29494 12.2 5.4L10 8.333L7.8 5.4C7.72121 5.29494 7.62249 5.20643 7.50949 5.13953C7.39649 5.07262 7.27142 5.02862 7.14142 5.01005C7.01142 4.99148 6.87903 4.99869 6.75182 5.03129C6.62461 5.06388 6.50506 5.12121 6.4 5.2C6.29494 5.27879 6.20643 5.37751 6.13953 5.49051C6.07262 5.60351 6.02862 5.72858 6.01005 5.85858C5.99148 5.98858 5.99869 6.12097 6.03129 6.24818C6.06388 6.37539 6.12121 6.49494 6.2 6.6L8.75 10L6.2 13.4C6.04087 13.6122 5.97254 13.8789 6.01005 14.1414C6.04756 14.404 6.18783 14.6409 6.4 14.8C6.61217 14.9591 6.87887 15.0275 7.14142 14.99C7.40397 14.9524 7.64087 14.8122 7.8 14.6L10 11.667L12.2 14.6C12.3591 14.8122 12.596 14.9524 12.8586 14.99C13.1211 15.0275 13.3878 14.9591 13.6 14.8C13.8122 14.6409 13.9524 14.404 13.9899 14.1414C14.0275 13.8789 13.9591 13.6122 13.8 13.4L11.25 10L13.8 6.6C13.8788 6.49494 13.9361 6.37539 13.9687 6.24818C14.0013 6.12097 14.0085 5.98858 13.9899 5.85858C13.9714 5.72858 13.9274 5.60351 13.8605 5.49051C13.7936 5.37751 13.7051 5.27879 13.6 5.2Z"
                                        fill="#FF0000" />
                                </svg>
                            </a>
                            @elseif($pengingat->status === 'Sudah')
                            <a href="#" class="flex flex-row justify-between items-center cursor-not-allowed p-1 bg-white rounded-md">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM8.823 12.14L6.058 9.373L5 10.431L8.119 13.552C8.30653 13.7395 8.56084 13.8448 8.826 13.8448C9.09116 13.8448 9.34547 13.7395 9.533 13.552L15.485 7.602L14.423 6.54L8.823 12.14Z"
                                        fill="#44AF1D" />
                                </svg>
                            </a>
                            @elseif($pengingat->status === 'Menunggu')
                            <a href="{{ route('update-status-sudah', $pengingat->id) }}"
                                class="flex flex-row justify-between items-center p-1 bg-white rounded-md">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM8.823 12.14L6.058 9.373L5 10.431L8.119 13.552C8.30653 13.7395 8.56084 13.8448 8.826 13.8448C9.09116 13.8448 9.34547 13.7395 9.533 13.552L15.485 7.602L14.423 6.54L8.823 12.14Z"
                                        fill="#44AF1D" />
                                </svg>
                            </a>
                            <a href="{{ route('update-status-terlewat', $pengingat->id) }}"
                                class="flex flex-row justify-between items-center p-1 bg-white rounded-md">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0ZM13.6 5.2C13.4949 5.12121 13.3754 5.06388 13.2482 5.03129C13.121 4.99869 12.9886 4.99148 12.8586 5.01005C12.7286 5.02862 12.6035 5.07262 12.4905 5.13953C12.3775 5.20643 12.2788 5.29494 12.2 5.4L10 8.333L7.8 5.4C7.72121 5.29494 7.62249 5.20643 7.50949 5.13953C7.39649 5.07262 7.27142 5.02862 7.14142 5.01005C7.01142 4.99148 6.87903 4.99869 6.75182 5.03129C6.62461 5.06388 6.50506 5.12121 6.4 5.2C6.29494 5.27879 6.20643 5.37751 6.13953 5.49051C6.07262 5.60351 6.02862 5.72858 6.01005 5.85858C5.99148 5.98858 5.99869 6.12097 6.03129 6.24818C6.06388 6.37539 6.12121 6.49494 6.2 6.6L8.75 10L6.2 13.4C6.04087 13.6122 5.97254 13.8789 6.01005 14.1414C6.04756 14.404 6.18783 14.6409 6.4 14.8C6.61217 14.9591 6.87887 15.0275 7.14142 14.99C7.40397 14.9524 7.64087 14.8122 7.8 14.6L10 11.667L12.2 14.6C12.3591 14.8122 12.596 14.9524 12.8586 14.99C13.1211 15.0275 13.3878 14.9591 13.6 14.8C13.8122 14.6409 13.9524 14.404 13.9899 14.1414C14.0275 13.8789 13.9591 13.6122 13.8 13.4L11.25 10L13.8 6.6C13.8788 6.49494 13.9361 6.37539 13.9687 6.24818C14.0013 6.12097 14.0085 5.98858 13.9899 5.85858C13.9714 5.72858 13.9274 5.60351 13.8605 5.49051C13.7936 5.37751 13.7051 5.27879 13.6 5.2Z"
                                        fill="#FF0000" />
                                </svg>
                            </a>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="flex flex-col items-center justify-center">
                    <a href="#" class="p-2 bg-white rounded-lg"
                            onclick="openDetail('{{ $pengingat->obat }}', '{{ $pengingat->jml_obat }}', '{{ $pengingat->tanggal }}', '{{ $pengingat->pukul }}',  '{{ $pengingat->jenis_obat }}')">

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
                    <form action="{{ route('pengingat.destroy', $pengingat->id) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-lg">
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
        <div class="flex flex-row justify-center items-center">
            <!-- ADD -->
            <a href="#" class="p-2 bg-[#D9D9D9] rounded-lg flex flex-row" onclick="openModal()">
                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 17C13.866 17 17 13.866 17 10C17 6.13401 13.866 3 10 3C6.13401 3 3 6.13401 3 10C3 13.866 6.13401 17 10 17Z" stroke="black" stroke-width="2"/>
                    <path d="M3.96499 1.13623C3.28659 1.31792 2.66799 1.67502 2.17138 2.17163C1.67478 2.66823 1.31768 3.28683 1.13599 3.96523M16.035 1.13623C16.7134 1.31792 17.332 1.67502 17.8286 2.17163C18.3252 2.66823 18.6823 3.28683 18.864 3.96523M9.99999 6.00023V9.75023C9.99999 9.88823 10.112 10.0002 10.25 10.0002H13" stroke="black" stroke-width="2" stroke-linecap="round"/>
                </svg>
                    
                <h2 class="text-xs px-2">Buat Pengingat</h2>
            </a>
        </div>
        @endif

    <!-- MODAL -->
    <div id="myModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-6 w-[90%] max-w-lg">
            <h1 class="text-xl font-bold text-center text-[#0BB4A6] uppercase">
                Masukan Pengingat
            </h1>

            <!-- Form di dalam modal -->
            <form class="mt-4 flex flex-col gap-2" action="{{ route('pengingat.store') }}" method="POST">
                @csrf
                <!-- Token CSRF untuk keamanan -->
                <input type="date" name="tanggal"
                    class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                    placeholder="Tanggal" required />

                <input type="text" name="obat"
                    class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                    placeholder="Nama Obat" required />

                <select name="kategori"
                    class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                    required>
                    <option value="" disabled selected>Select Kategori</option>
                    <option value="Sebelum Makan">Sebelum Makan</option>
                    <option value="Sesudah Makan">Sesudah Makan</option>
                    <option value="Sebelum Tidur ">Sebelum Tidur</option>
                </select>

                <input type="number" name="jml_obat"
                    class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                    placeholder="Jumlah Obat" required />

                <select name="jenis_obat"
                    class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                    required>
                    <option value="" disabled selected>Jenis Obat</option>
                    <option value="Kapsul">Kapsul</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Sendok Sirup">Sendok Sirup</option>
                </select>

                <input type="time" name="pukul"
                    class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                    placeholder="Pukul" required />

                <!-- Tombol Submit dan Batal -->
                <button type="submit"
                    class="bg-[#0BB4A6] px-5 py-2 rounded-md font-bold mt-5 w-full text-center text-white">
                    Submit
                </button>
                <button type="button"
                    class="bg-white px-5 py-2 border-2 border-[#0BB4A6] rounded-md font-bold mt-3 w-full text-center text-[#0BB4A6]"
                    onclick="closeModal()">
                    Batal
                </button>
            </form>
        </div>
    </div>

    <!-- ModalDetail -->
    <div id="myDetail" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-6 w-[90%] max-w-lg">
            <h1 class="text-xl font-bold text-center text-[#0BB4A6]">
                Detail Pengingat
            </h1>
            <div class="mt-4 flex flex-col gap-2">
                <div id="detail-obat"
                    class="mt-1 px-3 py-3 bg-white border shadow-sm border-black block w-full rounded-md sm:text-sm">
                    Obat:
                </div>
                <div id="detail-jml"
                    class="mt-1 px-3 py-3 bg-white border shadow-sm border-black block w-full rounded-md sm:text-sm">
                    Jumlah:
                </div>
                <div id="detail-tanggal"
                    class="mt-1 px-3 py-3 bg-white border shadow-sm border-black block w-full rounded-md sm:text-sm">
                    Tanggal:
                </div>
                <div id="detail-waktu"
                    class="mt-1 px-3 py-3 bg-white border shadow-sm border-black block w-full rounded-md sm:text-sm">
                    Waktu:
                </div>
            </div>
            <!-- Tombol Close -->
            <button type="button" class="bg-[#0BB4A6] px-5 py-2 rounded-md font-bold mt-3 w-full text-center text-white"
                onclick="closeDetail()">
                Close
            </button>
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

// Fungsi untuk membuka detail
function openDetail(obat, jml, tanggal, waktu, jenis) {
    // Set detail obat dalam modal
    document.getElementById('detail-obat').innerText = 'Obat: ' + obat;
    document.getElementById('detail-jml').innerText = 'Jumlah: ' + jml + ' ' + jenis ;
    document.getElementById('detail-tanggal').innerText = 'Tanggal: ' + tanggal;
    document.getElementById('detail-waktu').innerText = 'Waktu: ' + waktu;

    // Tampilkan modal
    document.getElementById("myDetail").classList.remove("hidden");
}

// Fungsi untuk menutup detail
function closeDetail() {
    document.getElementById("myDetail").classList.add("hidden");
}

// Gabungkan event handler untuk menutup modal dan detail jika klik di luar konten
window.onclick = function(event) {
    const modal = document.getElementById("myModal");
    const detail = document.getElementById("myDetail");

    // Jika klik di luar modal, tutup modal
    if (event.target === modal) {
        closeModal();
    }

    // Jika klik di luar detail, tutup detail
    if (event.target === detail) {
        closeDetail();
    }
};
</script>



@endsection

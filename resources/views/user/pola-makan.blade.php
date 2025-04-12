@extends('layout.app') @section('content')
<section
    class="h-[730px] w-[350px] m-auto overflow-hidden bg-slate-100 bg-cover bg-center rounded-3xl flex flex-col items-center container-snap overflow-y-auto scale-90">

    <div class="absolute top-0 bg-[#0BB4A6] w-full px-7 py-[18px] flex flex-row items-center justify-between">
        <a href="{{route('dashboard')}}">
            <svg width="13" height="17" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.49896 10.525L11.6722 3.35177C11.9664 3.05752 12.1212 2.70332 12.1204 2.29949C12.1196 1.89648 11.9652 1.54283 11.6727 1.24869C11.3795 0.953986 11.0231 0.796625 10.6143 0.787062C10.2014 0.777404 9.84013 0.92672 9.54363 1.22322L1.84363 8.92322C1.62092 9.14593 1.4515 9.39913 1.33829 9.68215C1.2274 9.95938 1.17041 10.2408 1.17041 10.525C1.17041 10.8092 1.2274 11.0906 1.33829 11.3678C1.4515 11.6509 1.62092 11.9041 1.84363 12.1268L1.84392 12.1271L9.54387 19.802C9.83807 20.0954 10.192 20.25 10.5954 20.25C10.9988 20.25 11.3528 20.0954 11.647 19.802C11.9401 19.5097 12.0987 19.1579 12.1083 18.756C12.1181 18.3498 11.9673 17.9933 11.6722 17.6982L4.49896 10.525Z" fill="black" stroke="black" stroke-width="0.5"/>
            </svg>                              
        </a>
        <div class="flex flex-col">
            <h1 class="text-base text-center font-bold text-black ml-2">Pilihan Pola Makan</h1>
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
    
    <!-- Daftar gambar makanan -->
    <div class="flex flex-col justify-center items-center gap-2 w-full mt-20 px-7">
        <!-- Jika catatan kesehatan belum ada, tampilkan tombol Tambah -->
        <div class="flex flex-row items-center justify-center bg-[#0BB4A6] w-full py-3 rounded-xl">
            <h5 class="font-semibold text-[0.65rem] text-center">"Kontrol pola makan dengan kesadaran, gula darah tetap aman, tubuh sehat dan hidup nyaman!"</h5>
        </div>
    </div>

    <div class="grid grid-cols-3 grid-rows-4 gap-y-4 gap-x-2 w-full p-5 rounded-2xl">
        <!-- Kacang -->
        <div class="flex flex-col gap-2 items-center rounded-xl">
            <a href="#"
                class=" rounded-xl flex flex-col justify-center items-center w-11/12 overflow-auto"
                onclick="openModal('Kacang - Kacangan')">
                <img src="{{ asset('assets/kacang-kacangan.png') }}" alt="" class="rounded-xl">  
                <p class="text-[0.55rem] font-semibold text-center mt-1">Kacang-Kacangan</p>
            </a>
        </div>

        <!-- Biji - bijian -->
        <div class="flex flex-col gap-2 items-center rounded-xl">
            <a href="#"
                class=" rounded-xl flex flex-col justify-center items-center w-11/12 overflow-auto"
                onclick="openModal('Biji-bijian')">
                <img src="{{ asset('assets/biji-bijian.png') }}" alt="" class="rounded-xl">  
                <p class="text-[0.55rem] font-semibold text-center mt-1">Biji - Bijian</p>
            </a>
        </div>

        <!-- Daging -->
        <div class="flex flex-col gap-2 items-center rounded-xl">
            <a href="#"
                class=" rounded-xl flex flex-col justify-center items-center w-11/12 overflow-auto"
                onclick="openModal('Daging')">
                <img src="{{ asset('assets/daging.png') }}" alt="" class="rounded-xl">  
                <p class="text-[0.55rem] font-semibold text-center mt-1">Daging</p>
            </a>
        </div>

        <!-- Roti & Sereal -->
        <div class="flex flex-col gap-2 items-center rounded-xl">
            <a href="#"
                class=" rounded-xl flex flex-col justify-center items-center w-11/12 overflow-auto"
                onclick="openModal('Roti dan Sereal')">
                <img src="{{ asset('assets/roti-sereal.png') }}" alt="" class="rounded-xl">  
                <p class="text-[0.55rem] font-semibold text-center mt-1">Roti & Sereal</p>
            </a>
        </div>

        <!-- Nasi -->
        <div class="flex flex-col gap-2 items-center rounded-xl">
            <a href="#"
                class=" rounded-xl flex flex-col justify-center items-center w-11/12 overflow-auto"
                onclick="openModal('Nasi')">
                <img src="{{ asset('assets/nasi.png') }}" alt="" class="rounded-xl">  
                <p class="text-[0.55rem] font-semibold text-center mt-1">Nasi</p>
            </a>
        </div>

        <!-- Buah - buahan -->
        <div class="flex flex-col gap-2 items-center rounded-xl">
            <a href="#"
                class=" rounded-xl flex flex-col justify-center items-center w-11/12 overflow-auto"
                onclick="openModal('Buah - Buahan')">
                <img src="{{ asset('assets/buah-buahan.png') }}" alt="" class="rounded-xl">  
                <p class="text-[0.55rem] font-semibold text-center mt-1">Buah - Buahan</p>
            </a>
        </div>

        <!-- Junkfood -->
        <div class="flex flex-col gap-2 items-center rounded-xl">
            <a href="#"
                class=" rounded-xl flex flex-col justify-center items-center w-11/12 overflow-auto"
                onclick="openModal('Junkfood')">
                <img src="{{ asset('assets/junkfood.png') }}" alt="" class="rounded-xl">  
                <p class="text-[0.55rem] font-semibold text-center mt-1">Junkfood</p>
            </a>
        </div>

        <!-- Minuman -->
        <div class="flex flex-col gap-2 items-center rounded-xl">
            <a href="#"
                class=" rounded-xl flex flex-col justify-center items-center w-11/12 overflow-auto"
                onclick="openModal('Minuman')">
                <img src="{{ asset('assets/minuman.png') }}" alt="" class="rounded-xl">  
                <p class="text-[0.55rem] font-semibold text-center mt-1">Minuman</p>
            </a>
        </div>

        <!-- Sayuran -->
        <div class="flex flex-col gap-2 items-center rounded-xl">
            <a href="#"
                class=" rounded-xl flex flex-col justify-center items-center w-11/12 overflow-auto"
                onclick="openModal('Sayuran')">
                <img src="{{ asset('assets/sayuran.png') }}" alt="" class="rounded-xl">  
                <p class="text-[0.55rem] font-semibold text-center mt-1">Sayuran</p>
            </a>
        </div>

        <!-- Seafood -->
        <div class="flex flex-col gap-2 items-center rounded-xl">
            <a href="#"
                class=" rounded-xl flex flex-col justify-center items-center w-11/12 overflow-auto"
                onclick="openModal('Seafood')">
                <img src="{{ asset('assets/seafood.png') }}" alt="" class="rounded-xl">  
                <p class="text-[0.55rem] font-semibold text-center mt-1">Seafood</p>
            </a>
        </div>

        <!-- Telur -->
        <div class="flex flex-col gap-2 items-center rounded-xl">
            <a href="#"
                class=" rounded-xl flex flex-col justify-center items-center w-11/12 overflow-auto"
                onclick="openModal('Telur')">
                <img src="{{ asset('assets/telur.png') }}" alt="" class="rounded-xl">  
                <p class="text-[0.55rem] font-semibold text-center mt-1">Telur</p>
            </a>
        </div>
    </div>

    <div id="myModal" class="fixed inset-0 flex flex-col items-center bg-slate-100 z-50 p-4 text-center hidden mb-4">
        <div class="absolute top-0 bg-[#0BB4A6] w-full px-7 py-[18px] flex flex-row items-center justify-between">
            <button onclick="closeModal()">
                <svg width="13" height="17" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.49896 10.525L11.6722 3.35177C11.9664 3.05752 12.1212 2.70332 12.1204 2.29949C12.1196 1.89648 11.9652 1.54283 11.6727 1.24869C11.3795 0.953986 11.0231 0.796625 10.6143 0.787062C10.2014 0.777404 9.84013 0.92672 9.54363 1.22322L1.84363 8.92322C1.62092 9.14593 1.4515 9.39913 1.33829 9.68215C1.2274 9.95938 1.17041 10.2408 1.17041 10.525C1.17041 10.8092 1.2274 11.0906 1.33829 11.3678C1.4515 11.6509 1.62092 11.9041 1.84363 12.1268L1.84392 12.1271L9.54387 19.802C9.83807 20.0954 10.192 20.25 10.5954 20.25C10.9988 20.25 11.3528 20.0954 11.647 19.802C11.9401 19.5097 12.0987 19.1579 12.1083 18.756C12.1181 18.3498 11.9673 17.9933 11.6722 17.6982L4.49896 10.525Z" fill="black" stroke="black" stroke-width="0.5"/>
                </svg>                              
            </button>
            
            <div class="flex flex-col">
                <h1 class="text-base text-center font-bold text-black ml-2">Pilihan Pola Makan</h1>
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

        <div class="relative flex flex-col w-full mt-10">
            <h2 id="modalTitle" class="text-base font-semibold mt-4"></h2>
            <div id="makananContainer" class="flex flex-col gap-2 mt-2"></div>
        </div>

        <div class="w-full py-5 bg-slate-100"></div>
        
    </div>
</section>
<script>
    const giziData = {
        "Kacang - Kacangan": {
            "Buncis": {
                takaran: "100 gram",
                protein: "1,82 gr (20%)",
                karbo: "7,13 gr (77%)",
                lemak: "0,12 gr (3%)",
                kalori: "31 kkal"
            },
            "Kacang Panjang Hijau": {
                takaran: "100 gram",
                protein: "1,82 gr (20%)",
                karbo: "7,13 gr (77%)",
                lemak: "0,12 gr (3%)",
                kalori: "31 kkal"
            },
            "Kacang Panjang Hijau Kalengan": {
                takaran: "100 gram",
                protein: "1,12 gr (10%)",
                karbo: "4,41 gr (38%)",
                lemak: "2,75 gr (53%)",
                kalori: "43 kkal"
            },
            "Kacang Merah": {
                takaran: "100 gram",
                protein: "5,25 gr (24%)",
                karbo: "15,59 gr (72%)",
                lemak: "0,34 gr (4%)",
                kalori: "85 kkal"
            },
            "Kacang Hitam": {
                takaran: "100 gram",
                protein: "6,03 gr (26%)",
                karbo: "16,56 gr (71%)",
                lemak: "0,29 gr (3%)",
                kalori: "91 kkal"
            },
            "Kacang Panggang": {
                takaran: "100 gram",
                protein: "5,54 gr (14%)",
                karbo: "21,39 gr (56%)",
                lemak: "5,15 gr (30%)",
                kalori: "151 kkal"
            }
        },
        
        "Biji-bijian": {
            "Biji Bunga Matahari (Sangrai, dikuliti)": {
                takaran: "100 gram",
                protein: "19,33 gr (12%)",
                karbo: "24,07 gr (15%)",
                lemak: "49,8 gr (72%)",
                kalori: "582 kkal"
            },
            "Kacang Almond": {
                takaran: "100 gram",
                protein: "21,26 gr (14%)",
                karbo: "19,74 gr (13%)",
                lemak: "50,64 gr (74%)",
                kalori: "578 kkal"
            },
            "Kacang Kedelai": {
                takaran: "100 gram",
                protein: "35,22 gr (28%)",
                karbo: "33,55 gr (27%)",
                lemak: "25,4 gr (45%)",
                kalori: "471 kkal"
            },
            "Kacang Mete": {
                takaran: "100 gram",
                protein: "16,84 gr (11%)",
                karbo: "30,16 gr (20%)",
                lemak: "47,77 gr (70%)",
                kalori: "581 kkal"
            },
            "Kacang Tanah": {
                takaran: "100 gram",
                protein: "25,8 gr (17%)",
                karbo: "16,13 gr (11%)",
                lemak: "49,24 gr (73%)",
                kalori: "567 kkal"
            }
        },

        "Daging": {
            "Ayam": {
                takaran: "100 gram",
                protein: "27,07 gr (47%)",
                karbo: "0 gr (0%)",
                lemak: "13,49 gr (53%)",
                kalori: "237 kkal"
            },
            "Ayam tanpa Kulit": {
                takaran: "100 gram",
                protein: "28,69 gr (63%)",
                karbo: "0 gr (0%)",
                lemak: "7,35 gr (37%)",
                kalori: "188 kkal"
            },
            "Dada Ayam": {
                takaran: "100 gram",
                protein: "29,55 gr (63%)",
                karbo: "0 gr (0%)",
                lemak: "7,72 gr (37%)",
                kalori: "195 kkal"
            },
            "Sayap Ayam": {
                takaran: "1 potong",
                protein: "7,46 gr (38%)",
                karbo: "0 gr (0%)",
                lemak: "5,4 gr (62%)",
                kalori: "81 kkal"
            },
            "Paha Ayam": {
                takaran: "1 potong",
                protein: "13,67 gr (42%)",
                karbo: "0 gr (0%)",
                lemak: "8,45 gr (58%)",
                kalori: "135 kkal"
            },
            "Bebek": {
                takaran: "100 gram",
                protein: "18,28 gr (58%)",
                karbo: "0 gr (0%)",
                lemak: "5,95 gr (42%)",
                kalori: "132 kkal"
            },
            "Domba": {
                takaran: "1 Potong",
                protein: "prot 15,86 gr (29%)",
                karbo: "0 gr (0%)",
                lemak: "17,55 gr (71%)",
                kalori: "226 kkal"
            },
            "Sapi": {
                takaran: "1 ons",
                protein: "7,46 gr (37%)",
                karbo: "0 gr (0%)",
                lemak: "5,54 gr (63%)",
                kalori: "82 kkal"
            },
            "Kambing": {
                takaran: "1 potong",
                protein: "20,6 gr (80%)",
                karbo: "0 gr (0%)",
                lemak: "2,31 gr (20%)",
                kalori: "109 kkal"
            }
        },

        "Roti dan Sereal": {
            "Oatmeal": {
                takaran: "100 gram",
                protein: "2,59 gr (16%)",
                karbo: "10,84 gr (69%)",
                lemak: "1,02 gr (15%)",
                kalori: "62 kkal"
            },
            "Roti Gandum": {
                takaran: "1 iris",
                protein: "2,37 gr (14%)",
                karbo: "12,26 gr (72%)",
                lemak: "1,07 gr (14%)",
                kalori: "67 kkal"
            },
            "Roti Tawar": {
                takaran: "1 iris",
                protein: "1,91 gr (12%)",
                karbo: "12,65 gr (77%)",
                lemak: "0,82 gr (11%)",
                kalori: "66 kkal"
            },
            "Sereal": {
                takaran: "1 mangkok/33 gram",
                protein: "2,39 gr (7%)",
                karbo: "27,4 gr (85%)",
                lemak: "1,12 gr (8%)",
                kalori: "124 kkal"
            }
        },

        "Nasi": {
            "Nasi Putih": {
                takaran: "100 gram",
                protein: "2,66 gr (9%)",
                karbo: "27,9 gr (89%)",
                lemak: "0,28 gr (2%)",
                kalori: "129 kkal"
            },
            "Nasi Merah": {
                takaran: "100 gram",
                protein: "2,56 gr (9%)",
                karbo: "22,78 gr (83%)",
                lemak: "0,89 gr (7%)",
                kalori: "110 kkal"
            },
            "Nasi Ketan": {
                takaran: "100 gram",
                protein: "2,02 gr (9%)",
                karbo: "21,09 gr (90%)",
                lemak: "0,19 gr (2%)",
                kalori: "97 kkal"
            }
        },
        
        "Buah - Buahan": {
            "Pepaya": {
                takaran: "100 gram",
                protein: "0,61 gr (6%)",
                karbo: "9,81 gr (91%)",
                lemak: "0,14 gr (3%)",
                kalori: "39 kkal"
            },
            "Melon": {
                takaran: "1/8 irisan",
                protein: "0,58 gr (9%)",
                karbo: "5,63 gr (87%)",
                lemak: "0,13 gr (5%)",
                kalori: "23 kkal"
            },
            "Pisang Kecil": {
                takaran: "15 cm - 17,5 cm (1 buah)",
                protein: "1,1 gr (4%)",
                karbo: "23,07 gr (93%)",
                lemak: "0,33 gr (3%)",
                kalori: "90 kkal"
            },
            "Pisang Sedang": {
                takaran: "18 cm - 20 cm (1 buah)",
                protein: "1,29 gr (4%)",
                karbo: "26,95 gr (93%)",
                lemak: "0,39 gr (3%)",
                kalori: "105 kkal"
            },
            "Pisang Besar": {
                takaran: ">20 cm (1 buah)",
                protein: "1,48 gr (4%)",
                karbo: "31,06 gr (93%)",
                lemak: "0,45 gr (3%)",
                kalori: "121 kkal"
            },
            "Jeruk": {
                takaran: "1 buah",
                protein: "1,23 gr (7%)",
                karbo: "15,39 gr (91%)",
                lemak: "0,16 gr (2%)",
                kalori: "62 kkal"
            },
            "Pir": {
                takaran: "100 gram",
                protein: "0,38 gr (2%)",
                karbo: "15,46 gr (96%)",
                lemak: "0,12 gr (2%)",
                kalori: "58 kkal"
            },
            "Stroberi": {
                takaran: "1 butir",
                protein: "0,08 gr (7%)",
                karbo: "0,92 gr (85%)",
                lemak: "0,04 gr (7%)",
                kalori: "4 kkal"
            },
            "Alpukat": {
                takaran: "1 buah",
                protein: "4,02 gr (5%)",
                karbo: "17,15 gr (20%)",
                lemak: "29,47 gr (76%)",
                kalori: "322 kkal"
            },
            "Anggur": {
                takaran: "1 butir",
                protein: "0,04 gr (4%)",
                karbo: "0,9 gr (94%)",
                lemak: "0,01 gr (2%)",
                kalori: "3 kkal"
            },
            "Apel": {
                takaran: "1 buah",
                protein: "0,36 gr (2%)",
                karbo: "19,06 gr (96%)",
                lemak: "0,23 gr (3%)",
                kalori: "72 kkal"
            },
            "Kelapa": {
                takaran: "1 buah",
                protein: "1,5 gr (4%)",
                karbo: "6,85 gr (16%)",
                lemak: "15,07 gr (80%)",
                kalori: "159 kkal"
            },
            "Semangka": {
                takaran: "100 gram",
                protein: "0,61 gr (7%)",
                karbo: "7,61 gr (89%)",
                lemak: "0,15 gr (4%)",
                kalori: "30 kkal"
            },
            "Kurma": {
                takaran: "1 butir",
                protein: "0,2 gr (3%)",
                karbo: "6,23 gr (96%)",
                lemak: "0,03 gr (1%)",
                kalori: "23 kkal"
            }
        },

        "Junkfood": {
            "Nugget": {
                takaran: "1 butir",
                protein: "2,49 gr (21%)",
                karbo: "2,61 gr (22%)",
                lemak: "3,01 gr (57%)",
                kalori: "48 kkal"
            },
            "Kentang Goreng": {
                takaran: "100 gram",
                protein: "3,48 gr (5%)",
                karbo: "35,66 gr (50%)",
                lemak: "14,06 gr (45%)",
                kalori: "274 kkal"
            },
            "Pizza Keju": {
                takaran: "1 slice",
                protein: "10,6 gr (18%)",
                karbo: "26,08 gr (44%)",
                lemak: "10,1 gr (38%)",
                kalori: "237 kkal"
            }
        },

        "Minuman": {
            "Air Putih": {
                takaran: "1 gelas/240 ml",
                protein: "0 gr (0%)",
                karbo: "0 gr (0%)",
                lemak: "0 gr (0%)",
                kalori: "0 kkal"
            },
            "Kopi dengan Susu": {
                takaran: "1 cangkir",
                protein: "0,33 gr (22%)",
                karbo: "0,84 gr (56%)",
                lemak: "0,15 gr (22%)",
                kalori: "6 kkal"
            },
            "Kopi dengan Susu dan Gula": {
                takaran: "1 cangkir",
                protein: "0,31 gr (4%)",
                karbo: "7,14 gr (92%)",
                lemak: "0,14 gr (4%)",
                kalori: "30 kkal"
            },
            "Es Teh": {
                takaran: "1 gelas/240 ml",
                protein: "0,02 gr (0%)",
                karbo: "23,44 gr (100%)",
                lemak: "0 gr (0%)",
                kalori: "90 kkal"
            },
            "Kopi": {
                takaran: "1 cangkir",
                protein: "0,28 gr (59%)",
                karbo: "0,09 gr (20%)",
                lemak: "0,05 gr (22%)",
                kalori: "2 kkal"
            },
            "Susu": {
                takaran: "1 gelas",
                protein: "8,03 gr (26%)",
                karbo: "11,49 gr (38%)",
                lemak: "4,88 gr (36%)",
                kalori: "122 kkal"
            },
            "Susu Murni": {
                takaran: "1 gelas",
                protein: "3,32 gr (21%)",
                karbo: "4,66 gr (30%)",
                lemak: "3,35 gr (49%)",
                kalori: "62 kkal"
            },
            "Susu Kedelai": {
                takaran: "100 ml",
                protein: "4,64 gr (33%)",
                karbo: "5,1 gr (36%)",
                lemak: "1,99 gr (31%)",
                kalori: "54 kkal"
            },
            "Teh Herbal": {
                takaran: "1 cangkir",
                protein: "0 gr (0%)",
                karbo: "0,47 gr (100%)",
                lemak: "0 gr (0%)",
                kalori: "2 kkal"
            },
            "Teh Hijau": {
                takaran: "1 cangkir",
                protein: "0 gr (0%)",
                karbo: "0,36 gr (100%)",
                lemak: "0 gr (0%)",
                kalori: "2 kkal"
            },
            "Teh Tawar": {
                takaran: "1 cangkir",
                protein: "0,02 gr (3%)",
                karbo: "0,76 gr (97%)",
                lemak: "0 gr (0%)",
                kalori: "2 kkal"
            }
        },

        "Sayuran": {
            "Bawang Merah": {
                takaran: "1 siung",
                protein: "0,64 gr (8%)",
                karbo: "7,08 gr (90%)",
                lemak: "0,06 gr (2%)",
                kalori: "29 kkal"
            },
            "Bawang Putih": {
                takaran: "1 siung",
                protein: "0,19 gr (16%)",
                karbo: "0,99 gr (82%)",
                lemak: "0,02 gr (3%)",
                kalori: "4 kkal"
            },
            "Bayam": {
                takaran: "1 ikat",
                protein: "9,72 gr (39%)",
                karbo: "12,34 gr (49%)",
                lemak: "1,33 gr (12%)",
                kalori: "23 kkal"
            },
            "Brokoli": {
                takaran: "1 tangkai",
                protein: "4,26 gr (27%)",
                karbo: "10,03 gr (65%)",
                lemak: "0,56 gr (8%)",
                kalori: "51 kkal"
            },
            "Jagung": {
                takaran: "1 bonggol sedang",
                protein: "2,9 gr (13%)",
                karbo: "17,12 gr (76%)",
                lemak: "1,06 gr (11%)",
                kalori: "77 kkal"
            },
            "Jamur": {
                takaran: "100 gram",
                protein: "3,09 gr (43%)",
                karbo: "3,28 gr (46%)",
                lemak: "0,34 gr (11%)",
                kalori: "22 kkal"
            },
            "Kentang": {
                takaran: "1 buah ukuran sedang",
                protein: "10 gr (3,58%)",
                karbo: "33,46 gr (89%)",
                lemak: "0,21 gr (1%)",
                kalori: "149 kkal"
            },
            "Kubis": {
                takaran: "1 daun, sedang",
                protein: "1,44 gr (20%)",
                karbo: "5,58 gr (77%)",
                lemak: "0,12 gr (4%)",
                kalori: "24 kkal"
            },
            "Selada": {
                takaran: "1 daun, sedang",
                protein: "0,07 gr (22%)",
                karbo: "0,24 gr (71%)",
                lemak: "0,01 gr (8%)",
                kalori: "1 kkal"
            },
            "Tomat": {
                takaran: "1 buah, kecil",
                protein: "0,8 gr (17%)",
                karbo: "3,57 gr (75%)",
                lemak: "0,18 gr (9%)",
                kalori: "16 kkal"
            },
            "Wortel": {
                takaran: "1 buah, sedang",
                protein: "0,57 gr (8%)",
                karbo: "5,84 gr (87%)",
                lemak: "0,15 gr (5%)",
                kalori: "25 kkal"
            },
            "Timun": {
                takaran: "1 buah",
                protein: "1,96 gr (14%)",
                karbo: "10,93 gr (80%)",
                lemak: "0,33 gr (5%)",
                kalori: "45 kkal"
            }
        },

        "Seafood": {
            "Cumi-cumi": {
                takaran: "100 gram",
                protein: "15,58 gr (72%)",
                karbo: "3,08 gr (14%)",
                lemak: "1,38 gr (14%)",
                kalori: "92 kkal"
            },
            "Gurita": {
                takaran: "100 gram",
                protein: "14,91 gr (77%)",
                karbo: "2,2 gr (11%)",
                lemak: "1,04 gr (12%)",
                kalori: "82 kkal"
            },
            "Kepiting": {
                takaran: "100 gram",
                protein: "20,03 gr (83%)",
                karbo: "0 gr (0%)",
                lemak: "1,76 gr (17%)",
                kalori: "101 kkal"
            },
            "Udang": {
                takaran: "1 ekor",
                protein: "1,66 gr (81%)",
                karbo: "0,07 gr (4%)",
                lemak: "0,14 gr (15%)",
                kalori: "9 kkal"
            },
            "Ikan Salmon": {
                takaran: "100 gram",
                protein: "21,62 gr (62%)",
                karbo: "0 gr (0%)",
                lemak: "5,93 gr (38%)",
                kalori: "146 kkal"
            }
        },

        "Telur": {
            "Telur": {
                takaran: "1 butir",
                protein: "6,29 gr (35%)",
                karbo: "0,38 gr (2%)",
                lemak: "4,97 gr (63%)",
                kalori: "74 kkal"
            },
            "Kuning Telur": {
                takaran: "1 butir",
                protein: "2,69 gr (20%)",
                karbo: "0,61 gr (5%)",
                lemak: "4,49 gr (75%)",
                kalori: "55 kkal"
            },
            "Putih Telur": {
                takaran: "1 butir",
                protein: "3,58 gr (91%)",
                karbo: "0,24 gr (6%)",
                lemak: "0,06 gr (3%)",
                kalori: "17 kkal"
            },
            "Telur Dadar": {
                takaran: "1 pcs",
                protein: "6,48 gr (28%)",
                karbo: "0,42 gr (2%)",
                lemak: "7,33 gr (71%)",
                kalori: "93 kkal"
            },
            "Telur Rebus": {
                takaran: "1 butir",
                protein: "6,26 gr (33%)",
                karbo: "0,56 gr (3%)",
                lemak: "5,28 gr (64%)",
                kalori: "77 kkal"
            }
        }
    };
// Fungsi membuka modal dan mengisi data
function openModal(category) {
    document.getElementById("modalTitle").innerText = category;
    generateMakananList(category);
    document.getElementById("myModal").classList.remove("hidden");
}

// Fungsi untuk membuat daftar makanan dalam modal
function generateMakananList(category) {
    const container = document.getElementById("makananContainer");
    container.innerHTML = ""; // Reset isi modal

    for (const makanan in giziData[category]) {
        let idDropdown = `dropdown-${makanan.replace(/\s/g, '')}`;

        // Tombol dropdown
        let button = document.createElement("button");
        button.className = "text-xs bg-gray-200 py-2 px-4 rounded-lg font-semibold w-full flex flex-row justify-between items-center cursor-pointer";
        button.onclick = () => toggleDropdown(idDropdown);

        // Nama makanan (kiri)
        let makananText = document.createElement("span");
        makananText.textContent = makanan;

        // Panah ">" (kanan)
        let arrowIcon = document.createElement("span");
        arrowIcon.textContent = ">";
        arrowIcon.className = "text-gray-600 text-lg font-semibold";

        // Menyusun elemen dalam button
        button.appendChild(makananText);
        button.appendChild(arrowIcon);


        // Konten dropdown
        let dropdown = document.createElement("div");
        dropdown.className = "hidden text-xs bg-slate-100 rounded-lg text-start px-4";
        dropdown.id = idDropdown;
        dropdown.innerHTML = `
            <ul class="list-disc list-inside text-xs">
                <li><strong>Takaran:</strong> ${giziData[category][makanan].takaran}</li>
                <li><strong>Protein:</strong> ${giziData[category][makanan].protein}</li>
                <li><strong>Karbohidrat:</strong> ${giziData[category][makanan].karbo}</li>
                <li><strong>Lemak:</strong> ${giziData[category][makanan].lemak}</li>
                <li><strong>Kalori:</strong> ${giziData[category][makanan].kalori}</li>
            </ul>
        `;

        // Tambahkan ke modal
        container.appendChild(button);
        container.appendChild(dropdown);
    }
}

// Fungsi untuk menampilkan/menghilangkan dropdown
function toggleDropdown(id) {
    const dropdown = document.getElementById(id);
    dropdown.classList.toggle("hidden");
}

// Fungsi menutup modal
function closeModal() {
    document.getElementById("myModal").classList.add("hidden");
}

</script>
@endsection

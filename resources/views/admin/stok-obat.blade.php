@extends('layout.app')

@section('content')
<section
    class="h-[730px] w-[350px] m-auto overflow-hidden bg-slate-100 bg-cover bg-center rounded-3xl flex flex-col items-center container-snap overflow-y-auto scale-90 p-5">
    <div class="absolute top-0 bg-[#0BB4A6] w-full px-7 py-[18px] flex flex-row items-center justify-between">
        <a href="{{route('dashboard')}}">
            <svg width="13" height="17" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.49896 10.525L11.6722 3.35177C11.9664 3.05752 12.1212 2.70332 12.1204 2.29949C12.1196 1.89648 11.9652 1.54283 11.6727 1.24869C11.3795 0.953986 11.0231 0.796625 10.6143 0.787062C10.2014 0.777404 9.84013 0.92672 9.54363 1.22322L1.84363 8.92322C1.62092 9.14593 1.4515 9.39913 1.33829 9.68215C1.2274 9.95938 1.17041 10.2408 1.17041 10.525C1.17041 10.8092 1.2274 11.0906 1.33829 11.3678C1.4515 11.6509 1.62092 11.9041 1.84363 12.1268L1.84392 12.1271L9.54387 19.802C9.83807 20.0954 10.192 20.25 10.5954 20.25C10.9988 20.25 11.3528 20.0954 11.647 19.802C11.9401 19.5097 12.0987 19.1579 12.1083 18.756C12.1181 18.3498 11.9673 17.9933 11.6722 17.6982L4.49896 10.525Z" fill="black" stroke="black" stroke-width="0.5"/>
            </svg>                              
        </a>
        <div class="flex flex-col">
            <h1 class="text-base text-center font-bold text-black ml-2">Stok Obat</h1>
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

    <div class="w-full mt-14 flex flex-row justify-between">
        <form method="GET" action="{{ route('admin.stok-obat') }}" class="rounded-xl w-full flex flex-row justify-between">
            <input type="text" name="search" id="search" placeholder="Cari Obat" value="{{ request('search') }}"
                class="rounded-xl border-none placeholder-slate-400 placeholder:text-xs focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] w-[70%] bg-white text-xs py-2.5">
            <button type="submit"
                    class="w-[25%] bg-[#0BB4A6] text-white text-xs flex items-center justify-center rounded-xl">Search</button>
        </form>
    </div>

    <!-- Jika Tidak Ada Data Stok Obat -->
    @if($stokObats->isEmpty())
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
        <p class="text-base font-semibold">Stok Belum ditambahkan</p>
    </div>

    <div class="flex flex-row justify-center items-center mt-3">
        <!-- ADD -->
        <a href="#" class="p-2 bg-[#0BB4A6] rounded-lg flex flex-row" onclick="openModal('modalTambah')">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.5033 10.5983C14.9462 9.99944 14.1915 9.63492 13.3782 9.57188L13.3572 9.57027L4.16784 9.56126C2.37721 9.56126 0.92041 11.0181 0.92041 12.8087C0.92041 14.5994 2.37721 16.0562 4.16784 16.0562H4.1684L13.3362 16.0471L13.3782 16.0455C14.1915 15.9825 14.9462 15.618 15.5033 15.0191C16.0636 14.4168 16.3721 13.6318 16.3721 12.8087C16.3721 11.9857 16.0636 11.2007 15.5033 10.5983ZM8.74002 14.9497L4.16744 14.9541C2.98471 14.9539 2.02246 13.9916 2.02246 12.8088C2.02246 11.6258 2.98487 10.6633 4.16728 10.6633L8.74002 10.6678V14.9497ZM2.35679 8.5238C2.91002 8.92773 3.59042 9.1502 4.27261 9.15027H4.27274C4.50646 9.15027 4.74123 9.12464 4.97049 9.07407L4.99105 9.06955L13.7877 6.4121C15.5014 5.89261 16.4729 4.07582 15.9534 2.36215C15.7472 1.68191 15.3355 1.1013 14.7628 0.682982C14.2094 0.278753 13.5288 0.0561523 12.8466 0.0561523C12.5268 0.0563238 12.2089 0.103676 11.903 0.196679L3.13206 2.86511L3.09231 2.87887C2.33228 3.17513 1.71581 3.74291 1.35644 4.47764C0.994995 5.2166 0.927469 6.05739 1.16623 6.84506C1.37247 7.5252 1.78416 8.10568 2.35679 8.5238ZM12.2232 1.25119C12.4253 1.18971 12.6354 1.15837 12.8466 1.1582C13.7829 1.1582 14.6268 1.78477 14.8987 2.68187C15.2419 3.81397 14.6001 5.01422 13.4685 5.35726L9.09124 6.6796L7.84899 2.58201L12.2232 1.25119Z" fill="white"/>
            </svg>
                               
            <h2 class="text-xs px-2 text-white">Tambah Stok Obat</h2>
        </a>
    </div>

    @else

    <!-- Jika data ada -->
    <div class="flex flex-col justify-center items-center w-full mt-3">
    @foreach($stokObats as $obat)
        <div class="flex flex-row items-center justify-between w-full p-2">
            <div class="flex flex-col items-start justify-center">
                <h1 class="text-sm font-semibold">
                    {{ $obat->nama_obat }} ({{ $obat->takaran }}{{ $obat->jenis_obat == 'sirup' ? 'ml' : 'mg' }})
                </h1>
                <div class="flex flex-row justify-center items-center gap-2">
                    <h2 class="text-xs font-normal">Stok : {{ $obat->stok }} {{ $obat->jenis_obat == 'sirup' ? 'pcs' : 'lembar' }}</h2>
                    <span class="border-black border-[1px] rounded-full w-1 h-1"></span>
                    <h2 class="text-xs font-normal">Obat {{ ucfirst($obat->jenis_obat) }}</h2>
                </div>
            </div>

            <div class="flex flex-row justify-center gap-2 items-center">
                {{-- EDIT --}}
                <button onclick="openEditModal({{ $obat->id }}, '{{ $obat->nama_obat }}', {{ $obat->stok }}, '{{ $obat->jenis_obat }}', {{ $obat->takaran }})">
                    <svg width="19" height="16" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.1665 2.52846H3.99984C3.11578 2.52846 2.26799 2.87964 1.64286 3.50477C1.01775 4.12989 0.666504 4.97773 0.666504 5.86179V14.1951C0.666504 15.0792 1.01775 15.927 1.64286 16.5521C2.26799 17.1773 3.11578 17.5285 3.99984 17.5285H13.1665C15.0082 17.5285 15.6665 16.0285 15.6665 14.1951V10.0285M16.7332 4.5285L8.78325 12.4785C7.99158 13.2701 5.64156 13.6368 5.11656 13.1118C4.59156 12.5868 4.94989 10.2368 5.74156 9.44512L13.6999 1.48681C13.8962 1.27269 14.1337 1.10057 14.3984 0.980825C14.663 0.861075 14.9492 0.796158 15.2396 0.790042C15.5299 0.783933 15.8186 0.836717 16.088 0.945225C16.3574 1.05373 16.6021 1.21573 16.8072 1.4214C17.0122 1.62707 17.1736 1.87215 17.2813 2.14187C17.3891 2.41159 17.4412 2.70034 17.4342 2.99072C17.4273 3.28109 17.3616 3.56708 17.2412 3.83137C17.1207 4.09567 16.9479 4.33282 16.7332 4.5285Z"
                        stroke="#000000" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                {{-- DELETE --}}
                <form action="{{ route('admin.stok-obat.destroy', $obat->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus obat ini?')" class="flex justify-center items-center">
                        <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="scale-110">
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
    </div>

    <div class="flex flex-row justify-center items-center mt-3">
        <!-- ADD -->
        <a href="#" class="p-2 bg-[#0BB4A6] rounded-lg flex flex-row" onclick="openModal('modalTambah')">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.5033 10.5983C14.9462 9.99944 14.1915 9.63492 13.3782 9.57188L13.3572 9.57027L4.16784 9.56126C2.37721 9.56126 0.92041 11.0181 0.92041 12.8087C0.92041 14.5994 2.37721 16.0562 4.16784 16.0562H4.1684L13.3362 16.0471L13.3782 16.0455C14.1915 15.9825 14.9462 15.618 15.5033 15.0191C16.0636 14.4168 16.3721 13.6318 16.3721 12.8087C16.3721 11.9857 16.0636 11.2007 15.5033 10.5983ZM8.74002 14.9497L4.16744 14.9541C2.98471 14.9539 2.02246 13.9916 2.02246 12.8088C2.02246 11.6258 2.98487 10.6633 4.16728 10.6633L8.74002 10.6678V14.9497ZM2.35679 8.5238C2.91002 8.92773 3.59042 9.1502 4.27261 9.15027H4.27274C4.50646 9.15027 4.74123 9.12464 4.97049 9.07407L4.99105 9.06955L13.7877 6.4121C15.5014 5.89261 16.4729 4.07582 15.9534 2.36215C15.7472 1.68191 15.3355 1.1013 14.7628 0.682982C14.2094 0.278753 13.5288 0.0561523 12.8466 0.0561523C12.5268 0.0563238 12.2089 0.103676 11.903 0.196679L3.13206 2.86511L3.09231 2.87887C2.33228 3.17513 1.71581 3.74291 1.35644 4.47764C0.994995 5.2166 0.927469 6.05739 1.16623 6.84506C1.37247 7.5252 1.78416 8.10568 2.35679 8.5238ZM12.2232 1.25119C12.4253 1.18971 12.6354 1.15837 12.8466 1.1582C13.7829 1.1582 14.6268 1.78477 14.8987 2.68187C15.2419 3.81397 14.6001 5.01422 13.4685 5.35726L9.09124 6.6796L7.84899 2.58201L12.2232 1.25119Z" fill="white"/>
            </svg>
                               
            <h2 class="text-xs px-2 text-white">Tambah Stok Obat</h2>
        </a>
    </div>
    @endif

{{-- Modal Tambah Obat --}}
<div id="modalTambah" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg p-6 w-[90%] max-w-lg">
        <h1 class="text-xl font-bold text-center text-[#0BB4A6]">
            Tambah Stok Obat
        </h1>

        <!-- Form di dalam modal -->
        <form class="mt-4 flex flex-col gap-2" action="{{ route('admin.stok-obat.store') }}" method="POST">
            @csrf
            <input type="text" name="nama_obat"
                class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                placeholder="Nama Obat" required/>

            <input type="number" name="stok"
                class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                placeholder="Stok" required/>

            <select name="jenis_obat"
                class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1" required>
                <!-- <option>Select Kategori</option> -->
                <option value="kapsul">Kapsul</option>
                <option value="tablet">Tablet</option>
                <option value="sirup">Sirup</option>
            </select>

            <input type="number" name="takaran"
                class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                placeholder="Takaran mg/ml"/>

            <!-- Tombol Submit dan Batal -->
            <button type="submit"
                class="bg-[#0BB4A6] px-5 py-2 rounded-md font-bold mt-1 w-full text-center text-white">
                Simpan
            </button>
            <button type="button"
                class="bg-white px-5 py-2 border-2 border-[#0BB4A6] rounded-md font-bold mt-1 w-full text-center text-[#0BB4A6]"
                onclick="closeModal('modalTambah')">
                Batal
            </button>
        </form>
    </div>
</div>


{{-- Modal Edit Obat --}}
<div id="modalEdit" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg p-6 w-[90%] max-w-lg">
        <h1 class="text-xl font-bold text-center text-[#0BB4A6]">
            Tambah Stok Obat
        </h1>

        <!-- Form di dalam modal -->
        <form class="mt-4 flex flex-col gap-2" id="formEditObat" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="editId">

            <label class="text-xs">Nama Obat</label>
            <input type="text" name="nama_obat" id="editNamaObat"
                class="px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                placeholder="Nama Obat" required/>

            <label class="text-xs">Tambah Stok</label>
            <input type="number" name="stok_input" id="addStok"
                class="px-3 py-3 bg-white border shadow-sm border-slate-300 block w-full rounded-md sm:text-sm"
                placeholder="Tambah Stok"/>

            <label class="text-xs">Stok Obat</label>
            <input type="number" name="stok" id="editStok" readonly
                class="px-3 py-3 bg-gray-100 border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                placeholder="Stok" required/>

            <script>
                document.getElementById("addStok").addEventListener("input", function() {
                    let addValue = parseInt(this.value) || 0; // Nilai yang ingin ditambahkan
                    let currentStok = parseInt(document.getElementById("editStok").value) || 0; // Stok yang sudah ada
                    document.getElementById("editStok").value = currentStok + addValue; // Tambahkan nilai
                });
            </script>

            <label class="text-xs">Kategori Obat</label>
            <select name="jenis_obat" id="editJenisObat"
                class="px-3 py-3 bg-white border shadow-sm border-slate-300 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1" required>
                <!-- <option>Select Kategori</option> -->
                <option value="kapsul">Kapsul</option>
                <option value="tablet">Tablet</option>
                <option value="sirup">Sirup</option>
            </select>

            <label class="text-xs">Takaran mg/ml</label>
            <input type="number" name="takaran" id="editTakaran"
                class="px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                placeholder="Takaran mg/ml"/>

            <!-- Tombol Submit dan Batal -->
            <button type="submit"
                class="bg-[#0BB4A6] px-5 py-2 rounded-md font-bold mt-1 w-full text-center text-white">
                Simpan
            </button>
            <button type="button"
                class="bg-white px-5 py-2 border-2 border-[#0BB4A6] rounded-md font-bold mt-1 w-full text-center text-[#0BB4A6]"
                onclick="closeModal('modalEdit')">
                Batal
            </button>
        </form>
    </div>
</div>

</section>


{{-- Script Modal --}}
<script>
function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
}

function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
}

function openEditModal(id, nama, stok, jenis, takaran) {
    document.getElementById('editId').value = id;
    document.getElementById('editNamaObat').value = nama;
    document.getElementById('editStok').value = stok;
    document.getElementById('editJenisObat').value = jenis;
    document.getElementById('editTakaran').value = takaran;

    let formEdit = document.getElementById('formEditObat');
    formEdit.action = `/admin/stok-obat/update/${id}`;

    openModal('modalEdit');
}
</script>

@endsection

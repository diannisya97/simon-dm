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
          <h1 class="text-base text-center font-bold text-black ml-2">Daily Reminder</h1>
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
    @if($reminders->isEmpty())
    <div class="flex flex-row justify-center items-center mt-12">
      <!-- ADD -->
      <a href="#" class="p-2 bg-[#D9D9D9] rounded-lg flex flex-row" onclick="openModal()">
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
      <p class="text-base font-semibold">Reminder Belum ditambahkan</p>
    </div>
    @else

    <!-- Jika data ada -->
    <div class="flex flex-col gap-2 w-full mt-10">
    @foreach($reminders as $reminder)
      <div class="w-full bg-white rounded-xl flex flex-row items-center gap-1">
          <div class="w-11/12 bg-[#0BB4A6] rounded-xl py-4 px-3 flex flex-col">
              <div class="flex flex-row justify-between items-center">
                  <div class="flex flex-row items-center gap-2">
                    <label class="flex items-center cursor-pointer p-1 bg-white rounded-md">
                      <!-- Checkbox yang sebenarnya (disembunyikan) -->
                      <input type="checkbox" class="hidden peer myCheckbox" data-id="{{ $reminder->id }}">
                      
                      <!-- Kotak checkbox custom -->
                      <div class="w-4 h-4 border-2 border-white bg-white rounded-md flex items-center justify-center transition-colors duration-200 peer-checked:border-green-500 peer-checked:bg-green-500">
                          <!-- Ikon centang -->
                          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                          </svg>
                      </div>
                    </label>

                  
                    <p class="text-[13px] font-semibold text-black">
                        {{ $reminder->title }}</p>
                  </div>
              </div>
          </div>

          <script>
            document.addEventListener("DOMContentLoaded", function() {
                const checkboxes = document.querySelectorAll(".myCheckbox");
        
                checkboxes.forEach(checkbox => {
                    const itemId = checkbox.getAttribute("data-id");
                    let savedState = localStorage.getItem("checkbox_" + itemId);
        
                    // Jika tidak ada nilai di localStorage, set default menjadi "false"
                    if (savedState === null) {
                        localStorage.setItem("checkbox_" + itemId, "false");
                        savedState = "false"; // Pastikan ada nilai awal
                    }
        
                    // Atur checkbox sesuai dengan localStorage
                    checkbox.checked = savedState === "true";
        
                    checkbox.addEventListener("change", function() {
                        localStorage.setItem("checkbox_" + itemId, checkbox.checked);
                    });
                });
            });
        </script>
        
              
          <!-- DELETE -->
          <form action="{{ route('reminder.destroy', $reminder->id) }}" method="POST"
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
  </div>


    @endif


    <!-- MODAL -->
    <div id="myModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
      <div class="bg-white rounded-lg p-6 w-[90%] max-w-lg">
          <h1 class="text-xl font-bold text-center text-[#0BB4A6] uppercase">
              Masukan Pengingat Harian
          </h1>

          <!-- Form di dalam modal -->
          <form class="mt-4 flex flex-col gap-2" action="{{ route('reminder.store') }}" method="POST">
              @csrf
              <!-- Token CSRF untuk keamanan -->
              <input type="text" name="title"
                  class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1"
                  placeholder="Judul Pengingat" required />

              <input type="date" name="reminder_date"
                  class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1" required />

              <input type="time" name="reminder_time"
                  class="mt-1 px-3 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-[#0BB4A6] focus:ring-[#0BB4A6] block w-full rounded-md sm:text-sm focus:ring-1" required />

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
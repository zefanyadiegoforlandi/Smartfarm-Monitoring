<x-app-layout>

    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="flex mx-3">
            <!-- Hamburger button -->
            <button
                class="text-slate-500 hover:text-slate-600 lg:hidden"
                @click.stop="sidebarOpen = !sidebarOpen"
                aria-controls="sidebar"
                :aria-expanded="sidebarOpen"
            >
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <rect x="4" y="5" width="16" height="2" />
                    <rect x="4" y="11" width="16" height="2" />
                    <rect x="4" y="17" width="16" height="2" />
                </svg>
            </button>
        </div>            

        <div class="FLEX flex-col mt-5 ml-4 mr-4">
            <div class="text-container-daftar flex flex-col sm:flex-row justify-between items-start">
                <div class="daftar-farmer text-3xl text-league-spartan mb-2 sm:mb-0" style="color:#416D14">
                    Daftar Sensor
                </div>
                
               
                <div class="flex items-center">
        
                    <button id="openModal" class="btn mx-5" style="background-color: #416D14; color: white; transition: 
                        background-color 0.3s ease, color 0.3s ease; border: none; padding: 10px 20px; cursor: pointer;"
                        onmouseover="this.style.backgroundColor='#274706'; this.style.color='white';"
                        onmouseout="this.style.backgroundColor='#416D14'; this.style.color='white';">             
                        <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">    
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                        </svg>
                        <span class="hidden xs:block ml-2">Tambah</span>
                    </button>
        
                    <div class="search-frame flex items-center">
                        <form action="{{ route('search-sensor') }}" method="GET" class="relative flex items-center">
                            @csrf
                            <input type="text" name="search" 
                                class="cursor-pointer relative z-10 h-37 w-227 rounded-md bg-transparent pl-3 outline-none focus:w-full focus:cursor-text focus:pl-4 focus:pr-4 shadow-md" 
                                style="width: 227px; height: 37px; border: none; filter: drop-shadow(0 0 10px rgba(0, 0, 0, 0.8));"
                                placeholder="Search">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                    class="absolute inset-y-0 my-auto h-7 w-37 px-2.5 z-10 focus:outline-none focus:border-lime-300 focus:stroke-lime-500 right-0" 
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </form>
                    </div>
        
                </div>
            </div>
        
            <div class="table-responsive mt-5 overflow-x-auto">
                <table style="width: 100%;">
                    <thead style="height: 53px; background-color:#ECF0E8; color:#416D14">
                        <tr>
                            <th class="py-2 px-4 border-b">ID SENSOR</th>
                            <th class="py-2 px-4 border-b">ID LAHAN</th>
                            <th class="py-2 px-4 border-b">LETAK SENSOR</th>
                            <th class="py-2 px-4 border-b">TANGGAL AKTIVASI</th>
                        </tr>
                    </thead>
            
                    <tbody style="height: 53px;">
                        @foreach($paginator->items() as $key => $sensor)
                        <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-[#ecf0e82e]' : 'bg-white' }}">
                            <td class="py-2 px-4 border-b text-center">
                                <form action="{{ route('read-sensor.edit', $sensor->id_sensor) }}" method="GET">
                                    @csrf
                                    <button type="submit" style="color: #416D14">{{ $sensor->id_sensor }}</button>
                                </form>
                            </td>
                            <td class="py-2 px-4 border-b text-center">{{ $sensor->id_lahan }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $sensor->alamat_lahan }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $sensor->tanggal_aktivasi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
            
                </table>
            
                <nav class="w-full flex justify-center mt-5" aria-label="Page navigation example">
                    <ul class="list-style-none flex">
                        {{-- Tombol Previous --}}
                        @if ($paginator->onFirstPage())
                            <li>
                                <a class="pointer-events-none flex items-center justify-center rounded-full hover:bg-[#CAE8AC] bg-gray-300 text-sm text-neutral-500 transition-all duration-300 dark:text-neutral-400 circle-button"
                                style="width: 19px; height: 19px; line-height: 19px;">
                                &lt;
                                </a>
                            </li>
                        @else
                            <li>
                                <a class="flex items-center justify-center rounded-full bg-gray-300 text-sm text-neutral-600 transition-all duration-300 hover:bg-[#CAE8AC] dark:text-white dark:hover:bg-green-700 dark:hover:text-white circle-button"
                                href="{{ $paginator->previousPageUrl() }}"
                                style="width: 19px; height: 19px; line-height: 19px;">
                                &lt;
                                </a>
                            </li>
                        @endif
            
                    
                        {{-- Tautan Halaman --}}
                        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                            @if ($page == 1 || $page == $paginator->lastPage() || 
                                ($page >= $paginator->currentPage() - 2 && $page <= $paginator->currentPage() + 2))
                                {{-- Tampilkan nomor halaman --}}
                                <li aria-current="{{ ($page == $paginator->currentPage()) ? 'page' : '' }}">
                                    <a class="relative block flex items-center justify-center 
                                        @if ($page == $paginator->currentPage()) 
                                        bg-[#CAE8AC] text-black
                                        @else 
                                            bg-transparent text-neutral-600 
                                            hover:bg-[#CAE8AC] dark:text-white dark:hover:bg-[#CAE8AC] dark:hover:text-white
                                        @endif
                                        mx-1  text-sm font-medium transition-all duration-300"
            
                                        href="{{ ($page == $paginator->currentPage()) ? '#' : $url }}"
                                        @if ($page == $paginator->currentPage())
                                            aria-disabled="true"
                                        @endif
                                        style="width: 19px; height: 19px;"
                                    >{{ $page }}
                                        @if ($page == $paginator->currentPage())
                                        <span class="absolute -m-px h-px w-px overflow-hidden whitespace-nowrap border-0 p-0 [clip:rect(0,0,0,0)]">(current)</span>
                                        @endif
                                    </a>
                                </li>
                            @elseif ($page == $paginator->currentPage() - 3)
                                <li>
                                    <span class="relative block  text-sm text-neutral-600 
                                        transition-all duration-300 dark:text-white dark:hover:bg-[#CAE8AC] dark:hover:text-white"
                                        >...</span>
                                </li>
                            @elseif ($page == $paginator->currentPage() + 3)
                                <li>
                                    <span class="relative block  text-sm text-neutral-600 
                                        transition-all duration-300 dark:text-white dark:hover:bg-[#CAE8AC] dark:hover:text-white"
                                        >...</span>
                                </li>
                            @endif  
                        @endforeach
                        @if ($paginator->hasMorePages())
                            <li>
                                <a class="flex items-center justify-center relative block rounded-full bg-gray-300 text-sm text-neutral-600 
                                    transition-all duration-300 hover:bg-[#CAE8AC] dark:text-white dark:hover:bg-green-700 dark:hover:text-white"
                                    style="width: 19px; height: 19px; line-height: 19px;"
            
                                    href="{{ $paginator->nextPageUrl() }}"
                                    >&gt;</a>
                            </li>
                        @else
                            <li>
                                <a class="flex items-center justify-center relative block rounded-full bg-gray-300  text-sm text-neutral-500 
                                    transition-all duration-300  hover:bg-[#CAE8AC] dark:hover:bg-gray-700 dark:hover:text-white"
                                    href="#!"
                                    style="width: 19px; height: 19px; line-height: 19px;">
                                    &gt;</a>
                            </li>
                        @endif
                    </ul>
                </nav>
            
                                                 
            </div>
        </div>
        
    </div>

<!-- Modal container -->
    <div id="modal" class="fixed hidden inset-0 bg-black bg-opacity-50 flex items-center justify-center">
       <!-- Modal content -->
       <div class="bg-white mx-4 md:mx-auto w-full max-w-lg rounded p-8">
         <!-- Modal header -->
           <div class="flex justify-between items-center mb-4">
               <h2 class="text-xl md:text-2xl font-bold">Tambah Sensor</h2>
               <button id="closeModal" class="text-gray-700 hover:text-gray-900">
               <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                   <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
               </svg>
               </button>
           </div>
               <!-- Modal body -->

               <form action="{{ route('sensor-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="id_user" class="block text-gray-700 font-bold">ID FARMER</label>
                    <select name="id_lahan" id="id_lahan" class="border border-gray-300 rounded px-3 py-2 w-full">
                        <option value="">Pilih Lahan</option>
                        @foreach($lahan as $l)
                            <option value="{{ $l->id_lahan }}">{{ $l->id_lahan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="tanggal_aktivasi" class="block text-gray-700 font-bold">TANGGAL AKTIVASI</label>
                    <input type="text" name="tanggal_aktivasi" id="tanggal_aktivasi" class="border border-gray-300 rounded px-3 py-2 w-full">
                </div>
                            
                <div class="flex justify-end mt-4">
                    <button class="btn bg-red-500 text-white mr-4" onclick="closeModal()" type="button">Cancel</button>
                    <button type="submit" class="btn bg-green-500 text-white" onclick="closeModal()">OK</button>
                </div>
            </form>
            
        </div>
   
        <script>
            // JavaScript to handle modal interactions
            const openModalButton = document.getElementById('openModal');
            const closeModalButton = document.getElementById('closeModal');
            const modal = document.getElementById('modal');
        
            openModalButton.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });
        
            closeModalButton.addEventListener('click', () => {
                modal.classList.add('hidden');
            });
        
            function closeModal() {
                modal.classList.add('hidden');
            }
        </script>

        <!-- Tambahkan skrip Flatpickr -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            // Inisialisasi Flatpickr pada elemen dengan ID 'tanggal_aktivasi'
            flatpickr("#tanggal_aktivasi", {
                enableTime: true, // Aktifkan pilihan waktu
                dateFormat: "Y-m-d H:i:s", // Format tanggal dan waktu
                defaultDate: new Date(), // Gunakan waktu saat ini sebagai nilai awal

            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const successMessage = "{{ session('simpan') }}";
        
                if (successMessage) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
        
                    Toast.fire({
                        icon: 'success',
                        title: successMessage
                    });
                }
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const successMessage = "{{ session('delete') }}";
        
                if (successMessage) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
        
                    Toast.fire({
                        icon: 'success',
                        title: successMessage
                    });
                }
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const successMessage = "{{ session('tambah') }}";
        
                if (successMessage) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
        
                    Toast.fire({
                        icon: 'success',
                        title: successMessage
                    });
                }
            });
        </script>
        
    </div>
</x-app-layout>


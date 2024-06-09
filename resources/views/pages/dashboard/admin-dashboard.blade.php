<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-4">
        <!-- Welcome banner -->

        <!-- Welcome banner -->
        <div class="welcome-css">
            <div class="px-4 sm:px-6 lg:px-8" >
                <div class="flex items-center justify-between mb-px">
            
                    <!-- Header: Left side -->
                    <div class="flex">
                        
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
            
                </div>
            </div>
            
            <div class="relative bg-white-200  p-4 sm:p-6 rounded-sm overflow-hidden mb-8">
            
                <!-- Background illustration -->
                <div class="absolute right-0 top-0 -mt-4 mr-16 pointer-events-none hidden xl:block" aria-hidden="true">
                    
                </div>
            
                <!-- Content ini-->
            
                    <div class="flex relative flex items-center justify-between">
                        <div>
                            <h1 class="text-3xl md:text-3xl font-bold mb-3" style="color:#416D14;">Hai</h1>
                            <p class="dark:text-indigo-200">Berikut adalah laporan hari ini!</p>
                        </div>
                
                        <div id="realTimeDate" class="flex items-center" style="font-size: 15px; font-family: Arial, sans-serif; color:#416D14;"></div>
                    </div>
            
            </div>
        </div>

        <div class="farmers-list flex flex-col sm:flex-row mx-auto gap-8 ml-20">
            <div class="custom-frame-3 flex justify-center items-center bg-green-200 p-4 rounded-xl" 
                style=" max-width: 290px; height: 117px; border-radius: 27px; background-color: #C8E0AF;">
                <div class="teks-frame">
                    <div class="text-frame-1 text-center" style="font-size: 24px">
                        <p class="text-dark font-medium text-league-spartan ml-3"> Petani</p>
                    </div>
                    <div class="text-frame-2 ml-1" style="font-size: 14px ">
                        <p class="text-dark font-regular text-league-spartan mb-0">telah terdaftar pada sistem</p>
                    </div>
                </div>
                <div class="img-frame-1 ml-2 mt-2">
                    <img src="{{ asset('images/petani_icon.svg') }}" class="w-75 h-75">
                </div>
            </div>
        
            <div class="custom-frame-3 flex justify-center items-center bg-green-200 p-4 rounded-xl" 
                style="width: 100%; max-width: 290px; height: 116px; border-radius: 27px; background-color: #C6D2B9;">
                <div class="teks-frame ml-3 text-center">
                    <div class="text-frame-1" style="font-size: 24px">
                        <p class="text-dark font-medium text-league-spartan mb-0">  Sensor</p>
                    </div>
                    <div class="text-frame-2" style="font-size: 14px ">
                        <p class="text-dark font-regular text-league-spartan mb-0">diaktifkan</p>
                    </div>
                </div>
                <div class="img-frame-1 ml-2 mt-2">
                    <img src="{{ asset('images/sensor_besar_icon.svg') }}"  class="w-23 h-23 ml-2">
                </div>
            </div>
        
            <div class="custom-frame-3 flex justify-center items-center bg-green-200 p-4 rounded-xl" 
                style="width: 100%; max-width: 290px; height: 116px; border-radius: 27px; background-color: #CAE8AC;">

                <div class="teks-frame  ml-3 text-center">
                    <div class="text-frame-1" style="font-size: 24px">
                        <p class="text-dark font-medium text-league-spartan mb-0"> Lokasi</p>
                    </div>
                    <div class="text-frame-2" style="font-size: 14px ">
                        <p class="text-dark font-regular text-league-spartan mb-0">lahan pertanian</p>
                    </div>
                </div>
                <div class="img-frame-1 ml-2 mt-2">
                    <img src="{{ asset('images/lokasi_icon.svg') }}" class="w-85 h-85 ml-2">
                </div>
            </div>
        
        </div>
        <!-- Dashboard actions -->
        
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
            <div class="flex mx-3">
    
                <!-- Hamburger button -->
                <button class="text-slate-500 hover:text-slate-600 lg:hidden" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="4" y="5" width="16" height="2" />
                        <rect x="4" y="11" width="16" height="2" />
                        <rect x="4" y="17" width="16" height="2" />
                    </svg>
                </button>
    
            </div>
    
            <!--Main Content-->
            <div class="FLEX flex-col mt-5 ml-4 mr-4">
                <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
                    <div class="flex mx-3">
            
                        <!-- Hamburger button -->
                        <button class="text-slate-500 hover:text-slate-600 lg:hidden" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <rect x="4" y="5" width="16" height="2" />
                                <rect x="4" y="11" width="16" height="2" />
                                <rect x="4" y="17" width="16" height="2" />
                            </svg>
                        </button>
            
                    </div>
            
                    <!--Main Content-->
                    <div class="FLEX flex-col mt-5 ml-4 mr-4">
                        <div class="text-container-daftar flex flex-col sm:flex-row justify-between items-start">
                            <div class="daftar-farmer text-3xl text-league-spartan mb-2 sm:mb-0" style="color:#416D14">
                                Daftar Farmer
                            </div>
                            <div class="flex items-center">
            
                                <button id="openModal" class="btn mx-5 bg-[#416D14]" style="color: white; transition: 
                                    background-color 0.3s ease, color 0.3s ease; border: none; padding: 10px 20px; cursor: pointer;" onmouseover="this.style.backgroundColor='#274706'; this.style.color='white';" onmouseout="this.style.backgroundColor='#416D14'; this.style.color='white';">
                                    <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                                    </svg>
                                    <span class="hidden xs:block ml-2">Tambah</span>
                                </button>
            
                                <div class="search-frame flex items-center">
                                    <form action="{{ route('search-farmer') }}" method="GET" class="relative flex items-center">
                                        @csrf
                                        <input type="text" name="search" class="cursor-pointer relative z-10 h-37 w-227 rounded-md bg-transparent pl-3 outline-none focus:w-full focus:cursor-text focus:pl-4 focus:pr-4 shadow-md" style="width: 227px; height: 37px; border: none; filter: drop-shadow(0 0 10px rgba(0, 0, 0, 0.8));" placeholder="Search">
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-y-0 my-auto h-7 w-37 px-2.5 z-10 focus:outline-none focus:border-lime-300 focus:stroke-lime-500 right-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
                                        <th class="py-2 px-4 border-b">ID</th>
                                        <th class="py-2 px-4 border-b">NAME</th>
                                        <th class="py-2 px-4 border-b">EMAIL</th>
                                        <th class="py-2 px-4 border-b">ALAMAT FARMER</th>
                                        <th class="py-2 px-4 border-b">JUMLAH SENSOR</th>
                                        
                                    </tr>
                                </thead>
            
                                @php
                                $userCount = 0;
                            @endphp
                            
                            @foreach($paginator->items() as $key => $user)
                                @if($user->level == 'user') 
                                    @php
                                        $userCount++;
                                    @endphp
                                    <tr class="{{ $userCount % 2 == 0 ? 'bg-[#ecf0e82e] ' : 'bg-white' }}">
                                        <td class="py-2 px-4 border-b text-center">{{ $user->id}}</td>
                                        <td class="py-2 px-4 border-b">
                                            <form action="{{ route('read-farmer.edit', $user->id) }}">
                                                @csrf
                                                <button class="submit">
                                                    <div class="flex items-center justify-start ms-5">
                                                        <div>
                                                            <img src="{{ asset('images/user_besar_icon.svg') }}" alt="User Image" 
                                                                style="width: 30px; height: 30px; object-fit: cover;" class="mx-2">
                                                        </div>
                                                        <p class="ms-3" style="color:#416D14;">{{ $user->name}}</p>
                                                    </div>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="py-2 px-4 border-b text-center">{{ $user->email}}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $user->alamat_user }}</td>
                                        <td class="py-2 px-4 border-b text-center">
                                            {{ $user->totalUniqueSensors}}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            
            
            
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
                            
                                    {{-- Paginator Halaman --}}
                                    @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                                        @if ($page == 1 || $page == $paginator->lastPage() ||
                                            ($page >= $paginator->currentPage() - 2 && $page <= $paginator->currentPage() + 2))
                                            {{-- Tampilkan nomor halaman --}}
                                            <li aria-current="{{ ($page == $paginator->currentPage()) ? 'page' : '' }}">
                                                <a class="relative block flex items-center justify-center
                                                        @if ($page == $paginator->currentPage())
                                                        bg-[#CAE8AC] text-black
                                                        @else
                                                        bg-transparent text-neutral-600 hover:bg-[#CAE8AC] dark:text-white dark:hover:bg-[#CAE8AC] dark:hover:text-white
                                                        @endif
                                                        mx-1 text-sm font-medium transition-all duration-300"
                                                   href="{{ ($page == $paginator->currentPage()) ? '#' : $url }}"
                                                   @if ($page == $paginator->currentPage())
                                                   aria-disabled="true"
                                                    @endif
                                                   style="width: 19px; height: 19px;">{{ $page }}
                                                </a>
                                            </li>
                                        @elseif ($page == $paginator->currentPage() - 3)
                                            <li>
                                                <span class="relative block  text-sm text-neutral-600 transition-all duration-300 dark:text-white dark:hover:bg-[#CAE8AC] dark:hover:text-white">
                                                    ...
                                                </span>
                                            </li>
                                        @elseif ($page == $paginator->currentPage() + 3)
                                            <li>
                                                <span class="relative block  text-sm text-neutral-600 transition-all duration-300 dark:text-white dark:hover:bg-[#CAE8AC] dark:hover:text-white">
                                                    ...
                                                </span>
                                            </li>
                                        @endif
                                    @endforeach
                            
                                    {{-- Tombol Next --}}
                                    @if ($paginator->hasMorePages())
                                        <li>
                                            <a class="flex items-center justify-center relative block rounded-full bg-gray-300 text-sm text-neutral-600 transition-all duration-300 hover:bg-[#CAE8AC] dark:text-white dark:hover:bg-green-700 dark:hover:text-white"
                                               style="width: 19px; height: 19px; line-height: 19px;"
                                               href="{{ $paginator->nextPageUrl() }}">
                                                &gt;
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a class="flex items-center justify-center relative block rounded-full bg-gray-300  text-sm text-neutral-500 transition-all duration-300  hover:bg-[#CAE8AC] dark:hover:bg-gray-700 dark:hover:text-white"
                                               href="#!"
                                               style="width: 19px; height: 19px; line-height: 19px;">
                                                &gt;
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                            
                        </div>
            
                    </div>
            
                    <!-- Modal container -->
                    <div id="modal" class="fixed hidden inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="bg-white mx-4 md:mx-auto w-full max-w-lg rounded p-8">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-xl md:text-2xl font-bold">Tambah Farmer</h2>
                                <button id="closeModal" class="text-gray-700 hover:text-gray-900">
                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                                    </svg>
                                </button>
                            </div>
            
                            <form action="{{ route('farmer-store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 font-bold">Nama</label>
                                    <input type="text" name="name" id="name" class="border border-gray-300 rounded px-3 py-2 w-full">
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="block text-gray-700 font-bold">Email</label>
                                    <input type="text" name="email" id="email" class="border border-gray-300 rounded px-3 py-2 w-full">
                                </div>
                                
                                <div class="mb-4">
                                    <label for="password" class="block text-gray-700 font-bold">Password</label>
                                    <input type="text" name="password" id="password" class="border border-gray-300 rounded px-3 py-2 w-full">
                                </div>
            
                                <div class="mb-4">
                                    <label for="alamat_user" class="block text-gray-700 font-bold">Alamat lahan</label>
                                    <input type="text" name="alamat_user" id="alamat_user" class="border border-gray-300 rounded px-3 py-2 w-full">
                                </div>
            
                                <div class="flex justify-end mt-4">
                                    <button class="btn bg-red-500 text-white mr-4" onclick="closeModal()" type="button">Cancel</button>
                                    <button type="submit" class="btn bg-green-500 text-white" onclick="closeModal()">OK</button>
                                </div>
                            </form>
            
                        </div>
            
            
                    </div>
                </div>
            
                <script>
                    // JavaScript modal interaksi
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
            
                @if(session('errors'))
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: "{{ $errors->first() }}", // Mengambil pesan kesalahan pertama dari laravel
                        });
                    });
                </script>
                @endif
            
            
            
            
                </div>
    
            </div>
         <script>
            function updateRealTimeDate() {
            const now = new Date();
            const options = {
                day: 'numeric',  // Tanggal (contoh: 01)
                month: 'long',   // Nama bulan dalam bahasa Inggris (contoh: January)
                year: 'numeric',   // Tahun empat digit (contoh: 2023)
                
            };
            const formattedDate = now.toLocaleDateString('id-ID', options);
        
            document.getElementById('realTimeDate').textContent = formattedDate;
            }
        
            // Initial update
            updateRealTimeDate();
        
            // Update every second
            setInterval(updateRealTimeDate, 1000);
        </script>

    
    
        </div>
    </div>

</x-app-layout>

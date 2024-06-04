<x-app-layout>


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

                    <button id="openModal" class="btn mx-5" style="background-color: #416D14; color: white; transition: 
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
                            <th class="py-2 px-4 border-b">NAME</th>
                            <th class="py-2 px-4 border-b">EMAIL</th>
                            <th class="py-2 px-4 border-b">ALAMAT</th>
                            <th class="py-2 px-4 border-b">JUMLAH SENSOR</th>
                        </tr>
                    </thead>

                    @foreach($users as $u)
                    @if($u->level == 'user') 
                        <tr>
                            <td class="py-2 px-4 border-b">
                                <form action="{{ route('read-farmer.edit', $u->id) }}">
                                    @csrf
                                    <button class="submit">
                                        <div class="flex items-center justify-start ms-5">
                                            <div>
                                                <img src="{{ asset('images/user_besar_icon.svg') }}" alt="User Image" style="width: 30px; height: 30px; object-fit: cover;" class="mx-2">
                                            </div>
                                            <p class="ms-3">{{ $u->name}}</p>
                                        </div>
                                    </button>
                                </form>
                            </td>
                            <td class="py-2 px-4 border-b text-center">{{ $u->email}}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $u->alamat_user }}</td>
                            <td class="py-2 px-4 border-b text-center">
                            </td>
                        </tr>
                    @endif
                    @endforeach
                </table>
            </div>

        </div>

        <!-- Modal container -->
        <div id="modal" class="fixed hidden inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <!-- Modal content -->
            <div class="bg-white mx-4 md:mx-auto w-full max-w-lg rounded p-8">
                <!-- Modal header -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl md:text-2xl font-bold">Tambah Farmer</h2>
                    <button id="closeModal" class="text-gray-700 hover:text-gray-900">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
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
            <!-- Modal footer -->


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
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('LIST BUKU') }}
        </h2>
    </x-slot>
    
    <h1 class="text-3xl font-semibold text-center mb-6 bg-gray-200 py-2">DAFTAR BUKU</h1>
    <div class="mt-4 mb-4 p-4 bg-white shadow-md flex items-center justify-between">
        <form action="{{ route('buku.search') }}" method="GET" class="flex items-center">
            @csrf
            <input type="text" name="kata" class="border rounded-l py-2 px-3 w-full" placeholder="Cari judul atau penulis...">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white rounded-r px-4 py-2">Cari</button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Foto</th>
                    <th>Judul Buku</th>
                </tr>
            </thead>

            <tbody>
                @if(Session::has('pesan'))
                <div class="alert alert-success">{{ Session::get('pesan') }}</div>
                @endif
                @foreach($data_buku as $b)
                <tr>
                    <td>
                    @if($b->filepath)
                        <div class="relative h-24 w-24">
                            <img
                                class="h-full w-full object-cover object-center"
                                src="{{ asset($b->filepath) }}"
                                alt=""
                                style="padding-right: 20px;"
                            />
                        </div>
                    @endif
                    </td>
                    <td>{{ $b->judul }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</x-app-layout>

<x-app-layout>
    
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="flex mx-3">
            
            <!-- Hamburger button -->
        

        </div>
                
        <div class="FLEX flex-col mt-5 ml-4 mr-4">
            <div class="text-container-daftar flex flex-col sm:flex-row justify-between items-start">
                <div class="daftar-farmer text-3xl text-league-spartan mb-2 sm:mb-0" style="color:#416D14">
                    Daftar Lahan
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
                        <form action="" class="relative flex items-center">
                            <input type="search" 
                                class="cursor-pointer relative z-10 h-37 w-227 rounded-md bg-transparent pl-3 outline-none focus:w-full focus:cursor-text focus:pl-4 focus:pr-4 shadow-md" 
                                style="width: 227px; height: 37px; border: none; filter: drop-shadow(0 0 10px rgba(0, 0, 0, 0.8));">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                class="absolute inset-y-0 my-auto h-7 w-37 px-2.5 z-10 focus:outline-none focus:border-lime-300 focus:stroke-lime-500 right-0" 
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </form>
                    </div>
        
                </div>
            </div>
        
            <div class="table-responsive mt-5 overflow-x-auto">
                <table style="width: 100%;">
                    <thead style="height: 53px; background-color:#ECF0E8; color:#416D14">
                        <tr>
                            <th class="py-2 px-4 border-b">ID LAHAN</th>
                            <th class="py-2 px-4 border-b">ID USER</th>
                            <th class="py-2 px-4 border-b">ALAMAT LAHAN</th>
                            <th class="py-2 px-4 border-b">LUAS LAHAN</th>
                        </tr>
                    </thead>
        
                    <tbody style="height: 53px;">
                        @foreach ($lahan as $l )
                        <tr>
                            <td class="py-2 px-4 border-b text-center">{{ $l->id_lahan}}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $l->id_user}}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $l->alamat_lahan }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $l->luas_lahan }}</td>
                        </tr>
                        @endforeach
                        <!-- Add more rows as needed -->
                    </tbody>
                    
                </table>
            </div>
        </div>

    </div>
        
    <!-- Modal container -->
    <div id="modal" class="fixed hidden inset-0 bg-black bg-opacity-50 flex items-center justify-center">
       <!-- Modal content -->
       <div class="bg-white mx-4 md:mx-auto w-full max-w-lg rounded p-8">
         <!-- Modal header -->
           <div class="flex justify-between items-center mb-4">
               <h2 class="text-xl md:text-2xl font-bold">Modal Header</h2>
               <button id="closeModal" class="text-gray-700 hover:text-gray-900">
               <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                   <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
               </svg>
               </button>
           </div>
               <!-- Modal body -->

               <form enctype="multipart/form-data">
                   @csrf
                    <div class="mb-4">
                        <label for="id" class="block text-gray-700 font-bold">ID FARMER</label>
                        <input type="text" name="id" id="id" class="border border-gray-300 rounded px-3 py-2 w-full">
                    </div>
                    <div class="mb-4">
                        <label for="judul" class="block text-gray-700 font-bold">Luas Lahan</label>
                        <input type="text" name="judul" id="judul" class="border border-gray-300 rounded px-3 py-2 w-full">
                    </div>
                    <div class="mb-4">
                        <label for="judul" class="block text-gray-700 font-bold">Alamat Lahan</label>
                        <input type="text" name="judul" id="judul" class="border border-gray-300 rounded px-3 py-2 w-full">
                    </div>
                    
                    <div class="flex justify-end mt-4">
                        <button class="btn bg-red-500 text-white mr-4" onclick="closeModal()">Cancel</button>
                        <button class="btn bg-green-500 text-white" onclick="closeModal()">OK</button>
                    </div>    

                </form>
            </div>
                <!-- Modal footer -->
                
               
            </div>
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
        
    </div>
</x-app-layout>


<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-4">
        
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
            
                <!-- Content -->
            
                    <div class="flex relative flex items-center justify-between">
                        <div>
                            <h1 class="text-3xl md:text-3xl font-bold mb-3" style="color:#416D14;">Hai, {{ Auth::user()->name }}</h1>
                            <p class="dark:text-indigo-200">Berikut adalah laporan hari ini!</p>
                        </div>
                
                        <div id="realTimeDate" class="flex items-center" style="font-size: 15px; font-family: Arial, sans-serif; color:#416D14;"></div>
                    </div>
            
            </div>
        </div>

        <div class="farmers-list flex flex-col sm:flex-row mx-auto gap-8 ml-20">
            <div class="custom-frame-3 flex justify-center items-center bg-green-200 p-4 rounded-xl" 
                style=" max-width: 290px; height: 116px; border-radius: 27px; background-color: #C8E0AF;">
                <div class="teks-frame">
                    <div class="text-frame-1 text-center" style="font-size: 24px">
                        <p class="text-dark font-medium text-league-spartan ml-3">{{ $jumlah_users }} Petani</p>
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
                        <p class="text-dark font-medium text-league-spartan mb-0"> {{ $jumlah_sensor }} Sensor</p>
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
                        <p class="text-dark font-medium text-league-spartan mb-0">{{ $jumlah_lahan }} Lokasi</p>
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
                <div class="text-container-daftar flex flex-col sm:flex-row justify-between items-start">
                    <div class="daftar-farmer text-3xl text-league-spartan mb-2 sm:mb-0" style="color:#416D14">
                        Daftar Farmer
                    </div>
                    <div class="flex items-center">
    
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
    
                        <tbody style="height: 53px;">
                            @foreach($users as $u)
                            @if($u->level == 'user') 
                            <tr>
                                <td class="py-2 px-4 border-b">
                                    <div class="flex items-center justify-start ms-5">
                                        <div>
                                            <img src="{{ asset('images/user_besar_icon.svg') }}" alt="User Image" style="width: 30px; height: 30px; object-fit: cover;" class="mx-2">
                                        </div>
                                        <p class="ms-3">{{ $u->name}}</p>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b text-center">{{ $u->email}}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $u->alamat_user }}</td>
                                <td class="py-2 px-4 border-b text-center">
                                    {{ $u->lahan->flatMap->sensor->count() }}
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
    
                    </table>
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

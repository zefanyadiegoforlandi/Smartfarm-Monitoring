<div class="px-4 sm:px-6 lg:px-8" >
    <div class="flex items-center justify-between  -mb-px">

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
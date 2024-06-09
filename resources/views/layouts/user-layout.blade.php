<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <!-- Styles -->
    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Add some styles to overlay the sidebar on top of the main content on small screens */
        @media (max-width: 1024px) {
            .overlay {
                position: fixed;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
                display: none;
            }

            .overlay.active {
                display: block;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                height: 100%;
                z-index: 1000;
                overflow: hidden; /* Prevent scrolling */
            }
        }

        @media (min-width: 1024px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh; /* Ensure it takes the full viewport height */
                overflow: hidden; /* Prevent scrolling */
                width: 18rem; /* Same as w-72 */
                border-right: 3px solid #ccc; /* Same as xl:border xl:border-r-3 */
            }

            main {
                margin-left: 18rem; /* Adjust main content margin to make space for the sidebar */
            }
        }
    </style>
</head>

<body class="font-sans">
    <div class="min-h-screen flex">

        <!-- Overlay for small screens -->
        <div class="overlay"></div>
        <!-- Sidebar -->
        <aside class="bg-[#ECF0E8] text-white w-72 p-4 hidden xl:block sidebar xl:border xl:border-r-3 xl:bg-white ">
            <!-- Close Sidebar Button -->
            <button class="close-sidebar-button text-white mb-4 xl:hidden absolute top-6 right-2">&#10006;</button>

            <!-- Sidebar Menu -->
            <nav class="mt-9 flex flex-col">
                <div class="flex text-center justify-center">
                    <img src="{{ asset('images/smartfarm_logo 2.svg') }}">
                </div>

                <div class="mt-12 ms-12">
                    <div>
                        <ul class="space-y-5 text-xl">
                            <!-- Dashboard -->
                            <li>
                                <a href="{{ route('user-dashboard') }}" class="flex dashboard" onclick="changeColor(this, 'dashboard')">
                                    <img src="{{ asset('images/farmer-s/dashboard-selected.svg') }}" class="w-6 h-6" style="display: none;" alt="Dashboard Icon" id="selected">
                                    <img src="{{ asset('images/farmer-s/dashboard.svg') }}" class="w-6 h-6" id="non-selected" alt="Dashboard Icon">
                                    <span class="menu-text ms-6 text-[#818280] focus:text-[#416D14]" id="dashboard">Dashboard</span>
                                </a>
                            </li>

                            <!-- pertinjau -->
                            <li>
                                <a href="{{ route('pertinjau.lihat') }}" class="flex pertinjau" onclick="changeColor(this, 'pertinjau')">
                                    <img src="{{ asset('images/farmer-s/pertinjau-selected.svg') }}" style="display: none;" class="w-6 h-6" alt="Lahan Icon" id="selected">
                                    <img src="{{ asset('images/farmer-s/pertinjau.svg') }}" class="w-6 h-6" id="non-selected" alt="Lahan Icon">
                                    <span class="menu-text ms-6 text-[#818280] focus:text-[#416D14]" id="pertinjau">Pertinjau</span>
                                </a>
                            </li>

                            <!-- Daftar Sensor -->
                            <li>
                                <a href="" class="flex" id="sensorLink" onclick="changeColor(this, 'pertinjau')">
                                    <img src="{{ asset('images/farmer-s/sensor.svg') }}" class="w-6 h-6" alt="Sensor Icon">
                                    <span class="menu-text ms-6 text-[#818280] focus:text-[#416D14]" id="sensor">Sensor</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Div for 8 items (initially hidden) -->
                    <div id="sensorItems" class="hidden text-[#818280] ms-2 mt-4 space-x-2grow">
                        <ul class="space-y-2 text-lg">
                            <!-- Suhu -->
                            <li>
                                <a href="{{ route('suhu.lihat') }}" class="flex group" onclick="changeColor(this, 'suhu')">
                                    <img src="{{ asset('images/farmer-s/suhu.svg') }}" class="w-6 h-6" alt="">
                                    <span class="menu-text ms-6 text-[#818280] focus:text-[#416D14]" id="suhu">Suhu</span>
                                </a>
                            </li>

                            <!-- Kelembapan -->
                            <li>
                                <a href="{{ route('kelembapan.lihat') }}" class="flex group" onclick="changeColor(this, 'pertinjau')">
                                    <img src="{{ asset('images/farmer-s/kelembapan.svg') }}" class="w-6 h-6" alt="">
                                    <span class="menu-text ms-6 text-[#818280] focus:text-[#416D14]" id="kelembapan">Kelembapan</span>
                                </a>
                            </li>

                            <!-- Curah Hujan -->
                            <li>
                                <a href="{{ route('raindrop') }}" class="flex group">
                                    <img src="{{ asset('images/farmer-s/curah-hujan.svg') }}" class="w-6 h-6" alt="">
                                    <span class="menu-text ms-6 text-[#818280] focus:text-[#416D14]" id="curah-hujan">Curah Hujan</span>
                                </a>
                            </li>

                            <!-- Intensitas Cahaya -->
                            <li>
                                <a href="{{ route('cahaya.lihat') }}" class="flex group">
                                    <img src="{{ asset('images/farmer-s/intensitasC.svg') }}" class="w-6 h-6" alt="">
                                    <span class="menu-text ms-6 text-[#818280] focus:text-[#416D14]" id="intensitas-cahaya">Intensitas Cahaya</span>
                                </a>
                            </li>

                            <!-- Kualitas Udara -->
                            <li>
                                <a href="{{ route('kudara.lihat') }}" class="flex group">
                                    <img src="{{ asset('images/farmer-s/angin.svg') }}" class="w-6 h-6" alt="">
                                    <span class="menu-text ms-6 text-[#818280] focus:text-[#416D14]" id="kualitas-udara">Kualitas Udara</span>
                                </a>
                            </li>

                            <!-- Kelembapan Tanah -->
                            <li>
                                <a href="{{ route('ktanah.lihat') }}" class="flex group">
                                    <img src="{{ asset('images/farmer-s/tanah.svg') }}" class="w-6 h-6" alt="">
                                    <span class="menu-text ms-6 text-[#818280] focus:text-[#416D14]" id="kelembapan-tanah">Kelembapan Tanah</span>
                                </a>
                            </li>

                            <!-- Ketinggian -->
                            <li>
                                <a href="{{ route('ketinggian.lihat') }}" class="flex group">
                                    <img src="{{ asset('images/farmer-s/ketinggian.svg') }}" class="w-6 h-6" alt="">
                                    <span class="menu-text ms-6 text-[#818280] focus:text-[#416D14]" id="ketinggian">Ketinggian</span>
                                </a>
                            </li>

                            <!-- Tekanan Udara -->
                            <li>
                                <a href="{{ route('tudara.lihat') }}" class="flex group">
                                    <img src="{{ asset('images/farmer-s/tekanan-udara.svg') }}" class="w-6 h-6" alt="">
                                    <span class="menu-text ms-6 text-[#818280] focus:text-[#416D14]" id="tekanan-udara">Tekanan Udara</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- User Info and Logout -->
                <div class="mt-10 w-[252.8px] grow">
                    <div id="animatedRectangle" class="user-info bg-white shadow-xl mx-5 px-2 py-3 mb-2 rounded-md " style="display: none;">
                        <a href="{{ route('akun.lihat') }}" class="info flex items-center mx-4">
                            <img src="{{ asset('images/user_button_icon.svg') }}" class="w-6 h-6" alt="User Image">
                            <div class="ml-2 font-semibold text-slate-400"></div>
                        </a>
                        <div class="logout flex items-center mx-4 mt-2">
                            <img src="{{ asset('images/logout_icon.svg') }}" class="w-6 h-6" alt="Logout Icon">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="ml-2 font-semibold text-slate-400">Log Out</a>
                            </form>
                        </div>
                    </div>

                    <!-- Show Rectangle Button -->
                    <button id="showRectangle" class="show-rectangle-btn bg-[#416D14] py-3 px-4 rounded-3xl w-full">
                        <div class="flex items-center">
                            <div class="img w-14 h-14 overflow-hidden rounded-full">
                                <img src="{{ asset('images/user_besar_icon.svg') }}" class="w-full h-full object-cover" alt="User Image">
                            </div>
                            <div class=" ml-4">
                                <div class="text-xl font-semibold"></div>
                                <div class="text-sm"> </div>
                            </div>
                        </div>
                    </button>
                </div>
            </nav>


        </aside>


        <!-- Main Content -->
        <main class="flex-1 p-4 xl:overflow-y-auto">
            @yield('content')
        </main>
    </div>


    <!--sidebar-->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebar = document.querySelector('.sidebar');
            const toggleButton = document.querySelector('.toggle-button');
            const closeSidebarButton = document.querySelector('.close-sidebar-button');
            const overlay = document.querySelector('.overlay');

            toggleButton.addEventListener('click', function() {
                sidebar.classList.toggle('hidden');
                overlay.classList.toggle('active');
            });

            closeSidebarButton.addEventListener('click', function() {
                sidebar.classList.add('hidden');
                overlay.classList.remove('active');
            });
        });

        // JavaScript to show the rectangle on button click
        document.getElementById('showRectangle').addEventListener('click', function() {
            var container = document.getElementById('animatedRectangle');

            // Toggle class to initiate animation
            container.style.display = (container.style.display === 'none') ? 'block' : 'none';
        });

        document.getElementById('sensorLink').addEventListener('click', function(event) {
            event.preventDefault();

            // Toggle visibility of the 8 items div
            const sensorItems = document.getElementById('sensorItems');
            sensorItems.classList.toggle('hidden');
        });

        function changeColor(element, linkId) {
    const allLinks = document.querySelectorAll('.menu-text');
    const allSelectedIcons = document.querySelectorAll('img[id="selected"]');
    const allNonSelectedIcons = document.querySelectorAll('img[id="non-selected"]');

    // Reset semua tautan ke warna default dan ikon ke non-selected
    allLinks.forEach(link => {
        link.style.color = '#818280';
    });
    allSelectedIcons.forEach(icon => {
        icon.style.display = 'none';
    });
    allNonSelectedIcons.forEach(icon => {
        icon.style.display = 'inline';
    });

    // Ubah warna tautan yang dipilih dan tampilkan ikon yang sesuai
    element.querySelector('.menu-text').style.color = '#416D14';
    element.querySelector('img[id="selected"]').style.display = 'inline';
    element.querySelector('img[id="non-selected"]').style.display = 'none';

    // Simpan status ke localStorage
    localStorage.setItem('selectedColor', '#416D14');
    localStorage.setItem('selectedId', linkId);
    localStorage.setItem('selectedIcon', element.querySelector('img[id="selected"]').src);
    localStorage.setItem('nonSelectedIcon', element.querySelector('img[id="non-selected"]').src);
}

// Periksa localStorage saat halaman dimuat
document.addEventListener('DOMContentLoaded', () => {
    const selectedId = localStorage.getItem('selectedId');
    const selectedIcon = localStorage.getItem('selectedIcon');
    const nonSelectedIcon = localStorage.getItem('nonSelectedIcon');
    
    if (selectedId && selectedIcon && nonSelectedIcon) {
        const selectedLink = document.querySelector(`a.${selectedId}`);
        const selectedImg = selectedLink.querySelector('img[id="selected"]');
        const nonSelectedImg = selectedLink.querySelector('img[id="non-selected"]');
        
        selectedLink.querySelector('.menu-text').style.color = '#416D14';
        selectedImg.src = selectedIcon;
        selectedImg.style.display = 'inline';
        nonSelectedImg.src = nonSelectedIcon;
        nonSelectedImg.style.display = 'none';
    }
});

    </script>


    @livewireScripts
</body>

</html>
@extends('layouts.user-layout')

@section('content')
<div class="min-w-full px-4 mb-5">
    
    <span class="toggle-button text-white text-4xl top-5 left-4 cursor-pointer xl:hidden">
        <img src="{{ asset('images/tonggle_sidebar.svg') }}">
    </span>

    <div class="items-center justify-between mt-5 flex">
        <div class="flex items-center justify-start">
            <p class="font-semibold text-3xl md:text-[40px] text-[#416D14]">Suhu</p>
        </div>
       <!-- ... -->
        <div class="relative w-[97px] md:w-[124px] h-[27px] ">
            <form action="{{ route('lihat.suhu') }}" method="get">
                @csrf
                <select id="filter" name="filter" 
                    class="block appearance-none w-full bg-[#416D14] border border-gray-300 text-white py-1 px-1 rounded-lg leading-tight focus:outline-none focus:border-blue-500 text-center text-xs font-semibold "
                    onchange="this.form.submit()">
                    <option value="">Semua Lahan</option>
                    @foreach ($dataLahan as $lahan)
                        <option value="{{ $lahan->id_lahan }}" {{ request('filter') == $lahan->id_lahan ? 'selected' : '' }}>
                            {{ $lahan->id_lahan }}
                        </option>
                    @endforeach
                </select>
            </form>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M5 8l5 5 5-5z" />
                </svg>
            </div>
        </div>
        <!-- ... -->
    </div>

    <div class="w-full mt-7" id="data-container">
        <!-- Kartu Grafik -->
        <div class="bg-white border-transparent rounded-lg shadow-xl col-span-2 md:col-span-1">
            <div class="bg-[#ECF0E8] rounded-tl-lg rounded-tr-lg p-2">
                <h class="font-bold p-4">Suhu</h>
            </div>
            <div class="p-5">
                <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
                <script>
                    const dataTabel = <?php echo json_encode($dataSensor); ?>;
                    const sortedData = dataTabel.sort((a, b) => new Date(b.waktu_perekaman) - new Date(a.waktu_perekaman));

                    const slicedData = sortedData.slice(0, 10).reverse(); 
                    
                    const label = slicedData.map(entry => entry.waktu_perekaman);
                    
                    const suhu = slicedData.map(entry => {
                        if (entry.suhu < 20) {
                            return 20;
                        } else if (entry.suhu > 35) {
                            return 35;
                        } else {
                            return entry.suhu;
                        }
                    });
                    
                    const grafik = new Chart(document.getElementById("chartjs-7"), {
                        type: "line",
                        data: {
                            labels: label.map(time => time.split(' ')[1]),
                            datasets: [{
                                label: "Suhu Real-Time",
                                data: suhu,
                                borderColor: "rgb(65,109,20)",
                                backgroundColor: "rgb(236, 240, 232)"
                            }],
                        },
                
                        options: {
                            scales: {
                                x: [{
                                    type: 'time',
                                    time: {
                                        unit: 'minute' // sesuaikan dengan unit waktu yang sesuai
                                    },
                                    position: 'bottom',
                                }],
                                y: {
                                    min: 20,
                                    max: 35,
                                }
                            }
                        },
                    });
                </script>
                
            </div>
        </div>            
    </div>

    <div id="data-container" class="col-span-2 md:col-span-1">
        <table class="w-full  mt-5">
            <thead class="bg-[#ECF0E8]">
                <tr>
                    <th class=" p-2">Time</th>
                    <th class=" p-2">Date</th>
                    <th class=" p-2">Sensor ID</th>
                    <th class=" p-2">Temperature</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($dataSensor as $suhu1)
                    <tr class="text-center">
                        <td class="p-2">{{ \Carbon\Carbon::parse($suhu1->waktu_perekaman)->format('H:i:s') }}</td>
                        <td class="p-2">{{ \Carbon\Carbon::parse($suhu1->waktu_perekaman)->format('Y-m-d') }}</td>
                        <td class="p-2">{{ $suhu1->id_sensor }}</td> <!-- Menampilkan kode lahan -->
                        <td class="p-2">{{ $suhu1->suhu }} C</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <!-- /Table for time and date -->
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-5">
        <nav class="relative z-0 inline-flex shadow-sm">
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md  bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                <span class="sr-only">Previous</span>
                <!-- Heroicon name: solid/chevron-left -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M13 5l-3 3 3 3 1-1-2-2 2-2 1-1z" clip-rule="evenodd" />
                </svg>
            </a>
            <span class="relative inline-flex items-center px-4 py-2  bg-white text-sm font-medium text-gray-700">1</span>
            <a href="#" class="relative inline-flex items-center px-4 py-2 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">2</a>
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md  bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                <span class="sr-only">Next</span>
                <!-- Heroicon name: solid/chevron-right -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7 5l3 3-3 3-1-1 2-2-2-2-1-1z" clip-rule="evenodd" />
                </svg>
            </a>
        </nav>
    </div>
    <!-- /Pagination -->
</div>
<script>
        document.getElementById('filter').addEventListener('change', function () {
            var selectedLahanId = this.value;

            // Request data baru dari server berdasarkan ID lahan yang dipilih
            fetch('/lihat.suhu/' + selectedLahanId)
                .then(response => response.json())
                .then(data => {
                    // Perbarui data pada bagian tampilan yang relevan
                    updateChartData(data);
                    updateTableData(data);
                })
                .catch(error => console.error('Error:', error));
        });

        function updateChartData(data) {
        const chart = new Chart(document.getElementById("chartjs-7"), {
            type: "line",
            data: {
                labels: data.map(entry => entry.waktu_perekaman.split(' ')[1]),
                datasets: [{
                    label: "Suhu Real-Time",
                    data: data.map(entry => {
                        if (entry.suhu < 20) {
                            return 20;
                        } else if (entry.suhu > 35) {
                            return 35;
                        } else {
                            return entry.suhu;
                        }
                    }),
                    borderColor: "rgb(65,109,20)",
                    backgroundColor: "rgb(236, 240, 232)"
                }],
            },
            options: {
                scales: {
                    x: [{
                        type: 'time',
                        time: {
                            unit: 'minute'
                        },
                        position: 'bottom',
                    }],
                    y: {
                        min: 20,
                        max: 35,
                    }
                }
            },
        });
    }

        function updateTableData(data) {
            var tbody = document.querySelector('#data-container tbody');
            tbody.innerHTML = '';

            data.forEach(entry => {
                var row = document.createElement('tr');
                row.classList.add('text-center');

                var waktu = document.createElement('td');
                waktu.textContent = entry.waktu_perekaman.split(' ')[1];
                row.appendChild(waktu);

                var tanggal = document.createElement('td');
                tanggal.textContent = entry.waktu_perekaman.split(' ')[0];
                row.appendChild(tanggal);

                var idSensor = document.createElement('td');
                idSensor.textContent = entry.id_sensor;
                row.appendChild(idSensor);

                var suhu = document.createElement('td');
                suhu.textContent = entry.suhu + ' C';
                row.appendChild(suhu);

                tbody.appendChild(row);
            });
        }
    </script>



@endsection
@extends('layouts.user-layout')

@section('content')
<div class="container mx-auto px-4 md:px-8 lg:px-16 xl:px-20"> <!-- Tambahkan container agar konten berada di tengah -->
    <div class="mt-5 flex flex-col md:flex-row md:items-center justify-between"> <!-- Gunakan flexbox untuk menata header -->
        <div class="flex items-center justify-start">
            <p class="font-semibold text-3xl md:text-4xl text-[#416D14]">Curah Hujan</p>
        </div>
        <div class="flex items-center justify-end mt-3 md:mt-0"> <!-- Sesuaikan margin top untuk ukuran layar tertentu -->
            <div class="relative md:w-[124px] h-[27px]">
                <select id="filter" name="filter" class="block appearance-none w-full bg-[#416D14] border border-gray-300 text-white py-1 px-1 rounded-lg leading-tight focus:outline-none focus:border-blue-500 text-center text-xs font-semibold">
                    <option value="L001">L001</option>
                    <option value="L002">L002</option>
                    <option value="L003">L003</option>
                    <option value="L004">L004</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M5 8l5 5 5-5z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <!-- Grafik dan konten lainnya -->
        <div class="bg-white border-transparent rounded-lg shadow-xl">
            <div class="bg-[#ECF0E8] rounded-tl-lg rounded-tr-lg" >
                <h2 class="text-lg text-[#416D14]  font-semibold  p-2">Grafik </h2>

            </div>
            <canvas id="raindropChart" class="w-full"></canvas>
        </div>
    </div>

    <!-- Tabel -->
    <div class="overflow-x-auto mt-5"> <!-- Tambahkan overflow-x untuk mendukung scrolling pada layar kecil -->
        <table id="raindrop-table" class="w-full">
            <thead class="bg-[#ECF0E8]">
                <tr>
                    <th class="p-2 text-[#416D14] uppercase">Time</th>
                    <th class="p-2 text-[#416D14] uppercase">Date</th>
                    <th class="hidden md:table-cell p-2 text-[#416D14] uppercase">Sensor ID</th>
                    <th class="hidden md:table-cell p-2 text-[#416D14] uppercase">Curah Hujan</th>
                </tr>
            </thead>
            <tbody id="data-container">
                @foreach ($dataTabel as $ds)
                    <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-[#ecf0e82e]' : 'bg-white' }}">
                        <td class="py-2 px-4 border-b text-center">{{ date('H:i:s', strtotime($ds['waktu_perekaman'])) }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ date('Y-m-d', strtotime($ds['waktu_perekaman'])) }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $ds['id_sensor'] }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $ds['RainDrop'] }}</td>
                    </tr>
                @endforeach
            </tbody>
            
            <!-- Pastikan jQuery sudah dimuat sebelum kode JavaScript ini -->
              <script>
    function reloadData() {
    // Lakukan permintaan AJAX untuk mendapatkan data baru dari server
    $.get('/update-data-table', function(response) {
        console.log(response); // Check the response in the browser console
        // Other code...

        let newDataHtml = '';
        // Iterasi terbalik melalui data baru untuk menampilkan data terbaru di bagian atas
        for (let i = response.dataSensor.length - 1; i >= 0; i--) {
            const ds = response.dataSensor[i];
            const rowClass = (response.dataSensor.length - i) % 2 === 0 ? 'bg-[#ecf0e82e]' : 'bg-white';
            const formattedTime = new Date(ds['waktu_perekaman']).toLocaleTimeString();
            const formattedDate = new Date(ds['waktu_perekaman']).toLocaleDateString();
            newDataHtml += `
                <tr class="${rowClass}">
                    <td class="py-2 px-4 border-b text-center">${formattedTime}</td>
                    <td class="py-2 px-4 border-b text-center">${formattedDate}</td>
                    <td class="py-2 px-4 border-b text-center">${ds['id_sensor']}</td>
                    <td class="py-2 px-4 border-b text-center">${ds['RainDrop']}</td>
                </tr>
            `;
        }
        // Setel konten #data-container dengan HTML baru
        $('#data-container').html(newDataHtml);
    });
}

// Panggil fungsi reloadData setiap 2 detik
setInterval(reloadData, 2000);

</script>

            
            
            
        </table>
    </div>
   
    
</div>

<script>
var tableData = {!! json_encode($dataSensor) !!};
var labels = tableData.map(entry => entry.waktu_perekaman);
var raindrop = tableData.map(entry => entry.RainDrop); // Mengganti nama variabel suhu menjadi raindrop

var ctx = document.getElementById('raindropChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Raindrop Intensity',
            data: raindrop, // Menggunakan variabel raindrop
            borderColor: '#416D14',
            borderWidth: 1,
            pointBackgroundColor: '#416D14',
            pointBorderColor: '#fff',
            pointBorderWidth: 1,
            pointRadius: 2,
            pointHoverRadius: 4,
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: '#416D14',
            pointHoverBorderWidth: 2,
            fill: false
        }]
    },
    options: {
        scales: {
            yAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'Intensity',
                    fontSize: 14 
                },
                ticks: {
                    fontColor: '#416D14',
                    fontSize: 12
                },
                gridLines: {
                    color: 'rgba(0, 0, 0, 0.05)'
                }
            }],
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'Time',
                    fontSize: 14 
                },
                ticks: {
                    fontColor: '#416D14',
                    fontSize: 10 
                },
                gridLines: {
                    color: 'rgba(0, 0, 0, 0.05)'
                }
            }]
        },
        animation: {
            duration: 1000,
            easing: 'easeInOutQuart'
        }
    }
});

    function fetchDataAndUpdateChart() {
        fetch('/update-data-grafik')
            .then(response => response.json())
            .then(data => {
                var newData = data.RainDrop;
                var newLabels = data.waktu_perekaman;

                myChart.data.datasets[0].data = newData;
                myChart.data.labels = newLabels;
                myChart.update();
            })
            .catch(error => console.error('Error:', error));
    }
    setInterval(fetchDataAndUpdateChart, 2000);

    <!-- Deklarasikan variabel $paginator di dalam tag <script> -->

</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>





@endsection

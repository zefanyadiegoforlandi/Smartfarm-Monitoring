@extends('layouts.user-layout')

@section('content')
<div class="min-w-full px-4 mb-5">
    <span class="toggle-button text-white text-4xl top-5 left-4 cursor-pointer xl:hidden">
        <img src="{{ asset('images/tonggle_sidebar.svg') }}">
    </span>

    <div class="items-center justify-between mt-5 flex">
        <div class="flex items-center justify-start">
            <p class="font-semibold text-3xl md:text-[40px] text-[#416D14]">Kualitas Udara</p>
        </div>
        <div class="flex items-center justify-end">
            <div class="relative w-[97px] md:w-[124px] h-[27px] ">
                <select id="filter" name="filter" class="block appearance-none w-full bg-[#416D14] border border-gray-300 text-white py-1 px-1 rounded-lg leading-tight focus:outline-none focus:border-blue-500 text-center text-xs font-semibold ">
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

    <div class="w-full mt-7 ">
        <!--Graph Card-->
        <div class="bg-white border-transparent rounded-lg shadow-xl">
            <div class="bg-[#ECF0E8] rounded-tl-lg rounded-tr-lg p-2">
                <h class="font-bold p-4">Curah Hujan</h>
            </div>
            <div class="p-5">
                <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
                <script>
                    const tableData = <?php echo json_encode($dataSensor); ?>;
    
                    const labels = tableData.map(entry => entry.waktu_perekaman);
                    const suhu = tableData.map(entry => entry.kualitas_udara);
    
                    const chart = new Chart(document.getElementById("chartjs-7"), {
                        type: "line",
                        data: {
                            labels: labels,
                            datasets: [{
                                label: "Suhu Real-Time",
                                data: suhu,
                                borderColor: "rgb(255, 99, 132)",
                                backgroundColor: "rgba(255, 99, 132, 0.2)"
                            }],
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
    
                </script>
            </div>
        </div>
     </div>
</div>

@endsection
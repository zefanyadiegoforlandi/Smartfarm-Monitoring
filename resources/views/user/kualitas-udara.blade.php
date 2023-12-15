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
                <h class="font-bold p-4">Kualitas Udara</h>
            </div>
            <div class="p-5">
                <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
                <script>
                    new Chart(document.getElementById("chartjs-7"), {
                        "type": "bar",
                        "data": {
                            "labels": ["January", "February", "March", "April"],
                            "datasets": [{
                                "label": "Page Impressions",
                                "data": [10, 20, 30, 40],
                                "borderColor": "rgb(255, 99, 132)",
                                "backgroundColor": "rgba(255, 99, 132, 0.2)"
                            }, {
                                "label": "Adsense Clicks",
                                "data": [5, 15, 10, 30],
                                "type": "line",
                                "fill": false,
                                "borderColor": "rgb(54, 162, 235)"
                            }]
                        },
                        "options": {
                            "scales": {
                                "yAxes": [{
                                    "ticks": {
                                        "beginAtZero": true
                                    }
                                }]
                            }
                        }
                    });
                </script>
            </div>
        </div>
        <!--/Graph Card-->
    </div>

    <!-- Table for time and date -->
    <table class="w-full  mt-5">
        <thead class="bg-[#ECF0E8]">
            <tr>
                <th class="p-2 text-[#416D14] uppercase">Time</th>
                <th class="p-2 text-[#416D14] uppercase">Date</th>
                <!-- Add Sensor ID and Temperature columns for medium screens and larger -->
                <th class="hidden md:table-cell p-2 text-[#416D14] uppercase">Sensor ID</th>
                <th class="hidden md:table-cell p-2 text-[#416D14] uppercase">Kualitas Udara</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td class=" p-2">08:00 AM</td>
                <td class=" p-2">2023-12-07</td>
                <!-- Add sample data for Sensor ID and Temperature -->
                <td class="hidden md:table-cell  p-2">1</td>
                <td class="hidden md:table-cell  p-2">25°C</td>
            </tr>
            <tr class="text-center">
                <td class=" p-2">08:00 AM</td>
                <td class=" p-2">2023-12-07</td>
                <!-- Add sample data for Sensor ID and Temperature -->
                <td class="hidden md:table-cell  p-2">1</td>
                <td class="hidden md:table-cell  p-2">25°C</td>
            </tr>
            <tr class="text-center">
                <td class=" p-2">08:00 AM</td>
                <td class=" p-2">2023-12-07</td>
                <!-- Add sample data for Sensor ID and Temperature -->
                <td class="hidden md:table-cell  p-2">1</td>
                <td class="hidden md:table-cell  p-2">25°C</td>
            </tr>
            <tr class="text-center">
                <td class=" p-2">08:00 AM</td>
                <td class=" p-2">2023-12-07</td>
                <!-- Add sample data for Sensor ID and Temperature -->
                <td class="hidden md:table-cell  p-2">1</td>
                <td class="hidden md:table-cell  p-2">25°C</td>
            </tr>
            <tr class="text-center">
                <td class=" p-2">08:00 AM</td>
                <td class=" p-2">2023-12-07</td>
                <!-- Add sample data for Sensor ID and Temperature -->
                <td class="hidden md:table-cell  p-2">1</td>
                <td class="hidden md:table-cell  p-2">25°C</td>
            </tr>
            <tr class="text-center">
                <td class=" p-2">08:00 AM</td>
                <td class=" p-2">2023-12-07</td>
                <!-- Add sample data for Sensor ID and Temperature -->
                <td class="hidden md:table-cell  p-2">1</td>
                <td class="hidden md:table-cell  p-2">25°C</td>
            </tr>
            <tr class="text-center">
                <td class=" p-2">08:00 AM</td>
                <td class=" p-2">2023-12-07</td>
                <!-- Add sample data for Sensor ID and Temperature -->
                <td class="hidden md:table-cell  p-2">1</td>
                <td class="hidden md:table-cell  p-2">25°C</td>
            </tr>
            <tr class="text-center">
                <td class=" p-2">08:00 AM</td>
                <td class=" p-2">2023-12-07</td>
                <!-- Add sample data for Sensor ID and Temperature -->
                <td class="hidden md:table-cell  p-2">1</td>
                <td class="hidden md:table-cell  p-2">25°C</td>
            </tr>

        </tbody>
    </table>
    <!-- /Table for time and date -->

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

@endsection
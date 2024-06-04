@extends('layouts.user-layout')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="container mx-auto py-8">
    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <h2 class="text-2xl font-bold mb-4 text-black">Unduh Data</h2>
        <form id="downloadForm">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="start_date">Tanggal Mulai:</label>
                <input type="date" id="start_date" name="start_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="end_date">Tanggal Selesai:</label>
                <input type="date" id="end_date" name="end_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" style="background-color: #416D14;">Unduh Data</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script>
    document.getElementById('downloadForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah pengiriman formulir secara default

        var startDate = document.getElementById('start_date').value;
        var endDate = document.getElementById('end_date').value;

        if (!startDate || !endDate) {
            alert("Silakan pilih tanggal mulai dan tanggal selesai.");
            return;
        }

        console.log("Mengambil data dari API...");
        fetch(`http://localhost/smartfarm/smartfarm_api.php?table=data_sensor`)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Respon jaringan tidak OK");
                }
                return response.json();
            })
            .then(data => {
                console.log("Data Diterima:", data);
                if (!Array.isArray(data) || data.length === 0) {
                    throw new Error("Tidak ada data yang ditemukan atau data tidak dalam format yang diharapkan.");
                }

                var filteredData = data.filter(item => {
                    var timestamp = new Date(item.waktu_perekaman).getTime();
                    var startTimestamp = new Date(startDate).getTime();
                    var endTimestamp = new Date(endDate).getTime();

                    return timestamp >= startTimestamp && timestamp <= endTimestamp;
                });

                console.log("Data yang Difilter:", filteredData);

                if (filteredData.length === 0) {
                    alert("Tidak ada data yang ditemukan untuk rentang tanggal yang dipilih.");
                    return;
                }

                var csv = Papa.unparse(filteredData);
                var blob = new Blob([csv], { type: 'text/csv;charset=utf-8' });
                saveAs(blob, 'data_sensor.csv');
            })
            .catch(error => {
                console.error('Kesalahan:', error);
                alert("Terjadi kesalahan saat mengambil data: " + error.message);
            });
    });
</script>
@endsection

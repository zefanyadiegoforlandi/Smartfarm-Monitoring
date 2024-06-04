<x-app-layout>
    <div class=" flex items-center justify-center py-8">

        <div class="modal-content bg-white mx-4 md:mx-auto w-full max-w-lg rounded p-8 shadow-lg">
            
            <div class="modal-header text-black text-center py-2 rounded-t" style="background-color: #C6D2B9;">
                <h2 class="text-xl md:text-2xl font-bold">Update Sensor</h2>
            </div>
            
            <div class="modal-body">
                <form action="{{ route('form-sensor.update', $sensor->id_sensor) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-4">
                        <label for="id_user" class="block text-gray-700 font-bold">Id Lahan</label>
                        <select name="id_lahan" id="id_lahan" class="border border-gray-300 rounded px-3 py-2 w-full">
                            @foreach($lahan as $l)
                                <option value="{{ $l->id_lahan }}" {{ $l->id_lahan == $sensor->id_lahan ? 'selected' : '' }}>
                                    {{ $l->id_lahan }}
                                </option>
                            @endforeach    
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="tanggal_aktivasi" class="block text-gray-700 font-bold">TANGGAL AKTIVASI</label>
                        <input type="text" name="tanggal_aktivasi" id="tanggal_aktivasi" class="border border-gray-300 rounded px-3 py-2 w-full">
                    </div>

                    <div class="mt-4">
                        <button class="btn bg-red-500 text-white mr-4" onclick="closeModal()" type="button">Cancel</button>
                        <button type="submit" class="btn bg-green-500 text-white" onclick="closeModal()">OK</button>
                    </div>
                </form>
            </div>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script>
                // Inisialisasi Flatpickr pada elemen dengan ID 'tanggal_aktivasi'
                flatpickr("#tanggal_aktivasi", {
                    enableTime: true, // Aktifkan pilihan waktu
                    dateFormat: "Y-m-d H:i:s", // Format tanggal dan waktu
                    defaultDate: "{{ $sensor->tanggal_aktivasi }}", // Gunakan nilai tanggal_aktivasi dari $sensor sebagai nilai awal
                });
            </script>
    
            
    </div>
</x-app-layout>    
<x-app-layout>
    <div class=" flex items-center justify-center py-8">

        <div class="modal-content bg-white mx-4 md:mx-auto w-full max-w-lg rounded p-8 shadow-lg">
            
            <div class="modal-header text-black text-center py-2 rounded-t" style="background-color: #C6D2B9;">
                <h2 class="text-xl md:text-2xl font-bold">Update Sensor</h2>
            </div>
            
            <div class="modal-body">
                <form action="{{ route('form-sensor.update', $sensor->id_sensor) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="id_sensor" class="block text-gray-700 font-bold">ID Sensor</label>
                        <input type="text" name="id_sensor" id="id_sensor" value="{{ $sensor->id_sensor }}" class="border border-gray-300 rounded px-3 py-2 w-full">
                    </div>
                    <div class="mb-4">
                        <label for="id_lahan" class="block text-gray-700 font-bold">ID Lahan</label>
                        <input type="text" name="id_lahan" id="id_lahan" value="{{ $sensor->id_lahan }}" class="border border-gray-300 rounded px-3 py-2 w-full">
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 font-bold">Letak Sensor</label>
                        <div name="nama" id="nama" class=" rounded px-3 py-2 w-full">
                            {{ $sensor->lahan->alamat_lahan }}
                        </div>    
                    </div>
                    <div class="mb-4">
                        <label for="tanggal_aktivasi" class="block text-gray-700 font-bold">Tanggal Aktivasi</label>
                        <textarea name="tanggal_aktivasi" id="tanggal_aktivasi" class="border border-gray-300 rounded px-3 py-4 w-full max-w-full h-20 resize-y">{{$sensor->tanggal_aktivasi }}</textarea>
                    </div>

                    <div class="flex justify-end space-x-4 mt-4">
                        <a href="/pages/add/daftar-sensor" class="px-4 py-2 text-white rounded" style="background-color: #C63838;">Batal</a>

                        <button type="submit"  class="px-4 py-2 text-white rounded" style="background-color: #416D14;" onclick="submitForm()">
                            Simpan
                        </button>     
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</x-app-layout>    
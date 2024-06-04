<x-app-layout>
    <div class=" flex items-center justify-center py-8">
        <!-- Modal content -->
        <div class="modal-content bg-white mx-4 md:mx-auto w-full max-w-lg rounded p-8 shadow-lg">
                    <!-- Modal header -->
            <div class="modal-header text-black text-center py-2 rounded-t" style="background-color: #C6D2B9;">
                <h2 class="text-xl md:text-2xl font-bold">Informasi Sensor</h2>
            </div>
            <!-- Modal body -->
            <div class="modal-body mt-3">
                <form action="#" method="POST" enctype="multipart/form-data">
            
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 font-bold">ID Sensor</label>
                        <div name="nama" id="nama" class=" rounded px-3 py-2 w-full">
                            {{ $sensor->id_sensor }}
                        </div>    
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 font-bold">ID Lahan</label>
                        <div name="nama" id="nama" class=" rounded px-3 py-2 w-full">
                            {{ $sensor->id_lahan }}
                        </div>    
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 font-bold">Letak Sensor</label>
                        <div name="nama" id="nama" class=" rounded px-3 py-2 w-full">
                            {{ $sensor->alamat_lahan }}
                        </div>    
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 font-bold">Tanggal Aktivasi</label>
                        <div name="nama" id="nama" class=" rounded px-3 py-2 w-full">
                            {{ $sensor->tanggal_aktivasi }}
                        </div>    
                    </div>
                    
                    <div class="flex justify-end space-x-4 mt-4">
                        <form action="{{ route('read-sensor.destroy', ['id' => $sensor->id_sensor]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 text-white rounded" style="background-color: #C63838;"> 
                                Delete
                            </button>
                        </form>
                        <form action="{{ route('form-sensor.edit', $sensor->id_sensor) }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-white rounded"
                                style="background-color: #416D14;">Edit</button>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>    
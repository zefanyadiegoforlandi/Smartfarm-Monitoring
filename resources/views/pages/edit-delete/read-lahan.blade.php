<x-app-layout>
    <div class=" flex items-center justify-center py-8">

        <div class="modal-content bg-white mx-4 md:mx-auto w-full max-w-lg rounded p-8 shadow-lg">

            <div class="modal-header text-black text-center py-2 rounded-t" style="background-color: #C6D2B9;">
                <h2 class="text-xl md:text-2xl font-bold">Informasi Lahan</h2>
            </div>
            <div class="modal-body mt-3">
                    <form action="#" method="POST" enctype="multipart/form-data">

                            <div class="mb-4">
                                <label for="nama" class="block text-gray-700 font-bold">ID Lahan</label>
                                <div name="nama" id="nama" class="rounded px-3 py-2 w-full">
                                    {{ $lahan->id_lahan }}
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="nama" class="block text-gray-700 font-bold">ID Farmer</label>
                                <div name="nama" id="nama" class="rounded px-3 py-2 w-full">
                                    {{ $lahan->user_name }}
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="nama" class="block text-gray-700 font-bold">Luas Lahan</label>
                                <div name="nama" id="nama" class="rounded px-3 py-2 w-full">
                                    {{ $lahan->luas_lahan }}
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="nama" class="block text-gray-700 font-bold">Alamat Lahan</label>
                                <div name="nama" id="nama" class="rounded px-3 py-2 w-full">
                                    {{ $lahan->alamat_lahan }}
                                </div>
                            </div>

            
                        <div class="flex justify-end space-x-4 mt-4">
                            <form action="{{ route('read-lahan.destroy', ['id' => $lahan->id_lahan]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 text-white rounded" style="background-color: #C63838;">Delete</button>
                            </form>
                            <form action="{{ route('form-lahan.edit', $lahan->id_lahan) }}">
                                @csrf
                                <button type="submit" class="px-4 py-2 text-white rounded" style="background-color: #416D14;">Edit</button>
                            </form>
                        </div>
                    </form>
            </div>
            
        </div>   
            
    </div>
</x-app-layout>    
<x-app-layout>
    <div class=" flex items-center justify-center py-8">

        <div class="modal-content bg-white mx-4 md:mx-auto w-full max-w-lg rounded p-8 shadow-lg">

            <div class="modal-header text-black text-center py-2 rounded-t" style="background-color: #C6D2B9;">
                <h2 class="text-xl md:text-2xl font-bold">UPDATE LAHAN {{ $lahan->id_lahan }}</h2>
            </div>
            
            <div class="modal-body">
                <form action="{{ route('form-lahan.update', ['id' => $lahan->id_lahan]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-4">
                        <label for="id_user" class="block text-gray-700 font-bold">ID FARMER</label>
                        <select name="id_user" id="id_user" class="border border-gray-300 rounded px-3 py-2 w-full">
                            @foreach($users as $user)
                                @if($user->level === 'user')
                                    <option value="{{ $user->id }}" {{ $user->name == $lahan->user_name ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endif
                            @endforeach    
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="alamat_lahan" class="block text-gray-700 font-bold">Alamat Lahan</label>
                        <input type="text" name="alamat_lahan" id="alamat_lahan" value="{{ $lahan->alamat_lahan}}" class="border border-gray-300 rounded px-3 py-2 w-full">

                    </div>
                    <div class="mb-4">
                        <label for="luas_lahan" class="block text-gray-700 font-bold">Luas Lahan</label>
                        <textarea name="luas_lahan" id="luas_lahan" class="border border-gray-300 rounded px-3 py-4 w-full max-w-full h-20 resize-y">{{$lahan->luas_lahan }}</textarea>
                    </div>

                    <div class="flex justify-end space-x-4 mt-4">
                        <a href="/pages/add/daftar-lahan" class="px-4 py-2 text-white rounded" style="background-color: #C63838;">Batal</a>

                        <button type="submit"  class="px-4 py-2 text-white rounded" style="background-color: #416D14;" onclick="submitForm()">
                            simpan
                        </button>     
                    </div>
                </form>
            </div>
        </div>
        <div id="modal" class="modal hidden fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded animate__animated animate__fadeIn animate__faster">
            Perubahan berhasil disimpan!
        </div>
        
    </div>
    
</x-app-layout>    
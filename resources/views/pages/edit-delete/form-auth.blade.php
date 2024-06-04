<x-app-layout>
    <div class="min-w-full px-4 mb-5">
    
        <span class="toggle-button text-white text-4xl top-5 left-4 cursor-pointer xl:hidden">
            <img src="{{ asset('images/tonggle_sidebar.svg') }}">
        </span>
    
        <div class="items-center justify-between mt-5 flex">
            <div class="flex items-center justify-start">
                <p class="font-semibold text-3xl md:text-[40px] text-[#416D14]">Informasi Farmer</p>
            </div>
        </div>
    
        <div class=" mt-7 md:flex md:shadow-2xl md:rounded">
            <div class="flex-col justify-center items-center md:bg-[#C6D2B9] py-20 md:px-20">
                <img src="{{ asset('images/user_besar_icon.svg') }}" class="w-162 h-162 overflow-hidden rounded-full mb-4 mx-auto">
                <div class="text-center">
                    <p class="font-semibold text-black hidden md:block text-4xl">{{ $users->name }}</p>
                    <p class="text-black hidden md:block text-2xl">User</p>
                </div>
                <div class="flex justify-center space-x-4 mt-4">
                    <a href="/pages/add/daftar-farmer" class="px-4 py-2 text-white rounded" style="background-color: #C63838;">Batal</a>
                    <button type="submit" form="submit-form" class="submit">
                        <div class="text-white px-4 py-2 rounded mx-4" style="width: 95px; background-color:#416D14;">Simpan</div>
                    </button>
                </div>
            </div>
            
    
            <div class="flex-col flex-1 md:p-9">
                <form id="submit-form" action="{{ route('form-auth.update', ['id' => Auth::user()->id ]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 
                    <table class="w-full">
                        <tbody class="bg-white">
                            <tr>
                                <th class="text-start pe-9">Nama</th>
                                <td class=" py-4">
                                    <input type="text" name="name" id="name" value="{{ $users->name }}" class="border border-gray-300 rounded px-3 py-2 w-3/4">
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start pe-9">Email</th>
                                <td class=" py-4">
                                    <input type="text" name="email" id="email" value="{{ $users->email }}" class="border border-gray-300 rounded px-3 py-2 w-3/4">
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start pe-9">Farmer ID</th>
                                <td class=" py-4">
                                    <input type="text" name="id" id="id" value="{{ $users->id }}" class="border border-gray-300 rounded px-3 py-2 w-3/4">

                                </td>
                            </tr>
                            <tr>
                                <th class="text-start pe-9">Password</th>
                                <td class=" py-4">
                                    <input type="password" name="password" id="password" value="{{ $users->password }}" class="border border-gray-300 rounded px-3 py-2 w-3/4">
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start pe-9">Alamat</th>
                                <td class=" py-4">
                                    <input type="text" name="alamat_user" id="alamat_user" value="{{ $users->alamat_user }}" class="border border-gray-300 rounded px-3 py-2 w-3/4">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>    
    
                
            </div>
        </div>
    </div>
</x-app-layout>
    
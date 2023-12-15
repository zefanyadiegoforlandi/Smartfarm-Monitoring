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
            <div class="flex-col justify-center items-center md:bg-[#C6D2B9] py-12 md:px-20">
                <img src="{{ asset('images/user_besar_icon.svg') }}" class="w-162 h-162 overflow-hidden rounded-full mb-4 mx-auto">
                <div class="text-center">
                    <p class="font-semibold text-black hidden md:block " style="font-size: 32px;">{{ Auth::user()->name }}</p>
                    <p class="text-black hidden md:block" style="font-size: 24px;">Admin</p>
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
                                    <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="border border-gray-300 rounded px-3 py-2 w-3/4">
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start pe-9">Email</th>
                                <td class=" py-4">
                                    <input type="text" name="email" id="email" value="{{ Auth::user()->email }}" class="border border-gray-300 rounded px-3 py-2 w-3/4">
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start pe-9">Farmer ID</th>
                                <td class=" py-4">
                                    <input type="text" name="id" id="id" value="{{ Auth::user()->id }}" class="border border-gray-300 rounded px-3 py-2 w-3/4">

                                </td>
                            </tr>
                            <tr>
                                <th class="text-start pe-9">Password</th>
                                <td class=" py-4">
                                    <input type="password" name="password" id="password" value="{{ Auth::user()->password }}" class="border border-gray-300 rounded px-3 py-2 w-3/4">
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start pe-3">Alamat</th>
                                <td class=" py-4">
                                    <input type="text" name="alamat_user" id="alamat_user" value="{{ Auth::user()->alamat_user }}" class="border border-gray-300 rounded px-3 py-2 w-3/4">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-end space-x-4 mt-4">
                        <form action="{{ route('form-auth.edit', Auth::user()->name ) }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-white rounded"
                                style="background-color: #416D14;">Simpan</button>
                        </form>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</x-app-layout>
    
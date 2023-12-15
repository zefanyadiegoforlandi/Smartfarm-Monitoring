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
                    <p class="text-black hidden md:block" style="font-size: 24px;">User</p>
                </div>
            </div>
    
            <div class="flex-col flex-1 md:p-9">
                <table class="w-full">
                    <tbody class="bg-white">
                        <tr>
                            <th class="text-start pe-9">Nama</th>
                            <td class=" py-4">{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <th class="text-start pe-9">Email</th>
                            <td class=" py-4">{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <th class="text-start pe-9">Farmer ID</th>
                            <td class=" py-4">{{ Auth::user()->id }}</td>
                        </tr>
                        <tr>
                            <th class="text-start pe-9">Password</th>
                            <td class="py-4" id="password-cell">{{ Auth::user()->password }}</td>
                        </tr>
                        <tr>
                            <th class="text-start pe-9">Alamat</th>
                            <td class=" py-4">{{ Auth::user()->alamat_user}}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-end space-x-4 mt-4">
                    <form action="{{ route('form-auth.edit', Auth::user()->id ) }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-white rounded"
                            style="background-color: #416D14;">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var passwordCell = document.getElementById('password-cell');    
        var passwordInput = document.createElement('input');
        passwordInput.type = 'password';
        passwordInput.value = passwordCell.textContent; 
        passwordCell.style.border = 'none';
        passwordInput.style.border = 'none';
        passwordCell.innerHTML = ''; 
        passwordCell.appendChild(passwordInput); 
    </script>
</x-app-layout>
    
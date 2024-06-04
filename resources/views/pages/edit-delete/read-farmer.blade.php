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
            <div class="flex-col justify-center items-center md:bg-[#C6D2B9] py-12 md:px-20 text-center">
                <img src="{{ asset('images/user_besar_icon.svg') }}" class="w-162 h-162 overflow-hidden rounded-full mb-4 mx-auto">
                <div>
                    <p class="font-semibold text-black hidden md:block" style="font-size: 32px; margin: auto;">{{ $user->name }}</p>
                    <p class="text-black hidden md:block" style="font-size: 24px; margin: auto;">User</p>
                </div>
                <div class="flex justify-center space-x-4 mt-4 mx-auto">
                    <form action="{{ route('read-farmer.destroy', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 text-white rounded" style="background-color: #C63838;"> 
                            Delete
                        </button>
                    </form>
                    <form action="{{ route('form-farmer.edit', $user->id) }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-white rounded" style="background-color: #416D14;">Edit</button>
                    </form>
                </div>
            </div>
            
    
            <div class="flex-col flex-1 md:p-9">
                <table class="w-full">
                    <tbody class="bg-white">
                        <tr>
                            <th class="text-start pe-9">Nama</th>
                            <td class=" py-4">{{ $user->name}}</td>
                        </tr>
                        <tr>
                            <th class="text-start pe-9">Email</th>
                            <td class=" py-4">{{ $user->email}}</td>
                        </tr>
                        <tr>
                            <th class="text-start pe-9">Farmer ID</th>
                            <td class=" py-4">{{ $user->id}}</td>
                        </tr>
                        <tr>
                            <th class="text-start pe-9">Password</th>
                            <td class="py-4" id="password-cell">{{ $user->password }}</td>
                        </tr>
                        <tr>
                            <th class="text-start pe-9">Alamat</th>
                            <td class=" py-4">{{ $user->alamat_user}}</td>
                        </tr>
                    </tbody>
                </table>
    
                <div class="">
                    <h2 class="text-base font-bold mb-5">SENSOR YANG DIMILIKI :</h2>
                    <table style="width: 100%;">
                        <thead style="height: 53px; background-color:#ECF0E8; color:#416D14">
                            <tr>
                                <th class="py-2 px-4 border-b">ID Lahan</th>
                                <th class="py-2 px-4 border-b">ID Sensor</th>
                        </thead>
    
                        <tbody style="height: 53px;">
                            @foreach ($paginator as $s)
                                <tr>
                                    <td class="py-2 px-4 border-b text-center">{{ $s->id_lahan }}</td>
                                    <td class="py-2 px-4 border-b text-center">
                                        @if($s->id_sensor->isEmpty())
                                        @else
                                            {{ $s->id_sensor }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <nav class="w-full flex justify-center mt-5" aria-label="Page navigation example">
                        <ul class="list-style-none flex">
                            {{-- Tombol Previous --}}
                            @if ($paginator->onFirstPage())
                                <li>
                                    <a class="pointer-events-none flex items-center justify-center rounded-full hover:bg-[#CAE8AC] bg-gray-300 text-sm text-neutral-500 transition-all duration-300 dark:text-neutral-400 circle-button"
                                       style="width: 19px; height: 19px; line-height: 19px;">
                                        &lt;
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a class="flex items-center justify-center rounded-full bg-gray-300 text-sm text-neutral-600 transition-all duration-300 hover:bg-[#CAE8AC] dark:text-white dark:hover:bg-green-700 dark:hover:text-white circle-button"
                                       href="{{ $paginator->previousPageUrl() }}"
                                       style="width: 19px; height: 19px; line-height: 19px;">
                                        &lt;
                                    </a>
                                </li>
                            @endif
                    
                            {{-- Paginator Halaman --}}
                            @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                                @if ($page == 1 || $page == $paginator->lastPage() ||
                                    ($page >= $paginator->currentPage() - 2 && $page <= $paginator->currentPage() + 2))
                                    {{-- Tampilkan nomor halaman --}}
                                    <li aria-current="{{ ($page == $paginator->currentPage()) ? 'page' : '' }}">
                                        <a class="relative block flex items-center justify-center
                                                @if ($page == $paginator->currentPage())
                                                bg-[#CAE8AC] text-black
                                                @else
                                                bg-transparent text-neutral-600 hover:bg-[#CAE8AC] dark:text-white dark:hover:bg-[#CAE8AC] dark:hover:text-white
                                                @endif
                                                mx-1 text-sm font-medium transition-all duration-300"
                                           href="{{ ($page == $paginator->currentPage()) ? '#' : $url }}"
                                           @if ($page == $paginator->currentPage())
                                           aria-disabled="true"
                                            @endif
                                           style="width: 19px; height: 19px;">{{ $page }}
                                        </a>
                                    </li>
                                @elseif ($page == $paginator->currentPage() - 3)
                                    <li>
                                        <span class="relative block  text-sm text-neutral-600 transition-all duration-300 dark:text-white dark:hover:bg-[#CAE8AC] dark:hover:text-white">
                                            ...
                                        </span>
                                    </li>
                                @elseif ($page == $paginator->currentPage() + 3)
                                    <li>
                                        <span class="relative block  text-sm text-neutral-600 transition-all duration-300 dark:text-white dark:hover:bg-[#CAE8AC] dark:hover:text-white">
                                            ...
                                        </span>
                                    </li>
                                @endif
                            @endforeach
                    
                            {{-- Tombol Next --}}
                            @if ($paginator->hasMorePages())
                                <li>
                                    <a class="flex items-center justify-center relative block rounded-full bg-gray-300 text-sm text-neutral-600 transition-all duration-300 hover:bg-[#CAE8AC] dark:text-white dark:hover:bg-green-700 dark:hover:text-white"
                                       style="width: 19px; height: 19px; line-height: 19px;"
                                       href="{{ $paginator->nextPageUrl() }}">
                                        &gt;
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a class="flex items-center justify-center relative block rounded-full bg-gray-300  text-sm text-neutral-500 transition-all duration-300  hover:bg-[#CAE8AC] dark:hover:bg-gray-700 dark:hover:text-white"
                                       href="#!"
                                       style="width: 19px; height: 19px; line-height: 19px;">
                                        &gt;
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                    
                    
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
    
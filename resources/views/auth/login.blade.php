<x-authentication-layout>
    @if ($errors->any())
    <div id="errorPopup" class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-md shadow-md">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-red-600 font-semibold text-lg">Error</h2>
                <button onclick="closeErrorPopup()" class="text-gray-600 hover:text-red-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <p class="text-red-600">{{ $errors->first() }}</p>
        </div>
    </div>
    <script>
        function closeErrorPopup() {
            document.getElementById('errorPopup').style.display = 'none';
        }
    </script>
    @endif


    <form id="loginForm" class="flex flex-col items-center" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-6 p-1 rounded bg-white relative w-full h-11 lg:h-[52px]">
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                class="bg-white rounded w-full h-full border-none focus:border-[#416D14] outline-none focus:border-b-2 focus:transition duration-500 focus:px-3 focus:pb-1">
            <img src="{{ asset('images/email.svg') }}" class="absolute top-1/2 right-2 -translate-y-1/2">
        </div>

        <div class="mb-6 p-1 rounded bg-white relative w-full h-11 lg:h-[52px]">
            <input type="password" id="password" name="password" required
                class="bg-white rounded w-full h-full border-none focus:border-[#416D14] outline-none focus:border-b-2 focus:transition duration-500 focus:px-3 focus:pb-1">
            <img id="togglePassword" src="{{ asset('images/close_eye.svg') }}" class="absolute top-1/2 right-2 -translate-y-1/2 cursor-pointer">
        </div>

        <button class="bg-[#416D14] h-10 w-28 lg:h-[54px] lg:w-[166px] hover:bg-[#3a5a1a] text-white py-2 rounded-[50px] shadow-lg hover:shadow-xl transition duration-200"
            type="submit">Submit</button>
    </form>
</x-authentication-layout>

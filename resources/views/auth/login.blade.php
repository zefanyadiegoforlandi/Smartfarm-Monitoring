<x-authentication-layout>

    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif
    <form class="flex flex-col items-center" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-6 p-1 rounded bg-white relative w-full h-11 lg:h-[52px]">
            <input id="email" type="email" name="email" :value="old('email')" class="bg-white rounded w-full h-full border-none  focus:border-[#416D14] outline-none focus:border-b-2 focus:transition duration-500 focus:px-3 focus:pb-1">
            <img src="{{ asset('images/email.svg') }}" class="absolute top-1/2 right-2 -translate-y-1/2">
        </div>

        <div class="mb-6 p-1 rounded bg-white relative w-full h-11 lg:h-[52px]">
            <input type="password" id="password" name="password" class="bg-white rounded w-full h-full border-none focus:border-[#416D14] outline-none focus:border-b-2 focus:transition duration-500 focus:px-3 focus:pb-1">
            <img id="togglePassword" src="{{ asset('images/close_eye.svg') }}" class="absolute top-1/2 right-2 -translate-y-1/2">
        </div>

        <button class="bg-[#416D14] h-10 w-28 lg:h-[54px] lg:w-[166px] hover:bg-[#3a5a1a] text-white py-2 rounded-[50px] shadow-lg hover:shadow-xl transition duration-200" type="submit">Submit</button>
    </form>

</x-authentication-layout>
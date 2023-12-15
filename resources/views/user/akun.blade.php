@extends('layouts.user-layout')

@section('content')
<div class="min-w-full px-4 mb-5">

    <span class="toggle-button text-white text-4xl top-5 left-4 cursor-pointer xl:hidden">
        <img src="{{ asset('images/tonggle_sidebar.svg') }}">
    </span>

    <div class="items-center justify-between mt-5 flex">
        <div class="flex items-center justify-start">
            <p class="font-semibold text-3xl md:text-[40px] text-[#416D14]">Intensitas Cahaya</p>
        </div>
    </div>

    <!--Item-->
    <div class=" mt-7 md:flex md:shadow-2xl md:rounded">
        <div class="flex flex-col justify-center items-center md:bg-[#C6D2B9] md:px-20">
            <img src="{{ asset('images/icon-01.svg') }}" class="w-32 h-32 overflow-hidden rounded-full mb-4">
            <p class="font-semibold text-black hidden md:block" style="font-size: 32px;">Jacob</p>
            <p class="text-black hidden md:block" style="font-size: 24px;">User</p>
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
                        <td class=" py-4">{{ Auth::user()->getAuthPassword() }}</td>
                    </tr>
                    <tr>
                        <th class="text-start pe-9">Alamat</th>
                        <td class=" py-4">{{ Auth::user()->alamat }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="">
                <h2 class="text-base font-bold mb-5">Informasi Sensor</h2>
                <table class="min-w-full ">
                    <thead class="bg-[#ECF0E8]">
                        <tr>
                            <th class="px-6 py-3 text-center font-medium ">ID Lahan</th>
                            <th class="px-6 py-3 text-center font-medium ">Sensor</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-center">001</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">Temperature Sensor</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-center">001</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">Temperature Sensor</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-center">001</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">Temperature Sensor</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-center">001</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">Temperature Sensor</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Close Item-->
</div>

@endsection
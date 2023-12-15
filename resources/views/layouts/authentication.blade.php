<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">

        <div>
            <div class="bg-no-repeat bg-cover right-0" style="background-image: url('{{ asset('images/background.svg') }}');">
                <div class="min-h-screen lg:mx-[114px] md:mx-14">
                    <div class="absolute hidden md:block top-1">
                        <img src="{{ asset('images/smartfarm_logo 2.svg') }}">
                    </div>

                    <div class=" flex items-center justify-center lg:justify-start min-h-screen">
                        <main class="w-[272px] h-[261px]  lg:w-[402px] lg:h-[294px]">
                            <section>
                                <h3 class="font-semibold text-4xl md:text-[40px] text-center text-[#416D14]">Login</h3>
                            </section>
                            <section class="mt-8 ">
                                {{ $slot }}
                            </section>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordInput = document.getElementById('password');
            var icon = document.getElementById('togglePassword');

            // Toggle password visibility
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.src = "{{ asset('images/open_eye.svg') }}";
            } else {
                passwordInput.type = 'password';
                icon.src = "{{ asset('images/close_eye.svg') }}";
            }
        });
    </script>
</body>

</html>
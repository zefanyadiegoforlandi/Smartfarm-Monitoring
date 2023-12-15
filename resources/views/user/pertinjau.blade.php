@extends('layouts.user-layout')

@section('content')
<div class="min-w-full px-4 mb-5">

    <span class="toggle-button text-white text-4xl top-5 left-4 cursor-pointer xl:hidden">
        <img src="{{ asset('images/tonggle_sidebar.svg') }}">
    </span>

    <div class="items-center justify-between mt-5 flex">
        <div class="flex items-center justify-start">
            <p class="font-semibold text-3xl md:text-[40px] text-[#416D14]">Pertinjau</p>
        </div>
        <div class="flex items-center justify-end">
            <div class="relative w-[97px] md:w-[124px] h-[27px] ">
                <select id="filter" name="filter" class="block appearance-none w-full bg-[#416D14] border border-gray-300 text-white py-1 px-1 rounded-lg leading-tight focus:outline-none focus:border-blue-500 text-center text-xs font-semibold">
                    <option value="L001">L001</option>
                    <option value="L002">L002</option>
                    <option value="L003">L003</option>
                    <option value="L004">L004</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M5 8l5 5 5-5z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!--suhu-->
    <div class="flex items-center bg-slate-200 ps-[13px] pe-[15px] py-6 rounded-[20px] mt-7 md:mt-7 md:flex">
        <div class="flex-none me-[14px] w-[75px] h-[75px] md:w-[141px] md:h-[141px] lg:mx-16">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 141 141" fill="none">
                <path d="M88.125 17.625H118.969V26.4375H88.125V17.625ZM88.125 44.0625H132.188V52.875H88.125V44.0625ZM88.125 70.5H118.969V79.3125H88.125V70.5ZM52.875 101.344C52.875 104.85 51.4823 108.212 49.0033 110.691C46.5243 113.17 43.1621 114.562 39.6562 114.562C36.1504 114.562 32.7882 113.17 30.3092 110.691C27.8302 108.212 26.4375 104.85 26.4375 101.344H52.875Z" fill="#86A169" />
                <path d="M132.187 96.9375H70.1475C69.2107 90.4733 66.2489 84.4724 61.6875 79.7972V30.8438C61.6875 25.0007 59.3664 19.397 55.2347 15.2653C51.103 11.1336 45.4993 8.8125 39.6562 8.8125C33.8132 8.8125 28.2095 11.1336 24.0778 15.2653C19.9461 19.397 17.625 25.0007 17.625 30.8438V79.7972C14.2166 83.2752 11.6809 87.5114 10.2255 92.1585C8.77017 96.8056 8.43666 101.731 9.2523 106.532C10.0679 111.333 12.0095 115.873 14.918 119.778C17.8264 123.684 21.6189 126.845 25.9847 129.002C30.3505 131.159 35.1653 132.252 40.0345 132.189C44.9038 132.126 49.689 130.911 53.9979 128.642C58.3068 126.374 62.0168 123.116 64.824 119.137C67.6311 115.158 69.4555 110.57 70.1475 105.75H132.187V96.9375ZM39.6562 123.375C35.196 123.381 30.8391 122.032 27.1633 119.506C23.4875 116.979 20.6664 113.395 19.074 109.229C17.4816 105.063 17.1932 100.511 18.247 96.1767C19.3008 91.8427 21.6471 87.9314 24.9746 84.9613L26.4375 83.6438V30.8438C26.4375 27.3379 27.8302 23.9757 30.3092 21.4967C32.7882 19.0177 36.1504 17.625 39.6562 17.625C43.1621 17.625 46.5243 19.0177 49.0033 21.4967C51.4823 23.9757 52.875 27.3379 52.875 30.8438V83.6438L54.3379 84.9613C57.6654 87.9314 60.0117 91.8427 61.0655 96.1767C62.1193 100.511 61.8309 105.063 60.2385 109.229C58.6461 113.395 55.825 116.979 52.1492 119.506C48.4734 122.032 44.1165 123.381 39.6562 123.375Z" fill="#416D14" fill-opacity="0.56" />
            </svg>
        </div>
        <div class="flex-col flex-1 md:flex md:flex-row justify-between lg:px-11">
            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center">Suhu saat ini</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center">Suhu Terendah</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center">Suhu Tertinggi</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center">Rata-rata Suhu</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>
        </div>
    </div>
    <!--Close Item-->

    <!--Kelembapan-->
    <div class="flex items-center bg-slate-200 ps-[13px] pe-[15px] py-6 rounded-[20px] mt-7 md:mt-7 md:flex">
        <div class="flex-none me-[14px] w-[75px] h-[75px] md:w-[141px] md:h-[141px] lg:mx-16">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 141 141" fill="none">
                <path d="M26.4375 52.875C30.9791 52.996 35.3836 51.3127 38.6869 48.1936C41.9902 45.0745 43.9231 40.7737 44.0625 36.2326C43.9804 32.9904 42.9829 29.8375 41.1852 27.1381L30.0947 10.6367C29.6686 10.0693 29.1163 9.60889 28.4816 9.29177C27.8469 8.97466 27.147 8.80957 26.4375 8.80957C25.728 8.80957 25.0281 8.97466 24.3934 9.29177C23.7587 9.60889 23.2064 10.0693 22.7803 10.6367L11.8308 26.9222C9.95928 29.6753 8.9122 32.9052 8.8125 36.2326C8.95191 40.7737 10.8848 45.0745 14.1881 48.1936C17.4914 51.3127 21.8959 52.996 26.4375 52.875ZM26.4375 20.987L33.7343 31.8396C34.6461 33.1304 35.1718 34.6541 35.25 36.2326C34.9943 38.3902 33.9559 40.379 32.3316 41.8221C30.7074 43.2652 28.6102 44.0623 26.4375 44.0623C24.2648 44.0623 22.1676 43.2652 20.5434 41.8221C18.9191 40.379 17.8807 38.3902 17.625 36.2326C17.7237 34.5685 18.2971 32.9676 19.2773 31.6193L26.4375 20.987ZM37.4531 132.188H103.547C110.645 132.195 117.493 129.565 122.761 124.808C128.029 120.05 131.342 113.505 132.055 106.443C132.769 99.3806 130.833 92.3051 126.624 86.5898C122.414 80.8745 116.231 76.9273 109.275 75.5143C107.397 66.6216 102.52 58.6444 95.4608 52.9198C88.4014 47.1953 79.5888 44.0712 70.5 44.0712C61.4112 44.0712 52.5986 47.1953 45.5392 52.9198C38.4797 58.6444 33.6026 66.6216 31.725 75.5143C24.7688 76.9273 18.5858 80.8745 14.3762 86.5898C10.1666 92.3051 8.23084 99.3806 8.94465 106.443C9.65845 113.505 12.9709 120.05 18.239 124.808C23.5071 129.565 30.3549 132.195 37.4531 132.188ZM70.5 52.875C78.0228 52.8821 85.2837 55.6383 90.9163 60.625C96.549 65.6116 100.165 72.4849 101.084 79.9514L101.524 83.5293L105.115 83.8113C110.23 84.2007 114.994 86.5587 118.406 90.3892C121.817 94.2197 123.61 99.2241 123.406 104.349C123.203 109.475 121.02 114.322 117.316 117.87C113.612 121.418 108.676 123.392 103.547 123.375H37.4531C32.3238 123.392 27.3879 121.418 23.684 117.87C19.98 114.322 17.7968 109.475 17.5936 104.349C17.3904 99.2241 19.183 94.2197 22.5944 90.3892C26.0058 86.5587 30.7699 84.2007 35.8845 83.8113L39.4756 83.5293L39.9118 79.9514C40.8326 72.4849 44.4497 65.6121 50.0828 60.6257C55.716 55.6393 62.9769 52.8829 70.5 52.875Z" fill="#416D14" fill-opacity="0.56" />
            </svg>
        </div>
        <div class="flex-col flex-1 md:flex md:flex-row justify-between lg:px-11">
            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start lg:w-28">
                    <p class="font-medium md:text-xl md:mb-6 text-center">Kelembapan saat ini</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start lg:w-28">
                    <p class="font-medium md:text-xl md:mb-6 text-center">Kelembapan Terendah</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start lg:w-28">
                    <p class="font-medium md:text-xl md:mb-6 text-center">Kelembapan  Tertinggi</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start lg:w-28">
                    <p class="font-medium md:text-xl md:mb-6 text-center">Rata-rata Kelembapan</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>
        </div>
    </div>
    <!--Close Item-->

    <!--Curah Hujan-->
    <div class="flex items-center bg-slate-200 ps-[13px] pe-[15px] py-6 rounded-[20px] mt-7 md:mt-7 md:flex">
        <div class="flex-none me-[14px] w-[75px] h-[75px] md:w-[141px] md:h-[141px] lg:mx-16">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 141 138" fill="none">
                <g clip-path="url(#clip0_588_1146)">
                    <path d="M21.15 136.343C20.824 136.014 20.5652 135.624 20.3886 135.193C20.212 134.763 20.1211 134.302 20.1211 133.835C20.1211 133.369 20.212 132.908 20.3886 132.477C20.5652 132.047 20.824 131.656 21.15 131.328L39.2262 112.982C39.7071 112.468 40.3288 112.113 41.0108 111.962C41.6929 111.811 42.4038 111.871 43.0516 112.135C43.6994 112.399 44.2542 112.855 44.6441 113.442C45.034 114.03 45.2411 114.723 45.2384 115.432C45.2393 115.91 45.1442 116.384 44.959 116.823C44.7738 117.263 44.5024 117.66 44.1612 117.99L26.0794 136.337C25.7555 136.667 25.3705 136.929 24.9466 137.108C24.5227 137.287 24.0681 137.379 23.609 137.379C23.15 137.379 22.6954 137.287 22.2715 137.108C21.8475 136.929 21.4626 136.667 21.1387 136.337L21.15 136.343ZM57.9284 118.981C57.6024 118.652 57.3436 118.262 57.167 117.831C56.9904 117.401 56.8995 116.94 56.8995 116.473C56.8995 116.007 56.9904 115.546 57.167 115.115C57.3436 114.685 57.6024 114.294 57.9284 113.966L71.205 100.491H34.3138L16.0966 118.981C15.7725 119.31 15.3878 119.571 14.9643 119.75C14.5407 119.928 14.0868 120.02 13.6282 120.02C13.1697 120.02 12.7156 119.929 12.2919 119.751C11.8682 119.573 11.4832 119.312 11.1587 118.984C10.8343 118.655 10.5769 118.264 10.4012 117.834C10.2255 117.404 10.1349 116.944 10.1347 116.478C10.1344 116.013 10.2245 115.552 10.3997 115.122C10.5749 114.692 10.8319 114.301 11.1559 113.972L24.5002 100.422C21.1419 100.411 17.8199 99.7177 14.7295 98.3837C11.6391 97.0497 8.84282 95.1018 6.50519 92.6546C4.16756 90.2074 2.33579 87.3104 1.11769 84.1341C-0.100421 80.9577 -0.680266 77.5661 -0.587727 74.1589C-0.495188 70.7517 0.267866 67.3977 1.65653 64.2943C3.0452 61.1908 5.03143 58.4007 7.49834 56.0879C9.96525 53.7752 12.863 51.9866 16.0211 50.8274C19.1792 49.6682 22.5338 49.1619 25.8876 49.3382H25.8538C26.2486 49.3382 26.6321 49.3668 27.0212 49.3897C32.9658 38.7538 44.0315 31.6842 56.7328 31.6499H56.7892C62.1303 31.6499 67.1837 32.9092 71.6731 35.1475L71.4757 35.0559C73.8093 32.4906 76.6472 30.4507 79.806 29.0682L79.9639 29.0052C85.7568 26.5206 92.2688 26.3903 98.1536 28.6412C104.038 30.8922 108.846 35.3523 111.582 41.0993C114.319 46.8464 114.774 53.4409 112.855 59.5194C110.936 65.5979 106.789 70.6955 101.272 73.7583L101.142 73.8212C102.778 76.447 103.69 79.4702 103.782 82.5755C103.875 85.6808 103.145 88.7544 101.668 91.4758C100.192 94.1971 98.0227 96.4665 95.3876 98.0471C92.7525 99.6278 89.7477 100.462 86.6868 100.462H81.0863L62.8691 118.952C62.5456 119.283 62.1608 119.546 61.7368 119.725C61.3128 119.904 60.8581 119.996 60.3988 119.996C59.9395 119.996 59.4847 119.904 59.0607 119.725C58.6368 119.546 58.2519 119.283 57.9284 118.952V118.981ZM7.64785 74.9146C7.65232 79.8145 9.5717 84.5124 12.9848 87.9777C16.398 91.4429 21.0261 93.3925 25.8538 93.3985H86.6473C88.2815 93.3985 89.8916 92.9981 91.3407 92.2313C92.7898 91.4645 94.035 90.3539 94.9707 88.994C95.9063 87.6341 96.5047 86.065 96.7149 84.4202C96.9251 82.7753 96.741 81.1032 96.1782 79.546C95.6154 77.9888 94.6905 76.5926 93.4821 75.4759C92.2738 74.3592 90.8176 73.5551 89.2375 73.1319C87.6574 72.7087 85.9999 72.6789 84.4061 73.0451C82.8122 73.4113 81.3289 74.1626 80.0824 75.2351L80.0993 75.2237C79.3933 75.8317 78.4782 76.1302 77.5553 76.0535C76.6325 75.9767 75.7775 75.531 75.1784 74.8144C74.5793 74.0978 74.2852 73.169 74.3609 72.2324C74.4365 71.2957 74.8756 70.4279 75.5816 69.8199L75.5873 69.8142C77.886 67.8339 80.6614 66.5084 83.6299 65.9731L83.7315 65.956C83.6926 60.1126 81.8135 54.435 78.3689 49.7528C74.9242 45.0706 70.0946 41.6292 64.5856 39.9315C59.0765 38.2337 53.177 38.3686 47.7489 40.3164C42.3208 42.2642 37.6487 45.9229 34.4153 50.7578L34.3532 50.8551C37.1281 51.874 39.5251 53.2593 41.6401 54.9824L41.5894 54.9423C41.9723 55.2243 42.2949 55.5823 42.5375 55.9945C42.7802 56.4067 42.9379 56.8646 43.0012 57.3405C43.0644 57.8164 43.0318 58.3004 42.9054 58.7631C42.779 59.2259 42.5614 59.6578 42.2657 60.0327C41.9701 60.4076 41.6025 60.7177 41.1854 60.9442C40.7682 61.1707 40.3101 61.309 39.8387 61.3506C39.3674 61.3922 38.8926 61.3363 38.4432 61.1863C37.9938 61.0363 37.579 60.7952 37.224 60.4778L37.2296 60.4835C34.0309 57.8548 30.0372 56.4254 25.9214 56.4364H25.8707C21.0406 56.4394 16.409 58.3874 12.9925 61.8528C9.576 65.3183 7.65382 70.0179 7.64785 74.9203V74.9146ZM82.6711 35.5482C80.7084 36.4183 79.022 37.5517 77.5669 38.9427L77.5782 38.9313C81.6715 42.1485 84.9846 46.2744 87.2635 50.9926C89.5424 55.7108 90.7265 60.896 90.7251 66.1506V66.2136C92.7047 66.7116 94.4475 67.5015 96.0097 68.5377L95.9477 68.4976C99.2065 67.1762 102.001 64.895 103.971 61.9476C105.941 59.0001 106.997 55.5216 107.002 51.9599C107.002 47.4146 105.289 43.0414 102.215 39.7367C99.1402 36.4319 94.9366 34.4459 90.4656 34.1858H90.4205C90.1009 34.1705 89.7813 34.1629 89.4617 34.1629H89.4166C86.9801 34.1629 84.662 34.6723 82.5583 35.5882L82.6711 35.5482ZM118.761 90.4276L110.42 80.9996C110.113 80.6534 109.877 80.2493 109.724 79.8104C109.571 79.3715 109.505 78.9063 109.53 78.4415C109.554 77.9766 109.668 77.5212 109.866 77.1012C110.064 76.6812 110.341 76.3048 110.682 75.9936C111.023 75.6824 111.421 75.4424 111.854 75.2874C112.286 75.1323 112.745 75.0652 113.203 75.09C113.661 75.1147 114.109 75.2307 114.523 75.4314C114.937 75.6322 115.308 75.9136 115.614 76.2598L115.62 76.2655L123.962 85.6993C124.268 86.0454 124.505 86.4495 124.657 86.8885C124.81 87.3274 124.876 87.7925 124.852 88.2574C124.828 88.7222 124.713 89.1777 124.515 89.5977C124.318 90.0177 124.04 90.394 123.699 90.7052C123.358 91.0164 122.96 91.2564 122.528 91.4115C122.095 91.5665 121.637 91.6336 121.179 91.6089C120.721 91.5842 120.272 91.4682 119.858 91.2674C119.445 91.0667 119.074 90.7852 118.767 90.439L118.761 90.4333V90.4276ZM136.979 58.1308L124.503 57.4438C123.618 57.3619 122.797 56.9412 122.207 56.2672C121.617 55.5931 121.301 54.7163 121.325 53.8148C121.349 52.9133 121.71 52.0547 122.334 51.4136C122.959 50.7724 123.801 50.3967 124.689 50.3628L124.887 50.3685H124.875L137.345 51.0555C138.23 51.1374 139.051 51.5581 139.641 52.2321C140.232 52.9062 140.547 53.783 140.523 54.6845C140.5 55.586 140.139 56.4446 139.514 57.0857C138.889 57.7269 138.047 58.1026 137.159 58.1365L136.979 58.1308ZM113.127 30.4249C112.82 30.0794 112.582 29.6755 112.429 29.2366C112.276 28.7977 112.21 28.3323 112.234 27.8674C112.259 27.4024 112.374 26.9469 112.573 26.5272C112.771 26.1075 113.05 25.7318 113.392 25.4218H113.398L122.693 16.9555C123.034 16.6442 123.432 16.4042 123.864 16.2492C124.297 16.0941 124.755 16.0271 125.213 16.0518C125.671 16.0765 126.12 16.1925 126.534 16.3933C126.947 16.594 127.318 16.8755 127.625 17.2216C127.931 17.5678 128.168 17.9719 128.321 18.4108C128.473 18.8497 128.539 19.3149 128.515 19.7797C128.491 20.2446 128.376 20.7 128.179 21.12C127.981 21.54 127.704 21.9164 127.362 22.2276L127.357 22.2333L118.062 30.6996C117.722 31.0118 117.324 31.2526 116.891 31.4081C116.459 31.5636 116 31.6308 115.542 31.6058C115.084 31.5808 114.635 31.4641 114.222 31.2624C113.808 31.0607 113.438 30.778 113.133 30.4306L113.127 30.4249ZM63.3034 27.6829L54.9618 18.2434C54.6552 17.8965 54.4189 17.4917 54.2664 17.0521C54.1139 16.6125 54.0482 16.1467 54.0731 15.6813C54.098 15.2159 54.2129 14.7601 54.4114 14.3398C54.6098 13.9195 54.8879 13.543 55.2297 13.2318C55.5715 12.9205 55.9704 12.6807 56.4035 12.5259C56.8367 12.3712 57.2956 12.3045 57.7541 12.3298C58.2126 12.355 58.6618 12.4717 59.0758 12.6731C59.4899 12.8745 59.8609 13.1567 60.1675 13.5037L68.5034 22.9489C69.1235 23.651 69.4433 24.5744 69.3925 25.5159C69.3417 26.4574 68.9245 27.3398 68.2327 27.9691C67.5409 28.5984 66.6311 28.923 65.7035 28.8715C64.7759 28.8199 63.9065 28.3965 63.2864 27.6943L63.2808 27.6886L63.3034 27.6829ZM91.1875 19.7547C90.7286 19.7291 90.2791 19.6119 89.8648 19.4098C89.4505 19.2078 89.0795 18.9248 88.7731 18.5771C88.4667 18.2294 88.2308 17.8237 88.0789 17.3834C87.9271 16.9431 87.8622 16.4767 87.8881 16.0109V16.0224L88.5649 3.3601C88.6456 2.462 89.0601 1.62876 89.7243 1.02966C90.3884 0.430551 91.2523 0.110514 92.1405 0.134564C93.0288 0.158614 93.8746 0.524946 94.5063 1.15914C95.1381 1.79333 95.5082 2.64782 95.5416 3.549L95.536 3.74936V3.73791L94.8592 16.4002C94.8102 17.3054 94.4218 18.1572 93.7737 18.781C93.1256 19.4047 92.2668 19.7531 91.3736 19.7547H91.1875Z" fill="#416D14" fill-opacity="0.56" />
                </g>
                <defs>
                    <clipPath id="clip0_588_1146">
                        <rect width="141" height="137.385" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        </div>
        <div class="flex-col flex-1 md:flex md:flex-row justify-between lg:px-11">
            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Curah Hujan saat ini</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Curah Hujan Terendah</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Curah Hujan Tertinggi</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Rata-rata Curah Hujan</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>
        </div>
    </div>
    <!--Close Item-->

    <!--Intensitas Cahaya-->
    <div class="flex items-center bg-slate-200 ps-[13px] pe-[15px] py-6 rounded-[20px] mt-7 md:mt-7 md:flex">
        <div class="flex-none me-[14px] w-[75px] h-[75px] md:w-[141px] md:h-[141px] lg:mx-16">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 141 141" fill="none">
                <path d="M66.0938 22.0312V8.8125C66.0938 7.64389 66.558 6.52314 67.3843 5.69681C68.2106 4.87048 69.3314 4.40625 70.5 4.40625C71.6686 4.40625 72.7894 4.87048 73.6157 5.69681C74.442 6.52314 74.9062 7.64389 74.9062 8.8125V22.0312C74.9062 23.1999 74.442 24.3206 73.6157 25.1469C72.7894 25.9733 71.6686 26.4375 70.5 26.4375C69.3314 26.4375 68.2106 25.9733 67.3843 25.1469C66.558 24.3206 66.0938 23.1999 66.0938 22.0312ZM105.75 70.5C105.75 77.4718 103.683 84.287 99.8093 90.0838C95.936 95.8807 90.4307 100.399 83.9896 103.067C77.5485 105.735 70.4609 106.433 63.6231 105.073C56.7852 103.713 50.5043 100.355 45.5745 95.4255C40.6447 90.4957 37.2874 84.2148 35.9273 77.3769C34.5672 70.5391 35.2653 63.4515 37.9332 57.0104C40.6012 50.5693 45.1193 45.064 50.9161 41.1907C56.713 37.3174 63.5282 35.25 70.5 35.25C79.8457 35.2602 88.8058 38.9773 95.4142 45.5858C102.023 52.1942 105.74 61.1543 105.75 70.5ZM96.9375 70.5C96.9375 65.2712 95.387 60.1597 92.482 55.8121C89.577 51.4645 85.448 48.0759 80.6172 46.0749C75.7864 44.0739 70.4707 43.5504 65.3423 44.5705C60.2139 45.5906 55.5032 48.1085 51.8059 51.8059C48.1085 55.5032 45.5906 60.2139 44.5705 65.3423C43.5504 70.4707 44.0739 75.7864 46.0749 80.6172C48.0759 85.448 51.4645 89.577 55.8121 92.482C60.1597 95.387 65.2712 96.9375 70.5 96.9375C77.5094 96.9302 84.2297 94.1425 89.1861 89.1861C94.1425 84.2297 96.9302 77.5094 96.9375 70.5ZM32.1326 38.3674C32.9594 39.1942 34.0807 39.6587 35.25 39.6587C36.4193 39.6587 37.5406 39.1942 38.3674 38.3674C39.1942 37.5406 39.6587 36.4193 39.6587 35.25C39.6587 34.0807 39.1942 32.9594 38.3674 32.1326L29.5549 23.3201C28.7281 22.4933 27.6068 22.0288 26.4375 22.0288C25.2682 22.0288 24.1469 22.4933 23.3201 23.3201C22.4933 24.1469 22.0288 25.2682 22.0288 26.4375C22.0288 27.6068 22.4933 28.7281 23.3201 29.5549L32.1326 38.3674ZM32.1326 102.633L23.3201 111.445C22.4933 112.272 22.0288 113.393 22.0288 114.562C22.0288 115.732 22.4933 116.853 23.3201 117.68C24.1469 118.507 25.2682 118.971 26.4375 118.971C27.6068 118.971 28.7281 118.507 29.5549 117.68L38.3674 108.867C38.7768 108.458 39.1016 107.972 39.3231 107.437C39.5447 106.902 39.6587 106.329 39.6587 105.75C39.6587 105.171 39.5447 104.598 39.3231 104.063C39.1016 103.528 38.7768 103.042 38.3674 102.633C37.958 102.223 37.472 101.898 36.9371 101.677C36.4022 101.455 35.829 101.341 35.25 101.341C34.671 101.341 34.0978 101.455 33.5629 101.677C33.028 101.898 32.542 102.223 32.1326 102.633ZM105.75 39.6562C106.329 39.6567 106.902 39.5431 107.437 39.322C107.972 39.1008 108.458 38.7765 108.867 38.3674L117.68 29.5549C118.507 28.7281 118.971 27.6068 118.971 26.4375C118.971 25.2682 118.507 24.1469 117.68 23.3201C116.853 22.4933 115.732 22.0288 114.562 22.0288C113.393 22.0288 112.272 22.4933 111.445 23.3201L102.633 32.1326C102.016 32.7488 101.595 33.5342 101.425 34.3894C101.255 35.2446 101.342 36.1311 101.676 36.9367C102.01 37.7422 102.575 38.4306 103.3 38.9148C104.025 39.3989 104.878 39.6569 105.75 39.6562ZM108.867 102.633C108.041 101.806 106.919 101.341 105.75 101.341C104.581 101.341 103.459 101.806 102.633 102.633C101.806 103.459 101.341 104.581 101.341 105.75C101.341 106.919 101.806 108.041 102.633 108.867L111.445 117.68C111.854 118.089 112.34 118.414 112.875 118.636C113.41 118.857 113.984 118.971 114.562 118.971C115.141 118.971 115.715 118.857 116.25 118.636C116.785 118.414 117.271 118.089 117.68 117.68C118.089 117.271 118.414 116.785 118.636 116.25C118.857 115.715 118.971 115.141 118.971 114.562C118.971 113.984 118.857 113.41 118.636 112.875C118.414 112.34 118.089 111.854 117.68 111.445L108.867 102.633ZM26.4375 70.5C26.4375 69.3314 25.9733 68.2106 25.1469 67.3843C24.3206 66.558 23.1999 66.0938 22.0312 66.0938H8.8125C7.64389 66.0938 6.52314 66.558 5.69681 67.3843C4.87048 68.2106 4.40625 69.3314 4.40625 70.5C4.40625 71.6686 4.87048 72.7894 5.69681 73.6157C6.52314 74.442 7.64389 74.9062 8.8125 74.9062H22.0312C23.1999 74.9062 24.3206 74.442 25.1469 73.6157C25.9733 72.7894 26.4375 71.6686 26.4375 70.5ZM70.5 114.562C69.3314 114.562 68.2106 115.027 67.3843 115.853C66.558 116.679 66.0938 117.8 66.0938 118.969V132.188C66.0938 133.356 66.558 134.477 67.3843 135.303C68.2106 136.13 69.3314 136.594 70.5 136.594C71.6686 136.594 72.7894 136.13 73.6157 135.303C74.442 134.477 74.9062 133.356 74.9062 132.188V118.969C74.9062 117.8 74.442 116.679 73.6157 115.853C72.7894 115.027 71.6686 114.562 70.5 114.562ZM132.188 66.0938H118.969C117.8 66.0938 116.679 66.558 115.853 67.3843C115.027 68.2106 114.562 69.3314 114.562 70.5C114.562 71.6686 115.027 72.7894 115.853 73.6157C116.679 74.442 117.8 74.9062 118.969 74.9062H132.188C133.356 74.9062 134.477 74.442 135.303 73.6157C136.13 72.7894 136.594 71.6686 136.594 70.5C136.594 69.3314 136.13 68.2106 135.303 67.3843C134.477 66.558 133.356 66.0938 132.188 66.0938Z" fill="#416D14" fill-opacity="0.56" />
            </svg>
        </div>
        <div class="flex-col flex-1 md:flex md:flex-row justify-between lg:px-11">
            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Intensitas Cahaya saat ini</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Intensitas Cahaya Terendah</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Intensitas Cahaya Tertinggi</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Rata-rata Intensitas Cahaya</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>
        </div>
    </div>
    <!--Close Item-->

    <!--Kualitas Udara-->
    <div class="flex items-center bg-slate-200 ps-[13px] pe-[15px] py-6 rounded-[20px] mt-7 md:mt-7 md:flex">
        <div class="flex-none me-[14px] w-[75px] h-[75px] md:w-[141px] md:h-[141px] lg:mx-16">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 141 141" fill="none">
                <path d="M56.4 47L32.9 70.5L42.3 79.9L65.8 56.4V51.7L70.5 47L75.2 51.7V56.4L98.7 79.9L108.1 70.5L84.6 47H79.9L75.2 42.3L79.9 37.6H84.6L108.1 14.1L98.7 4.69995L75.2 28.2V32.9L70.5 37.6L65.8 32.9V28.2L42.3 4.69995L32.9 14.1L56.4 37.6H61.1L65.8 42.3L61.1 47H56.4ZM108.1 122.2H98.7L89.3 84.6L70.5 65.8L51.7 84.6L42.3 122.2H32.9C31.6535 122.2 30.458 122.695 29.5766 123.577C28.6952 124.458 28.2 125.653 28.2 126.9C28.2 128.146 28.6952 129.342 29.5766 130.223C30.458 131.105 31.6535 131.6 32.9 131.6H108.1C109.347 131.6 110.542 131.105 111.423 130.223C112.305 129.342 112.8 128.146 112.8 126.9C112.8 125.653 112.305 124.458 111.423 123.577C110.542 122.695 109.347 122.2 108.1 122.2ZM75.2 122.2H65.8V108.081C65.8 105.496 67.8962 103.4 70.4812 103.4C73.085 103.4 75.2 105.515 75.2 108.119V122.2Z" fill="#416D14" fill-opacity="0.56" />
            </svg>
        </div>
        <div class="flex-col flex-1 md:flex md:flex-row justify-between lg:px-11">
            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Kualitas Udara saat ini</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Kualitas Udara Terendah</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Kualitas Udara Tertinggi</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Rata-rata Kualitas Udara</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>
        </div>
    </div>
    <!--Close Item-->

    <!--Kelembapan Tanah-->
    <div class="flex items-center bg-slate-200 ps-[13px] pe-[15px] py-6 rounded-[20px] mt-7 md:mt-7 md:flex">
        <div class="flex-none me-[14px] w-[75px] h-[75px] md:w-[141px] md:h-[141px] lg:mx-16">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 141 141" fill="none">
                <path d="M107.953 123.375C101.675 123.511 95.5997 121.153 91.0572 116.818C86.5147 112.483 83.8759 106.524 83.7188 100.247C83.8114 95.8117 85.1456 91.4916 87.5698 87.7768L103.503 64.058C103.993 63.3282 104.656 62.7303 105.432 62.3169C106.208 61.9035 107.074 61.6873 107.953 61.6873C108.832 61.6873 109.698 61.9035 110.474 62.3169C111.25 62.7303 111.913 63.3282 112.403 64.058L128.046 87.3098C130.633 91.1381 132.07 95.6273 132.188 100.247C132.03 106.524 129.392 112.483 124.849 116.818C120.307 121.153 114.231 123.511 107.953 123.375ZM107.953 73.2318L95.0164 92.4739C93.476 94.7807 92.6149 97.474 92.5312 100.247C92.8254 104.135 94.5779 107.769 97.4376 110.421C100.297 113.073 104.053 114.546 107.953 114.546C111.853 114.546 115.609 113.073 118.469 110.421C121.328 107.769 123.081 104.135 123.375 100.247C123.273 97.2922 122.308 94.4324 120.599 92.0201L107.953 73.2318Z" fill="#416D14" fill-opacity="0.56" />
                <path d="M22.0312 61.6875C24.4648 61.6875 26.4375 59.7148 26.4375 57.2812C26.4375 54.8477 24.4648 52.875 22.0312 52.875C19.5977 52.875 17.625 54.8477 17.625 57.2812C17.625 59.7148 19.5977 61.6875 22.0312 61.6875Z" fill="#416D14" fill-opacity="0.56" />
                <path d="M48.4688 88.125C50.9023 88.125 52.875 86.1523 52.875 83.7188C52.875 81.2852 50.9023 79.3125 48.4688 79.3125C46.0352 79.3125 44.0625 81.2852 44.0625 83.7188C44.0625 86.1523 46.0352 88.125 48.4688 88.125Z" fill="#416D14" fill-opacity="0.56" />
                <path d="M66.0938 114.562C68.5273 114.562 70.5 112.59 70.5 110.156C70.5 107.723 68.5273 105.75 66.0938 105.75C63.6602 105.75 61.6875 107.723 61.6875 110.156C61.6875 112.59 63.6602 114.562 66.0938 114.562Z" fill="#416D14" fill-opacity="0.56" />
                <path d="M74.9062 70.5C77.3398 70.5 79.3125 68.5273 79.3125 66.0938C79.3125 63.6602 77.3398 61.6875 74.9062 61.6875C72.4727 61.6875 70.5 63.6602 70.5 66.0938C70.5 68.5273 72.4727 70.5 74.9062 70.5Z" fill="#416D14" fill-opacity="0.56" />
                <path d="M57.2812 52.875C59.7148 52.875 61.6875 50.9023 61.6875 48.4688C61.6875 46.0352 59.7148 44.0625 57.2812 44.0625C54.8477 44.0625 52.875 46.0352 52.875 48.4688C52.875 50.9023 54.8477 52.875 57.2812 52.875Z" fill="#416D14" fill-opacity="0.56" />
                <path d="M118.969 52.875C121.402 52.875 123.375 50.9023 123.375 48.4688C123.375 46.0352 121.402 44.0625 118.969 44.0625C116.535 44.0625 114.562 46.0352 114.562 48.4688C114.562 50.9023 116.535 52.875 118.969 52.875Z" fill="#416D14" fill-opacity="0.56" />
                <path d="M39.6562 123.375C42.0898 123.375 44.0625 121.402 44.0625 118.969C44.0625 116.535 42.0898 114.562 39.6562 114.562C37.2227 114.562 35.25 116.535 35.25 118.969C35.25 121.402 37.2227 123.375 39.6562 123.375Z" fill="#416D14" fill-opacity="0.56" />
                <path d="M13.2188 96.9375C15.6523 96.9375 17.625 94.9648 17.625 92.5312C17.625 90.0977 15.6523 88.125 13.2188 88.125C10.7852 88.125 8.8125 90.0977 8.8125 92.5312C8.8125 94.9648 10.7852 96.9375 13.2188 96.9375Z" fill="#416D14" fill-opacity="0.56" />
                <path d="M8.8125 26.4375H132.188V35.25H8.8125V26.4375Z" fill="#416D14" fill-opacity="0.56" />
            </svg>
        </div>
        <div class="flex-col flex-1 md:flex md:flex-row justify-between lg:px-11">
            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Kelembapan  Tanah saat ini</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Kelembapan  Tanah Terendah</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Kelembapan  Tanah Tertinggi</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Rata-rata  Kelembapan Tanah</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>
        </div>
    </div>
    <!--Close Item-->

    <!--Keinggian-->
    <div class="flex items-center bg-slate-200 ps-[13px] pe-[15px] py-6 rounded-[20px] mt-7 md:mt-7 md:flex">
        <div class="flex-none me-[14px] w-[75px] h-[75px] md:w-[141px] md:h-[141px] lg:mx-16">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 141 141" fill="none">
                <path d="M105.75 70.5V45.825L96.35 55.225L88.125 47L111.625 23.5L135.125 47L126.9 55.3719L117.5 45.9719V70.5H105.75ZM5.875 129.25L41.125 82.25L67.5625 117.5H111.625L82.25 78.4313L67.5625 97.8187L60.2188 88.125L82.25 58.75L135.125 129.25H5.875Z" fill="#416D14" fill-opacity="0.6" />
            </svg>
        </div>
        <div class="flex-col flex-1 md:flex md:flex-row justify-between lg:px-11">
            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Keinggian saat ini</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Keinggian Terendah</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Keinggian Tertinggi</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Rata-rata Keinggian</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>
        </div>
    </div>
    <!--Close Item-->

    <!--Tekanan Udara-->
    <div class="flex items-center bg-slate-200 ps-[13px] pe-[15px] py-6 rounded-[20px] mt-7 md:mt-7 md:flex">
        <div class="flex-none me-[14px] w-[75px] h-[75px] md:w-[141px] md:h-[141px] lg:mx-16">
            <svg xmlns="http://www.w3.org/2000/svg" width="141" height="141" viewBox="0 0 141 141" fill="none">
                <path d="M19.6078 28.7288C19.3189 28.7323 19.0324 28.6753 18.7668 28.5615C18.5012 28.4476 18.2624 28.2795 18.0656 28.0678C17.1844 27.1866 17.1844 25.8206 18.0656 24.9394C28.5084 14.5406 42.3441 8.8125 57.105 8.8125C62.5247 8.8125 67.9444 9.60562 73.0997 11.1919C73.6525 11.3647 74.115 11.7482 74.3872 12.2595C74.6593 12.7708 74.7191 13.3687 74.5538 13.9238C74.2013 15.1134 72.9675 15.7744 71.8219 15.3778C67.0452 13.9559 62.0888 13.2288 57.105 13.2188C43.5338 13.2188 30.7556 18.5063 21.1941 28.1119C20.7534 28.5525 20.1806 28.7288 19.6078 28.7288Z" fill="#416D14" fill-opacity="0.56" />
                <path d="M11.0156 72.615C9.78188 72.615 8.8125 71.6456 8.8125 70.4119C8.8125 43.7981 30.4913 22.1194 57.105 22.1194C58.3387 22.1194 59.3081 23.0888 59.3081 24.3225C59.3081 25.5563 58.3387 26.5256 57.105 26.5256C32.9147 26.5256 13.2188 46.2216 13.2188 70.4119C13.2188 71.6456 12.2494 72.615 11.0156 72.615ZM98.3034 72.615C98.3034 73.8488 99.2728 74.8181 100.507 74.8181C107.072 74.8181 113.373 72.8353 118.704 69.0459C122.868 66.1182 126.267 62.232 128.613 57.7151C130.96 53.1982 132.186 48.1832 132.188 43.0931C132.188 41.9034 131.218 40.89 129.984 40.89C128.751 40.89 127.781 41.8594 127.781 43.0931C127.781 51.9938 123.419 60.3216 116.193 65.4769C111.594 68.6913 106.118 70.4141 100.507 70.4119C99.2728 70.4119 98.3034 71.3813 98.3034 72.615Z" fill="#416D14" fill-opacity="0.56" />
                <path d="M28.6406 66.4771L32.5005 70.5H63.6527C92.0422 70.5 114.695 94.6771 114.695 123.992V126.768C114.695 132.024 110.588 136.682 105.054 136.682H73.0732C44.6794 136.682 22.0312 112.505 22.0312 83.19V57.8541C22.0312 56.0475 23.5294 54.5494 25.3359 54.5494C27.1425 54.5494 28.6406 56.0475 28.6406 57.8541V66.4771ZM73.0732 127.869H105.054C105.151 127.867 105.246 127.844 105.333 127.802C105.42 127.761 105.498 127.701 105.561 127.627C105.774 127.393 105.889 127.085 105.882 126.768V123.992C105.882 99.1098 86.7591 79.3125 63.6527 79.3125H31.4959C32.0378 79.8192 32.6415 80.2643 33.3112 80.6344L85.7456 109.275C87.3319 110.156 87.9488 112.139 87.0675 113.769C86.4947 114.871 85.3491 115.488 84.2034 115.488C83.6747 115.488 83.1459 115.356 82.6172 115.091L30.9848 86.8913C32.7693 110.002 51.1301 127.869 73.0732 127.869ZM123.375 11.1478C123.375 9.91407 122.362 8.90063 121.128 8.90063C119.894 8.90063 118.881 9.91407 118.881 11.1478V18.7354L117.484 19.8281H95.5407C76.4925 19.8281 61.2909 36.5058 61.2909 55.9594V57.8541C61.2909 61.0618 63.8113 63.8025 67.1028 63.8025H89.1296C108.121 63.8025 123.375 47.8431 123.375 28.3322V11.1478ZM118.092 24.2344C117.541 25.2126 116.722 26.0409 115.708 26.6138L80.1056 46.0453C79.0041 46.6181 78.6075 47.9841 79.2244 49.0856C79.5082 49.6081 79.9862 49.9979 80.555 50.1711C81.1238 50.3442 81.7379 50.2867 82.2647 50.0109L117.867 30.5794C118.235 30.3739 118.591 30.1473 118.934 29.9008C118.145 46.4022 105.032 59.3963 89.1296 59.3963H67.0984C66.4022 59.3963 65.6972 58.7882 65.6972 57.8541V55.9594C65.6972 38.6649 79.1891 24.2344 95.5363 24.2344H118.092Z" fill="#416D14" fill-opacity="0.56" />
            </svg>
        </div>
        <div class="flex-col flex-1 md:flex md:flex-row justify-between lg:px-11">
            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Tekanan Udara saat ini</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Tekanan Udara Terendah</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Tekanan Udara Tertinggi</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>

            <div class="flex items-center justify-between md:flex-col">
                <div class="flex items-center justify-start">
                    <p class="font-medium md:text-xl md:mb-6 text-center lg:w-36">Rata-rata Tekanan Udara</p>
                </div>
                <div class="flex items-center justify-end md:justify-center bg-white md:rounded-xl md:w-[108px] md:h-[52px]">
                    <p class="font-medium text-[13px] md:text-[22px] text-[#416D14] text-center">27*</p>
                </div>
            </div>
        </div>
    </div>
    <!--Close Item-->


</div>

@endsection
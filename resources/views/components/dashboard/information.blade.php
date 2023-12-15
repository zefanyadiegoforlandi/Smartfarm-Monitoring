<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="farmers-list flex flex-col sm:flex-row ml-7">

        <div class="custom-frame-1 mx-4 my-3 sm:my-0 flex justify-center items-center bg-green-200 p-4 rounded-xl sm:w-1/3" style="max-width: 287px; height: 117px; border-radius: 27px; background-color:#C8E0AF;">
            <div class="teks-frame ml-3 mt-4 text-center">
                <div class="text-frame-1" style="font-size: 24px">
                    <p class="text-dark font-medium text-league-spartan mb-0"> Petani</p>
                </div>
                <div class="text-frame-2" style="font-size: 14px ">
                    <p class="text-dark font-regular text-league-spartan mb-0">telah terdaftar pada sistem</p>
                </div>
            </div>
            <div class="img-frame-1 ml-2 mt-2">
                <img src="{{ asset('images/petani_icon.svg') }}" class="w-85 h-85 ml-3">
            </div>
        </div>
    
        <div class="custom-frame-2 mx-4 my-3 sm:my-0 flex justify-center items-center bg-green-200 p-4 rounded-xl sm:w-1/3" style="max-width: 287px; height: 117px; border-radius: 27px; background-color:#C8E0AF;">
    
            <div class="teks-frame ml-3 mt-4 text-center">
                <div class="text-frame-1" style="font-size: 24px">
                    <p class="text-dark font-medium text-league-spartan mb-0"> Sensor</p>
                </div>
                <div class="text-frame-2" style="font-size: 14px ">
                    <p class="text-dark font-regular text-league-spartan mb-0">diaktifkan</p>
                </div>
            </div>
            <div class="img-frame-1 ml-2 mt-2">
                <img src="{{ asset('images/sensor_besar_icon.svg') }}"  class="w-23 h-23 ml-2">
            </div>
        </div>
    
        <div class="custom-frame-3 mx-4 my-3 sm:my-0 flex justify-center items-center bg-green-200 p-4 rounded-xl sm:w-1/3" style="max-width: 287px; height: 117px; border-radius: 27px; background-color:#C8E0AF;">
    
            <div class="teks-frame ml-3 mt-4 text-center">
                <div class="text-frame-1" style="font-size: 24px">
                    <p class="text-dark font-medium text-league-spartan mb-0">500 Lokasi</p>
                </div>
                <div class="text-frame-2" style="font-size: 14px ">
                    <p class="text-dark font-regular text-league-spartan mb-0">telah terdaftar pada sistem</p>
                </div>
            </div>
            <div class="img-frame-1 ml-2 mt-2">
                <img src="{{ asset('images/lokasi_icon.svg') }}" class="w-85 h-85 ml-2">
            </div>
        </div>
    
    </div>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    /* Styles for the container */
    #container {
      display: flex;
      flex-direction: column;
      align-items: center; /* Center items horizontally */
      justify-content: center; /* Center items vertically */
      height: 100vh; /* Make the container take the full height of the viewport */
    }

    /* Styles for the button */
    #showRectangle {
      width: 247px;
      height: 84px;
      border-radius: 24px;
      padding: 8px;
      margin-bottom: 10px;
    }

    /* Styles for the hidden rectangle */
    #animatedRectangle {
      width: 206px;
      height: 86px;
      background-color: #ffffff;
      display: none;
      margin-bottom: 10px;

      /* Add shadow to all sides */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);

      /* Add border radius */
      border-radius: 5px;
    }

    .show-rectangle #animatedRectangle {
      display: block;
    }
  </style>
</head>
<body>

  <div id="container">
    <div id="animatedRectangle">
      <div class="mt-3">
        <div class="flex items-center justify-center mx-4">
          <img src="assets/user_besar.svg" alt="User Image" style="width: 21px; height: 21px; object-fit: cover;"
                class="mx-2">
          <div class="mx-2" style="font-size: 16px;">Theresa Webb</div>
        </div>
      </div>
    </div>

    <button id="showRectangle" class="bg-green-500 border-none rounded-2xl p-8 flex flex-col justify-center items-start text-white font-sans text-left">
      <div class="flex items-center mt-2 ml-4">
        <div class="img w-14 h-14 overflow-hidden rounded-full mb-4 align-top">
          <img src="assets/user_besar.svg" alt="User Image" class="w-full h-full object-cover">
        </div>
        <div class="text ml-4 mb-5">
          <div class="text-xl mb-2">Theresa Webb</div>
          <div class="text-sm">Admin</div>
        </div>
      </div> 
    </button>
  </div>

  <script>
    // JavaScript to show the rectangle on button click
    document.getElementById('showRectangle').addEventListener('click', function() {
      var container = document.getElementById('container');

      // Toggle class to initiate animation
      container.classList.toggle('show-rectangle');
    });
  </script>

</body>
</html>

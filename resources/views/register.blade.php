<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registration</title>
  {{-- font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
  {{-- css --}}
  <link rel="stylesheet" href="assets/output.css">
</head>
<body style="background-image: url('assets/img/bg-login.svg');">

  <div class="mx-auto my-14 container">
    <!-- card -->
    <div class="bg-white flex mx-auto px-20 py-12 w-2/3 h-3/5 border border-slate-200 shadow-xl p-5">
        <!-- form section -->
        <div class="input-area w-3/5">
          <div class="text-3xl text-sims font-pop font-bold">Register</div>
          <div class="text-sm mt-2 text-slate-400 font-pop">Create a new account</div>
          <form action="" class="mt-10 pr-8">
            <ul>
              <li>
                <input type="text" id="nama" placeholder="Nama" class="font-ubuntu font-medium mb-5 px-4 py-3 border-2 text-gray-500 border-gray-300 w-full block text-sm placeholder:text-gray-400 focus:placeholder:invisible focus:outline-none focus:ring-1 focus:ring-sims focus:border-sims invalid:text-pink-700 peer invalid:focus:ring-pink-700 invalid:focus:border-pink-700">
              </li>
              <li>
                <input type="number" id="nip" placeholder="NIP" class="font-ubuntu font-medium mb-5 px-4 py-3 border-2 text-gray-500 border-gray-300 w-full block text-sm placeholder:text-gray-400 focus:placeholder:invisible focus:outline-none focus:ring-1 focus:ring-sims focus:border-sims invalid:text-pink-700 peer invalid:focus:ring-pink-700 invalid:focus:border-pink-700">
              </li>
              <li>
                <input type="email" id="email" placeholder="Email" class="font-ubuntu font-medium mb-5 px-4 py-3 border-2 text-gray-500 border-gray-300 w-full block text-sm placeholder:text-gray-400 focus:placeholder:invisible focus:outline-none focus:ring-1 focus:ring-sims focus:border-sims invalid:text-pink-700 peer invalid:focus:ring-pink-700 invalid:focus:border-pink-700">
              </li>
              <li>
                <input type="password" id="password" placeholder="Password" class="font-ubuntu font-medium px-4 py-3 border-2 text-gray-500 border-gray-300 w-full block text-sm placeholder:text-gray-400 focus:placeholder:invisible focus:outline-none focus:ring-1 focus:ring-sims focus:border-sims invalid:text-pink-700 peer invalid:focus:ring-pink-700 invalid:focus:border-pink-700">
              </li>
              <li>
                <button type="submit" class="font-ubuntu bg-[#90C2C2] w-full py-4 text-sm font-medium text-white mt-5 hover:bg-[#5B9C9C]">Register</button>
              </li>
              <li class="text-center mt-4 mb-10">
                <a href="/login" class="font-ubuntu text-sims underline text-sm">Already have an account?</a>
              </li>
            </ul>
          </form>
        </div>
        <!-- image -->
        <img class="w-2/4 -mr-2" src="assets/img/regist.svg" alt="" srcset="">
    </div>
  </div> <!-- container -->
</body>
</html>
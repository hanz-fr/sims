<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
  <!-- css -->
  <link rel="stylesheet" href="assets/output.css">
</head>
<body style="background-image: url('assets/img/bg-login.svg');">

  <div class="mx-auto my-28 container">
    <!-- card -->
    <div class="flex bg-white px-20 py-16 mx-auto w-2/3 h-3/5 border border-slate-200 shadow-xl">
        <!-- form section -->
        <div class="input-area w-2/5">
          <div class="text-3xl text-sims font-pop font-bold">Welcome</div>
          <div class="text-sm mt-2 text-slate-400 font-pop">Please login to access the website</div>
          <form action="" class="mt-12">
            <ul>
              <li>
                <input type="number" id="nip" placeholder="NIP" class="font-ubuntu font-medium mb-6 px-4 py-3 border-2 text-gray-500 border-gray-300 w-full block text-sm placeholder:text-gray-400 focus:placeholder:invisible focus:outline-none focus:ring-1 focus:ring-sims focus:border-sims invalid:text-pink-700 peer invalid:focus:ring-pink-700 invalid:focus:border-pink-700">
              </li>
              <li>
                <input type="password" id="password" placeholder="Password" class="font-ubuntu font-medium px-4 py-3 border-2 text-gray-500 border-gray-300 w-full block text-sm placeholder:text-gray-400 focus:placeholder:invisible focus:outline-none focus:ring-1 focus:ring-sims focus:border-sims invalid:text-pink-700 peer invalid:focus:ring-pink-700 invalid:focus:border-pink-700">
              </li>
              <li>
                <button type="submit" class="font-ubuntu bg-[#90C2C2] w-full py-3 text-sm font-medium text-white mt-7 hover:bg-[#5B9C9C]">Login</button>
              </li>
              <li class="text-center mt-4 mb-8">
                <a href="/register" class="font-ubuntu text-sims underline text-sm">Don't have an account?</a>
              </li>
            </ul>
          </form>
        </div>
        <!-- image -->
        <img class="w-1/2 items-center m-auto mr-0" src="assets/img/regist.svg" alt="" srcset="">
      </div>
    </div>
  </div> <!-- container -->
</body>
</html>
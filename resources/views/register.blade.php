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
  {{-- icon --}}
  <link rel="stylesheet" href="font-awesome/css/all.min.css">
</head>
<body style="background-image: url('assets/img/bg-login.svg');">

  <div class="tw-mx-auto tw-my-14 tw-container">
    <!-- card -->
    <div class="tw-bg-white tw-flex tw-mx-auto tw-px-20 tw-py-12 tw-w-2/3 tw-h-3/5 tw-border tw-border-slate-200 tw-shadow-xl tw-p-5">
        <!-- form section -->
        <div class="input-area tw-w-3/5">
          <div class="tw-text-3xl tw-text-sims tw-font-pop tw-font-bold">Register</div>
          <div class="tw-text-sm tw-mt-2 tw-text-slate-400 tw-font-pop">Create a new account</div>
          <form action="" class="tw-mt-10 tw-pr-8">
            <ul>
              <li>
                <input type="text" id="nama" placeholder="Nama" class="tw-font-ubuntu tw-font-medium tw-mb-5 tw-px-4 tw-py-3 tw-border-2 tw-text-gray-500 tw-border-gray-300 tw-w-full tw-block tw-text-sm placeholder:tw-text-gray-400 focus:placeholder:tw-invisible focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-sims focus:tw-border-sims invalid:tw-text-pink-700 tw-peer invalid:focus:tw-ring-pink-700 invalid:focus:tw-border-pink-700">
              </li>
              <li>
                <input type="number" id="nip" placeholder="NIP" class="tw-font-ubuntu tw-font-medium tw-mb-5 tw-px-4 tw-py-3 tw-border-2 tw-text-gray-500 tw-border-gray-300 tw-w-full tw-block tw-text-sm placeholder:tw-text-gray-400 focus:placeholder:tw-invisible focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-sims focus:tw-border-sims invalid:tw-text-pink-700 tw-peer invalid:focus:tw-ring-pink-700 invalid:focus:tw-border-pink-700">
              </li>
              <li>
                <input type="email" id="email" placeholder="Email" class="tw-font-ubuntu tw-font-medium tw-mb-5 tw-px-4 tw-py-3 tw-border-2 tw-text-gray-500 tw-border-gray-300 tw-w-full tw-block tw-text-sm placeholder:tw-text-gray-400 focus:placeholder:tw-invisible focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-sims focus:tw-border-sims invalid:tw-text-pink-700 tw-peer invalid:focus:tw-ring-pink-700 invalid:focus:tw-border-pink-700">
              </li>
              <li>
                <input type="password" id="password" placeholder="Password" class="tw-font-ubuntu tw-font-medium tw-px-4 tw-py-3 tw-border-2 tw-text-gray-500 tw-border-gray-300 tw-w-full tw-block tw-text-sm placeholder:tw-text-gray-400 focus:placeholder:tw-invisible focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-sims focus:tw-border-sims invalid:tw-text-pink-700 tw-peer invalid:focus:tw-ring-pink-700 invalid:focus:tw-border-pink-700">
              </li>
              <li>
                <button type="submit" class="tw-font-ubuntu tw-bg-[#90C2C2] tw-w-full tw-py-4 tw-text-sm tw-font-medium tw-text-white tw-mt-5 hover:tw-bg-[#5B9C9C]">Register</button>
              </li>
              <li class="tw-text-center tw-mt-4 tw-mb-10">
                <a href="/login" class="tw-font-ubuntu tw-text-sims tw-underline tw-text-sm">Already have an account?</a>
              </li>
            </ul>
          </form>
        </div>
        <!-- image -->
        <img class="tw-w-2/4 tw--mr-2" src="assets/img/regist.svg" alt="" srcset="">
    </div>
  </div> <!-- container -->
</body>
</html>
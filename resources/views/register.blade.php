<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SIMS || {{ $title }}</title>
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
    <div class="tw-bg-white tw-flex lg:tw-flex-row sm:tw-flex-col-reverse tw-mx-auto tw-px-20 tw-py-12 tw-w-2/3 tw-h-3/5 tw-border tw-border-slate-200 tw-shadow-xl tw-p-5">
        <!-- form section -->
        <div class="input-area lg:tw-w-3/5 sm:tw-w-full">
          <div class="tw-text-3xl tw-text-sims tw-font-pop tw-font-bold">Register</div>
          <div class="tw-text-sm tw-mt-2 tw-text-slate-400 tw-font-pop">Create a new account</div>
          <form action="/registeruser" method="post" class="tw-mt-10 tw-pr-8">
            @csrf
            <ul>
              <li>
                <input type="text" name="nama" id="nama" placeholder="Nama" class="tw-font-ubuntu tw-font-medium tw-mb-5 tw-px-4 tw-py-3 tw-border-2 tw-text-gray-500 tw-border-gray-300 tw-w-full tw-block tw-text-sm placeholder:tw-text-gray-400 focus:placeholder:tw-invisible focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-sims focus:tw-border-sims invalid:tw-text-pink-700 tw-peer invalid:focus:tw-ring-pink-700 invalid:focus:tw-border-pink-700">
              </li>
              <li>
                <input type="text" name="nip" id="nip" placeholder="NIP" maxlength="20" class="tw-font-ubuntu tw-font-medium tw-mb-5 tw-px-4 tw-py-3 tw-border-2 tw-text-gray-500 tw-border-gray-300 tw-w-full tw-block tw-text-sm placeholder:tw-text-gray-400 focus:placeholder:tw-invisible focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-sims focus:tw-border-sims invalid:tw-text-pink-700 tw-peer invalid:focus:tw-ring-pink-700 invalid:focus:tw-border-pink-700">
              </li>
              <li>
                <input type="email" name="email" id="email" placeholder="Email" class="tw-font-ubuntu tw-font-medium tw-mb-5 tw-px-4 tw-py-3 tw-border-2 tw-text-gray-500 tw-border-gray-300 tw-w-full tw-block tw-text-sm placeholder:tw-text-gray-400 focus:placeholder:tw-invisible focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-sims focus:tw-border-sims invalid:tw-text-pink-700 tw-peer invalid:focus:tw-ring-pink-700 invalid:focus:tw-border-pink-700">
              </li>
              <li>
                <input type="password" name="password" id="password" placeholder="Password" class="tw-font-ubuntu tw-font-medium tw-px-4 tw-py-3 tw-border-2 tw-text-gray-500 tw-border-gray-300 tw-w-full tw-block tw-text-sm placeholder:tw-text-gray-400 focus:placeholder:tw-invisible focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-sims focus:tw-border-sims invalid:tw-text-pink-700 tw-peer invalid:focus:tw-ring-pink-700 invalid:focus:tw-border-pink-700">
              </li>
              <li>
                <select name="roles" class="tw-my-5 dropdown-toggle tw-font-ubuntu tw-font-medium tw-px-4 tw-py-4 tw-border-2 tw-text-gray-400 tw-border-gray-300 tw-w-full tw-block tw-text-sm placeholder:tw-text-gray-400 focus:placeholder:tw-invisible focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-sims focus:tw-border-sims">
                  <option selected>Bagian</option>
                  <option value="1">Tata Usaha</option>
                  <option value="2">Kesiswaan</option>
                  <option value="3">Kurikulum</option>
                  <option value="4">Wali Kelas</option>
              </select>
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
        <img class="lg:tw-w-1/2 sm:tw-mb-4 sm:tw-w-full tw-items-center md:tw-m-auto" src="assets/img/sims-login.svg" alt="" srcset="">
    </div>
  </div> <!-- container -->
</body>
</html>
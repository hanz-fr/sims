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
<body style="background-image: url('assets/img/bg-admin.svg');">
  <div class="tw-mx-auto tw-container tw-py-48">
    <div class="tw-mx-auto tw-flex tw-rounded-3xl tw-overflow-hidden tw-w-2/5 tw-h-2/3 tw-shadow-lg tw-bg-white">
      <div class="tw-h-full tw-w-3/4 tw-py-10 tw-mx-14 tw-bg-white">

        <div class="tw-text-center tw-text-admin-300 tw-font-bold tw-text-2xl tw-font-ubuntu tw-pb-8">SIMS Admin</div>

        <form action="/login-admin" method="post">
          @csrf
          <input type="text" name="name" id="email" placeholder="Email" class="tw-font-ubuntu tw-font-medium tw-mb-5 tw-px-4 tw-py-3 tw-border-2 tw-text-gray-500 tw-border-gray-300 tw-w-full tw-block tw-text-sm placeholder:tw-text-gray-400 focus:placeholder:tw-invisible focus:tw-outline-none focus:tw-shadow-md focus:tw-ring-1 focus:tw-ring-admin-300 focus:tw-border-admin-300 invalid:tw-text-pink-700 tw-peer invalid:focus:tw-ring-pink-700 invalid:focus:tw-border-pink-700">
          <input type="password" name="password" id="password" placeholder="Password" class="tw-font-ubuntu tw-font-medium tw-px-4 tw-py-3 tw-border-2 tw-text-gray-500 tw-border-gray-300 tw-w-full tw-block tw-text-sm placeholder:tw-text-gray-400 focus:placeholder:tw-invisible focus:tw-outline-none focus:tw-shadow-sm focus:tw-ring-1 focus:tw-ring-admin-300 focus:tw-border-admin-300 invalid:tw-text-pink-700 tw-peer invalid:focus:tw-ring-pink-700 invalid:focus:tw-border-pink-700">
          <button type="submit" class="tw-font-ubuntu tw-mb-8 tw-bg-admin-300 tw-w-full tw-py-4 tw-text-sm tw-font-medium tw-text-white tw-mt-5 hover:tw-bg-admin-400">Login</button>
        </form>
      </div>

      <div class="tw-bg-admin-300 tw-w-full tw-h-full tw-items-center">
        <img class="tw-rounded-xl tw-mx-auto tw-my-24 tw-w-3/4" src="assets/img/admin-login.svg" alt="" srcset="">
      </div>
    </div>
  </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title }}</title>
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

  @if($status == 'message')
  <div class="tw-mx-auto tw-container">
    <div class="tw-bg-white tw-rounded-[50px] tw-flex tw-flex-col tw-mx-auto tw-my-28 tw-px-20 tw-py-11 tw-top-1/2 tw-w-3/5 tw-h-3/5 tw-border tw-border-slate-200 tw-shadow-xl tw-text-center">
        <img class="tw-w-1/2 tw-mx-auto" src="assets/img/email-sent.svg" alt="" srcset="">
          <div class="tw-text-3xl tw-font-bold tw-text-sims-400 tw-font-pop tw-mt-5">Email Terkirim</div>
          <div class="tw-text-sm tw-text-[#B8B8B8] tw-font-medium tw-font-pop tw-mt-3">Please check your inbox</div>
          <a href="/login">
          <button class="tw-font-ubuntu tw-bg-[#90C2C2] tw-py-3 text-md tw-mx-auto tw-font-medium tw-text-white tw-mt-9 hover:tw-bg-[#5B9C9C] tw-w-2/4">
          Okay
        </button>
      </a>
    </div> <!-- card -->
  </div> <!-- container -->
  @else

  <div class="tw-mx-auto tw-my-28 tw-container">
    <!-- card -->
    <div class="tw-flex lg:tw-flex-row sm:tw-flex-col-reverse tw-bg-white tw-px-20 tw-py-10 tw-mx-auto tw-w-2/3 tw-h-3/5 tw-border tw-border-slate-200 tw-shadow-xl">
        <!-- form section -->
        <div class="input-area lg:tw-w-3/5 tw-mr-8 sm:tw-w-full tw-flex tw-flex-col tw-justify-center">
          <div class="tw-text-3xl tw-text-sims-400 tw-font-pop tw-font-bold">Reset Password</div>
          <div class="tw-text-sm tw-mt-2 tw-text-slate-400 tw-font-pop">Input your email address, we will send you a reset password link</div>
          <form action="/forget-password" method="post" class="tw-mt-12">
            @csrf
            <ul class="tw-flex tw-flex-col tw-gap-5 tw-font-ubuntu">
              <li>
                <input type="text" name="email" id="email" @error('email') is-invalid @enderror placeholder="Email" class="tw-font-medium tw-px-4 tw-py-3 tw-border-2 tw-text-gray-500 tw-border-gray-300 tw-w-full tw-block tw-text-sm placeholder:tw-text-gray-400 focus:placeholder:tw-invisible focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-sims-400 focus:tw-border-sims-400 invalid:tw-text-pink-700 tw-peer invalid:focus:tw-ring-pink-700 invalid:focus:tw-border-pink-700">
                @error('email')
                  <div class="tw-text-sm tw-text-pink-700 tw-mt-1">{{ $message }}</div>
                @enderror
              </li>
              <li>
                <button type="submit" class="tw-bg-[#90C2C2] tw-w-full tw-py-3 tw-text-sm tw-font-medium tw-text-white hover:tw-bg-[#5B9C9C]">Send Reset Password Link</button>
              </li>
            </ul>
          </form>
        </div>
        <!-- image -->
        <img class="lg:tw-w-1/2 sm:tw-mb-4 sm:tw-w-full tw-items-center md:tw-m-auto tw-mr-0" src="assets/img/mailbox.svg" alt="" srcset="">
      </div>
    </div>
  </div> <!-- container -->
  @endif
  @include('sweetalert::alert')
</body>
</html>

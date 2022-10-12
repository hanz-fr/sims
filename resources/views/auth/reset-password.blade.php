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
  <link rel="stylesheet" href="{{ URL::asset('assets/output.css') }}">
  {{-- icon --}}
  <link rel="stylesheet" href="font-awesome/css/all.min.css">
</head>
<body>

  <div class="tw-mx-auto tw-my-28 tw-container">
    <!-- card -->
    <div class="tw-flex lg:tw-flex-row sm:tw-flex-col-reverse tw-bg-white tw-px-20 tw-py-10 tw-mx-auto tw-w-2/3 tw-h-3/5">
        <!-- form section -->
        <div class="input-area lg:tw-w-3/5 tw-mr-8 sm:tw-w-full tw-flex tw-flex-col tw-justify-center">
          <div class="tw-text-3xl tw-text-sims-400 tw-font-pop tw-font-bold">Reset Password</div>
          <div class="tw-text-sm tw-mt-2 tw-text-slate-400 tw-font-pop">Create new password</div>
          <form action="/reset-password" method="post" class="tw-mt-12">
            @csrf
            <ul class="tw-flex tw-flex-col tw-gap-5 tw-font-ubuntu">
              <li>
                <input type="email" name="email" id="email" @error('email') is-invalid @enderror placeholder="Email" class="tw-font-medium tw-px-4 tw-py-3 tw-border-2 tw-text-gray-500 tw-border-gray-300 tw-w-full tw-block tw-text-sm placeholder:tw-text-gray-400 focus:placeholder:tw-invisible focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-sims-400 focus:tw-border-sims-400 invalid:tw-text-pink-700 tw-peer invalid:focus:tw-ring-pink-700 invalid:focus:tw-border-pink-700">
                @error('email')
                  <div class="tw-text-sm tw-text-pink-700 tw-mt-1">{{ $message }}</div>
                @enderror
              </li>
              <li>
                <input type="password" name="password" id="password" @error('password') is-invalid @enderror placeholder="New Password" class="tw-font-medium tw-px-4 tw-py-3 tw-border-2 tw-text-gray-500 tw-border-gray-300 tw-w-full tw-block tw-text-sm placeholder:tw-text-gray-400 focus:placeholder:tw-invisible focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-sims-400 focus:tw-border-sims-400 invalid:tw-text-pink-700 tw-peer invalid:focus:tw-ring-pink-700 invalid:focus:tw-border-pink-700">
                @error('password')
                  <div class="tw-text-sm tw-text-pink-700 tw-mt-1">{{ $message }}</div>
                @enderror
              </li>
              <li>
                <input type="password" name="password_confirmation" id="password_confirmation" @error('password_confirmation') is-invalid @enderror placeholder="New Password Confirmation" class="tw-font-medium tw-px-4 tw-py-3 tw-border-2 tw-text-gray-500 tw-border-gray-300 tw-w-full tw-block tw-text-sm placeholder:tw-text-gray-400 focus:placeholder:tw-invisible focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-sims-400 focus:tw-border-sims-400 invalid:tw-text-pink-700 tw-peer invalid:focus:tw-ring-pink-700 invalid:focus:tw-border-pink-700">
                @error('password_confirmation')
                  <div class="tw-text-sm tw-text-pink-700 tw-mt-1">{{ $message }}</div>
                @enderror
              </li>
              <li>
                <button type="submit" class="tw-bg-[#90C2C2] tw-w-full tw-py-3 tw-text-sm tw-font-medium tw-text-white hover:tw-bg-[#5B9C9C]">Change Password</button>
              </li>
            </ul>
          </form>
        </div>
        <!-- image -->
        <img class="lg:tw-w-1/2 sm:tw-mb-4 sm:tw-w-full tw-items-center md:tw-m-auto tw-mr-0" src="{{ URL::asset('assets/img/reset-password.svg') }}" alt="" srcset="">
      </div>
    </div>
  </div> <!-- container -->
  @include('sweetalert::alert')
</body>
</html>

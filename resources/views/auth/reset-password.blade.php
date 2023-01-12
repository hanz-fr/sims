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
    <link rel="stylesheet" href="{{ URL::asset('font-awesome/css/all.min.css') }}">
</head>
<body>

  <div class="tw-mx-auto tw-flex tw-justify-center tw-items-center tw-h-screen tw-container">
    <!-- card -->
    <div class="tw-flex lg:tw-flex-row sm:tw-flex-col-reverse tw-bg-white tw-px-20 tw-py-10 tw-mx-auto tw-w-2/3 tw-h-fit">
        <!-- form section -->
        <div class="input-area lg:tw-w-3/5 tw-mr-8 sm:tw-w-full tw-flex tw-flex-col tw-justify-center">
          <div class="tw-text-3xl tw-text-sims-400 tw-font-pop tw-font-bold">Atur Ulang Kata Sandi</div>
          <div class="tw-text-sm tw-mt-2 tw-text-slate-400 tw-font-pop">Buat kata sandi baru</div>
          <form action="{{ route('update.password') }}" method="POST" class="tw-mt-12">
            @csrf
            @method('PATCH')
            <ul class="tw-flex tw-flex-col tw-gap-5 tw-font-ubuntu">
              <li>
                <input type="email" name="email" id="email" @error('email') is-invalid @enderror value="{{ $user->email }}" placeholder="Email" class="tw-font-medium tw-px-4 tw-py-3 tw-border-2 tw-text-gray-500 tw-border-gray-300 tw-w-full tw-block tw-text-sm placeholder:tw-text-gray-400 focus:placeholder:tw-invisible focus:tw-outline-none focus:tw-ring-1 focus:tw-ring-sims-400 focus:tw-border-sims-400 invalid:tw-text-pink-700 tw-peer invalid:focus:tw-ring-pink-700 invalid:focus:tw-border-pink-700" >
                @error('email')
                  <div class="tw-text-sm tw-text-pink-700 tw-mt-1">{{ $message }}</div>
                @enderror
              </li>
              <li x-data="{ show: true }" class="tw-flex">
                <div class="tw-relative tw-w-full">
                <input name="password" id="password" @error('password') is-invalid @enderror placeholder="Kata Sandi Baru" :type="show ? 'password' : 'text'" class="login-input" required>
                <div class="tw-absolute tw-inset-y-0 tw-right-0 tw-pr-3 tw-flex tw-items-center tw-text-sm tw-leading-5">

                    <svg class="tw-h-5 tw-text-gray-500" fill="none" @click="show = !show"
                    :class="{'tw-hidden': !show, 'tw-block':show }" xmlns="http://www.w3.org/2000/svg"
                    viewbox="0 0 576 512">
                    <path fill="currentColor"
                        d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 
                        32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 
                        32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 
                        95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                    </path>
                    </svg>

                    <svg class="tw-h-5 tw-text-gray-500" fill="none" @click="show = !show"
                    :class="{'tw-block': !show, 'tw-hidden':show }" xmlns="http://www.w3.org/2000/svg"
                    viewbox="0 0 640 512">
                    <path fill="currentColor"
                        d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 
                        35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 
                        0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 
                        331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 
                        0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 
                        16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 
                        416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 
                        10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                    </path>
                    </svg>
                </div>
                </div>
                @error('password')
                    <div class="tw-text-sm tw-text-pink-700 tw-mt-1 tw-font-ubuntu">{{ $message }}</div>
                @enderror
              </li>
              <li x-data="{ show: true }" class="tw-flex">
                <div class="tw-relative tw-w-full">
                <input name="password_confirmation" id="password" @error('password_confirmation') is-invalid @enderror placeholder="Ulangi Kata Sandi Baru" :type="show ? 'password' : 'text'" class="login-input" required>
                <div class="tw-absolute tw-inset-y-0 tw-right-0 tw-pr-3 tw-flex tw-items-center tw-text-sm tw-leading-5">

                    <svg class="tw-h-5 tw-text-gray-500" fill="none" @click="show = !show"
                    :class="{'tw-hidden': !show, 'tw-block':show }" xmlns="http://www.w3.org/2000/svg"
                    viewbox="0 0 576 512">
                    <path fill="currentColor"
                        d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 
                        32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 
                        32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 
                        95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                    </path>
                    </svg>

                    <svg class="tw-h-5 tw-text-gray-500" fill="none" @click="show = !show"
                    :class="{'tw-block': !show, 'tw-hidden':show }" xmlns="http://www.w3.org/2000/svg"
                    viewbox="0 0 640 512">
                    <path fill="currentColor"
                        d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 
                        35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 
                        0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 
                        331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 
                        0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 
                        16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 
                        416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 
                        10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                    </path>
                    </svg>
                </div>
                </div>
                @error('password')
                    <div class="tw-text-sm tw-text-pink-700 tw-mt-1 tw-font-ubuntu">{{ $message }}</div>
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

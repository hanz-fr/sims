<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

<body style="background-image: url('{{ URL::asset('assets/img/bg-login.svg') }}')">

    <div class="tw-mx-auto tw-my-14 tw-container">

        @if($status == 'success')
        <section class="tw-bg-white tw-font-pop tw-rounded-[50px] tw-flex tw-flex-col tw-mx-auto tw-my-28 tw-px-20 tw-py-11 tw-top-1/2 tw-w-3/5 tw-h-3/5 tw-border tw-border-slate-200 tw-shadow-xl tw-text-center">
            <img class="tw-w-1/2 tw-mx-auto" src="{{ URL::asset('assets/img/email-sent.svg') }}" alt="Registration Success">
            <div class="tw-text-3xl tw-font-bold tw-text-sims-400 tw-mt-5">Verifikasi akun anda</div>
            <div class="tw-text-sm tw-text-basic-300 tw-font-medium tw-mt-3">Kami sudah mengirimkan link verifikasi, silahkan check email anda.</div>
            <form action="{{ route('user.resend', $user->id) }}" method="post">
                @csrf
                <button type="submit" class="tw-font-ubuntu tw-bg-[#90C2C2] tw-py-3 text-md tw-mx-auto tw-font-medium tw-text-white tw-mt-9 hover:tw-bg-[#5B9C9C] tw-w-2/4">
                    Kirim Ulang
                </button>
            </form>
            <a href="/login" type="submit" class="tw-font-ubuntu tw-bg-gray-400 tw-py-3 text-md tw-mx-auto tw-font-medium tw-text-white tw-mt-2 hover:tw-bg-gray-600 tw-w-2/4">
                Lanjutkan tanpa verifikasi
            </a>
        </section> <!-- card -->
        @else
        <!-- card -->
        <div class="tw-bg-white tw-flex lg:tw-flex-row sm:tw-flex-col-reverse tw-mx-auto tw-px-20 tw-py-12 tw-w-2/3 tw-h-3/5 tw-border tw-border-slate-200 tw-shadow-xl tw-p-5">
            <!-- form section -->
            <section class="lg:tw-w-3/5 sm:tw-w-full tw-font-pop">
                <div class="tw-text-3xl tw-text-sims-400 tw-font-bold md:tw-mt-3 sm:tw-text-center lg:tw-text-left">Registrasi</div>
                <div class="tw-text-sm tw-mt-2 tw-text-slate-400 sm:tw-text-center lg:tw-text-left">Daftar untuk membuat akun baru</div>

            <form action="/registeruser" method="post" class="tw-mt-10 lg:tw-pr-8">
                @csrf
                <ul class="tw-flex tw-flex-col tw-gap-5">
                    <li>
                        <input type="text" name="nama" @error('nama') is-invalid @enderror placeholder="Nama" class="login-input">
                        @error('nama')
                            <div class="tw-text-sm tw-text-pink-700 tw-mt-1 tw-font-ubuntu">{{ $message }}</div>
                        @enderror
                    </li>
                    <li>
                        <input type="text" name="nip" @error('nip') is-invalid @enderror placeholder="NIP" maxlength="18" class="login-input" required>
                        @error('nip')
                            <div class="tw-text-sm tw-text-pink-700 tw-mt-1 tw-font-ubuntu">{{ $message }}</div>
                        @enderror
                    </li>
                    <li>
                        <input type="email" name="email" @error('email') is-invalid @enderror placeholder="Email" class="login-input">
                        @error('email')
                            <div class="tw-text-sm tw-text-pink-700 tw-mt-1 tw-font-ubuntu">{{ $message }}</div>
                        @enderror
                    </li>
                    <li x-data="{ show: true }" class="tw-flex">
                        <div class="tw-relative tw-w-full">
                        <input name="password" id="password" @error('password') is-invalid @enderror placeholder="Kata Sandi" :type="show ? 'password' : 'text'" class="login-input" required>
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
                        <select name="role" class="tw-mb-5 dropdown-toggle login-input tw-text-gray-400">
                        <option selected>Bagian</option>
                        <option value="1">Tata Usaha</option>
                        <option value="2">Kesiswaan</option>
                        <option value="3">Kurikulum</option>
                        <option value="4">Wali Kelas</option>
                        </select>
                    </li>
                    <li>
                        <button type="submit" class="tw-font-ubuntu tw-bg-[#90C2C2] tw-w-full tw-py-4 tw-text-sm tw-font-medium tw-text-white hover:tw-bg-[#5B9C9C]">Daftar</button>
                    </li>
                    <li class="tw-text-center tw-mb-10">
                        <a href="/login" class="tw-font-ubuntu tw-text-sims-400 tw-underline tw-text-sm">Sudah punya akun?</a>
                    </li>
                </ul>
            </form>
            </section>

            <!-- image -->
            <img class="lg:tw-w-1/2 sm:tw-mb-4 sm:tw-w-full tw-items-center md:tw-m-auto" src="{{ URL::asset('assets/img/sims-login.svg') }}" alt="" srcset="">
            @endif
        </div>
    </div> <!-- container -->
    @include('sweetalert::alert')
    {{-- alpine js --}}
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.10.3/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
</body>
</html>
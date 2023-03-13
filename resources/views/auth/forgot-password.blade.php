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
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Ubuntu:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/satoshi" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@900,700,500,301,701,300,501,401,901,400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- css --}}
    <link rel="stylesheet" href="{{ URL::asset('assets/output.css') }}">

    {{-- icon --}}
    <link rel="stylesheet" href="{{ URL::asset('font-awesome/css/all.min.css') }}">

</head>

<body style="background-image: url('{{ URL::asset('assets/img/bg-login.svg') }}');">

    @if ($status == 'message')
        <div class="tw-mx-auto tw-container">
            <div
                class="tw-bg-white tw-rounded-[50px] tw-flex tw-flex-col tw-mx-auto tw-my-28 tw-px-20 tw-py-11 tw-top-1/2 tw-w-3/5 tw-h-3/5 tw-border tw-border-slate-200 tw-shadow-xl tw-justify-center tw-text-center">
                <img class="tw-w-1/2 tw-mx-auto" src="assets/img/email-sent.svg" alt="" srcset="">
                <div class="sims-heading-3xl md:tw-mt-3 lg:tw-text-center tw-text-left">Email Terkirim</div>
                <div class="tw-text-sm tw-font-sg tw-mt-2 tw-text-gray-400 lg:tw-text-center tw-text-left">Cek inbox
                    email anda</div>
                <a href="/login">
                    <button
                        class="tw-font-sg tw-bg-[#90C2C2] tw-py-3 text-md tw-mx-auto tw-font-medium tw-text-white tw-mt-9 hover:tw-bg-[#5B9C9C] tw-w-2/4">
                        Oke!
                    </button>
                </a>
            </div> <!-- card -->
        </div> <!-- container -->
    @else
        <div class="tw-mx-auto tw-flex tw-justify-center tw-items-center tw-h-screen tw-container">
            <!-- card -->
            <div
                class="tw-flex lg:tw-flex-row sm:tw-flex-col-reverse tw-bg-white tw-px-20 tw-py-10 tw-mx-auto tw-w-2/3 tw-h-fit tw-border tw-border-slate-200 tw-shadow-xl">
                <!-- form section -->
                <div class="input-area lg:tw-w-3/5 tw-mr-8 sm:tw-w-full tw-flex tw-flex-col tw-justify-center">
                    <div class="sims-heading-3xl md:tw-mt-3 sm:tw-text-center lg:tw-text-left">Atur Ulang Kata Sandi
                    </div>
                    <div class="tw-text-sm tw-font-sg tw-mt-2 tw-text-gray-400 sm:tw-text-center lg:tw-text-left">Input
                        alamat email anda, kami akan mengirimkan link atur ulang kata sandi</div>
                    <form action="/forget-password" method="post" class="tw-mt-12">
                        @csrf
                        <ul class="tw-flex tw-flex-col tw-gap-5 tw-font-sg">
                            <li>
                                <input type="text" name="email" @error('email') is-invalid @enderror
                                    placeholder="Email" class="login-input">
                                @error('email')
                                    <div class="tw-text-sm tw-text-pink-700 tw-mt-1">{{ $message }}</div>
                                @enderror
                            </li>
                            <li>
                                <button type="submit"
                                    class="tw-bg-[#90C2C2] tw-w-full tw-py-3 tw-text-sm tw-font-medium tw-text-white hover:tw-bg-[#5B9C9C]">Kirim
                                    Link</button>
                            </li>
                        </ul>
                    </form>
                </div>
                <!-- image -->
                <img class="lg:tw-w-1/2 sm:tw-mb-4 sm:tw-w-full tw-items-center md:tw-m-auto tw-mr-0"
                    src="assets/img/mailbox.svg" alt="Reset Password" srcset="">
            </div>
        </div>
    @endif

    @include('sweetalert::alert')
</body>

</html>

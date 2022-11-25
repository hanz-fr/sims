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

  <div class="tw-mx-auto tw-container">
    <section class="tw-bg-white tw-font-pop tw-rounded-[50px] tw-flex tw-flex-col tw-mx-auto tw-my-28 tw-px-20 tw-py-11 tw-top-1/2 tw-w-3/5 tw-h-3/5 tw-border tw-border-slate-200 tw-shadow-xl tw-text-center">
        <img class="tw-w-1/2 tw-mx-auto" src="{{ URL::asset('assets/img/verif-code.svg') }}" alt="Registration Success">
        <div class="tw-text-3xl tw-font-bold tw-text-sims-400 tw-mt-5">Masukkan Kode Verifikasi</div>
        <div class="tw-text-sm tw-text-basic-300 tw-font-medium tw-mt-3">Mohon cek SMS anda. Kami sudah mengirimkan kode verifikasi</div>
        <form action="">
            @csrf
            <div class="tw-w-1/2 tw-mx-auto tw-mt-5">
                <input type="text" id="verification_code" placeholder="Kode Verifikasi" class="login-input tw-mx-auto">
                {{-- @error('no_telp')
                    <div class="tw-text-sm tw-text-pink-700 tw-mt-1">{{ $message }}</div>
                @enderror --}}
                </div>
              <button type="submit" id="sign-in-button" class="tw-font-ubuntu tw-bg-[#90C2C2] tw-py-3 text-md tw-mx-auto tw-font-medium tw-text-white tw-mt-6 hover:tw-bg-[#5B9C9C] tw-w-2/4">
                  Verifikasi Akun
              </button>
        </form>
    </section> <!-- card -->
</div> <!-- container -->        
</body>
</html>
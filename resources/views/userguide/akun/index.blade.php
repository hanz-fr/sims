@extends('layouts.main-new')

@section('content')
<div class="tw-container tw-mx-auto">

    <!-- spacing !-->
    <div class="tw-mt-10"></div> 
    <!-------------->

    <div role="status" class="tw-flex tw-justify-center">
        <div class="lg:tw-w-1/2">
            <img src="{{ URL::asset('assets/img/hc-header-account.svg') }}" class="" alt="hc-header-img">
        </div>
    </div>
    

    <!-- spacing !-->
    <div class="tw-mt-12"></div> 
    <!-------------->

    <div class="tw-mx-60">
        <div class="tw-flex tw-flex-col">

            <div class="tw-text-center hc-title-3xl">Tentang Akun</div>

            <div class="tw-grid tw-grid-cols-2 tw-mt-24">
                <div class="tw-flex tw-flex-col tw-justify-center tw-pr-10">
                    <h3 class="tw-text-left hc-title-xl"><span class="tw-text-bluewood-800">Langkah 1:</span> Login dengan akun yang sudah ada</h3>
                    <p class="tw-text-justify tw-mt-5 hc-text-lg">
                        Untuk faktor keamanan, kami tidak menyediakan registrasi di depan. 
                        Tetapi, anda dapat menghubungi admin untuk pembuatan akun. Jika sudah 
                        mendapatkan akun, login dengan NIP dan password anda.
                    </p>
                </div>
    
                <div class="tw-pl-10">
                    <div class="tw-rounded-lg tw-overflow-hidden tw-drop-shadow-lg">
                        <img src="{{ URL::asset('assets/img/login.jpeg') }}" alt="">
                    </div>
                </div>
            </div>

            <div class="tw-grid tw-grid-cols-2 tw-mt-24">
                <div class="tw-flex tw-flex-col tw-justify-center tw-pr-10">
                    <h3 class="tw-text-left hc-title-xl"><span class="tw-text-bluewood-800">Langkah 2:</span> Verifikasi akun anda</h3>
                    <div class="tw-flex">
                        <div class="tw-flex tw-flex-col tw-justify-center tw-items-center">
                            <img src="{{ URL::asset('assets/img/login.jpeg') }}" alt="">
                            <i class="fa-solid fa-circle-1 tw-text-sims-new-500 tw-text-4xl"></i>
                            <p></p>
                        </div>
                        <div class="tw-flex tw-flex-col">
                            <img src="{{ URL::asset('assets/img/login.jpeg') }}" alt="">
                            <i class="fa-solid fa-circle-2 tw-text-sims-new-500 tw-text-4xl"></i>
                            <p></p>
                        </div>
                        <div class="tw-flex tw-flex-col">
                            <img src="{{ URL::asset('assets/img/login.jpeg') }}" alt="">
                            <i class="fa-solid fa-circle-2 tw-text-sims-new-500 tw-text-4xl"></i>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- spacing !-->
        <div class="tw-my-24"></div> 
        <!-------------->
</div>
@endsection
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
                        Agar bisa menggunakan SIMS tentunya harus memiliki akun terlebih dahulu.
                        Jika sudah memiliki akun, maka di bagian login, anda tinggal mengisikan
                        NIP dan Password saja agar bisa login kedalam SIMS. Jika tidak memiliki
                        akun, anda bisa membuatnya melalui Admin SIMS. Untuk pembuatan akun wajib
                        menggunakan NIP pengguna.
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
                            <p class="tw-text-justify tw-mt-5 hc-text-lg">
                                Setelah anda login, anda secara otomatis akan diarahkan ke
                                laman dashboard. Untuk memverifikasi akun anda, pertama-tama
                                anda harus menambahkan alamat email, yang dapat ditambahkan
                                melalui icon profil di pojok bawah kiri.
                            </p>
                        </div>
                        <div class="tw-flex tw-flex-col">
                            <img src="{{ URL::asset('assets/img/login.jpeg') }}" alt="">
                            <i class="fa-solid fa-circle-2 tw-text-sims-new-500 tw-text-4xl"></i>
                            <p class="tw-text-justify tw-mt-5 hc-text-lg">
                                Setelah menekan icon profil, anda akan diarahkan ke laman profil
                                yang berisi data diri anda. Disini juga anda dapat mengubah data 
                                diri anda dan memverifikasi akun anda melalui icon "Pena" di bagian
                                detail, yang setelah ditekan akan mengalihkan anda ke laman edit data.
                            </p>
                        </div>
                        <div class="tw-flex tw-flex-col">
                            <img src="{{ URL::asset('assets/img/login.jpeg') }}" alt="">
                            <i class="fa-solid fa-circle-2 tw-text-sims-new-500 tw-text-4xl"></i>
                            <p class="tw-text-justify tw-mt-5 hc-text-lg">
                                Dilaman edit data ini anda dapat mengedit data diri anda dan juga
                                mengubah kata sandi yang anda gunakan. Untuk verifikasi juga dapat
                                diselesaikan dibagian verifikasi akun. Setelah itu anda akan diarahkan
                                untuk mengisi email aktif anda untuk di verifikasi dengan menekan
                                tombol yang telah disediakan.
                            </p>
                        </div>
                        <div class="tw-flex tw-flex-col">
                            <img src="{{ URL::asset('assets/img/login.jpeg') }}" alt="">
                            <i class="fa-solid fa-circle-2 tw-text-sims-new-500 tw-text-4xl"></i>
                            <p class="tw-text-justify tw-mt-5 hc-text-lg">
                                Setelah menekan tombol verifikasi, maka anda akan mendapatkan
                                pesan verifikasi di email yang telah anda isikan tadi. Jika
                                pesan tersebut telah diterima, maka anda tinggal menekan link
                                yang telah disediakan. Dan, Selamat! Akun anda telah terverifikasi!
                            </p>
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
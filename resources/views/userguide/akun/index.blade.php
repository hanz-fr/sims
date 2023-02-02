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


            <div class="tw-text-center hc-title-3xl tw-mb-24">Petunjuk Akun</div>

            <div class="row">

                <h3 class="hc-title-2xl tw-mb-5"><span class="tw-text-bluewood-800">Langkah 1:</span> Login dengan akun yang sudah ada</h3>

                <div class="col-lg-6 tw-justify-center pr-5">
                    <p class="tw-text-justify tw-mt-5 hc-text-lg">
                        Agar bisa menggunakan SIMS tentunya harus memiliki akun terlebih dahulu.
                        Jika sudah memiliki akun, maka di bagian login, anda tinggal mengisikan
                        NIP dan Password saja agar bisa login kedalam SIMS. Jika tidak memiliki
                        akun, anda bisa membuatnya melalui Admin SIMS. Untuk pembuatan akun wajib
                        menggunakan NIP pengguna.
                    </p>
                </div>
    
                <div class="col-lg-6 tw-pl-10">
                    <div class="tw-rounded-lg tw-overflow-hidden tw-drop-shadow-lg">
                        <img src="{{ URL::asset('assets/img/login.jpeg') }}" alt="">
                    </div>
                </div>

            </div>

            <div class="tw-flex tw-flex-col tw-mx-12 tw-justify-center tw-pr-10 tw-mt-24">
                <h3 class="tw-text-left hc-title-2xl tw-mb-16">
                    <span class="tw-text-bluewood-800">Langkah 2:</span> 
                    Verifikasi akun anda
                </h3>
                
                <div class="tw-flex tw-gap-x-40 tw-pl-8 tw-pr-2 tw-mb-28 tw-flex-nowrap tw-max-w-full tw-pb-10 tw-overflow-x-scroll tw-scrollbar-thumb-gray-400 tw-scrollbar-thumb-rounded-lg tw-scrollbar-thin tw-scrollbar-track-gray-100">

                    <div class="col-lg-4 flex flex-col tw-gap-y-8">
                        <div class="tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                            <img src="{{ URL::asset('assets/img/hc-account-verif-1.svg') }}" alt="">
                        </div>
                        <div class="tw-text-center tw-flex tw-flex-col tw-gap-y-5">
                            <i class="fa-solid fa-circle-1 tw-text-sims-new-500 tw-text-4xl"></i>
                            <h4 class="tw-text-bluewood-800 hc-title-xl">Akses Halaman Profil</h4>
                            <p class="hc-text-lg">
                                Setelah login, anda secara otomatis akan diarahkan ke
                                laman dashboard. Untuk memverifikasi akun, pertama-tama
                                anda harus menambahkan alamat email, yang dapat ditambahkan
                                melalui icon profil di pojok bawah kiri.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 flex flex-col tw-gap-y-8">
                        <div class="tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                            <img src="{{ URL::asset('assets/img/hc-account-verif-2.svg') }}" alt="">
                        </div>
                        <div class="tw-text-center tw-flex tw-flex-col tw-gap-y-5">
                            <i class="fa-solid fa-circle-2 tw-text-sims-new-500 tw-text-4xl"></i>
                            <h4 class="tw-text-bluewood-800 hc-title-xl">Tekan tombol edit profil</h4>
                            <p class="hc-text-lg">
                                Anda akan diarahkan ke laman profil yang berisi data diri anda. 
                                Disini juga anda dapat mengubah data diri dan memverifikasi akun 
                                anda melalui icon "Pena" di bagian detail, yang setelah ditekan 
                                akan mengarahkan anda ke laman edit data.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 flex flex-col tw-gap-y-8">
                        <div class="tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                            <img src="{{ URL::asset('assets/img/hc-account-verif-3.svg') }}" alt="">
                        </div>
                        <div class="tw-text-center tw-flex tw-flex-col tw-gap-y-5">
                            <i class="fa-solid fa-circle-3 tw-text-sims-new-500 tw-text-4xl"></i>
                            <h4 class="tw-text-bluewood-800 hc-title-xl">Tekan tombol edit profil</h4>
                            <p class="hc-text-lg">
                                Untuk verifikasi akun, anda dapat menekan tab 'Verifikasi Akun'. 
                                Setelah itu anda akan diarahkan untuk mengisi email aktif anda 
                                untuk diverifikasi dengan menekan tombol di atas.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 flex flex-col tw-gap-y-8">
                        <div class="tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                            <img src="{{ URL::asset('assets/img/hc-account-verif-4.svg') }}" alt="">
                        </div>
                        <div class="tw-text-center tw-flex tw-flex-col tw-gap-y-5">
                            <i class="fa-solid fa-circle-4 tw-text-sims-new-500 tw-text-4xl"></i>
                            <h4 class="tw-text-bluewood-800 hc-title-xl">Tekan tombol edit profil</h4>
                            <p class="hc-text-lg">
                                Setelah menekan tombol verifikasi, maka anda akan mendapatkan
                                pesan verifikasi di email yang telah anda isikan tadi. Jika
                                pesan tersebut telah diterima, maka anda tinggal menekan link
                                yang telah disediakan. Dan, Selamat! Akun anda telah terverifikasi!
                            </p>
                        </div>
                    </div>

                </div>

                <div class="col-lg-12 tw-flex tw-flex-col tw-gap-5">
                    <h1 class="hc-title-2xl">
                        Hak Akses Kami
                    </h1>

                    <p class="tw-text-justify hc-text-xl">
                        Hak akses adalah izin atau hak istimewa yang diberikan kepada pengguna untuk membuat, mengubah, 
                        menghapus atau melihat data dalam sebuah aplikasi sebagaimana ditetapkan oleh aturan yang dibuat 
                        oleh pemilik data dan sesuai kebijakan keamanan informasi. Dalam SIMS terdapat 4 hak akses, yaitu 
                        Tata Usaha, Kesiswaan, Wali Kelas dan Kurikulum.
                    </p>

                    <div class="tw-grid tw-grid-rows-2 tw-grid-cols-2 tw-gap-10">

                        <div class="tw-py-6 tw-px-8 tw-rounded-lg hover:tw-shadow-lg tw-border tw-border-gray-200">
                            <h4 class="tw-text-sims-new-500 tw-font-satoshi tw-font-semibold">Tata Usaha</h4>
                            <ul class="tw-list-disc hc-text-lg">
                                <li>Export, import, melihat, menginput, dan memperbarui semua data induk siswa</li>
                                <li>Export, melihat, dan memperbarui data mutasi</li>
                                <li>Export dan melihat data jumlah siswa</li>
                                <li>Melihat, memperbarui, dan export rekap nilai siswa</li>
                                <li>Export dan melihat data siswa tidak naik kelas</li>
                            </ul>
                        </div>
                        <div class="tw-py-6 tw-px-8 tw-rounded-lg hover:tw-shadow-lg tw-border tw-border-gray-200">
                            <h4 class="tw-text-salmon-400 tw-font-satoshi tw-font-semibold">Kesiswaan</h4>
                            <ul class="tw-list-disc hc-text-lg">
                                <li>Melihat semua data induk siswa</li>
                                <li>Export, melihat, memperbarui, dan menginput data mutasi</li>
                                <li>Export dan melihat data jumlah siswa</li>
                                <li>Export dan melihat data jumlah siswa</li>
                                <li>Export dan melihat data siswa tidak naik kelas</li>
                            </ul>
                        </div>
                        <div class="tw-py-6 tw-px-8 tw-rounded-lg hover:tw-shadow-lg tw-border tw-border-gray-200">
                            <h4 class="tw-text-oren-400 tw-font-satoshi tw-font-semibold">Kurikulum</h4>
                            <ul class="tw-text-xl tw-list-disc hc-text-lg tw-pt-5">
                                <li>Melihat semua data induk siswa</li>
                                <li>Melihat dan export rekap nilai siswa</li>
                                <li>Melihat dan export data siswa tidak naik kelas</li>
                            </ul>
                        </div>
                        <div class="tw-py-6 tw-px-8 tw-rounded-lg hover:tw-shadow-lg tw-border tw-border-gray-200">
                            <h4 class="tw-text-[#B4B8BC] tw-font-satoshi tw-font-semibold">Wali Kelas</h4>
                            <ul class="tw-text-xl tw-list-disc hc-text-lg tw-pt-5">
                                <li>Melihat semua data induk siswa</li>
                                <li>Melihat dan export rekap nilai siswa</li>
                                <li>Import, memperbarui, menginput, dan menghapus rekap nilai siswa</li>
                            </ul>
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
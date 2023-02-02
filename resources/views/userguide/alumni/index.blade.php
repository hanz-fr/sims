@extends('layouts.main-new')

@section('content')
    <div class="tw-container tw-mx-auto">

        <!-- spacing !-->
        <div class="tw-mt-8"></div> 
        <!-------------->

        <div role="status" class="tw-flex tw-justify-center">
            <div class="lg:tw-w-[35%]">
                <img src="{{ URL::asset('assets/img/hc-header-alumni.svg') }}" class="" alt="hc-header-img">
            </div>
        </div>
  

        <!-- spacing !-->
        <div class="tw-mt-12"></div> 
        <!-------------->


        <div class="tw-mx-60 tw-mt-16">

            <div class="tw-text-center hc-title-3xl tw-mb-20">Data Alumni</div>

            <div class="tw-text-center hc-text-lg tw-mb-20">Alumni adalah lulusan dari suatu sekolah. Lulusan-lulusan ini
                memiliki ijazah.</div>

            <div class="tw-text-center hc-title-3xl tw-mb-20">Halaman Alumni</div>

            <div class="tw-text-center hc-text-lg tw-mb-20">
                Tombol untuk masuk ke halaman pilihan jurusan alumni terdapat di
                dashboard. Pada halaman tersebut pengguna dapat memilih untuk melihat daftar alumni dari salah satu jurusan.
                Pengguna dapat memilih untuk melihat alumni sekolah dari 5 tahun ke belakang
            </div>

            <div class="tw-text-center hc-title-3xl tw-mb-20">Menambahkan Siswa ke Halaman Alumni</div>

            <div class="tw-flex tw-flex-col">
                <div class="tw-grid tw-grid-cols-2 tw-mt-24">
                    <h3 class="tw-text-left hc-title-xl"><span class="tw-text-bluewood-800">Langkah 1:</span> Masuk ke Halaman
                        Data Induk</h3>
                    <p class="tw-text-justify tw-mt-5 hc-text-lg">
                        Pengguna akan dihadapkan pada pilihan jurusan
                    </p>
                </div>

                <div class="tw-grid tw-grid-cols-2 tw-mt-24">
                    <h3 class="tw-text-left hc-title-xl"><span class="tw-text-bluewood-800">Langkah 2:</span> Pilih salah satu jurusan
                        Data Induk dan angkatannya</h3>
                    <p class="tw-text-justify tw-mt-5 hc-text-lg">
                        -
                    </p>
                </div>

                <div class="tw-grid tw-grid-cols-2 tw-mt-24">
                    <h3 class="tw-text-left hc-title-xl"><span class="tw-text-bluewood-800">Langkah 3:</span> Cari siswa yang akan dijadikan alumni</h3>
                    <p class="tw-text-justify tw-mt-5 hc-text-lg">
                        Untuk mempermudah pencarian, silahkan menggunakan search bar
                    </p>
                </div>

                <div class="tw-grid tw-grid-cols-2 tw-mt-24">
                    <h3 class="tw-text-left hc-title-xl"><span class="tw-text-bluewood-800">Langkah 4:</span> Pilih tombol edit pada siswa yang akan dijadikan alumni</h3>
                    <p class="tw-text-justify tw-mt-5 hc-text-lg">
                    </p>
                </div>

                <div class="tw-grid tw-grid-cols-2 tw-mt-24">
                    <h3 class="tw-text-left hc-title-xl"><span class="tw-text-bluewood-800">Langkah 5:</span> Cari siswa yang akan dijadikan alumni</h3>
                    <p class="tw-text-justify tw-mt-5 hc-text-lg">
                    </p>
                </div>

                <div class="tw-grid tw-grid-cols-2 tw-mt-24">
                    <h3 class="tw-text-left hc-title-xl"><span class="tw-text-bluewood-800">Langkah 6:</span> Di bagian Lainnya, di bagian H., ubah status kelulusan menjadi "Sudah"</h3>
                    <p class="tw-text-justify tw-mt-5 hc-text-lg">
                        Bila ada, isi juga nomor dan tanggal ijazah
                    </p>
                </div>

                <div class="tw-grid tw-grid-cols-2 tw-my-24">
                    <h3 class="tw-text-left hc-title-xl"><span class="tw-text-bluewood-800">Langkah 7:</span> Simpan perubahan</h3>
                    <p class="tw-text-justify tw-mt-5 hc-text-lg">
                        Untuk memastikan bahwa siswa telah menjadi alumni, masuk ke laman alumni dan cari siswa tersebut
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

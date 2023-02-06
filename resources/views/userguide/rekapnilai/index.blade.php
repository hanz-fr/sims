@extends('layouts.main-new')

@section('content')
<div class="tw-container tw-mx-auto">

    <!-- spacing !-->
    <div class="tw-mt-14"></div> 
    <!-------------->

    <div role="status" class="tw-flex tw-justify-center">
        <div class="lg:tw-w-1/2">
            <img src="{{ URL::asset('assets/img/hc-header-rekapnilai.svg') }}" class="" alt="hc-header-img">
        </div>
    </div>
    

    <!-- spacing !-->
    <div class="tw-mt-12"></div> 
    <!-------------->

    <div class="tw-mx-60">

        <div class="tw-text-center hc-title-3xl tw-mb-24">Rekap Nilai</div>


        {{-- About --}}
        <div class="row tw-justify-center tw-items-center">

            <div class="col-lg-6 pr-5">
            <h3 class="hc-title-2xl tw-mb-5"><span class="tw-text-bluewood-800">Tentang</span> Rekap Nilai</h3>
                <p class="tw-text-justify tw-mt-5 hc-text-lg tw-pr-5">
                    Halaman ini berisi semua rekapitulasi nilai siswa dari semester 1 
                    sampai 5, rekap nilai sendiri juga merupakan bagian dari buku induk 
                    siswa. 
                </p>
            </div>

            <div class="col-lg-6 tw-pl-10">
                <div class="tw-rounded-lg tw-overflow-hidden tw-drop-shadow-lg">
                    <img src="{{ URL::asset('assets/img/hc-rekapnilai-about.svg') }}" alt="">
                </div>
            </div>

        </div>


        {{-- How to access the page --}}
        <div class="tw-flex tw-flex-col tw-mt-28">

            <h3 class="hc-title-2xl tw-mb-24">
                Bagaimana cara akses rekap nilai siswa?
            </h3>
            

            <div class="tw-flex tw-flex-col tw-gap-24 tw-max-w-full tw-pb-10">

                <div class="tw-grid tw-grid-cols-2">
                    <div class="tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-rekapnilai-akses-1.svg') }}" alt="">
                    </div>
                    <div class="tw-flex tw-flex-col tw-gap-y-5 tw-justify-center">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Melalui Sidebar</h4>
                        <p class="hc-text-lg">
                            Ketika anda di halaman mana pun, pastinya akan ada sebuah bar navigasi di sisi halaman.
                            Untuk mengakses halaman rekap nilai anda cukup menekan tombol dengan ikon buku yang 
                            akan mengarahkan anda ke halaman pilih jurusan.
                        </p>
                    </div>
                </div>

                <div class="tw-grid tw-grid-cols-2">
                    <div class="tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-rekapnilai-akses-2.svg') }}" alt="">
                    </div>
                    <div class="tw-flex tw-flex-col tw-gap-y-5 tw-justify-center">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Melalui Dashboard</h4>
                        <p class="hc-text-lg">
                            Setelah login, pastinya anda akan diarahkan ke halaman dashboard. Disitu 
                            anda dapat mengakses halaman rekap nilai dengan menekan tombol ikon buku 
                            yang ada dibawah 'Aktivitas terakhir anda'. Setelah itu anda akan diarahkan 
                            ke halaman data induk siswa seluruh kelas.
                        </p>
                    </div>
                </div>

                <div class="tw-grid tw-grid-cols-2">
                    <div class="tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-rekapnilai-akses-3.svg') }}" alt="">
                    </div>
                    <div class="tw-flex tw-flex-col tw-gap-y-5 tw-justify-center">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Melalui Quick Access di Rekap Siswa</h4>
                        <p class="hc-text-lg">
                            Jika anda sedang berada di halaman rekap siswa, anda juga dapat mengakses 
                            halaman rekap nilai dengan menekan tombol dengan ikon buku di kolom 'Quick Access'.
                            Setelah itu anda akan diarahkan ke halaman data induk siswa seluruh kelas.
                        </p>
                    </div>
                </div>

            </div>

        </div>


        {{-- Access Priveleges --}}
        <div class="tw-flex tw-flex-col tw-mt-28">

            <h3 class="hc-title-2xl">
                Hak Akses
            </h3>

            <p class="tw-text-justify hc-text-xl tw-mb-8">
                Terdapat 3 role yang dapat mengakses rekap nilai, yaitu 
                Tata Usaha, Kurikulum, dan Wali Kelas.
            </p>

            <div class="tw-grid tw-grid-cols-3 tw-gap-10">

                <div class="tw-py-6 tw-px-8 tw-rounded-lg hover:tw-shadow-lg tw-border tw-border-gray-200">
                    <h4 class="tw-text-center tw-pb-2 tw-text-[#B4B8BC] tw-font-satoshi tw-font-semibold">Wali Kelas</h4>
                    <ul class="tw-text-xl tw-list-disc hc-text-lg">
                        <li>Melihat data rekap nilai siswa</li>
                        <li>Menambahkan data rekap nilai siswa</li>
                        <li>Melakukan perubahan pada data induk siswa</li>
                        <li>Mengekspor data rekap nilai</li>
                    </ul>
                </div>

                <div class="tw-py-6 tw-px-8 tw-rounded-lg hover:tw-shadow-lg tw-border tw-border-gray-200">
                    <h4 class="tw-text-center tw-pb-2 tw-text-sims-new-500 tw-font-satoshi tw-font-semibold">Tata Usaha</h4>
                    <ul class="tw-list-disc hc-text-lg">
                        <li>Melihat data rekap nilai siswa</li>
                        <li>Melakukan perubahan pada data induk siswa</li>
                        <li>Mengekspor data rekap nilai</li>
                    </ul>
                </div>

                <div class="tw-py-6 tw-px-8 tw-rounded-lg hover:tw-shadow-lg tw-border tw-border-gray-200">
                    <h4 class="tw-text-center tw-pb-2 tw-text-oren-400 tw-font-satoshi tw-font-semibold">Kurikulum</h4>
                    <ul class="tw-list-disc hc-text-lg">
                        <li>Melihat data rekap nilai siswa</li>
                        <li>Mengekspor data rekap nilai</li>
                    </ul>
                </div>

            </div>
        </div>


        {{-- Feature --}}
        <div class="tw-flex tw-flex-col tw-mt-28">

            <h3 class="hc-title-2xl">
                Fitur Utama
            </h3>


            <div class="tw-flex tw-gap-4 tw-items-center tw-mt-20">
                <i class="fa-solid fa-circle-1 tw-text-sims-new-500 tw-text-4xl"></i>
                <h4 class="tw-mb-0 hc-title-xl">
                    Tambah Data Rekap Nilai
                </h4>
            </div>

            <div class="tw-flex tw-gap-x-40 tw-pl-8 tw-pr-2 hc-step tw-mx-12">

                <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center">
                    <div class="tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-rekapnilai-create-1.svg') }}" alt="">
                    </div>
                    <div class="tw-flex tw-flex-col tw-gap-y-5 tw-justify-center">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Akses Halaman Tambah Rekap Nilai</h4>
                        <p class="hc-text-lg">
                            Untuk mengakses halaman tambah rekap nilai, cukup menekan tombol tambah 
                            rekap nilai seperti di samping yang terletak di kanan atas halaman rekap nilai. 
                            Tapi perlu diingat, yang dapat mengaksesnya hanya wali kelas saja.
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center">
                    <div class="col-lg-8 tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-rekapnilai-create-2.svg') }}" alt="">
                    </div>
                    <div class="col-lg-3 tw-flex tw-flex-col tw-gap-y-5">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Isi detail raport</h4>
                        <p class="hc-text-lg">
                            Setelah anda ke halaman tambah nilai, anda akan melihat sebuah form input seperti 
                            pada gambar. Disitu anda dapat menambahkan detail dari raport per-semesternya. Selain 
                            itu anda juga dapat menambahkan keterangan naik/tidak naik kelas, yang nantinya data 
                            siswa yang tidak naik ini akan tercatat pada data tidak naik kelas.
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                    <div class="col-lg-8 tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-rekapnilai-create-3.svg') }}" alt="">
                    </div>
                    <div class="col-lg-3 tw-flex tw-flex-col tw-gap-y-5">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Isi nilai-nilai mata pelajaran</h4>
                        <p class="hc-text-lg">
                            Setelah mengisi detail dari raport, anda tinggal mengisi nilai dari 
                            tiap mata pelajaran sesuai kelas siswa tersebut pada kolom input. 
                            Perlu diingat, anda akan mengisi nilai persatu semester sesuai 
                            dengan apa yang anda isi di inputan semester detail raport.
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                    <div class="tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-rekapnilai-create-4.svg') }}" alt="">
                    </div>
                    <div class="tw-flex tw-flex-col tw-gap-y-5">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Tekan tombol upload data</h4>
                        <p class="hc-text-lg">
                            Setelah mengisi detail raport dan nilai-nilainya, simpan data dengan 
                            menekan tombol 'Upload Data'. Jika anda berubah pikiran ataupun melakukan 
                            kesalahan, tenang! data dapat diperbarui kapan saja. Untuk detail lebih 
                            lanjut akan dijelaskan di fitur edit data.
                        </p>
                    </div>
                </div>

            </div>


            <div class="tw-flex tw-gap-4 tw-items-center tw-mt-16">
                <i class="fa-solid fa-circle-2 tw-text-sims-new-500 tw-text-4xl"></i>
                <h4 class="tw-mb-0 hc-title-xl">
                    Edit Data Rekap Nilai
                </h4>
            </div>

            <div class="tw-flex tw-gap-x-40 tw-pl-8 tw-pr-2 hc-step tw-mx-12">

                <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                    <div class="col-lg-8 tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-rekapnilai-edit-1.svg') }}" alt="">
                    </div>
                    <div class="col-lg-3 tw-gap-y-5 tw-justify-center">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Akses Halaman Edit Rekap Nilai</h4>
                        <p class="hc-text-lg">
                            Untuk mengakses halaman edit rekap nilai, cukup tekan tombol edit yang 
                            berada di bawah tabel rekap nilai. Yang dapat mengakses halaman edit rekap 
                            nilai adalah wali kelas dan tata usaha.
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                    <div class="col-lg-8 tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-rekapnilai-edit-2.svg') }}" alt="">
                    </div>
                    <div class="col-lg-3 tw-flex tw-flex-col tw-gap-y-5">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Edit detail raport</h4>
                        <p class="hc-text-lg">
                            Setelah anda ke halaman edit nilai, anda akan melihat sebuah form input yang  
                            sudah terisi perubahan sebelumnya. Disitu anda dapat memperbarui detail dari 
                            raport per-semesternya.
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                    <div class="col-lg-8 tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-rekapnilai-edit-3.svg') }}" alt="">
                    </div>
                    <div class="col-lg-3 tw-flex tw-flex-col tw-gap-y-5">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Edit nilai-nilai mata pelajaran</h4>
                        <p class="hc-text-lg">
                            Jika anda sudah selesai mengedit detail dari raport, anda tinggal mengedit nilai 
                            dari tiap mata pelajaran sesuai kelas siswa tersebut pada kolom input jika butuh. 
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                    <div class="tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-rekapnilai-edit-4.svg') }}" alt="">
                    </div>
                    <div class="tw-flex tw-flex-col tw-gap-y-5">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Tekan tombol update data</h4>
                        <p class="hc-text-lg">
                            Setelah mengedit detail raport dan nilai-nilainya, simpan data dengan 
                            menekan tombol 'Update Data' dan data akan diperbarui.
                        </p>
                    </div>
                </div>

            </div>


            <div class="tw-flex tw-gap-4 tw-items-center tw-mt-16">
                <i class="fa-solid fa-circle-3 tw-text-sims-new-500 tw-text-4xl"></i>
                <h4 class="tw-mb-0 hc-title-xl">
                    Ekspor Data Rekap Nilai
                </h4>
            </div>

            <div class="tw-flex tw-mx-12 tw-mt-10 tw-justify-center tw-items-center tw-gap-20">

                <div class="flex tw-flex-col tw-gap-y-10 tw-justify-center tw-items-center">
                    <div class="tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-rekapnilai-export-1.svg') }}" alt="">
                    </div>
                    <div class="tw-text-center">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Tekan tombol 'Export'</h4>
                        <p class="hc-text-lg">
                            Untuk mengekspor data anda cukup menekan tombol 'Export' di kanan 
                            atas. Yang dapat mengekspor data adalah tata usaha, kurikulum, dan 
                            wali kelas
                        </p>
                    </div>
                </div>

                <i class="fa-solid fa-chevron-right tw-text-4xl tw-text-sims-500"></i>

                <div class="flex tw-flex-col tw-gap-y-10 tw-justify-center tw-items-center">
                    <div class="tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-rekapnilai-export-2.svg') }}" alt="">
                    </div>
                    <div class="tw-text-center">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Pilih jenis file yang ingin diekspor</h4>
                        <p class="hc-text-lg">
                            Setelah anda menekan tombol 'Export', maka akan muncul pop-up. Anda cukup 
                            pilih ingin mengekspor ke jenis file apa dan otomatis data akan terunduh ke 
                            dalam komputer anda
                        </p>
                    </div>
                </div>

            </div>

        </div>

        <!-- spacing !-->
        <div class="tw-my-24"></div> 
        <!-------------->
    </div>
</div>
@endsection
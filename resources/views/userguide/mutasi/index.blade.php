@extends('layouts.main-new')

@section('content')
<div class="tw-container tw-mx-auto">

    <!-- spacing !-->
    <div class="tw-mt-8"></div> 
    <!-------------->

    <div role="status" class="tw-flex tw-justify-center">
        <div class="lg:tw-w-[40%]">
            <img src="{{ URL::asset('assets/img/hc-header-mutasi.svg') }}" class="" alt="hc-header-img">
        </div>
    </div>
    

    <!-- spacing !-->
    <div class="tw-mt-3"></div> 
    <!-------------->

    <div class="tw-mx-60">

        <div class="tw-text-center hc-title-3xl tw-mb-24">Data Mutasi</div>

        
        {{-- About --}}
        <div class="row tw-justify-center tw-items-center">

            <div class="col-lg-6 pr-5">
            <h3 class="hc-title-2xl tw-mb-5"><span class="tw-text-bluewood-800">Tentang</span> Data Mutasi</h3>
                <p class="tw-text-justify tw-mt-5 hc-text-lg tw-pr-5">
                    Data Mutasi berisi data siswa baru, pindahan dari sekolah lain atau 
                    data siswa yang keluar ke ke sekolah lain. Pada halaman ini Tata Usaha 
                    dan Kesiswaaan dapat memantau dan mengelola data mutasi secara real-time.
                </p>
            </div>

            <div class="col-lg-6 tw-pl-10">
                <div class="hc-img">
                    <img src="{{ URL::asset('assets/img/hc-mutasi-about.svg') }}" alt="">
                </div>
            </div>

        </div>


        {{-- How to access the page --}}
        <div class="tw-flex tw-flex-col tw-mt-28">

            <h3 class="hc-title-2xl tw-mb-24">
                Bagaimana cara akses halaman data mutasi?
            </h3>
            

            <div class="tw-flex tw-flex-col tw-gap-24 tw-max-w-full tw-pb-10">

                <div class="tw-flex tw-justify-between tw-items-center">
                    <div class="col-lg-7 tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-mutasi-access-3.svg') }}" alt="">
                    </div>
                    <div class="col-lg-4 tw-flex tw-flex-col tw-gap-y-5 tw-justify-center">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Melalui Quick Access di Rekap Siswa</h4>
                        <p class="hc-text-lg">
                            Jika anda sedang berada di halaman rekap siswa, anda juga dapat mengakses 
                            halaman rekap nilai dengan menekan tombol data mutasi keluar atau masuk 
                            di kolom 'Quick Access'. Setelah itu anda akan diarahkan ke halaman data 
                            mutasi masuk ataupun keluar.
                        </p>
                    </div>
                </div>

                <div class="tw-flex tw-justify-between tw-items-center">
                    <div class="col-lg-7 tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-mutasi-access-1.svg') }}" alt="">
                    </div>
                    <div class="col-lg-4 tw-flex tw-flex-col tw-gap-y-5 tw-justify-center">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Melalui Dashboard</h4>
                        <p class="hc-text-lg">
                            Setelah login, pastinya anda akan diarahkan ke halaman dashboard. Disitu 
                            anda dapat mengakses halaman data mutasi dengan menekan tombol 'Data Perpindahan' 
                            yang ada dibawah 'Aktivitas terakhir anda'. Setelah itu anda akan diarahkan 
                            ke halaman data induk siswa seluruh kelas.
                        </p>
                    </div>
                </div>

                <div class="tw-flex tw-justify-between tw-items-center">
                    <div class="col-lg-7 tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-mutasi-access-2.svg') }}" alt="">
                    </div>
                    <div class="col-lg-4 tw-flex tw-flex-col tw-gap-y-5 tw-justify-center">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Melalui Card Info</h4>
                        <p class="hc-text-lg">
                            Ketika anda di halaman dashboard, ada carousel yang berisi info-info 
                            mengenai jumlah data pada SIMS. Itu bukan hanya sekedar card biasa lho! 
                            Anda bisa menekannya untuk pergi ke halaman dimana data tersebut disimpan. 
                            Begitu juga dengan data mutasi masuk dan keluar.
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
                Terdapat 2 role yang dapat mengakses rekap nilai, yaitu 
                Tata Usaha dan Kesiswaan.
            </p>

            <div class="tw-grid tw-grid-cols-2 tw-gap-10">

                <div class="tw-py-6 tw-px-8 tw-rounded-lg hover:tw-shadow-lg tw-border tw-border-gray-200">
                    <h4 class="tw-text-center tw-pb-2 tw-text-salmon-400 tw-font-satoshi tw-font-semibold">Kesiswaan</h4>
                    <ul class="tw-list-disc hc-text-lg">
                        <li>Melihat data mutasi</li>
                        <li>Menambahkan data mutasi</li>
                        <li>Melakukan perubahan pada data mutasi</li>
                        <li>Mengekspor data mutasi</li>
                    </ul>
                </div>

                <div class="tw-py-6 tw-px-8 tw-rounded-lg hover:tw-shadow-lg tw-border tw-border-gray-200">
                    <h4 class="tw-text-center tw-pb-2 tw-text-sims-new-500 tw-font-satoshi tw-font-semibold">Tata Usaha</h4>
                    <ul class="tw-list-disc hc-text-lg">
                        <li>Melihat data mutasi</li>
                        <li>Melakukan perubahan pada data mutasi</li>
                        <li>Mengekspor data mutasi</li>
                    </ul>
                </div>

            </div>
        </div>


        {{-- Features --}}
        <div class="tw-flex tw-flex-col tw-mt-28">

            <h3 class="hc-title-2xl">
                Fitur Utama
            </h3>


            <div class="tw-flex tw-gap-4 tw-items-center tw-mt-10">
                <i class="fa-solid fa-circle-1 tw-text-sims-new-500 tw-text-4xl"></i>
                <h4 class="tw-mb-0 hc-title-xl">
                    Pencarian dengan filter dan limitasi data
                </h4>
            </div>

            <div class="tw-px-14 hc-img tw-mt-10">
                <img src="{{ URL::asset('assets/img/hc-mutasi-search-1.svg') }}" alt="">
            </div>

            <p class="tw-text-center tw-mx-12 hc-text-lg tw-mt-7">
                Tentu tidak mudah ketika kita harus mencari satu data diantara puluhan 
                bahkan ratusan data lainnya. Mungkin kita dapat menemukannya, tapi bisa jadi 
                bukan itu hasil yang kita inginkan karena diantara ratusan mungkin saja terjadi 
                duplikasi seperti nama yang sama atau lainnya yang tidak unik. Karena itu, SIMS 
                menyediakan solusi untuk masalah anda. Yaitu mempersempit pencarian dengan filter
            </p>

            <h5 class="tw-mb-0 tw-ml-12 tw-mt-10 tw-text-bluewood-800 hc-title-xl">
                Langkah-langkah:
            </h5>            

            <div class="tw-mx-12 tw-gap-x-40 tw-pl-8 tw-pr-2 hc-step">

                <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center">
                    <div class="tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-mutasi-search-2.svg') }}" alt="">
                    </div>
                    <div class="tw-flex tw-flex-col tw-gap-y-5 tw-justify-center">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Tekan Tombol Filter</h4>
                        <p class="hc-text-lg">
                            Untuk menggunakan filter di pencarian anda, cukup tekan tombol 'Filter' 
                            yang berada di atas tabel.
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 flex tw-justify-center tw-items-center">
                    <div class="col-lg-8 tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-mutasi-search-3.svg') }}" alt="">
                    </div>
                    <div class="col-lg-4 tw-flex tw-flex-col tw-gap-y-5">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Pilih kategori pencarian</h4>
                        <p class="hc-text-lg">
                            Setelah anda menekan tombol filter, akan muncul pop-up yang akan 
                            menampilkan kategori yang dapat anda gunakan untuk memperketat 
                            hasil pencarian, anda dapat memilih kategori lebih dari dua. 
                            Selain itu, anda dapat mengurutkan data berdasarkan kategori, 
                            dan juga urutan tampil data. Perlu diingat, simpan filter anda 
                            sebelum mulai mencari!
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                    <div class="col-lg-7 tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-mutasi-search-4.svg') }}" alt="">
                    </div>
                    <div class="col-lg-5 tw-flex tw-flex-col tw-gap-y-5">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Mulai Pencarian anda!</h4>
                        <p class="hc-text-lg">
                            Setelah menerapkan filter pada pencarian anda, anda dapat 
                            mulai mencari data yang diinginkan. Catatan, karena tadi 
                            anda sudah memperketat kategori pencarian. Jadi, jika 
                            anda mencari data dengan kata kunci yang tidak sesuai 
                            dengan kategori yang anda pilih di filter maka hasil 
                            pencarian anda mungkin saja tidak muncul. 
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                    <div class="tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-mutasi-search-5.svg') }}" alt="">
                    </div>
                    <div class="tw-flex tw-flex-col tw-gap-y-5">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Tampilkan lebih banyak data dengan limit</h4>
                        <p class="hc-text-lg">
                            Jika anda butuh melihat lebih banyak data dalam satu 
                            halaman ketika melakukan pekerjaan, anda dapat mengaturnya 
                            di SIMS. Dengan mengatur limit, anda dapat melihat 10, 25, 
                            50, bahkan 100 data dalam satu halaman! Caranya mudah, di atas 
                            tabel ada dropdown yang bisa anda pilih dan secara otomatis data 
                            anda akan terlimit.
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                    <div class="col-lg-8 tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-mutasi-search-6.svg') }}" alt="">
                    </div>
                    <div class="col-lg-4 tw-gap-y-5">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Munculkan data sesuai periode dengan data periodik</h4>
                        <p class="hc-text-lg">
                            Ingin menampilkan dengan range tanggal tertentu? Bisa! 
                            Cukup menekan tombol data periodik yang terletak di atas 
                            tabel. Atur tanggal lalu simpan, maka secara otomatis data 
                            dengan tanggal sesuai yang anda atur saja. Catatan, pada data 
                            mutasi, data periodik ini diambil berdasarkan tanggal keluar/masuk 
                            siswa mutasi. 
                        </p>
                    </div>
                </div>

            </div>


            <div class="tw-flex tw-gap-4 tw-items-center tw-mt-20">
                <i class="fa-solid fa-circle-2 tw-text-sims-new-500 tw-text-4xl"></i>
                <h4 class="tw-mb-0 hc-title-xl">
                    Tambah Data Mutasi
                </h4>
            </div>

            <div class="tw-mx-12 tw-gap-x-40 tw-pl-8 tw-pr-2 tw-mt-10 tw-mb-28 hc-step">

                <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center">
                    <div class="tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-mutasi-create-1.svg') }}" alt="">
                    </div>
                    <div class="tw-flex tw-flex-col tw-gap-y-5 tw-justify-center">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Akses Halaman Tambah Mutasi</h4>
                        <p class="hc-text-lg">
                            Untuk mengakses halaman tambah mutasi, cukup menekan tombol 'Tambah Data'
                            seperti di gambar yang terletak di kanan atas halaman rekap nilai. 
                            Tapi perlu diingat, untuk mutasi yang dapat mengaksesnya hanya kesiswaan 
                            saja.
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center">
                    <div class="col-lg-8 tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-mutasi-create-2.svg') }}" alt="">
                    </div>
                    <div class="col-lg-3 tw-flex tw-flex-col tw-gap-y-5">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Isi detail data pada form input mutasi</h4>
                        <p class="hc-text-lg">
                            Setelah anda ke halaman tambah nilai, anda akan melihat sebuah form input seperti 
                            pada gambar. Disitu anda dapat menambahkan data siswa mutasi. Jangan lupa untuk 
                            mengisi NIS yang sudah terdaftar di data induk siswa, bila salah data tidak dapat 
                            ditambahkan.
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                    <div class="col-lg-8 tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-mutasi-create-3.svg') }}" alt="">
                    </div>
                    <div class="col-lg-3 tw-flex tw-flex-col tw-gap-y-5">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Kirim untuk menambahkan data</h4>
                        <p class="hc-text-lg">
                            Setelah mengisi data siswa mutasi, anda tinggal menekan tombol 
                            'Kirim' dan data pun akan tersimpan!
                        </p>
                    </div>
                </div>

            </div>


            <div class="tw-flex tw-gap-4 tw-items-center tw-mt-16">
                <i class="fa-solid fa-circle-3 tw-text-sims-new-500 tw-text-4xl"></i>
                <h4 class="tw-mb-0 hc-title-xl">
                    Edit Data Mutasi
                </h4>
            </div>

            <div class="tw-mx-12 tw-gap-x-40 tw-pl-8 tw-pr-2 hc-step">

                <div class="col-lg-12 flex tw-justify-center tw-items-center">
                    <div class="col-lg-6 tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-mutasi-edit-1.svg') }}" alt="">
                    </div>
                    <div class="col-lg-6 tw-gap-y-5 tw-justify-center">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Akses Halaman Edit Mutasi</h4>
                        <p class="hc-text-lg">
                            Untuk mengakses halaman edit mutasi, cukup tekan tombol edit yang 
                            berada di baris aksi tabel mutasi. Yang dapat mengakses halaman edit 
                            mutasi adalah kesiswaan.
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                    <div class="col-lg-8 tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-mutasi-edit-3.svg') }}" alt="">
                    </div>
                    <div class="col-lg-3 tw-flex tw-flex-col tw-gap-y-5">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Edit data siswa mutasi</h4>
                        <p class="hc-text-lg">
                            Setelah anda ke halaman edit mutasi, anda akan melihat sebuah form input yang  
                            sudah terisi perubahan sebelumnya. Di situ anda dapat memperbarui data dari 
                            siswa mutasi.
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                    <div class="col-lg-8 tw-w-full tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-mutasi-edit-2.svg') }}" alt="">
                    </div>
                    <div class="col-lg-3 tw-flex tw-flex-col tw-gap-y-5">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Simpan perubahan!</h4>
                        <p class="hc-text-lg">
                            Jika anda sudah selesai mengedit data dari siswa mutasi, anda tinggal menyimpan 
                            perubahan dengan menekan tombol 'Update'.
                        </p>
                    </div>
                </div>

            </div>


            <div class="tw-flex tw-gap-4 tw-items-center tw-mt-16">
                <i class="fa-solid fa-circle-4 tw-text-sims-new-500 tw-text-4xl"></i>
                <h4 class="tw-mb-0 hc-title-xl">
                    Ekspor Data Mutasi
                </h4>
            </div>

            <div class="tw-flex tw-mt-10 tw-justify-center tw-items-center tw-gap-20">

                <div class="flex tw-flex-col tw-gap-y-10 tw-justify-center tw-items-center">
                    <div class="tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-mutasi-export-1.svg') }}" alt="">
                    </div>
                    <div class="tw-text-center">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Pilih jenis file yang ingin diekspor</h4>
                        <p class="hc-text-lg">
                            Untuk mengekspor data anda cukup memilih di antara 3 tombol di kanan 
                            atas. Ketiga tombol meggambarkan jenis file yang berbeda, contoh ada 
                            tombol berlambang adobe acrobat untuk jenis file pdf. Jika anda masih 
                            kebingungan, anda dapat menyorot tombol tersebut untuk menampilkan keterangan 
                            jenis file.
                        </p>
                    </div>
                </div>

                <i class="fa-solid fa-chevron-right tw-text-4xl tw-text-sims-500"></i>

                <div class="flex tw-flex-col tw-gap-y-10 tw-justify-center tw-items-center">
                    <div class="tw-flex tw-drop-shadow-lg tw-justify-center tw-rounded-lg">
                        <img src="{{ URL::asset('assets/img/hc-mutasi-export-2.svg') }}" alt="">
                    </div>
                    <div class="tw-text-center">
                        <h4 class="tw-text-bluewood-800 hc-title-xl">Pilih periode data yang akan diekspor</h4>
                        <p class="hc-text-lg">
                            Jika anda sudah menekan tombol, file tidak langsung terunduh. Namun, akan muncul 
                            pop-up untuk memilih periode data yang akan anda ekspor. Fungsi ini serupa dengan 
                            data periodik dimana pemilihan periode berasal dari tanggal masuk/keluar siswa 
                            mutasi. Setelah anda memilih dan menekan tombol 'Ekspor', maka data sesuai 
                            dengan periode yang anda pilih akan terunduh.
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
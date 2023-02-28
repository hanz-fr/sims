@extends('layouts.main-new')

@section('content')
    <div class="tw-container tw-mx-auto">

        <!-- spacing !-->
        <div class="tw-mt-10"></div>
        <!-------------->

        <div role="status" class="tw-flex tw-justify-center">
            <div class="lg:tw-w-1/2">
                <img src="{{ URL::asset('assets/img/hc-header-induk.svg') }}" alt="hc-header-img">
            </div>
        </div>


        <!-- spacing !-->
        <div class="tw-mt-12"></div>
        <!-------------->

        <div class="md:tw-mx-60 tw-mx-16">

            <div class="tw-text-center hc-title-3xl tw-mb-24">Data Induk Siswa</div>


            {{-- About --}}
            <div class="tw-flex md:tw-flex-row tw-flex-col-reverse tw-justify-center tw-items-center">

                <div class="col-md-6 col-sm-12 md:pr-5">
                    <h3 class="hc-title-2xl tw-mb-5"><span class="tw-text-bluewood-800">Tentang</span> Data Induk Siswa</h3>
                    <p class="tw-text-justify tw-mt-5 hc-text-lg tw-pr-5">
                        Hal yang paling esensial dari sistem ini yaitu data induk siswa. Data induk
                        siswa merupakan bentuk digitalisasi dari buku induk, yang dimana seluruh proses
                        penginputan data nya masih manual. Tujuan diadakannya data induk siswa ini diharapkan
                        dapat meningkatkan efisien, efektifitas serta mempercepat kinerja TU dan menghemat
                        banyak waktu dalam penginputan data. Fungsi utama dari data induk siswa yaitu menyimpan
                        semua informasi atau data siswa ke dalam sistem, sehingga informasi tersebut dapat dilihat,
                        diolah atau disimpan kapan saja.
                    </p>
                </div>

                <div class="col-md-6 col-sm-12 md:tw-pl-10 tw-pb-7 hc-img">
                    <img src="{{ URL::asset('assets/img/hc-induk-about.svg') }}" alt="Halaman Data Induk Siswa">
                </div>

            </div>


            {{-- How to access the page --}}
            <div class="tw-flex tw-flex-col tw-mt-28">

                <h3 class="hc-title-2xl tw-mb-16">
                    Bagaimana cara akses halaman <span class="tw-text-bluewood-800">data induk</span>?
                </h3>


                <div class="tw-flex tw-flex-col md:tw-gap-24 tw-gap-12">

                    <div class="tw-grid md:tw-grid-cols-2 sm:tw-grid-rows-1">
                        <div class="hc-img">
                            <img src="{{ URL::asset('assets/img/hc-rekapnilai-akses-1.svg') }}"
                                alt="Sidebar Akses Data Induk Siswa">
                        </div>
                        <div class="tw-flex tw-flex-col md:tw-text-left tw-text-center tw-gap-y-5 tw-justify-center">
                            <h4 class="tw-text-bluewood-800 hc-title-xl">Melalui Sidebar</h4>
                            <p class="hc-text-lg">
                                Ketika anda di halaman mana pun, pastinya akan ada sebuah bar navigasi di sisi halaman.
                                Untuk mengakses halaman induk siswa anda cukup menekan tombol dengan ikon buku yang
                                akan mengarahkan anda ke halaman pilih jurusan.
                            </p>
                        </div>
                    </div>

                    <div class="tw-grid md:tw-grid-cols-2 sm:tw-grid-rows-1">
                        <div class="hc-img">
                            <img src="{{ URL::asset('assets/img/hc-rekapnilai-akses-2.svg') }}" alt="Halaman Dashboard">
                        </div>
                        <div class="tw-flex tw-flex-col md:tw-text-left tw-text-center tw-gap-y-5 tw-justify-center">
                            <h4 class="tw-text-bluewood-800 hc-title-xl">Melalui Dashboard</h4>
                            <p class="hc-text-lg">
                                Setelah login, pastinya anda akan diarahkan ke halaman dashboard. Disitu
                                anda dapat mengakses halaman induk siswa dengan menekan tombol ikon buku
                                yang ada dibawah 'Aktivitas terakhir anda'. Setelah itu anda akan diarahkan
                                ke halaman data induk siswa seluruh kelas.
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

                <p class="tw-text-justify hc-text-xl tw-mb-10">
                    Terdapat 4 role yang dapat mengakses data induk siswa, yaitu
                    Tata Usaha, Kesiswaan, Kurikulum, dan Wali Kelas.
                </p>

                <div class="tw-grid md:tw-grid-cols-2 tw-grid-cols-1 tw-gap-10">

                    <div class="tw-py-6 tw-px-8 tw-rounded-lg hover:tw-shadow-lg tw-border tw-border-gray-200">
                        <h4 class="tw-text-center tw-pb-2 tw-text-sims-new-500 tw-font-satoshi tw-font-semibold">Tata Usaha
                        </h4>
                        <ul class="tw-list-disc hc-text-lg">
                            <li>Melihat data induk siswa</li>
                            <li>Menambahkan data induk siswa lewat input atau impor</li>
                            <li>Melakukan perubahan pada data induk siswa</li>
                            <li>Mengekspor data siswa</li>
                        </ul>
                    </div>

                    <div class="tw-py-6 tw-px-8 tw-rounded-lg hover:tw-shadow-lg tw-border tw-border-gray-200">
                        <h4 class="tw-text-center tw-text-[#B4B8BC] tw-font-satoshi tw-font-semibold">Wali Kelas</h4>
                        <ul class="tw-text-xl tw-list-disc hc-text-lg tw-pt-5">
                            <li>Melihat semua data induk siswa</li>
                            <li>Melihat dan export rekap nilai siswa</li>
                            <li>Import, memperbarui, menginput, dan menghapus rekap nilai siswa</li>
                        </ul>
                    </div>

                    <div class="tw-py-6 tw-px-8 tw-rounded-lg hover:tw-shadow-lg tw-border tw-border-gray-200">
                        <h4 class="tw-text-center tw-text-oren-400 tw-font-satoshi tw-font-semibold">Kurikulum</h4>
                        <ul class="tw-text-xl tw-list-disc hc-text-lg tw-pt-5">
                            <li>Melihat semua data induk siswa</li>
                            <li>Melihat dan export rekap nilai siswa</li>
                        </ul>
                    </div>

                    <div class="tw-py-6 tw-px-8 tw-rounded-lg hover:tw-shadow-lg tw-border tw-border-gray-200">
                        <h4 class="tw-text-center tw-pb-2 tw-text-salmon-400 tw-font-satoshi tw-font-semibold">Kesiswaan
                        </h4>
                        <ul class="tw-list-disc hc-text-lg">
                            <li>Melihat data induk siswa</li>
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

                <div class="tw-px-14 tw-mt-10 hc-img">
                    <img src="{{ URL::asset('assets/img/hc-mutasi-search-1.svg') }}" alt="">
                </div>

                <p class="tw-text-center tw-mx-12 hc-text-lg tw-mt-7">
                    Tentu tidak mudah ketika kita harus mencari satu data diantara puluhan
                    bahkan ratusan data lainnya. Mungkin kita dapat menemukannya, tapi bisa jadi
                    bukan itu hasil yang kita inginkan karena diantara ratusan mungkin saja terjadi
                    duplikasi seperti nama yang sama atau lainnya yang tidak unik. Karena itu, SIMS
                    menyediakan solusi untuk masalah anda. Yaitu mempersempit pencarian dengan filter
                </p>

                <h5 class="tw-mb-0 tw-ml-12 tw-mt-10 hc-title-xl">
                    Langkah-langkah:
                </h5>

                <div class="tw-flex tw-mx-12 md:tw-gap-x-40 tw-gap-x-12 tw-pl-8 tw-pr-2 hc-step">

                    <div class="col-sm-12 flex tw-gap-x-10 tw-justify-center">
                        <div class="hc-img tw-flex">
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

                    <div class="col-sm-12 flex tw-justify-center tw-items-center">
                        <div class="hc-img tw-flex">
                            <img src="{{ URL::asset('assets/img/hc-alumni-search-2.svg') }}" alt="">
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

                    <div class="col-sm-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                        <div class="col-lg-7 hc-img tw-flex">
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

                    <div class="col-sm-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                        <div class="hc-img tw-flex">
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

                    <div class="col-sm-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                        <div class="col-lg-8 hc-img tw-flex">
                            <img src="{{ URL::asset('assets/img/hc-mutasi-search-6.svg') }}" alt="">
                        </div>
                        <div class="col-lg-4 tw-gap-y-5">
                            <h4 class="tw-text-bluewood-800 hc-title-xl">Munculkan data sesuai periode dengan data periodik
                            </h4>
                            <p class="hc-text-lg">
                                Ingin menampilkan dengan range tanggal tertentu? Bisa!
                                Cukup menekan tombol data periodik yang terletak di atas
                                tabel. Atur tanggal lalu simpan, maka secara otomatis data
                                dengan tanggal sesuai yang anda atur saja. Catatan, pada data
                                induk siswa, data periodik ini diambil berdasarkan tanggal
                                ditambahkannya data siswa tersebut.
                            </p>
                        </div>
                    </div>

                </div>


                <div class="tw-flex tw-gap-4 tw-items-center tw-mt-20">
                    <i class="fa-solid fa-circle-2 tw-text-sims-new-500 tw-text-4xl"></i>
                    <h4 class="tw-mb-0 hc-title-xl">
                        Tambah Data Induk Siswa
                    </h4>
                </div>

                <div class="tw-flex tw-gap-x-40 tw-mx-12 tw-pl-8 tw-pr-2 hc-step">

                    <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center">
                        <div class="hc-img tw-flex">
                            <img src="{{ URL::asset('assets/img/hc-mutasi-create-1.svg') }}" alt="">
                        </div>
                        <div class="tw-flex tw-flex-col tw-gap-y-5 tw-justify-center">
                            <h4 class="tw-text-bluewood-800 hc-title-xl">Akses Halaman Edit Data Siswa</h4>
                            <p class="hc-text-lg">
                                Untuk menambahkan data induk siswa, anda tinggal menekan tombol 'Tambah Data'
                                yang berada di kanan atas halaman data siswa. Tapi perlu diingat, yang dapat
                                mengakses tambah data siswa hanya tata usaha saja.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                        <div class="col-lg-6 hc-img tw-flex">
                            <img src="{{ URL::asset('assets/img/hc-induk-create-1.svg') }}" alt="">
                        </div>
                        <div class="col-lg-6 tw-flex tw-flex-col tw-gap-y-5">
                            <h4 class="tw-text-bluewood-800 hc-title-xl">Pilih cara penginputan</h4>
                            <p class="hc-text-lg">
                                Kami menyediakan input secara manual dan import otomatis untuk memudahkan
                                Tata Usaha dalam penginputan data siswa. Setelah menekan tombol 'Tambah Data'
                                anda bisa memilih dengan cara apa anda akan menambahkan data.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center">
                        <div class="col-lg-8 hc-img tw-flex">
                            <img src="{{ URL::asset('assets/img/hc-induk-create-2.svg') }}" alt="">
                        </div>
                        <div class="col-lg-3 tw-flex tw-flex-col tw-gap-y-5">
                            <h4 class="tw-text-bluewood-800 hc-title-xl">Isi data siswa</h4>
                            <p class="hc-text-lg">
                                Setelah anda ke halaman tambah data siswa, anda akan melihat sebuah form input
                                yang berisikan inputan data-data induk siswa. Karena banyaknya data siswa yang diinput,
                                jadi agar lebih mudah dicari dan dilihat kami memecah inputan data menjadi 9 kategori
                                dan 3 step; data siswa, data orang tua/wali, dan juga data lainnya.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                        <div class="col-lg-8 hc-img tw-flex">
                            <img src="{{ URL::asset('assets/img/hc-alumni-add-4.svg') }}" alt="">
                        </div>
                        <div class="col-lg-3 tw-flex tw-flex-col tw-gap-y-5">
                            <h4 class="tw-text-bluewood-800 hc-title-xl">Upload untuk menyimpan data</h4>
                            <p class="hc-text-lg">
                                Setelah mengisi data, anda tinggal menekan tombol
                                'Upload data' untuk menyimpan data. Secara otomatis,
                                siswa tersebut akan masuk ke data induk siswa.
                            </p>
                        </div>
                    </div>

                </div>


                <div class="tw-flex tw-gap-4 tw-items-center tw-mt-16">
                    <i class="fa-solid fa-circle-3 tw-text-sims-new-500 tw-text-4xl"></i>
                    <h4 class="tw-mb-0 hc-title-xl">
                        Impor Data Siswa
                    </h4>
                </div>

                <div class="tw-flex tw-mt-10 tw-mx-12 tw-justify-center tw-items-center tw-gap-20">

                    <div class="flex tw-flex-col tw-gap-y-10 tw-justify-center tw-items-center">
                        <div class="hc-img tw-flex">
                            <img src="{{ URL::asset('assets/img/hc-induk-import.svg') }}" alt="">
                        </div>
                        <div class="tw-text-center">
                            <h4 class="tw-text-bluewood-800 hc-title-xl">Tambahkan file dengan menekan atau menyeret file
                                ke kolom input</h4>
                            <p class="hc-text-lg">
                                Seret/Add file yang akan anda import ke dalam kolom input. File
                                yang dapat diimpor adalah file .xlsx, .csv, dan .xls
                            </p>
                        </div>
                    </div>

                    <i class="fa-solid fa-chevron-right tw-text-4xl tw-text-sims-500"></i>

                    <div class="flex tw-flex-col tw-gap-y-10 tw-justify-center tw-items-center">
                        <div class="hc-img tw-flex">
                            <img src="{{ URL::asset('assets/img/hc-induk-import-1.svg') }}" alt="">
                        </div>
                        <div class="tw-text-center">
                            <h4 class="tw-text-bluewood-800 hc-title-xl">Import file</h4>
                            <p class="hc-text-lg">
                                Setelah anda menambahkan file, nama file anda akan tertulis di kolom input.
                                Setelah itu, anda tinggal menekan tombol 'Import' dan data akan tersimpan
                            </p>
                        </div>
                    </div>

                </div>

                <div class="tw-flex tw-gap-4 tw-items-center tw-mt-16">
                    <i class="fa-solid fa-circle-4 tw-text-sims-new-500 tw-text-4xl"></i>
                    <h4 class="tw-mb-0 hc-title-xl">
                        Edit Data Siswa
                    </h4>
                </div>

                <div class="tw-flex tw-mx-12 tw-gap-x-40 tw-pl-8 tw-pr-2 hc-step">

                    <div class="col-lg-12 flex tw-justify-center tw-items-center">
                        <div class="col-lg-6 hc-img tw-flex">
                            <img src="{{ URL::asset('assets/img/hc-alumni-edit-1.svg') }}" alt="">
                        </div>
                        <div class="col-lg-6 tw-gap-y-5 tw-justify-center">
                            <h4 class="tw-text-bluewood-800 hc-title-xl">Akses Halaman Edit Data Siswa</h4>
                            <p class="hc-text-lg">
                                Untuk mengakses halaman edit data siswa, cukup tekan tombol edit yang
                                berada di baris aksi tabel data induk siswa. Yang dapat mengakses halaman edit
                                data siswa adalah tata usaha.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                        <div class="col-lg-8 hc-img tw-flex">
                            <img src="{{ URL::asset('assets/img/hc-induk-edit-1.svg') }}" alt="">
                        </div>
                        <div class="col-lg-3 tw-flex tw-flex-col tw-gap-y-5">
                            <h4 class="tw-text-bluewood-800 hc-title-xl">Edit data siswa</h4>
                            <p class="hc-text-lg">
                                Setelah anda ke halaman edit data siswa, anda akan melihat sebuah form input yang
                                sudah terisi perubahan sebelumnya. Di situ anda dapat memperbarui data induk siswa.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-12 flex tw-gap-x-10 tw-justify-center tw-items-center">
                        <div class="col-lg-8 hc-img">
                            <img src="{{ URL::asset('assets/img/hc-alumni-edit-3.svg') }}" alt="">
                        </div>
                        <div class="col-lg-3 tw-flex tw-flex-col tw-gap-y-5">
                            <h4 class="tw-text-bluewood-800 hc-title-xl">Simpan perubahan!</h4>
                            <p class="hc-text-lg">
                                Jika anda sudah selesai mengedit data induk siswa, anda tinggal menyimpan
                                perubahan dengan menekan tombol 'Upload Data'.
                            </p>
                        </div>
                    </div>

                </div>


                <div class="tw-flex tw-gap-4 tw-items-center tw-mt-16">
                    <i class="fa-solid fa-circle-5 tw-text-sims-new-500 tw-text-4xl"></i>
                    <h4 class="tw-mb-0 hc-title-xl">
                        Ekspor Data Siswa
                    </h4>
                </div>

                <div class="tw-flex tw-mt-10 tw-mx-12 tw-justify-center tw-items-center tw-gap-20">

                    <div class="flex tw-flex-col tw-gap-y-10 tw-justify-center tw-items-center">
                        <div class="tw-flex hc-img">
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
                        <div class="tw-flex hc-img">
                            <img src="{{ URL::asset('assets/img/hc-induk-export.svg') }}" alt="">
                        </div>
                        <div class="tw-text-center">
                            <h4 class="tw-text-bluewood-800 hc-title-xl">Pilih jumlah data yang akan diekspor</h4>
                            <p class="hc-text-lg">
                                Jika anda sudah menekan tombol, file tidak langsung terunduh. Namun, akan muncul
                                pop-up untuk memilih jumlah data dan halaman yang akan anda ekspor. Setelah anda memilih dan
                                menekan tombol 'Ekspor', maka data sesuai dengan jumlah dan halaman yang anda pilih akan
                                terunduh.
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

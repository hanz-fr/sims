@extends('layouts.main-new')

@section('content')

<div class="tw-container tw-mx-auto">

    <!-- spacing !-->
    <div class="tw-mt-10"></div> 
    <!-------------->
    
    <div role="status" class="tw-flex tw-justify-center">
        <div class="lg:tw-w-1/2">
            <img src="{{ URL::asset('assets/img/hc-header-general.jpg') }}" alt="hc-header-img">
        </div>
    </div>
    

    <!-- spacing !-->
    <div class="tw-mt-12"></div> 
    <!-------------->

    <div class="tw-mx-60">
        <div class="tw-flex tw-flex-col tw-gap-10">

            <div class="tw-py-8 tw-px-10 tw-rounded-lg tw-shadow-lg tw-border tw-border-gray-200 tw-mb-24">
                <div class="hc-title-3xl tw-flex tw-justify-center tw-mb-4"> 
                    <span class="tw-text-bluewood-700">Apa</span>&nbsp;itu SIMS?
               </div>
               <div class="hc-text-lg tw-text-justify">
                Sistem Informasi Manajemen Data Siswa berbasis web yang dikembangkan 
                sebagai alat bantu untuk sekolah dalam pengelolaan data induk siswa 
                secara online. Pada dasarnya, SIMS memungkinkan sekolah untuk menyimpan 
                dan mengelompokkan data di satu tempat secara digital sehingga memudahkan 
                administrator sekolah dan guru dalam memantau kemajuan siswa dan memperbarui 
                data secara real time. SIMS juga mempermudah sekolah dalam pelacakan data, 
                seperti perpindahan, data alumni, dan siswa yang tidak naik kelas. Semua itu 
                bisa dilakukan dengan lebih mudah menggunakan SIMS.
               </div>
            </div>

           <div class="tw-text-left hc-title-3xl"> 
                Tujuan Kami
            </div>

            <p class="tw-mb-0 hc-text-lg">Tujuan utama dari SIMS adalah mempermudah pengelolaan, penyimpanan dan pelacakan 
            data terkait siswa. </p>

           <div class="tw-grid tw-grid-cols-3 hover:tw-text-white">

                <div class="hc-card-general">
                    <i class="fa-regular fa-computer-speaker tw-text-4xl tw-text-sims-new-500"></i>
                    <h4 class="hc-title-lg tw-mt-3">Transformasi Digital</h4>
                    <p class="tw-text-justify hc-text-base tw-mt-2">dari penginputan manual di buku induk menjadi penyimpanan data digital. 
                    Singkatnya, SIMS adalah Buku Induk Siswa versi digital.</p>
                </div>

                <div class="hc-card-general">
                    <i class="fa-light fa-screen-users tw-text-4xl tw-text-sims-new-500"></i>
                    <h4 class="hc-title-lg tw-mt-3">Peningkatan kinerja operator sekolah</h4>
                    <p class="tw-text-justify hc-text-base tw-mt-2">SIMS mampu meningkatkan kinerja operator sekolah, efektifitas, dan efisiensi waktu 
                    khususnya dalam penginputan data induk.</p>
                </div>
                <div class="hc-card-general">
                    <i class="fa-regular fa-people-arrows tw-text-4xl tw-text-sims-new-500"></i>
                    <h4 class="hc-title-lg tw-mt-3">Peningkatan keefektifan komunikasi</h4>
                    <p class="tw-text-justify hc-text-base tw-mt-2">SIMS memungkinkan data ditransfer dengan lancar dari satu bagian ke bagian lainnya. </p>
                </div>

            </div>

            <div class="tw-grid tw-grid-cols-2 tw-mt-24">

                <div class="tw-flex tw-pr-14">
                    <img src="{{ URL::asset('assets/img/hc-content-general.svg') }}" class="tw-w-full" alt="hc-header-img">
                </div>

                <div class="tw-grid-rows-3">
                    <div class="hc-title-3xl tw-mb-12"><span class="tw-text-bluewood-700">Manfaat</span> SIMS</div>
                    <div class="tw-flex">
                        <i class="fa-regular fa-circle-check tw-text-emerald-500 tw-text-3xl"></i>
                        <div class="tw-grid-rows-2 tw-ml-6">
                            <h3 class="hc-title-lg">Penyimpanan Data Terpusat</h3>
                            <p class="tw-text-justify hc-text-base">
                                SIMS memungkinkan operator sekolah untuk menyimpan 
                                data-data siswa di satu tempat, sehingga dapat 
                                mempermudah pemegang hak akses dalam melacak perubahan 
                                pada data dan mengatur semua informasi. Mereka dapat 
                                melakukannya tanpa harus memilah dokumen-dokumen secara manual.
                            </p>
                        </div>
                    </div>

                    <div class="tw-flex">
                        <i class="fa-regular fa-circle-check tw-text-emerald-500 tw-text-3xl"></i>
                        <div class="tw-grid-rows-2 tw-ml-6">
                            <h3 class="hc-title-lg">Peningkatan Produktivitas</h3>
                            <p class="tw-text-justify hc-text-base">
                                tanpa SIMS operator sekolah harus mengisi ratusan data secara 
                                manual dan harus memperbaharuinya dengan cara manual juga. 
                                Tetapi dengan SIMS, penginputan data akan menjadi lebih cepat 
                                sehingga dapat menghemat waktu pengerjaan
                            </p>
                        </div>
                    </div>

                    <div class="tw-flex">
                        <i class="fa-regular fa-circle-check tw-text-emerald-500 tw-text-3xl"></i>
                        <div class="tw-grid-rows-2 tw-ml-6">
                            <h3 class="hc-title-lg">Pemanfaatan Sumber Daya yang Lebih Baik</h3>
                            <p class="tw-text-justify hc-text-base">
                                SIMS adalah sebuah transformasi digital yang artinya semua kegiatan 
                                dilakukan secara online. Bila dimanfaatkan dengan baik tentunya dapat 
                                menghemat banyak kertas dan sumber daya berguna lainnya.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

    <!-- spacing !-->
    <div class="tw-my-24"></div> 
    <!-------------->

    <button onclick="topFunction()" id="myBtn" class="tw-bg-sims-400 tw-px-5 tw-py-3 tw-rounded-lg tw-transition-all tw-duration-150 hover:-tw-translate-y-0.5 hover:tw-bg-sims-500" style="display: none; position: fixed; bottom: 40px; right: -200px; z-index: 99; border: none; outline: none; cursor: pointer;">
        <i class="fa-solid fa-chevron-up tw-text-white tw-text-lg"></i>
    </button>
</div>

<script>
/* smooth scrolling to top */
/* $("a[href='#top']").click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
}); */

// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
    mybutton.style.display = "block";
    mybutton.style.right = "50px";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

@endsection
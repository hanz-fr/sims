@extends('layouts.main-new')

@section('content')

<div class="tw-container tw-mx-auto">
    
    <!-- spacing !-->
    <div class="tw-mt-10"></div> 
    <!-------------->

    <div class="md:shrink-0">
        <img src="{{ URL::asset('assets/img/hc-header.jpg') }}" alt="hc-header-img" class="tw-rounded-xl">
    </div>
    
    <!-- spacing !-->
    <div class="tw-mt-20"></div> 
    <!-------------->

    <div class="tw-mx-20">


        <div class="tw-font-satoshi tw-text-2xl hc-text-lg">
            Butuh bantuan menggunakan fitur-fitur SIMS? Jangan Khawatir!
            Semua yang Anda butuhkan untuk mengakses fitur-fitur kami tersedia disini. Pelajari dan temukan berbagai manfaat menggunakan layanan kami.
        </div>

        
        <div class="tw-text-basic-700 tw-text-center hc-title-3xl tw-mt-20"> 
            <span class="tw-text-sims-500">Bagaimana</span> kami dapat membantu anda?
        </div>

        <br>

        <div class="tw-items-center tw-my-7 tw-text-center">
            <form class="tw-border-none tw-font-sg tw-p-0 tw-items-center tw-mb-10">
                <input type="text" id="cardFilter" onkeyup="cardFilters()" class="tw-rounded-lg tw-w-5/6 tw-h-10 tw-items-center tw-border-gray-200 hover:tw-border-gray-300 focus-within:tw-border-gray-300 focus:tw-ring-gray-300 hc-search-input" placeholder="cari fitur...">
            </form>
        </div>

        <div class="hc-text-xl tw-text-center tw-font-satoshi tw-mb-20">
            Atau pilih di bawah ini untuk segera menemukan informasi mengenai fitur kami
        </div>

        <!-- card !--> 
        <div id="cardFeature" class="tw-flex tw-flex-wrap tw-justify-center tw-gap-x-7 tw-gap-y-10 tw-mb-24">

            <a href="#" class="hc-card">
                <i class="fa-regular fa-graduation-cap tw-text-4xl tw-text-sims-400 tw-mb-2"></i>
                <div class="hc-title-xl">Alumni</div>
                <div class="hc-text-base">Penyimpanan data induk dari alumni sekolah selama 5 tahun terakhir!</div>
            </a>

            <a href="#" class="hc-card">
                <i class="fa-sharp fa-regular fa-book-open tw-text-4xl tw-text-sims-400 tw-mb-2"></i>
                <div class="hc-title-xl">Data Induk</div>
                <div class="hc-text-base">Pengelolaan dan penyimpanan data induk secara digital dan real-time</div>
            </a>

            <a href="#" class="hc-card">
                <i class="fa-regular fa-users tw-text-4xl tw-text-sims-400 tw-mb-2"></i>
                <div class="hc-title-xl">Mutasi</div>
                <div class="hc-text-base">Mengelola data mutasi masuk dan keluar, solusi tepat untuk mengelola data mutasi</div>
            </a>

            <a href="#" class="hc-card">
                <i class="fa-regular fa-book tw-text-4xl tw-text-sims-400 tw-mb-2"></i>
                <div class="hc-title-xl">Rekap Nilai</div>
                <div class="hc-text-base">Penyimpanan rekap nilai setiap siswa, mempermudah penginputan rekap nilai</div>
            </a>

            <a href="#" class="hc-card">
                <i class="fa-regular fa-user tw-text-4xl tw-text-sims-400 tw-mb-2"></i>
                <div class="hc-title-xl">Akun</div>
                <div class="hc-text-base">Pelajari tentang akun dan keamaan pengguna di SIMS</div>
            </a>

            <a href="/help/general" class="hc-card">
                <i class="fa-solid fa-question tw-text-4xl tw-text-sims-400 tw-mb-2"></i>
                <div class="hc-title-xl">SIMS</div>
                <div class="hc-text-base">Pelajari hal-hal mendasar tentang SIMS</div>
            </a>

        </div>
{{-- 
        <div class="tw-text-basic-700 tw-text-center hc-title-3xl tw-mt-10"> 
            <span class="tw-text-sims-500">FAQ</span> SIMS
        </div> --}}


        <!-- spacing !-->
        <div class="tw-mt-20"></div> 
        <!-------------->
    </div>

</div>

<script>
function cardFilters() {
    var input, filter, cards, cardContainer, title, i;

    input = document.getElementById("cardFilter");
    filter = input.value.toUpperCase();
    cardContainer = document.getElementById("cardFeature");
    cards = cardContainer.getElementsByClassName("hc-card");

    for (i = 0; i < cards.length; i++) {
        title = cards[i].querySelector(".hc-card div.hc-title-xl");

        if (title.innerText.toUpperCase().indexOf(filter) > -1) {
            cards[i].style.display = "";
        } else {
            cards[i].style.display = "none";
        }
    }
}
</script>
@endsection
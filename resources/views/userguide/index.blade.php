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
                Semua yang Anda butuhkan untuk mengakses fitur-fitur kami tersedia disini. Pelajari dan temukan berbagai
                manfaat menggunakan layanan kami.
            </div>


            <div class="tw-text-basic-700 tw-text-center hc-title-3xl tw-mt-20">
                <span class="tw-text-sims-500">Bagaimana</span> kami dapat membantu anda?
            </div>

            <br>

            <div class="tw-items-center tw-my-7 tw-text-center">
                <form class="tw-border-none tw-font-sg tw-p-0 tw-items-center tw-mb-10">
                    <input type="text" id="cardFilter" onkeyup="cardFilters()"
                        class="tw-rounded-lg tw-w-5/6 tw-h-10 tw-items-center tw-border-gray-200 hover:tw-border-gray-300 focus-within:tw-border-gray-300 focus:tw-ring-gray-300 hc-search-input"
                        placeholder="cari fitur...">
                </form>
            </div>

            <div class="hc-text-xl tw-text-center tw-font-satoshi tw-mb-20">
                Atau pilih di bawah ini untuk segera menemukan informasi mengenai fitur kami
            </div>

            <!-- card !-->
            <div id="cardFeature" class="tw-flex tw-flex-wrap tw-justify-center tw-gap-x-7 tw-gap-y-10 tw-mb-24">

                <a href="/help/alumni" class="hc-card">
                    <i class="fa-regular fa-graduation-cap tw-text-4xl tw-text-sims-400 tw-mb-2"></i>
                    <div class="hc-title-xl">Alumni</div>
                    <div class="hc-text-base">Penyimpanan data induk dari alumni sekolah selama 5 tahun terakhir!</div>
                </a>

                <a href="/help/induk" class="hc-card">
                    <i class="fa-sharp fa-regular fa-book-open-cover tw-text-4xl tw-text-sims-400 tw-mb-2"></i>
                    <div class="hc-title-xl">Data Induk</div>
                    <div class="hc-text-base">Pengelolaan dan penyimpanan data induk secara digital dan real-time</div>
                </a>

                <a href="/help/mutasi" class="hc-card">
                    <i class="fa-regular fa-users tw-text-4xl tw-text-sims-400 tw-mb-2"></i>
                    <div class="hc-title-xl">Mutasi</div>
                    <div class="hc-text-base">Mengelola data mutasi masuk dan keluar, solusi tepat untuk mengelola data
                        mutasi</div>
                </a>

                <a href="/help/rekap-nilai" class="hc-card">
                    <i class="fa-regular fa-book tw-text-4xl tw-text-sims-400 tw-mb-2"></i>
                    <div class="hc-title-xl">Rekap Nilai</div>
                    <div class="hc-text-base">Penyimpanan rekap nilai setiap siswa, mempermudah penginputan rekap nilai
                    </div>
                </a>

                <a href="/help/account" class="hc-card">
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

            <div class="tw-text-basic-700 tw-text-center hc-title-3xl tw-mt-10">
                <span class="tw-text-sims-500">FAQ</span> SIMS
            </div>

            <div id="accordion-flush" data-accordion="collapse" data-active-classes="tw-bg-white tw-text-sims-new-500"
                data-inactive-classes="tw-text-gray-500" class="tw-mx-40 tw-mt-8">
                <h2 id="accordion-flush-heading">
                    <button type="button"
                        class="hover:tw-text-sims-300 tw-transition-all tw-ease-out tw-flex tw-font-satoshi tw-items-center tw-justify-between tw-w-full tw-py-5 tw-font-medium tw-text-left tw-text-gray-500 tw-border-b tw-border-gray-200"
                        data-accordion-target="#accordion-flush-body" aria-expanded="false"
                        aria-controls="accordion-flush-body">
                        <div>
                            <span class="tw-text-lg tw-font-medium">Question</span>
                        </div>
                        <div class="tw-flex">
                            <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </button>
                </h2>
                <div id="accordion-flush-body" class="hidden" aria-labelledby="accordion-flush-heading">
                    <div class="tw-py-5 tw-font-normal tw-border-b tw-border-gray-200">
                        <p class="tw-font-satoshi tw-text-base tw-font-medium tw-text-gray-400 tw-w-full">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto fugiat fuga laudantium
                            minima vero consequuntur itaque maiores nobis nemo recusandae?
                        </p>
                        <p class="tw-font-satoshi tw-text-xs tw-text-gray-400">
                            Admin
                        </p>
                    </div>
                </div>
            </div>


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

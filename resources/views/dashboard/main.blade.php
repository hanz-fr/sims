@extends('layouts.main-new')

@section('content')
    {{-- SWIPER CSS --}}
    <style>
        .slide-container {
            max-width: 1000px;
            width: 100%;
        }

        .slide-content {
            margin: 0 40px;
            overflow: hidden;
        }

        .card {
            border-radius: 25px;
            background-color: #FFF;
        }

        .image-content,
        .card-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 14px;
        }

        .image-content {
            position: relative;
            row-gap: 5px;
            padding: 25px 0;
        }

        .overlay {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background-color: #4070F4;
            border-radius: 25px 25px 0 25px;
        }

        .overlay::before,
        .overlay::after {
            content: '';
            position: absolute;
            right: 0;
            bottom: -40px;
            height: 40px;
            width: 40px;
            background-color: #4070F4;
        }

        .overlay::after {
            border-radius: 0 25px 0 0;
            background-color: #FFF;
        }

        .card-image {
            position: relative;
            height: 150px;
            width: 150px;
            border-radius: 50%;
            background: #FFF;
            padding: 3px;
        }

        .card-image .card-img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #4070F4;
        }

        .name {
            font-size: 18px;
            font-weight: 500;
            color: #333;
        }

        .description {
            font-size: 14px;
            color: #707070;
            text-align: center;
        }

        .button {
            border: none;
            font-size: 16px;
            color: #FFF;
            padding: 8px 16px;
            background-color: #8acdd6;
            border-radius: 6px;
            margin: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .button:hover {
            background: #265DF2;
        }

        .swiper-navBtn {
            color: #53b0bd;
            transition: color 0.3s ease;
        }

        .swiper-navBtn:hover {
            color: #bae2e7;
        }

        .swiper-navBtn::before,
        .swiper-navBtn::after {
            font-size: 35px;
        }

        .swiper-button-next {
            right: 0;
        }

        .swiper-button-prev {
            left: 0;
        }

        .swiper-pagination-bullet {
            background-color: #afe0dc;
            opacity: 1;
        }

        .swiper-pagination-bullet-active {
            background-color: #3b9091;
        }

        @media screen and (max-width: 768px) {
            .slide-content {
                margin: 0 10px;
            }

            .swiper-navBtn {
                display: none;
            }
        }
    </style>

    <!-- Welcome Banner -->
    <div class="tw-flex tw-flex-col tw-my-10 tw-mx-10">
        <div class="sims-card-1">
            <div class="tw-flex tw-justify-between tw-mx-16">
                <div class="tw-flex tw-flex-col tw-gap-1">
                    <div class="lg:sims-heading-3xl sm:sims-heading-xl">Selamat Malam, <div class="tw-inline tw-font-black">{{ auth()->user()->nama }}</div>
                    </div>
                    <div class="lg:sims-text-gray-md sm:sims-text-gray-xs">Apa yang akan anda lakukan hari ini?</div>
                </div>
                <i class="fa-solid fa-circle-user lg:sims-icon-5xl sm:sims-icon-4xl"></i>
            </div>
        </div>

        <!-- spacing -->
        <div class="tw-my-5"></div>

        <!-- Content -->
        <div class="tw-flex tw-gap-10">

            <!-- Column 1 -->
            <!-- Carousel -->
            <div class="slide-container swiper tw-h-fit">
                <div class="slide-content">
                    <div class="card-wrapper swiper-wrapper">

                        <!-- Card 1 -->
                        <a href="/siswa-keluar" class="swiper-slide tw-cursor-pointer hover:tw-drop-shadow-md tw-transition-all">
                            <div class="sims-card-1">
                                <div class="tw-flex tw-justify-evenly tw-px-5 tw-gap-5">
                                    <i class="fa-solid fa-user sims-icon-3xl tw-text-[#FF869C]"></i>
                                    <div class="tw-flex tw-flex-col">
                                        <div class="sims-heading-xl tw-font-black">-</div>
                                        <div class="sims-text-gray-sm">Siswa Keluar</div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Card 2 -->
                        <a href="/rekap-jumlah-siswa" class="swiper-slide">
                            <div class="sims-card-1 tw-cursor-pointer hover:tw-drop-shadow-md tw-transition-all">
                                <div class="tw-flex tw-justify-evenly tw-px-5 tw-gap-5">
                                    <i class="fa-solid fa-user sims-icon-3xl tw-text-[#FFA386]"></i>
                                    <div class="tw-flex tw-flex-col">
                                        <div class="sims-heading-xl tw-font-black">-</div>
                                        <div class="sims-text-gray-sm">Jumlah Siswa</div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Card 3 -->
                        <a href="/siswa-masuk" class="swiper-slide">
                            <div class="sims-card-1 tw-cursor-pointer hover:tw-drop-shadow-md tw-transition-all">
                                <div class="tw-flex tw-justify-evenly tw-px-5 tw-gap-5">
                                    <i class="fa-solid fa-user sims-icon-3xl tw-text-[#6fc5bb]"></i>
                                    <div class="tw-flex tw-flex-col">
                                        <div class="sims-heading-xl tw-font-black">-</div>
                                        <div class="sims-text-gray-sm">Siswa Masuk</div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Card 4 -->
                        <a href="/data-alumni" class="swiper-slide">
                            <div class="sims-card-1 tw-cursor-pointer hover:tw-drop-shadow-md tw-transition-all">
                                <div class="tw-flex tw-justify-evenly tw-px-5 tw-gap-5">
                                    <i class="fa-solid fa-user-graduate sims-icon-3xl tw-text-gray-400"></i>
                                    <div class="tw-flex tw-flex-col">
                                        <div class="sims-heading-xl tw-font-black">-</div>
                                        <div class="sims-text-gray-sm">Alumni</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        
                        <!-- Card 5 -->
                        <a href="/data-tidak-naik" class="swiper-slide">
                            <div class="sims-card-1 tw-cursor-pointer hover:tw-drop-shadow-md tw-transition-all">
                                <div class="tw-flex tw-justify-evenly tw-px-5 tw-gap-5">
                                    <i class="fa-solid fa-user sims-icon-3xl tw-text-[#e66161]"></i>
                                    <div class="tw-flex tw-flex-col">
                                        <div class="sims-heading-xl tw-font-black">-</div>
                                        <div class="sims-text-gray-sm">Siswa Tidak Naik</div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Card 6 -->
                        <a href="/rekap-jumlah-siswa" class="swiper-slide">
                            <div class="sims-card-1 tw-cursor-pointer hover:tw-drop-shadow-md tw-transition-all">
                                <div class="tw-flex tw-justify-evenly tw-px-5 tw-gap-5">
                                    <i class="fa-solid fa-chalkboard-user sims-icon-3xl tw-text-[#7379d3]"></i>
                                    <div class="tw-flex tw-flex-col">
                                        <div class="sims-heading-xl tw-font-black">-</div>
                                        <div class="sims-text-gray-sm">Kelas</div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Card 7 -->
                        <a href="/jurusan" class="swiper-slide">
                            <div class="sims-card-1 tw-cursor-pointer hover:tw-drop-shadow-md tw-transition-all">
                                <div class="tw-flex tw-justify-evenly tw-px-5 tw-gap-5">
                                    <i class="fa-solid fa-shapes sims-icon-3xl tw-text-[#f0d897]"></i>
                                    <div class="tw-flex tw-flex-col">
                                        <div class="sims-heading-xl tw-font-black">-</div>
                                        <div class="sims-text-gray-sm">Jurusan</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="swiper-button-next swiper-navBtn"></div>
                <div class="swiper-button-prev swiper-navBtn"></div>
            </div>
            <!-- End of Column 1 -->
            


            <!-- Column 2 -->
            <div class="sims-card-1 tw-px-10">

                <!-- Latest Activity Card -->
                <div class="sims-card-1-noshadow">
                    <div class="tw-flex tw-justify-around">
                        <div class="tw-flex tw-gap-10 tw-mx-10">
                            <i class="fa-solid fa-clock-rotate-left sims-icon-5xl"></i>
                            <div class="tw-flex tw-flex-col">
                                <div class="sims-heading-lg-black">Aktivitas terakhir anda</div>
                                <div class="sims-text-regular-md">Create new Siswa dengan NIS : 0023929</div>
                                <div class="sims-text-gray-xs">2 menit yang lalu</div>
                            </div>
                        </div>
                        <a href="#" class="tw-border-sims-new-500 tw-border tw-h-fit tw-my-auto tw-px-5 tw-py-3 tw-rounded-lg tw-text-sims-new-500 hover:tw-text-white hover:tw-bg-sims-new-500 tw-transition-all">
                            Lihat Semua Histori
                        </a>
                    </div>
                </div>

                <!-- Quick Access Card -->
                <div class="tw-flex">
                    <a href="#" class="sims-card-1-noshadow sims-text-regular-sm tw-text-center tw-font-normal tw-w-full tw-h-40 tw-px-3 tw-mx-2 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all">
                        <div class="tw-flex tw-flex-col tw-gap-3">
                            <i class="fa-regular fa-book-open tw-text-3xl tw-m-auto"></i>
                            Data Induk
                        </div>
                    </a>
                    <a href="#" class="sims-card-1-noshadow sims-text-regular-sm tw-text-center tw-font-normal tw-w-full tw-h-40 tw-px-3 tw-mx-2 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all">
                        <div class="tw-flex tw-flex-col tw-gap-3">
                            <i class="fa-solid fa-graduation-cap tw-text-3xl tw-m-auto"></i>
                            Rekap Jumlah Siswa
                        </div>
                    </a>
                    <a href="#" class="sims-card-1-noshadow sims-text-regular-sm tw-text-center tw-font-normal tw-w-full tw-h-40 tw-px-3 tw-mx-2 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all">
                        <div class="tw-flex tw-flex-col tw-gap-3">
                            <i class="fa-solid fa-user-group tw-text-3xl tw-m-auto"></i>
                            Data Perpindahan
                        </div>
                    </a>
                    <a href="#" class="sims-card-1-noshadow sims-text-regular-sm tw-text-center tw-font-normal tw-w-full tw-h-40 tw-px-3 tw-mx-2 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all">
                        <div class="tw-flex tw-flex-col tw-gap-3">
                            <i class="fa-solid fa-question tw-text-3xl tw-m-auto"></i>
                            Pusat Bantuan
                        </div>
                    </a>
                </div>
            </div>
            <!-- End of Column 2-->

        </div>
    </div>

    <script>
        var swiper = new Swiper(".slide-content", {
            slidesPerView: 2,
            spaceBetween: 25,
            fade: 'true',
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                300: {
                    slidesPerView: 2,
                },
                1450: {
                    slidesPerView: 3,
                },
            },
        });
    </script>
@endsection

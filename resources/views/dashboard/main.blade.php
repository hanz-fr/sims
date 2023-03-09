@extends('layouts.main-new')

@section('content')
    {{-- SWIPER CSS --}}
    <style>
        .hide {
            display: none;
        }

        .slide-container {
            max-width: 37rem;
            width: 100%;
        }

        @media only screen and (min-width: 1370px) {
            .slide-container {
                max-width: 60rem;
                width: 100%;
            }
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
        <div class="tw-w-1/2 md:tw-w-full sims-card-1 tw-py-8 tw-px-16">
            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="lg:sims-heading-3xl sm:sims-heading-xl">{{ $message }}, <div
                        class="tw-inline tw-font-black">
                        {{ auth()->user()->nama }}</div>
                </div>
                <div class="lg:sims-text-gray-md sm:sims-text-gray-xs">Apa yang akan anda lakukan hari ini?</div>
            </div>
        </div>

        <!-- spacing -->
        <div class="tw-my-2"></div>

        <!-- Content -->
        <div class="tw-flex md:tw-flex-row tw-flex-col tw-gap-10">

            <!-- Column 1 -->
            <!-- Carousel -->
            <div class="tw-flex tw-flex-col tw-w-1/2 tw-justify-end">
                <div class="slide-container swiper tw-my-auto">
                    <div class="slide-content">
                        <div class="card-wrapper swiper-wrapper">

                            <!-- Card 1 (Siswa Keluar) -->
                            <a @if(! Gate::allows('manage-alumni'))  @else href="/siswa-keluar" @endif
                                class="swiper-slide tw-cursor-pointer hover:tw-drop-shadow-md tw-transition-all">
                                <div class="sims-card-1">
                                    <div class="tw-flex tw-justify-evenly tw-px-5 tw-gap-5">
                                        <i class="fa-solid fa-user sims-icon-3xl tw-text-[#FF869C]"></i>
                                        <div class="tw-flex tw-flex-col">
                                            <div class="sims-heading-xl tw-font-black">{{ $siswaKeluar }}</div>
                                            <div class="sims-text-gray-sm">Siswa Keluar</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            
                            <!-- Card 2 (Siswa Masuk) -->
                            <a @if(! Gate::allows('manage-alumni')) @else href="/siswa-masuk" @endif class="swiper-slide">
                                <div class="sims-card-1 tw-cursor-pointer hover:tw-drop-shadow-md tw-transition-all">
                                    <div class="tw-flex tw-justify-evenly tw-px-5 tw-gap-5">
                                        <i class="fa-solid fa-user sims-icon-3xl tw-text-[#6fc5bb]"></i>
                                        <div class="tw-flex tw-flex-col">
                                            <div class="sims-heading-xl tw-font-black">{{ $siswaMasuk }}</div>
                                            <div class="sims-text-gray-sm">Siswa Masuk</div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <!-- Card 3 (Rekap Jumlah Siswa) -->
                            <a @if(! Gate::allows('wali-kelas')) href="/rekap-jumlah-siswa" @endif class="swiper-slide">
                                <div class="sims-card-1 tw-cursor-pointer hover:tw-drop-shadow-md tw-transition-all">
                                    <div class="tw-flex tw-justify-evenly tw-px-5 tw-gap-5">
                                        <i class="fa-solid fa-user sims-icon-3xl tw-text-[#FFA386]"></i>
                                        <div class="tw-flex tw-flex-col">
                                            <div class="sims-heading-xl tw-font-black">{{ $siswa }}</div>
                                            <div class="sims-text-gray-sm">Jumlah Siswa</div>
                                        </div>
                                    </div>
                                </div>
                            </a>


                            <!-- Card 4 (Alumni) -->
                            <a @if(! Gate::allows('manage-alumni')) @else href="/select-jurusan-alumni" @endif class="swiper-slide">
                                <div class="sims-card-1 tw-cursor-pointer hover:tw-drop-shadow-md tw-transition-all">
                                    <div class="tw-flex tw-justify-evenly tw-px-5 tw-gap-5">
                                        <i class="fa-solid fa-user-graduate sims-icon-3xl tw-text-gray-400"></i>
                                        <div class="tw-flex tw-flex-col">
                                            <div class="sims-heading-xl tw-font-black">{{ $alumni }}</div>
                                            <div class="sims-text-gray-sm">Alumni</div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <!-- Card 5 (Siswa Tidak Naik) -->
                            <a @if(! Gate::allows('wali-kelas')) href="/data-tidak-naik" @endif class="swiper-slide">
                                <div class="sims-card-1 tw-cursor-pointer hover:tw-drop-shadow-md tw-transition-all">
                                    <div class="tw-flex tw-justify-evenly tw-px-5 tw-gap-5">
                                        <i class="fa-solid fa-user sims-icon-3xl tw-text-[#e66161]"></i>
                                        <div class="tw-flex tw-flex-col">
                                            <div class="sims-heading-xl tw-font-black">{{ $siswaTdkNaik }}</div>
                                            <div class="sims-text-gray-sm">Siswa Tidak Naik</div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <!-- Card 6 (Kelas) -->
                            <a @if(! Gate::allows('wali-kelas')) href="/rekap-jumlah-siswa" @endif class="swiper-slide">
                                <div class="sims-card-1 tw-cursor-pointer hover:tw-drop-shadow-md tw-transition-all">
                                    <div class="tw-flex tw-justify-evenly tw-px-5 tw-gap-5">
                                        <i class="fa-solid fa-chalkboard-user sims-icon-3xl tw-text-[#7379d3]"></i>
                                        <div class="tw-flex tw-flex-col">
                                            <div class="sims-heading-xl tw-font-black">{{ $kelas }}</div>
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
                                            <div class="sims-heading-xl tw-font-black">{{ $jurusan }}</div>
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


                <!-- Chart -->
                <div class="sims-card-1">
                    <div class="tw-flex tw-flex-col tw-mx-5">
                        <div></div>
                        <select
                            class="div-toggle sims-heading-1 sims-heading-lg-black tw-lock tw-px-4 tw-w-full tw-bg-transparent tw-border-0 tw-border-gray-200 tw-appearance-none dark:tw-text-gray-400 dark:tw-border-gray-700 focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-200 tw-peer"
                            data-target=".my-info-1">
                            <option value="chart2" data-show=".chart2">Jumlah Siswa Mutasi & Tidak Naik</option>
                            <option value="chart1" data-show=".chart1">Grafik Jumlah Siswa</option>
                        </select>

                        <div class="my-info-1">
                            <div class="chart2" style="height: 300px">
                                <canvas id="chart" class="tw-mt-4"></canvas>
                            </div>
                            <div class="chart1 hide" style="height: 300px">
                                <canvas id="myChart" class="tw-mt-4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Column 1 -->


            <!-- Column 2 -->
            <div class="tw-flex tw-flex-col tw-w-1/2">

                <!-- Row 1 -->
                <div class="sims-card-1 tw-px-10">

                    <!-- Latest Activity Card -->
                    <div class="sims-card-1-noshadow">
                        <div class="tw-flex md:tw-flex-col tw-justify-around">
                            <div class="tw-flex tw-gap-10 tw-mx-10">
                                <i class="fa-solid fa-clock-rotate-left sims-icon-5xl"></i>
                                <div class="tw-flex tw-flex-col">
                                    <div class="sims-heading-lg-black">Aktivitas terakhir anda</div>

                                    <!-- If user have a history, it will display the latest one. -->
                                    @if ($userHistory->count > 0)
                                        <?php
                                        $latestHistory = str_replace([auth()->user()->nama], '', $userHistory->rows[0]->activityDesc);// remove user name from activityDesc
                                        ?>
                                        <div class="sims-text-regular-md">
                                            {{ ucwords($latestHistory) }}
                                        </div>
                                        <div class="sims-text-gray-sm">
                                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($userHistory->rows[0]->createdAt))->diffForHumans() }}
                                        </div>
                                    @else
                                        <div class="sims-text-regular-md">Anda belum memiliki riwayat aktifitas.</div>
                                    @endif
                                </div>
                            </div>
                            <a href="/history/my"
                                class="tw-border-sims-new-500 tw-mx-auto tw-border tw-text-sm tw-text-center tw-whitespace-nowrap tw-h-fit tw-my-auto tw-mr-5 tw-px-3 tw-py-3 tw-rounded-lg tw-text-sims-new-500 hover:tw-text-white hover:tw-bg-sims-new-500 tw-transition-all">
                                Lihat Semua Histori
                            </a>
                        </div>
                    </div>

                    <!-- Quick Access Card -->
                    <div class="tw-flex">
                        @if(auth()->user()->role == 4)
                            @if($kelas_walikelas != '')
                                <a href="/data-induk-siswa/{{ $kelas_walikelas->JurusanId }}/{{ $kelas_walikelas->kelas }}?rombel={{ $kelas_walikelas->rombel }}&page=1&perPage=10" class="sims-card-1-noshadow sims-text-regular-sm tw-text-center tw-font-normal tw-w-full tw-h-40 tw-px-3 tw-mx-2 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all">
                                    <div class="tw-flex tw-flex-col tw-gap-3">
                                        <i class="fa-regular fa-book-open-cover tw-text-3xl tw-m-auto"></i>
                                        Data Induk Siswa ({{$kelas_walikelas->id}})
                                    </div> 
                                </a>
                            @endif
                        @else
                            <a href="/data-induk-siswa?perPage=10&page=1" class="sims-card-1-noshadow sims-text-regular-sm tw-text-center tw-font-normal tw-w-full tw-h-40 tw-px-3 tw-mx-2 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all">
                                <div class="tw-flex tw-flex-col tw-gap-3">
                                    <i class="fa-regular fa-book-open-cover tw-text-3xl tw-m-auto"></i>
                                    Data Induk Siswa (Umum)
                                </div>
                            </a>
                        @endif
                        @cannot('wali-kelas')
                        <a href="/rekap-jumlah-siswa"
                            class="sims-card-1-noshadow sims-text-regular-sm tw-text-center tw-font-normal tw-w-full tw-h-40 tw-px-3 tw-mx-2 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all">
                            <div class="tw-flex tw-flex-col tw-gap-3">
                                <i class="fa-solid fa-graduation-cap tw-text-3xl tw-m-auto"></i>
                                Rekap Jumlah Siswa
                            </div>
                        </a>
                        @endcannot
                        @can('manage-alumni')
                        <a href="/siswa-keluar"
                            class="sims-card-1-noshadow sims-text-regular-sm tw-text-center tw-font-normal tw-w-full tw-h-40 tw-px-3 tw-mx-2 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all">
                            <div class="tw-flex tw-flex-col tw-gap-3">
                                <i class="fa-solid fa-user-group tw-text-3xl tw-m-auto"></i>
                                Data Perpindahan
                            </div>
                        </a>
                        @endcan
                        <a href="/help"
                            class="sims-card-1-noshadow sims-text-regular-sm tw-text-center tw-font-normal tw-w-full tw-h-40 tw-px-3 tw-mx-2 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all">
                            <div class="tw-flex tw-flex-col tw-gap-3">
                                <i class="fa-solid fa-question tw-text-3xl tw-m-auto"></i>
                                Pusat Bantuan
                            </div>
                        </a>
                    </div>

                </div>

                <!-- Row 2 -->

                <!-- Persebaran Murid -->
                <div class="sims-card-1 tw-h-full">
                    <div class="tw-flex tw-justify-center">
                        <div class="tw-flex tw-flex-col">
                            <div class="sims-heading-xl-black tw-mb-5 tw-flex tw-justify-center">Persebaran Murid</div>
                            <div class="tw-flex tw-justify-center tw-gap-6 tw-flex-wrap tw-px-10">
                                @foreach ($allJurusan as $j)
                                    @if (collect($siswaJurusan)->pluck('kelas')->where('JurusanId', $j->id)->count() > 0)
                                        <div class="tw-flex tw-flex-col tw-justify-center tw-text-center">
                                            <div class="sims-heading-md">
                                                {{ collect($siswaJurusan)->pluck('kelas')->where('JurusanId', $j->id)->count() }}
                                            </div>
                                            <div class="sims-text-gray-sm tw-font-normal">{{ $j->nama }}</div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Column 2-->


        </div>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('chart');
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Masuk', 'Keluar', 'Tidak Naik'],
                    datasets: [{
                        label: 'Jumlah ',
                        data: [{{ $siswaMasuk }}, {{ $siswaKeluar }}, {{ $siswaTdkNaik }},],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(207, 209, 207, 0.5)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(207, 209, 207, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scale: {
                        ticks: {
                            precision: 0
                        }
                    }
                },
            });
        </script>

        <script>
            /* SWIPER JS */
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

            $(document).on('change', '.div-toggle', function() {
                var target = $(this).data('target');
                var show = $("option:selected", this).data('show');
                $(target).children().addClass('hide');
                $(show).removeClass('hide');
            });
            $(document).ready(function() {
                $('.div-toggle').trigger('change');
            });


            /* CHART JS */
            const data = {
                datasets: [{
                    data: [{{ $jumlahSiswaX }}, {{ $jumlahSiswaXI }}, {{ $jumlahSiswaXII }}],
                    backgroundColor: ['rgba(144,194,194,1)', 'rgba(255,163,134,1)', 'rgba(149,187,232,1)'],
                    hoverBackgroundColor: ['rgba(146, 212, 212,1)', 'rgba(255, 177, 153,1)', 'rgba(181, 215, 255)'],
                    hoverBorderColor: ['rgba(146, 212, 212,1)', 'rgba(255, 177, 153,1)', 'rgba(181, 215, 255)'],
                    hoverOffset: 2
                }],

                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                    'Kelas X',
                    'Kelas XI',
                    'Kelas XII'
                ]
            };

            const config = {
                type: 'pie',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            bottom: 10,
                            top: 20
                        }
                    },
                    elements: {
                        arc: {
                            borderWidth: 4.5, // <-- Set this to derired value
                            borderColor: '#ffffff'
                        }
                    }
                }
            };

            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        </script>
    @endsection

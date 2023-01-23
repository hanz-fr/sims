@extends('layouts.main-new')

@section('content')
    {{-- SWIPER CSS --}}
    <style>
        .hide {
            display: none;
        }

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

    <div class="tw-flex tw-flex-col tw-my-10 tw-mx-10">

        <!-- Welcome Banner -->
        <div class="sims-card-1 tw-py-8">
            <div class="tw-flex tw-justify-between tw-mx-16">
                <div class="tw-flex tw-flex-col tw-gap-1">
                    <div class="lg:sims-heading-3xl sm:sims-heading-xl">{{ $message }}, <div
                            class="tw-inline tw-font-black">
                            {{ auth()->user()->nama }}</div>
                    </div>
                    <div class="lg:sims-text-gray-md sm:sims-text-gray-xs">Apa yang akan anda lakukan hari ini?</div>
                </div>
            </div>
        </div>

        <!-- spacing -->
        <div class="tw-my-2"></div>

        <!-- Row 1 -->
        <div class="tw-flex tw-h-fit tw-gap-5">

            <!-- Chart - Column 1 -->
            <div class="sims-card-1 tw-h-fit tw-w-1/2 tw-my-0">
                <div class="tw-flex tw-flex-col tw-py-8 tw-mx-5">

                    <select
                        class="div-toggle sims-heading-1 sims-heading-lg-black tw-lock tw-px-4 tw-w-full tw-bg-transparent tw-border-0 tw-border-gray-200 tw-appearance-none dark:tw-text-gray-400 dark:tw-border-gray-700 focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-200 tw-peer"
                        data-target=".my-info-1">
                        <option value="chart4" data-show=".chart4">Aktivitas</option>
                        <option value="chart2" data-show=".chart2">Jumlah Siswa Mutasi & Alumni</option>
                        <option value="chart1" data-show=".chart1">Grafik Jumlah Siswa</option>
                    </select>

                    <div class="my-info-1">
                        <div class="chart4" style="height: 300px">
                            <canvas id="chart4" class="tw-mt-4"></canvas>
                        </div>
                        <div class="chart2 hide" style="height: 300px">
                            <canvas id="chart1" class="tw-mt-4"></canvas>
                        </div>
                        <div class="chart1 hide" style="height: 300px">
                            <canvas id="chart2" class="tw-mt-4"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Graphics - Column 2 -->
            <div class="tw-flex tw-flex-col tw-w-1/3">
                <div class="sims-heading-md-black tw-text-center">User Graphics</div>

                <div style="height: 280px">
                    <canvas id="chart3" class="tw-mt-4"></canvas>
                </div>

                <!-- spacing -->
                <div class="tw-my-2"></div>

                <div class="tw-grid tw-grid-cols-2 tw-gap-x-5 tw-justify-evenly">
                    <div
                        class="sims-card-1-noshadow tw-w-full tw-py-3 tw-px-7 tw-h-fit tw-border-l-4 hover:tw-shadow-md tw-transition-all tw-duration-200 tw-border-l-sims-new-500">
                        <div class="tw-flex tw-gap-2">
                            <i class="fa-solid fa-user sims-icon-3xl"></i>
                            <div class="tw flex tw-flex-col">
                                <div class="sims-heading-sm">12</div>
                                <div class="sims-text-black-sm tw-font-normal">Tata Usaha</div>
                            </div>
                        </div>
                    </div>

                    <div class="sims-card-1-noshadow tw-w-full tw-py-3 tw-px-7 tw-h-fit tw-border-l-4 hover:tw-shadow-md tw-transition-all tw-duration-200 tw-border-l-[#FF869C]">
                        <div class="tw-flex tw-gap-2">
                            <i class="fa-solid fa-user sims-icon-3xl tw-text-[#FF869C]"></i>
                            <div class="tw flex tw-flex-col">
                                <div class="sims-heading-sm tw-text-[#FF869C]">12</div>
                                <div class="sims-text-black-sm tw-font-normal">Kesiswaan</div>
                            </div>
                        </div>
                    </div>

                    <div class="sims-card-1-noshadow tw-w-full tw-py-3 tw-px-7 tw-h-fit tw-border-l-4 hover:tw-shadow-md tw-transition-all tw-duration-200 tw-border-l-[#FFA386]">
                        <div class="tw-flex tw-gap-2">
                            <i class="fa-solid fa-user sims-icon-3xl tw-text-[#FFA386]"></i>
                            <div class="tw flex tw-flex-col">
                                <div class="sims-heading-sm tw-text-[#FFA386]">12</div>
                                <div class="sims-text-black-sm tw-font-normal">Wali Kelas</div>
                            </div>
                        </div>
                    </div>

                    <div class="sims-card-1-noshadow tw-w-full tw-py-3 tw-px-7 tw-h-fit tw-border-l-4 hover:tw-shadow-md tw-transition-all tw-duration-200 tw-border-l-[#B4B8BC]">
                        <div class="tw-flex tw-gap-2">
                            <i class="fa-solid fa-user sims-icon-3xl tw-text-[#B4B8BC]"></i>
                            <div class="tw flex tw-flex-col">
                                <div class="sims-heading-sm tw-text-[#B4B8BC]">12</div>
                                <div class="sims-text-black-sm tw-font-normal">Kurikulum</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- User List - Column 3 -->
            <div class="sims-card-1 tw-w-1/4 tw-my-0 tw-h-[500px]">
                <div class="tw-flex tw-flex-col tw-h-1/2">

                    <!-- heading -->
                    <div class="tw-flex tw-justify-around">
                        <div class="sims-heading-xl-black">User List</div>
                        <button type="button" class="tw-bg-[#F1F1EF] hover:tw-bg-[#ebebeb] tw-px-3 tw-py-1 tw-rounded-lg sims-heading-sm-black tw-text-[#979797]">Show All</button>
                    </div>

                    <!-- spacing -->
                    <div class="tw-my-2"></div>

                    <!-- content -->
                    {{-- SHOW 5 USERS ONLY --}}
                    <div class="tw-flex tw-flex-col tw-gap-3 tw-mx-5">

                        <button class="tw-flex tw-justify-between sims-card-2">
                            <div class="tw-flex tw-gap-3">
                                <i class="fa-solid fa-circle-user sims-icon-3xl"></i>
                                <div class="tw-flex tw-flex-col tw-text-start">
                                    <div class="sims-heading-sm tw-truncate sm:tw-w-24 lg:tw-w-32">John Doe</div>
                                    <div class="sims-text-gray-xs">Tata Usaha</div>
                                </div>
                            </div>
                            <a href="#" class="tw-text-[#979797] tw-my-auto tw-h-fit">
                                <i class="fa-solid fa-pen-to-square hover:tw-text-[#FBB845] tw-transition-all"></i>
                            </a>
                        </button>

                        <button class="tw-flex tw-justify-between sims-card-2">
                            <div class="tw-flex tw-gap-3">
                                <i class="fa-solid fa-circle-user sims-icon-3xl tw-text-[#FFA386]"></i>
                                <div class="tw-flex tw-flex-col tw-text-start">
                                    <div class="sims-heading-sm tw-truncate sm:tw-w-24 lg:tw-w-32 tw-text-[#FFA386]">Simeon
                                        Gabe</div>
                                    <div class="sims-text-gray-xs">Wali Kelas</div>
                                </div>
                            </div>
                            <a href="#" class="tw-text-[#979797] tw-my-auto tw-h-fit">
                                <i class="fa-solid fa-pen-to-square hover:tw-text-[#FBB845] tw-transition-all"></i>
                            </a>
                        </button>

                        <button class="tw-flex tw-justify-between sims-card-2">
                            <div class="tw-flex tw-gap-3">
                                <i class="fa-solid fa-circle-user sims-icon-3xl tw-text-[#B4B8BC]"></i>
                                <div class="tw-flex tw-flex-col tw-text-start">
                                    <div class="sims-heading-sm tw-truncate sm:tw-w-24 lg:tw-w-32 tw-text-[#B4B8BC]">
                                        Asterisk</div>
                                    <div class="sims-text-gray-xs">Kurikulum</div>
                                </div>
                            </div>
                            <a href="#" class="tw-text-[#979797] tw-my-auto tw-h-fit">
                                <i class="fa-solid fa-pen-to-square hover:tw-text-[#FBB845] tw-transition-all"></i>
                            </a>
                        </button>

                        <button class="tw-flex tw-justify-between sims-card-2">
                            <div class="tw-flex tw-gap-3">
                                <i class="fa-solid fa-circle-user sims-icon-3xl tw-text-[#FF869C]"></i>
                                <div class="tw-flex tw-flex-col tw-text-start">
                                    <div class="sims-heading-sm tw-truncate sm:tw-w-24 lg:tw-w-32 tw-text-[#FF869C]">Ibnu
                                        Johan bin Asep lorem ipsum dolor sit amet </div>
                                    <div class="sims-text-gray-xs">Kesiswaan</div>
                                </div>
                            </div>
                            <a href="#" class="tw-text-[#979797] tw-my-auto tw-h-fit">
                                <i class="fa-solid fa-pen-to-square hover:tw-text-[#FBB845] tw-transition-all"></i>
                            </a>
                        </button>

                        <button class="tw-flex tw-justify-between sims-card-2">
                            <div class="tw-flex tw-gap-3">
                                <i class="fa-solid fa-circle-user sims-icon-3xl"></i>
                                <div class="tw-flex tw-flex-col tw-text-start">
                                    <div class="sims-heading-sm tw-truncate sm:tw-w-24 lg:tw-w-32">John Doe</div>
                                    <div class="sims-text-gray-xs">Tata Usaha</div>
                                </div>
                            </div>
                            <a href="#" class="tw-text-[#979797] tw-my-auto tw-h-fit">
                                <i class="fa-solid fa-pen-to-square hover:tw-text-[#FBB845] tw-transition-all"></i>
                            </a>
                        </button>
                    </div>
                </div>

            </div>
        </div>


        <!-- spacing -->
        <div class="tw-my-5"></div>


        <!-- Row 2 -->
        <div class="tw-flex tw-h-fit tw-gap-5">

            <!-- Overview - Column 1 -->
            <div class="tw-flex tw-flex-col">
                <div class="sims-heading-lg-black">Overview</div>

                <!-- spacing -->
                <div class="tw-my-2"></div>

                <div class="tw-w-fit">
                    <div class="slide-container swiper tw-my-auto">
                        <div class="slide-content">
                            <div class="card-wrapper swiper-wrapper">

                                <!-- card 1 -->
                                <div class="sims-card-1 tw-px-5 swiper-slide">
                                    <div class="tw-flex tw-flex-col">

                                        <!-- heading -->
                                        <div class="tw-flex tw-gap-10 tw-justify-center">
                                            <div class="tw-flex tw-flex-col">
                                                <i class="fa-solid fa-shapes sims-icon-3xl tw-mx-auto"></i>
                                                <div class="sims-heading-md-black">Siswa</div>
                                            </div>

                                            <div class="tw-flex tw-gap-2 tw-my-auto">
                                                <div class="sims-text-black-xl tw-text-3xl tw-my-auto">5400</div>
                                                <div class="sims-heading-sm-black tw-font-normal">total<br>data</div>
                                            </div>
                                        </div>

                                        <!-- spacing -->
                                        <div class="tw-my-10"></div>

                                        <!-- content -->
                                        <div class="tw-flex tw-flex-col tw-mx-8 tw-gap-3">
                                            <div class="tw-flex tw-justify-between">
                                                <div class="sims-text-gray-sm tw-font-normal">Latest data created</div>
                                                <div class="sims-text-gray-sm tw-font-bold">2 days ago</div>
                                            </div>
                                            <div class="tw-flex tw-justify-between">
                                                <div class="sims-text-gray-sm tw-font-normal">Latest update</div>
                                                <div class="sims-text-gray-sm tw-font-bold">2 days ago</div>
                                            </div>
                                            <div class="tw-flex tw-justify-between">
                                                <div class="sims-text-gray-sm tw-font-normal">Recently created data</div>
                                                <div class="sims-text-gray-sm tw-font-bold tw-truncate tw-w-1/3">Lorem ipsum dolor sit amet consectetur</div>
                                            </div>
                                        </div>

                                        <!-- spacing -->
                                        <div class="tw-my-3"></div>

                                        <!-- button -->
                                        <button type="button" class="tw-border-sims-new-500 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all tw-border sims-text-regular-sm tw-text-center tw-rounded-lg tw-py-2">
                                            Manage
                                        </button>
                                    </div>
                                </div>

                                <!-- card 2 -->
                                <div class="sims-card-1 tw-px-5 swiper-slide">
                                    <div class="tw-flex tw-flex-col">

                                        <!-- heading -->
                                        <div class="tw-flex tw-gap-10 tw-justify-center">
                                            <div class="tw-flex tw-flex-col">
                                                <i class="fa-solid fa-shapes sims-icon-3xl tw-mx-auto"></i>
                                                <div class="sims-heading-md-black">Jurusan</div>
                                            </div>

                                            <div class="tw-flex tw-gap-2 tw-my-auto">
                                                <div class="sims-text-black-xl tw-text-3xl tw-my-auto">40</div>
                                                <div class="sims-heading-sm-black tw-font-normal">total<br>data</div>
                                            </div>
                                        </div>

                                        <!-- spacing -->
                                        <div class="tw-my-10"></div>

                                        <!-- content -->
                                        <div class="tw-flex tw-flex-col tw-mx-8 tw-gap-3">
                                            <div class="tw-flex tw-justify-between">
                                                <div class="sims-text-gray-sm tw-font-normal">Latest data created</div>
                                                <div class="sims-text-gray-sm tw-font-bold">2 days ago</div>
                                            </div>
                                            <div class="tw-flex tw-justify-between">
                                                <div class="sims-text-gray-sm tw-font-normal">Latest update</div>
                                                <div class="sims-text-gray-sm tw-font-bold">2 days ago</div>
                                            </div>
                                            <div class="tw-flex tw-justify-between">
                                                <div class="sims-text-gray-sm tw-font-normal">Recently created data</div>
                                                <div class="sims-text-gray-sm tw-font-bold tw-truncate tw-w-1/3">Lorem ipsum dolor sit amet consectetur</div>
                                            </div>
                                        </div>

                                        <!-- spacing -->
                                        <div class="tw-my-3"></div>

                                        <!-- button -->
                                        <button type="button" class="tw-border-sims-new-500 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all tw-border sims-text-regular-sm tw-text-center tw-rounded-lg tw-py-2">
                                            Manage
                                        </button>
                                    </div>
                                </div>

                                <!-- card 3 -->
                                <div class="sims-card-1 tw-px-5 swiper-slide">
                                    <div class="tw-flex tw-flex-col">

                                        <!-- heading -->
                                        <div class="tw-flex tw-gap-10 tw-justify-center">
                                            <div class="tw-flex tw-flex-col">
                                                <i class="fa-solid fa-shapes sims-icon-3xl tw-mx-auto"></i>
                                                <div class="sims-heading-md-black">Mata Pelajaran</div>
                                            </div>

                                            <div class="tw-flex tw-gap-2 tw-my-auto">
                                                <div class="sims-text-black-xl tw-text-3xl tw-my-auto">55</div>
                                                <div class="sims-heading-sm-black tw-font-normal">total<br>data</div>
                                            </div>
                                        </div>

                                        <!-- spacing -->
                                        <div class="tw-my-10"></div>

                                        <!-- content -->
                                        <div class="tw-flex tw-flex-col tw-mx-8 tw-gap-2">
                                            <div class="tw-flex tw-justify-between">
                                                <div class="sims-text-gray-sm tw-font-normal">Latest data created</div>
                                                <div class="sims-text-gray-sm tw-font-bold">2 days ago</div>
                                            </div>
                                            <div class="tw-flex tw-justify-between">
                                                <div class="sims-text-gray-sm tw-font-normal">Latest update</div>
                                                <div class="sims-text-gray-sm tw-font-bold">2 days ago</div>
                                            </div>
                                            <div class="tw-flex tw-justify-between">
                                                <div class="sims-text-gray-sm tw-font-normal">Recently created data</div>
                                                <div class="sims-text-gray-sm tw-font-bold tw-truncate tw-w-1/3">Lorem ipsum dolor sit amet consectetur</div>
                                            </div>
                                        </div>

                                        <!-- spacing -->
                                        <div class="tw-my-3"></div>

                                        <!-- button -->
                                        <button type="button" class="tw-border-sims-new-500 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all tw-border sims-text-regular-sm tw-text-center tw-rounded-lg tw-py-2">
                                            Manage
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="swiper-button-next swiper-navBtn"></div>
                        <div class="swiper-button-prev swiper-navBtn"></div>

                    </div>
                </div>
            </div>


            <!-- Latest Activity - Column 2 -->
            <div class="sims-card-1 tw-ml-5 tw-my-auto tw-h-[500px]">

                <!-- heading -->
                <div class="tw-flex tw-justify-between tw-mx-10">
                    <div class="sims-heading-lg-black">Latest Activity</div>
                    <button type="button" class="tw-bg-[#F1F1EF] hover:tw-bg-[#ebebeb] tw-px-3 tw-py-1 tw-rounded-lg sims-heading-sm-black tw-text-[#979797]">Show All</button>
                </div>

                <!-- spacing -->
                <div class="tw-my-8"></div>

                <!-- content -->
                <!-- 01 -->
                <div class="tw-flex tw-justify-between tw-mx-10">
                    <div class="tw-flex tw-gap-3">
                        <img src="{{ URL::asset('assets/img/activityline.png') }}" alt="..." class="tw-h-20">

                        <div class="tw-flex tw-flex-col tw-my-auto">
                            <div class="sims-heading-md-black">Ibnu Asep bin Budi</div>
                            <div class="sims-text-regular-sm tw-font-normal tw-truncate tw-w-72">Create Siswa dengan NIS : 200912381239</div>
                        </div>

                    </div>
                    <div class="sims-text-gray-sm tw-font-normal tw-my-auto">
                        2 Menit yang lalu
                    </div>
                </div>

                <!-- 02 -->
                <div class="tw-flex tw-justify-between tw-mx-10">
                    <div class="tw-flex tw-gap-3">
                        <img src="{{ URL::asset('assets/img/activityline2.png') }}" alt="..." class="tw-h-20">

                        <div class="tw-flex tw-flex-col tw-my-auto">
                            <div class="sims-heading-md-black">Ibnu Asep bin Budi</div>
                            <div class="sims-text-regular-sm tw-font-normal tw-truncate tw-w-72">Update Siswa dengan NIS : 200912381239</div>
                        </div>

                    </div>
                    <div class="sims-text-gray-sm tw-font-normal tw-my-auto">
                        5 Menit yang lalu
                    </div>
                </div>

                <!-- 03 -->
                <div class="tw-flex tw-justify-between tw-mx-10">
                    <div class="tw-flex tw-gap-3">
                        <img src="{{ URL::asset('assets/img/activityline2.png') }}" alt="..." class="tw-h-20">

                        <div class="tw-flex tw-flex-col tw-my-auto">
                            <div class="sims-heading-md-black">Ibnu Asep bin Budi</div>
                            <div class="sims-text-regular-sm tw-font-normal tw-truncate tw-w-72">Export Data Induk dengan tipe file PDF</div>
                        </div>

                    </div>
                    <div class="sims-text-gray-sm tw-font-normal tw-my-auto">
                        8 Menit yang lalu
                    </div>
                </div>

                <!-- 04 -->
                <div class="tw-flex tw-justify-between tw-mx-10">
                    <div class="tw-flex tw-gap-3">
                        <img src="{{ URL::asset('assets/img/activityline2.png') }}" alt="..." class="tw-h-20">

                        <div class="tw-flex tw-flex-col tw-my-auto">
                            <div class="sims-heading-md-black">Ibnu Asep bin Budi</div>
                            <div class="sims-text-regular-sm tw-font-normal tw-truncate tw-w-72">Export Data Induk dengan tipe file Excel</div>
                        </div>

                    </div>
                    <div class="sims-text-gray-sm tw-font-normal tw-my-auto">
                        10 Menit yang lalu
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx1 = document.getElementById('chart1');
        const chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Masuk', 'Keluar', 'Tidak Naik', 'Alumni'],
                datasets: [{
                    label: 'Jumlah ',
                    data: [{{ $siswaMasuk }}, {{ $siswaKeluar }}, {{ $siswaTdkNaik }},
                        {{ $alumni }}
                    ],
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

        const ctx3 = document.getElementById('chart3');
        const chart3 = new Chart(ctx3, {
            type: 'doughnut',
            data: {
                labels: [
                    'Tata Usaha',
                    'Kesiswaan',
                    'Kurikulum',
                    'Wali Kelas',
                ],
                datasets: [{
                    label: 'Jumlah',
                    data: [8, 3, 2, 10],
                    backgroundColor: [
                        'rgb(56, 148, 163)',
                        'rgb(255, 134, 156)',
                        'rgb(255, 163, 134)',
                        'rgb(180, 184, 188)',
                    ],
                    hoverOffset: 4
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

        const ctx4 = document.getElementById('chart4');
        new Chart(ctx4, {
          type: 'line',
          data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
              label: 'Jumlah Aktivitas',
              borderColor: '#3894a3',
              backgroundColor: '#53b0bd',
              data: [12, 19, 3, 5, 2, 3, 8, 17, 9, 15, 12, 10],
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

    <!-- Swiper JS -->
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
                    slidesPerView: 2,
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

        const chart2 = new Chart(
            document.getElementById('chart2'),
            config
        );
    </script>
@endsection
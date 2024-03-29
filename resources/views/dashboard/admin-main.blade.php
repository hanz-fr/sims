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
                <div class="tw-flex tw-flex-col tw-mx-5">

                    <select
                        class="div-toggle sims-heading-1 sims-heading-lg-black tw-lock tw-px-4 tw-w-full tw-bg-transparent tw-border-0 tw-border-gray-200 tw-appearance-none dark:tw-text-gray-400 dark:tw-border-gray-700 focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-200 tw-peer"
                        data-target=".my-info-1">
                        <option value="chart4" data-show=".chart4">Aktivitas</option>
                        <option value="chart2" data-show=".chart2">Jumlah Siswa Mutasi & Tidak Naik</option>
                        <option value="chart1" data-show=".chart1">Grafik Jumlah Siswa</option>
                    </select>

                    <div class="my-info-1">
                        <div class="chart4" style="position: relative; height:45vh;">
                            <canvas id="chart4" class="tw-mt-4"></canvas>
                        </div>
                        <div class="chart2 hide" style="position: relative; height:45vh;">
                            <canvas id="chart1" class="tw-mt-4"></canvas>
                        </div>
                        <div class="chart1 hide" style="position: relative; height:45vh;">
                            <canvas id="chart2" class="tw-mt-4"></canvas>
                        </div>
                    </div>

                    <div data-show=".chart4" class="sims-heading-sm tw-flex tw-justify-center tw-mt-5">Tahun
                        {{ $current_year }}</div>
                </div>
            </div>

            <!-- User Graphics - Column 2 -->
            <div class="tw-flex tw-flex-col tw-w-1/4">
                <div class="sims-heading-md-black tw-text-center">Grafik Jumlah User</div>

                <div style="height: 35vh">
                    <canvas id="chart3" class="tw-mt-8"></canvas>
                </div>

                <!-- spacing -->
                <div class="tw-my-2"></div>

                <div class="tw-grid tw-grid-cols-2 tw-gap-x-5 tw-gap-y-5 tw-pt-12 tw-justify-evenly">
                    <div
                        class="sims-card-1-noshadow tw-w-full tw-py-3 tw-px-7 tw-h-fit tw-border-l-4 hover:tw-shadow-md tw-transition-all tw-duration-200 tw-border-l-sims-new-500">
                        <div class="tw-flex tw-gap-2">
                            <i class="fa-solid fa-user sims-icon-3xl"></i>
                            <div class="tw flex tw-flex-col">
                                <div class="sims-heading-sm">{{ $tatausaha }}</div>
                                <div class="sims-text-black-sm tw-font-normal">Tata Usaha</div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="sims-card-1-noshadow tw-w-full tw-py-3 tw-px-7 tw-h-fit tw-border-l-4 hover:tw-shadow-md tw-transition-all tw-duration-200 tw-border-l-salmon-400">
                        <div class="tw-flex tw-gap-2">
                            <i class="fa-solid fa-user sims-icon-3xl tw-text-salmon-400"></i>
                            <div class="tw flex tw-flex-col">
                                <div class="sims-heading-sm tw-text-salmon-400">{{ $kesiswaan }}</div>
                                <div class="sims-text-black-sm tw-font-normal">Kesiswaan</div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="sims-card-1-noshadow tw-w-full tw-py-3 tw-px-7 tw-h-fit tw-border-l-4 hover:tw-shadow-md tw-transition-all tw-duration-200 tw-border-l-oren-400">
                        <div class="tw-flex tw-gap-2">
                            <i class="fa-solid fa-user sims-icon-3xl tw-text-oren-400"></i>
                            <div class="tw flex tw-flex-col">
                                <div class="sims-heading-sm tw-text-oren-400">{{ $walikelas }}</div>
                                <div class="sims-text-black-sm tw-font-normal">Wali Kelas</div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="sims-card-1-noshadow tw-w-full tw-py-3 tw-px-7 tw-h-fit tw-border-l-4 hover:tw-shadow-md tw-transition-all tw-duration-200 tw-border-l-[#B4B8BC]">
                        <div class="tw-flex tw-gap-2">
                            <i class="fa-solid fa-user sims-icon-3xl tw-text-[#B4B8BC]"></i>
                            <div class="tw flex tw-flex-col">
                                <div class="sims-heading-sm tw-text-[#B4B8BC]">{{ $kurikulum }}</div>
                                <div class="sims-text-black-sm tw-font-normal">Kurikulum</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- User List - Column 3 -->
            <div class="sims-card-1 tw-w-1/4 tw-my-0 tw-h-fit">
                <div class="tw-flex tw-flex-col tw-h-full">

                    <!-- heading -->
                    <div class="tw-flex tw-justify-between tw-ml-7 tw-mr-7">
                        <div class="sims-heading-xl-black">User List</div>
                        <a href="/admin/account"
                            class="tw-bg-[#F1F1EF] hover:tw-bg-[#ebebeb] hover:tw-text-gray-600 tw-px-3 tw-py-1 tw-rounded-lg sims-heading-sm-black tw-text-[#979797]">Show
                            All</a>
                    </div>

                    <!-- spacing -->
                    <div class="tw-my-2"></div>

                    <!-- content -->
                    {{-- SHOW 5 USERS ONLY --}}
                    <div
                        class="tw-flex tw-flex-col tw-gap-3 tw-pr-3 tw-mx-5 tw-overflow-y-scroll tw-h-[50vh] tw-scrollbar-thumb-gray-400 tw-scrollbar-thumb-rounded-lg tw-scrollbar-thin tw-scrollbar-track-gray-100">

                        @foreach ($users as $u)
                            <form action="/admin/account/{{ $u->id }}">
                                <button type="submit" class="tw-flex tw-justify-between sims-card-2">
                                    <div class="tw-flex tw-gap-3">
                                        @if ($u->role == 1)
                                            <i class="fa-solid fa-circle-user sims-icon-3xl"></i>
                                        @elseif ($u->role == 2)
                                            <i class="fa-solid fa-circle-user tw-text-salmon-400 sims-icon-3xl"></i>
                                        @elseif ($u->role == 3)
                                            <i class="fa-solid fa-circle-user tw-text-[#979797]  sims-icon-3xl"></i>
                                        @elseif ($u->role == 4)
                                            <i class="fa-solid fa-circle-user tw-text-oren-400 sims-icon-3xl"></i>
                                        @else
                                            <i class="fa-solid fa-circle-user sims-icon-3xl"></i>
                                        @endif
                                        <div class="tw-flex tw-flex-col tw-text-start">
                                            @if ($u->role == 1)
                                                <div class="sims-heading-sm tw-truncate sm:tw-w-24 lg:tw-w-32">
                                                    {{ $u->nama }}</div>
                                            @elseif ($u->role == 2)
                                                <div
                                                    class="tw-text-salmon-400 sims-heading-sm tw-truncate sm:tw-w-24 lg:tw-w-32">
                                                    {{ $u->nama }}</div>
                                            @elseif ($u->role == 3)
                                                <div
                                                    class=" tw-text-[#979797] sims-heading-sm tw-truncate sm:tw-w-24 lg:tw-w-32">
                                                    {{ $u->nama }}</div>
                                            @elseif ($u->role == 4)
                                                <div
                                                    class="tw-text-oren-400 sims-heading-sm tw-truncate sm:tw-w-24 lg:tw-w-32">
                                                    {{ $u->nama }}</div>
                                            @else
                                                <div class="sims-heading-sm tw-truncate sm:tw-w-24 lg:tw-w-32">
                                                    {{ $u->nama }}</div>
                                            @endif
                                            <div class="sims-text-gray-xs tw-flex tw-items-center">
                                                @if ($u->role == 1)
                                                    Tata Usaha
                                                @endif
                                                @if ($u->role == 2)
                                                    Kesiswaan
                                                @endif
                                                @if ($u->role == 3)
                                                    Kurikulum
                                                @endif
                                                @if ($u->role == 4)
                                                    Wali Kelas
                                                @endif
                                                @if ($u->is_admin == 1)
                                                    <i title="User ini merupakan Admin"
                                                        class="fa-solid fa-shield-check tw-text-sims-500 tw-text-sm tw-ml-2"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    {{-- TEMPORARY COMMENT / TO BE FIXED LATER --}}
                                    {{-- <a href="/admin/account/{{ $u->id }}/edit" class="tw-text-[#979797] tw-my-auto tw-h-fit tw-z-50">
                                    <i class="fa-solid fa-pen-to-square hover:tw-text-[#FBB845] tw-transition-all"></i>
                                </a> --}}
                                </button>
                            </form>
                        @endforeach

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
                <div class="tw-text-center sims-heading-xl-black tw-pt-10"><i class="fa-solid fa-database tw-text-sims-new-500 tw-mr-2"></i>Manajamen Data</div>

                <!-- spacing -->
                <div class="tw-my-2"></div>

                <div class="tw-w-fit tw-h-fit tw-my-auto">
                    <div class="slide-container swiper tw-my-auto">
                        <div class="slide-content">
                            <div class="card-wrapper swiper-wrapper">

                                <!-- card 1 -->
                                <div class="sims-card-1 tw-px-5 swiper-slide">
                                    <div class="tw-flex tw-flex-col">

                                        <!-- heading -->
                                        <div class="tw-flex tw-gap-5 tw-justify-center">
                                            <div class="tw-flex tw-flex-col">
                                                <i class="fa-solid fa-user sims-icon-3xl tw-mx-auto"></i>
                                                <div class="sims-heading-sm-black tw-truncate">Siswa</div>
                                            </div>

                                            <div class="tw-flex tw-gap-2 tw-my-auto">
                                                <div class="sims-text-black-xl tw-text-3xl tw-my-auto">{{ $siswa }}
                                                </div>
                                                <div class="sims-heading-sm-black tw-font-normal">total<br>data</div>
                                            </div>
                                        </div>

                                        <!-- spacing -->
                                        <div class="tw-my-10"></div>

                                        <!-- spacing -->
                                        <div class="tw-my-3"></div>

                                        <!-- button -->
                                        <a href="/data-induk-siswa?page=1&perPage=10"
                                            class="tw-border-sims-new-500 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all tw-border sims-text-regular-sm tw-text-center tw-rounded-lg tw-py-2">Manage</a>
                                    </div>
                                </div>


                                <!-- card 2 -->
                                <div class="sims-card-1 tw-px-5 swiper-slide">
                                    <div class="tw-flex tw-flex-col">

                                        <!-- heading -->
                                        <div class="tw-flex tw-gap-5 tw-justify-center">
                                            <div class="tw-flex tw-flex-col">
                                                <i class="fa-solid fa-shapes sims-icon-3xl tw-mx-auto"></i>
                                                <div class="sims-heading-sm-black tw-truncate">Jurusan</div>
                                            </div>

                                            <div class="tw-flex tw-gap-2 tw-my-auto">
                                                <div class="sims-text-black-xl tw-text-3xl tw-my-auto">{{ $jurusan }}
                                                </div>
                                                <div class="sims-heading-sm-black tw-font-normal">total<br>data</div>
                                            </div>
                                        </div>

                                        <!-- spacing -->
                                        <div class="tw-my-10"></div>

                                        <!-- spacing -->
                                        <div class="tw-my-3"></div>

                                        <!-- button -->
                                        <a href="/admin/jurusan?page=1&perPage=10"
                                            class="tw-border-sims-new-500 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all tw-border sims-text-regular-sm tw-text-center tw-rounded-lg tw-py-2">Manage</a>
                                    </div>
                                </div>


                                <!-- card 3 -->
                                <div class="sims-card-1 tw-px-5 swiper-slide">
                                    <div class="tw-flex tw-flex-col">

                                        <!-- heading -->
                                        <div class="tw-flex tw-gap-5 tw-justify-center">
                                            <div class="tw-flex tw-flex-col">
                                                <i class="fa-solid fa-book sims-icon-3xl tw-mx-auto"></i>
                                                <div class="sims-heading-sm-black tw-truncate">Mata Pelajaran</div>
                                            </div>

                                            <div class="tw-flex tw-gap-2 tw-my-auto">
                                                <div class="sims-text-black-xl tw-text-3xl tw-my-auto">{{ $total_mapel }}
                                                </div>
                                                <div class="sims-heading-sm-black tw-font-normal">total<br>data</div>
                                            </div>
                                        </div>

                                        <!-- spacing -->
                                        <div class="tw-my-10"></div>

                                        <!-- spacing -->
                                        <div class="tw-my-3"></div>

                                        <!-- button -->
                                        <a href="/admin/mata-pelajaran?page=1&perPage=10"
                                            class="tw-border-sims-new-500 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all tw-border sims-text-regular-sm tw-text-center tw-rounded-lg tw-py-2">Manage</a>
                                    </div>
                                </div>


                                <!-- card 4 -->
                                <div class="sims-card-1 tw-px-5 swiper-slide">
                                    <div class="tw-flex tw-flex-col">

                                        <!-- heading -->
                                        <div class="tw-flex tw-gap-5 tw-justify-center">
                                            <div class="tw-flex tw-flex-col">
                                                <i class="fa-solid fa-book-font sims-icon-3xl tw-mx-auto"></i>
                                                <div class="sims-heading-sm-black tw-truncate">Mapel Jurusan</div>
                                            </div>

                                            <div class="tw-flex tw-gap-2 tw-my-auto">
                                                <div class="sims-text-black-xl tw-text-3xl tw-my-auto">
                                                    {{ $total_mapel_jurusan }}</div>
                                                <div class="sims-heading-sm-black tw-font-normal">total<br>data</div>
                                            </div>
                                        </div>

                                        <!-- spacing -->
                                        <div class="tw-my-10"></div>

                                        <!-- spacing -->
                                        <div class="tw-my-3"></div>

                                        <!-- button -->
                                        <a href="/admin/mapel-jurusan?page=1&perPage=10"
                                            class="tw-border-sims-new-500 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all tw-border sims-text-regular-sm tw-text-center tw-rounded-lg tw-py-2">Manage</a>
                                    </div>
                                </div>


                                <!-- card 5 -->
                                <div class="sims-card-1 tw-px-5 swiper-slide">
                                    <div class="tw-flex tw-flex-col">

                                        <!-- heading -->
                                        <div class="tw-flex tw-gap-5 tw-justify-center">
                                            <div class="tw-flex tw-flex-col">
                                                <i class="fa-solid fa-chalkboard-user sims-icon-3xl tw-mx-auto"></i>
                                                <div class="sims-heading-sm-black tw-truncate">Kelas</div>
                                            </div>

                                            <div class="tw-flex tw-gap-2 tw-my-auto">
                                                <div class="sims-text-black-xl tw-text-3xl tw-my-auto">{{ $total_kelas }}
                                                </div>
                                                <div class="sims-heading-sm-black tw-font-normal">total<br>data</div>
                                            </div>
                                        </div>

                                        <!-- spacing -->
                                        <div class="tw-my-10"></div>

                                        <!-- spacing -->
                                        <div class="tw-my-3"></div>

                                        <!-- button -->
                                        <a href="/admin/kelas?page=1&perPage=10"
                                            class="tw-border-sims-new-500 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all tw-border sims-text-regular-sm tw-text-center tw-rounded-lg tw-py-2">Manage</a>
                                    </div>
                                </div>

                                <!-- card 6 -->
                                <div class="sims-card-1 tw-px-5 swiper-slide">
                                    <div class="tw-flex tw-flex-col">

                                        <!-- heading -->
                                        <div class="tw-flex tw-gap-5 tw-justify-center">

                                            <div class="tw-flex tw-my-auto tw-mx-auto">
                                                <i class="fa-solid fa-server sims-icon-2xl tw-mx-2"></i>
                                                <div class="sims-text-black-xl tw-text-xl tw-my-auto">Backup Data</div>
                                            </div>

                                        </div>

                                        <!-- spacing -->
                                        <div class="tw-my-5"></div>

                                        <div class="sims-heading-sm-black tw-font-normal tw-mx-5 tw-text-center">
                                            Export database secara keseluruhan ataupun per tabel ke dalam file SQL. Data
                                            yang berharga harus dilindungi.
                                        </div>

                                        <!-- spacing -->
                                        <div class="tw-my-6"></div>

                                        <!-- button -->
                                        <a href="/admin/db/backup"
                                            class="tw-border-sims-new-500 hover:tw-bg-sims-new-500 hover:tw-text-white tw-transition-all tw-border sims-text-regular-sm tw-text-center tw-rounded-lg tw-py-2">Manage</a>
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
            <div class="sims-card-1 tw-ml-5 tw-my-auto tw-h-fit">

                <!-- heading -->
                <div class="tw-flex tw-justify-between tw-mx-10">
                    <div class="sims-heading-lg-black">Aktivitas Terbaru</div>
                    <form action="/history" method="GET">
                        <button type="submit"
                            class="tw-bg-[#F1F1EF] hover:tw-bg-[#ebebeb] tw-px-3 tw-py-1 tw-rounded-lg sims-heading-sm-black tw-text-[#979797]">Show
                            All</button>
                    </form>
                </div>

                <!-- spacing -->
                <div class="tw-my-8"></div>

                <!-- content -->
                @if ($allHistory === [])
                    <div class="tw-flex tw-flex-col tw-gap-5">
                        <img src="{{ URL::asset('assets/img/nohistory.jpg') }}" alt="no_history"
                            class="tw-w-3/6 tw-mx-auto">
                        <div class="sims-heading-xl tw-mx-auto">Belum ada Aktivitas.</div>
                    </div>
                @else
                    @foreach ($allHistory as $h)
                        <div class="tw-flex tw-justify-between tw-mx-10">
                            <div class="tw-flex tw-gap-3">
                                <img src="{{ URL::asset('assets/img/activityline2.png') }}" alt="..."
                                    class="tw-h-20">

                                <div class="tw-flex tw-flex-col tw-my-auto">
                                    <div class="sims-heading-md-black">{{ $h->activityAuthor }}</div>
                                    <div class="sims-text-regular-sm tw-font-normal tw-truncate lg:tw-w-64 sm:tw-w-48">
                                        {{ $h->activityName }}</div>
                                </div>

                            </div>
                            <div class="sims-text-gray-sm tw-font-normal tw-my-auto">
                                {{ \Carbon\Carbon::createFromTimeStamp(strtotime($h->createdAt))->diffForHumans() }}
                            </div>
                        </div>
                    @endforeach
                @endif
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
                labels: ['Masuk', 'Keluar', 'Tidak Naik'],
                datasets: [{
                    label: 'Jumlah ',
                    data: [{{ $siswaMasuk }}, {{ $siswaKeluar }}, {{ $siswaTdkNaik }}, ],
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
                    data: [{{ $tatausaha }}, {{ $kesiswaan }}, {{ $walikelas }},
                        {{ $kurikulum }}
                    ],
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
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                    label: 'Jumlah Aktivitas',
                    borderColor: '#3894a3',
                    backgroundColor: '#53b0bd',
                    data: [
                        {{ $totalActivityJanuary }},
                        {{ $totalActivityFebruary }},
                        {{ $totalActivityMarch }},
                        {{ $totalActivityApril }},
                        {{ $totalActivityMay }},
                        {{ $totalActivityJune }},
                        {{ $totalActivityJuly }},
                        {{ $totalActivityAugust }},
                        {{ $totalActivitySeptember }},
                        {{ $totalActivityOctober }},
                        {{ $totalActivityNovember }},
                        {{ $totalActivityDecember }},
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
                    },
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
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

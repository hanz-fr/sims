@extends('layouts.main-new')

@section('content')
    <style>
        .no-spin::-webkit-inner-spin-button,
        .no-spin::-webkit-outer-spin-button {
            -webkit-appearance: none !important;
            margin: 0 !important;
        }
    </style>


    <div class="tw-mt-10">
        <div class="tw-flex tw-ml-8 tw-justify-between tw-gap-5 tw-mt-8">
            <div class="tw-flex tw-flex-col">
                <h4 class="sims-heading-3xl">Data Alumni</h4>
                @if (isset($_GET['jurusan']) && isset($_GET['angkatan']))
                    <div class="tw-font-pop tw-text-gray-400 tw-font-medium tw-my-2">{{ $_GET['jurusan'] }} - Angkatan
                        {{ $_GET['angkatan'] }}</div>
                @else
                    <div class="tw-font-pop tw-text-gray-400 tw-font-medium tw-my-2">Seluruh Jurusan & Angkatan</div>
                @endif
            </div>
        </div>

        @if (isset($_GET['jurusan']) && isset($_GET['angkatan']))
            <div class="tw-flex tw-ml-8 tw-justify-between sm:tw-flex-wrap sm:tw-gap-5 tw-mt-8">
                <div class="tw-flex tw-my-auto">
                    <form action="/data-alumni">
                        <div class="relative tw-border-[1.5px] tw-border-gray-300 tw-rounded-xl">

                            @if (isset($_GET['jurusan']))
                                <input name="jurusan" value="{{ $_GET['jurusan'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['angkatan']))
                                <input name="angkatan" value="{{ $_GET['angkatan'] }}" type="hidden">
                            @endif

                            <input name="page" value="1" type="hidden">
                            <input name="perPage" value="10" type="hidden">

                            @if (isset($_GET['nis_siswa']))
                                <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['nisn_siswa']))
                                <input name="nisn_siswa" value="{{ $_GET['nisn_siswa'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['nama_siswa']))
                                <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['jenis_kelamin']))
                                <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['KelasId']))
                                <input name="KelasId" value="{{ $_GET['KelasId'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['sort_by']))
                                <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['sort']))
                                <input name="sort" value="{{ $_GET['sort'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['dibuatTglDari']))
                                <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['dibuatTglKe']))
                                <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['thn_ajaran']))
                                <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden">
                            @endif

                            <input type="text" id="search" name="search"
                                class="tw-block tw-py-1 tw-px-5 tw-border-none tw-rounded-xl focus:tw-ring-sims-new-500"
                                value="{{ request()->search }}">
                            <i
                                class="fa-thin fa-magnifying-glass tw-absolute tw-text-gray-400 right-0 tw-inset-y-1.5 tw-pr-5 tw-text-sm"></i>
                        </div>
                    </form>


                    <div class="tw-my-auto tw-text-basic-700 tw-ml-8 tw-mr-2 tw-font-normal tw-font-satoshi">Tampilkan</div>
                    <select name="show-data-perpage" id="show-data-perpage"
                        class="tw-pl-4 tw-px-7 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-200 tw-peer tw-font-bold  bg-transparent tw-border-0 tw-border-b-2 tw-border-gray-200 tw-appearance-none tw-block">

                        <option
                            value="/data-alumni?jurusan={{ $_GET['jurusan'] }}&angkatan={{ $_GET['angkatan'] }}&page=@if (!empty($_GET['page'])) {{ $_GET['page'] }} @endif&perPage=10&search=@if (isset($_GET['search'])) {{ $_GET['search'] }} @endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset"
                            @isset($_GET['perPage']) @if ($_GET['perPage'] === '10') selected @endif @endisset
                            class="tw-bg-white">10</option>
                        <option
                            value="/data-alumni?jurusan={{ $_GET['jurusan'] }}&angkatan={{ $_GET['angkatan'] }}&page=@if (!empty($_GET['page'])) {{ $_GET['page'] }} @endif&perPage=25&search=@if (isset($_GET['search'])) {{ $_GET['search'] }} @endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset"
                            @isset($_GET['perPage']) @if ($_GET['perPage'] === '25') selected @endif @endisset
                            class="tw-bg-white">25</option>
                        <option
                            value="/data-alumni?jurusan={{ $_GET['jurusan'] }}&angkatan={{ $_GET['angkatan'] }}&page=@if (!empty($_GET['page'])) {{ $_GET['page'] }} @endif&perPage=50&search=@if (isset($_GET['search'])) {{ $_GET['search'] }} @endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset"
                            @isset($_GET['perPage']) @if ($_GET['perPage'] === '50') selected @endif @endisset
                            class="tw-bg-white">50</option>
                        <option
                            value="/data-alumni?jurusan={{ $_GET['jurusan'] }}&angkatan={{ $_GET['angkatan'] }}&page=@if (!empty($_GET['page'])) {{ $_GET['page'] }} @endif&perPage=100&search=@if (isset($_GET['search'])) {{ $_GET['search'] }} @endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset"
                            @isset($_GET['perPage']) @if ($_GET['perPage'] === '100') selected @endif @endisset
                            class="tw-bg-white">100</option>

                    </select>
                    <div class="tw-my-auto tw-mx-2 tw-font-satoshi tw-font-normal tw-text-basic-700">data</div>

                    {{-- FILTER DROPDOWN --}}
                    <button id="dropdownToggleButton" data-dropdown-toggle="filter-dd"
                        class="tw-text-sims-new-500 hover:tw-text-white tw-font-satoshi focus:tw-ring-0 focus:tw-outline-none tw-font-medium tw-rounded-lg tw-text-sm tw-px-4 tw-py-1 tw-ml-8 tw-text-center tw-inline-flex tw-items-center dark:tw-bg-white dark:hover:tw-bg-sims-new-500 tw-shadow-md tw-transition-all tw-ease-in-out"
                        type="button">Filters <i class="tw-text-xl tw-ml-5 fa-duotone fa-sliders-simple"></i></button>
                    <!-- filter menu -->
                    <div id="filter-dd"
                        class="hidden tw-z-10 tw-w-72 tw-bg-white tw-rounded tw-divide-y tw-divide-gray-100 tw-shadow-md">
                        <div class="tw-font-pop tw-text-xs tw-text-gray-400 tw-my-2 tw-mx-5">Cari berdasarkan...</div>
                        <form action="/data-alumni">

                            @if (isset($_GET['jurusan']))
                                <input name="jurusan" value="{{ $_GET['jurusan'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['angkatan']))
                                <input name="angkatan" value="{{ $_GET['angkatan'] }}" type="hidden">
                            @endif

                            @if (isset($_GET['page']))
                                <input type="hidden" name="page" value="{{ $_GET['page'] }}">
                            @endif
                            @if (isset($_GET['perPage']))
                                <input type="hidden" name="perPage" value="{{ $_GET['perPage'] }}">
                            @endif
                            @if (isset($_GET['search']))
                                <input type="hidden" name="search" value="{{ $_GET['search'] }}">
                            @endif


                            <ul class="tw-p-3 tw-space-y-1 tw-text-sm tw-text-gray-700"
                                aria-labelledby="dropdownToggleButton">
                                <li>
                                    <div
                                        class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                        <label
                                            class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                            <input type="checkbox" value="true" name="nis_siswa"
                                                class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0"
                                                @isset($_GET['nis_siswa']) @if ($_GET['nis_siswa'] === 'true') checked @endif @endisset>
                                            <div
                                                class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500">
                                            </div>
                                            <span
                                                class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">NIS</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                        <label
                                            class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                            <input type="checkbox" value="true" name="nisn_siswa"
                                                class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0"
                                                @isset($_GET['nisn_siswa']) @if ($_GET['nisn_siswa'] === 'true') checked @endif @endisset>
                                            <div
                                                class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500">
                                            </div>
                                            <span
                                                class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">NISN</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                        <label
                                            class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                            <input type="checkbox" value="true" name="nama_siswa"
                                                class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0"
                                                @isset($_GET['nama_siswa']) @if ($_GET['nama_siswa'] === 'true') checked @endif @endisset>
                                            <div
                                                class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500">
                                            </div>
                                            <span
                                                class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Nama
                                                Siswa</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                        <label
                                            class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                            <input type="checkbox" value="true" name="jenis_kelamin"
                                                class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0"
                                                @isset($_GET['jenis_kelamin']) @if ($_GET['jenis_kelamin'] === 'true') checked @endif @endisset>
                                            <div
                                                class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500">
                                            </div>
                                            <span
                                                class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Gender</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                        <label
                                            class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                            <input type="checkbox" value="true" name="KelasId"
                                                class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0"
                                                @isset($_GET['KelasId']) @if ($_GET['KelasId'] === 'true') checked @endif @endisset>
                                            <div
                                                class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500">
                                            </div>
                                            <span
                                                class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Kelas</span>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                            <div class="tw-border-t tw-border-gray-100 tw-mb-3"></div>
                            <div class="tw-font-pop tw-text-xs tw-text-gray-400 tw-my-2 tw-mx-5">Urutkan berdasarkan...
                            </div>
                            <div class="tw-mx-5 tw-flex tw-justify-center">
                                <select class="input-data tw-text-xs" id="sort_by" name="sort_by" required>

                                    // tampilkan option yg di select berdasarkan parameter sort_by
                                    @if (isset($_GET['sort_by']))
                                        <option value="{{ $_GET['sort_by'] }}">
                                            @if ($_GET['sort_by'] == 'nis_siswa')
                                                NIS (selected)
                                            @elseif($_GET['sort_by'] == 'nisn_siswa')
                                                NISN (selected)
                                            @elseif($_GET['sort_by'] == 'nama_siswa')
                                                Nama Peserta Didik (selected)
                                            @elseif($_GET['sort_by'] == 'jenis_kelamin')
                                                Gender (selected)
                                            @elseif($_GET['sort_by'] == 'KelasId')
                                                Kelas (selected)
                                            @endif
                                        </option>
                                    @endif
                                    <option value="nis_siswa">NIS</option>
                                    <option value="nisn_siswa">NISN</option>
                                    <option value="nama_siswa">Nama Peserta Didik</option>
                                    <option value="jenis_kelamin">Gender</option>
                                    <option value="KelasId">Kelas</option>
                                </select>
                            </div>
                            <div class="tw-flex tw-my-5 tw-gap-3 tw-justify-center tw-mx-auto">
                                <div class="tw-flex tw-gap-1">
                                    <label for="ascending" class="tw-font-pop tw-text-xs tw-text-gray-400">Naik</label>
                                    <input class="tw-my-auto tw-bg-gray-200 focus:ring-0 focus:ring-offset-0"
                                        style="height:15px; width:15px; border: none" type="radio" id="ascending"
                                        name="sort" value="ASC"
                                        @isset($_GET['sort']) @if ($_GET['sort'] == 'ASC') ? checked : @endif @endisset>
                                </div>
                                <div class="tw-flex tw-gap-1">
                                    <label for="descending"
                                        class="tw-font-pop tw-text-xs tw-text-gray-400">Menurun</label>
                                    <input class="tw-my-auto tw-bg-gray-200 focus:ring-0 focus:ring-offset-0"
                                        style="height:15px; width:15px; border: none" type="radio" id="descending"
                                        name="sort" value="DESC"
                                        @isset($_GET['sort']) @if ($_GET['sort'] == 'DESC') ? checked : @endif @endisset>
                                </div>
                            </div>
                            <div class="tw-flex tw-justify-center">
                                <button type="submit"
                                    class="tw-w-full tw-rounded-lg tw-mx-3 tw-font-pop tw-text-white tw-text-sm tw-font-medium tw-mb-2 tw-py-2 tw-bg-sims-new-500 hover:tw-bg-sims-new-600 tw-transition-all tw-ease-in-out">Simpan</button>
                            </div>

                            @if (isset($_GET['dibuatTglDari']))
                                <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['dibuatTglKe']))
                                <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['thn_ajaran']))
                                <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden">
                            @endif
                        </form>
                    </div>
                    <!-- end filter menu -->

                </div>

                @can('manage-alumni')
                    <div class="tw-flex tw-justify-center tw-items-center">
                        <button type="button" data-modal-toggle="export-print" title="Cetak data"><i
                                class="fa-solid fa-print btn-export"></i></button>

                        <div id="export-print" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed  z-50 md:tw-inset-0 h-modal md:h-full">
                            <div class="tw-relative tw-p-4 tw-w-full tw-max-w-md tw-h-full md:tw-h-auto">
                                <div class="tw-relative tw-bg-white tw-rounded-lg tw-shadow dark:tw-bg-slate-100">
                                    <button type="button"
                                        class="tw-absolute tw-top-3 tw-right-2.5 tw-text-gray-400 tw-bg-transparent hover:tw-bg-gray-200 hover:tw-text-gray-900 tw-rounded-lg tw-text-sm tw-p-1.5 tw-ml-auto tw-inline-flex tw-items-center dark:hover:tw-bg-gray-800 dark:hover:tw-text-white"
                                        data-modal-toggle="export-print">
                                        <svg aria-hidden="true" class="tw-w-5 tw-h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="tw-sr-only">Close modal</span>
                                    </button>
                                    <div class="tw-p-6">
                                        <div
                                            class="tw-mb-8 tw-mt-5 tw-flex tw-justify-center tw-text-2xl tw-font-semibold tw-text-sims-new-500">
                                            Ekspor Print
                                        </div>
                                        <form
                                            action="/alumni-print?jurusan={{ $_GET['jurusan'] }}&angkatan={{ $_GET['angkatan'] }}&search=@if (isset($_GET['search'])) {{ $_GET['search'] }} @endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset"
                                            method="" class="tw-flex tw-flex-col">
                                            <div class="tw-flex tw-justify-center tw-mb-4">
                                                <div
                                                    class="tw-my-auto tw-text-basic-700 tw-mr-2 tw-font-normal tw-text-lg tw-font-satoshi">
                                                    Ekspor</div>

                                                <input name="perPage"
                                                    @if (!empty($_GET['perPage'])) value="{{ $_GET['perPage'] }}" @endif
                                                    type="number"
                                                    class="tw-px-2 tw-w-16 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-300 tw-border-gray-300 tw-peer tw-font-bold  bg-transparent tw-appearance-none tw-block">

                                                <div
                                                    class="tw-my-auto tw-ml-2 tw-font-satoshi tw-font-normal tw-text-lg tw-text-basic-700">
                                                    data</div>
                                            </div>

                                            <div class="tw-flex tw-justify-center tw-mb-3">
                                                <div
                                                    class="tw-my-auto tw-text-basic-700 tw-mr-2 tw-font-normal tw-text-lg tw-font-satoshi">
                                                    Page</div>
                                                <input type="number" name="page"
                                                    @if (!empty($_GET['page'])) value="{{ $_GET['page'] }}" @endif
                                                    class="tw-px-2 tw-w-16 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-300 tw-border-gray-300 tw-peer tw-font-bold  bg-transparent tw-appearance-none tw-block">
                                            </div>

                                            <input name="jurusan" type="hidden" value="{{ $_GET['jurusan'] }}">

                                            <input name="angkatan" type="hidden" value="{{ $_GET['angkatan'] }}">

                                            @if (isset($_GET['search']))
                                                <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                                            @endif

                                            @if (isset($_GET['nis_siswa']))
                                                <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['nisn_siswa']))
                                                <input name="nisn_siswa" value="{{ $_GET['nisn_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['nama_siswa']))
                                                <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['jenis_kelamin']))
                                                <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}"
                                                    type="hidden">
                                            @endif
                                            @if (isset($_GET['KelasId']))
                                                <input name="KelasId" value="{{ $_GET['KelasId'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['sort_by']))
                                                <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['sort']))
                                                <input name="sort" value="{{ $_GET['sort'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['dibuatTglDari']))
                                                <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}"
                                                    type="hidden">
                                            @endif
                                            @if (isset($_GET['dibuatTglKe']))
                                                <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['thn_ajaran']))
                                                <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden">
                                            @endif
                                            <div class="tw-flex tw-justify-center tw-mt-3">
                                                <button type="submit"
                                                    class="tw-text-white tw-bg-sims-new-500 hover:tw-bg-sims-new-700 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-sims-new-600 tw-font-medium tw-rounded-lg tw-text-sm tw-inline-flex tw-items-center tw-py-2.5 tw-text-center tw-mr-2 tw-px-6">Ekspor</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" data-modal-toggle="export-excel" title="Ekspor ke excel"><i
                                class="fa-solid fa-file-excel btn-export"></i></button>

                        <div id="export-excel" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed  z-50 md:tw-inset-0 h-modal md:h-full">
                            <div class="tw-relative tw-p-4 tw-w-full tw-max-w-md tw-h-full md:tw-h-auto">
                                <div class="tw-relative tw-bg-white tw-rounded-lg tw-shadow dark:tw-bg-slate-100">
                                    <button type="button"
                                        class="tw-absolute tw-top-3 tw-right-2.5 tw-text-gray-400 tw-bg-transparent hover:tw-bg-gray-200 hover:tw-text-gray-900 tw-rounded-lg tw-text-sm tw-p-1.5 tw-ml-auto tw-inline-flex tw-items-center dark:hover:tw-bg-gray-800 dark:hover:tw-text-white"
                                        data-modal-toggle="export-excel">
                                        <svg aria-hidden="true" class="tw-w-5 tw-h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="tw-sr-only">Close modal</span>
                                    </button>
                                    <div class="tw-p-6">
                                        <div
                                            class="tw-mb-8 tw-mt-5 tw-flex tw-justify-center tw-text-2xl tw-font-semibold tw-text-sims-new-500">
                                            Ekspor Excel
                                        </div>
                                        <form
                                            action="/alumni-excel?jurusan={{ $_GET['jurusan'] }}&angkatan={{ $_GET['angkatan'] }}&page=@if (!empty($_GET['page'])) {{ $_GET['page'] }} @endif&perPage=10&search=@if (isset($_GET['search'])) {{ $_GET['search'] }} @endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset"
                                            method="" class="tw-flex tw-flex-col">
                                            <div class="tw-flex tw-justify-center tw-mb-4">
                                                <div
                                                    class="tw-my-auto tw-text-basic-700 tw-mr-2 tw-font-normal tw-text-lg tw-font-satoshi">
                                                    Ekspor</div>

                                                <input name="perPage"
                                                    @if (!empty($_GET['perPage'])) value="{{ $_GET['perPage'] }}" @endif
                                                    type="number"
                                                    class="tw-px-2 tw-w-16 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-300 tw-border-gray-300 tw-peer tw-font-bold  bg-transparent tw-appearance-none tw-block">

                                                <div
                                                    class="tw-my-auto tw-ml-2 tw-font-satoshi tw-font-normal tw-text-lg tw-text-basic-700">
                                                    data</div>
                                            </div>

                                            <div class="tw-flex tw-justify-center tw-mb-3">
                                                <div
                                                    class="tw-my-auto tw-text-basic-700 tw-mr-2 tw-font-normal tw-text-lg tw-font-satoshi">
                                                    Page</div>
                                                <input type="number" name="page"
                                                    @if (!empty($_GET['page'])) value="{{ $_GET['page'] }}" @endif
                                                    class="tw-px-2 tw-w-16 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-300 tw-border-gray-300 tw-peer tw-font-bold  bg-transparent tw-appearance-none tw-block">
                                            </div>

                                            <input name="jurusan" type="hidden" value="{{ $_GET['jurusan'] }}">

                                            <input name="angkatan" type="hidden" value="{{ $_GET['angkatan'] }}">

                                            @if (isset($_GET['search']))
                                                <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                                            @endif

                                            @if (isset($_GET['nis_siswa']))
                                                <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['nisn_siswa']))
                                                <input name="nisn_siswa" value="{{ $_GET['nisn_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['nama_siswa']))
                                                <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['jenis_kelamin']))
                                                <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}"
                                                    type="hidden">
                                            @endif
                                            @if (isset($_GET['KelasId']))
                                                <input name="KelasId" value="{{ $_GET['KelasId'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['sort_by']))
                                                <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['sort']))
                                                <input name="sort" value="{{ $_GET['sort'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['dibuatTglDari']))
                                                <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}"
                                                    type="hidden">
                                            @endif
                                            @if (isset($_GET['dibuatTglKe']))
                                                <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}"
                                                    type="hidden">
                                            @endif
                                            @if (isset($_GET['thn_ajaran']))
                                                <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden">
                                            @endif

                                            <div class="tw-flex tw-justify-center tw-mt-3">
                                                <button type="submit"
                                                    class="tw-text-white tw-bg-sims-new-500 hover:tw-bg-sims-new-700 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-sims-new-600 tw-font-medium tw-rounded-lg tw-text-sm tw-inline-flex tw-items-center tw-py-2.5 tw-text-center tw-mr-2 tw-px-6">Ekspor</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" data-modal-toggle="export-pdf" title="Ekspor ke PDF"><i
                                class="fa-solid fa-file-pdf btn-export tw-mr-7"></i></button>

                        <div id="export-pdf" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed  z-50 md:tw-inset-0 h-modal md:h-full">
                            <div class="tw-relative tw-p-4 tw-w-full tw-max-w-md tw-h-full md:tw-h-auto">
                                <div class="tw-relative tw-bg-white tw-rounded-lg tw-shadow dark:tw-bg-slate-100">
                                    <button type="button"
                                        class="tw-absolute tw-top-3 tw-right-2.5 tw-text-gray-400 tw-bg-transparent hover:tw-bg-gray-200 hover:tw-text-gray-900 tw-rounded-lg tw-text-sm tw-p-1.5 tw-ml-auto tw-inline-flex tw-items-center dark:hover:tw-bg-gray-800 dark:hover:tw-text-white"
                                        data-modal-toggle="export-pdf">
                                        <svg aria-hidden="true" class="tw-w-5 tw-h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="tw-sr-only">Close modal</span>
                                    </button>
                                    <div class="tw-p-6">
                                        <div
                                            class="tw-mb-8 tw-mt-5 tw-flex tw-justify-center tw-text-2xl tw-font-semibold tw-text-sims-new-500">
                                            Ekspor PDF
                                        </div>
                                        <form
                                            action="/alumni-pdf?jurusan={{ $_GET['jurusan'] }}&angkatan={{ $_GET['angkatan'] }}&page=@if (!empty($_GET['page'])) {{ $_GET['page'] }} @endif&perPage=10&search=@if (isset($_GET['search'])) {{ $_GET['search'] }} @endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset"
                                            method="" class="tw-flex tw-flex-col">
                                            <div class="tw-flex tw-justify-center tw-mb-4">
                                                <div
                                                    class="tw-my-auto tw-text-basic-700 tw-mr-2 tw-font-normal tw-text-lg tw-font-satoshi">
                                                    Ekspor</div>

                                                <input name="perPage"
                                                    @if (!empty($_GET['perPage'])) value="{{ $_GET['perPage'] }}" @endif
                                                    type="number"
                                                    class="tw-px-2 tw-w-16 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-300 tw-border-gray-300 tw-peer tw-font-bold  bg-transparent tw-appearance-none tw-block">

                                                <div
                                                    class="tw-my-auto tw-ml-2 tw-font-satoshi tw-font-normal tw-text-lg tw-text-basic-700">
                                                    data</div>
                                            </div>

                                            <div class="tw-flex tw-justify-center tw-mb-3">
                                                <div
                                                    class="tw-my-auto tw-text-basic-700 tw-mr-2 tw-font-normal tw-text-lg tw-font-satoshi">
                                                    Page</div>
                                                <input type="number" name="page"
                                                    @if (!empty($_GET['page'])) value="{{ $_GET['page'] }}" @endif
                                                    class="tw-px-2 tw-w-16 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-300 tw-border-gray-300 tw-peer tw-font-bold  bg-transparent tw-appearance-none tw-block">
                                            </div>

                                            <input name="jurusan" type="hidden" value="{{ $_GET['jurusan'] }}">

                                            <input name="angkatan" type="hidden" value="{{ $_GET['angkatan'] }}">

                                            @if (isset($_GET['search']))
                                                <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                                            @endif

                                            @if (isset($_GET['nis_siswa']))
                                                <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['nisn_siswa']))
                                                <input name="nisn_siswa" value="{{ $_GET['nisn_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['nama_siswa']))
                                                <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['jenis_kelamin']))
                                                <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}"
                                                    type="hidden">
                                            @endif
                                            @if (isset($_GET['KelasId']))
                                                <input name="KelasId" value="{{ $_GET['KelasId'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['sort_by']))
                                                <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['sort']))
                                                <input name="sort" value="{{ $_GET['sort'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['dibuatTglDari']))
                                                <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}"
                                                    type="hidden">
                                            @endif
                                            @if (isset($_GET['dibuatTglKe']))
                                                <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}"
                                                    type="hidden">
                                            @endif
                                            @if (isset($_GET['thn_ajaran']))
                                                <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden">
                                            @endif

                                            <div class="tw-flex tw-justify-center tw-mt-3">
                                                <button type="submit"
                                                    class="tw-text-white tw-bg-sims-new-500 hover:tw-bg-sims-new-700 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-sims-new-600 tw-font-medium tw-rounded-lg tw-text-sm tw-inline-flex tw-items-center tw-py-2.5 tw-text-center tw-mr-2 tw-px-6">Ekspor</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>
        @else
            <div class="tw-flex tw-ml-8 tw-justify-between sm:tw-flex-wrap sm:tw-gap-5 tw-mt-8">
                <div class="tw-flex tw-my-auto">
                    <form action="/data-alumni/all">
                        <div class="relative tw-border-[1.5px] tw-border-gray-300 tw-rounded-xl">

                            @if (isset($_GET['angkatan']))
                                <input name="angkatan" value="{{ $_GET['angkatan'] }}" type="hidden">
                            @endif
                            <input name="page" value="1" type="hidden">
                            <input name="perPage" value="10" type="hidden">

                            @if (isset($_GET['nis_siswa']))
                                <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['nisn_siswa']))
                                <input name="nisn_siswa" value="{{ $_GET['nisn_siswa'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['nama_siswa']))
                                <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['jenis_kelamin']))
                                <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['KelasId']))
                                <input name="KelasId" value="{{ $_GET['KelasId'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['sort_by']))
                                <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['sort']))
                                <input name="sort" value="{{ $_GET['sort'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['dibuatTglDari']))
                                <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['dibuatTglKe']))
                                <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['thn_ajaran']))
                                <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden">
                            @endif

                            <input type="text" id="search" name="search"
                                class="tw-block tw-py-1 tw-px-5 tw-border-none tw-rounded-xl focus:tw-ring-sims-new-500"
                                value="{{ request()->search }}">
                            <i
                                class="fa-thin fa-magnifying-glass tw-absolute tw-text-gray-400 right-0 tw-inset-y-1.5 tw-pr-5 tw-text-sm"></i>
                        </div>
                    </form>


                    <div class="tw-my-auto tw-text-basic-700 tw-ml-8 tw-mr-2 tw-font-normal tw-font-satoshi">Tampilkan
                    </div>
                    <select name="show-data-perpage" id="show-data-perpage"
                        class="tw-pl-5 tw-px-7 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-200 tw-peer tw-font-bold  bg-transparent tw-border-0 tw-border-b-2 tw-border-gray-200 tw-appearance-none tw-block">
                        <option
                            value="/data-alumni/all?page=@if (!empty($_GET['page'])) {{ $_GET['page'] }} @endif&perPage=10&search=@if (isset($_GET['search'])) {{ $_GET['search'] }} @endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset"
                            @isset($_GET['perPage']) @if ($_GET['perPage'] === '10') selected @endif @endisset
                            class="tw-bg-white">10</option>
                        <option
                            value="/data-alumni/all?page=@if (!empty($_GET['page'])) {{ $_GET['page'] }} @endif&perPage=25&search=@if (isset($_GET['search'])) {{ $_GET['search'] }} @endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset"
                            @isset($_GET['perPage']) @if ($_GET['perPage'] === '25') selected @endif @endisset
                            class="tw-bg-white">25</option>
                        <option
                            value="/data-alumni/all?page=@if (!empty($_GET['page'])) {{ $_GET['page'] }} @endif&perPage=50&search=@if (isset($_GET['search'])) {{ $_GET['search'] }} @endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset"
                            @isset($_GET['perPage']) @if ($_GET['perPage'] === '50') selected @endif @endisset
                            class="tw-bg-white">50</option>
                        <option
                            value="/data-alumni/all?page=@if (!empty($_GET['page'])) {{ $_GET['page'] }} @endif&perPage=100&search=@if (isset($_GET['search'])) {{ $_GET['search'] }} @endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset"
                            @isset($_GET['perPage']) @if ($_GET['perPage'] === '100') selected @endif @endisset
                            class="tw-bg-white">100</option>
                    </select>
                    <div class="tw-my-auto tw-mx-2 tw-font-satoshi tw-font-normal tw-text-basic-700">data</div>

                    {{-- FILTER DROPDOWN --}}
                    <button id="dropdownToggleButton" data-dropdown-toggle="filter-dd"
                        class="tw-text-sims-new-500 hover:tw-text-white tw-font-satoshi focus:tw-ring-0 focus:tw-outline-none tw-font-medium tw-rounded-lg tw-text-sm tw-px-4 tw-py-1 tw-ml-8 tw-text-center tw-inline-flex tw-items-center dark:tw-bg-white dark:hover:tw-bg-sims-new-500 tw-shadow-md tw-transition-all tw-ease-in-out"
                        type="button">Filters <i class="tw-text-xl tw-ml-5 fa-duotone fa-sliders-simple"></i></button>
                    <!-- filter menu -->
                    <div id="filter-dd"
                        class="hidden tw-z-10 tw-w-72 tw-bg-white tw-rounded tw-divide-y tw-divide-gray-100 tw-shadow-md">
                        <div class="tw-font-pop tw-text-xs tw-text-gray-400 tw-my-2 tw-mx-5">Cari berdasarkan...</div>
                        <form action="/data-alumni/all">

                            @if (isset($_GET['angkatan']))
                                <input name="angkatan" value="{{ $_GET['angkatan'] }}" type="hidden">
                            @endif

                            @if (isset($_GET['page']))
                                <input type="hidden" name="page" value="{{ $_GET['page'] }}">
                            @endif
                            @if (isset($_GET['perPage']))
                                <input type="hidden" name="perPage" value="{{ $_GET['perPage'] }}">
                            @endif
                            @if (isset($_GET['search']))
                                <input type="hidden" name="search" value="{{ $_GET['search'] }}">
                            @endif


                            <ul class="tw-p-3 tw-space-y-1 tw-text-sm tw-text-gray-700"
                                aria-labelledby="dropdownToggleButton">
                                <li>
                                    <div
                                        class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                        <label
                                            class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                            <input type="checkbox" value="true" name="nis_siswa"
                                                class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0"
                                                @isset($_GET['nis_siswa']) @if ($_GET['nis_siswa'] === 'true') checked @endif @endisset>
                                            <div
                                                class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500">
                                            </div>
                                            <span
                                                class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">NIS</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                        <label
                                            class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                            <input type="checkbox" value="true" name="nisn_siswa"
                                                class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0"
                                                @isset($_GET['nisn_siswa']) @if ($_GET['nisn_siswa'] === 'true') checked @endif @endisset>
                                            <div
                                                class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500">
                                            </div>
                                            <span
                                                class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">NISN</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                        <label
                                            class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                            <input type="checkbox" value="true" name="nama_siswa"
                                                class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0"
                                                @isset($_GET['nama_siswa']) @if ($_GET['nama_siswa'] === 'true') checked @endif @endisset>
                                            <div
                                                class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500">
                                            </div>
                                            <span
                                                class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Nama
                                                Siswa</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                        <label
                                            class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                            <input type="checkbox" value="true" name="jenis_kelamin"
                                                class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0"
                                                @isset($_GET['jenis_kelamin']) @if ($_GET['jenis_kelamin'] === 'true') checked @endif @endisset>
                                            <div
                                                class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500">
                                            </div>
                                            <span
                                                class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Gender</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                        <label
                                            class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                            <input type="checkbox" value="true" name="KelasId"
                                                class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0"
                                                @isset($_GET['KelasId']) @if ($_GET['KelasId'] === 'true') checked @endif @endisset>
                                            <div
                                                class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500">
                                            </div>
                                            <span
                                                class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Kelas</span>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                            <div class="tw-border-t tw-border-gray-100 tw-mb-3"></div>
                            <div class="tw-font-pop tw-text-xs tw-text-gray-400 tw-my-2 tw-mx-5">Urutkan berdasarkan...
                            </div>
                            <div class="tw-mx-5 tw-flex tw-justify-center">
                                <select class="input-data tw-text-xs" id="sort_by" name="sort_by" required>

                                    // tampilkan option yg di select berdasarkan parameter sort_by
                                    @if (isset($_GET['sort_by']))
                                        <option value="{{ $_GET['sort_by'] }}">
                                            @if ($_GET['sort_by'] == 'nis_siswa')
                                                NIS (selected)
                                            @elseif($_GET['sort_by'] == 'nisn_siswa')
                                                NISN (selected)
                                            @elseif($_GET['sort_by'] == 'nama_siswa')
                                                Nama Siswa (selected)
                                            @elseif($_GET['sort_by'] == 'jenis_kelamin')
                                                Gender (selected)
                                            @elseif($_GET['sort_by'] == 'KelasId')
                                                Kelas (selected)
                                            @endif
                                        </option>
                                    @endif
                                    <option value="nis_siswa">NIS</option>
                                    <option value="nisn_siswa">NISN</option>
                                    <option value="nama_siswa">Nama Peserta Didik</option>
                                    <option value="jenis_kelamin">Gender</option>
                                    <option value="KelasId">Kelas</option>
                                </select>
                            </div>
                            <div class="tw-flex tw-my-5 tw-gap-3 tw-justify-center tw-mx-auto">
                                <div class="tw-flex tw-gap-1">
                                    <label for="ascending" class="tw-font-pop tw-text-xs tw-text-gray-400">Naik</label>
                                    <input class="tw-my-auto tw-bg-gray-200 focus:ring-0 focus:ring-offset-0"
                                        style="height:15px; width:15px; border: none" type="radio" id="ascending"
                                        name="sort" value="ASC"
                                        @isset($_GET['sort']) @if ($_GET['sort'] == 'ASC') ? checked : @endif @endisset>
                                </div>
                                <div class="tw-flex tw-gap-1">
                                    <label for="descending"
                                        class="tw-font-pop tw-text-xs tw-text-gray-400">Menurun</label>
                                    <input class="tw-my-auto tw-bg-gray-200 focus:ring-0 focus:ring-offset-0"
                                        style="height:15px; width:15px; border: none" type="radio" id="descending"
                                        name="sort" value="DESC"
                                        @isset($_GET['sort']) @if ($_GET['sort'] == 'DESC') ? checked : @endif @endisset>
                                </div>
                            </div>
                            <div class="tw-flex tw-justify-center">
                                <button type="submit"
                                    class="tw-w-full tw-rounded-lg tw-mx-3 tw-font-pop tw-text-white tw-text-sm tw-font-medium tw-mb-2 tw-py-2 tw-bg-sims-new-500 hover:tw-bg-sims-new-600 tw-transition-all tw-ease-in-out">Simpan</button>
                            </div>

                            @if (isset($_GET['dibuatTglDari']))
                                <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['dibuatTglKe']))
                                <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}" type="hidden">
                            @endif
                            @if (isset($_GET['thn_ajaran']))
                                <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden">
                            @endif
                        </form>
                    </div>
                    <!-- end filter menu -->

                    <!-- This is an example component -->
                    <div class="tw-mx-5">
                        <select id="show-angkatan"
                            class="tw-border tw-border-none tw-text-sims-400 hover:tw-text-white tw-font-pop tw-text-sm tw-font-medium tw-rounded-lg tw-h-10 tw-pl-5 tw-pr-10 tw-bg-white hover:tw-bg-sims-new-500 hover:tw-border-sims-400 focus:tw-outline-none tw-appearance-none focus:tw-ring-0 tw-shadow-md tw-transition-all tw-ease-in-out"
                            style="cursor: pointer;">
                            @if (request()->angkatan)
                                <option
                                    value="/data-alumni/all?page=1&perPage=10&search=@if (isset($_GET['search'])) {{ $_GET['search'] }} @endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset"
                                    class="tw-bg-white tw-text-gray-600">- Semua Angkatan -</option>
                                <option selected
                                    value="/data-alumni/all?page=1&perPage=10&search=@if (isset($_GET['search'])) {{ $_GET['search'] }} @endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&angkatan={{ $_GET['angkatan'] }}"
                                    class="tw-bg-white tw-text-gray-600">Angkatan {{ $_GET['angkatan'] }}</option>
                            @else
                                <option
                                    value="/data-alumni/all?page=1&perPage=10&search=@if (isset($_GET['search'])) {{ $_GET['search'] }} @endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&angkatan="
                                    class="tw-bg-white tw-text-gray-600">- Semua Angkatan -</option>
                            @endif
                            @php $n = 2018 @endphp
                            @for ($i = \Carbon\Carbon::now()->year; $i > 2018; $i--)
                                @while ($i != $n - 1)
                                    <option
                                        value="/data-alumni/all?page=1&perPage=10&search=@if (isset($_GET['search'])) {{ $_GET['search'] }} @endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&angkatan={{ $i }}"
                                        class="tw-bg-white tw-text-gray-600">Angkatan {{ $i-- }}</option>
                                @endwhile
                            @endfor
                        </select>
                    </div>
                </div>

                @can('manage-alumni')
                    <div class="tw-flex tw-justify-center tw-items-center">
                        <button type="button" data-modal-toggle="export-print" title="Cetak data"><i
                                class="fa-solid fa-print btn-export"></i></button>

                        <div id="export-print" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed  z-50 md:tw-inset-0 h-modal md:h-full">
                            <div class="tw-relative tw-p-4 tw-w-full tw-max-w-md tw-h-full md:tw-h-auto">
                                <div class="tw-relative tw-bg-white tw-rounded-lg tw-shadow dark:tw-bg-slate-100">
                                    <button type="button"
                                        class="tw-absolute tw-top-3 tw-right-2.5 tw-text-gray-400 tw-bg-transparent hover:tw-bg-gray-200 hover:tw-text-gray-900 tw-rounded-lg tw-text-sm tw-p-1.5 tw-ml-auto tw-inline-flex tw-items-center dark:hover:tw-bg-gray-800 dark:hover:tw-text-white"
                                        data-modal-toggle="export-print">
                                        <svg aria-hidden="true" class="tw-w-5 tw-h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="tw-sr-only">Close modal</span>
                                    </button>
                                    <div class="tw-p-6">
                                        <div
                                            class="tw-mb-8 tw-mt-5 tw-flex tw-justify-center tw-text-2xl tw-font-semibold tw-text-sims-new-500">
                                            Ekspor Print
                                        </div>
                                        <form action="/alumni-print/all" method="" class="tw-flex tw-flex-col">
                                            <div class="tw-flex tw-justify-center tw-mb-4">
                                                <div
                                                    class="tw-my-auto tw-text-basic-700 tw-mr-2 tw-font-normal tw-text-lg tw-font-satoshi">
                                                    Ekspor</div>

                                                <input name="perPage"
                                                    @if (!empty($_GET['perPage'])) value="{{ $_GET['perPage'] }}" @endif
                                                    type="number"
                                                    class="tw-px-2 tw-w-16 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-300 tw-border-gray-300 tw-peer tw-font-bold  bg-transparent tw-appearance-none tw-block">

                                                <div
                                                    class="tw-my-auto tw-ml-2 tw-font-satoshi tw-font-normal tw-text-lg tw-text-basic-700">
                                                    data</div>
                                            </div>

                                            <div class="tw-flex tw-justify-center tw-mb-3">
                                                <div
                                                    class="tw-my-auto tw-text-basic-700 tw-mr-2 tw-font-normal tw-text-lg tw-font-satoshi">
                                                    Page</div>
                                                <input type="number" name="page"
                                                    @if (!empty($_GET['page'])) value="{{ $_GET['page'] }}" @endif
                                                    class="tw-px-2 tw-w-16 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-300 tw-border-gray-300 tw-peer tw-font-bold  bg-transparent tw-appearance-none tw-block">
                                            </div>

                                            <select id="show-angkatan"
                                                name="angkatan"
                                                class="tw-text-sims-new-500 tw-text-lg tw-mb-3 hover:tw-text-white tw-font-satoshi focus:tw-ring-0 focus:tw-outline-none tw-font-medium tw-rounded-lg tw-px-4 tw-py-1 tw-ml-8 tw-text-center tw-inline-flex tw-items-center dark:tw-bg-white dark:hover:tw-bg-sims-new-500 tw-shadow-md tw-transition-all tw-ease-in-out"
                                                style="cursor: pointer;">
                                                <option
                                                    value=""
                                                    class="tw-bg-white tw-text-gray-600">- Semua Angkatan -</option>
                                                @php $n = 2018 @endphp
                                                @for ($i = \Carbon\Carbon::now()->year; $i > 2018; $i--)
                                                    @while ($i != $n - 1)
                                                    <option
                                                        value="{{ $i }}"
                                                        class="tw-bg-white tw-text-gray-600">Angkatan {{ $i-- }}</option>
                                                    @endwhile
                                                @endfor
                                            </select>

                                            {{-- <input name="angkatan" type="hidden" value="{{ $_GET['angkatan'] }}"> --}}

                                            @if (isset($_GET['search']))
                                                <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                                            @endif

                                            @if (isset($_GET['nis_siswa']))
                                                <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['nisn_siswa']))
                                                <input name="nisn_siswa" value="{{ $_GET['nisn_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['nama_siswa']))
                                                <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['jenis_kelamin']))
                                                <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}"
                                                    type="hidden">
                                            @endif
                                            @if (isset($_GET['KelasId']))
                                                <input name="KelasId" value="{{ $_GET['KelasId'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['sort_by']))
                                                <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['sort']))
                                                <input name="sort" value="{{ $_GET['sort'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['dibuatTglDari']))
                                                <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}"
                                                    type="hidden">
                                            @endif
                                            @if (isset($_GET['dibuatTglKe']))
                                                <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}"
                                                    type="hidden">
                                            @endif
                                            @if (isset($_GET['thn_ajaran']))
                                                <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden">
                                            @endif

                                            <div class="tw-flex tw-justify-center tw-mt-3">
                                                <button type="submit"
                                                    class="tw-text-white tw-bg-sims-new-500 hover:tw-bg-sims-new-700 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-sims-new-300 tw-font-medium tw-rounded-lg tw-text-sm tw-inline-flex tw-items-center tw-py-2.5 tw-text-center tw-mr-2 tw-px-6">Ekspor</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" data-modal-toggle="export-excel" title="Ekspor ke excel"><i
                                class="fa-solid fa-file-excel btn-export"></i></button>

                        <div id="export-excel" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed  z-50 md:tw-inset-0 h-modal md:h-full">
                            <div class="tw-relative tw-p-4 tw-w-full tw-max-w-md tw-h-full md:tw-h-auto">
                                <div class="tw-relative tw-bg-white tw-rounded-lg tw-shadow dark:tw-bg-slate-100">
                                    <button type="button"
                                        class="tw-absolute tw-top-3 tw-right-2.5 tw-text-gray-400 tw-bg-transparent hover:tw-bg-gray-200 hover:tw-text-gray-900 tw-rounded-lg tw-text-sm tw-p-1.5 tw-ml-auto tw-inline-flex tw-items-center dark:hover:tw-bg-gray-800 dark:hover:tw-text-white"
                                        data-modal-toggle="export-excel">
                                        <svg aria-hidden="true" class="tw-w-5 tw-h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="tw-sr-only">Close modal</span>
                                    </button>
                                    <div class="tw-p-6">
                                        <div
                                            class="tw-mb-8 tw-mt-5 tw-flex tw-justify-center tw-text-2xl tw-font-semibold tw-text-sims-new-500">
                                            Ekspor Excel
                                        </div>
                                        <form action="/alumni-excel/all" method="" class="tw-flex tw-flex-col">
                                            <div class="tw-flex tw-justify-center tw-mb-4">
                                                <div
                                                    class="tw-my-auto tw-text-basic-700 tw-mr-2 tw-font-normal tw-text-lg tw-font-satoshi">
                                                    Ekspor</div>

                                                <input name="perPage"
                                                    @if (!empty($_GET['perPage'])) value="{{ $_GET['perPage'] }}" @endif
                                                    type="number"
                                                    class="tw-px-2 tw-w-16 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-300 tw-border-gray-300 tw-peer tw-font-bold  bg-transparent tw-appearance-none tw-block">

                                                <div
                                                    class="tw-my-auto tw-ml-2 tw-font-satoshi tw-font-normal tw-text-lg tw-text-basic-700">
                                                    data</div>
                                            </div>

                                            <div class="tw-flex tw-justify-center tw-mb-3">
                                                <div
                                                    class="tw-my-auto tw-text-basic-700 tw-mr-2 tw-font-normal tw-text-lg tw-font-satoshi">
                                                    Page</div>
                                                <input type="number" name="page"
                                                    @if (!empty($_GET['page'])) value="{{ $_GET['page'] }}" @endif
                                                    class="tw-px-2 tw-w-16 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-300 tw-border-gray-300 tw-peer tw-font-bold  bg-transparent tw-appearance-none tw-block">
                                            </div>

                                            <select id="show-angkatan"
                                                name="angkatan"
                                                class="tw-text-sims-new-500 tw-text-lg tw-mb-3 hover:tw-text-white tw-font-satoshi focus:tw-ring-0 focus:tw-outline-none tw-font-medium tw-rounded-lg tw-px-4 tw-py-1 tw-ml-8 tw-text-center tw-inline-flex tw-items-center dark:tw-bg-white dark:hover:tw-bg-sims-new-500 tw-shadow-md tw-transition-all tw-ease-in-out"
                                                style="cursor: pointer;">
                                                <option
                                                    value=""
                                                    class="tw-bg-white tw-text-gray-600">- Semua Angkatan -</option>
                                                @php $n = 2018 @endphp
                                                @for ($i = \Carbon\Carbon::now()->year; $i > 2018; $i--)
                                                    @while ($i != $n - 1)
                                                    <option
                                                        value="{{ $i }}"
                                                        class="tw-bg-white tw-text-gray-600">Angkatan {{ $i-- }}</option>
                                                    @endwhile
                                                @endfor
                                            </select>

                                            @if (isset($_GET['search']))
                                                <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                                            @endif

                                            @if (isset($_GET['nis_siswa']))
                                                <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['nisn_siswa']))
                                                <input name="nisn_siswa" value="{{ $_GET['nisn_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['nama_siswa']))
                                                <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['jenis_kelamin']))
                                                <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}"
                                                    type="hidden">
                                            @endif
                                            @if (isset($_GET['KelasId']))
                                                <input name="KelasId" value="{{ $_GET['KelasId'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['sort_by']))
                                                <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['sort']))
                                                <input name="sort" value="{{ $_GET['sort'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['dibuatTglDari']))
                                                <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}"
                                                    type="hidden">
                                            @endif
                                            @if (isset($_GET['dibuatTglKe']))
                                                <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}"
                                                    type="hidden">
                                            @endif
                                            @if (isset($_GET['thn_ajaran']))
                                                <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden">
                                            @endif

                                            <div class="tw-flex tw-justify-center tw-mt-3">
                                                <button type="submit"
                                                    class="tw-text-white tw-bg-sims-new-500 hover:tw-bg-sims-new-700 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-sims-new-300 tw-font-medium tw-rounded-lg tw-text-sm tw-inline-flex tw-items-center tw-py-2.5 tw-text-center tw-mr-2 tw-px-6">Ekspor</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" data-modal-toggle="export-pdf" title="Ekspor ke PDF"><i
                                class="fa-solid fa-file-pdf btn-export tw-mr-7"></i></button>

                        <div id="export-pdf" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed  z-50 md:tw-inset-0 h-modal md:h-full">
                            <div class="tw-relative tw-p-4 tw-w-full tw-max-w-md tw-h-full md:tw-h-auto">
                                <div class="tw-relative tw-bg-white tw-rounded-lg tw-shadow dark:tw-bg-slate-100">
                                    <button type="button"
                                        class="tw-absolute tw-top-3 tw-right-2.5 tw-text-gray-400 tw-bg-transparent hover:tw-bg-gray-200 hover:tw-text-gray-900 tw-rounded-lg tw-text-sm tw-p-1.5 tw-ml-auto tw-inline-flex tw-items-center dark:hover:tw-bg-gray-800 dark:hover:tw-text-white"
                                        data-modal-toggle="export-pdf">
                                        <svg aria-hidden="true" class="tw-w-5 tw-h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="tw-sr-only">Close modal</span>
                                    </button>
                                    <div class="tw-p-6">
                                        <div
                                            class="tw-mb-8 tw-mt-5 tw-flex tw-justify-center tw-text-2xl tw-font-semibold tw-text-sims-new-500">
                                            Ekspor PDF
                                        </div>
                                        <form action="/alumni-pdf/all" method="" class="tw-flex tw-flex-col">
                                            <div class="tw-flex tw-justify-center tw-mb-4">
                                                <div
                                                    class="tw-my-auto tw-text-basic-700 tw-mr-2 tw-font-normal tw-text-lg tw-font-satoshi">
                                                    Ekspor</div>

                                                <input name="perPage"
                                                    @if (!empty($_GET['perPage'])) value="{{ $_GET['perPage'] }}" @endif
                                                    type="number"
                                                    class="tw-px-2 tw-w-16 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-300 tw-border-gray-300 tw-peer tw-font-bold  bg-transparent tw-appearance-none tw-block">

                                                <div
                                                    class="tw-my-auto tw-ml-2 tw-font-satoshi tw-font-normal tw-text-lg tw-text-basic-700">
                                                    data</div>
                                            </div>

                                            <div class="tw-flex tw-justify-center tw-mb-3">
                                                <div
                                                    class="tw-my-auto tw-text-basic-700 tw-mr-2 tw-font-normal tw-text-lg tw-font-satoshi">
                                                    Page</div>
                                                <input type="number" name="page"
                                                    @if (!empty($_GET['page'])) value="{{ $_GET['page'] }}" @endif
                                                    class="tw-px-2 tw-w-16 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-300 tw-border-gray-300 tw-peer tw-font-bold  bg-transparent tw-appearance-none tw-block">
                                            </div>
                                            
                                            <select id="show-angkatan"
                                                name="angkatan"
                                                class="tw-text-sims-new-500 tw-text-lg tw-mb-3 hover:tw-text-white tw-font-satoshi focus:tw-ring-0 focus:tw-outline-none tw-font-medium tw-rounded-lg tw-px-4 tw-py-1 tw-ml-8 tw-text-center tw-inline-flex tw-items-center dark:tw-bg-white dark:hover:tw-bg-sims-new-500 tw-shadow-md tw-transition-all tw-ease-in-out"
                                                style="cursor: pointer;">
                                                <option
                                                    value=""
                                                    class="tw-bg-white tw-text-gray-600">- Semua Angkatan -</option>
                                                @php $n = 2018 @endphp
                                                @for ($i = \Carbon\Carbon::now()->year; $i > 2018; $i--)
                                                    @while ($i != $n - 1)
                                                    <option
                                                        value="{{ $i }}"
                                                        class="tw-bg-white tw-text-gray-600">Angkatan {{ $i-- }}</option>
                                                    @endwhile
                                                @endfor
                                            </select>

                                            @if (isset($_GET['search']))
                                                <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                                            @endif

                                            @if (isset($_GET['nis_siswa']))
                                                <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['nisn_siswa']))
                                                <input name="nisn_siswa" value="{{ $_GET['nisn_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['nama_siswa']))
                                                <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['jenis_kelamin']))
                                                <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}"
                                                    type="hidden">
                                            @endif
                                            @if (isset($_GET['KelasId']))
                                                <input name="KelasId" value="{{ $_GET['KelasId'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['sort_by']))
                                                <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['sort']))
                                                <input name="sort" value="{{ $_GET['sort'] }}" type="hidden">
                                            @endif
                                            @if (isset($_GET['dibuatTglDari']))
                                                <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}"
                                                    type="hidden">
                                            @endif
                                            @if (isset($_GET['dibuatTglKe']))
                                                <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}"
                                                    type="hidden">
                                            @endif
                                            @if (isset($_GET['thn_ajaran']))
                                                <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden">
                                            @endif

                                            <div class="tw-flex tw-justify-center tw-mt-3">
                                                <button type="submit"
                                                    class="tw-text-white tw-bg-sims-new-500 hover:tw-bg-sims-new-700 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-sims-new-300 tw-font-medium tw-rounded-lg tw-text-sm tw-inline-flex tw-items-center tw-py-2.5 tw-text-center tw-mr-2 tw-px-6">Ekspor</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>
        @endif

        @if (isset($alumni))
            <div class="tw-overflow-x-auto tw-relative tw-mt-7">
                <table class="tw-w-full tw-text-lg tw-text-center tw-font-satoshi tw-text-bluewood-900">
                    <thead class="tw-border-y">
                        <tr>
                            <th scope="col" class="tw-py-5 tw-px-6">NIS</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama Peserta Didik</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="tw-text-base">
                        @foreach ($alumni as $key => $a)
                            <tr class="tw-bg-white">
                                <td class="tw-py-6 tw-px-6">{{ $a->nis_siswa }}</td>
                                <td class="tw-py-6 tw-px-6">{{ $a->nisn_siswa }}</td>
                                <td class="tw-py-6 tw-px-6">{{ $a->nama_siswa }}</td>
                                <td class="tw-py-6 tw-px-6">{{ $a->jenis_kelamin }}</td>
                                <td class="tw-py-6 tw-px-6">{{ $a->KelasId }}</td>
                                <td>
                                    @can('manage-induk')
                                        <a href="/edit-siswa/{{ $a->nis_siswa }}" title="Edit data"
                                            class="tw-text-kuning-500  hover:tw-text-white hover:tw-bg-kuning-500 hover:tw-shadow-md tw-transition-all tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                            <i class="fa-solid fa-pen-to-square"></i></a>
                                        </a>
                                    @endcan
                                    <a href="/detail/{{ $a->nis_siswa }}" title="Lihat detail alumni"
                                        class="tw-text-gray-400  hover:tw-text-white hover:tw-bg-gray-400 hover:tw-shadow-md tw-transition-all tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            {{-- pagination --}}
            <div class="tw-flex tw-justify-center tw-rounded-b-lg">

                @if ($response->prev_page_url)
                    <div class="tw-float-right tw-py-5">
                        <a href="{{ $response->prev_page_url }}"
                            class="tw-transition-all tw-text-sims-new-500 hover:tw-bg-sims-new-500 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i
                                class="fa-solid fa-chevron-left"></i></a>
                    </div>
                @else
                    <div class="tw-float-right tw-py-5">
                        <a
                            class="tw-text-sims-new-600 hover:tw-text-sims-new-600 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i
                                class="fa-solid fa-chevron-left"></i></a>
                    </div>
                @endif

                <div class="tw-py-3 tw-my-auto tw-h-min tw-flex tw-justify-center">
                    <form action={{ isset($_GET['jurusan']) ? '/data-alumni' : '/data-alumni/all' }}
                        class="tw-text-center">

                        @if (isset($_GET['jurusan']))
                            <input name="jurusan" value="{{ $_GET['jurusan'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['angkatan']))
                            <input name="angkatan" value="{{ $_GET['angkatan'] }}" type="hidden">
                        @endif

                        <input type="number" name="page"
                            class="tw-bg-white tw-border tw-border-slate-200 tw-w-1/2 tw-font-satoshi tw-font-medium tw-text-slate-500 tw-rounded-md tw-text-center focus:tw-ring-gray-200 focus:tw-border-gray-200 no-spin"
                            min="1" @if (isset($_GET['page'])) value="{{ $_GET['page'] }}" @else @endif>


                        @if (isset($_GET['perPage']))
                            <input name="perPage" value="{{ $_GET['perPage'] }}" type="hidden">
                        @endif

                        @if (isset($_GET['search']))
                            <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                        @endif

                        @if (isset($_GET['nis_siswa']))
                            <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['nisn_siswa']))
                            <input name="nisn_siswa" value="{{ $_GET['nisn_siswa'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['nama_siswa']))
                            <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['jenis_kelamin']))
                            <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['KelasId']))
                            <input name="KelasId" value="{{ $_GET['KelasId'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['sort_by']))
                            <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['sort']))
                            <input name="sort" value="{{ $_GET['sort'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['dibuatTglDari']))
                            <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['dibuatTglKe']))
                            <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['thn_ajaran']))
                            <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden">
                        @endif

                    </form>
                </div>

                <div class="tw-float-right tw-py-5">
                    @if ($response->to >= $total)
                        <a
                            class="tw-text-sims-new-600 hover:tw-text-sims-new-600 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i
                                class="fa-solid fa-chevron-right"></i></a>
                    @else
                        <a href="{{ $response->next_page_url }}"
                            class="tw-transition-all tw-text-sims-new-500 hover:tw-bg-sims-new-500 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i
                                class="fa-solid fa-chevron-right"></i></a>
                    @endif
                </div>
            </div>
        @else
            <div class="tw-flex tw-justify-center">
                <div class="tw-w-1/3 tw-my-28">
                    <img src="{{ URL::asset('assets/img/search-not-found.png') }}" class="-tw-mb-1" alt="g ada dek">
                    <div class="tw-font-satoshi tw-text-sims-new-600 tw-font-bold tw-text-3xl tw-text-center tw-mt-8">
                        Data tidak dapat ditemukan.
                    </div>
                </div>
            </div>
            {{-- pagination --}}
            <div class="tw-flex tw-justify-center tw-rounded-b-lg">

                @if ($response->prev_page_url)
                    <div class="tw-float-right tw-py-5">
                        <a href="{{ $response->prev_page_url }}"
                            class="tw-transition-all tw-text-sims-new-500 hover:tw-bg-sims-new-500 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i
                                class="fa-solid fa-chevron-left"></i></a>
                    </div>
                @else
                    <div class="tw-float-right tw-py-5">
                        <a
                            class="tw-text-sims-new-600 hover:tw-text-sims-new-600 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i
                                class="fa-solid fa-chevron-left"></i></a>
                    </div>
                @endif

                <div class="tw-py-3 tw-my-auto tw-h-min tw-flex tw-justify-center">
                    <form action="/data-alumni" class="tw-text-center">



                        <input type="number" name="page"
                            class="tw-bg-white tw-border tw-border-slate-200 tw-w-1/2 tw-font-satoshi tw-font-medium tw-text-slate-500 tw-rounded-md tw-text-center focus:tw-ring-gray-200 focus:tw-border-gray-200 no-spin"
                            min="1" @if (isset($_GET['page'])) value="{{ $_GET['page'] }}" @endif>

                        @if (isset($_GET['perPage']))
                            <input name="perPage" value="{{ $_GET['perPage'] }}" type="hidden">
                        @endif

                        @if (isset($_GET['search']))
                            <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                        @endif

                        @if (isset($_GET['nis_siswa']))
                            <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['nisn_siswa']))
                            <input name="nisn_siswa" value="{{ $_GET['nisn_siswa'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['nama_siswa']))
                            <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['jenis_kelamin']))
                            <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['KelasId']))
                            <input name="KelasId" value="{{ $_GET['KelasId'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['sort_by']))
                            <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['sort']))
                            <input name="sort" value="{{ $_GET['sort'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['dibuatTglDari']))
                            <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['dibuatTglKe']))
                            <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}" type="hidden">
                        @endif
                        @if (isset($_GET['thn_ajaran']))
                            <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden">
                        @endif

                    </form>
                </div>

                <div class="tw-float-right tw-py-5">
                    @if ($response->to >= $total)
                        <a
                            class="tw-text-sims-new-600 hover:tw-text-sims-new-600 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i
                                class="fa-solid fa-chevron-right"></i></a>
                    @else
                        <a href="{{ $response->next_page_url }}"
                            class="tw-transition-all tw-text-sims-new-500 hover:tw-bg-sims-new-500 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i
                                class="fa-solid fa-chevron-right"></i></a>
                    @endif
                </div>
            </div>
        @endif
    </div>

    <script>
        $(function() {
            // bind change event to select
            $('#show-data-perpage').on('change', function() {
                var url = $(this).val(); // get selected value
                if (url) { // require a URL
                    window.location = url; // redirect
                }
                return false;
            });
        });

        $(function() {
            // bind change event to select
            $('#show-angkatan').on('change', function() {
                var url = $(this).val(); // get selected value
                if (url) { // require a URL
                    window.location = url; // redirect
                }
                return false;
            });
        });
    </script>

    <script src="index.js"></script>
    <script>
        function showTooltip(flag) {
            switch (flag) {
                case 1:
                    document.getElementById("tooltip1").classList.remove("hidden");
                    break;
                case 2:
                    document.getElementById("tooltip2").classList.remove("hidden");
                    break;
                case 3:
                    document.getElementById("tooltip3").classList.remove("hidden");
                    break;
            }
        }

        function hideTooltip(flag) {
            switch (flag) {
                case 1:
                    document.getElementById("tooltip1").classList.add("hidden");
                    break;
                case 2:
                    document.getElementById("tooltip2").classList.add("hidden");
                    break;
                case 3:
                    document.getElementById("tooltip3").classList.add("hidden");
                    break;
            }
        }
    </script>
@endsection

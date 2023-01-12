@extends('layouts.main-new')

@section('content')

<style>
    .no-spin::-webkit-inner-spin-button, .no-spin::-webkit-outer-spin-button {
    -webkit-appearance: none !important;
    margin: 0 !important;
    }
</style>

{{-- error msg --}}
@if($status == 'error')
    <div class="tw-flex tw-justify-center">
        <div class="tw-block tw-my-32 tw-font-pop">
            <img src="{{asset('assets/img/error_img.svg')}}" alt="error_img">
            <h1 class="tw-flex tw-justify-center tw-font-bold tw-mt-6 tw-text-sims-new-500">404 Not Found</h1>
            <p class="tw-flex tw-justify-center tw-font-pop tw-text-md tw-font-semibold tw-text-gray-400 tw-mt-5">{{ $message }}</p>
            <p class="tw-flex tw-justify-center tw-text-gray-400 tw-text-sm">Coba hubungi admin untuk penyelesaian lebih lanjut.</p>
        </div>
    </div>
@else

<div class="tw-mt-10">
    <div class="tw-flex tw-ml-8 tw-mr-7 lg:tw-flex-row sm:tw-flex-col lg:tw-justify-between lg:tw-gap-5">
        <div class="tw-flex tw-flex-col">
            <h4 class="sims-heading-3xl">Data Induk Siswa</h4>
            @if( ! empty($jurusan) && ! empty($kelas))
            <h6 class="sims-heading-md-black">{{ $jurusan }} - Kelas {{ $kelas }}</h6>
            @else
            <h6 class="sims-heading-md-black">Seluruh Kelas</h6>
            @endif
        </div>

        @can('tata usaha')
        <div class="tw-flex md:tw-justify-center tw-items-center md:-tw-mb-8">
            @if( ! empty($jurusan) && ! empty($kelas))
            <a href="/data-induk-print/{{ $jurusan }}/{{ $kelas }}" target="__blank" title="Print"><i class="fa-solid fa-print btn-export"></i></a>
            <a href="/data-induk-excel/{{ $jurusan }}/{{ $kelas }}" title="Export ke Excel"><i class="fa-solid fa-file-excel btn-export"></i></a>
            <a href="/data-induk-pdf/{{ $jurusan }}/{{ $kelas }}" title="Export ke PDF"><i class="fa-solid fa-file-pdf btn-export tw-mr-0"></i></a>
            @else
            <a href="/data-induk-print" target="__blank" title="Print"><i class="fa-solid fa-print btn-export"></i></a>
            <a href="/data-induk-excel" title="Export ke Excel"><i class="fa-solid fa-file-excel btn-export"></i></a>
            <a href="/data-induk-pdf" title="Export ke PDF"><i class="fa-solid fa-file-pdf btn-export tw-mr-0"></i></a>
            @endif
        </div>
        @endcan
    </div>

        <section class="tw-flex lg:tw-flex-row sm:tw-flex-col tw-justify-between sm:tw-flex-wrap sm:tw-gap-5 tw-ml-8 tw-mt-8">
            <div class="tw-flex lg:tw-flex-row sm:tw-flex-col tw-my-auto">
                @if( ! empty($jurusan) && ! empty($kelas))
                <form action="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}"> 

                    <div class="relative tw-border-[1.5px] tw-border-gray-300 tw-rounded-xl focus:tw-ring-sims-new-500">
                        <input name="angkatan" type="hidden" value="{{ $_GET['angkatan'] }}">

                        <input name="page" value="1" type="hidden">
                        <input name="perPage" value="10" type="hidden">
                        <input type="text" id="search" name="search" class="tw-block tw-py-1 tw-px-5 tw-border-none tw-rounded-xl" value="{{ request()->search }}">
    
                        @if(isset($_GET['nis_siswa'])) <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden"> @endif
                        @if(isset($_GET['nisn_siswa'])) <input name="nisn_siswa" value="{{ $_GET['nisn_siswa'] }}" type="hidden"> @endif
                        @if(isset($_GET['nama_siswa'])) <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden"> @endif
                        @if(isset($_GET['jenis_kelamin'])) <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}" type="hidden"> @endif
                        @if(isset($_GET['KelasId'])) <input name="KelasId" value="{{ $_GET['KelasId'] }}" type="hidden"> @endif
                        @if(isset($_GET['sort_by'])) <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden"> @endif
                        @if(isset($_GET['sort'])) <input name="sort" value="{{ $_GET['sort'] }}" type="hidden"> @endif
                        @if(isset($_GET['dibuatTglDari'])) <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}" type="hidden"> @endif
                        @if(isset($_GET['dibuatTglKe'])) <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}" type="hidden"> @endif
                        @if(isset($_GET['thn_ajaran'])) <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden"> @endif
    
                        <i class="fa-thin fa-magnifying-glass tw-absolute tw-text-gray-400 right-0 tw-inset-y-1.5 tw-pr-5 tw-text-sm"></i>
                    </div>
                </form>
                @else
                <form action="/data-induk-siswa"> 
                    <div class="relative tw-border-[1.5px] tw-border-gray-300 tw-rounded-xl focus:tw-ring-sims-new-500">
                        
                        <input name="page" value="1" type="hidden">
                        <input name="perPage" value="10" type="hidden">
                        <input type="text" id="search" name="search" class="tw-block tw-py-1 tw-px-5 tw-border-none tw-rounded-xl" value="{{ request()->search }}">
    
                        @if(isset($_GET['nis_siswa'])) <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden"> @endif
                        @if(isset($_GET['nisn_siswa'])) <input name="nisn_siswa" value="{{ $_GET['nisn_siswa'] }}" type="hidden"> @endif
                        @if(isset($_GET['nama_siswa'])) <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden"> @endif
                        @if(isset($_GET['jenis_kelamin'])) <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}" type="hidden"> @endif
                        @if(isset($_GET['KelasId'])) <input name="KelasId" value="{{ $_GET['KelasId'] }}" type="hidden"> @endif
                        @if(isset($_GET['sort_by'])) <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden"> @endif
                        @if(isset($_GET['sort'])) <input name="sort" value="{{ $_GET['sort'] }}" type="hidden"> @endif
                        @if(isset($_GET['dibuatTglDari'])) <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}" type="hidden"> @endif
                        @if(isset($_GET['dibuatTglKe'])) <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}" type="hidden"> @endif
                        @if(isset($_GET['thn_ajaran'])) <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden"> @endif
    
                        <i class="fa-thin fa-magnifying-glass tw-absolute tw-text-gray-400 right-0 tw-inset-y-1.5 tw-pr-5 tw-text-sm"></i>
                    </div>
                </form>
                @endif
                <div class="tw-flex tw-my-auto">
                    <div class="tw-my-auto tw-text-basic-700 tw-ml-8 tw-mr-2 tw-font-normal tw-font-satoshi">Tampilkan</div>
                    @if( ! empty($jurusan) && ! empty($kelas))

                    <select name="show-data-perpage" id="show-data-perpage" class="tw-px-5 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-200 tw-peer tw-font-bold  bg-transparent tw-border-0 tw-border-b-2 tw-border-gray-200 tw-appearance-none tw-block">
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?angkatan={{ $_GET['angkatan'] }}&page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=10&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?angkatan={{ $_GET['angkatan'] }}&page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=25&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?angkatan={{ $_GET['angkatan'] }}&page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=50&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?angkatan={{ $_GET['angkatan'] }}&page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=100&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                    </select>
                    @else
                    <select name="show-data-perpage" id="show-data-perpage" class="tw-px-5 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-200 tw-peer tw-font-bold  bg-transparent tw-border-0 tw-border-b-2 tw-border-gray-200 tw-appearance-none tw-block">
                            <option value="/data-induk-siswa?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=10&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                            <option value="/data-induk-siswa?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=25&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                            <option value="/data-induk-siswa?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=50&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                            <option value="/data-induk-siswa?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=100&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=@isset($_GET['thn_ajaran']){{ $_GET['thn_ajaran'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                    </select>
                    @endif
                    <div class="tw-my-auto tw-mx-2 tw-font-satoshi tw-font-normal tw-text-basic-700">data</div>


                    {{-- FILTER DROPDOWN --}}
                    <button id="dropdownToggleButton" data-dropdown-toggle="filter-dd" class="tw-text-sims-500 hover:tw-text-white tw-font-satoshi focus:tw-ring-0 focus:tw-outline-none tw-font-medium tw-rounded-md tw-text-sm tw-px-5 tw-py-0.5 tw-ml-8 tw-text-center tw-inline-flex tw-items-center dark:tw-bg-white dark:hover:tw-bg-sims-500 tw-shadow-md tw-transition-all tw-ease-in-out" type="button">Filters <i class="tw-text-xl tw-ml-5 fa-duotone fa-sliders-simple"></i></button>

                    <!-- filter menu -->
                    <div id="filter-dd" class="hidden tw-z-10 tw-w-72 tw-bg-white tw-rounded tw-divide-y tw-divide-gray-100 tw-shadow-md">
                        <div class="tw-font-pop tw-text-xs tw-text-gray-400 tw-my-2 tw-mx-5">Cari berdasarkan...</div>
                        
                        @if( ! empty($jurusan) && ! empty($kelas))
                        <form action="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}">
                        <input name="angkatan" type="hidden" value="{{ $_GET['angkatan'] }}">
                        @else
                        <form action="/data-induk-siswa">
                        @endif


                        @if(isset($_GET['page']))
                        <input type="hidden" name="page" value="{{ $_GET['page'] }}"> 
                        @endif
                        @if(isset($_GET['perPage']))
                        <input type="hidden" name="perPage" value="{{ $_GET['perPage'] }}"> 
                        @endif
                        @if(isset($_GET['search']))
                        <input type="hidden" name="search" value="{{ $_GET['search'] }}"> 
                        @endif
                        
                        
                        <ul class="tw-p-3 tw-space-y-1 tw-text-sm tw-text-gray-700" aria-labelledby="dropdownToggleButton">
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="nis_siswa" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['nis_siswa']) @if($_GET['nis_siswa'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">NIS</span>
                                  </label>
                                </div>
                            </li>
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="nisn_siswa" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['nisn_siswa']) @if($_GET['nisn_siswa'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">NISN</span>
                                  </label>
                                </div>
                            </li>
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="nama_siswa" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['nama_siswa']) @if($_GET['nama_siswa'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Nama Siswa</span>
                                  </label>
                                </div>
                            </li>
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="jenis_kelamin" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['jenis_kelamin']) @if($_GET['jenis_kelamin'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Gender</span>
                                  </label>
                                </div>
                            </li>
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="KelasId" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['KelasId']) @if($_GET['KelasId'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Kelas</span>
                                  </label>
                                </div>
                            </li>
                        </ul>

                        <div class="tw-border-t tw-border-gray-100 tw-mb-3"></div>

                        <div class="tw-font-pop tw-text-xs tw-text-gray-400 tw-my-2 tw-mx-5">Urutkan berdasarkan...</div>
                        <div class="tw-mx-5 tw-flex tw-justify-center">
                            <select class="input-data tw-text-xs" id="sort_by" name="sort_by" required>
                                
                                // tampilkan option yg di select berdasarkan parameter sort_by
                                @if(isset($_GET['sort_by']))
                                <option value="{{ $_GET['sort_by'] }}">
                                    @if($_GET['sort_by'] == 'nis_siswa')
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
                                <option value="nama_siswa">Nama Siswa</option>
                                <option value="jenis_kelamin">Gender</option>
                                <option value="KelasId">Kelas</option>
                            </select>
                        </div>
                        <div class="tw-flex tw-my-5 tw-gap-3 tw-justify-center tw-mx-auto">
                            <div class="tw-flex tw-gap-1">
                                <label for="ascending" class="tw-font-pop tw-text-xs tw-text-gray-400">Naik</label>
                                <input class="tw-my-auto tw-bg-gray-200 focus:ring-0 focus:ring-offset-0" style="height:15px; width:15px; border: none" type="radio" id="ascending" name="sort" value="ASC" @isset($_GET['sort']) @if($_GET['sort'] == "ASC") ? checked : @endif @endisset>
                            </div>
                            <div class="tw-flex tw-gap-1">
                                <label for="descending" class="tw-font-pop tw-text-xs tw-text-gray-400">Menurun</label>
                                <input class="tw-my-auto tw-bg-gray-200 focus:ring-0 focus:ring-offset-0" style="height:15px; width:15px; border: none" type="radio" id="descending" name="sort" value="DESC" @isset($_GET['sort']) @if($_GET['sort'] == "DESC") ? checked : @endif @endisset>
                            </div>
                        </div>

                        @if(isset($_GET['dibuatTglDari'])) <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}" type="hidden"> @endif
                        @if(isset($_GET['dibuatTglKe'])) <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}" type="hidden"> @endif
                        @if(isset($_GET['thn_ajaran'])) <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden"> @endif

                        <div class="tw-flex tw-justify-center">
                            <button type="submit" class="tw-w-full tw-rounded-lg tw-mx-3 tw-font-pop tw-text-white tw-text-sm tw-font-medium tw-mb-2 tw-py-2 tw-bg-sims-new-500 hover:tw-bg-sims-500 tw-transition-all tw-ease-in-out">Simpan</button>
                        </div>
                        </form>
                    </div>
                    <!-- end filter menu -->


                    {{-- DATA PERIODIK DROPDOWN --}}
                    <button id="dropdownToggleButton" data-dropdown-toggle="periodik-dd" class="tw-text-sims-new-500 hover:tw-text-white tw-font-satoshi focus:tw-ring-0 focus:tw-outline-none tw-font-medium tw-rounded-md tw-text-sm tw-px-4 tw-py-0.5 tw-ml-4 tw-text-center tw-inline-flex tw-items-center dark:tw-bg-white dark:hover:tw-bg-sims-500 tw-shadow-md tw-transition-all tw-ease-in-out" type="button">Data Periodik <i class="fa-duotone fa-calendar tw-ml-4"></i></button>
                
                    <div id="periodik-dd" class="hidden tw-z-10 tw-w-auto tw-bg-white tw-rounded tw-divide-y tw-divide-gray-100 tw-shadow-md">
                        @if( ! empty($jurusan) && ! empty($kelas))
                        <form action="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}">
                        <input name="angkatan" type="hidden" value="{{ $_GET['angkatan'] }}">
                        @else
                        <form action="/data-induk-siswa">
                        @endif

                        @if(isset($_GET['nis_siswa'])) <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden"> @endif
                        @if(isset($_GET['nisn_siswa'])) <input name="nisn_siswa" value="{{ $_GET['nisn_siswa'] }}" type="hidden"> @endif
                        @if(isset($_GET['nama_siswa'])) <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden"> @endif
                        @if(isset($_GET['jenis_kelamin'])) <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}" type="hidden"> @endif
                        @if(isset($_GET['KelasId'])) <input name="KelasId" value="{{ $_GET['KelasId'] }}" type="hidden"> @endif
                        @if(isset($_GET['sort_by'])) <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden"> @endif
                        @if(isset($_GET['sort'])) <input name="sort" value="{{ $_GET['sort'] }}" type="hidden"> @endif
                        
                        <div class="tw-flex tw-gap-3 tw-justify-between tw-mt-5 tw-mx-5">
                            <div class="tw-absolute tw-right-4 tw-top-2">
                                <!--Code Block for white tooltip starts-->
                                <a tabindex="0" role="link" aria-label="tooltip 1" class="focus:outline-none focus:ring-gray-300 rounded-full focus:ring-offset-2 focus:ring-2 focus:bg-gray-200 relative mt-20 md:mt-0" onmouseover="showTooltip(1)" onfocus="showTooltip(1)" onmouseout="hideTooltip(1)">
                                    <div class=" cursor-pointer">
                                        <i data-tooltip-target="tooltip-animation" class="fa-regular fa-circle-question tw-text-md tw-text-sims-new-500"></i>
                                    </div>
                                    <div id="tooltip1" role="tooltip" class="z-20 w-64 absolute transition duration-150 ease-in-out left-0 ml-8 shadow-lg bg-white p-4 rounded hidden">
                                        <p class="text-sm font-bold text-gray-800 pb-1">Data periodik Data Induk</p>
                                        <p class="text-xs leading-4 text-gray-600">Data Induk periodik diambil berdasarkan tanggal </p>
                                    </div>
                                </a>
                                <!--Code Block for white tooltip ends-->
                            </div>

                            <div>
                                <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Dari tanggal</div>
                                <input class="input-data tw-text-xs tw-font-pop" id="dibuatTglDari" name="dibuatTglDari" type="date" placeholder="dd/mm/yyyy" @if(isset($_GET['dibuatTglDari'])) value="{{ $_GET['dibuatTglDari'] }}" @endif>
                            </div>
                            <div>
                                <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Ke tanggal</div>
                                <input class="input-data tw-text-xs tw-font-pop" id="dibuatTglKe" name="dibuatTglKe" type="date" placeholder="dd/mm/yyyy" @if(isset($_GET['dibuatTglKe'])) value="{{ $_GET['dibuatTglKe'] }}" @endif>
                            </div>
                        </div>

                        @if(isset($_GET['thn_ajaran'])) <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden"> @endif

                        <div class="tw-flex tw-justify-center tw-mt-3">
                            <button type="submit" class="tw-w-full tw-rounded-lg tw-mx-3 tw-font-pop tw-text-white tw-text-sm tw-font-medium tw-mb-2 tw-py-2 tw-bg-sims-new-500 hover:tw-bg-sims-500 tw-transition-all tw-ease-in-out">Simpan</button>
                        </div>
                        </form>
                    </div>

                    @if( ! empty($jurusan) && ! empty($kelas))

                    
                    @else

                    <!-- This is an example component -->
                    {{-- <div class="tw-mx-5">
                        <select id="show-tahun-ajaran" class="tw-border tw-border-none tw-text-sims-new-500 hover:tw-text-white tw-font-pop tw-text-sm tw-font-medium tw-rounded-lg tw-h-10 tw-pl-5 tw-pr-10 tw-bg-white hover:tw-bg-sims-new-500 hover:tw-border-sims-new-500 focus:tw-outline-none tw-appearance-none focus:tw-ring-0 tw-shadow-md tw-transition-all tw-ease-in-out" style="cursor: pointer;">
                        
                          @if(!empty($_GET['thn_ajaran'])) 
                            @if( ! empty($jurusan) && ! empty($kelas))
                                <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?page=1&perPage=10&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=" class="tw-bg-white tw-text-gray-600">- Semua Tahun Ajaran -</option> 
                            @else
                                <option value="/data-induk-siswa?page=1&perPage=10&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=" class="tw-bg-white tw-text-gray-600">- Semua Tahun Ajaran -</option> 
                            @endif  
                          <option selected class="tw-bg-white tw-text-gray-600">TA. {{ $_GET['thn_ajaran'] }}</option> 
                          @else
                            @if( ! empty($jurusan) && ! empty($kelas))
                                <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?page=1&perPage=10&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=" class="tw-bg-white tw-text-gray-600">- Semua Tahun Ajaran -</option> 
                            @else
                                <option value="/data-induk-siswa?page=1&perPage=10&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran=" class="tw-bg-white tw-text-gray-600">- Semua Tahun Ajaran -</option> 
                            @endif
                          @endif

                          @php $n = 2000 @endphp
                          @for ($i = \Carbon\Carbon::now()->year; $i > 2000; $i--)
                                @while($i != $n-1)
                                @if( ! empty($jurusan) && ! empty($kelas))
                                    <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?page=1&perPage=10&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran={{ $i }}" class="tw-bg-white tw-text-gray-600">TA. {{ $i-- }}</option>
                                @else
                                    <option value="/data-induk-siswa?page=1&perPage=10&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&nisn_siswa=@isset($_GET['nisn_siswa']){{ $_GET['nisn_siswa'] }}@endisset&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&KelasId=@isset($_GET['KelasId']){{ $_GET['KelasId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&dibuatTglDari=@isset($_GET['dibuatTglDari']){{ $_GET['dibuatTglDari'] }}@endisset&dibuatTglKe=@isset($_GET['dibuatTglKe']){{ $_GET['dibuatTglKe'] }}@endisset&thn_ajaran={{ $i }}" class="tw-bg-white tw-text-gray-600">TA. {{ $i-- }}</option>
                                @endif
                                @endwhile
                          @endfor
                        </select>
                    </div> --}}


                    @endif
                </div>
            </div>
            <div class="tw-flex tw-my-auto">
                @can('tata usaha')
                <button type="button" data-modal-toggle="popup-modal" class="tw-bg-sims-new-500 tw-text-white hover:tw-text-white hover:tw-bg-sims-new-700 tw-font-satoshi tw-rounded-lg tw-px-8 tw-py-2 tw-mr-7">
                    Tambah Data +
                </button>

                <div id="popup-modal" tabindex="-1"
                  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                        <div class="tw-relative tw-bg-white tw-rounded-lg tw-shadow dark:tw-bg-slate-100 tw-font-pop">
                            <button type="button"
                              class="tw-absolute tw-top-3 tw-right-2.5 tw-text-gray-400 tw-bg-transparent hover:tw-bg-gray-200 hover:tw-text-gray-900 tw-rounded-lg tw-text-sm tw-p-1.5 tw-ml-auto tw-inline-flex tw-items-center"
                              data-modal-toggle="popup-modal">
                                <svg aria-hidden="true" class="tw-w-5 tw-h-5" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd">
                                    </path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="tw-p-6">
                                <div class="tw-mb-8 tw-mt-5 tw-flex tw-justify-center tw-text-2xl tw-font-semibold tw-text-sims-new-500">
                                    Add Data
                                </div>
                                <div class="tw-gap-3 tw-grid">
                                    <a href="/tambah-data" data-modal-toggle="popup-modal"
                                      class="tw-text-white tw-justify-center tw-bg-sims-new-500 tw-w-full hover:tw-bg-sims-500 hover:tw-text-white tw-font-medium tw-text-xl tw-inline-flex tw-items-center tw-py-8 tw-text-center">
                                        Input Data
                                    </a>

                                    <button type="button" data-modal-toggle="popup-data"
                                      class="tw-text-white tw-justify-center tw-bg-[#1D6F42] tw-w-full hover:tw-bg-green-800 hover:tw-text-white tw-font-medium tw-text-xl tw-inline-flex tw-items-center tw-py-8 tw-text-center">
                                        Import data dari excel
                                    </button>

                                    <div id="popup-data" tabindex="-1"
                                      class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 md:h-full">
                                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                            <div class="tw-relative tw-mb-5 tw-bg-white tw-rounded-lg tw-shadow dark:tw-bg-slate-100 tw-font-pop">
                                                <button type="button"
                                                    class="tw-absolute tw-top-1.5 tw-right-1.5 tw-text-gray-400 tw-bg-transparent hover:tw-bg-gray-200 hover:tw-text-gray-900 tw-rounded-lg tw-text-sm tw-p-1.5 tw-ml-auto tw-inline-flex tw-items-center"
                                                    data-modal-toggle="popup-data">
                                                    <svg aria-hidden="true" class="tw-w-5 tw-h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd">
                                                        </path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="tw-px-8 tw-pb-6 tw-pt-10">
                    
                                                    <div x-data="{ files: null }" id="FileUpload" class="">
                                                        <form action="/api/siswa/import" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <label class="tw-flex tw-flex-col tw-w-full tw-h-56 tw-border-4 tw-border-admin-200 tw-border-dashed tw-justify-center tw-items-center hover:tw-bg-gray-100 hover:tw-border-gray-300 tw-px-10" for="">
                                                                <input type="file" name="uploaded_file" multiple
                                                                    class="tw-absolute tw-outline-none tw-top-10 tw-bottom-32 tw-opacity-0"
                                                                    x-on:change="files = $event.target.files; console.log($event.target.files);"
                                                                    x-on:dragover="$el.classList.add('active')" x-on:dragleave="$el.classList.remove('active')" x-on:drop="$el.classList.remove('active')"
                                                                >
                                                            
                                                                <template x-if="files !== null">
                                                                    <div class="tw-flex tw-flex-col tw-space-y-1">
                                                                        <template x-for="(_,index) in Array.from({ length: files.length })">
                                                                            <div class="tw-flex tw-flex-row tw-items-center tw-space-x-2">
                                                                                <template x-if="files[index].type.includes('audio/')"><i class="far fa-file-audio fa-fw"></i></template>
                                                                                <template x-if="files[index].type.includes('application/')"><i class="far fa-file-alt fa-fw"></i></template>
                                                                                <template x-if="files[index].type.includes('image/')"><i class="far fa-file-image fa-fw"></i></template>
                                                                                <template x-if="files[index].type.includes('video/')"><i class="far fa-file-video fa-fw"></i></template>
                                                                                <span class="tw-font-medium tw-text-gray-400" x-text="files[index].name">Uploading</span>
                                                                                <span class="tw-text-xs tw-self-end tw-text-gray-400" x-text="filesize(files[index].size)">...</span>
                                                                            </div>
                                                                        </template>
                                                                    </div>
                                                                </template>
                                                                <template x-if="files === null">
                                                                    <div class="tw-flex tw-flex-col tw-space-y-2 tw-items-center tw-justify-center">
                                                                        <svg  @click="show=false" xmlns="http://www.w3.org/2000/svg" class="tw-w-8 tw-h-8 tw-text-gray-400 group-hover:tw-text-gray-600"
                                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                                    </svg>
                                                                        <p class="tw-text-gray-700">Drag your files here or click in this area.</p>
                                                                    </div>
                                                                </template>
                                                            </label>
                                                            <div class="tw-grid tw-gap-3 tw-mt-3">
                                                                <button type="submit" class="tw-w-full tw-px-5 tw-py-2 tw-text-white tw-bg-sims-new-500 hover:tw-bg-sims-300 tw-rounded tw-shadow-xl">Import</button>
                                                                <button type="button" data-modal-toggle="popup-data" class="tw-w-full tw-px-5 tw-py-2 tw-text-white tw-bg-gray-500 hover:tw-bg-gray-400 tw-rounded tw-shadow-xl">Batal</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
    </section>

        @if(isset($siswa))
        <section class="tw-overflow-x-auto tw-relative tw-mt-7">
            <table class="tw-w-full tw-text-lg tw-text-center tw-font-satoshi tw-text-bluewood-900">
                <thead class="tw-border-y">
                    <tr>
                        <th scope="col" class="tw-py-5 tw-px-6">NIS</th>
                        <th scope="col" class="tw-py-5 tw-px-6">NISN</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Nama Peserta Didik</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Gender</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Kelas</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Aksi</th>
                    </tr>
                </thead>
                <tbody class="tw-text-base">
                    @foreach ($siswa as $s)
                        
                    <tr class="tw-bg-white">
                        <td class="tw-p-6">{{ $s->nis_siswa }}</td>
                        <td class="tw-p-6">{{ $s->nisn_siswa }}</td>
                        <td class="tw-p-6">{{ $s->nama_siswa }}</td>
                        <td class="tw-p-6">{{ $s->jenis_kelamin }}</td>
                        <td class="tw-p-6">{{ $s->KelasId }}</td>
                        <td class="tw-flex tw-justify-center tw-gap-3 tw-py-2">
                            @cannot('kesiswaan')
                            <a href="/rekap-nilai/{{ $s->nis_siswa }}" class="tw-text-sims-new-500 tw-justify-center tw-items-center  hover:tw-text-white hover:tw-bg-sims-new-500 hover:tw-shadow-md tw-rounded-lg tw-text-xl tw-py-2 tw-px-3 tw-w-12 tw-transition-all" title="Rekap Nilai">
                                <i class="fa-regular fa-clipboard"></i>
                            </a>
                            @endcannot
                            @can('tata usaha')
                            <a href="/edit-siswa/{{ $s->nis_siswa }}" class="tw-text-kuning-500  hover:tw-text-white hover:tw-bg-kuning-500 hover:tw-shadow-md tw-rounded-lg tw-text-xl tw-py-2 tw-px-3 tw-w-12 tw-transition-all" title="Edit Data Siswa">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            @endcan
                            <a href="/detail/{{ $s->nis_siswa }}" class="tw-text-gray-400  hover:tw-text-white hover:tw-bg-gray-400 hover:tw-shadow-md tw-rounded-lg tw-text-xl tw-py-2 tw-px-3 tw-w-12 tw-transition-all" title="Detail Data">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        @else
        <div class="tw-flex tw-justify-center">
            <div class="tw-w-1/3 tw-my-28">
                <img src="{{ URL::asset('assets/img/search-not-found.png') }}" class="-tw-mb-1" alt="g ada dek">
                <div class="tw-font-pop tw-text-sims-500 tw-font-bold tw-text-3xl tw-text-center tw-mt-8">
                    Data tidak dapat ditemukan.
                </div>
            </div>
        </div>
        @endif

        {{-- pagination --}}
        <div class="tw-flex tw-justify-center tw-rounded-b-lg">
            
            @if($response->prev_page_url)
            <div class="tw-float-right tw-py-5">
                <a href="{{ $response->prev_page_url }}" class="tw-transition-all tw-text-sims-new-500 hover:tw-bg-sims-new-500 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-solid fa-chevron-left"></i></a>
            </div>
            @else
            <div class="tw-float-right tw-py-5">
                <a class="tw-text-sims-new-700 hover:tw-text-sims-new-700 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-solid fa-chevron-left"></i></a>
            </div>
            @endif

            @if( ! empty($jurusan) && ! empty($kelas))
            <div class="tw-py-3 tw-my-auto tw-h-min tw-flex tw-justify-center">
                <form action="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}" class="tw-text-center">

                    <input type="number" name="page" class="tw-bg-white tw-border tw-border-slate-200 tw-w-1/2 tw-font-pop tw-font-medium tw-text-slate-500 tw-rounded-md tw-text-center focus:tw-ring-gray-200 focus:tw-border-gray-200 no-spin" min="1" @if(isset($_GET['page'])) value="{{ $_GET['page'] }}"@endif>
                    
                    <input name="angkatan" type="hidden" value="{{ $_GET['angkatan'] }}">
                    
                    @if(isset($_GET['perPage']))
                    <input name="perPage" value="{{ $_GET['perPage'] }}" type="hidden">
                    @endif

                    @if(isset($_GET['search']))
                    <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                    @endif

                    @if(isset($_GET['nis_siswa'])) <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden"> @endif
                    @if(isset($_GET['nisn_siswa'])) <input name="nisn_siswa" value="{{ $_GET['nisn_siswa'] }}" type="hidden"> @endif
                    @if(isset($_GET['nama_siswa'])) <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden"> @endif
                    @if(isset($_GET['jenis_kelamin'])) <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}" type="hidden"> @endif
                    @if(isset($_GET['KelasId'])) <input name="KelasId" value="{{ $_GET['KelasId'] }}" type="hidden"> @endif
                    @if(isset($_GET['sort_by'])) <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden"> @endif
                    @if(isset($_GET['sort'])) <input name="sort" value="{{ $_GET['sort'] }}" type="hidden"> @endif
                    @if(isset($_GET['dibuatTglDari'])) <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}" type="hidden"> @endif
                    @if(isset($_GET['dibuatTglKe'])) <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}" type="hidden"> @endif
                    @if(isset($_GET['thn_ajaran'])) <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden"> @endif
                </form>
            </div>
            @else
            <div class="tw-py-3 tw-my-auto tw-h-min tw-flex tw-justify-center">
                <form action="/data-induk-siswa" class="tw-text-center">

                    <input type="number" name="page" class="tw-bg-white tw-border tw-border-slate-200 tw-w-1/2 tw-font-pop tw-font-medium tw-text-slate-500 tw-rounded-md tw-text-center focus:tw-ring-gray-200 focus:tw-border-gray-200 no-spin" min="1" @if(isset($_GET['page'])) value="{{ $_GET['page'] }}"@endif>
                    
                    @if(isset($_GET['perPage']))
                    <input name="perPage" value="{{ $_GET['perPage'] }}" type="hidden">
                    @endif

                    @if(isset($_GET['search']))
                    <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                    @endif

                    @if(isset($_GET['nis_siswa'])) <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden"> @endif
                    @if(isset($_GET['nisn_siswa'])) <input name="nisn_siswa" value="{{ $_GET['nisn_siswa'] }}" type="hidden"> @endif
                    @if(isset($_GET['nama_siswa'])) <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden"> @endif
                    @if(isset($_GET['jenis_kelamin'])) <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}" type="hidden"> @endif
                    @if(isset($_GET['KelasId'])) <input name="KelasId" value="{{ $_GET['KelasId'] }}" type="hidden"> @endif
                    @if(isset($_GET['sort_by'])) <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden"> @endif
                    @if(isset($_GET['sort'])) <input name="sort" value="{{ $_GET['sort'] }}" type="hidden"> @endif
                    @if(isset($_GET['dibuatTglDari'])) <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}" type="hidden"> @endif
                    @if(isset($_GET['dibuatTglKe'])) <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}" type="hidden"> @endif
                    @if(isset($_GET['thn_ajaran'])) <input name="thn_ajaran" value="{{ $_GET['thn_ajaran'] }}" type="hidden"> @endif
                </form>
            </div>
            @endif
            
            <div class="tw-float-right tw-py-5">
            @if($response->to >= $total)
            <a class="tw-text-sims-new-700 hover:tw-text-sims-new-700 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-solid fa-chevron-right"></i></a>
            @else
            <a href="{{ $response->next_page_url }}" class="tw-transition-all tw-text-sims-new-500 hover:tw-bg-sims-new-500 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-solid fa-chevron-right"></i></a>
            @endif
            </div>
        </div>
    </div>
</div>

@endif
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script rel="javascript" type="text/javascript">
   $(document).ready(function() {
       function sendSiswaRes(e) {
            fetch('searchSiswa', {
                method: 'POST',
                async: true,
                headers: {'Content-Type', 'application/json'},
                body: JSON.stringify({payload: e.value})
            });
        }
   });


   $(document).ready(function(){
    $("button").click(function(){
    alert("jQuery is working perfectly.");
    });      
});
</script>

<script src="index.js"></script>
<script>function showTooltip(flag) {
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

<script>
    $(function(){
      // bind change event to select
      $('#show-data-perpage').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });

    $(function(){
      // bind change event to select
      $('#show-tahun-ajaran').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
</script>
@endpush
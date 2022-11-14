@extends('layouts.main')

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
            <h1 class="tw-flex tw-justify-center tw-font-bold tw-mt-6 tw-text-sims-400">404 Not Found</h1>
            <p class="tw-flex tw-justify-center tw-font-pop tw-text-md tw-font-semibold tw-text-gray-400 tw-mt-5">{{ $message }}</p>
            <p class="tw-flex tw-justify-center tw-text-gray-400 tw-text-sm">Coba hubungi admin untuk penyelesaian lebih lanjut.</p>
        </div>
    </div>
@else

<div class="tw-mx-10 tw-my-2">
    <div class="tw-flex lg:tw-flex-row sm:tw-flex-col lg:tw-justify-between lg:tw-gap-5">
        <div class="tw-flex tw-flex-col tw-font-pop">
            <h4 class="title-main">Data Induk Siswa</h4>
            @if( ! empty($jurusan) && ! empty($kelas))
            <h6 class="tw-mb-5 tw-text-gray-400 tw-font-semibold">{{ $jurusan }} - Kelas {{ $kelas }}</h6>
            @else
            <h6 class="tw-mb-5 tw-text-gray-400 tw-font-semibold">SELURUH KELAS</h6>
            @endif
        </div>

        @can('tata usaha')
        <div class="tw-flex md:tw-justify-center tw-items-center md:-tw-mb-8">
            @if( ! empty($jurusan) && ! empty($kelas))
            <a href="/data-induk-print/{{ $jurusan }}/{{ $kelas }}" target="__blank" title="Print"><i class="fa-solid fa-print btn-export"></i></a>
            <button id="copy_btn" title="Copy Data" type="button" value="copy"><i class="fa-solid fa-copy btn-export"></i></button>
            <a href="/data-induk-excel/{{ $jurusan }}/{{ $kelas }}" title="Export ke Excel"><i class="fa-solid fa-file-excel btn-export"></i></a>
            <a href="/data-induk-pdf/{{ $jurusan }}/{{ $kelas }}" title="Export ke PDF"><i class="fa-solid fa-file-pdf btn-export"></i></a>
            @else
            <a href="/data-induk-print" target="__blank" title="Print"><i class="fa-solid fa-print btn-export"></i></a>
            <button id="copy_btn" type="button" value="copy"><i class="fa-solid fa-copy btn-export"></i></button>
            <a href="/data-induk-excel" title="Export ke Excel"><i class="fa-solid fa-file-excel btn-export"></i></a>
            <a href="/data-induk-pdf" title="Export ke PDF"><i class="fa-solid fa-file-pdf btn-export"></i></a>
            @endif
        </div>
        @endcan
    </div>

        <section class="tw-flex lg:tw-flex-row sm:tw-flex-col tw-justify-between sm:tw-flex-wrap sm:tw-gap-5">
            <div class="tw-flex lg:tw-flex-row sm:tw-flex-col">
                @if( ! empty($jurusan) && ! empty($kelas))
                <form action="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}"> 
                    <div class="relative tw-border-2 tw-rounded-lg focus:tw-ring-sims-400">

                        <input type="text" id="search" name="search" class="tw-py-1 tw-px-5 tw-border-none tw-rounded-md" value="{{ request()->search }}">
                        <i class="fa-solid fa-magnifying-glass tw-pr-5 tw-pl-3 tw-text-slate-600"></i>
                    </div>
                </form>
                @else
                <form action="/data-induk-siswa"> 
                    <div class="relative tw-border-2 tw-rounded-lg focus:tw-ring-sims-400">
                        
                        <input name="page" value="1" type="hidden">
                        <input name="perPage" value="10" type="hidden">

                        <input type="text" id="search" name="search" class="tw-py-1 tw-px-5 tw-border-none tw-rounded-md" value="{{ request()->search }}">
                        <i class="fa-solid fa-magnifying-glass tw-pr-5 tw-pl-3 tw-text-slate-600"></i>
                    </div>
                </form>
                @endif
                <div class="tw-flex">
                    <div class="tw-text-base pt-1 tw-text-basic-700 tw-ml-4 tw-mr-2 tw-font-normal tw-font-pop">Show</div>
                    @if( ! empty($jurusan) && ! empty($kelas))
                    <select name="show-data-perpage" id="show-data-perpage" class="tw-bg-gray-300 tw-font-bold tw-px-7 tw-rounded-xl tw-text tw-mb-2 tw-border-none">
                        @if(!empty($_GET['page']))
                            @if(isset($_GET['search']))
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?page={{ $_GET['page'] }}&perPage=10&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?page={{ $_GET['page'] }}&perPage=25&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?page={{ $_GET['page'] }}&perPage=50&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?page={{ $_GET['page'] }}&perPage=100&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                            @else
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?page={{ $_GET['page'] }}&perPage=10&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?page={{ $_GET['page'] }}&perPage=25&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?page={{ $_GET['page'] }}&perPage=50&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?page={{ $_GET['page'] }}&perPage=100&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                            @endif
                        @else
                            @if(isset($_GET['search']))
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?perPage=10&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?perPage=25&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?perPage=50&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?perPage=100&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                            @else
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?perPage=10&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?perPage=25&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?perPage=50&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                            <option value="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}?perPage=100&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                            @endif
                        @endif
                    </select>
                    @else
                    <select name="show-data-perpage" id="show-data-perpage" class="tw-bg-gray-300 tw-font-bold tw-px-7 tw-rounded-xl tw-text tw-mb-2 tw-border-none">
                        @if(!empty($_GET['page']))
                            @if(isset($_GET['search']))
                            <option value="/data-induk-siswa?page={{ $_GET['page'] }}&perPage=10&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                            <option value="/data-induk-siswa?page={{ $_GET['page'] }}&perPage=25&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                            <option value="/data-induk-siswa?page={{ $_GET['page'] }}&perPage=50&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                            <option value="/data-induk-siswa?page={{ $_GET['page'] }}&perPage=100&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                            @else
                            <option value="/data-induk-siswa?page={{ $_GET['page'] }}&perPage=10&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                            <option value="/data-induk-siswa?page={{ $_GET['page'] }}&perPage=25&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                            <option value="/data-induk-siswa?page={{ $_GET['page'] }}&perPage=50&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                            <option value="/data-induk-siswa?page={{ $_GET['page'] }}&perPage=100&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                            @endif
                        @else
                            @if(isset($_GET['search']))
                            <option value="/data-induk-siswa?perPage=10&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                            <option value="/data-induk-siswa?perPage=25&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                            <option value="/data-induk-siswa?perPage=50&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                            <option value="/data-induk-siswa?perPage=100&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                            @else
                            <option value="/data-induk-siswa?perPage=10&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                            <option value="/data-induk-siswa?perPage=25&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                            <option value="/data-induk-siswa?perPage=50&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                            <option value="/data-induk-siswa?perPage=100&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                            @endif
                        @endif
                    </select>
                    @endif
                    <div class="tw-text-base pt-1 tw-mx-2 tw-font-pop tw-font-normal tw-text-basic-700">Entries</div>

                    {{-- FILTERS POPUP --}}
                    <div class="tw-flex tw-mx-5 tw-my-auto">
                        <button data-modal-toggle="filter-popup-modal" class="hover:tw-text-sims-500 tw-text-slate-700 tw-transition-all tw-ease-in-out">
                            <i class="tw-text-xl  fa-solid fa-sliders-simple"></i>
                        </button>

                        {{-- FILTERS POPUP MODAL --}}
                        <div id="filter-popup-modal" tabindex="-1"class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
                                <div class="tw-relative tw-bg-white tw-rounded-lg tw-shadow dark:tw-bg-slate-100 tw-font-pop">
                                    <button type="button"
                                      class="tw-absolute tw-top-3 tw-right-2.5 tw-text-gray-400 tw-bg-transparent hover:tw-bg-gray-200 hover:tw-text-gray-900 tw-rounded-lg tw-text-sm tw-p-1.5 tw-ml-auto tw-inline-flex tw-items-center"
                                      data-modal-toggle="filter-popup-modal">
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
                                        <form action="/get-request">

                                        @if(isset($_GET['perPage']))
                                        <input type="hidden" name="perPage" value="{{ $_GET['perPage'] }}"> 
                                        @endif

                                        @if(isset($_GET['page']))
                                        <input type="hidden" name="page" value="{{ $_GET['page'] }}"> 
                                        @endif

                                        @if(isset($_GET['search']))
                                        <input type="hidden" name="search" value="{{ $_GET['search'] }}"> 
                                        @endif

                                        <div class="tw-flex tw-justify-center tw-font-pop tw-text-sims-500 tw-text-xl tw-font-bold">Filters</div>
                                        <div class="tw-border-b tw-border-sims-400 tw-w-full tw-my-5"></div>

                                        {{-- search query --}}
                                        <div class="tw-font-pop tw-text-sm tw-font-bold tw-text-gray-400">Search Query</div>
                                        <div class="tw-flex tw-justify-between tw-mt-3">
                                            <div class="tw-flex tw-my-3">
                                                <div class="tw-text-xs tw-font-pop tw-text-gray-400 tw-mx-2 tw-my-auto">NIS</div>
                                                <label for="default-toggle-nis" class="inline-flex relative items-center cursor-pointer">
                                                  <input type="checkbox" name="nis_siswa" value="true" id="default-toggle-nis" class="sr-only peer">
                                                  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                                </label>
                                            </div>
                                            <div class="tw-flex tw-my-3">
                                                <div class="tw-text-xs tw-font-pop tw-text-gray-400 tw-mx-2 tw-my-auto">NISN</div>
                                                <label for="default-toggle-nisn" class="inline-flex relative items-center cursor-pointer">
                                                  <input type="checkbox" name="nisn_siswa" value="true" id="default-toggle-nisn" class="sr-only peer">
                                                  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                                </label>
                                            </div>
                                            <div class="tw-flex tw-my-3">
                                                <div class="tw-text-xs tw-font-pop tw-text-gray-400 tw-mx-2 tw-my-auto">Nama Siswa</div>
                                                <label for="default-toggle-nama-siswa" class="inline-flex relative items-center cursor-pointer">
                                                  <input type="checkbox" name="nama_siswa" value="true" id="default-toggle-nama-siswa" class="sr-only peer">
                                                  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="tw-flex tw-gap-7">
                                            <div class="tw-flex tw-my-3">
                                                <div class="tw-text-xs tw-font-pop tw-text-gray-400 tw-mx-2 tw-my-auto">Gender</div>
                                                <label for="default-toggle-gender" class="inline-flex relative items-center cursor-pointer">
                                                  <input type="checkbox" name="jenis_kelamin" value="true" id="default-toggle-gender" class="sr-only peer">
                                                  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                                </label>
                                            </div>
                                            <div class="tw-flex tw-my-3">
                                                <div class="tw-text-xs tw-font-pop tw-text-gray-400 tw-mx-2 tw-my-auto">Kelas</div>
                                                <label for="default-toggle-kelas" class="inline-flex relative items-center cursor-pointer">
                                                  <input type="checkbox" name="KelasId" value="true" id="default-toggle-kelas" class="sr-only peer">
                                                  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                                </label>
                                            </div>
                                        </div>
                                        {{-- end of search query --}}


                                        {{-- sort by --}}
                                        <div class="tw-font-pop tw-text-sm tw-font-bold tw-text-gray-400 tw-mt-6">Sort By</div>
                                        <div class="tw-flex tw-justify-between tw-my-3">
                                            <div class="tw-w-full">
                                                <select class="input-data tw-text-sm tw-mr-5" id="sort_by" name="sort_by" required>
                                                    <option value="nis_siswa">NIS</option>
                                                    <option value="nisn_siswa">NISN</option>
                                                    <option value="nama_siswa">Nama siswa</option>
                                                    <option value="jenis_kelamin">Gender</option>
                                                    <option value="KelasId">Kelas</option>
                                                </select>
                                            </div>
                                            <div class="tw-flex tw-my-auto tw-gap-3 tw-justify-center tw-mx-auto tw-ml-5">
                                                <div class="tw-flex tw-gap-1">
                                                    <label for="ascending" class="tw-font-pop tw-text-sm tw-text-gray-400">Ascending</label>
                                                    <input class="tw-my-auto tw-bg-gray-200 focus:ring-0 focus:ring-offset-0" style="height:15px; width:15px; border: none" type="radio" id="ascending" name="sort" value="ASC" checked>
                                                </div>
                                                <div class="tw-flex tw-gap-1">
                                                    <label for="descending" class="tw-font-pop tw-text-sm tw-text-gray-400">Descending</label>
                                                    <input class="tw-my-auto tw-bg-gray-200 focus:ring-0 focus:ring-offset-0" style="height:15px; width:15px; border: none" type="radio" id="descending" name="sort" value="DESC">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end of sort by --}}

                                        
                                        {{-- data per periodik --}}
                                        <div class="tw-font-pop tw-text-sm tw-font-bold tw-text-gray-400 tw-mt-12">Data per Periodik</div>
                                        <div class="tw-flex tw-justify-between tw-mt-5 tw-mx-5">
                                            <div>
                                                <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Dari tanggal</div>
                                                <input class="input-data tw-text-sm tw-font-pop" id="dibuatTglDari" name="dibuatTglDari" type="date" placeholder="dd/mm/yyyy">
                                            </div>
                                            <div>
                                                <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Ke tanggal</div>
                                                <input class="input-data tw-text-sm tw-font-pop" id="dibuatTglKe" name="dibuatTglKe" type="date" placeholder="dd/mm/yyyy">
                                            </div>
                                        </div>
                                        {{-- end of data per periodik --}}

                                        <div class="tw-flex tw-justify-end tw-mt-10">
                                            <button type="submit" class="tw-bg-sims-400 tw-text-sm tw-text-white tw-py-2 tw-px-4 tw-rounded-lg hover:tw-bg-sims-500 tw-transition-all">Simpan</button>
                                        </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tw-flex">
                @can('tata usaha')
                <button type="button" data-modal-toggle="popup-modal" class="tw-bg-[#28A745] tw-text-white hover:tw-text-white hover:tw-bg-green-700 tw-font-pop tw-rounded-lg tw-px-5 tw-py-2">
                    <i class="fa-solid fa-circle-plus tw-pr-3"></i>
                    Tambah Data
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
                                <div class="tw-mb-8 tw-mt-5 tw-flex tw-justify-center tw-text-2xl tw-font-semibold tw-text-sims-400">
                                    Add Data
                                </div>
                                <div class="tw-gap-3 tw-grid">
                                    <a href="/tambah-data" data-modal-toggle="popup-modal"
                                      class="tw-text-white tw-justify-center tw-bg-sims-400 tw-w-full hover:tw-bg-sims-500 hover:tw-text-white tw-font-medium tw-text-xl tw-inline-flex tw-items-center tw-py-8 tw-text-center">
                                        Input Data
                                    </a>
                                    <a href="" data-modal-toggle="popup-modal"
                                      class="tw-text-white tw-justify-center tw-bg-[#1D6F42] tw-w-full hover:tw-bg-green-800 hover:tw-text-white tw-font-medium tw-text-xl tw-inline-flex tw-items-center tw-py-8 tw-text-center">
                                        Import data dari excel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
        </section>

        @if(isset($siswa))
        <section class="tw-overflow-x-auto tw-relative tw-shadow-md tw-rounded-top-xl tw-mt-5">
            <table class="tw-w-full tw-text-sm tw-text-center">
                <thead class="tw-bg-gray-100 tw-text-basic-700 tw-border tw-font-pop">
                    <tr>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">ID</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NIS</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NISN</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NAMA PESERTA DIDIK</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">GENDER</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">KELAS</th>
                        <th scope="col" class="tw-py-3 tw-px-6">AKSI</th>
                    </tr>
                </thead>
                <tbody class="tw-text-base">
                    @foreach ($siswa as $s)
                        
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->id }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->nis_siswa }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->nisn_siswa }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->nama_siswa }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->jenis_kelamin }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->KelasId }}</td>
                        <td>
                            @cannot('kesiswaan')
                            <a href="/rekap-nilai/{{ $s->nis_siswa }}" class="tw-text-white tw-bg-sims-400 hover:tw-bg-sims-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3 tw-mr-1" title="Rekap Nilai">
                                <i class="fa-light fa-clipboard-list"></i>
                            </a>
                            @endcannot
                            @can('tata usaha')
                            <a href="/edit-siswa/{{ $s->nis_siswa }}" class="tw-text-white tw-bg-kuning-500 hover:tw-bg-kuning-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3" title="Edit Data Siswa">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                            </a>
                            @endcan
                            <a href="/detail/{{ $s->nis_siswa }}" class="tw-text-white tw-bg-gray-500 hover:tw-bg-gray-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3" title="Detail Data ">
                                <i class="fa-solid fa-eye"></i>
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
                <a href="{{ $response->prev_page_url }}" class="tw-transition-all tw-text-sims-400 hover:tw-bg-sims-400 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-solid fa-chevron-left"></i></a>
            </div>
            @else
            <div class="tw-float-right tw-py-5">
                <a class="tw-text-sims-600 hover:tw-text-sims-600 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-solid fa-chevron-left"></i></a>
            </div>
            @endif

            @if( ! empty($jurusan) && ! empty($kelas))
            <div class="tw-py-3 tw-my-auto tw-h-min tw-flex tw-justify-center">
                <form action="/data-induk-siswa/{{ $jurusan }}/{{ $kelas }}" class="tw-text-center">

                    @if(isset($_GET['perPage']))
                    <input name="perPage" value="{{ $_GET['perPage'] }}" type="hidden">
                    @endif

                    @if(isset($_GET['search']))
                    <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                    @endif


                    <input type="number" name="page" class="tw-bg-white tw-border tw-border-slate-200 tw-w-1/2 tw-font-pop tw-font-medium tw-text-slate-500 tw-rounded-md tw-text-center focus:tw-ring-gray-200 focus:tw-border-gray-200 no-spin" min="1" @if(isset($_GET['page'])) value="{{ $_GET['page'] }}"@endif>
                </form>
            </div>
            @else
            <div class="tw-py-3 tw-my-auto tw-h-min tw-flex tw-justify-center">
                <form action="/data-induk-siswa" class="tw-text-center">

                    @if(isset($_GET['perPage']))
                    <input name="perPage" value="{{ $_GET['perPage'] }}" type="hidden">
                    @endif

                    @if(isset($_GET['search']))
                    <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                    @endif


                    <input type="number" name="page" class="tw-bg-white tw-border tw-border-slate-200 tw-w-1/2 tw-font-pop tw-font-medium tw-text-slate-500 tw-rounded-md tw-text-center focus:tw-ring-gray-200 focus:tw-border-gray-200 no-spin" min="1" @if(isset($_GET['page'])) value="{{ $_GET['page'] }}"@endif>
                </form>
            </div>
            @endif
            
            <div class="tw-float-right tw-py-5">
            @if($response->to >= $total)
            <a class="tw-text-sims-600 hover:tw-text-sims-600 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-solid fa-chevron-right"></i></a>
            @else
            <a href="{{ $response->next_page_url }}" class="tw-transition-all tw-text-sims-400 hover:tw-bg-sims-400 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-solid fa-chevron-right"></i></a>
            @endif
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

<script>
    var copyBtn = document.querySelector('#copy_btn');

    copyBtn.addEventListener('click', function () {

    var urlField = document.querySelector('table');
    
    var range = document.createRange();  

    range.selectNode(urlField);

    window.getSelection().addRange(range);
    
    document.execCommand('copy');
}, 
false);
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
</script>
@endpush
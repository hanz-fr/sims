@extends('layouts.main')
@section('content')
<style>
    .no-spin::-webkit-inner-spin-button, .no-spin::-webkit-outer-spin-button {
    -webkit-appearance: none !important;
    margin: 0 !important;
    }
</style>

    @if ($status == 'error')
        <div class="tw-flex tw-justify-center">
            <div class="tw-block tw-my-32">
                <img src="{{ asset('assets/img/error_img.svg') }}" alt="error_img">
                <h1 class="tw-flex tw-justify-center tw-font-pop tw-font-bold tw-mt-6 tw-text-sims-400">404 Not Found</h1>
                <p class="tw-flex tw-justify-center tw-font-pop tw-text-md tw-font-semibold tw-text-gray-400 tw-mt-5">
                    {{ $message }}</p>
                <p class="tw-flex tw-justify-center tw-font-pop tw-text-gray-400 tw-text-sm">Coba hubungi admin untuk
                    penyelesaian lebih lanjut.</p>
            </div>
        </div>
    @else
        <div class="tw-mx-10">
            <div class="tw-flex lg:tw-flex-row sm:tw-flex-col tw-justify-between tw-mt-8">
                <div class="tw-flex">
                    <h4 class="tw-font-pop tw-font-bold tw-mt-6 tw-text-sims-400">Data Siswa Masuk</h4>
                </div>
                @can('rekap-siswa')
                    <div class="tw-flex md:tw-justify-center tw-items-center">
                        <button type="button" data-modal-toggle="export-print" title="Print"><i class="fa-solid fa-print btn-export"></i></button>
                    
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
                                <form action="/mutasi-masuk-print" method="">
                                    @csrf
                                    <div class="tw-p-6">
                                        <div class="tw-text-gray-400 tw-font-pop tw-text-center tw-font-semibold tw-text-lg">Print Data</div>
                                        <div class="tw-flex tw-gap-3 tw-justify-between tw-mt-5 tw-mx-5">
                                            <div>
                                                <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Dari tanggal</div>
                                                <input class="input-data tw-text-xs tw-font-pop" id="tgl_masuk_dari" name="tgl_masuk_dari" type="date" placeholder="dd/mm/yyyy" @if(isset($_GET['tgl_masuk_dari'])) value="{{ $_GET['tgl_masuk_dari'] }}" @endif>
                                            </div>
                                            <div>
                                                <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Ke tanggal</div>
                                                <input class="input-data tw-text-xs tw-font-pop" id="tgl_masuk_ke" name="tgl_masuk_ke" type="date" placeholder="dd/mm/yyyy" @if(isset($_GET['tgl_masuk_ke'])) value="{{ $_GET['tgl_masuk_ke'] }}" @endif>
                                            </div>
                                        </div>
                                        <div class="tw-flex tw-justify-center tw-mt-3">
                                            <button type="submit" target="__blank" class="tw-w-full tw-rounded-lg tw-mx-3 tw-font-pop tw-text-white tw-text-sm tw-font-medium tw-mb-2 tw-py-2 tw-bg-sims-400 hover:tw-bg-sims-500 tw-transition-all tw-ease-in-out">Print</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                        <button id="copy_btn" title="Copy Data" type="button" value="copy"><i class="fa-solid fa-copy btn-export"></i></button>

                        <button type="button" data-modal-toggle="export-excel" title="Export ke Excel"><i class="fa-solid fa-file-excel btn-export"></i></button>
                    
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
                                    <form action="/mutasi-masuk-excel" method="">
                                        @csrf
                                        <div class="tw-p-6">
                                            <div class="tw-text-gray-400 tw-font-pop tw-text-center tw-font-semibold tw-text-lg">Export Data Excel</div>
                                            <div class="tw-flex tw-gap-3 tw-justify-between tw-mt-5 tw-mx-5">
                                                <div>
                                                    <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Dari tanggal</div>
                                                    <input class="input-data tw-text-xs tw-font-pop" id="tgl_masuk_dari" name="tgl_masuk_dari" type="date" placeholder="dd/mm/yyyy" @if(isset($_GET['tgl_masuk_dari'])) value="{{ $_GET['tgl_masuk_dari'] }}" @endif>
                                                </div>
                                                <div>
                                                    <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Ke tanggal</div>
                                                    <input class="input-data tw-text-xs tw-font-pop" id="tgl_masuk_ke" name="tgl_masuk_ke" type="date" placeholder="dd/mm/yyyy" @if(isset($_GET['tgl_masuk_ke'])) value="{{ $_GET['tgl_masuk_ke'] }}" @endif>
                                                </div>
                                            </div>
                                            <div class="tw-flex tw-justify-center tw-mt-3">
                                                <button type="submit" class="tw-w-full tw-rounded-lg tw-mx-3 tw-font-pop tw-text-white tw-text-sm tw-font-medium tw-mb-2 tw-py-2 tw-bg-sims-400 hover:tw-bg-sims-500 tw-transition-all tw-ease-in-out">Export</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <button type="button" data-modal-toggle="export-pdf" title="Export ke PDF"><i class="fa-solid fa-file-pdf btn-export"></i></button>
                    
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
                                    <form action="/mutasi-masuk-pdf">
                                        @csrf
                                        <div class="tw-p-6">
                                            <div class="tw-text-gray-400 tw-font-pop tw-text-center tw-font-semibold tw-text-lg">Export Data PDF</div>
                                            <div class="tw-flex tw-gap-3 tw-justify-between tw-mt-5 tw-mx-5">
                                                <div>
                                                    <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Dari tanggal</div>
                                                    <input class="input-data tw-text-xs tw-font-pop" id="tgl_masuk_dari" name="tgl_masuk_dari" type="date" placeholder="dd/mm/yyyy" @if(isset($_GET['tgl_masuk_dari'])) value="{{ $_GET['tgl_masuk_dari'] }}" @endif>
                                                </div>
                                                <div>
                                                    <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Ke tanggal</div>
                                                    <input class="input-data tw-text-xs tw-font-pop" id="tgl_masuk_ke" name="tgl_masuk_ke" type="date" placeholder="dd/mm/yyyy" @if(isset($_GET['tgl_masuk_ke'])) value="{{ $_GET['tgl_masuk_ke'] }}" @endif>
                                                </div>
                                            </div>
                                            <div class="tw-flex tw-justify-center tw-mt-3">
                                                <button type="submit" class="tw-w-full tw-rounded-lg tw-mx-3 tw-font-pop tw-text-white tw-text-sm tw-font-medium tw-mb-2 tw-py-2 tw-bg-sims-400 hover:tw-bg-sims-500 tw-transition-all tw-ease-in-out">Export</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>


            <div class="tw-flex tw-justify-between lg:tw-flex-row sm:tw-flex-col sm:tw-gap-5">
                <div class="tw-flex">
                    <form action="/siswa-masuk">
                        <div class="relative tw-border-2 tw-rounded-lg focus:tw-ring-sims-400">
                            
                            <input name="page" value="1" type="hidden">
                            <input name="perPage" value="10" type="hidden">
                            <input type="text" name="search" id="search" class="tw-py-1 tw-px-5 tw-border-none tw-rounded-md" value="{{ request()->search }}">

                            @if(isset($_GET['nama_siswa'])) <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden"> @endif
                            @if(isset($_GET['nis_siswa'])) <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden"> @endif
                            @if(isset($_GET['jenis_kelamin'])) <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}" type="hidden"> @endif
                            @if(isset($_GET['tgl_mutasi'])) <input name="tgl_mutasi" value="{{ $_GET['tgl_mutasi'] }}" type="hidden"> @endif
                            @if(isset($_GET['diterima_di_kelas'])) <input name="diterima_di_kelas" value="{{ $_GET['diterima_di_kelas'] }}" type="hidden"> @endif
                            @if(isset($_GET['pindah_dari'])) <input name="pindah_dari" value="{{ $_GET['pindah_dari'] }}" type="hidden"> @endif
                            @if(isset($_GET['alasan_mutasi'])) <input name="alasan_mutasi" value="{{ $_GET['alasan_mutasi'] }}" type="hidden"> @endif
                            @if(isset($_GET['tgl_masuk_dari'])) <input name="tgl_masuk_dari" value="{{ $_GET['tgl_masuk_dari'] }}" type="hidden"> @endif
                            @if(isset($_GET['tgl_masuk_ke'])) <input name="tgl_masuk_ke" value="{{ $_GET['tgl_masuk_ke'] }}" type="hidden"> @endif

                            <i class="fa-solid fa-magnifying-glass tw-pr-5 tw-pl-3 tw-text-slate-600"></i>
                        </div>
                    </form>
                    <div class="tw-text-base pt-1 tw-text-basic-700 tw-ml-4 tw-mr-2 tw-font-normal tw-font-pop">Show</div>
                    <select name="show-data-perpage" id="show-data-perpage" class="tw-bg-gray-300 tw-font-bold tw-px-7 tw-rounded-xl tw-text tw-mb-2 tw-border-none">
                        <option value="/siswa-masuk?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=10&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&tgl_mutasi=@isset($_GET['tgl_mutasi']){{ $_GET['tgl_mutasi'] }}@endisset&diterima_di_kelas=@isset($_GET['diterima_di_kelas']){{ $_GET['diterima_di_kelas'] }}@endisset&pindah_dari=@isset($_GET['pindah_dari']){{ $_GET['pindah_dari'] }}@endisset&alasan_mutasi=@isset($_GET['alasan_mutasi']){{ $_GET['alasan_mutasi'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&tgl_masuk_dari=@isset($_GET['tgl_masuk_dari']){{ $_GET['tgl_masuk_dari'] }}@endisset&tgl_masuk_ke=@isset($_GET['tgl_masuk_ke']){{ $_GET['tgl_masuk_ke'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                        <option value="/siswa-masuk?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=25&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&tgl_mutasi=@isset($_GET['tgl_mutasi']){{ $_GET['tgl_mutasi'] }}@endisset&diterima_di_kelas=@isset($_GET['diterima_di_kelas']){{ $_GET['diterima_di_kelas'] }}@endisset&pindah_dari=@isset($_GET['pindah_dari']){{ $_GET['pindah_dari'] }}@endisset&alasan_mutasi=@isset($_GET['alasan_mutasi']){{ $_GET['alasan_mutasi'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&tgl_masuk_dari=@isset($_GET['tgl_masuk_dari']){{ $_GET['tgl_masuk_dari'] }}@endisset&tgl_masuk_ke=@isset($_GET['tgl_masuk_ke']){{ $_GET['tgl_masuk_ke'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                        <option value="/siswa-masuk?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=50&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&tgl_mutasi=@isset($_GET['tgl_mutasi']){{ $_GET['tgl_mutasi'] }}@endisset&diterima_di_kelas=@isset($_GET['diterima_di_kelas']){{ $_GET['diterima_di_kelas'] }}@endisset&pindah_dari=@isset($_GET['pindah_dari']){{ $_GET['pindah_dari'] }}@endisset&alasan_mutasi=@isset($_GET['alasan_mutasi']){{ $_GET['alasan_mutasi'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&tgl_masuk_dari=@isset($_GET['tgl_masuk_dari']){{ $_GET['tgl_masuk_dari'] }}@endisset&tgl_masuk_ke=@isset($_GET['tgl_masuk_ke']){{ $_GET['tgl_masuk_ke'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                        <option value="/siswa-masuk?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=100&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&jenis_kelamin=@isset($_GET['jenis_kelamin']){{ $_GET['jenis_kelamin'] }}@endisset&tgl_mutasi=@isset($_GET['tgl_mutasi']){{ $_GET['tgl_mutasi'] }}@endisset&diterima_di_kelas=@isset($_GET['diterima_di_kelas']){{ $_GET['diterima_di_kelas'] }}@endisset&pindah_dari=@isset($_GET['pindah_dari']){{ $_GET['pindah_dari'] }}@endisset&alasan_mutasi=@isset($_GET['alasan_mutasi']){{ $_GET['alasan_mutasi'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&tgl_masuk_dari=@isset($_GET['tgl_masuk_dari']){{ $_GET['tgl_masuk_dari'] }}@endisset&tgl_masuk_ke=@isset($_GET['tgl_masuk_ke']){{ $_GET['tgl_masuk_ke'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                    </select>
                    <div class="tw-text-base pt-1 tw-mx-2 tw-font-pop tw-font-normal tw-text-basic-700">Entries</div>

                    {{-- FILTER DROPDOWN --}}
                    <button id="dropdownToggleButton" data-dropdown-toggle="filter-dd" class="tw-text-sims-500 hover:tw-text-white tw-font-pop focus:tw-ring-0 focus:tw-outline-none tw-font-medium tw-rounded-lg tw-text-sm tw-px-4 tw-py-1 tw-ml-2 tw-text-center tw-inline-flex tw-items-center dark:tw-bg-white dark:hover:tw-bg-sims-500 tw-shadow-md tw-transition-all tw-ease-in-out" type="button">Filters <i class="tw-text-xl tw-ml-5 fa-duotone fa-sliders-simple"></i></button>
                    <!-- filter menu -->
                    <div id="filter-dd" class="hidden tw-z-10 tw-w-72 tw-bg-white tw-rounded tw-divide-y tw-divide-gray-100 tw-shadow-md">
                        <div class="tw-font-pop tw-text-xs tw-text-gray-400 tw-my-2 tw-mx-5">Cari berdasarkan...</div>
                        <form action="/siswa-masuk">
                        
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
                                    <input type="checkbox" value="true" name="nama_siswa" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['nama_siswa']) @if($_GET['nama_siswa'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-400"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Nama Peserta Didik</span>
                                  </label>
                                </div>
                            </li>
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="nis_siswa" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['nis_siswa']) @if($_GET['nis_siswa'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-400"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">NIS</span>
                                  </label>
                                </div>
                            </li>
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="jenis_kelamin" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['jenis_kelamin']) @if($_GET['jenis_kelamin'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-400"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Gender</span>
                                  </label>
                                </div>
                            </li>
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="tgl_mutasi" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['tgl_mutasi']) @if($_GET['tgl_mutasi'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-400"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Tanggal Masuk</span>
                                  </label>
                                </div>
                            </li>
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="diterima_di_kelas" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['diterima_di_kelas']) @if($_GET['diterima_di_kelas'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-400"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Diterima di Kelas</span>
                                  </label>
                                </div>
                            </li>
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="pindah_dari" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['pindah_dari']) @if($_GET['pindah_dari'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-400"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Pindah dari</span>
                                  </label>
                                </div>
                            </li>
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="alasan_mutasi" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['alasan_mutasi']) @if($_GET['alasan_mutasi'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-400"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Alasan</span>
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
                                    @if($_GET['sort_by'] == 'nama_siswa')
                                    Nama Peserta Didik (selected)
                                    @elseif($_GET['sort_by'] == 'jenis_kelamin')
                                    Gender (selected)
                                    @elseif($_GET['sort_by'] == 'tgl_mutasi')
                                    Tanggal Masuk (selected)
                                    @elseif($_GET['sort_by'] == 'diterima_di_kelas')
                                    Diterima di Kelas (selected)
                                    @elseif($_GET['sort_by'] == 'pindah_dari')
                                    Pindah dari (selected)
                                    @endif
                                </option>
                                @endif
                                <option value="nama_siswa">Nama Peserta Didik</option>
                                <option value="jenis_kelamin">Gender</option>
                                <option value="tgl_mutasi">Tanggal Masuk</option>
                                <option value="diterima_di_kelas">Diterima di Kelas</option>
                                <option value="pindah_dari">Pindah dari</option>
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
                        <div class="tw-flex tw-justify-center">
                            <button type="submit" class="tw-w-full tw-rounded-lg tw-mx-3 tw-font-pop tw-text-white tw-text-sm tw-font-medium tw-mb-2 tw-py-2 tw-bg-sims-400 hover:tw-bg-sims-500 tw-transition-all tw-ease-in-out">Simpan</button>
                        </div>

                        @if(isset($_GET['tgl_masuk_dari'])) <input name="tgl_masuk_dari" value="{{ $_GET['tgl_masuk_dari'] }}" type="hidden"> @endif
                        @if(isset($_GET['tgl_masuk_ke'])) <input name="tgl_masuk_ke" value="{{ $_GET['tgl_masuk_ke'] }}" type="hidden"> @endif
                        </form>
                    </div>
                    <!-- end filter menu -->


                    {{-- DATA PERIODIK DROPDOWN --}}
                    <button id="dropdownToggleButton" data-dropdown-toggle="periodik-dd" class="tw-text-sims-400 hover:tw-text-white tw-font-pop focus:tw-ring-0 focus:tw-outline-none tw-font-medium tw-rounded-lg tw-text-sm tw-px-4 tw-py-1 tw-ml-4 tw-text-center tw-inline-flex tw-items-center dark:tw-bg-white dark:hover:tw-bg-sims-500 tw-shadow-md tw-transition-all tw-ease-in-out" type="button">Data Periodik <i class="fa-duotone fa-calendar tw-ml-4"></i></button>
                
                    <div id="periodik-dd" class="hidden tw-z-10 tw-w-auto tw-bg-white tw-rounded tw-divide-y tw-divide-gray-100 tw-shadow-md">
                        <form action="/siswa-masuk" class="tw-text-center">

                            @if(isset($_GET['perPage']))
                            <input name="perPage" value="{{ $_GET['perPage'] }}" type="hidden">
                            @endif
                            @if(isset($_GET['search']))
                            <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                            @endif


                            @if(isset($_GET['nama_siswa'])) <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden"> @endif
                            @if(isset($_GET['nis_siswa'])) <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden"> @endif
                            @if(isset($_GET['jenis_kelamin'])) <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}" type="hidden"> @endif
                            @if(isset($_GET['tgl_mutasi'])) <input name="tgl_mutasi" value="{{ $_GET['tgl_mutasi'] }}" type="hidden"> @endif
                            @if(isset($_GET['diterima_di_kelas'])) <input name="diterima_di_kelas" value="{{ $_GET['diterima_di_kelas'] }}" type="hidden"> @endif
                            @if(isset($_GET['pindah_dari'])) <input name="pindah_dari" value="{{ $_GET['pindah_dari'] }}" type="hidden"> @endif
                            @if(isset($_GET['alasan_mutasi'])) <input name="alasan_mutasi" value="{{ $_GET['alasan_mutasi'] }}" type="hidden"> @endif


                            <div class="tw-flex tw-gap-3 tw-justify-between tw-mt-5 tw-mx-5">
                                <div>
                                    <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Dari tanggal</div>
                                    <input class="input-data tw-text-xs tw-font-pop" id="tgl_masuk_dari" name="tgl_masuk_dari" type="date" placeholder="dd/mm/yyyy" @if(isset($_GET['tgl_masuk_dari'])) value="{{ $_GET['tgl_masuk_dari'] }}" @endif>
                                </div>
                                <div>
                                    <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Ke tanggal</div>
                                    <input class="input-data tw-text-xs tw-font-pop" id="tgl_masuk_ke" name="tgl_masuk_ke" type="date" placeholder="dd/mm/yyyy" @if(isset($_GET['tgl_masuk_ke'])) value="{{ $_GET['tgl_masuk_ke'] }}" @endif>
                                </div>
                            </div>
                            <div class="tw-flex tw-justify-center tw-mt-3">
                                <button type="submit" class="tw-w-full tw-rounded-lg tw-mx-3 tw-font-pop tw-text-white tw-text-sm tw-font-medium tw-mb-2 tw-py-2 tw-bg-sims-400 hover:tw-bg-sims-500 tw-transition-all tw-ease-in-out">Simpan</button>
                            </div>
                        </form>
                    </div>


                </div>
                @can('rekap-siswa')
                <div class="flex">
                    <a href="/create-mutasi-masuk"
                        class="tw-bg-[#28A745] tw-text-white hover:tw-text-white hover:tw-bg-green-700 tw-font-pop tw-rounded-lg tw-px-5 tw-py-2">
                        <i class="fa-solid fa-circle-plus tw-pr-3"></i>
                            Tambah Data
                    </a>
                </div>
                @endcan
            </div>

            @if(isset($mutasi))
            <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl tw-mt-5">
                <table class="tw-w-full tw-text-sm tw-text-center">
                    <thead class="tw-text-md tw-bg-gray-100 tw-text-basic-700 tw-border tw-font-pop">
                        <tr>
                            <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NO</th>
                            <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NAMA PESERTA DIDIK</th>
                            <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NOMOR INDUK</th>
                            <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">GENDER</th>
                            <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">TANGGAL MASUK</th>
                            <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">DITERIMA DI KELAS</th>
                            <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">PINDAH DARI/ALASAN</th>
                            <th scope="col" class="tw-py-3 tw-px-6">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="tw-text-base">
                        @foreach ($mutasi as $m)
                            <tr class="tw-bg-white tw-border">
                                <td class="counterCell tw-py-4 tw-px-6 tw-border"></td>
                                <td class="tw-py-4 tw-px-6 tw-border">{{ $m->nama_siswa }}</td>
                                <td class="tw-py-4 tw-px-6 tw-border">{{ $m->nis_siswa }}</td>
                                <td class="tw-py-4 tw-px-6 tw-border">{{ $m->jenis_kelamin }}</td>
                                <td class="tw-py-4 tw-px-6 tw-border">{{ $m->tgl_mutasi }}</td>
                                <td class="tw-py-4 tw-px-6 tw-border">{{ $m->diterima_di_kelas }}</td>
                                <td class="tw-py-4 tw-px-6 tw-border">{{ $m->pindah_dari }}, {{ $m->alasan_mutasi }}</td>
                                <td class="tw-flex tw-justify-center tw-my-2 tw-gap-2">
                                    @can('rekap-siswa')                                      
                                    <a href="/edit-mutasi-masuk/{{ $m->id }}"
                                        class="tw-text-white tw-bg-kuning-500 hover:tw-bg-kuning-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                        <i class="fa-solid fa-pen-to-square"></i></a>
                                    </a>

                                    {{-- <form method="post" action="{{ url('/api/mutasi-masuk/delete/'.$m->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="confirmDelete(event)" class="showModal tw-text-white tw-bg-red-400 hover:tw-bg-red-500 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                    </form> --}}

                                    <form action="{{ url('/api/mutasi-masuk/delete/' . $m->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" data-modal-toggle="popup-modal_{{$m->id}}" data-target="popup-modal_{{$m->id}}"
                                            class="tw-text-white tw-bg-red-400 hover:tw-bg-red-500 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                        <div id="popup-modal_{{$m->id}}" tabindex="-1"
                                            class="popup-modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                                <div
                                                    class="tw-relative tw-bg-white tw-rounded-lg tw-shadow dark:tw-bg-slate-100">
                                                    <button type="button"
                                                        class="tw-absolute tw-top-3 tw-right-2.5 tw-text-gray-400 tw-bg-transparent hover:tw-bg-gray-200 hover:tw-text-gray-900 tw-rounded-lg tw-text-sm tw-p-1.5 tw-ml-auto tw-inline-flex tw-items-center dark:hover:tw-bg-gray-800 dark:hover:tw-text-white"
                                                        data-modal-toggle="popup-modal_{{$m->id}}">
                                                        <svg aria-hidden="true" class="tw-w-5 tw-h-5" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="tw-p-6">
                                                        <svg aria-hidden="true"
                                                            class="tw-mx-auto tw-mb-4 tw-w-14 tw-h-14 tw-text-gray-400 dark:tw-text-gray-200"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                            </path>
                                                        </svg>
                                                        <div
                                                            class="tw-mb-5 tw-flex tw-justify-center tw-text-md tw-font-normal tw-text-gray-500 dark:tw-text-gray-400">
                                                            Hapus data Mutasi?</div>
                                                        <div class="tw-flex tw-justify-center">
                                                            <button type="submit" data-modal-toggle="popup-modal_{{$m->id}}"
                                                                type="button"
                                                                class="tw-text-white tw-bg-red-600 hover:tw-bg-red-800 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-red-300 dark:focus:tw-ring-red-800 tw-font-medium tw-rounded-lg tw-text-sm tw-inline-flex tw-items-center tw-py-2.5 tw-text-center tw-mr-2 tw-px-6">
                                                                Ya
                                                            </button>
                                                            <button data-modal-toggle="popup-modal_{{$m->id}}" type="button"
                                                                class="tw-text-gray-500 tw-bg-white hover:tw-bg-gray-100 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-gray-200 tw-rounded-lg tw-border tw-border-gray-200 tw-text-sm tw-font-medium tw-py-2.5 hover:tw-text-gray-900 focus:tw-z-10 dark:tw-bg-gray-700 dark:tw-text-gray-300 dark:tw-border-gray-500 dark:hover:tw-text-white dark:hover:tw-bg-gray-600 dark:focus:tw-ring-gray-600 tw-px-4">Tidak</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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

                <div class="tw-py-3 tw-my-auto tw-h-min tw-flex tw-justify-center">
                    <form action="/siswa-masuk" class="tw-text-center">
                        <input type="number" name="page" class="tw-bg-white tw-border tw-border-slate-200 tw-w-1/2 tw-font-pop tw-font-medium tw-text-slate-500 tw-rounded-md tw-text-center focus:tw-ring-gray-200 focus:tw-border-gray-200 no-spin" min="1" @if(isset($_GET['page'])) value="{{ $_GET['page'] }}" @endif>

                        @if(isset($_GET['perPage']))
                        <input name="perPage" value="{{ $_GET['perPage'] }}" type="hidden">
                        @endif

                        @if(isset($_GET['search']))
                        <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                        @endif


                        @if(isset($_GET['nama_siswa'])) <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden"> @endif
                        @if(isset($_GET['nis_siswa'])) <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden"> @endif
                        @if(isset($_GET['jenis_kelamin'])) <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}" type="hidden"> @endif
                        @if(isset($_GET['tgl_mutasi'])) <input name="tgl_mutasi" value="{{ $_GET['tgl_mutasi'] }}" type="hidden"> @endif
                        @if(isset($_GET['diterima_di_kelas'])) <input name="diterima_di_kelas" value="{{ $_GET['diterima_di_kelas'] }}" type="hidden"> @endif
                        @if(isset($_GET['pindah_dari'])) <input name="pindah_dari" value="{{ $_GET['pindah_dari'] }}" type="hidden"> @endif
                        @if(isset($_GET['alasan_mutasi'])) <input name="alasan_mutasi" value="{{ $_GET['alasan_mutasi'] }}" type="hidden"> @endif
                        @if(isset($_GET['tgl_masuk_dari'])) <input name="tgl_masuk_dari" value="{{ $_GET['tgl_masuk_dari'] }}" type="hidden"> @endif
                        @if(isset($_GET['tgl_masuk_ke'])) <input name="tgl_masuk_ke" value="{{ $_GET['tgl_masuk_ke'] }}" type="hidden"> @endif

                    </form>
                </div>

                <div class="tw-float-right tw-py-5">
                @if($response->to >= $total)
                <a class="tw-text-sims-600 hover:tw-text-sims-600 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-solid fa-chevron-right"></i></a>
                @else
                <a href="{{ $response->next_page_url }}" class="tw-transition-all tw-text-sims-400 hover:tw-bg-sims-400 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-solid fa-chevron-right"></i></a>
                @endif
                </div>

            </div>
                
            @else
            <div class="tw-flex tw-justify-center">
                <div class="tw-w-1/3 tw-my-28">
                    <img src="{{ URL::asset('assets/img/search-not-found.png') }}" class="-tw-mb-1" alt="g ada dek">
                    <div class="tw-font-pop tw-text-sims-500 tw-font-bold tw-text-3xl tw-text-center tw-mt-8">
                        Data tidak dapat ditemukan.
                    </div>
                </div>
            </div>
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

                <div class="tw-py-3 tw-my-auto tw-h-min tw-flex tw-justify-center">
                    <form action="/siswa-masuk" class="tw-text-center">
                        <input type="number" name="page" class="tw-bg-white tw-border tw-border-slate-200 tw-w-1/2 tw-font-pop tw-font-medium tw-text-slate-500 tw-rounded-md tw-text-center focus:tw-ring-gray-200 focus:tw-border-gray-200 no-spin" min="1" @if(isset($_GET['page'])) value="{{ $_GET['page'] }}" @endif>

                        @if(isset($_GET['perPage']))
                        <input name="perPage" value="{{ $_GET['perPage'] }}" type="hidden">
                        @endif

                        @if(isset($_GET['search']))
                        <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                        @endif

                        @if(isset($_GET['nama_siswa'])) <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden"> @endif
                        @if(isset($_GET['nis_siswa'])) <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden"> @endif
                        @if(isset($_GET['jenis_kelamin'])) <input name="jenis_kelamin" value="{{ $_GET['jenis_kelamin'] }}" type="hidden"> @endif
                        @if(isset($_GET['tgl_mutasi'])) <input name="tgl_mutasi" value="{{ $_GET['tgl_mutasi'] }}" type="hidden"> @endif
                        @if(isset($_GET['diterima_di_kelas'])) <input name="diterima_di_kelas" value="{{ $_GET['diterima_di_kelas'] }}" type="hidden"> @endif
                        @if(isset($_GET['pindah_dari'])) <input name="pindah_dari" value="{{ $_GET['pindah_dari'] }}" type="hidden"> @endif
                        @if(isset($_GET['alasan_mutasi'])) <input name="alasan_mutasi" value="{{ $_GET['alasan_mutasi'] }}" type="hidden"> @endif
                        @if(isset($_GET['tgl_masuk_dari'])) <input name="tgl_masuk_dari" value="{{ $_GET['tgl_masuk_dari'] }}" type="hidden"> @endif
                        @if(isset($_GET['tgl_masuk_ke'])) <input name="tgl_masuk_ke" value="{{ $_GET['tgl_masuk_ke'] }}" type="hidden"> @endif

                    </form>
                </div>

                <div class="tw-float-right tw-py-5">
                @if($response->to >= $total)
                <a class="tw-text-sims-600 hover:tw-text-sims-600 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-solid fa-chevron-right"></i></a>
                @else
                <a href="{{ $response->next_page_url }}" class="tw-transition-all tw-text-sims-400 hover:tw-bg-sims-400 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-solid fa-chevron-right"></i></a>
                @endif
                </div>
            </div>
            @endif
        </div>
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
        @if(isset($mutasi))
        @foreach($mutasi as $m)
        @isset($m->id)
        <script>
            
            var mutasi_id = $(this).val();

            const modal = document.getElementById('.popup-modal_{{$m->id}}');

            const showModal = document.querySelector('.showModal');

            showModal.addEventListener('click', function() {
                modal.classList.remove('hidden')
            });
        </script>
        @endisset
        @endforeach
        @endif
    @endif
@endsection

@push('scripts')
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
@endpush
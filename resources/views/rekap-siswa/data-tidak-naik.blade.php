@extends('layouts.main-new')

@section('content')
<style>
    .no-spin::-webkit-inner-spin-button, .no-spin::-webkit-outer-spin-button {
    -webkit-appearance: none !important;
    margin: 0 !important;
    }
</style>

<div class="tw-mt-10">
    <div class="tw-flex tw-mt-8 tw-ml-8">
        <h4 class="sims-heading-3xl">Data Siswa Tidak Naik Kelas</h4>
    </div>

        <div class="tw-flex tw-justify-between tw-ml-8 tw-mt-8 lg:tw-flex-row sm:tw-flex-col sm:tw-gap-5">
            <div class="tw-flex tw-my-auto">
                <form action="/data-tidak-naik"> 
                    <div class="relative tw-border-[1.5px] tw-border-gray-300 tw-rounded-xl focus:tw-ring-sims-new-500">
                        
                        <input name="page" value="1" type="hidden">
                        <input name="perPage" value="10" type="hidden">

                        @if(isset($_GET['nama_siswa'])) <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden"> @endif
                        @if(isset($_GET['tinggal_di_Kelas'])) <input name="tinggal_di_Kelas" value="{{ $_GET['tinggal_di_Kelas'] }}" type="hidden"> @endif
                        @if(isset($_GET['alasan_tidak_naik'])) <input name="alasan_tidak_naik" value="{{ $_GET['alasan_tidak_naik'] }}" type="hidden"> @endif
                        @if(isset($_GET['tmp_lahir'])) <input name="tmp_lahir" value="{{ $_GET['tmp_lahir'] }}" type="hidden"> @endif
                        @if(isset($_GET['tgl_lahir'])) <input name="tgl_lahir" value="{{ $_GET['tgl_lahir'] }}" type="hidden"> @endif
                        @if(isset($_GET['sort_by'])) <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden"> @endif
                        @if(isset($_GET['sort'])) <input name="sort" value="{{ $_GET['sort'] }}" type="hidden"> @endif
                        @if(isset($_GET['dibuatTglDari'])) <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}" type="hidden"> @endif
                        @if(isset($_GET['dibuatTglKe'])) <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}" type="hidden"> @endif

                        <input type="text" id="search" name="search" class="tw-block tw-py-1 tw-px-5 tw-border-none tw-rounded-xl" value="{{ request()->search }}">
                        <i class="fa-thin fa-magnifying-glass tw-absolute tw-text-gray-400 right-0 tw-inset-y-1.5 tw-pr-5 tw-text-sm"></i>
                    </div>
                </form>

                <div class="tw-my-auto tw-text-basic-700 tw-ml-8 tw-mr-2 tw-font-normal tw-font-satoshi">Tampilkan</div>
                <select name="show-data-perpage" id="show-data-perpage" class="tw-px-5 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-200 tw-peer tw-font-bold  bg-transparent tw-border-0 tw-border-b-2 tw-border-gray-200 tw-appearance-none tw-block">
                    <option value="/data-tidak-naik?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=10&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&tinggal_di_Kelas=@isset($_GET['tinggal_di_Kelas']){{ $_GET['tinggal_di_Kelas'] }}@endisset&alasan_tidak_naik=@isset($_GET['alasan_tidak_naik']){{ $_GET['alasan_tidak_naik'] }}@endisset&tmp_lahir=@isset($_GET['tmp_lahir']){{ $_GET['tmp_lahir'] }}@endisset&tgl_lahir=@isset($_GET['tgl_lahir']){{ $_GET['tgl_lahir'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                    <option value="/data-tidak-naik?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=25&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&tinggal_di_Kelas=@isset($_GET['tinggal_di_Kelas']){{ $_GET['tinggal_di_Kelas'] }}@endisset&alasan_tidak_naik=@isset($_GET['alasan_tidak_naik']){{ $_GET['alasan_tidak_naik'] }}@endisset&tmp_lahir=@isset($_GET['tmp_lahir']){{ $_GET['tmp_lahir'] }}@endisset&tgl_lahir=@isset($_GET['tgl_lahir']){{ $_GET['tgl_lahir'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                    <option value="/data-tidak-naik?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=50&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&tinggal_di_Kelas=@isset($_GET['tinggal_di_Kelas']){{ $_GET['tinggal_di_Kelas'] }}@endisset&alasan_tidak_naik=@isset($_GET['alasan_tidak_naik']){{ $_GET['alasan_tidak_naik'] }}@endisset&tmp_lahir=@isset($_GET['tmp_lahir']){{ $_GET['tmp_lahir'] }}@endisset&tgl_lahir=@isset($_GET['tgl_lahir']){{ $_GET['tgl_lahir'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                    <option value="/data-tidak-naik?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=100&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&tinggal_di_Kelas=@isset($_GET['tinggal_di_Kelas']){{ $_GET['tinggal_di_Kelas'] }}@endisset&alasan_tidak_naik=@isset($_GET['alasan_tidak_naik']){{ $_GET['alasan_tidak_naik'] }}@endisset&tmp_lahir=@isset($_GET['tmp_lahir']){{ $_GET['tmp_lahir'] }}@endisset&tgl_lahir=@isset($_GET['tgl_lahir']){{ $_GET['tgl_lahir'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                </select>
                <div class="tw-my-auto tw-mx-2 tw-font-satoshi tw-font-normal tw-text-basic-700">data</div>
            
                <div class="tw-flex tw-mx-1 tw-my-auto">
                    
                    {{-- FILTER DROPDOWN --}}
                    <button id="dropdownToggleButton" data-dropdown-toggle="filter-dd" class="tw-text-sims-new-500 hover:tw-text-white tw-font-satoshi focus:tw-ring-0 focus:tw-outline-none tw-font-medium tw-rounded-md tw-text-sm tw-px-5 tw-py-0.5 tw-ml-8 tw-text-center tw-inline-flex tw-items-center dark:tw-bg-white dark:hover:tw-bg-sims-new-500 tw-shadow-md tw-transition-all tw-ease-in-out
                     type="button">Filters <i class="tw-text-xl tw-ml-5 fa-duotone fa-sliders-simple"></i></button>

                    <!-- filter menu -->
                    <div id="filter-dd" class="hidden tw-z-10 tw-w-72 tw-bg-white tw-rounded tw-divide-y tw-divide-gray-100 tw-shadow-md">
                        <div class="tw-font-pop tw-text-xs tw-text-gray-400 tw-my-2 tw-mx-5">Cari berdasarkan...</div>
                        <form action="/data-tidak-naik">

                        @if(isset($_GET['page']))
                        <input type="hidden" name="page" value="{{ $_GET['page'] }}"> 
                        @endif
                        @if(isset($_GET['perPage']))
                        <input type="hidden" name="perPage" value="{{ $_GET['perPage'] }}"> 
                        @endif
                        @if(isset($_GET['search']))
                        <input type="hidden" name="search" value="{{ $_GET['search'] }}"> 
                        @endif
                        
                        @if(isset($_GET['dibuatTglDari'])) <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}" type="hidden"> @endif
                        @if(isset($_GET['dibuatTglKe'])) <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}" type="hidden"> @endif

                        <ul class="tw-p-3 tw-space-y-1 tw-text-sm tw-text-gray-700" aria-labelledby="dropdownToggleButton">
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
                                    <input type="checkbox" value="true" name="tmp_lahir" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['tmp_lahir']) @if($_GET['tmp_lahir'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Tempat Lahir</span>
                                  </label>
                                </div>
                            </li>
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="tgl_lahir" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['tgl_lahir']) @if($_GET['tgl_lahir'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Tanggal Lahir</span>
                                  </label>
                                </div>
                            </li>
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="tinggal_di_Kelas" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['tinggal_di_Kelas']) @if($_GET['tinggal_di_Kelas'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Tinggal di Kelas</span>
                                  </label>
                                </div>
                            </li>
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="alasan_tidak_naik" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['alasan_tidak_naik']) @if($_GET['alasan_tidak_naik'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500"></div>
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
                                    @elseif($_GET['sort_by'] == 'tmp_lahir')
                                    Tempat Lahir (selected)
                                    @elseif($_GET['sort_by'] == 'tgl_lahir')
                                    Tanggal Lahir (selected)
                                    @endif
                                </option>
                                @endif

                                <option value="nama_siswa">Nama Peserta Didik</option>
                                <option value="tmp_lahir">Tempat Lahir</option>
                                <option value="tgl_lahir">Tanggal Lahir</option>
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
                            <button type="submit" class="tw-w-full tw-rounded-lg tw-mx-3 tw-font-pop tw-text-white tw-text-sm tw-font-medium tw-mb-2 tw-py-2 tw-bg-sims-new-500 hover:tw-bg-sims-new-600 tw-transition-all tw-ease-in-out">Simpan</button>
                        </div>
                        </form>
                    </div>
                    <!-- end filter menu -->


                    {{-- DATA PERIODIK DROPDOWN --}}
                    <button id="dropdownToggleButton" data-dropdown-toggle="periodik-dd" class="tw-text-sims-new-500 hover:tw-text-white tw-font-satoshi focus:tw-ring-0 focus:tw-outline-none tw-font-medium tw-rounded-md tw-text-sm tw-px-4 tw-py-0.5 tw-ml-4 tw-text-center tw-inline-flex tw-items-center dark:tw-bg-white dark:hover:tw-bg-sims-new-500 tw-shadow-md tw-transition-all tw-ease-in-out" type="button">Data Periodik <i class="fa-duotone fa-calendar tw-ml-4"></i></button>
                
                    <div id="periodik-dd" class="hidden tw-z-10 tw-w-auto tw-bg-white tw-rounded tw-divide-y tw-divide-gray-100 tw-shadow-md">
                        <form action="/data-tidak-naik" class="tw-text-center">
                            
                            @if(isset($_GET['perPage']))
                            <input name="perPage" value="{{ $_GET['perPage'] }}" type="hidden">
                            @endif

                            @if(isset($_GET['search']))
                            <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                            @endif

                            @if(isset($_GET['nama_siswa'])) <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden"> @endif
                            @if(isset($_GET['tinggal_di_Kelas'])) <input name="tinggal_di_Kelas" value="{{ $_GET['tinggal_di_Kelas'] }}" type="hidden"> @endif
                            @if(isset($_GET['alasan_tidak_naik'])) <input name="alasan_tidak_naik" value="{{ $_GET['alasan_tidak_naik'] }}" type="hidden"> @endif
                            @if(isset($_GET['tmp_lahir'])) <input name="tmp_lahir" value="{{ $_GET['tmp_lahir'] }}" type="hidden"> @endif
                            @if(isset($_GET['tgl_lahir'])) <input name="tgl_lahir" value="{{ $_GET['tgl_lahir'] }}" type="hidden"> @endif
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
                                            <p class="text-sm font-bold text-gray-800 pb-1">Data periodik Tidak Naik Kelas</p>
                                            <p class="text-xs leading-4 text-gray-600">Data diambil berdasarkan tanggal dibuatnya rekap nilai siswa yang memiliki keterangan 'Tidak Naik'.</p>
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
                            <div class="tw-flex tw-justify-center tw-mt-3">
                                <button type="submit" class="tw-w-full tw-rounded-lg tw-mx-3 tw-font-pop tw-text-white tw-text-sm tw-font-medium tw-mb-2 tw-py-2 tw-bg-sims-new-500 hover:tw-bg-sims-new-600 tw-transition-all tw-ease-in-out">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="tw-flex md:tw-justify-center tw-items-center tw-mr-7">
                @cannot('wali-kelas')
                <button type="button" data-modal-toggle="export-print" title="Export ke print"><i class="fa-solid fa-print btn-export"></i></button>
                    
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
                            <form action="/data-tidak-naik-print" target="__blank" method="">
                                @csrf
                                <div class="tw-p-6">
                                    <div class="tw-text-gray-400 tw-font-pop tw-text-center tw-font-semibold tw-text-lg">Print Data</div>
                                    <div class="tw-flex tw-gap-3 tw-justify-between tw-mt-5 tw-mx-5">
                                        <div>
                                            <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Dari tanggal</div>
                                            <input class="input-data tw-text-xs tw-font-pop" id="dibuatTglDari" name="dibuatTglDari" type="date" placeholder="dd/mm/yyyy" @if(isset($_GET['dibuatTglDari'])) value="{{ $_GET['dibuatTglDari'] }}" @endif>
                                        </div>
                                        <div>
                                            <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Ke tanggal</div>
                                            <input class="input-data tw-text-xs tw-font-pop" id="dibuatTglKe" name="dibuatTglKe" type="date" placeholder="dd/mm/yyyy" @if(isset($_GET['dibuatTglKe'])) value="{{ $_GET['dibuatTglKe'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="tw-flex tw-justify-center tw-mt-3">
                                        <button type="submit" class="tw-w-full tw-rounded-lg tw-mx-3 tw-font-pop tw-text-white tw-text-sm tw-font-medium tw-mb-2 tw-py-2 tw-bg-sims-new-500 hover:tw-bg-sims-new-600 tw-transition-all tw-ease-in-out">Print</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <button id="copy_btn" title="Copy Data" type="button" value="copy"><i class="fa-solid fa-copy btn-export"></i></button> --}}

                <button type="button" data-modal-toggle="export-excel" title="Export ke excel"><i class="fa-solid fa-file-excel btn-export"></i></button>
                    
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
                            <form action="/data-tidak-naik-excel" method="">
                                @csrf
                                <div class="tw-p-6">
                                    <div class="tw-text-gray-400 tw-font-pop tw-text-center tw-font-semibold tw-text-lg">Export Data Excel</div>
                                    <div class="tw-flex tw-gap-3 tw-justify-between tw-mt-5 tw-mx-5">
                                        <div>
                                            <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Dari tanggal</div>
                                            <input class="input-data tw-text-xs tw-font-pop" id="dibuatTglDari" name="dibuatTglDari" type="date" placeholder="dd/mm/yyyy" @if(isset($_GET['dibuatTglDari'])) value="{{ $_GET['dibuatTglDari'] }}" @endif>
                                        </div>
                                        <div>
                                            <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Ke tanggal</div>
                                            <input class="input-data tw-text-xs tw-font-pop" id="dibuatTglKe" name="dibuatTglKe" type="date" placeholder="dd/mm/yyyy" @if(isset($_GET['dibuatTglKe'])) value="{{ $_GET['dibuatTglKe'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="tw-flex tw-justify-center tw-mt-3">
                                        <button type="submit" class="tw-w-full tw-rounded-lg tw-mx-3 tw-font-pop tw-text-white tw-text-sm tw-font-medium tw-mb-2 tw-py-2 tw-bg-sims-new-500 hover:tw-bg-sims-new-600 tw-transition-all tw-ease-in-out">Export</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <button type="button" data-modal-toggle="export-pdf" title="Export ke PDF"><i class="fa-solid fa-file-pdf btn-export tw-mr-0"></i></button>
                    
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
                            <form action="/data-tidak-naik-pdf" method="">
                                @csrf
                                <div class="tw-p-6">
                                    <div class="tw-text-gray-400 tw-font-pop tw-text-center tw-font-semibold tw-text-lg">Export Data PDF</div>
                                    <div class="tw-flex tw-gap-3 tw-justify-between tw-mt-5 tw-mx-5">
                                        <div>
                                            <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Dari tanggal</div>
                                            <input class="input-data tw-text-xs tw-font-pop" id="dibuatTglDari" name="dibuatTglDari" type="date" placeholder="dd/mm/yyyy" @if(isset($_GET['dibuatTglDari'])) value="{{ $_GET['dibuatTglDari'] }}" @endif>
                                        </div>
                                        <div>
                                            <div class="tw-text-xs tw-mb-2 tw-font-pop tw-font-normal tw-text-gray-400">Ke tanggal</div>
                                            <input class="input-data tw-text-xs tw-font-pop" id="dibuatTglKe" name="dibuatTglKe" type="date" placeholder="dd/mm/yyyy" @if(isset($_GET['dibuatTglKe'])) value="{{ $_GET['dibuatTglKe'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="tw-flex tw-justify-center tw-mt-3">
                                        <button type="submit" class="tw-w-full tw-rounded-lg tw-mx-3 tw-font-pop tw-text-white tw-text-sm tw-font-medium tw-mb-2 tw-py-2 tw-bg-sims-new-500 hover:tw-bg-sims-new-600 tw-transition-all tw-ease-in-out">Export</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endcannot
            </div>
        </div>

        @if(isset($raport))
        <div class="tw-overflow-x-auto tw-relative tw-mt-7">
            <table class="tw-w-full tw-text-lg tw-text-center tw-font-satoshi tw-text-bluewood-900">
                <thead class="tw-border-y">
                    <tr>
                        <th scope="col" class="tw-py-5 tw-px-6">No</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Nama Peserta Didik</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Tempat Tanggal Lahir</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Tinggal di Kelas</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Alasan</th>
                    </tr>
                </thead>
                <tbody class="tw-text-base">
                    @foreach ($raport as $key => $r)
                    <tr class="tw-bg-white">
                        <td class="tw-p-6">{{ $key + 1 }}</td>
                        <td class="tw-p-6">{{ $r->siswa->nama_siswa }}</td>
                        <td class="tw-p-6">{{ $r->siswa->tmp_lahir }}, {{ $r->siswa->tgl_lahir }}</td>
                        <td class="tw-p-6">{{ $r->tinggal_di_Kelas }}</td>
                        <td class="tw-p-6">{{ $r->alasan_tidak_naik }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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

            <div class="tw-py-3 tw-my-auto tw-h-min tw-flex tw-justify-center">
                <form action="/data-tidak-naik" class="tw-text-center">

                    @if(isset($_GET['perPage']))
                    <input name="perPage" value="{{ $_GET['perPage'] }}" type="hidden">
                    @endif

                    @if(isset($_GET['search']))
                    <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                    @endif

                    @if(isset($_GET['nama_siswa'])) <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden"> @endif
                    @if(isset($_GET['tinggal_di_Kelas'])) <input name="tinggal_di_Kelas" value="{{ $_GET['tinggal_di_Kelas'] }}" type="hidden"> @endif
                    @if(isset($_GET['alasan_tidak_naik'])) <input name="alasan_tidak_naik" value="{{ $_GET['alasan_tidak_naik'] }}" type="hidden"> @endif
                    @if(isset($_GET['tmp_lahir'])) <input name="tmp_lahir" value="{{ $_GET['tmp_lahir'] }}" type="hidden"> @endif
                    @if(isset($_GET['tgl_lahir'])) <input name="tgl_lahir" value="{{ $_GET['tgl_lahir'] }}" type="hidden"> @endif
                    @if(isset($_GET['sort_by'])) <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden"> @endif
                    @if(isset($_GET['sort'])) <input name="sort" value="{{ $_GET['sort'] }}" type="hidden"> @endif
                    @if(isset($_GET['dibuatTglDari'])) <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}" type="hidden"> @endif
                    @if(isset($_GET['dibuatTglKe'])) <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}" type="hidden"> @endif
                    
                    <input type="number" name="page" class="tw-bg-white tw-border tw-border-slate-200 tw-w-1/2 tw-font-pop tw-font-medium tw-text-slate-500 tw-rounded-md tw-text-center focus:tw-ring-gray-200 focus:tw-border-gray-200 no-spin" min="1" @if(isset($_GET['page'])) value="{{ $_GET['page'] }}" @endif>
                </form>
            </div>
            
            <div class="tw-float-right tw-py-5">
            @if($response->to >= $total)
            <a class="tw-text-sims-new-700 hover:tw-text-sims-new-700 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-solid fa-chevron-right"></i></a>
            @else
            <a href="{{ $response->next_page_url }}" class="tw-transition-all tw-text-sims-new-500 hover:tw-bg-sims-new-500 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-solid fa-chevron-right"></i></a>
            @endif
            </div>

        </div>
        @else
            <div class="tw-flex tw-justify-center">
                <div class="tw-w-1/3 tw-my-28">
                    <img src="{{ URL::asset('assets/img/search-not-found.png') }}" class="-tw-mb-1" alt="g ada dek">
                    <div class="tw-font-pop tw-text-sims-new-600 tw-font-bold tw-text-3xl tw-text-center tw-mt-8">
                        Data tidak dapat ditemukan.
                    </div>
                </div>
            </div>
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

                <div class="tw-py-3 tw-my-auto tw-h-min tw-flex tw-justify-center">
                    <form action="/data-tidak-naik" class="tw-text-center">

                        @if(isset($_GET['perPage']))
                        <input name="perPage" value="{{ $_GET['perPage'] }}" type="hidden">
                        @endif

                        @if(isset($_GET['search']))
                        <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                        @endif


                        @if(isset($_GET['nama_siswa'])) <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden"> @endif
                        @if(isset($_GET['tinggal_di_Kelas'])) <input name="tinggal_di_Kelas" value="{{ $_GET['tinggal_di_Kelas'] }}" type="hidden"> @endif
                        @if(isset($_GET['alasan_tidak_naik'])) <input name="alasan_tidak_naik" value="{{ $_GET['alasan_tidak_naik'] }}" type="hidden"> @endif
                        @if(isset($_GET['tmp_lahir'])) <input name="tmp_lahir" value="{{ $_GET['tmp_lahir'] }}" type="hidden"> @endif
                        @if(isset($_GET['tgl_lahir'])) <input name="tgl_lahir" value="{{ $_GET['tgl_lahir'] }}" type="hidden"> @endif
                        @if(isset($_GET['sort_by'])) <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden"> @endif
                        @if(isset($_GET['sort'])) <input name="sort" value="{{ $_GET['sort'] }}" type="hidden"> @endif
                        @if(isset($_GET['dibuatTglDari'])) <input name="dibuatTglDari" value="{{ $_GET['dibuatTglDari'] }}" type="hidden"> @endif
                        @if(isset($_GET['dibuatTglKe'])) <input name="dibuatTglKe" value="{{ $_GET['dibuatTglKe'] }}" type="hidden"> @endif


                        <input type="number" name="page" class="tw-bg-white tw-border tw-border-slate-200 tw-w-1/2 tw-font-pop tw-font-medium tw-text-slate-500 tw-rounded-md tw-text-center focus:tw-ring-gray-200 focus:tw-border-gray-200 no-spin" min="1" @if(isset($_GET['page'])) value="{{ $_GET['page'] }}" @endif>
                    </form>
                </div>

                <div class="tw-float-right tw-py-5">
                @if($response->to >= $total)
                <a class="tw-text-sims-new-700 hover:tw-text-sims-new-700 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-solid fa-chevron-right"></i></a>
                @else
                <a href="{{ $response->next_page_url }}" class="tw-transition-all tw-text-sims-new-500 hover:tw-bg-sims-new-500 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-solid fa-chevron-right"></i></a>
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
@endsection

{{-- @push('scripts')
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
@endpush --}}

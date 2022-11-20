@extends('layouts.main')

@section('content')
<style>
    .no-spin::-webkit-inner-spin-button, .no-spin::-webkit-outer-spin-button {
    -webkit-appearance: none !important;
    margin: 0 !important;
    }
</style>

<div class="tw-mx-10">
    <div class="tw-flex tw-mt-8">
        <h4 class="title-main">Data Siswa Tidak Naik Kelas</h4>
    </div>
        <div class="tw-flex tw-justify-between tw-mt-3 sm:tw-flex-wrap sm:tw-gap-5">
            <div class="tw-flex">
                <form action="/data-tidak-naik"> 
                    <div class="relative tw-border-2 tw-rounded-lg focus:tw-ring-sims-400">
                        
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

                        <input type="text" id="search" name="search" class="tw-py-1 tw-px-5 tw-border-none tw-rounded-md" value="{{ request()->search }}">
                        <i class="fa-solid fa-magnifying-glass tw-pr-5 tw-pl-3 tw-text-slate-600"></i>
                    </div>
                </form>
                <div class="tw-text-base pt-1 tw-text-basic-700 tw-ml-4 tw-mr-2 tw-font-normal tw-font-pop">Show</div>
                <select name="show-data-perpage" id="show-data-perpage" class="tw-bg-gray-300 tw-font-bold tw-px-7 tw-rounded-xl tw-text tw-mb-2 tw-border-none">
                    <option value="/data-tidak-naik?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=10&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&tinggal_di_Kelas=@isset($_GET['tinggal_di_Kelas']){{ $_GET['tinggal_di_Kelas'] }}@endisset&alasan_tidak_naik=@isset($_GET['alasan_tidak_naik']){{ $_GET['alasan_tidak_naik'] }}@endisset&tmp_lahir=@isset($_GET['tmp_lahir']){{ $_GET['tmp_lahir'] }}@endisset&tgl_lahir=@isset($_GET['tgl_lahir']){{ $_GET['tgl_lahir'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                    <option value="/data-tidak-naik?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=25&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&tinggal_di_Kelas=@isset($_GET['tinggal_di_Kelas']){{ $_GET['tinggal_di_Kelas'] }}@endisset&alasan_tidak_naik=@isset($_GET['alasan_tidak_naik']){{ $_GET['alasan_tidak_naik'] }}@endisset&tmp_lahir=@isset($_GET['tmp_lahir']){{ $_GET['tmp_lahir'] }}@endisset&tgl_lahir=@isset($_GET['tgl_lahir']){{ $_GET['tgl_lahir'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                    <option value="/data-tidak-naik?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=50&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&tinggal_di_Kelas=@isset($_GET['tinggal_di_Kelas']){{ $_GET['tinggal_di_Kelas'] }}@endisset&alasan_tidak_naik=@isset($_GET['alasan_tidak_naik']){{ $_GET['alasan_tidak_naik'] }}@endisset&tmp_lahir=@isset($_GET['tmp_lahir']){{ $_GET['tmp_lahir'] }}@endisset&tgl_lahir=@isset($_GET['tgl_lahir']){{ $_GET['tgl_lahir'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                    <option value="/data-tidak-naik?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=100&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&tinggal_di_Kelas=@isset($_GET['tinggal_di_Kelas']){{ $_GET['tinggal_di_Kelas'] }}@endisset&alasan_tidak_naik=@isset($_GET['alasan_tidak_naik']){{ $_GET['alasan_tidak_naik'] }}@endisset&tmp_lahir=@isset($_GET['tmp_lahir']){{ $_GET['tmp_lahir'] }}@endisset&tgl_lahir=@isset($_GET['tgl_lahir']){{ $_GET['tgl_lahir'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                </select>
                <div class="tw-text-base pt-1 tw-mx-2 tw-font-pop tw-font-normal tw-text-basic-700">Entries</div>
            
                <div class="tw-flex tw-mx-1 tw-my-auto">
                    
                    {{-- FILTER DROPDOWN --}}
                    <button id="dropdownToggleButton" data-dropdown-toggle="filter-dd" class="tw-text-sims-500 hover:tw-text-white tw-font-pop focus:tw-ring-0 focus:tw-outline-none tw-font-medium tw-rounded-lg tw-text-sm tw-px-4 tw-py-1 tw-ml-2 tw-text-center tw-inline-flex tw-items-center dark:tw-bg-white dark:hover:tw-bg-sims-500 tw-shadow-md tw-transition-all tw-ease-in-out" type="button">Filters <i class="tw-text-xl tw-ml-5 fa-duotone fa-sliders-simple"></i></button>

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
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-400"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Nama Siswa</span>
                                  </label>
                                </div>
                            </li>
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="tmp_lahir" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['tmp_lahir']) @if($_GET['tmp_lahir'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-400"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Tempat Lahir</span>
                                  </label>
                                </div>
                            </li>
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="tgl_lahir" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['tgl_lahir']) @if($_GET['tgl_lahir'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-400"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Tanggal Lahir</span>
                                  </label>
                                </div>
                            </li>
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="tinggal_di_Kelas" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['tinggal_di_Kelas']) @if($_GET['tinggal_di_Kelas'] === "true") checked @endif @endisset>
                                    <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-400"></div>
                                    <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Tinggal di Kelas</span>
                                  </label>
                                </div>
                            </li>
                            <li>
                                <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                                  <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                                    <input type="checkbox" value="true" name="alasan_tidak_naik" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['alasan_tidak_naik']) @if($_GET['alasan_tidak_naik'] === "true") checked @endif @endisset>
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
                            <button type="submit" class="tw-w-full tw-rounded-lg tw-mx-3 tw-font-pop tw-text-white tw-text-sm tw-font-medium tw-mb-2 tw-py-2 tw-bg-sims-400 hover:tw-bg-sims-500 tw-transition-all tw-ease-in-out">Simpan</button>
                        </div>
                        </form>
                    </div>
                    <!-- end filter menu -->


                    {{-- DATA PERIODIK DROPDOWN --}}
                    <button id="dropdownToggleButton" data-dropdown-toggle="periodik-dd" class="tw-text-sims-400 hover:tw-text-white tw-font-pop focus:tw-ring-0 focus:tw-outline-none tw-font-medium tw-rounded-lg tw-text-sm tw-px-4 tw-py-1 tw-ml-4 tw-text-center tw-inline-flex tw-items-center dark:tw-bg-white dark:hover:tw-bg-sims-500 tw-shadow-md tw-transition-all tw-ease-in-out" type="button">Data Periodik <i class="fa-duotone fa-calendar tw-ml-4"></i></button>
                
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
                                <button type="submit" class="tw-w-full tw-rounded-lg tw-mx-3 tw-font-pop tw-text-white tw-text-sm tw-font-medium tw-mb-2 tw-py-2 tw-bg-sims-400 hover:tw-bg-sims-500 tw-transition-all tw-ease-in-out">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tw-flex md:tw-justify-center tw-items-center md:-tw-mb-8">
                <a href="/data-tidak-naik-print" title="Print"><i class="fa-solid fa-print btn-export"></i></a>
                <button id="copy_btn" title="Copy Data" type="button" value="copy"><i class="fa-solid fa-copy btn-export"></i></button>
                <a href="/data-tidak-naik-excel" title="Export ke Excel"><i class="fa-solid fa-file-excel btn-export"></i></a>
                <a href="/data-tidak-naik-pdf" title="Export ke PDF"><i class="fa-solid fa-file-pdf btn-export"></i></a>
            </div>
        </div>

        @if(isset($raport))
        <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl tw-mt-5">
            <table class="tw-w-full tw-text-sm tw-text-center">
                <thead class="tw-text-md tw-bg-gray-100 tw-text-basic-700 tw-border tw-font-pop">
                    <tr>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NO</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NAMA PESERTA DIDIK</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">TEMPAT TANGGAL LAHIR</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">TINGGAL DI KELAS</th>
                        <th scope="col" class="tw-py-3 tw-px-6">ALASAN</th>
                    </tr>
                </thead>
                <tbody class="tw-text-base">
                    @foreach ($raport as $r)
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $r->siswa->nama_siswa }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $r->siswa->tmp_lahir }}, {{ $r->siswa->tgl_lahir }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $r->tinggal_di_Kelas }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $r->alasan_tidak_naik }}</td>
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

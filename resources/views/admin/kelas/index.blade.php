@extends('layouts.main-new')

@section('content')
<style>
    .no-spin::-webkit-inner-spin-button, .no-spin::-webkit-outer-spin-button {
    -webkit-appearance: none !important;
    margin: 0 !important;
    }
</style>
<div class="tw-mt-10">
    <div class="tw-flex lg:tw-flex-row sm:tw-flex-col tw-ml-8 tw-mr-7 tw-justify-between tw-mt-8">
        <div class="tw-flex tw-flex-col">
            <h4 class="sims-heading-3xl">Data Kelas</h4>
            <h6 class="sims-heading-md-black">Seluruh Jurusan</h6>
        </div>
    </div>

    <div class="tw-flex tw-justify-between tw-ml-8 tw-mt-8 lg:tw-flex-row sm:tw-flex-col sm:tw-gap-5">
        <div class="tw-flex tw-my-auto">
            <form action="/siswa-keluar">
                <div class="relative tw-border-[1.5px] tw-border-gray-300 tw-rounded-xl focus:tw-ring-sims-new-500">
                    
                    <input name="page" value="1" type="hidden">
                    <input name="perPage" value="10" type="hidden">
                    <input type="text" name="search" id="search" class="tw-block tw-py-1 tw-px-5 tw-border-none tw-rounded-xl" value="{{ request()->search }}"> 
                    
                    {{-- @if(isset($_GET['nama_siswa'])) <input name="nama_siswa" value="{{ $_GET['nama_siswa'] }}" type="hidden"> @endif --}}
                    {{-- @if(isset($_GET['nis_siswa'])) <input name="nis_siswa" value="{{ $_GET['nis_siswa'] }}" type="hidden"> @endif --}}
                    {{-- @if(isset($_GET['keluar_di_kelas'])) <input name="keluar_di_kelas" value="{{ $_GET['keluar_di_kelas'] }}" type="hidden"> @endif --}}
                    {{-- @if(isset($_GET['tgl_mutasi'])) <input name="tgl_mutasi" value="{{ $_GET['tgl_mutasi'] }}" type="hidden"> @endif --}}
                    {{-- @if(isset($_GET['sk_mutasi'])) <input name="sk_mutasi" value="{{ $_GET['sk_mutasi'] }}" type="hidden"> @endif --}}
                    {{-- @if(isset($_GET['alasan_mutasi'])) <input name="alasan_mutasi" value="{{ $_GET['alasan_mutasi'] }}" type="hidden"> @endif --}}
                    {{-- @if(isset($_GET['sort_by'])) <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden"> @endif --}}
                    {{-- @if(isset($_GET['sort'])) <input name="sort" value="{{ $_GET['sort'] }}" type="hidden"> @endif --}}
                    {{-- @if(isset($_GET['tgl_keluar_dari'])) <input name="tgl_keluar_dari" value="{{ $_GET['tgl_keluar_dari'] }}" type="hidden"> @endif --}}
                    {{-- @if(isset($_GET['tgl_keluar_ke'])) <input name="tgl_keluar_ke" value="{{ $_GET['tgl_keluar_ke'] }}" type="hidden"> @endif --}}

                    <i class="fa-thin fa-magnifying-glass tw-absolute tw-text-gray-400 right-0 tw-inset-y-1.5 tw-pr-5 tw-text-sm"></i>
                </div>
            </form>

            <div class="tw-my-auto tw-text-basic-700 tw-ml-8 tw-mr-2 tw-font-normal tw-font-satoshi">Tampilkan</div>
            <select name="show-data-perpage" id="show-data-perpage" class="tw-px-5 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-200 tw-peer tw-font-bold  bg-transparent tw-border-0 tw-border-b-2 tw-border-gray-200 tw-appearance-none tw-block">
                {{-- <option value="/siswa-keluar?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=10&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&keluar_di_kelas=@isset($_GET['keluar_di_kelas']){{ $_GET['keluar_di_kelas'] }}@endisset&tgl_mutasi=@isset($_GET['tgl_mutasi']){{ $_GET['tgl_mutasi'] }}@endisset&sk_mutasi=@isset($_GET['sk_mutasi']){{ $_GET['sk_mutasi'] }}@endisset&alasan_mutasi=@isset($_GET['alasan_mutasi']){{ $_GET['alasan_mutasi'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&tgl_keluar_dari=@isset($_GET['tgl_keluar_dari']){{ $_GET['tgl_keluar_dari'] }}@endisset&tgl_keluar_ke=@isset($_GET['tgl_keluar_ke']){{ $_GET['tgl_keluar_ke'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option> --}}
                {{-- <option value="/siswa-keluar?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=25&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&keluar_di_kelas=@isset($_GET['keluar_di_kelas']){{ $_GET['keluar_di_kelas'] }}@endisset&tgl_mutasi=@isset($_GET['tgl_mutasi']){{ $_GET['tgl_mutasi'] }}@endisset&sk_mutasi=@isset($_GET['sk_mutasi']){{ $_GET['sk_mutasi'] }}@endisset&alasan_mutasi=@isset($_GET['alasan_mutasi']){{ $_GET['alasan_mutasi'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&tgl_keluar_dari=@isset($_GET['tgl_keluar_dari']){{ $_GET['tgl_keluar_dari'] }}@endisset&tgl_keluar_ke=@isset($_GET['tgl_keluar_ke']){{ $_GET['tgl_keluar_ke'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option> --}}
                {{-- <option value="/siswa-keluar?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=50&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&keluar_di_kelas=@isset($_GET['keluar_di_kelas']){{ $_GET['keluar_di_kelas'] }}@endisset&tgl_mutasi=@isset($_GET['tgl_mutasi']){{ $_GET['tgl_mutasi'] }}@endisset&sk_mutasi=@isset($_GET['sk_mutasi']){{ $_GET['sk_mutasi'] }}@endisset&alasan_mutasi=@isset($_GET['alasan_mutasi']){{ $_GET['alasan_mutasi'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&tgl_keluar_dari=@isset($_GET['tgl_keluar_dari']){{ $_GET['tgl_keluar_dari'] }}@endisset&tgl_keluar_ke=@isset($_GET['tgl_keluar_ke']){{ $_GET['tgl_keluar_ke'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option> --}}
                {{-- <option value="/siswa-keluar?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=100&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&nama_siswa=@isset($_GET['nama_siswa']){{ $_GET['nama_siswa'] }}@endisset&nis_siswa=@isset($_GET['nis_siswa']){{ $_GET['nis_siswa'] }}@endisset&keluar_di_kelas=@isset($_GET['keluar_di_kelas']){{ $_GET['keluar_di_kelas'] }}@endisset&tgl_mutasi=@isset($_GET['tgl_mutasi']){{ $_GET['tgl_mutasi'] }}@endisset&sk_mutasi=@isset($_GET['sk_mutasi']){{ $_GET['sk_mutasi'] }}@endisset&alasan_mutasi=@isset($_GET['alasan_mutasi']){{ $_GET['alasan_mutasi'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset&tgl_keluar_dari=@isset($_GET['tgl_keluar_dari']){{ $_GET['tgl_keluar_dari'] }}@endisset&tgl_keluar_ke=@isset($_GET['tgl_keluar_ke']){{ $_GET['tgl_keluar_ke'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option> --}}
            </select>
            <div class="tw-my-auto tw-mx-2 tw-font-satoshi tw-font-normal tw-text-basic-700">data</div>

            {{-- FILTER DROPDOWN --}}
            <button id="dropdownToggleButton" data-dropdown-toggle="filter-dd" class="tw-text-sims-new-500 hover:tw-text-white tw-font-satoshi focus:tw-ring-0 focus:tw-outline-none tw-font-medium tw-rounded-md tw-text-sm tw-px-5 tw-py-0.5 tw-ml-8 tw-text-center tw-inline-flex tw-items-center dark:tw-bg-white dark:hover:tw-bg-sims-new-500 tw-shadow-md tw-transition-all tw-ease-in-out" type="button">Filters <i class="tw-text-xl tw-ml-5 fa-duotone fa-sliders-simple"></i></button>
            
            <!-- filter menu -->
            <div id="filter-dd" class="hidden tw-z-10 tw-w-72 tw-bg-white tw-rounded tw-divide-y tw-divide-gray-100 tw-shadow-md">
                <div class="tw-font-pop tw-text-xs tw-text-gray-400 tw-my-2 tw-mx-5">Cari berdasarkan...</div>
                <form action="/siswa-keluar">
                
                {{-- @if(isset($_GET['page'])) --}}
                {{-- <input type="hidden" name="page" value="{{ $_GET['page'] }}">  --}}
                {{-- @endif --}}
                {{-- @if(isset($_GET['perPage'])) --}}
                {{-- <input type="hidden" name="perPage" value="{{ $_GET['perPage'] }}">  --}}
                {{-- @endif --}}
                {{-- @if(isset($_GET['search'])) --}}
                {{-- <input type="hidden" name="search" value="{{ $_GET['search'] }}">  --}}
                {{-- @endif --}}

                
                <ul class="tw-p-3 tw-space-y-1 tw-text-sm tw-text-gray-700" aria-labelledby="dropdownToggleButton">
                    <li>
                        <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                          <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                            <input type="checkbox" value="true" name="id" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['id']) @if($_GET['id'] === "true") checked @endif @endisset>
                            <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500"></div>
                            <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Id Kelas</span>
                          </label>
                        </div>
                    </li>
                    <li>
                        <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                          <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                            <input type="checkbox" value="true" name="kelas" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['kelas']) @if($_GET['kelas'] === "true") checked @endif @endisset>
                            <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500"></div>
                            <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Kelas</span>
                          </label>
                        </div>
                    </li>
                    <li>
                        <div class="tw-flex tw-p-2 tw-rounded hover:tw-bg-gray-100 tw-transition-all tw-ease-in-out">
                          <label class="tw-inline-flex tw-relative tw-items-center tw-w-full tw-cursor-pointer">
                            <input type="checkbox" value="true" name="JurusanId" class="tw-sr-only tw-peer focus:tw-ring-0 focus:tw-ring-offset-0" @isset($_GET['JurusanId']) @if($_GET['JurusanId'] === "true") checked @endif @endisset>
                            <div class="tw-w-9 tw-h-5 tw-bg-gray-200 peer-focus:tw-outline-none tw-rounded-full tw-peer peer-checked:after:tw-translate-x-full peer-checked:after:tw-border-white after:tw-content-[''] after:tw-absolute after:tw-top-[2px] after:tw-left-[2px] after:tw-bg-white after:tw-border-gray-300 after:tw-border after:tw-rounded-full after:tw-h-4 after:tw-w-4 after:tw-transition-all peer-checked:tw-bg-sims-new-500"></div>
                            <span class="tw-ml-3 tw-text-xs tw-font-medium tw-text-gray-500 dark:text-gray-300">Id Jurusan</span>
                          </label>
                        </div>
                    </li>
                </ul>
                <div class="tw-border-t tw-border-gray-100 tw-mb-3"></div>
                <div class="tw-font-pop tw-text-xs tw-text-gray-400 tw-my-2 tw-mx-5">Urutkan berdasarkan...</div>
                <div class="tw-mx-5 tw-flex tw-justify-center">
                    <select class="input-data tw-text-xs" id="sort_by" name="sort_by" required>

                        // tampilkan option yg di select berdasarkan parameter sort_by
                        {{-- @if(isset($_GET['sort_by']))
                        <option value="{{ $_GET['sort_by'] }}">
                            @if($_GET['sort_by'] == 'id')
                            Id Kelas (selected)
                            @elseif($_GET['sort_by'] == 'kelas')
                            Kelas (selected)
                            @elseif($_GET['sort_by'] == 'JurusanId')
                            Id Jurusan (selected)
                            @endif
                        </option>
                        @endif --}}
                        <option value="id">Id Kelas</option>
                        <option value="kelas">Kelas</option>
                        <option value="JurusanId">Id Jurusan</option>
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

                {{-- @if(isset($_GET['tgl_keluar_dari'])) <input name="tgl_keluar_dari" value="{{ $_GET['tgl_keluar_dari'] }}" type="hidden"> @endif --}}
                {{-- @if(isset($_GET['tgl_keluar_ke'])) <input name="tgl_keluar_ke" value="{{ $_GET['tgl_keluar_ke'] }}" type="hidden"> @endif --}}
                </form>
            </div>
            <!-- end filter menu -->

        </div>
        @can('admin')
        <div class="flex">
            <a href="/kelas/create"
                class="tw-bg-sims-new-500 tw-text-white hover:tw-text-white hover:tw-bg-sims-new-700 tw-font-satoshi tw-rounded-lg tw-px-8 tw-py-2 tw-mr-7">
                    Tambah Data +
            </a>
        </div>
        @endcan
    </div>

        <div class="tw-overflow-x-auto tw-relative tw-mt-7">
            <table class="tw-w-full tw-text-lg tw-text-center tw-font-satoshi tw-text-bluewood-900">
                <thead class="tw-border-y">
                    <tr>
                        <th scope="col" class="tw-py-5 tw-px-6">Id</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Kelas</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Rombel</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Id Jurusan</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Dibuat</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Aksi</th>
                    </tr>
                </thead>
                <tbody class="tw-text-base">
                    <tr class="tw-bg-white">
                        <td class="tw-p-6">01</td>
                        <td class="tw-p-6">X</td>
                        <td class="tw-p-6">PPLG</td>
                        <td class="tw-p-6">1</td>
                        <td class="tw-p-6">X PPLG 1</td>
                        <td class="tw-p-6">
                            <a title="Edit Data" href="/edit-mutasi-keluar/"
                                class="tw-text-kuning-500 hover:tw-bg-kuning-500 hover:tw-text-white hover:tw-shadow-md tw-transition-all tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                            </a>
                            <a href="/detail/" class="tw-text-gray-400  hover:tw-text-white hover:tw-bg-gray-400 hover:tw-shadow-md tw-rounded-lg tw-text-xl tw-py-2 tw-px-3 tw-w-12 tw-transition-all" title="Detail Data">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
    <script src="DataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#KelasTable').DataTable();
        });
    </script> --}} -->

<!-- {{-- </body> --}} -->

@endsection
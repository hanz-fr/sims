@extends('layouts.main-new')

@section('content')

<style>
    .no-spin::-webkit-inner-spin-button, .no-spin::-webkit-outer-spin-button {
    -webkit-appearance: none !important;
    margin: 0 !important;
    }
</style>

<div class="tw-mt-10">
    <div class="tw-flex tw-flex-col tw-mt-8 tw-ml-8">
        <h4 class="sims-heading-3xl">Data Kelas</h4>
        <div class="sims-text-gray-sm">Total : {{ $total_kelas }}</div>
    </div>

    <div class="tw-flex tw-justify-between tw-ml-8 tw-mt-8 lg:tw-flex-row sm:tw-flex-col sm:tw-gap-5">
        <div class="tw-flex tw-my-auto">
            <form action="/admin/kelas">
                <div class="relative tw-border-[1.5px] tw-border-gray-300 tw-rounded-xl">
                    
                    <input name="page" value="1" type="hidden">
                    <input name="perPage" value="10" type="hidden">
                    <input type="text" name="search" id="search" class="tw-block tw-py-1 tw-px-5 tw-border-none tw-rounded-xl focus:tw-ring-sims-new-500" value="{{ request()->search }}"> 
                    
                    @if(isset($_GET['id'])) <input name="id" value="{{ $_GET['id'] }}" type="hidden"> @endif
                    @if(isset($_GET['kelas'])) <input name="kelas" value="{{ $_GET['kelas'] }}" type="hidden"> @endif
                    @if(isset($_GET['rombel'])) <input name="rombel" value="{{ $_GET['rombel'] }}" type="hidden"> @endif
                    @if(isset($_GET['JurusanId'])) <input name="JurusanId" value="{{ $_GET['JurusanId'] }}" type="hidden"> @endif

                    <i class="fa-thin fa-magnifying-glass tw-absolute tw-text-gray-400 right-0 tw-inset-y-1.5 tw-pr-5 tw-text-sm"></i>
                </div>
            </form>

            {{-- limit --}}
            <div class="tw-my-auto tw-text-basic-700 tw-ml-8 tw-mr-2 tw-font-normal tw-font-satoshi">Tampilkan</div>
            <select name="show-data-perpage" id="show-data-perpage" class="tw-pl-4 tw-px-7 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-200 tw-peer tw-font-bold  bg-transparent tw-border-0 tw-border-b-2 tw-border-gray-200 tw-appearance-none tw-block">
                <option value="/admin/kelas?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=10&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&id=@isset($_GET['id']){{ $_GET['id'] }}@endisset&kelas=@isset($_GET['kelas']){{ $_GET['kelas'] }}@endisset&rombel=@isset($_GET['rombel']){{ $_GET['rombel'] }}@endisset&JurusanId=@isset($_GET['JurusanId']){{ $_GET['JurusanId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                <option value="/admin/kelas?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=25&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&id=@isset($_GET['id']){{ $_GET['id'] }}@endisset&kelas=@isset($_GET['kelas']){{ $_GET['kelas'] }}@endisset&rombel=@isset($_GET['rombel']){{ $_GET['rombel'] }}@endisset&JurusanId=@isset($_GET['JurusanId']){{ $_GET['JurusanId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                <option value="/admin/kelas?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=50&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&id=@isset($_GET['id']){{ $_GET['id'] }}@endisset&kelas=@isset($_GET['kelas']){{ $_GET['kelas'] }}@endisset&rombel=@isset($_GET['rombel']){{ $_GET['rombel'] }}@endisset&JurusanId=@isset($_GET['JurusanId']){{ $_GET['JurusanId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                <option value="/admin/kelas?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=100&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&id=@isset($_GET['id']){{ $_GET['id'] }}@endisset&kelas=@isset($_GET['kelas']){{ $_GET['kelas'] }}@endisset&rombel=@isset($_GET['rombel']){{ $_GET['rombel'] }}@endisset&JurusanId=@isset($_GET['JurusanId']){{ $_GET['JurusanId'] }}@endisset&sort_by=@isset($_GET['sort_by']){{ $_GET['sort_by'] }}@endisset&sort=@isset($_GET['sort']){{ $_GET['sort'] }}@endisset" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
            </select>
            <div class="tw-my-auto tw-mx-2 tw-font-satoshi tw-font-normal tw-text-basic-700">data</div>

            {{-- sort by --}}
            <div class="tw-my-auto tw-text-basic-700 tw-ml-8 tw-mr-2 tw-font-normal tw-font-satoshi">Urutkan berdasarkan</div>
            <select name="sort-by-data" id="sort-by-data" class="tw-px-5 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-200 tw-peer tw-font-bold  bg-transparent tw-border-0 tw-border-b-2 tw-border-gray-200 tw-appearance-none tw-block">
                <option value="/admin/kelas?page=@if(isset($_GET['page'])){{ $_GET['page'] }}@endif&perPage=@if(isset($_GET['perPage'])){{ $_GET['perPage'] }}@endif&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&sort_by=id&sort=@if(isset($_GET['sort'])){{ $_GET['sort'] }}@endif" @isset($_GET['sort_by']) @if($_GET['sort_by'] === 'id') selected @endif @endisset class="tw-bg-white">Id</option>
                <option value="/admin/kelas?page=@if(isset($_GET['page'])){{ $_GET['page'] }}@endif&perPage=@if(isset($_GET['perPage'])){{ $_GET['perPage'] }}@endif&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&sort_by=kelas&sort=@if(isset($_GET['sort'])){{ $_GET['sort'] }}@endif" @isset($_GET['sort_by']) @if($_GET['sort_by'] === 'kelas') selected @endif @endisset class="tw-bg-white">Kelas</option>
                <option value="/admin/kelas?page=@if(isset($_GET['page'])){{ $_GET['page'] }}@endif&perPage=@if(isset($_GET['perPage'])){{ $_GET['perPage'] }}@endif&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&sort_by=rombel&sort=@if(isset($_GET['sort'])){{ $_GET['sort'] }}@endif" @isset($_GET['sort_by']) @if($_GET['sort_by'] === 'rombel') selected @endif @endisset class="tw-bg-white">Rombel</option>
                <option value="/admin/kelas?page=@if(isset($_GET['page'])){{ $_GET['page'] }}@endif&perPage=@if(isset($_GET['perPage'])){{ $_GET['perPage'] }}@endif&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&sort_by=JurusanId&sort=@if(isset($_GET['sort'])){{ $_GET['sort'] }}@endif" @isset($_GET['sort_by']) @if($_GET['sort_by'] === 'JurusanId') selected @endif @endisset class="tw-bg-white">Id Jurusan</option>
                <option value="/admin/kelas?page=@if(isset($_GET['page'])){{ $_GET['page'] }}@endif&perPage=@if(isset($_GET['perPage'])){{ $_GET['perPage'] }}@endif&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&sort_by=createdAt&sort=@if(isset($_GET['sort'])){{ $_GET['sort'] }}@endif" @isset($_GET['sort_by']) @if($_GET['sort_by'] === 'createdAt') selected @endif @endisset class="tw-bg-white">Tgl Dibuat</option>
            </select>

            {{-- sort --}}
            <select name="sort-data" id="sort-data" class="tw-pl-5 tw-px-10 tw-mx-5 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-200 tw-peer tw-font-bold  bg-transparent tw-border-0 tw-border-b-2 tw-border-gray-200 tw-appearance-none tw-block">
                <option value="/admin/kelas?page=@if(isset($_GET['page'])){{ $_GET['page'] }}@endif&perPage=@if(isset($_GET['perPage'])){{ $_GET['perPage'] }}@endif&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&sort_by=@if(isset($_GET['sort_by'])){{ $_GET['sort_by'] }}@endif&sort=ASC" @isset($_GET['sort']) @if($_GET['sort'] === 'ASC') selected @endif @endisset class="tw-bg-white">A-Z</option>
                <option value="/admin/kelas?page=@if(isset($_GET['page'])){{ $_GET['page'] }}@endif&perPage=@if(isset($_GET['perPage'])){{ $_GET['perPage'] }}@endif&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif&sort_by=@if(isset($_GET['sort_by'])){{ $_GET['sort_by'] }}@endif&sort=DESC" @isset($_GET['sort']) @if($_GET['sort'] === 'DESC') selected @endif @endisset class="tw-bg-white">Z-A</option>
            </select>

        </div>
        @can('admin-only')
        <div class="tw-flex md:tw-justify-center tw-items-center tw-mr-7">
            <form action="/admin/kelas/create" method="GET">
                <button type="submit" data-modal-toggle="popup-modal" class="tw-bg-sims-new-500 tw-text-white hover:tw-text-white hover:tw-bg-sims-new-700 tw-font-satoshi tw-rounded-lg tw-px-8 tw-py-2 tw-mr-7">
                    Tambah Data +
                </button>
            </form>
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
                    @foreach ($kelas as $k)
                    <tr class="tw-bg-white">
                        <td class="tw-p-6">{{ $k->id }}</td>
                        <td class="tw-p-6">{{ $k->kelas }}</td>
                        <td class="tw-p-6">{{ $k->rombel }}</td>
                        <td class="tw-p-6">{{ $k->JurusanId }}</td>
                        <td class="tw-p-6">@if($k->createdAt != null){{  \Carbon\Carbon::parse(strtotime($k->createdAt))->translatedFormat('l d F Y'); }}@endif</td>
                        <td class="tw-p-6">
                            {{-- <a title="Edit Data" href="/admin/kelas/edit/{{ $k->id }}"
                                class="tw-text-kuning-500 hover:tw-bg-kuning-500 hover:tw-text-white hover:tw-shadow-md tw-transition-all tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                            </a> --}}
                            <a href="/admin/kelas/show/{{ $k->id }}" class="tw-text-gray-400  hover:tw-text-white hover:tw-bg-gray-400 hover:tw-shadow-md tw-rounded-lg tw-text-xl tw-py-2 tw-px-3 tw-w-12 tw-transition-all" title="Detail Data">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

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
            <form action="/admin/kelas" class="tw-text-center">

                <input type="number" name="page" class="tw-bg-white tw-border tw-border-slate-200 tw-w-1/2 tw-font-pop tw-font-medium tw-text-slate-500 tw-rounded-md tw-text-center focus:tw-ring-gray-200 focus:tw-border-gray-200 no-spin" min="1" @if(isset($_GET['page'])) value="{{ $_GET['page'] }}" @endif>
                
                @if(isset($_GET['perPage']))
                <input name="perPage" value="{{ $_GET['perPage'] }}" type="hidden">
                @endif

                @if(isset($_GET['search']))
                <input name="search" value="{{ $_GET['search'] }}" type="hidden">
                @endif

                @if(isset($_GET['sort_by']))
                <input name="sort_by" value="{{ $_GET['sort_by'] }}" type="hidden">
                @endif

                @if(isset($_GET['sort']))
                <input name="sort" value="{{ $_GET['sort'] }}" type="hidden">
                @endif

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
          $('#sort-by-data').on('change', function () {
              var url = $(this).val(); // get selected value
              if (url) { // require a URL
                  window.location = url; // redirect
              }
              return false;
          });
        });

        $(function(){
          // bind change event to select
          $('#sort-data').on('change', function () {
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
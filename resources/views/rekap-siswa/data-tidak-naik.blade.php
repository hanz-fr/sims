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

                        <input type="text" id="search" name="search" class="tw-py-1 tw-px-5 tw-border-none tw-rounded-md" value="{{ request()->search }}">
                        <i class="fa-solid fa-magnifying-glass tw-pr-5 tw-pl-3 tw-text-slate-600"></i>
                    </div>
                </form>
                <div class="tw-text-base pt-1 tw-text-basic-700 tw-ml-4 tw-mr-2 tw-font-normal tw-font-pop">Show</div>
                <select name="show-data-perpage" id="show-data-perpage" class="tw-bg-gray-300 tw-font-bold tw-px-7 tw-rounded-xl tw-text tw-mb-2 tw-border-none">
                    @if(!empty($_GET['page']))
                        @if(isset($_GET['search']))
                        <option value="/data-tidak-naik?page={{ $_GET['page'] }}&perPage=10&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                        <option value="/data-tidak-naik?page={{ $_GET['page'] }}&perPage=25&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                        <option value="/data-tidak-naik?page={{ $_GET['page'] }}&perPage=50&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                        <option value="/data-tidak-naik?page={{ $_GET['page'] }}&perPage=100&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                        @else
                        <option value="/data-tidak-naik?page={{ $_GET['page'] }}&perPage=10&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                        <option value="/data-tidak-naik?page={{ $_GET['page'] }}&perPage=25&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                        <option value="/data-tidak-naik?page={{ $_GET['page'] }}&perPage=50&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                        <option value="/data-tidak-naik?page={{ $_GET['page'] }}&perPage=100&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                        @endif
                    @else
                        @if(isset($_GET['search']))
                        <option value="/data-tidak-naik?perPage=10&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                        <option value="/data-tidak-naik?perPage=25&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                        <option value="/data-tidak-naik?perPage=50&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                        <option value="/data-tidak-naik?perPage=100&search={{ $_GET['search'] }}" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                        @else
                        <option value="/data-tidak-naik?perPage=10&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                        <option value="/data-tidak-naik?perPage=25&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                        <option value="/data-tidak-naik?perPage=50&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                        <option value="/data-tidak-naik?perPage=100&search=" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                        @endif
                    @endif
                </select>
                <div class="tw-text-base pt-1 tw-mx-2 tw-font-pop tw-font-normal tw-text-basic-700">Entries</div>
            
                <div class="tw-flex tw-mx-5 tw-my-auto">
                    <button data-modal-toggle="filter-popup-modal" class="hover:tw-text-sims-500 tw-text-slate-700 tw-transition-all tw-ease-in-out">
                        <i class="tw-text-xl  fa-solid fa-sliders-simple"></i>
                    </button>

                    {{-- FILTERS POPUP MODAL --}}
                    <div id="filter-popup-modal" tabindex="-1"class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                        <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
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
                                    @csrf
                                    <div class="tw-flex tw-justify-center tw-font-pop tw-text-sims-500 tw-text-xl tw-font-bold">Filters</div>
                                    <div class="tw-border-b tw-border-sims-400 tw-w-full tw-my-5"></div>

                                    {{-- search query --}}
                                    <div class="tw-font-pop tw-text-sm tw-font-bold tw-text-gray-400">Search Query</div>
                                    <div class="tw-flex tw-justify-between tw-mt-3">
                                        <div class="tw-flex tw-my-3">
                                            <div class="tw-text-xs tw-font-pop tw-text-gray-400 tw-mx-2 tw-my-auto">Nama Peserta Didik</div>
                                            <label for="default-toggle-nama-peserta-didik" class="inline-flex relative items-center cursor-pointer">
                                              <input type="checkbox" name="nama_siswa" value="true" id="default-toggle-nama-peserta-didik" class="sr-only peer">
                                              <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                            </label>
                                        </div>
                                        <div class="tw-flex tw-my-3">
                                            <div class="tw-text-xs tw-font-pop tw-text-gray-400 tw-mx-2 tw-my-auto">Tinggal di Kelas</div>
                                            <label for="default-toggle-tinggal-di-kelas" class="inline-flex relative items-center cursor-pointer">
                                              <input type="checkbox" name="tinggal_di_Kelas" value="true" id="default-toggle-tinggal-di-kelas" class="sr-only peer">
                                              <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                            </label>
                                        </div>
                                        <div class="tw-flex tw-my-3">
                                            <div class="tw-text-xs tw-font-pop tw-text-gray-400 tw-mx-2 tw-my-auto">Alasan</div>
                                            <label for="default-toggle-alasan" class="inline-flex relative items-center cursor-pointer">
                                              <input type="checkbox" name="alasan_tidak_naik" value="true" id="default-toggle-alasan" class="sr-only peer">
                                              <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="tw-flex tw-gap-3">
                                        <div class="tw-flex tw-my-3">
                                            <div class="tw-text-xs tw-font-pop tw-text-gray-400 tw-mx-2 tw-my-auto">Tempat Lahir</div>
                                            <label for="default-toggle-tempat-lahir" class="inline-flex relative items-center cursor-pointer">
                                              <input type="checkbox" name="tmp_lahir" value="true" id="default-toggle-tempat-lahir" class="sr-only peer">
                                              <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                            </label>
                                        </div>
                                        <div class="tw-flex tw-my-3">
                                            <div class="tw-text-xs tw-font-pop tw-text-gray-400 tw-mx-2 tw-my-auto">Tanggal Lahir</div>
                                            <label for="default-toggle-tanggal-lahir" class="inline-flex relative items-center cursor-pointer">
                                              <input type="checkbox" name="tgl_lahir" value="true" id="default-toggle-tanggal-lahir" class="sr-only peer">
                                              <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                            </label>
                                        </div>
                                    </div>
                                    {{-- end of search query --}}


                                    {{-- sort by --}}
                                    <div class="tw-font-pop tw-text-sm tw-font-bold tw-text-gray-400 tw-mt-6">Sort By</div>
                                    <div class="tw-flex tw-justify-between tw-my-3">
                                        <div class="tw-w-full">
                                            <select class="input-data tw-text-sm tw-mr-5" id="sort-by" name="sort-by" required>
                                                <option value="nama_siswa">Nama Peserta Didik</option>
                                                <option value="tmp_lahir">Tempat Lahir</option>
                                                <option value="tgl_lahir">Tanggal Lahir</option>
                                                <option value="tinggal_di_kelas">Tinggal di Kelas</option>
                                                <option value="alasan_tidak_naik">Alasan</option>
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
            <div class="tw-flex md:tw-justify-center tw-items-center md:-tw-mb-8">
                <a href="" title="Print"><i class="fa-solid fa-print btn-export"></i></a>
                <button id="copy_btn" type="button" value="copy"><i class="fa-solid fa-copy btn-export"></i></button>
                <a href="" title="Export ke Excel"><i class="fa-solid fa-file-excel btn-export"></i></a>
                <a href="" title="Export ke PDF"><i class="fa-solid fa-file-pdf btn-export"></i></a>
            </div>
        </div>

        @if(isset($siswa))
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
                    @foreach ($siswa as $s)
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->nama_siswa }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->tmp_lahir }}, {{ $s->tgl_lahir }}</td>
                        @foreach($s->raport as $r)
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $r->tinggal_di_Kelas }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $r->alasan_tidak_naik }}</td>
                        @endforeach
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

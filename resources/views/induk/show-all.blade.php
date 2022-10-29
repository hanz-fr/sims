@extends('layouts.main')

@section('content')

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

<div class="tw-mx-10">
    <div class="tw-flex lg:tw-flex-row sm:tw-flex-col lg:tw-justify-between lg:tw-gap-5 tw-mt-8">
        <div class="tw-flex tw-flex-col tw-font-pop">
            <h4 class="title-main">Data Induk Siswa</h4>
            @if( ! empty($jurusan) && ! empty($kelas))
            <h6 class="tw-mb-5 tw-text-gray-400 tw-font-semibold">{{ $jurusan }} - Kelas {{ $kelas }}</h6>
            @else
            <h6 class="tw-mb-5 tw-text-gray-400 tw-font-semibold">SELURUH KELAS</h6>
            @endif
        </div>

        {{-- @if(session()->has('success'))
        <div id="alert-2" class="tw-flex tw-p-4 tw-mt-4 tw-w-full tw-my-5 tw-mx-10 tw-bg-green-200 tw-rounded-lg" role="alert">
          <svg class="tw-my-auto tw-flex-shrink-0 tw-w-5 tw-h-5 tw-text-green-700" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
          <div class="tw-ml-3 tw-text-sm tw-font-medium tw-text-green-700 tw-my-auto">
            <div class="tw-font-bold tw-text-lg tw-flex">Success</div>  {{ session('success') }}
          </div>
          <button type="button" class="tw-ml-auto -tw-mx-1.5 tw-my-auto tw-bg-green-200 tw-text-green-500 tw-rounded-lg focus:tw-ring-2 focus:tw-ring-green-400 tw-p-1.5 hover:tw-bg-green-200 tw-inline-flex tw-h-8 tw-w-8 dark:tw-bg-green-300 dark:tw-text-green-600 dark:hover:tw-bg-green-400" data-dismiss-target="#alert-2" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="tw-w-5 tw-h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
        </div>
        @endif --}}

        <div class="tw-flex md:tw-justify-center tw-items-center md:-tw-mb-8">
            <a href=""><i class="fa-solid fa-print btn-export"></i></a>
            <a href=""><i class="fa-solid fa-copy btn-export"></i></a>
            <a href=""><i class="fa-solid fa-file-excel btn-export"></i></a>
            <a href=""><i class="fa-solid fa-file-pdf btn-export"></i></a>
        </div>
    </div>

        <section class="tw-flex lg:tw-flex-row sm:tw-flex-col tw-justify-between sm:tw-flex-wrap sm:tw-gap-5">
            <div class="tw-flex lg:tw-flex-row sm:tw-flex-col">

                <form action="/get-request"> 
                    <div class="relative tw-border-2 tw-rounded-lg focus:tw-ring-sims-400">
                        <input type="text" id="search-box" class="tw-py-1 tw-px-5 tw-border-none tw-rounded-md" onkeyup="sendSiswaRes(this.value)">
                        <i class="fa-solid fa-magnifying-glass tw-pr-5 tw-pl-3 tw-text-slate-600"></i>
                    </div>
                </form>
                <div class="tw-flex">
                    <div class="tw-text-base pt-1 tw-text-basic-700 tw-ml-4 tw-mr-2 tw-font-normal tw-font-pop">Show</div>
                    {{-- <div class="dropdown">
                        <button class="dropdown-toggle tw-bg-gray-300 tw-font-bold tw-py-1 tw-px-3 tw-rounded-xl tw-text" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        10
                        </button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">25</a></li>
                        <li><a class="dropdown-item" href="#">50</a></li>
                        <li><a class="dropdown-item" href="#">100</a></li>
                        </ul>
                    </div> --}}
                    <select name="" id="" class="tw-bg-gray-300 tw-font-bold tw-px-7 tw-rounded-xl tw-text tw-mb-2 tw-border-none">
                        <option value="" class="tw-bg-white">10</option>
                        <option value="" class="tw-bg-white">25</option>
                        <option value="" class="tw-bg-white">50</option>
                        <option value="" class="tw-bg-white">100</option>
                    </select>
                    <div class="tw-text-base pt-1 tw-mx-2 tw-font-pop tw-font-normal tw-text-basic-700">Entries</div>
                </div>

            </div>
            <div class="tw-flex">
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
            </div>
        </section>

        <section class="tw-overflow-x-auto tw-relative tw-shadow-md tw-rounded-xl tw-mt-5">
            <table class="tw-w-full tw-text-sm tw-text-center">
                <thead class="tw-bg-gray-100 tw-text-basic-700 tw-border tw-font-pop">
                    <tr>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NO</th>
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
                        <td class="counterCell tw-py-4 tw-px-6 tw-border"></td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->nis_siswa }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->nisn_siswa }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->nama_siswa }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->jenis_kelamin }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->KelasId }}</td>
                        <td>
                            <a href="/rekap-nilai/{{ $s->nis_siswa }}" class="tw-text-white tw-bg-sims-400 hover:tw-bg-sims-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3 tw-mr-1">
                                <i class="fa-light fa-clipboard-list"></i>
                            </a>
                            @can('tata usaha')
                            <a href="/edit-siswa/{{ $s->nis_siswa }}" class="tw-text-white tw-bg-kuning-500 hover:tw-bg-kuning-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                            </a>
                            @endcan
                            <a href="/detail/{{ $s->nis_siswa }}" class="tw-text-white tw-bg-gray-500 hover:tw-bg-gray-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        {{-- pagination --}}
        <div class="tw-float-right tw-py-5 tw-px-3">
            @if($response->to >= $total)
            <a class="tw-text-gray-300 tw-bg-[#2f5555] hover:tw-text-gray-300 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-right"></i></a>
            @else
            <a href="{{ $response->next_page_url }}" class="tw-text-white tw-bg-sims-400 hover:tw-bg-sims-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-right"></i></a>
            @endif
          </div>

          @if($response->prev_page_url)
          <div class="tw-float-right tw-py-5">
            <a href="{{ $response->prev_page_url }}" class="tw-text-white tw-bg-sims-400 hover:tw-bg-sims-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-left"></i></a>
          </div>
          @else
          <div class="tw-float-right tw-py-5">
            <a class="tw-text-gray-300 tw-bg-[#2f5555] hover:tw-text-gray-300 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-left"></i></a>
          </div>
          @endif
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
@endpush
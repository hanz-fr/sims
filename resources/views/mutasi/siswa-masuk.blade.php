@extends('layouts.main')
@section('content')
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
                        <a href="/mutasi-masuk-print" title="Print"><i class="fa-solid fa-print btn-export"></i></a>
                        <button id="copy_btn" type="button" value="copy"><i class="fa-solid fa-copy btn-export"></i></button>
                        <a href="/mutasi-masuk-excel" title="Export ke Excel"><i class="fa-solid fa-file-excel btn-export"></i></a>
                        <a href="/mutasi-masuk-pdf" title="Export ke PDF"><i class="fa-solid fa-file-pdf btn-export"></i></a>
                    </div>
                @endcan
            </div>


            <div class="tw-flex tw-justify-between lg:tw-flex-row sm:tw-flex-col sm:tw-gap-5">
                <div class="tw-flex">
                    <form action="/siswa-masuk">
                        <div class="relative tw-border-2 tw-rounded-lg focus:tw-ring-sims-400">
                            <input type="text" name="search" id="search" class="tw-py-1 tw-px-5 tw-border-none tw-rounded-md" value="{{ request()->search }}">
                            <i class="fa-solid fa-magnifying-glass tw-pr-5 tw-pl-3 tw-text-slate-600"></i>
                        </div>
                    </form>
                    <div class="tw-text-base pt-1 tw-text-basic-700 tw-ml-4 tw-mr-2 tw-font-normal tw-font-pop">Show</div>
                    <select name="" id="" class="tw-bg-gray-300 tw-font-bold tw-px-7 tw-rounded-xl tw-text tw-mb-2 tw-border-none">
                        <option value="" class="tw-bg-white">10</option>
                        <option value="" class="tw-bg-white">25</option>
                        <option value="" class="tw-bg-white">50</option>
                        <option value="" class="tw-bg-white">100</option>
                    </select>
                    <div class="tw-text-base pt-1 tw-mx-2 tw-font-pop tw-font-normal tw-text-basic-700">Entries</div>
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
        </div>
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
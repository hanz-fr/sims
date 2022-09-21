@extends('layouts.main')

@section('content')

@if($status == 'error')
<div class="tw-flex tw-justify-center">
    <div class="tw-block tw-my-32">
        <img src="{{asset('assets/img/error_img.svg')}}" alt="error_img">
        <h1 class="tw-flex tw-justify-center tw-font-pop tw-font-bold tw-mt-6 tw-text-sims">404 Not Found</h1>
        <p class="tw-flex tw-justify-center tw-font-pop tw-text-md tw-font-semibold tw-text-gray-400 tw-mt-5">{{ $message }}</p>
        <p class="tw-flex tw-justify-center tw-font-pop tw-text-gray-400 tw-text-sm">Hubungi admin untuk permasalahan lebih lanjut.</p>
    </div>
</div>
@else
<div class="tw-mx-10">
    <div class="tw-flex tw-justify-between tw-gap-5 tw-mt-8">
        <div class="tw-flex tw-flex-col">
            <h4 class="tw-font-pop tw-font-bold tw-mt-6 tw-text-sims">Data Induk Siswa</h4>
            <h6 class="tw-mb-5 tw-text-gray-400 tw-font-semibold">SELURUH KELAS</h6>
        </div>

        <div class="tw-flex tw-justify-center tw-items-center -tw-mb-8">
            <a href=""><i class="fa-solid fa-print tw-text-xl tw-px-3 tw-py-1 tw-mb-3 tw-mx-2 tw-text-white tw-bg-sims hover:tw-bg-[#3b7a7a] tw-border tw-rounded-lg"></i></a>
            <a href=""><i class="fa-solid fa-copy tw-text-xl tw-px-3 tw-py-1 tw-mb-3 tw-mx-2 tw-text-white tw-bg-sims hover:tw-bg-[#3b7a7a] tw-border tw-rounded-lg"></i></a>
            <a href=""><i class="fa-solid fa-file-excel tw-text-xl tw-px-3 tw-py-1 tw-mb-3 tw-mx-2 tw-text-white tw-bg-sims hover:tw-bg-[#3b7a7a] tw-border tw-rounded-lg"></i></a>
            <a href=""><i class="fa-solid fa-file-pdf tw-text-xl tw-px-3 tw-py-1 tw-mb-3 tw-mx-2 tw-text-white tw-bg-sims hover:tw-bg-[#3b7a7a] tw-border tw-rounded-lg"></i></a>
        </div>
    </div>

        <div class="tw-flex tw-justify-between sm:tw-flex-wrap sm:tw-gap-5">
            <div class="tw-flex">
                <form action=""> 
                    <div class="relative tw-border-2 tw-rounded-lg focus:tw-ring-sims">
                        <input type="text" class="tw-py-1 tw-px-5 tw-border-none tw-rounded-md">
                        <i class="fa-solid fa-magnifying-glass tw-pr-5 tw-pl-3 tw-text-slate-600"></i>
                    </div>
                </form>
                <div class="tw-text-base pt-1 tw-text-basic tw-ml-4 tw-mr-2 tw-font-normal tw-font-pop">Show</div>
                <div class="dropdown">
                    <button class="dropdown-toggle tw-bg-gray-300 tw-font-bold tw-py-1 tw-px-3 tw-rounded-xl tw-text" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    10
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">25</a></li>
                    <li><a class="dropdown-item" href="#">50</a></li>
                    <li><a class="dropdown-item" href="#">100</a></li>
                    </ul>
                </div>
                <div class="tw-text-base pt-1 tw-mx-2 tw-font-pop tw-font-normal tw-text-basic">Entries</div>

            </div>
            <div class="tw-flex">
                <a href="/tambah-data" class="tw-bg-[#28A745] tw-text-white hover:tw-text-white hover:tw-bg-green-700 tw-font-pop tw-rounded-lg tw-px-5 tw-py-2">
                    <i class="fa-solid fa-circle-plus tw-pr-3"></i>
                    Tambah Data
                </a>
            </div>
        </div>

        <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl tw-mt-5">
            <table class="tw-w-full tw-text-sm tw-text-center">
                <thead class="tw-text-md tw-bg-gray-100 tw-text-basic tw-border tw-font-pop">
                    <tr>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NO</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NIS</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NISN</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NAMA PESERTA DIDIK</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">GENDER</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">KELAS</th>
                        <th scope="col" class="tw-py-3 tw-px-6">ACTION</th>
                    </tr>
                </thead>
                <tbody class="tw-text-base">
                    @foreach ($siswa as $s)
                        
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">#</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->nis_siswa }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->nisn_siswa }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->nama_siswa }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->jenis_kelamin }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->KelasId }}</td>
                        <td>
                            <a href="" class="tw-text-white tw-bg-sims hover:tw-bg-[#428888] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3 tw-mr-1">
                                <i class="fa-light fa-clipboard-list"></i>
                            </a>
                            <a href="#" class="tw-text-white tw-bg-kuning hover:tw-bg-[#D3A007] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                            </a>
                            <a href="/detail/{{ $s->nis_siswa }}" class="tw-text-white tw-bg-gray-500 hover:tw-bg-gray-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="tw-float-right tw-py-5 tw-px-3">
            @if($total == $response->to)
            <a class="tw-text-gray-300 tw-bg-[#2f5555] hover:tw-text-gray-300 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-right"></i></a>
            @else
            <a href="{{ $response->next_page_url }}" class="tw-text-white tw-bg-sims hover:tw-bg-[#3F7373] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-right"></i></a>
            @endif
          </div>

          @if($response->prev_page_url)
          <div class="tw-float-right tw-py-5">
            <a href="{{ $response->prev_page_url }}" class="tw-text-white tw-bg-sims hover:tw-bg-[#3F7373] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-left"></i></a>
          </div>
          @else
          <div class="tw-float-right tw-py-5">
            <a class="tw-text-gray-300 tw-bg-[#2f5555] hover:tw-text-gray-300 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-left"></i></a>
          </div>
          @endif
    </div>
@endif
@endsection
@extends('layouts.main')

@section('content')
    <div class="container">
        <h4 class="tw-font-pop tw-font-bold tw-mt-6 tw-text-sims">Data Induk Siswa</h4>
        <h6 class="tw-mb-6 tw-text-gray-400 tw-font-semibold">X PENGEMBANGAN PERANGKAT LUNAK DAN GIM</h6>

        <div class="tw-flex tw-justify-end">
            <a href=""><i class="fa-solid fa-print tw-text-xl tw-px-3 tw-py-1 tw-mb-3 tw-mx-2 tw-text-white tw-bg-sims hover:tw-bg-[#3b7a7a] tw-border tw-rounded-lg"></i></a>
            <a href=""><i class="fa-solid fa-copy tw-text-xl tw-px-3 tw-py-1 tw-mb-3 tw-mx-2 tw-text-white tw-bg-sims hover:tw-bg-[#3b7a7a] tw-border tw-rounded-lg"></i></a>
            <a href=""><i class="fa-solid fa-file-excel tw-text-xl tw-px-3 tw-py-1 tw-mb-3 tw-mx-2 tw-text-white tw-bg-sims hover:tw-bg-[#3b7a7a] tw-border tw-rounded-lg"></i></a>
            <a href=""><i class="fa-solid fa-file-pdf tw-text-xl tw-px-3 tw-py-1 tw-mb-3 tw-mx-2 tw-text-white tw-bg-sims hover:tw-bg-[#3b7a7a] tw-border tw-rounded-lg"></i></a>
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
            <div class="tw-flex sm:tw-flex">
                <a href="" class="tw-bg-[#28A745] tw-text-white hover:tw-text-white hover:tw-bg-green-700 tw-font-pop tw-rounded-lg tw-px-5 tw-py-2">
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
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">01</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td>
                            <a href="" class="tw-text-white tw-bg-sims hover:tw-bg-[#428888] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3 tw-mr-1">
                                <i class="fa-light fa-clipboard-list"></i>
                            </a>
                            <a href="#" class="tw-text-white tw-bg-kuning hover:tw-bg-[#D3A007] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                            </a>
                            <a href="#" class="tw-text-white tw-bg-gray-500 hover:tw-bg-gray-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">01</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td>
                            <a href="" class="tw-text-white tw-bg-sims hover:tw-bg-[#428888] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3 tw-mr-1">
                                <i class="fa-light fa-clipboard-list"></i>
                            </a>
                            <a href="#" class="tw-text-white tw-bg-kuning hover:tw-bg-[#D3A007] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                            </a>
                            <a href="#" class="tw-text-white tw-bg-gray-500 hover:tw-bg-gray-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
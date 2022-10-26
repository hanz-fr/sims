@extends('layouts.main')

@section('content')
<div class="tw-mx-10">
    <div class="tw-flex tw-justify-between tw-gap-5 tw-mt-8">
        <div class="tw-flex tw-flex-col">
            <h4 class="title-main">Data Alumni</h4>
        </div>
    </div>

        <div class="tw-flex tw-justify-between sm:tw-flex-wrap sm:tw-gap-5">
            <div class="tw-flex">
                <form action=""> 
                    <div class="relative tw-border-2 tw-rounded-lg focus:tw-ring-sims-400">
                        <input type="text" class="tw-py-1 tw-px-5 tw-border-none tw-rounded-md">
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
            {{-- <div class="tw-flex">
                <a href="" class="tw-bg-[#28A745] tw-text-white hover:tw-text-white hover:tw-bg-green-700 tw-font-pop tw-rounded-lg tw-px-5 tw-py-2">
                    <i class="fa-solid fa-circle-plus tw-pr-3"></i>
                    Tambah Data
                </a>
            </div> --}}
            <div class="tw-flex tw-justify-center tw-items-center">
                <a href=""><i class="fa-solid fa-print tw-text-xl tw-px-3 tw-py-1 tw-mb-3 tw-mx-2 tw-text-white tw-bg-sims-400 hover:tw-bg-sims-600 tw-border tw-rounded-lg"></i></a>
                <a href=""><i class="fa-solid fa-copy tw-text-xl tw-px-3 tw-py-1 tw-mb-3 tw-mx-2 tw-text-white tw-bg-sims-400 hover:tw-bg-sims-600 tw-border tw-rounded-lg"></i></a>
                <a href=""><i class="fa-solid fa-file-excel tw-text-xl tw-px-3 tw-py-1 tw-mb-3 tw-mx-2 tw-text-white tw-bg-sims-400 hover:tw-bg-sims-600 tw-border tw-rounded-lg"></i></a>
                <a href=""><i class="fa-solid fa-file-pdf tw-text-xl tw-px-3 tw-py-1 tw-mb-3 tw-mx-2 tw-text-white tw-bg-sims-400 hover:tw-bg-sims-600 tw-border tw-rounded-lg"></i></a>
            </div>
        </div>

        <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl tw-mt-5">
            <table class="tw-w-full tw-text-sm tw-text-center">
                <thead class="tw-text-md tw-bg-gray-100 tw-text-basic-700 tw-border tw-font-pop">
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
                    @foreach ($alumni as $a)
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $a->nis_siswa }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $a->nisn_siswa }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $a->nama_siswa }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $a->jenis_kelamin }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $a->KelasId }}</td>
                        <td>
                            <a href="/edit-siswa/{{ $a->nis_siswa }}" class="tw-text-white tw-bg-kuning-500 hover:tw-bg-kuning-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                            </a>
                            <a href="/detail/{{ $a->nis_siswa }}" class="tw-text-white tw-bg-gray-500 hover:tw-bg-gray-600 hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
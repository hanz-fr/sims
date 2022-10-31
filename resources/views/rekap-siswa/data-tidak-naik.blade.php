@extends('layouts.main')

@section('content')
<div class="tw-mx-10">
    <div class="tw-flex tw-mt-8">
        <h4 class="title-main">Data Siswa Tidak Naik Kelas</h4>
    </div>
        <div class="tw-flex tw-justify-between tw-mt-3 sm:tw-flex-wrap sm:tw-gap-5">
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
            <div class="tw-flex md:tw-justify-center tw-items-center md:-tw-mb-8">
                <a href=""><i class="fa-solid fa-print btn-export"></i></a>
                <a href=""><i class="fa-solid fa-copy btn-export"></i></a>
                <a href=""><i class="fa-solid fa-file-excel btn-export"></i></a>
                <a href=""><i class="fa-solid fa-file-pdf btn-export"></i></a>
            </div>
        </div>

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
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $s->tmp_lahir, $s->tgl_lahir }}</td>
                        @foreach($s->raport as $r)
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $r->tinggal_di_Kelas }}</td>
                        <td class="tw-py-4 tw-px-6 tw-border">{{ $r->alasan_tidak_naik }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@extends('layouts.main')
@section('content')

<div class="tw-mx-10">
    <div class="tw-flex tw-justify-between tw-gap-5 tw-mt-8">
        <div class="tw-flex tw-flex-col">
            <h4 class="tw-font-pop tw-font-bold tw-mt-6 tw-text-sims">Data Siswa Keluar</h4>
        </div>
        <div class="tw-flex tw-justify-center tw-items-center -tw-mb-8">
            <a href=""><i class="fa-solid fa-print btn-export"></i></a>
            <a href=""><i class="fa-solid fa-copy btn-export"></i></a>
            <a href=""><i class="fa-solid fa-file-excel btn-export">test</i></a>
            <a href=""><i class="fa-solid fa-file-pdf btn-export"></i></a>
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
        </div>

        <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl tw-mt-5">
            <table class="tw-w-full tw-text-sm tw-text-center">
                <thead class="tw-text-md tw-bg-gray-100 tw-text-basic tw-border tw-font-pop">
                    <tr>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NO</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NAMA PESERTA DIDIK</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">NOMOR INDUK</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">KELUAR DI KELAS</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">TANGGAL KELUAR</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">SK MUTASI</th>
                        <th scope="col" class="tw-py-3 tw-px-6">ALASAN</th>
                    </tr>
                </thead>
                <tbody class="tw-text-base">
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">01</td>
                        <td class="tw-py-4 tw-px-6 tw-border">Abdul Sukma Dika</td>
                        <td class="tw-py-4 tw-px-6 tw-border">200677555</td>
                        <td class="tw-py-4 tw-px-6 tw-border">XI TJKT</td>
                        <td class="tw-py-4 tw-px-6 tw-border">22-11-2022</td>
                        <td class="tw-py-4 tw-px-6 tw-border">421.5/229/Smk11/CadisdikwilVII/2022</td>
                        <td class="tw-py-4 tw-px-6 tw-border">Paket C</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">02</td>
                        <td class="tw-py-4 tw-px-6 tw-border">Xue Huao Piao Piao</td>
                        <td class="tw-py-4 tw-px-6 tw-border">200715824</td>
                        <td class="tw-py-4 tw-px-6 tw-border">XII MLOG 1</td>
                        <td class="tw-py-4 tw-px-6 tw-border">11-11-2011</td>
                        <td class="tw-py-4 tw-px-6 tw-border">421.5/229/Smk11/CadisdikwilVII/2022</td>
                        <td class="tw-py-4 tw-px-6 tw-border">Pindah Sekolah</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
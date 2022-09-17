@extends('layouts.main')
@section('content')

<div class="container">
    <div class="tw-flex tw-justify-between tw-gap-5 tw-mt-8">
        <div class="tw-flex tw-flex-col">
            <h4 class="tw-font-pop tw-font-bold tw-mt-6 tw-text-sims">Data Siswa Keluar</h4>
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
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">GENDER</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">TANGGAL MASUK</th>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">DITERIMA DI KELAS</th>
                        <th scope="col" class="tw-py-3 tw-px-6">PINDAH DARI/ALASAN</th>
                    </tr>
                </thead>
                <tbody class="tw-text-base">
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">01</td>
                        <td class="tw-py-4 tw-px-6 tw-border">Abdullof Hitrullah</td>
                        <td class="tw-py-4 tw-px-6 tw-border">2006423639</td>
                        <td class="tw-py-4 tw-px-6 tw-border">L</td>
                        <td class="tw-py-4 tw-px-6 tw-border">6-10-1939</td>
                        <td class="tw-py-4 tw-px-6 tw-border">XII RPL 1</td>
                        <td class="tw-py-4 tw-px-6 tw-border">SMKN Darul Berlin, Dikeluarkan oleh guru kesenian</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">02</td>
                        <td class="tw-py-4 tw-px-6 tw-border">Asep Zeus Kusnadi</td>
                        <td class="tw-py-4 tw-px-6 tw-border">200715824</td>
                        <td class="tw-py-4 tw-px-6 tw-border">L</td>
                        <td class="tw-py-4 tw-px-6 tw-border">9-9-2019</td>
                        <td class="tw-py-4 tw-px-6 tw-border">X PPLG 1</td>
                        <td class="tw-py-4 tw-px-6 tw-border">SMKN Athena Jaya, Ingin pindah sekolah</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
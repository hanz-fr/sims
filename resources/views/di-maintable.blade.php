@extends('layouts.main')

@section('content')

<div class="container">
    <h4 class="tw-font-pop tw-font-bold tw-mt-6 tw-text-sims">DATA INDUK SISWA</h4>
    <h6 class="tw-mb-6 tw-text-slate-400">X PENGEMBANGAN PERANGKAT LUNAK DAN GIM</h6>
    <div class="tw-flex tw-justify-between">
        <div class="tw-flex">
            <form action=""> 
                <div class="relative tw-border-2 tw-rounded-lg">
                 <input type="text" class="tw-py-1 tw-px-5 tw-border-none tw-rounded-md">
                 <i class="fa-solid fa-magnifying-glass tw-pr-5 tw-pl-3 tw-text-slate-600"></i>
                </div>
            </form>
            <div class="dropdown tw-ml-5">
                <button class="dropdown-toggle tw-bg-gray-300 tw-py-1 tw-px-3 tw-rounded-xl tw-text" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  10
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">25</a></li>
                  <li><a class="dropdown-item" href="#">50</a></li>
                  <li><a class="dropdown-item" href="#">100</a></li>
                </ul>
            </div>     
        </div>
        <div class="">
            <a href=""><i class="fa-solid fa-print tw-text-xl tw-px-3 tw-py-1 tw-mb-3 tw-mx-2 tw-text-white tw-bg-sims hover:tw-bg-[#3b7a7a] tw-border tw-rounded-lg"></i></a>
            <a href=""><i class="fa-solid fa-copy tw-text-xl tw-px-3 tw-py-1 tw-mb-3 tw-mx-2 tw-text-white tw-bg-sims hover:tw-bg-[#3b7a7a] tw-border tw-rounded-lg"></i></a>
            <a href=""><i class="fa-solid fa-file-excel tw-text-xl tw-px-3 tw-py-1 tw-mb-3 tw-mx-2 tw-text-white tw-bg-sims hover:tw-bg-[#3b7a7a] tw-border tw-rounded-lg"></i></a>
            <a href=""><i class="fa-solid fa-file-pdf tw-text-xl tw-px-3 tw-py-1 tw-mb-3 tw-mx-2 tw-text-white tw-bg-sims hover:tw-bg-[#3b7a7a] tw-border tw-rounded-lg"></i></a>
        </div>
    </div>
    
    <table id="example" class="tw-w-full tw-whitespace-nowrap">
        <thead>
            <tr>
                <th class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center tw-rounded-tl-lg">NO</th>
                <th class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">NIS</th>
                <th class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">NISN</th>
                <th class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">NAMA PESERTA DIDIK</th>
                <th class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">GENDER</th>
                <th class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">KELAS</th>
                <th class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">01</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">238113011</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">2381130118811</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">AGUS LOREM IPSUM</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">L</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">10 PPLG 1</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">
                    <button class="tw-border tw-rounded-lg text-white tw-py-2 tw-px-5 tw-bg-sims hover:tw-bg-[#3b7a7a]">
                        <i class="fa-solid fa-file-pen"></i>
                    </button>
                    <button class="tw-border tw-rounded-lg text-white tw-py-2 tw-px-4 tw-bg-[#949494] hover:tw-bg-[#717171]">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">02</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">200654845</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">0178577600562</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">MUBASHIR ALHAMDULILLAH</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">L</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">12 RPL 2</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">
                    <button class="tw-border tw-rounded-lg text-white tw-py-2 tw-px-5 tw-bg-sims hover:tw-bg-[#3b7a7a]">
                        <i class="fa-solid fa-file-pen"></i>
                    </button>
                    <button class="tw-border tw-rounded-lg text-white tw-py-2 tw-px-4 tw-bg-[#949494] hover:tw-bg-[#717171]">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">03</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">2001593482</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">0178577600777</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">SUKMA DIKA</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">L</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">11 PPLG 2</td>
                <td class="tw-border tw-border-slate-300 px-3 py-2 tw-text-center">
                    <button class="tw-border tw-rounded-lg text-white tw-py-2 tw-px-5 tw-bg-sims hover:tw-bg-[#3b7a7a]">
                        <i class="fa-solid fa-file-pen"></i>
                    </button>
                    <button class="tw-border tw-rounded-lg text-white tw-py-2 tw-px-4 tw-bg-[#949494] hover:tw-bg-[#717171]">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
@extends('layouts.main')

@section('content')
<div class="container">
    <h4 class="tw-font-pop tw-font-bold tw-mx-6 tw-mt-6 tw-text-sims">Data Alumni</h4>
    <h6 class="tw-font-pop tw-mx-6 tw-text-slate-400">PENGEMBANGAN PERANGKAT LUNAK DAN GIM</h6>

    <div class="tw-flex tw-mb-2 tw-justify-end container">
    <a href="">
        <i class="fa-solid fa-print tw-bg-sims tw-text-white tw-text-lg tw-p-2 tw-rounded-lg tw-mx-2"></i>
    </a>
    <a href="">
        <i class="fa-regular fa-copy tw-bg-sims tw-text-white tw-text-lg tw-p-2 tw-rounded-lg"></i>
    </a>
    <a href="">
        <i class="fa-solid fa-file-excel tw-bg-sims tw-text-white tw-text-lg tw-p-2 tw-rounded-lg tw-mx-2"></i>
    </a>
    <a href="">
        <i class="fa-solid fa-file-pdf tw-bg-sims tw-text-white tw-text-lg tw-p-2 tw-rounded-lg"></i>
    </a>
    </div>

            <div class="container tw-flex tw-justify-between">
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
    <div class="container">
    <table id="example" class="table table-striped tw-border-2 tw-border-slate-300">
        <thead>
            <tr>
                <th class="tw-border-2 tw-border-slate-300">NO</th>
                <th class="tw-border-2 tw-border-slate-300">NIS</th>
                <th class="tw-border-2 tw-border-slate-300">NISN</th>
                <th class="tw-border-2 tw-border-slate-300">NAMA PESERTA DIDIK</th>
                <th class="tw-border-2 tw-border-slate-300">GENDER</th>
                <th class="tw-border-2 tw-border-slate-300">KELAS</th>
                <th class="tw-border-2 tw-border-slate-300">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tw-border-2 tw-border-slate-300">01</td>
                <td class="tw-border-2 tw-border-slate-300">238114022</td>
                <td class="tw-border-2 tw-border-slate-300">2381130119955</td>
                <td class="tw-border-2 tw-border-slate-300">AGUNG SAKENIGEDIK</td>
                <td class="tw-border-2 tw-border-slate-300">L</td>
                <td class="tw-border-2 tw-border-slate-300">TKJ</td>
                <td class="tw-border-2 tw-border-slate-300">
                    <button class="btn text-white" style="background-color: #4D9E9E;">
                        <i class="fa-solid fa-clipboard-list"></i>
                    </button>
                    <a href="#" class="tw-text-white tw-bg-kuning hover:tw-bg-[#D3A007] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                        <i class="fa-solid fa-pen-to-square"></i></a>
                    </a>
                    <button class="btn text-white" style="background-color: #949494;">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </td>
            </tr>

            <tr>
                <td class="tw-border-2 tw-border-slate-300">02</td>
                <td class="tw-border-2 tw-border-slate-300">200758845</td>
                <td class="tw-border-2 tw-border-slate-300">0178956600562</td>
                <td class="tw-border-2 tw-border-slate-300">ASEP HACHIMAN KITAGAWA</td>
                <td class="tw-border-2 tw-border-slate-300">L</td>
                <td class="tw-border-2 tw-border-slate-300">MM 2</td>
                <td class="tw-border-2 tw-border-slate-300">
                    <button class="btn text-white" style="background-color: #4D9E9E;">
                        <i class="fa-solid fa-clipboard-list"></i>
                    </button>
                    <button class="btn text-white" style="background-color: #FFC107;">
                        <i class="fa-solid fa-pen-to-square"></i></a>
                    </button>
                    <button class="btn text-white" style="background-color: #949494;">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </td>
            </tr>

            <tr>
                <td class="tw-border-2 tw-border-slate-300">03</td>
                <td class="tw-border-2 tw-border-slate-300">2001511111</td>
                <td class="tw-border-2 tw-border-slate-300">0166558605007</td>
                <td class="tw-border-2 tw-border-slate-300">AOI YUKI CIBADUYUT</td>
                <td class="tw-border-2 tw-border-slate-300">P</td>
                <td class="tw-border-2 tw-border-slate-300">MLOG 2</td>
                <td class="tw-border-2 tw-border-slate-300">
                    <button class="btn text-white" style="background-color: #4D9E9E;">
                        <i class="fa-solid fa-clipboard-list"></i>
                    </button>
                    <a href="#" class="tw-text-white tw-bg-kuning hover:tw-bg-[#D3A007] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3">
                        <i class="fa-solid fa-pen-to-square"></i></a>
                    </a>
                    <button class="btn text-white" style="background-color: #949494;">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
</div>

@endsection
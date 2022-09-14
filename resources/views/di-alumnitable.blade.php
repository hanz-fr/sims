@extends('layouts.main')

@section('content')
<meta name="_token" content="{{ csrf_token() }}">
<h4 class="tw-font-pop tw-font-bold tw-mx-6 tw-mt-6">Data Alumni</h4>
<h6 class="tw-font-pop tw-font-bold tw-mx-6 tw-text-slate-500">PENGEMBANGAN PERANGKAT LUNAK DAN GIM</h6>

<div class="container tw-flex tw-justify-end">
<a href="">
    <i class="fa-solid fa-print tw-bg-sims tw-text-white tw-text-xl tw-p-2 tw-rounded-lg tw-mx-2"></i>
</a>
<a href="">
    <i class="fa-regular fa-copy tw-bg-sims tw-text-white tw-text-xl tw-p-2 tw-rounded-lg"></i>
</a>
<a href="">
    <i class="fa-solid fa-file-excel tw-bg-sims tw-text-white tw-text-xl tw-p-2 tw-rounded-lg tw-mx-2"></i>
</a>
<a href="">
    <i class="fa-solid fa-file-pdf tw-bg-sims tw-text-white tw-text-xl tw-p-2 tw-rounded-lg"></i>
</a>
</div>

<div class="container tw-flex tw-justify-end tw-my-4">
    <button class="btn text-white tw-font-pop" style="background-color: #28A745;">
        <i class="fa-solid fa-circle-plus"></i>
        Tambah Data
    </button>
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
                    <i class="fa-solid fa-file-pen"></i>
                </button>
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
                    <i class="fa-solid fa-file-pen"></i>
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
                    <i class="fa-solid fa-file-pen"></i>
                </button>
                <button class="btn text-white" style="background-color: #949494;">
                    <i class="fa-solid fa-eye"></i>
                </button>
            </td>
        </tr>

    </tbody>
</table>
</div>

@endsection
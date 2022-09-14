@extends('layouts.main')

@section('content')
<div class="tw-container tw-ml-10">
    <h2 class="tw-text-sims tw-mt-10">Angkatan Kelas</h2>
    <div class="tw-flex tw-gap-5 tw-mt-8">
        <a href="">
            <div class="tw-bg-[#1096C2] hover:tw-bg-[#0c7192] tw-text-white tw-p-5 tw-rounded-xl">
                <div class="tw-flex">
                    <i class="fa-regular fa-graduation-cap tw-text-7xl"></i>
                    <span class="fw-bolder tw-text-lg tw-pl-3 tw-py-5">KELAS X (Angkatan 2025)</span>
                </div>
            </div>
        </a>
        <a href="">
            <div class="tw-bg-[#EF5C76] hover:tw-bg-[#c14a60] tw-text-white tw-p-5 tw-rounded-xl">
                <div class="tw-flex">
                    <i class="fa-regular fa-graduation-cap tw-text-7xl"></i>
                    <span class="fw-bolder tw-text-lg tw-pl-3 tw-py-5">KELAS XI (Angkatan 2024)</span>
                </div>
            </div>
        </a>
        <a href="">
            <div class="tw-bg-[#527DB9] hover:tw-bg-[#44689b] tw-text-white tw-p-5 tw-rounded-xl">
                <div class="tw-flex">
                    <i class="fa-regular fa-graduation-cap tw-text-7xl"></i>
                    <span class="fw-bolder tw-text-lg tw-pl-3 tw-py-5">KELAS XII (Angkatan 2023)</span>
                </div>
            </div>
        </a>
       
    </div>
</div>
@endsection
@extends('layouts.main-new')

@section('content')
<div class="tw-mx-10">
    <div class="tw-flex tw-flex-col tw-my-10">
        <h1 class="sims-heading-3xl">Angkatan Kelas</h1>
        <div class="tw-font-bold sims-text-gray-lg">{{ $jurusan }}</div>
    </div>
    <div class="tw-grid lg:tw-grid-cols-3 md:tw-grid-cols-2 tw-gap-5 tw-mt-8 sm:tw-grid-cols-1 tw-font-satoshi  ">
        
        <a href="/data-induk-siswa/{{ $jurusan }}/10?angkatan={{ \Carbon\Carbon::now()->year + 2 }}&page=1&perPage=10&search=">
            <div class="tw-bg-[#1096C2] hover:tw-bg-[#0c7192] tw-text-white tw-p-5 tw-rounded-xl tw-transition-all tw-delay-[100] hover:-tw-translate-y-1 hover:tw-shadow-lg tw-ease-in">
                <div class="tw-flex">
                    <i class="fa-regular fa-graduation-cap tw-text-7xl"></i>
                    <span class="fw-bolder tw-text-lg tw-pl-3 tw-py-5">KELAS X (Angkatan {{ \Carbon\Carbon::now()->year + 2 }})</span>
                </div>
            </a>
            <a
                href="/data-induk-siswa/{{ $jurusan }}/11?angkatan={{ \Carbon\Carbon::now()->year + 1 }}&page=1&perPage=10&search=">
                <div
                    class="tw-bg-[#EF5C76] hover:tw-bg-[#c14a60] tw-text-white tw-p-5 tw-rounded-xl tw-transition-all tw-delay-[100] hover:-tw-translate-y-1 hover:tw-shadow-lg tw-ease-in">
                    <div class="tw-flex">
                        <i class="fa-regular fa-graduation-cap tw-text-7xl"></i>
                        <span class="fw-bolder tw-text-lg tw-pl-3 tw-py-5">KELAS XI (Angkatan
                            {{ \Carbon\Carbon::now()->year + 1 }})</span>
                    </div>
                </div>
            </a>
            <a
                href="/data-induk-siswa/{{ $jurusan }}/12?angkatan={{ \Carbon\Carbon::now()->year }}&page=1&perPage=10&search=">
                <div
                    class="tw-bg-[#527DB9] hover:tw-bg-[#44689b] tw-text-white tw-p-5 tw-rounded-xl tw-transition-all tw-delay-[100] hover:-tw-translate-y-1 hover:tw-shadow-lg tw-ease-in">
                    <div class="tw-flex">
                        <i class="fa-regular fa-graduation-cap tw-text-7xl"></i>
                        <span class="fw-bolder tw-text-lg tw-pl-3 tw-py-5">KELAS XII (Angkatan
                            {{ \Carbon\Carbon::now()->year }})</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection

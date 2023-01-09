@extends('layouts.main')

@section('content')
    <div class="tw-mx-10">
        <div class="tw-grid lg:tw-grid-cols-3 md:tw-grid-cols-2 tw-gap-5 tw-mt-8 sm:tw-grid-cols-1">
            <a href="/data-alumni/PPLG/1/0/2023?page=1&perPage=10&search=">
                <div class="tw-bg-[#1096C2] hover:tw-bg-[#0c7192] tw-text-white tw-p-5 tw-rounded-xl tw-transition-all tw-delay-[100] hover:-tw-translate-y-1 hover:tw-shadow-lg tw-ease-in">
                    <div class="tw-flex">
                        <i class="fa-regular fa-graduation-cap tw-text-7xl"></i>
                        <span class="fw-bolder tw-text-lg tw-pl-3 tw-py-5">KELAS X (Angkatan {{ \Carbon\Carbon::now()->year; }})</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection 
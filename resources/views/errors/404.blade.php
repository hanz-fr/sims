@extends('layouts.plainpage')


@section('content')
    <div class="tw-flex tw-justify-center">

        <div class="tw-flex tw-flex-col">
            <img class="tw-mt-28 tw-mb-10" src="{{ URL::asset('assets/img/404notfound.png') }}" alt="ga ketemu dek">
            <div class="tw-flex tw-justify-between">
                <div class="tw-border-l-8 tw-border-sims-400">
                    <div class="tw-font-pop tw-text-sims-400 tw-my-5 tw-text-5xl tw-font-bold tw-mx-10">SIMS</div>
                    <div class="tw-font-pop tw-text-gray-300 tw-my-5 tw-text-7xl tw-mx-10 tw-font-bold">404 NOT FOUND</div>
                    <div class="tw-font-pop tw-text-gray-300 tw-my-5 tw-text-2xl tw-mx-10 tw-font-normal">Halaman yang kamu cari tidak dapat ditemukan</div>
                </div>
                <div class="tw-flex lg:tw-flex-row sm:tw-flex-col tw-justify-between tw-my-auto tw-gap-3 tw-p-2">
                    <a href="/jurusan" class="tw-group">
                        <div class="tw-justify-center tw-flex lg:tw-flex-col sm:tw-flex-row tw-text-center tw-border-2 tw-px-16 tw-py-6 tw-items-center tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims-400 tw-transition-all tw-duration-300">
                            <div class="tw-text-4xl tw-text-sims-400 group-hover:tw-text-white"><i class="fa-solid fa-shapes"></i></div>
                            <div class="tw-text-gray-500 tw-text-sm tw-text-center tw-font-normal group-hover:tw-text-white tw-mt-4">Jurusan</div>
                        </div>
                    </a>
                    <a href="/rekap-jumlah-siswa" class="tw-group">
                        <div
                            class="tw-justify-center tw-flex lg:tw-flex-col sm:tw-flex-row tw-text-center tw-border-2 tw-p-6 tw-items-center tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims-400 tw-transition-all tw-duration-300">
                            <div class="tw-text-4xl tw-text-sims-400 group-hover:tw-text-white"><i
                                    class="fa-solid fa-graduation-cap"></i></div>
                            <div
                                class="tw-text-gray-500 tw-text-sm tw-font-normal lg:tw-mt-4 sm:tw-ml-4 group-hover:tw-text-white">
                                Data Jumlah Siswa</div>
                        </div>
                    </a>
                    <a href="/data-induk-siswa?perPage=10" class="tw-group">
                        <div
                            class="tw-justify-center tw-flex lg:tw-flex-col sm:tw-flex-row  tw-text-center tw-border-2 tw-p-6 tw-items-center tw-bg-white tw-rounded-lg group-hover:tw-bg-sims-400 group-hover:tw-text-white tw-transition-all tw-duration-300">
                            <div class="tw-text-4xl tw-text-sims-400 group-hover:tw-text-white"><i
                                    class="fa-regular fa-book-open"></i></div>
                            <div
                                class="tw-text-gray-500 tw-text-sm tw-font-normal lg:tw-mt-4 sm:tw-ml-4 group-hover:tw-text-white">
                                Data Induk Siswa</div>
                        </div>
                    </a>
                    <a href="/siswa-keluar" class="tw-group">
                        <div
                            class="tw-justify-center tw-flex lg:tw-flex-col sm:tw-flex-row  tw-text-center tw-border-2 tw-p-6 tw-items-center tw-bg-white tw-rounded-lg group-hover:tw-bg-sims-400 group-hover:tw-text-white  tw-transition-all tw-duration-300">
                            <div class="tw-text-4xl tw-text-sims-400 group-hover:tw-text-white"><i
                                    class="fa-solid fa-user-group"></i></div>
                            <div
                                class="tw-text-gray-500 tw-text-sm tw-font-normal lg:tw-mt-4 sm:tw-ml-4 group-hover:tw-text-white">
                                Data Perpindahan</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

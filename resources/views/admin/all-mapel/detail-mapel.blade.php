@extends('layouts.main-new')

@section('content')

<div class="tw-flex tw-flex-col tw-my-10 tw-mx-10">
    <div class="tw-my-10 tw-mx">
        <h4 class="sims-heading-3xl">Detail Mata Pelajaran</h4>
    </div>

    <!-- divider -->
    <div class="tw-flex tw-border-b-2 tw-border-indigo-100"></div>

    <div class="tw-flex tw-flex-col tw-gap-10 tw-my-10">
        <div class="tw-flex tw-flex-col">
            <div class="sims-text-gray-sm">Nama Mata Pelajaran</div>
            <div class="sims-heading-xl-black">{{ $mapel->nama }}</div>
        </div>


        <div class="tw-flex tw-justify-between">
            <div class="tw-flex tw-flex-col">
                <div class="sims-text-gray-sm">Id Mata Pelajaran</div>
                <div class="sims-heading-xl-black">{{ $mapel->id }}</div>
            </div>

            <div class="tw-flex tw-flex-col tw-text-end tw-my-auto">
                <div class="sims-text-gray-sm"><b>Dibuat : </b>@if(! empty($mapel->createdAt)){{ \Carbon\Carbon::parse(strtotime($mapel->createdAt))->translatedFormat('l d F Y'); }}@endif</div>
                <div class="sims-text-gray-sm"><b>Diupdate : </b>@if(! empty($mapel->updatedAt)){{ \Carbon\Carbon::parse(strtotime($mapel->updatedAt))->translatedFormat('l d F Y'); }}@endif</div>
            </div>
        </div>

        <div class="tw-flex tw-justify-end tw-gap-5">

            <button data-modal-toggle="popup-modal" type="submit" class="tw-px-8 tw-py-2 tw-bg-[#F87171] tw-text-white tw-font-normal sims-heading-sm tw-rounded-lg tw-shadow-sm hover:tw-shadow-lg hover:tw-bg-[#d45656] tw-transition-all tw-truncate">Hapus Data</button>

            <div id="popup-modal" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <div class="tw-relative tw-bg-white tw-rounded-lg tw-shadow dark:tw-bg-slate-100">
                        <button type="button"
                            class="tw-absolute tw-top-3 tw-right-2.5 tw-text-gray-400 tw-bg-transparent hover:tw-bg-gray-200 hover:tw-text-gray-900 tw-rounded-lg tw-text-sm tw-p-1.5 tw-ml-auto tw-inline-flex tw-items-center"
                            data-modal-toggle="popup-modal">
                            <svg aria-hidden="true" class="tw-w-5 tw-h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="tw-p-6">
                            <svg aria-hidden="true"
                                class="tw-mx-auto tw-mb-4 tw-w-14 tw-h-14 tw-text-gray-400 dark:tw-text-gray-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div class="tw-mb-5 tw-flex tw-justify-center tw-text-md tw-font-normal tw-text-gray-500 dark:tw-text-gray-400"> Hapus data Mata Pelajaran?</div>
                            <div class="tw-flex tw-justify-center">
                                <form action="/admin/mata-pelajaran/delete/{{ $mapel->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" data-modal-toggle="popup-modal" type="button" class="tw-text-white tw-bg-red-600 hover:tw-bg-red-800 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-red-300 dark:focus:tw-ring-red-800 tw-font-medium tw-rounded-lg tw-text-sm tw-inline-flex tw-items-center tw-py-2.5 tw-text-center tw-mr-2 tw-px-6"> Ya </button>
                                </form>
                                <button data-modal-toggle="popup-modal" type="button" class="tw-text-gray-500 tw-bg-white hover:tw-bg-gray-100 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-gray-200 tw-rounded-lg tw-border tw-border-gray-200 tw-text-sm tw-font-medium tw-py-2.5 hover:tw-text-gray-900 focus:tw-z-10 dark:tw-bg-gray-700 dark:tw-text-gray-300 dark:tw-border-gray-500 dark:hover:tw-text-white dark:hover:tw-bg-gray-600 dark:focus:tw-ring-gray-600 tw-px-4">Tidak</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="/admin/mata-pelajaran/edit/{{ $mapel->id }}" method="GET">
                <input type="hidden" name="fromDetailPage" value="true">
                <button type="submit" class="tw-px-8 tw-py-2 tw-bg-[#FBBF24] tw-text-white tw-font-normal sims-heading-sm tw-rounded-lg tw-shadow-sm hover:tw-shadow-lg hover:tw-bg-[#daa728] tw-transition-all tw-truncate">Edit Data</button>
            </form>
        </div>

        </div>
    </div>
</div>

@endsection
@extends('layouts.main-new')


@section('content')

<div class="tw-flex tw-flex-col tw-my-10">

    <div class="sims-heading-2xl tw-flex tw-justify-center">Create Jurusan</div>

    <!-- spacing -->
    <div class="tw-my-20"></div>
    
    <div class="tw-flex tw-justify-center">

        <form action="/admin/jurusan/store" method="POST" class="tw-flex tw-flex-col tw-gap-8 tw-w-1/4">
            @csrf
            @method('POST')
            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="sims-text-gray-sm">Nama Jurusan</div>
                <input required name="nama" class="tw-border-[1.5px] tw-transition-all tw-duration-500 tw-ease-out tw-font-satoshi tw-font-normal tw-text-gray-500 tw-border-gray-300 tw-py-1 tw-px-5 tw-rounded-xl focus:tw-outline-sims-new-500">
            </div>
            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="sims-text-gray-sm">Konsentrasi Jurusan</div>
                <input required name="konsentrasi" class="tw-border-[1.5px] tw-transition-all tw-duration-500 tw-ease-out tw-font-satoshi tw-font-normal tw-text-gray-500 tw-border-gray-300 tw-py-1 tw-px-5 tw-rounded-xl focus:tw-outline-sims-new-500">
            </div>
            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="sims-text-gray-sm">Deskripsi</div>
                <textarea required name="deskripsi" class="tw-border tw-block tw-w-full tw-transition-all tw-duration-500 tw-ease-out tw-rounded-xl tw-font-satoshi tw-font-normal tw-text-gray-500 tw-py-3 tw-px-5 tw-border-gray-300 focus:tw-outline-none focus:tw-border-transparent focus:tw-ring-2 focus:tw-ring-sims-new-500 placeholder:tw-invisible"></textarea>
            </div>
            @if($message = Session::get('error'))
                <div class="sims-text-gray-xs tw-text-red-500">{{ $message }}</div>
            @endif
            <div class="tw-flex tw-justify-end">
                <button type="submit" class="tw-bg-sims-new-500 tw-transition-all tw-w-fit tw-text-white hover:tw-text-white hover:tw-bg-sims-new-700 tw-font-satoshi tw-rounded-lg tw-px-8 tw-py-2">
                    Create
                </button>
            </div>
        </form>

    </div>

    
</div>

@endsection
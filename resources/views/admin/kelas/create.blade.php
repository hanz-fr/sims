@extends('layouts.main-new')


@section('content')

<div class="tw-flex tw-flex-col tw-my-10">

    <div class="sims-heading-2xl tw-flex tw-justify-center">Tambah Data Kelas</div>

    <!-- spacing -->
    <div class="tw-my-20"></div>
    
    <div class="tw-flex tw-justify-center">

        <form action="/admin/kelas/store" method="POST" class="tw-flex tw-flex-col tw-gap-8 tw-w-1/4">
            @csrf

            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="sims-text-gray-sm">Kelas</div>
                <select name="kelas" class="tw-border-[1.5px] tw-transition-all tw-duration-500 tw-ease-out tw-font-satoshi tw-font-normal tw-text-gray-500 tw-border-gray-300 tw-py-1 tw-px-5 tw-rounded-xl focus:tw-outline-sims-new-500">
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                </select>
            </div>
            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="sims-text-gray-sm">Rombel</div>
                <input type="number" name="rombel" class="tw-border-[1.5px] tw-transition-all tw-duration-500 tw-ease-out tw-font-satoshi tw-font-normal tw-text-gray-500 tw-border-gray-300 tw-py-1 tw-px-5 tw-rounded-xl focus:tw-outline-sims-new-500">
            </div>
            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="sims-text-gray-sm">Jurusan</div>
                <input type="text" name="jurusan" class="tw-border-[1.5px] tw-transition-all tw-duration-500 tw-ease-out tw-font-satoshi tw-font-normal tw-text-gray-500 tw-border-gray-300 tw-py-1 tw-px-5 tw-rounded-xl focus:tw-outline-sims-new-500"></input>
            </div>
            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="sims-text-gray-sm">Jurusan</div>
                <select name="JurusanId" class="tw-border-[1.5px] tw-transition-all tw-duration-500 tw-ease-out tw-font-satoshi tw-font-normal tw-text-gray-500 tw-border-gray-300 tw-py-1 tw-px-5 tw-rounded-xl focus:tw-outline-sims-new-500">
                    @foreach ($jurusan as $j)
                        <option value="{{ $j->id }}">{{ $j->id }}</option>
                    @endforeach
                </select>
            </div>
            @if($message = Session::get('error'))
                <div class="sims-text-gray-xs tw-text-red-500">{{ $message }}</div>
            @endif
            <div class="tw-flex tw-justify-end">
                <button type="submit" class="tw-bg-sims-new-500 tw-transition-all tw-w-fit tw-text-white hover:tw-text-white hover:tw-bg-sims-new-700 tw-font-satoshi tw-rounded-lg tw-px-8 tw-py-2">
                    Simpan
                </button>
            </div>
        </form>

    </div>

</div>

@endsection
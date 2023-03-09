@extends('layouts.main-new')


@section('content')

<div class="tw-flex tw-flex-col tw-my-10">

    <div class="sims-heading-2xl tw-flex tw-justify-center">Update Kelas</div>

    <!-- spacing -->
    <div class="tw-my-20"></div>
    
    <div class="tw-flex tw-justify-center">

        <form action="/admin/kelas/update/{{ $kelas->id }}" method="POST" class="tw-flex tw-flex-col tw-gap-8 tw-w-1/4">
            @csrf
            @method('PUT')

            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="sims-text-gray-sm">Kelas</div>
                <select disabled name="kelas" class="tw-border-[1.5px] tw-transition-all tw-duration-500 tw-ease-out tw-font-satoshi tw-font-normal tw-bg-slate-100 tw-text-gray-500 tw-border-gray-300 tw-py-1 tw-px-5 tw-rounded-xl focus:tw-outline-sims-new-500">
                    @if ($kelas->kelas)
                        <option value="{{ $kelas->kelas }}">{{ $kelas->kelas }}</option>
                    @endif
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                </select>
                <input type="hidden" name="kelas" value="{{ $kelas->kelas }}">
            </div>
            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="sims-text-gray-sm">Rombel</div>
                <input disabled type="number" name="rombel" class="tw-border-[1.5px] tw-transition-all tw-duration-500 tw-ease-out tw-font-satoshi tw-font-normal tw-bg-slate-100 tw-text-gray-500 tw-border-gray-300 tw-py-1 tw-px-5 tw-rounded-xl focus:tw-outline-sims-new-500" value="{{ $kelas->rombel }}">
                <input type="hidden" name="rombel" value="{{ $kelas->rombel }}">
            </div>
            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="sims-text-gray-sm">Jurusan</div>
                <input disabled type="text" name="jurusan" class="tw-border-[1.5px] tw-transition-all tw-duration-500 tw-ease-out tw-font-satoshi tw-font-normal tw-bg-slate-100 tw-text-gray-500 tw-border-gray-300 tw-py-1 tw-px-5 tw-rounded-xl focus:tw-outline-sims-new-500" value="{{ $kelas->jurusan }}"></input>
                <input type="hidden" name="jurusan" value="{{ $kelas->jurusan }}">
            </div>
            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="sims-text-gray-sm">JurusanId</div>
                <select disabled name="JurusanId" class="tw-border-[1.5px] tw-transition-all tw-duration-500 tw-ease-out tw-font-satoshi tw-font-normal tw-bg-slate-100 tw-text-gray-500 tw-border-gray-300 tw-py-1 tw-px-5 tw-rounded-xl focus:tw-outline-sims-new-500">
                    @if ($kelas->JurusanId)
                        <option value="{{ $kelas->JurusanId }}">{{ $kelas->JurusanId }}</option>
                    @endif
                    @foreach ($jurusan as $j)
                        <option value="{{ $j->id }}">{{ $j->id }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="JurusanId" value="{{ $kelas->JurusanId }}">
            </div>
            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="sims-text-gray-sm">Wali Kelas</div>
                <select name="walikelas" class="tw-border-[1.5px] tw-transition-all tw-duration-500 tw-ease-out tw-font-satoshi tw-font-normal tw-text-gray-500 tw-border-gray-300 tw-py-1 tw-px-5 tw-rounded-xl focus:tw-outline-sims-new-500">
                    @if($kelas->walikelas == null)
                        <option selected value=""> - </option>
                    @else
                        <option selected value="{{ $walikelas->nip }}"> {{ $walikelas->nama }} (selected) </option>
                        <option value=""> - </option>
                    @endif

                    @foreach ($all_walikelas as $wk)
                        <option value="{{ $wk->nip }}">{{ $wk->nama }}</option>
                    @endforeach
                </select>
            </div>
            @if($message = Session::get('error'))
                <div class="sims-text-gray-xs tw-text-red-500">{{ $message }}</div>
            @endif
            <div class="tw-flex tw-justify-end">
                <button type="submit" class="tw-bg-sims-new-500 tw-transition-all tw-w-fit tw-text-white hover:tw-text-white hover:tw-bg-sims-new-700 tw-font-satoshi tw-transition-all tw-rounded-lg tw-px-8 tw-py-2">
                    Update
                </button>
            </div>
        </form>

    </div>

    
</div>

@endsection
@extends('layouts.admin')

@section('content')

<div class="tw-mx-10 tw-w-screen">
    <div class="tw-flex tw-mt-8">
        <a href="/all-kelas"><i class="fa-solid fa-chevron-left tw-text-2xl tw-text-gray-400 hover:tw-text-gray-600"></i></a>
        <i class="fa-solid fa-shapes tw-text-sims-300 tw-text-2xl tw-ml-3"></i>
        <div class="tw-text-2xl tw-ml-3 tw-font-pop tw-font-semibold tw-text-gray-300">Tambah Kelas</div>
    </div>

    <div class="tw-overflow-hidden tw-shadow-md tw-mt-14 tw-rounded-xl card-data-white tw-flex tw-flex-col tw-justify-center tw-items-center">
        <div class="tw-py-8 tw-flex">
            <div class="tw-bg-slate-700 tw-rounded-2xl tw-p-4">
                <a class="fa-solid fa-images tw-text-8xl tw-mt-1 tw-text-white" href="#"></a>
            </div>
        </div>

        <div class="">
            <input type="text" class="tw-border input-account tw-rounded-xl tw-px-10 tw-py-3" placeholder="Kelas...">
        </div>
        <!-- <div class="tw-mt-5">
            <input type="text" class="tw-border input-account tw-rounded-xl tw-px-10 tw-py-3" placeholder="Jurusan...">
        </div> -->
        <div class="tw-mt-5">
            <select name="" id="" class="input-account tw-px-28">
                <option value="">PPLG</option>
                <option value="">TJKT</option>
                <option value="">DKV</option>
                <option value="">AKL</option>
                <option value="">MLOG</option>
                <option value="">PM</option>
                <option value="">MPLB</option>
            </select>
        </div>
        <div class="tw-mt-5 tw-mb-10">
            <input type="text" class="tw-border input-account tw-rounded-xl tw-px-10 tw-py-3" placeholder="Rombel...">
        </div>
    </div>

    <div class="tw-flex tw-justify-end tw-mt-5">
        <div class="tw-flex tw-gap-5 tw-font-ubuntu tw-text-white tw-font-medium tw-mb-5">
          <a href="" class="tw-bg-green-400 hover:tw-bg-green-600 tw-py-4 tw-px-16 tw-rounded-lg">Add Class</a>
        </div>
    </div>
</div>

@endsection
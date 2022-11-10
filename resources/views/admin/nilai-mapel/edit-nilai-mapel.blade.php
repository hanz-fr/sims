@extends('layouts.admin')

@section('content')
    <div class="tw-mx-10 tw-w-screen">
        <div class="tw-flex tw-mt-8">
            <a href="/database">
                <i class="fa-solid fa-chevron-left tw-text-2xl tw-text-gray-300 hover:tw-text-gray-600"></i>
            </a>
            <div class="tw-text-2xl tw-ml-3 tw-font-pop tw-font-semibold tw-text-gray-300">Tambah Nilai
            </div>
        </div>

        <div class="tw-flex tw-justify-center tw-mb-8 tw-mt-14 shadow-cs tw-rounded-xl tw-mx-auto tw-overflow-hidden">
            <div class="tw-font-ubuntu tw-flex tw-justify-center tw-bg-white tw-py-8 tw-w-full tw-px-24 tw-mx-auto">
                <form action="" method="" class="tw-grid tw-grid-cols-2 tw-gap-y-5 tw-gap-x-8">
                    @csrf
                    @method('PUT')
                    <div class="tw-justify-center">
                        <label for="1" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">1</label>
                        <input type="number" value="77" id="1" class=" tw-border tw-w-[450px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                    </div>
                    <div class="tw-justify-center">
                        <label for="2" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">2</label>
                        <input type="number" value="75" id="2" class=" tw-border tw-w-[450px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                    </div>
                    <div class="tw-justify-center">
                        <label for="3" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">3</label>
                        <input type="number" value="75" id="3" class=" tw-border tw-w-[450px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                    </div>
                    <div class="tw-justify-center">
                        <label for="4" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">4</label>
                        <input type="number" value="75" id="4" class=" tw-border tw-w-[450px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                    </div>
                    <div class="tw-justify-center">
                        <label for="5" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">5</label>
                        <input type="number" value="75" id="5" class=" tw-border tw-w-[450px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                    </div>
                    <div class="tw-justify-center">
                        <label for="6" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">6</label>
                        <input type="number" value="75" id="6" class=" tw-border tw-w-[450px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

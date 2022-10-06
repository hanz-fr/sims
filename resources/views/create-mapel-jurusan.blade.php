@extends('layouts.admin')

@section('content')
    <div class="tw-mx-10 tw-w-screen">
        <div class="tw-flex tw-mt-8">
            <div class="tw-text-2xl tw-font-pop tw-font-semibold tw-text-gray-300">Tambah Mata Pelajaran Jurusan</div>
        </div>
        <div
            class="tw-flex tw-justify-center tw-flex-col tw-bg-white shadow-cs tw-py-8 tw-px-40 tw-rounded-xl tw-w-full tw-mx-auto tw-mb-8 tw-mt-10">
            <form action="">
                <div class="tw-font-ubuntu tw-flex-col tw-justify-center">
                    <label for="id" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">ID Mapel</label>
                    <input type="text" id="id" name="id"
                        class="tw-flex tw-border tw-w-full tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                </div>
                <div class="tw-font-ubuntu tw-flex-col tw-mt-8 tw-justify-center">
                    <label for="nama" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Nama
                        Mapel</label>
                    <input type="text" id="nama" name="Nama"
                        class="tw-flex tw-border tw-w-full tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                </div>
                <div class="tw-font-ubuntu tw-flex tw-mt-12 tw-justify-center">
                    <button type="submit" class="tw-text-white tw-bg-admin-300 hover:tw-bg-admin-600 tw-px-8 tw-py-3 tw-rounded-lg">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

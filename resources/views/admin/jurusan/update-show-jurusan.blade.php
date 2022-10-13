@extends('layouts.admin')

@section('content')

<div class="tw-mx-10 tw-w-screen">
    <div class="tw-flex tw-mt-8">
        <a href="/show-jurusan"><i class="fa-solid fa-chevron-left tw-text-2xl tw-text-gray-400 hover:tw-text-gray-600"></i></a>
        <i class="fa-solid fa-shapes tw-text-sims-300 tw-text-2xl tw-ml-3"></i>
        <div class="tw-text-2xl tw-ml-3 tw-font-pop tw-font-semibold tw-text-gray-300">Create Jurusan</div>
    </div>

    <div class="tw-overflow-hidden tw-shadow-md tw-mt-14 tw-rounded-xl">
        <div class="tw-flex">
            <div class="tw-bg-[#5a6c7c] tw-px-24 tw-flex tw-justify-center tw-items-center">
                <div class="tw-bg-white tw-p-10 tw-rounded-xl">
                    <img src="https://www.smkn11bdg.sch.id/src/images/11.png" alt="" class="tw-w-44 tw-rounded-xl">
                </div>
            </div>
            <div class="tw-mx-auto">
                    <form action="">
                        <div class="tw-font-ubuntu tw-flex-col tw-justify-center">
                            <label for="id" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Nama Jurusan</label>
                            <input type="text" id="id" name="id" class="tw-flex tw-border tw-w-full tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-60 focus:tw-outline-admin-300">
                        </div>
                        <div class="tw-font-ubuntu tw-flex-col tw-mt-8 tw-justify-center">
                            <label for="konsentrasi" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Konsentrasi</label>
                            <input type="text" id="nama" name="Nama" class="tw-flex tw-border tw-w-full tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                        </div>
                        <div class="tw-font-ubuntu tw-flex-col tw-mt-8 tw-justify-center">
                            <label for="deskripsi" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Deskripsi</label>
                            <textarea class="tw-flex tw-border tw-w-full tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300"></textarea>
                        </div>
                        <div class="tw-font-ubuntu tw-flex tw-my-12 tw-justify-center">
                            <button type="submit" class="tw-text-white tw-bg-admin-300 hover:tw-bg-admin-600 tw-px-60 tw-py-3 tw-rounded-lg">
                                Save Changes
                            </button>
                        </div>
                    </form>   
            </div>
        </div>
    </div>
</div>

@endsection
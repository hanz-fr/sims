@extends('layouts.admin')

@section('content')
    <div class="tw-mx-10 tw-w-screen">
        <div class="tw-flex tw-mt-8">
<<<<<<< HEAD
            <a href="/mata-pelajaran-jurusan">
                <i class="fa-solid fa-chevron-left tw-text-2xl tw-text-gray-300 hover:tw-text-gray-600"></i>
            </a>
            <div class="tw-text-2xl tw-ml-3 tw-font-pop tw-font-semibold tw-text-gray-300">Tambah Mata Pelajaran Jurusan</div>
        </div>
        <div class="tw-flex tw-justify-between tw-mb-8 tw-mt-10 shadow-cs tw-rounded-xl tw-mx-auto tw-overflow-hidden">
            <div class="tw-bg-[#5a6c7c] tw-p-16 tw-flex tw-w-1/2 tw-justify-center tw-items-center">
                <img src="{{ url('https://www.smkn11bdg.sch.id/src/images/11.png') }}" alt=""
                    class="tw-w-44 tw-border-8 tw-rounded-xl tw-border-sims-500">
            </div>
            <div class="tw-flex tw-justify-center tw-flex-col tw-bg-white tw-py-8 tw-w-full tw-px-32 tw-mx-auto">
                <form action="">
                    <div class="tw-font-ubuntu tw-justify-center">
                        <label for="id" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">ID
                            Mapel</label>
                        <select id="id"
                            class=" tw-border tw-w-full tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                            <option selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>

                        </select>
                    </div>
                    <div class="tw-font-ubuntu tw-flex-col tw-mt-8 tw-justify-center">
                        <label for="nama" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Nama
                            Mapel</label>
                        <input type="text" id="nama" name="Nama"
                            class="tw-border tw-w-full tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                    </div>

                    <div class="tw-font-ubuntu tw-flex-col tw-mt-8 tw-justify-center">
                        <label for="jurusan" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">
                            Jurusan
                        </label>
                        <select id="jurusan"
                            class=" tw-border tw-w-full tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                            <option selected>Pilih jurusan</option>
                            <option value="RPL">Rekayasa Perangkat Lunak</option>
                            <option value="TKJ">Teknik Komputer dan Jaringan</option>
                            <option value="MLOG">Manajemen Logistik</option>
                            <option value="AKL">Akuntansi dan Keuangan Lembaga</option>
                        </select>
                    </div>
                    <div class="tw-font-ubuntu tw-flex tw-mt-12 tw-justify-center">
                        <button type="submit"
                            class="tw-text-white tw-bg-admin-300 hover:tw-bg-admin-600 tw-px-8 tw-py-3 tw-rounded-lg">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
=======
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
>>>>>>> df57609c4c4948bf131254b99ca91b64399ab502
        </div>
    </div>
@endsection

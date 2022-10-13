@extends('layouts.admin')

@section('content')
    <div class="tw-mx-10 tw-w-screen">
        <div class="tw-flex tw-mt-8">
            <a href="/detail-mata-pelajaran-jurusan">
                <i class="fa-solid fa-chevron-left tw-text-2xl tw-text-gray-300 hover:tw-text-gray-600"></i>
            </a>
            <div class="tw-text-2xl tw-ml-3 tw-font-pop tw-font-semibold tw-text-gray-300">Sunting Mata Pelajaran Jurusan
            </div>
        </div>
        <div class="tw-flex tw-justify-between tw-mb-8 tw-mt-14 shadow-cs tw-rounded-xl tw-mx-auto tw-overflow-hidden">
            <div class="tw-bg-[#5a6c7c] tw-py-6 tw-px-24 tw-flex tw-w-1/2 tw-justify-center tw-items-center">
                <div class="tw-bg-white tw-p-10 tw-rounded-lg">
                    <img src="{{ url('https://www.smkn11bdg.sch.id/src/images/11.png') }}" alt="" class="tw-w-44">
                </div>
            </div>
            <div class="tw-flex tw-justify-center tw-bg-white tw-py-8 tw-w-full tw-px-24 tw-mx-auto">
                <form action="">
                    @method('PUT')
                    <div class="tw-font-ubuntu tw-justify-center">
                        <label for="id" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">ID
                            Mapel</label>
                        <select id="id"
                            class="tw-border tw-w-[500px] tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                            <option selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>

                        </select>
                    </div>
                    <div class="tw-font-ubuntu tw-mt-8 tw-justify-center">
                        <label for="nama" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Nama
                            Mapel</label>
                        <input type="text" id="nama" name="Nama"
                            class="tw-border tw-w-[500px] tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                    </div>

                    <div class="tw-font-ubuntu tw-mt-8 tw-justify-center">
                        <label for="jurusan" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">
                            Jurusan
                        </label>
                        <select id="jurusan"
                            class="tw-border tw-w-[500px] tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
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
        </div>
    </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="tw-mx-10 tw-w-screen">
        <div class="tw-flex tw-mt-8">
            <a href="/admin/detail-rapor">
                <i class="fa-solid fa-chevron-left tw-text-2xl tw-text-gray-300 hover:tw-text-gray-600"></i>
            </a>
            <div class="tw-text-2xl tw-ml-3 tw-font-pop tw-font-semibold tw-text-gray-300">Sunting Rapor
            </div>
        </div>

        <div class="tw-flex tw-justify-center tw-mb-8 tw-mt-14 shadow-cs tw-rounded-xl tw-mx-auto tw-overflow-hidden">
            <div class="tw-flex tw-justify-center tw-bg-white tw-py-8 tw-w-full tw-px-24 tw-mx-auto">
                <form action="post">
                    @method('PUT')
                    <div class="tw-font-ubuntu tw-justify-center">
                        <label for="nis_siswa" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">NIS
                            Siswa</label>
                        <input type="text" id="nis_siswa" name="nis_siswa"
                            class="tw-border tw-w-[600px] tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                    </div>
                    <div class="tw-font-ubuntu tw-mt-8 tw-justify-center">
                        <label for="semester"
                            class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Semester</label>
                        <select id="semester" name="semester"
                            class="tw-border tw-w-[600px] tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>

                    <div class="tw-font-ubuntu tw-mt-8 tw-justify-center">
                        <label for="thn_ajaran" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">
                            Tahun Ajaran
                        </label>
                        <input type="text" id="thn_ajaran" name="thn_ajaran"
                            class="tw-border tw-w-[600px] tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                    </div>
                    <div class="tw-font-ubuntu tw-mt-8 tw-justify-center">
                        <label for="sakit" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">
                            Sakit
                        </label>
                        <input type="number" id="sakit" name="sakit"
                            class="tw-border tw-w-[600px] tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                    </div>
                    <div class="tw-font-ubuntu tw-mt-8 tw-justify-center">
                        <label for="ijin" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">
                            Izin
                        </label>
                        <input type="number" id="ijin" name="ijin"
                            class="tw-border tw-w-[600px] tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                    </div>
                    <div class="tw-font-ubuntu tw-mt-8 tw-justify-center">
                        <label for="alpa" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">
                            Alpa
                        </label>
                        <input type="number" id="alpa" name="alpa"
                            class="tw-border tw-w-[600px] tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                    </div>
                    <div class="tw-font-ubuntu tw-mt-8 tw-justify-center">
                        <label for="isnaik" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">
                            Apakah murid naik kelas?
                        </label>
                        <input type="radio" id="isnaik1" name="isnaik" value="1"
                            class="tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                        <p class="tw-ml-1 tw-inline-flex tw-text-lg">Ya</p>
                        <input type="radio" id="isnaik2" name="isnaik" value="0"
                            class="tw-border-admin-300 tw-ml-5 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                        <p class="tw-ml-1 tw-inline-flex tw-text-lg">Tidak</p>
                    </div>
                    <div class="tw-font-ubuntu tw-mt-8 tw-justify-center">
                        <label for="naikKelas" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">
                            Naik ke kelas (jika naik)
                        </label>
                        <input type="text" id="naikKelas" name="naikKelas"
                            class="tw-border tw-w-[600px] tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                    </div>
                    <div class="tw-font-ubuntu tw-mt-8 tw-justify-center">
                        <label for="tgl_kenaikan" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">
                            Tanggal Kenaikan (jika naik)
                        </label>
                        <input type="date" id="tgl_kenaikan" name="tgl_kenaikan"
                            class="tw-border tw-w-[600px] tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
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
@endsection

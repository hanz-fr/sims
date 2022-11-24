@extends('layouts.admin')

@section('content')
    <div class="tw-mx-10 tw-w-screen">
        <div class="tw-flex tw-mt-8">
            <a href="/admin/database">
                <i class="fa-solid fa-chevron-left tw-text-2xl tw-text-gray-300 hover:tw-text-gray-600"></i>
            </a>
            <div class="tw-text-2xl tw-ml-3 tw-font-pop tw-font-semibold tw-text-gray-300">Sunting Nilai
            </div>
        </div>

        <div class="tw-flex tw-justify-center tw-mb-8 tw-mt-14 shadow-cs tw-rounded-xl tw-mx-auto tw-overflow-hidden">
            <div class="tw-font-ubuntu tw-flex tw-justify-center tw-bg-white tw-py-8 tw-w-full tw-px-24 tw-mx-auto">
                <form action="" method="">
                    @csrf
                    @method('PUT')
                    <div class="tw-mb-16">
                        <label for="semester" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Semester</label>
                        <select name="semester" id=""
                        class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">HAI
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    </div>
                    <div class="tw-grid tw-grid-cols-2 tw-gap-x-10 tw-gap-y-12">
                        <div class="tw-grid tw-grid-cols-1 tw-gap-y-2 tw-justify-center">
                            <div class="tw-justify-center">
                                <label for="mapel1" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Mata
                                    Pelajaran</label>
                                <select name="mapel1" id=""
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">HAI
                                    <option value="MTK" selected>Matematika</option>
                                    <option value="IND">B. Indo</option>
                                    <option value="JPG">B. Jepang</option>
                                    <option value="PBO">PBO</option>
                                    <option value="PWPB">PWPB</option>
                                </select>
                            </div>
                            <div class="tw-justify-center">
                                <label for="1"
                                    class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Nilai Pengetahuan</label>
                                <input type="number" value="69" id="1"
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                            </div>
                            <div class="tw-justify-center">
                                <label for="2"
                                    class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Nilai Keterampilan</label>
                                <input type="number" value="420" id="2"
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                            </div>
                        </div>
                        <div class="tw-grid tw-grid-cols-1 tw-gap-y-2 tw-justify-center">
                            <div class="tw-justify-center">
                                <label for="mapel1" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Mata
                                    Pelajaran</label>
                                <select name="mapel1" id=""
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">HAI
                                    <option value="MTK" selected>Matematika</option>
                                    <option value="IND">B. Indo</option>
                                    <option value="JPG">B. Jepang</option>
                                    <option value="PBO">PBO</option>
                                    <option value="PWPB">PWPB</option>
                                </select>
                            </div>
                            <div class="tw-justify-center">
                                <label for="1"
                                    class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Nilai Pengetahuan</label>
                                <input type="number" value="69" id="1"
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                            </div>
                            <div class="tw-justify-center">
                                <label for="2"
                                    class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Nilai Keterampilan</label>
                                <input type="number" value="420" id="2"
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                            </div>
                        </div>
                        <div class="tw-grid tw-grid-cols-1 tw-gap-y-2 tw-justify-center">
                            <div class="tw-justify-center">
                                <label for="mapel1" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Mata
                                    Pelajaran</label>
                                <select name="mapel1" id=""
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">HAI
                                    <option value="MTK" selected>Matematika</option>
                                    <option value="IND">B. Indo</option>
                                    <option value="JPG">B. Jepang</option>
                                    <option value="PBO">PBO</option>
                                    <option value="PWPB">PWPB</option>
                                </select>
                            </div>
                            <div class="tw-justify-center">
                                <label for="1"
                                    class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Nilai Pengetahuan</label>
                                <input type="number" value="69" id="1"
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                            </div>
                            <div class="tw-justify-center">
                                <label for="2"
                                    class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Nilai Keterampilan</label>
                                <input type="number" value="420" id="2"
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                            </div>
                        </div>
                        <div class="tw-grid tw-grid-cols-1 tw-gap-y-2 tw-justify-center">
                            <div class="tw-justify-center">
                                <label for="mapel1" class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Mata
                                    Pelajaran</label>
                                <select name="mapel1" id=""
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">HAI
                                    <option value="MTK" selected>Matematika</option>
                                    <option value="IND">B. Indo</option>
                                    <option value="JPG">B. Jepang</option>
                                    <option value="PBO">PBO</option>
                                    <option value="PWPB">PWPB</option>
                                </select>
                            </div>
                            <div class="tw-justify-center">
                                <label for="1"
                                    class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Nilai Pengetahuan</label>
                                <input type="number" value="69" id="1"
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                            </div>
                            <div class="tw-justify-center">
                                <label for="2"
                                    class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Nilai Keterampilan</label>
                                <input type="number" value="420" id="2"
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                            </div>
                        </div>
                        <div class="tw-grid tw-grid-cols-1 tw-gap-y-2 tw-justify-center">
                            <div class="tw-justify-center">
                                <label for="mapel1"
                                    class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Mata
                                    Pelajaran</label>
                                <select name="mapel1" id=""
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">HAI
                                    <option value="MTK" selected>Matematika</option>
                                    <option value="IND">B. Indo</option>
                                    <option value="JPG">B. Jepang</option>
                                    <option value="PBO">PBO</option>
                                    <option value="PWPB">PWPB</option>
                                </select>
                            </div>
                            <div class="tw-justify-center">
                                <label for="1"
                                    class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Nilai Pengetahuan</label>
                                <input type="number" value="69" id="1"
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                            </div>
                            <div class="tw-justify-center">
                                <label for="2"
                                    class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Nilai Keterampilan</label>
                                <input type="number" value="420" id="2"
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                            </div>
                        </div>
                        <div class="tw-grid tw-grid-cols-1 tw-gap-y-2 tw-justify-center">
                            <div class="tw-justify-center">
                                <label for="mapel1"
                                    class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Mata
                                    Pelajaran</label>
                                <select name="mapel1" id=""
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">HAI
                                    <option value="MTK" selected>Matematika</option>
                                    <option value="IND">B. Indo</option>
                                    <option value="JPG">B. Jepang</option>
                                    <option value="PBO">PBO</option>
                                    <option value="PWPB">PWPB</option>
                                </select>
                            </div>
                            <div class="tw-justify-center">
                                <label for="1"
                                    class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Nilai Pengetahuan</label>
                                <input type="number" value="69" id="1"
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                            </div>
                            <div class="tw-justify-center">
                                <label for="2"
                                    class="tw-font-bold tw-text-lg tw-flex tw-mb-2 tw-text-admin-300">Nilai Keterampilan</label>
                                <input type="number" value="420" id="2"
                                    class=" tw-border tw-w-[500px] tw-flex tw-border-admin-300 tw-rounded-2xl tw-py-3 tw-px-4 focus:tw-outline-admin-300">
                            </div>
                        </div>
                    </div>
                    <div class="tw-flex tw-justify-center tw-mt-8">
                        <button type="submit"
                            class="tw-text-white tw-bg-admin-300 hover:tw-bg-admin-600 tw-px-8 tw-py-3 tw-rounded-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

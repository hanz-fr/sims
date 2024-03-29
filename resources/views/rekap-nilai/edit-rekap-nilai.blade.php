@extends('layouts.main-new')

@section('content')
    <div class="tw-m-10 tw-flex">
        <div class="tw-flex tw-flex-col tw-w-full">
            <div class="tw-flex">
                <a href="/rekap-nilai/{{ $siswa->nis_siswa }}"><i
                        class="fa-solid fa-chevron-left tw-text-2xl tw-text-gray-400 hover:tw-text-gray-600"></i></a>
                <i class="fa-solid fa-users tw-text-2xl tw-ml-2 tw-text-sims-new-500"></i>
                <h4 class="tw-font-satoshi tw-font-bold tw-ml-2 tw-text-gray-500">Edit Rekap Nilai Siswa</h4>
            </div>

            <form action="/api/raport/update-nilai" method="POST">
                @csrf
                @method('PUT')
                <div class="tw-flex tw-justify-center">
                    <div class="card-data-bright tw-flex tw-justify-center tw-w-11/12 tw-mx-5 tw-mt-10 tw-py-12">
                        <div class="tw-flex-col tw-flex tw-px-7 tw-py-7 tw-mb-5 tw-mt-5 tw-mx-10">
                            <span class="tw-font-satoshi tw-mx-3 tw-text-gray-400 tw-font-bold">NIS</span>
                            <input type="text" placeholder="NIS..." class="tw-block tw-text-gray-400 tw-w-full tw-font-satoshi tw-border tw-border-[#E3E3E3] tw-mt-2 tw-rounded-2xl tw-py-3 tw-px-8 focus:tw-shadow-sm focus:tw-shadow-admin-300 focus:tw-border-admin-300 focus:tw-outline-none tw-bg-slate-100" name="nis_siswa" value="{{ $siswa->nis_siswa }}" maxlength="10" disabled>
                            <input type="hidden" name="nis_siswa" value="{{ $siswa->nis_siswa }}">

                            <span class="tw-font-satoshi tw-mt-5 tw-text-gray-400 tw-font-bold">Semester</span>
                            <select disabled name="semester" id="" class="tw-bg-slate-100 tw-font-sg input-account tw-px-10">
                                <option selected value="{{ $raport->semester }}">{{ $raport->semester }}</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                            <input type="hidden" name="semester" value="{{ $raport->semester }}">

                            <span class="tw-font-satoshi tw-mx-3 tw-mt-5 tw-text-gray-400 tw-font-bold">Tahun Ajaran</span>
                            <input type="text" placeholder="..." class="tw-font-sg input-account" name="thn_ajaran"
                                value="{{ $raport->thn_ajaran }}">
                        </div>

                        <div class="tw-flex-col tw-flex tw-px-7 tw-py-7 tw-mb-5 tw-mt-5 tw-mx-10">
                            <span class="tw-font-satoshi tw-mx-3 tw-text-gray-400 tw-font-bold">Sakit</span>
                            <input type="number" placeholder="..." class="tw-font-sg input-account" name="sakit"
                                value="{{ $raport->sakit }}">

                            <span class="tw-font-satoshi tw-mx-3 tw-mt-5 tw-text-gray-400 tw-font-bold">Izin</span>
                            <input type="number" placeholder="..." class="tw-font-sg input-account" name="ijin"
                                value="{{ $raport->ijin }}">

                            <span class="tw-font-satoshi tw-mx-3 tw-mt-5 tw-text-gray-400 tw-font-bold">Alpha</span>
                            <input type="number" placeholder="..." class="tw-font-sg input-account" name="alpa"
                                value="{{ $raport->alpa }}">
                        </div>

                        <div class="tw-flex-col tw-flex tw-gap-5 tw-px-7 tw-py-7 tw-mb-5 tw-mt-5 tw-mx-10">
                            <div>
                                <label for="isNaik"
                                    class="tw-font-satoshi tw-mx-3 tw-font-lg tw-font-bold tw-text-gray-400">Apakah siswa
                                    naik?</label>
                                <select type="text" id="isNaik" name="isNaik" placeholder="Naik atau Tidak Naik..."
                                    class="tw-font-sg input-account">
                                    @if ($raport->isNaik === true)
                                        <option value="true">Naik</option>
                                    @elseif($raport->isNaik === false)
                                        <option value="false">Tidak Naik</option>
                                    @elseif($raport->isNaik === null)
                                        <option value="null">-</option>
                                    @endif
                                    <option value="null">-</option>
                                    <option value="true">Naik</option>
                                    <option value="false">Tidak Naik</option>
                                </select>
                            </div>

                            <div>
                                <span class="tw-font-satoshi tw-mx-3 tw-font-lg tw-font-bold tw-mt-5 tw-text-gray-400">Naik
                                    ke Kelas</span>
                                <select class="tw-font-sg input-account" name="naikKelas" id="naikKelas">
                                    <option value="">-</option>

                                    @isset($raport->naikKelas)
                                        <option selected value="{{ $raport->naikKelas }}">{{ $raport->naikKelas }}</option>
                                    @endisset

                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->id }}">{{ $k->id }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <span
                                    class="tw-font-satoshi tw-mx-3 tw-font-lg tw-font-bold tw-mt-5 tw-text-gray-400">Tanggal
                                    Kenaikan</span>
                                <input type="date" class="tw-font-sg input-account" name="tgl_kenaikan"
                                    value="{{ $raport->tgl_kenaikan }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tw-flex tw-justify-center">
                    <div class="card-data-bright tw-flex tw-flex-col tw-w-11/12 tw-my-5">

                        <div class="tw-flex tw-justify-center tw-gap-10 tw-mx-5 tw-px-20 tw-my-5 tw-py-10">

                            <div>
                                <span
                                    class="tw-font-satoshi tw-mx-3 tw-font-lg tw-font-bold tw-mt-5 tw-text-gray-400">Tinggal
                                    di Kelas</span>
                                <select class="tw-font-sg input-account" name="tinggal_di_kelas" id="tinggal_di_kelas">

                                    <option value="">-</option>

                                    @isset($raport->tinggal_di_Kelas)
                                        <option selected value="{{ $raport->tinggal_di_Kelas }}">
                                            {{ $raport->tinggal_di_Kelas }}</option>
                                    @endisset

                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->id }}">{{ $k->id }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <span
                                    class="tw-font-satoshi tw-mx-3 tw-font-lg tw-font-bold tw-mt-5 tw-text-gray-400">Alasan
                                    tidak naik</span>
                                <input type="text" class="tw-font-sg input-account" name="alasan_tidak_naik"
                                    value="{{ $raport->alasan_tidak_naik }}">
                            </div>

                        </div>

                        <div
                            class="tw-flex tw-justify-start tw-font-satoshi tw-text-xs tw-text-gray-400 tw-font-base tw-mx-10 tw-my-3">
                            *Hanya diisi jika siswa tidak naik kelas
                        </div>
                    </div>
                </div>

                <div class="tw-text-center tw-font-satoshi tw-font-bold tw-text-sims-new-500 tw-text-2xl tw-mt-32 tw-mx-6">
                    Nilai Mapel
                </div>

                @foreach ($nilaiMapel as $nm)
                    <div class="tw-flex tw-justify-center">
                        <div
                            class="card-data-bright tw-flex tw-justify-between tw-gap-10 tw-w-4/6 tw-mx-5 tw-my-10 tw-py-20 tw-px-10">

                            <div class="tw-px-5 tw-rounded-lg tw-bg-gray-100 tw-w-2/6">
                                <div class="tw-mt-5">
                                    <span class="tw-font-satoshi tw-mt-5 tw-text-slate-400 tw-font-bold">Mata
                                        Pelajaran</span>
                                    <select name="idMapelJurusan[]" id="idMapelJurusan"
                                        class="tw-font-sg input-account tw-px-10">
                                        <option value="{{ $nm->idMapelJurusan }}">{{ $nm->MapelJurusan->MapelId }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            {{-- COLUMN 1 --}}
                            <div class="tw-flex tw-gap-10">
                                <div class="tw-flex tw-flex-col tw-gap-8">
                                    <div>
                                        <span class="tw-font-satoshi tw-mx-3 tw-font-medium tw-text-slate-400">Nilai
                                            Pengetahuan</span>
                                        <input type="number" min="0" max="100" name="nilai_pengetahuan[]"
                                            id="nilai_pengetahuan" placeholder=""
                                            class="tw-block tw-text-gray-400 tw-w-full tw-font-satoshi tw-border tw-border-[#E3E3E3] tw-mt-2 tw-rounded-md tw-py-3 tw-px-8 tw-bg-white focus:tw-shadow-sm focus:tw-shadow-admin-300 focus:tw-border-admin-300 focus:tw-outline-none tw-text-xs"
                                            value="{{ $nm->nilai_pengetahuan }}">
                                    </div>

                                    <div>
                                        <span class="tw-font-satoshi tw-mx-3 tw-font-medium tw-text-slate-400">Nilai
                                            Keterampilan</span>
                                        <input type="number" min="0" max="100" name="nilai_keterampilan[]"
                                            id="nilai_keterampilan" placeholder=""
                                            class="tw-block tw-text-gray-400 tw-w-full tw-font-satoshi tw-border tw-border-[#E3E3E3] tw-mt-2 tw-rounded-md tw-py-3 tw-px-8 tw-bg-white focus:tw-shadow-sm focus:tw-shadow-admin-300 focus:tw-border-admin-300 focus:tw-outline-none tw-text-xs"
                                            value="{{ $nm->nilai_keterampilan }}">
                                    </div>

                                    {{-- <div>
                        <span class="tw-font-satoshi tw-mx-3 tw-font-medium tw-text-slate-400">KKM</span>
                        <input type="number" min="0" max="100" name="kkm[]" id="kkm" placeholder="" class="tw-block tw-text-gray-400 tw-w-full tw-font-satoshi tw-border tw-border-[#E3E3E3] tw-mt-2 tw-rounded-md tw-py-3 tw-px-8 tw-bg-white focus:tw-shadow-sm focus:tw-shadow-admin-300 focus:tw-border-admin-300 focus:tw-outline-none tw-text-xs" value="{{ $nm->kkm }}">
                    </div> --}}
                                </div>
                                <div class="tw-flex tw-flex-col tw-gap-8">
                                    <div>
                                        <span class="tw-font-satoshi tw-mx-3 tw-font-medium tw-text-slate-400">Nilai US
                                            Teori</span>
                                        <input type="number" min="0" max="100" name="nilai_us_teori[]"
                                            id="nilai_us_teori" placeholder=""
                                            class="tw-block tw-text-gray-400 tw-w-full tw-font-satoshi tw-border tw-border-[#E3E3E3] tw-mt-2 tw-rounded-md tw-py-3 tw-px-8 tw-bg-white focus:tw-shadow-sm focus:tw-shadow-admin-300 focus:tw-border-admin-300 focus:tw-outline-none tw-text-xs"
                                            value="{{ $nm->nilai_us_teori }}">
                                    </div>

                                    <div>
                                        <span class="tw-font-satoshi tw-mx-3 tw-font-medium tw-text-slate-400">Nilai US
                                            Praktek</span>
                                        <input type="number" min="0" max="100" name="nilai_us_praktek[]"
                                            id="nilai_us_praktek" placeholder=""
                                            class="tw-block tw-text-gray-400 tw-w-full tw-font-satoshi tw-border tw-border-[#E3E3E3] tw-mt-2 tw-rounded-md tw-py-3 tw-px-8 tw-bg-white focus:tw-shadow-sm focus:tw-shadow-admin-300 focus:tw-border-admin-300 focus:tw-outline-none tw-text-xs"
                                            value="{{ $nm->nilai_us_praktek }}">
                                    </div>
                                </div>
                                <div class="tw-flex tw-flex-col tw-gap-8">
                                    <div>
                                        <span class="tw-font-satoshi tw-mx-3 tw-font-medium tw-text-slate-400">Nilai UKK
                                            Teori</span>
                                        <input type="number" min="0" max="100" name="nilai_ukk_teori[]"
                                            id="nilai_ukk_teori" placeholder=""
                                            class="tw-block tw-text-gray-400 tw-w-full tw-font-satoshi tw-border tw-border-[#E3E3E3] tw-mt-2 tw-rounded-md tw-py-3 tw-px-8 tw-bg-white focus:tw-shadow-sm focus:tw-shadow-admin-300 focus:tw-border-admin-300 focus:tw-outline-none tw-text-xs"
                                            value="{{ $nm->nilai_ukk_teori }}">
                                    </div>

                                    <div>
                                        <span class="tw-font-satoshi tw-mx-3 tw-font-medium tw-text-slate-400">Nilai UKK
                                            Praktek</span>
                                        <input type="number" min="0" max="100" name="nilai_ukk_praktek[]"
                                            id="nilai_ukk_praktek" placeholder=""
                                            class="tw-block tw-text-gray-400 tw-w-full tw-font-satoshi tw-border tw-border-[#E3E3E3] tw-mt-2 tw-rounded-md tw-py-3 tw-px-8 tw-bg-white focus:tw-shadow-sm focus:tw-shadow-admin-300 focus:tw-border-admin-300 focus:tw-outline-none tw-text-xs"
                                            value="{{ $nm->nilai_ukk_praktek }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
                <div class="tw-flex justify-center tw-mt-4">
                    <button type="submit"
                        class="tw-bg-sims-new-500 hover:tw-bg-sims-new-600 tw-transition-all tw-font-satoshi tw-font-medium tw-text-white tw-py-3 tw-px-6 tw-rounded-lg">Update
                        Data</button>
                </div>
            </form>
        </div>
    </div>
@endsection

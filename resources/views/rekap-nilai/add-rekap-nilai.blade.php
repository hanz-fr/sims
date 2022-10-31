@extends('layouts.main')

@section('content')
<div class="tw-m-10 tw-flex">
   <div class="tw-flex tw-flex-col tw-w-full">
        <div class="tw-flex">
            <a href="/rekap-nilai/{{ $siswa->nis_siswa }}"><i class="fa-solid fa-chevron-left tw-text-2xl tw-text-gray-400 hover:tw-text-gray-600"></i></a>
            <i class="fa-solid fa-users tw-text-2xl tw-ml-2 tw-text-sims-500"></i>
            <h4 class="tw-font-pop tw-font-bold tw-ml-2 tw-text-gray-500">Tambah Rekap Nilai Siswa</h4>
        </div>
        
        <form action="/api/raport/tambah-nilai" method="POST">
          @csrf
            <div class="card-data-bright tw-flex tw-justify-start tw-w-full tw-mx-5 tw-mt-10 tw-py-12">
                <div class="tw-flex-col tw-flex  tw-px-7 tw-py-7 tw-mb-5 tw-mt-5 tw-mx-10">
                    <span class="tw-font-pop tw-mx-3 tw-text-sims-400 tw-font-bold">NIS</span>
                    <input type="text" placeholder="NIS..." class="input-account tw-mr-32" name="nis_siswa" value="{{ $siswa->nis_siswa }}" maxlength="10" required>

                    <span class="tw-font-pop tw-mt-5 tw-text-sims-400 tw-font-bold">Semester</span>
                    <select name="semester" id="" class="input-account tw-px-10">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    </select>

                    <span class="tw-font-pop tw-mx-3 tw-mt-5 tw-text-sims-400 tw-font-bold">Tahun Ajaran</span>
                    <input type="text" placeholder="..." class="input-account" name="thn_ajaran">
                </div>

                <div class="tw-flex-col tw-flex tw-px-7 tw-py-7 tw-mb-5 tw-mt-5 tw-ml-4">
                    <span class="tw-font-pop tw-mx-3 tw-text-sims-400 tw-font-bold">Sakit</span>
                    <input type="number" placeholder="..." class="input-account" name="sakit">

                    <span class="tw-font-pop tw-mx-3 tw-mt-5 tw-text-sims-400 tw-font-bold">Izin</span>
                    <input type="number" placeholder="..." class="input-account" name="ijin">

                    <span class="tw-font-pop tw-mx-3 tw-mt-5 tw-text-sims-400 tw-font-bold">Alpha</span>
                    <input type="number" placeholder="..." class="input-account" name="alpa">
                </div>
            </div>

            <div class="card-data-bright tw-flex tw-justify-around tw-mx-5 tw-bg-sims-400 tw-shadow-lg tw-px-10 tw-my-5 tw-py-10 tw-w-full tw-rounded-lg">
                <div>
                    <label for="isNaik" class="tw-font-pop tw-mx-3 tw-font-lg tw-font-bold tw-text-white">Apakah siswa naik?</label>
                    <select type="text" id="isNaik" name="isNaik" placeholder="Naik atau Tidak Naik..." class="input-account">
                        <option value="true">Naik</option>
                        <option value="false">Tidak Naik</option>
                    </select>
                </div>
                
                <div>
                    <span class="tw-font-pop tw-mx-3 tw-font-lg tw-font-bold tw-mt-5 tw-text-white">Naik ke Kelas</span>
                    <input type="text" placeholder="Kelas..." class="input-account" name="naikKelas">
                </div>
                
                <div>
                    <span class="tw-font-pop tw-mx-3 tw-font-lg tw-font-bold tw-mt-5 tw-text-white">Tanggal Kenaikan</span>
                    <input type="date" class="input-account" name="tgl_kenaikan">
                </div>

            </div>

            <div class="card-data-bright tw-flex tw-flex-col tw-w-full tw-mx-5 tw-bg-slate-600">

                <div class="card-data-bright tw-bg-slate-500 tw-flex tw-justify-start tw-gap-10 tw-mx-5 tw-shadow-lg tw-px-20 tw-my-5 tw-py-10 tw-rounded-lg">
                    
                    <div>
                        <span class="tw-font-pop tw-mx-3 tw-font-lg tw-font-bold tw-mt-5 tw-text-white">Tinggal di Kelas</span>
                        <input type="text" placeholder="" class="input-account" name="tinggal_di_kelas">
                    </div>
                    
                    <div>
                        <span class="tw-font-pop tw-mx-3 tw-font-lg tw-font-bold tw-mt-5 tw-text-white">Alasan tidak naik</span>
                        <input type="text" class="input-account" name="alasan_tidak_naik">
                    </div>
        
                </div>

                <div class="tw-flex tw-justify-start tw-font-pop tw-text-gray-100 tw-font-medium tw-mx-10 tw-my-3">
                    *Hanya diisi jika siswa tidak naik kelas
                </div>
            </div>

            @foreach ($mapel as $m)
            <div class="tw-flex tw-justify-around tw-w-5/6 tw-mx-5 tw-my-10 tw-py-10 tw-bg-white tw-shadow-lg tw-rounded-lg">
                
                <div class="tw-bg-slate-200 tw-px-5 tw-rounded-lg">
                    <div class="tw-mt-5">
                    <span class="tw-font-pop tw-mt-5 tw-text-slate-400 tw-font-bold">Mapel</span>
                    <select name="idMapelJurusan[]" id="idMapelJurusan" class="input-account tw-px-10">
                    <option value="{{ $m->mapelJurusanId }}">{{ $m->MapelId }}</option>
                    </select>
                    </div>
                </div>

                {{-- COLUMN 1 --}}
                <div class="tw-flex tw-flex-col tw-gap-8">
                    <div>
                        <span class="tw-font-pop tw-mx-3 tw-font-medium tw-text-slate-400">Nilai Pengetahuan</span>
                        <input type="number" name="nilai_pengetahuan[]" id="nilai_pengetahuan" placeholder="" class="input-account">
                    </div>

                    <div>
                        <span class="tw-font-pop tw-mx-3 tw-font-medium tw-text-slate-400">Nilai Keterampilan</span>
                        <input type="number" name="nilai_keterampilan[]" id="nilai_keterampilan" placeholder="" class="input-account">
                    </div>

                    <div>
                        <span class="tw-font-pop tw-mx-3 tw-font-medium tw-text-slate-400">KKM</span>
                        <input type="number" name="kkm[]" id="kkm" placeholder="" class="input-account">
                    </div>
                </div>
                <div class="tw-flex tw-flex-col tw-gap-8">
                    <div>
                        <span class="tw-font-pop tw-mx-3 tw-font-medium tw-text-slate-400">Nilai US Teori</span>
                        <input type="number" name="nilai_us_teori[]" id="nilai_us_teori" placeholder="" class="input-account">
                    </div>

                    <div>
                        <span class="tw-font-pop tw-mx-3 tw-font-medium tw-text-slate-400">Nilai US Praktek</span>
                        <input type="number" name="nilai_us_praktek[]" id="nilai_us_praktek" placeholder="" class="input-account">
                    </div>

                    <div>
                        <span class="tw-font-pop tw-mx-3 tw-font-medium tw-text-slate-400">AKM</span>
                        <input type="number" name="nilai_akm[]" id="nilai_akm" placeholder="" class="input-account">
                    </div>
                </div>
                <div class="tw-flex tw-flex-col tw-gap-8">
                    <div>
                        <span class="tw-font-pop tw-mx-3 tw-font-medium tw-text-slate-400">Nilai UKK Teori</span>
                        <input type="number" name="nilai_ukk_teori[]" id="nilai_ukk_teori" placeholder="" class="input-account">
                    </div>

                    <div>
                        <span class="tw-font-pop tw-mx-3 tw-font-medium tw-text-slate-400">Nilai UKK Praktek</span>
                        <input type="number" name="nilai_ukk_praktek[]" id="nilai_ukk_praktek" placeholder="" class="input-account">
                    </div>
                </div>

            </div>
            @endforeach
            <div class="tw-flex justify-center tw-mt-4">
                <button type="submit" class="tw-bg-sims-400 tw-font-pop tw-font-medium tw-text-white tw-py-3 tw-px-6 tw-rounded-lg">Upload Data</button>
            </div>
        </form>
   </div>
</div>
@endsection
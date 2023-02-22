@extends('layouts.main-new')

@section('content')
<div class="tw-mx-10">
  
  {{-- @if(session()->has('error'))
  <div id="alert-2" class="tw-flex tw-p-4 tw-mt-4 tw-bg-red-100 tw-rounded-lg" role="alert">
    <svg class="tw-my-auto tw-flex-shrink-0 tw-w-5 tw-h-5 tw-text-red-700" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
    <div class="tw-ml-3 tw-text-sm tw-font-medium tw-text-red-700">
      <div class="tw-font-bold tw-text-lg tw-flex">Error</div>  {{ session('error') }}
    </div>
    <button type="button" class="tw-ml-auto -tw-mx-1.5 tw-my-auto tw-bg-red-100 tw-text-red-500 tw-rounded-lg focus:tw-ring-2 focus:tw-ring-red-400 tw-p-1.5 hover:tw-bg-red-200 tw-inline-flex tw-h-8 tw-w-8 dark:tw-bg-red-200 dark:tw-text-red-600 dark:hover:tw-bg-red-300" data-dismiss-target="#alert-2" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg class="tw-w-5 tw-h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </div>
  @endif --}}

    <div x-data="{
		step: 1,
		activeClasses: 'tw-border-4 tw-border-sims-new-500',
		inactiveClasses: 'tw-border-2 tw-bg-sims-new-500 tw-border-sims-new-500'
	        }" class="tw-flex tw-flex-col tw-rounded-[35px] tw-bg-white tw-w-4/5 tw-p-8 tw-h-full tw-mx-auto tw-my-10 tw-shadow-lg">
      <a href="{{ url()->previous() }}" class="tw-text-sims-new-500 tw-text-3xl tw-w-min hover:tw-text-sims-new-600"><i class="fa-solid fa-chevron-left"></i></a>
      <h3 class="tw-font-satoshi tw-font-semibold tw-mt-6 tw-text-sims-new-500 tw-text-center">Tambah Data Siswa</h3>

        <div class="tw-flex tw-items-center tw-w-full lg:tw-mx-auto sm:tw-px-10 tw-max-w-3xl tw-font-sg tw-mt-10">
            <div :class="step === 1 ? 'tw-text-sims-new-500' : 'tw-text-gray-400'" class="tw-flex tw-items-center tw-relative">
                <div @click="step = 1" :class="step === 1 ? activeClasses : inactiveClasses" class="tw-rounded-full tw-transition tw-duration-500 tw-ease-in-out tw-h-7 tw-w-7">
                </div>
                <div class="tw-absolute tw-top-0 tw-text-center tw-w-[7rem] tw--ml-10 tw-mt-10 tw-font-medium">Data Siswa</div>
            </div>
            <div :class="step === 1 ? 'tw-border-gray-300' : 'tw-border-sims-new-500'" class="tw-flex-auto tw-border-t-4 tw-transition tw-duration-500 tw-ease-in-out"></div>

            <div :class="step === 2 ? 'tw-text-sims-new-500' : 'tw-text-gray-400'" class="tw-flex tw-items-center tw-relative">
                <div @click="step = 2" :class="step === 1 ? 'tw-bg-gray-300' : '' || step === 2 ? activeClasses : inactiveClasses" class="tw-rounded-full tw-transition tw-duration-500 tw-ease-in-out tw-h-7 tw-w-7">
                </div>
                <div class="tw-absolute tw-top-0 tw-text-center tw-w-40 tw--ml-14 tw-mt-10 tw-font-medium">Orang Tua/Wali</div>
            </div>
            <div :class="step === 2 ? 'tw-border-gray-300' : 'tw-border-sims-new-500' && step === 1 ? 'tw-border-gray-300' : 'tw-border-sims-new-500'" class="tw-flex-auto tw-border-t-4 tw-transition tw-duration-500 tw-ease-in-out"></div>

            <div :class="step === 3 ? 'tw-text-sims-new-500' : 'tw-text-gray-400'" class="tw-flex tw-items-center tw-relative">
                <div @click="step = 3" :class="step === 3 ? activeClasses : 'tw-bg-gray-300'" class="tw-rounded-full tw-transition tw-duration-500 tw-ease-in-out tw-h-7 tw-w-7">
                </div>
                <div class="tw-absolute tw-top-0 tw-w-32 tw--ml-12 tw-text-center tw-mt-10 tw-font-medium">Lainnya</div>
            </div>
        </div>
        
        <form method="POST" action="/api/siswa" enctype="multipart/form-data"  
          class="tw-w-full lg:tw-mx-auto sm:tw-px-10 tw-my-8 tw-max-w-3xl tw-font-satoshi">
          @csrf
          @method('POST')

            <input type="hidden" name="prevURL" value="{{ $prevURL }}">
            <input type="hidden" name="prevURLwithParams" value="{{ $prevURLwithParams }}">

            {{-- biodata --}}
            <div x-show.transition.in="step === 1" x-transition:enter.duration.300ms>

                <div class="tw-font-satoshi tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-new-500 tw-mt-24">A.  Biodata Peserta Didik</div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full lg:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
                        <label class="label-input" for="nis">
                            NIS *
                        </label>
                        <input value="{{ old('nis') }}" @error('nis_siswa') is-invalid @enderror class="input-data-minimal tw-w-full" id="nis" name="nis" type="text" maxlength="10" required>
                        @error('nis_siswa')
                            <small class="tw-text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="tw-w-full lg:tw-w-1/2 tw-px-3">
                        <label class="label-input" for="nisn">
                            NISN *
                        </label>
                        <input value="{{ old('nisn') }}" @error('nisn') is-invalid @enderror class="input-data-minimal tw-w-full" id="nisn" name="nisn" type="text" maxlength="10" required>
                        @error('nisn')
                            <small class="tw-text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="foto">
                            Pas Foto
                        </label>
                        <img class="img-preview tw-w-1/4 tw-mb-3">
                            <span class="tw-sr-only">Choose profile photo</span>
                            <input type="file" id="foto" name="foto" onchange="previewImage()"/>
                            <div class="tw-text-sm tw-text-gray-400 tw-mt-2">* Pas Foto ukuran 300x400</div>
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="nama">
                            Nama Peserta Didik *
                        </label>
                        <input value="{{ old('nama') }}" @error('nama') is-invalid @enderror class="input-data-minimal" id="nama" type="text" name="nama" required>
                        @error('nama')
                            <small class="tw-text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
                        <label class="label-input" for="tmp_lahir">
                            Tempat Lahir *
                        </label>
                        <input value="{{ old('tmp_lahir') }}" @error('tmp_lahir') is-invalid @enderror class="input-data-minimal" id="tmp_lahir" name="tmp_lahir" type="text" required>
                        @error('tmp_lahir')
                            <small class="tw-text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="tw-w-full md:tw-w-1/2 tw-px-3">
                        <label class="label-input" for="tgl_lahir">
                            Tanggal Lahir *
                        </label>
                        <input value="{{ old('tgl_lahir') }}" @error('tgl_lahir') is-invalid @enderror class="input-data-minimal" id="tgl_lahir" name="tgl_lahir" type="date" placeholder="dd/mm/yyyy" required>
                        @error('tgl_lahir')
                            <small class="tw-text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="agama">
                            Agama *
                        </label>
                        <input value="{{ old('agama') }}" @error('agama') is-invalid @enderror class="input-data-minimal" id="agama" type="text" name="agama" required>
                        @error('agama')
                            <small class="tw-text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
                        <label class="label-input" for="anak_ke">
                            Anak-Ke *
                        </label>
                        <input value="{{ old('anak_ke') }}" class="input-data-minimal" id="anak_ke" name="anak_ke" type="number" max="99" min="1" required>
                    </div>
                    <div class="tw-w-full md:tw-w-1/2 tw-px-3">
                        <label class="label-input" for="jenis_kelamin">
                            Jenis Kelamin *
                        </label>
                        <select class="input-data-minimal" id="jenis_kelamin" name="jenis_kelamin" required>
                            @if(old('jenis_kelamin') == 'L')
                            <option selected value="{{ old('jenis_kelamin') }}">Laki-laki</option>
                            <option value="P">Perempuan</option>
                            @elseif(old('jenis_kelamin' == 'P'))
                            <option selected value="{{ old('jenis_kelamin') }}">Perempuan</option>
                            <option value="L">Laki-laki</option>
                            @else
                            <option selected>Pilih</option>
                            <option value="L">Laki-laki</option>
                            <option value="L">Perempuan</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="status">
                            Status dalam keluarga
                        </label>
                        <select class="input-data-minimal" id="status" name="status">
                            <option selected value="">Pilih</option>
                            @if(old('status'))
                            <option value="{{ old('status') }}">
                            @if(old('status') == 'AK') Anak Kandung 
                            @elseif(old('status') =='AA') Anak Angkat
                            @elseif(old('status') == 'AT') Anak Tiri
                            @endif
                            </option>
                            @endif
                            <option value="AK">Anak Kandung</option>
                            <option value="AA">Anak Angkat</option>
                            <option value="AT">Anak Tiri</option>
                        </select>
                        @error('status')
                            <small class="tw-text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="alamat_siswa">
                            Alamat Peserta Didik
                        </label>
                        <textarea class="input-data-minimal" id="alamat_siswa" type="text" name="alamat_siswa" required>{{ old('alamat_siswa') }}</textarea>
                        @error('alamat_siswa')
                            <small class="tw-text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
                        <label class="label-input" for="no_telp">
                            No. HP *
                        </label>
                        <input value="{{ old('no_telp') }}" @error('no_telp') is-invalid @enderror class="input-data-minimal" id="no_telp" type="text" name="no_telp" required  maxlength="20">
                        @error('no_telp')
                            <small class="tw-text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="tw-w-full md:tw-w-1/2 tw-px-3">
                        <label class="label-input" for="email">
                            Alamat Email
                        </label>
                        <input value="{{ old('email') }}" class="input-data-minimal" id="email" type="email" name="email">
                    </div>
                </div>

                {{-- Diterima di sekolah ini --}}
                <div class="tw-font-satoshi tw-text-2xl tw-font-semibold tw-mb-8 tw-mt-20 tw-text-sims-new-500">B.  Diterima di sekolah ini</div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="diterima_di_kelas">
                            Di kelas *
                        </label>
                        <select class="input-data-minimal" id="diterima_di_kelas" name="diterima_di_kelas" required>
                        @if(old('kelas'))
                        <option value="{{ old('kelas') }}">{{ old('kelas') }}</option>
                        @endif
                        @foreach ($kelas as $k)
                        <option value="{{ $k->id }}">{{ $k->id }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="tgl_masuk">
                            Pada Tanggal
                        </label>
                        <input class="input-data-minimal" id="tgl_masuk" type="date" name="tgl_masuk">
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="semester">
                            Semester
                        </label>
                        <input class="input-data-minimal" id="semester" type="number" name="semester">
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="thn_ajaran">
                            Tahun Ajaran
                        </label>
                        <input class="input-data-minimal" id="thn_ajaran" type="text" name="thn_ajaran">
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="angkatan">
                            Angkatan *
                        </label>
                        <input class="input-data-minimal" id="angkatan" type="number" name="angkatan" required>
                    </div>
                </div>

                {{-- sekolah asal --}}
                <div class="tw-font-satoshi tw-text-2xl tw-font-semibold tw-mb-8 tw-mt-20 tw-text-sims-new-500">C.  Sekolah Asal</div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="nama_sekolah_asal">
                            Nama Sekolah *
                        </label>
                        <input class="input-data-minimal" @error('nama_sekolah_asal') is-invalid @enderror id="nama_sekolah_asal" type="text" name="nama_sekolah_asal" required>
                        @error('nama_sekolah_asal')
                        <small class="tw-text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="alamat_sekolah_asal">
                            Alamat Sekolah *
                        </label>
                        <input class="input-data-minimal" id="alamat_sekolah_asal" type="text" name="alamat_sekolah_asal" required>
                    </div>
                </div>

                {{-- ijazah smp --}}
                <div class="tw-font-satoshi tw-text-2xl tw-font-semibold tw-mb-8 tw-mt-20 tw-text-sims-new-500">D.  Ijazah SMP/MTs</div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="nomor_ijazah_smp">
                            Nomor Ijazah SMP
                        </label>
                        <input class="input-data-minimal" id="nomor_ijazah_smp" type="text" name="nomor_ijazah_smp">
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="tahun_ijazah_smp">
                            Tahun Ijazah SMP
                        </label>
                        <input class="input-data-minimal" id="tahun_ijazah_smp" type="text" name="tahun_ijazah_smp" max="10">
                    </div>
                </div>

                <div class="tw-font-satoshi tw-text-2xl tw-font-semibold tw-mb-8 tw-mt-20 tw-text-sims-new-500">E.  SKHUN SMP/Mts</div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="nomor_skhun">
                            Nomor SKHUN
                        </label>
                        <input class="input-data-minimal" id="nomor_skhun" type="text" name="nomor_skhun">
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="tahun_skhun">
                            Tahun SKHUN
                        </label>
                        <input class="input-data-minimal" id="tahun_skhun" type="text" name="tahun_skhun">
                    </div>
                </div>

            </div>
            

            {{-- Data Orang Tua/Wali --}}
            <div x-show.transition.in="step === 2" x-transition:enter.duration.300ms>

                {{-- data orang tua --}}
                <div class="tw-font-satoshi tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-new-500 tw-mt-24">F.  Data Orang Tua</div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="nama_ayah">
                                Nama Ayah
                            </label>
                            <input class="input-data-minimal" id="nama_ayah" type="text" name="nama_ayah">
                        </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="nama_ibu">
                                Nama Ibu
                            </label>
                            <input class="input-data-minimal" id="nama_ibu" type="text" name="nama_ibu">
                        </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="alamat_ortu">
                                Alamat
                            </label>
                            <textarea class="input-data-minimal" id="alamat_ortu" name="alamat_ortu"></textarea>
                        </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
                            <label class="label-input" for="no_telp_ortu">
                                No.Telp/HP
                            </label>
                            <input class="input-data-minimal" id="no_telp_ortu" type="text" name="no_telp_ortu" maxlength="20">
                        </div>
                        <div class="tw-w-full md:tw-w-1/2 tw-px-3">
                            <label class="label-input" for="email_ortu">
                                Email
                            </label>
                            <input class="input-data-minimal" id="email_ortu" type="email_ortu" name="email_ortu">
                        </div>
                </div>
            
                {{-- wali --}}
                <div class="tw-font-satoshi tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-new-500 tw-mt-20">G.  Data Wali</div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="nama_wali">
                                Nama Wali
                            </label>
                            <input class="input-data-minimal" id="nama_wali" type="text" name="nama_wali">
                        </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="alamat_wali">
                                Alamat
                            </label>
                            <textarea class="input-data-minimal" id="alamat_wali" type="text" name="alamat_wali"></textarea>
                        </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="no_telp_wali">
                                No. Telp/HP
                            </label>
                            <input class="input-data-minimal" id="no_telp_wali" type="text" name="no_telp_wali"  maxlength="20">
                        </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="pekerjaan_wali_2">
                                Pekerjaan Wali
                            </label>
                            <input class="input-data-minimal" id="pekerjaan_wali_2" type="text" name="pekerjaan_wali">
                        </div>
                </div>

            </div>


            {{-- Data Lainnya --}}
            <div x-show.transition.in="step === 3" x-transition:enter.duration.300ms>
                
                {{-- keterangan jasmani dan kesehatan siswa --}}
                <div class="tw-font-satoshi tw-text-2xl tw-font-semibold tw-mb-8 tw-mt-20 tw-text-sims-new-500">H.  Keterangan Jasmani dan Kesehatan Siswa</div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="berat_badan">
                            Berat Badan   (.kg)
                        </label>
                        <input class="input-data-minimal" id="berat_badan" type="number" name="berat_badan">
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="tinggi_badan">
                            Tinggi Badan   (.cm)
                        </label>
                        <input class="input-data-minimal" id="tinggi_badan" type="number" name="tinggi_badan">
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="lingkar_kepala">
                            Lingkar Kepala   (.cm)
                        </label>
                        <input class="input-data-minimal" id="lingkar_kepala" type="number" name="lingkar_kepala">
                    </div>
                </div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="golongan_darah">
                            Golongan Darah
                        </label>
                        <input class="input-data-minimal" id="golongan_darah" type="text" name="golongan_darah">
                    </div>
                </div>

                {{-- keterangan lain2 --}}
                <div class="tw-font-satoshi tw-text-2xl tw-font-semibold tw-mb-8 tw-mt-20 tw-text-sims-new-500">I.  Keterangan Lain-lain</div>
                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                    <div class="tw-w-full tw-px-3">
                        <textarea class="input-data-minimal" id="keterangan_lain" type="text" name="keterangan_lain"></textarea>
                    </div>
                </div>

                <div class="tw-w-full tw-mt-6">
                    <label class="label-input" for="status_siswa">
                        Status Siswa *
                    </label>
                    <select class="input-data-minimal" id="status_siswa" name="status_siswa" required>
                        @if(old('status_siswa') == 'aktif')
                        <option selected value="{{ old('status_siswa') }}">Aktif</option>
                        <option value="non-aktif">Non Aktif</option>
                        @elseif(old('status_siswa' == 'non-aktif'))
                        <option selected value="{{ old('status_siswa') }}">Non Aktif</option>
                        <option value="aktif">Aktif</option>
                        @else
                        <option selected value="aktif">Aktif</option>
                        <option value="non-aktif">Non Aktif</option>
                        @endif
                    </select>
                </div>

                <div class="tw-flex tw-flex-wrap tw--mx-3 tw-my-6">
                    <div class="tw-w-full tw-px-3">
                        <label class="label-input" for="KelasId">
                            Aktif di Kelas *
                        </label>
                        <select class="input-data-minimal" id="KelasId" name="KelasId">
                        @foreach ($kelas as $k)
                        <option value="{{ $k->id }}">{{ $k->id }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="tw-mx-auto tw-text-center tw-mt-16">
                <div class="tw-max-w-3xl tw-mx-auto tw-px-4">
                    <div class="tw-flex tw-justify-between">
                        <div class="tw-w-1/2 tw-text-left">
                        <button type="button"
                            x-show="step > 1"
                            @click="step--"
                            class="tw-bg-sims-new-500 tw-font-medium tw-text-white tw-py-3 tw-px-6 tw-rounded-lg" 
                            >Previous</button>
                        </div>
            
                        <div class="tw-w-1/2 tw-text-right">
                        <button type="button"
                            x-show="step < 3"
                            @click="step++"
                            class="tw-bg-sims-new-500 tw-font-medium tw-text-white tw-py-3 tw-px-6 tw-rounded-lg" 
                            >Next</button>

                        <button
                        type="submit"
                            x-show="step === 3"
                            class="tw-bg-sims-new-500 tw-font-medium tw-text-white tw-py-3 tw-px-6 tw-rounded-lg" 
                            >Upload Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function previewImage() {
      const image = document.querySelector('#foto');
      const imgPreview = document.querySelector('.img-preview');
  
      imgPreview.style.display = 'block';
  
      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);
  
      oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
</script>
@endpush
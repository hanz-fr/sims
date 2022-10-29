@extends('layouts.main')

@section('content')
<div class="tw-mx-10">
@if($status == 'error')
<div class="tw-flex tw-justify-center">
    <div class="tw-block tw-my-32">
        <img src="{{asset('assets/img/error_img.svg')}}" alt="error_img">
        <h1 class="tw-flex tw-justify-center tw-font-pop tw-font-bold tw-mt-6 tw-text-sims-400">404 Not Found</h1>
        <p class="tw-flex tw-justify-center tw-font-pop tw-text-md tw-font-semibold tw-text-gray-400 tw-mt-5">{{ $message }}</p>
    </div>
</div>
</div>
@else

<div class="tw-mx-10">

  @if(session()->has('error'))
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
  @endif

    <div class="tw-flex tw-flex-col tw-rounded-[35px] tw-bg-white tw-w-4/5 tw-p-8 tw-h-full tw-mx-auto tw-my-14 tw-shadow-lg">
        <a href="/data-induk-siswa" class="tw-text-sims-400 tw-text-3xl tw-w-min hover:tw-text-sims-500"><i class="fa-solid fa-chevron-left"></i></a>
        <h3 class="tw-font-pop tw-font-semibold tw-mt-6 tw-text-sims-400 tw-text-center">Edit Data Siswa</h3>
        
        <form method="POST" action="/api/siswa/update/{{ $siswa->nis_siswa }}" enctype="multipart/form-data"  
          class="tw-w-full lg:tw-mx-auto sm:tw-px-10 tw-my-10 tw-max-w-3xl tw-font-pop">
          @csrf
          @method('PUT')
        
          {{-- biodata --}}
            <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">A.  Biodata Peserta Didik</div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-max md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
                    <label class="label-input" for="nis">
                        NIS
                    </label>
                    <input class="input-data tw-w-full" id="nis" name="nis" type="text" maxlength="10" value="{{ $siswa->nis_siswa }}">
                </div>
                <div class="tw-w-fit md:tw-w-1/2 tw-px-3">
                    <label class="label-input" for="nisn">
                        NISN
                    </label>
                    <input class="input-data tw-w-full" id="nisn" name="nisn" type="text" maxlength="10" value="{{ $siswa->nisn_siswa }}">
                </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <label class="label-input" for="nama">
                        Pas Foto
                    </label>
                    @if($siswa->foto)
                    <img src="{{ asset('foto/'.$siswa->foto) }}" class="img-preview tw-w-1/4 tw-mb-3" alt="pasfoto" width="100" height="100">
                    @else
                    <img class="img-preview tw-w-1/4 tw-mb-3">
                    @endif
                    <label>
                        <span class="tw-sr-only">Choose profile photo</span>
                        <input type="hidden" name="oldImage" value="{{ $siswa->foto }}">
                        <input type="file" id="foto" name="foto" onchange="previewImage()"/>
                    </label>
                </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <label class="label-input" for="nama">
                        Nama Peserta Didik
                    </label>
                    <input class="input-data" id="nama" type="text" name="nama" value="{{ $siswa->nama_siswa }}">
                </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
                    <label class="label-input" for="tmp_lahir">
                        Tempat Lahir
                    </label>
                    <input class="input-data" id="tmp_lahir" name="tmp_lahir" type="text" value="{{ $siswa->tmp_lahir }}">
                </div>
                <div class="tw-w-full md:tw-w-1/2 tw-px-3">
                    <label class="label-input" for="tgl_lahir">
                        Tanggal Lahir
                    </label>
                    <input class="input-data" id="tgl_lahir" name="tgl_lahir" type="date" placeholder="dd/mm/yyyy" value="{{ $siswa->tgl_lahir }}">
                </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <label class="label-input" for="agama">
                        Agama
                    </label>
                    <input class="input-data" id="agama" type="text" name="agama" value="{{ $siswa->agama }}">
                </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
                    <label class="label-input" for="anak_ke">
                        Anak-Ke
                    </label>
                    <input class="input-data" id="anak_ke" name="anak_ke" type="number" max="99" min="1" value="{{ $siswa->anak_ke }}">
                </div>
                <div class="tw-w-full md:tw-w-1/2 tw-px-3">
                    <label class="label-input" for="jenis_kelamin">
                        Jenis Kelamin
                    </label>
                    <select class="input-data" id="jenis_kelamin" name="jenis_kelamin" value="{{ $siswa->jenis_kelamin }}">
                        @if($siswa->jenis_kelamin == 'L')
                        <option>Pilih</option>
                        <option value="L" selected>Laki-laki</option>
                        <option value="P">Perempuan</option>
                        @elseif($siswa->jenis_kelamin == 'P')
                        <option>Pilih</option>
                        <option value="P" selected>Perempuan</option>
                        <option value="L">Laki-laki</option>
                        @else
                        -
                        @endif
                    </select>
                </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <label class="label-input" for="status">
                        Status dalam keluarga
                    </label>
                    <select class="input-data" id="status" name="status">
                        @if($siswa->status == 'AK')
                        <option value="">Pilih</option>
                        <option selected value="AA">Anak Kandung</option>
                        <option value="AK">Anak Angkat</option>
                        <option value="AT">Anak Tiri</option>
                        @elseif($siswa->status == 'AA')
                        <option value="">Pilih</option>
                        <option value="AA">Anak Kandung</option>
                        <option selected value="AK">Anak Angkat</option>
                        <option value="AT">Anak Tiri</option>
                        @elseif($siswa->status == 'AT')
                        <option value="">Pilih</option>
                        <option value="AA">Anak Kandung</option>
                        <option value="AK">Anak Angkat</option>
                        <option selected value="AT">Anak Tiri</option>
                        @else
                        <option value="">Pilih</option>
                        <option value="AA">Anak Kandung</option>
                        <option value="AK">Anak Angkat</option>
                        <option value="AT">Anak Tiri</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <label class="label-input" for="alamat_siswa">
                        Alamat Peserta Didik
                    </label>
                    <textarea class="input-data" id="alamat_siswa" type="text" name="alamat_siswa">{{ $siswa->alamat_siswa }}</textarea>
                </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
                    <label class="label-input" for="no_telp">
                        No. HP
                    </label>
                    <input class="input-data" id="no_telp" type="text" name="no_telp" value="{{ $siswa->no_telp_siswa }}"  maxlength="20">
                </div>
                <div class="tw-w-full md:tw-w-1/2 tw-px-3">
                    <label class="label-input" for="email">
                        Alamat Email
                    </label>
                    <input class="input-data" id="email" type="email" name="email" value="{{ $siswa->email_siswa }}">
                </div>
            </div>

            {{-- section B, Diterima di sekolah ini --}}
            <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">B.  Diterima di sekolah ini</div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <label class="label-input" for="kelas">
                        Di kelas
                    </label>
                    <select class="input-data" id="kelas" name="kelas">
                    <option selected value="{{ $siswa->KelasId }}">{{ $siswa->KelasId }}</option>
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
                    <input class="input-data" id="tgl_masuk" type="date" name="tgl_masuk" value="{{ $siswa->tgl_diterima }}">
                </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <label class="label-input" for="semester">
                        Semester
                    </label>
                    <input class="input-data" id="semester" type="number" name="semester" value="{{ $siswa->semester_diterima }}">
                </div>
            </div>

            {{-- sekolah asal --}}
            <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">C.  Sekolah Asal</div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <label class="label-input" for="nama_sekolah_asal">
                        Nama Sekolah
                    </label>
                    <input class="input-data" id="nama_sekolah_asal" type="text" name="nama_sekolah_asal" value="{{ $siswa->sekolah_asal }}">
                </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <label class="label-input" for="alamat_sekolah_asal">
                        Alamat Sekolah
                    </label>
                    <input class="input-data" id="alamat_sekolah_asal" type="text" name="alamat_sekolah_asal" value="{{ $siswa->alamat_sekolah_asal }}">
                </div>
            </div>

            {{-- ijazah smp --}}
            <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">D.  Ijazah SMP/MTs</div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <label class="label-input" for="nomor_ijazah_smp">
                        Nomor Ijazah SMP
                    </label>
                    <input class="input-data" id="nomor_ijazah_smp" type="text" name="nomor_ijazah_smp" value="{{ $siswa->no_ijazah_smp }}">
                </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <label class="label-input" for="tahun_ijazah_smp">
                        Tahun Ijazah SMP
                    </label>
                    <input class="input-data" id="tahun_ijazah_smp" type="text" name="tahun_ijazah_smp" max="10" value="{{ $siswa->thn_ijazah_smp }}">
                </div>
            </div>

            <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">E.  SKHUN SMP/Mts</div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <label class="label-input" for="nomor_skhun">
                        Nomor SKHUN
                    </label>
                    <input class="input-data" id="nomor_skhun" type="text" name="nomor_skhun" value="{{ $siswa->no_skhun_smp }}">
                </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <label class="label-input" for="tahun_skhun">
                        Tahun SKHUN
                    </label>
                    <input class="input-data" id="tahun_skhun" type="text" name="tahun_skhun" value="{{ $siswa->thn_skhun_smp }}" >
                </div>
            </div>
            

            <div x-data="{ openTab: 0}" class="tw-my-8">
                <label class="label-input tw-text-xl">
                    Apakah Siswa memiliki orang tua?
                </label>

              @if($siswa->nama_ayah || $siswa->nama_ibu)
                <div class="tw-flex tw-gap-3">
                    <div @click="openTab = 1" class="tw-flex tw-items-center">
                    <input id="default-radio-1" type="radio" name="default-radio" value="" checked class="tw-w-4 tw-h-4 tw-bg-gray-100 tw-border-gray-300 focus:tw-ring-2">
                    <label for="default-radio-1" class="tw-ml-2 tw-text-sm tw-font-medium tw-text-basic-700">Ya</label>
                    </div>
                    <div @click="openTab = 2" class="tw-flex tw-items-center">
                        <input id="default-radio-2" type="radio" name="default-radio" value="" class="tw-w-4 tw-h-4 tw-bg-gray-100 tw-border-gray-300 focus:tw-ring-2">
                        <label for="default-radio-2" class="tw-ml-2 tw-text-sm tw-font-medium tw-text-basic-700">Tidak</label>
                    </div>
                </div>
        
                {{-- data orang tua --}}
                <div x-show="openTab === 1">
                    <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">F.  Data Orang Tua</div>
                    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="nama_ayah">
                                Nama Ayah
                            </label>
                            <input class="input-data" id="nama_ayah" type="text" name="nama_ayah" value="{{ $siswa->nama_ayah }}">
                        </div>
                    </div>
                    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="nama_ibu">
                                Nama Ibu
                            </label>
                            <input class="input-data" id="nama_ibu" type="text" name="nama_ibu" value="{{ $siswa->nama_ibu }}">
                        </div>
                    </div>
                    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="alamat_ortu">
                                Alamat
                            </label>
                            <textarea class="input-data" id="alamat_ortu" name="alamat_ortu">{{ $siswa->alamat_ortu }}</textarea>
                        </div>
                    </div>
                    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
                            <label class="label-input" for="no_telp_ortu">
                                No.Telp/HP
                            </label>
                            <input class="input-data" id="no_telp_ortu" type="text" name="no_telp_ortu" maxlength="20" value="{{ $siswa->no_telp_ortu }}">
                        </div>
                        <div class="tw-w-full md:tw-w-1/2 tw-px-3">
                            <label class="label-input" for="email_ortu">
                                Email
                            </label>
                            <input class="input-data" id="email_ortu" type="email_ortu" name="email_ortu" value="{{ $siswa->email_ortu }}">
                        </div>
                    </div>
                </div>
        
                {{-- data wali --}}
                <div x-show="openTab === 2">
                    <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">F.  Data Wali</div>
                    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="nama_wali">
                                Nama Wali
                            </label>
                            <input class="input-data" id="nama_wali" type="text" name="nama_wali" value="{{ $siswa->nama_wali }}">
                        </div>
                    </div>
                    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="alamat_wali">
                                Alamat
                            </label>
                            <textarea class="input-data" id="alamat_wali" type="text" name="alamat_wali">{{ $siswa->alamat_wali }}</textarea>
                        </div>
                    </div>
                    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="no_telp_wali">
                                No. Telp/HP
                            </label>
                            <input class="input-data" id="no_telp_wali" type="text" name="no_telp_wali"  maxlength="20" value="{{ $siswa->no_telp_wali }}">
                        </div>
                    </div>
                    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="pekerjaan_wali_2">
                                Pekerjaan Wali
                            </label>
                            <input class="input-data" id="pekerjaan_wali_2" type="text" name="pekerjaan_wali" value="{{ $siswa->pekerjaan_wali }}">
                        </div>
                    </div>
                </div>

              @else
                <div class="tw-flex tw-gap-3">
                    <div @click="openTab = 1" class="tw-flex tw-items-center">
                        <input id="default-radio-1" type="radio" name="default-radio" value="" class="tw-w-4 tw-h-4 tw-bg-gray-100 tw-border-gray-300 focus:tw-ring-2">
                        <label for="default-radio-1" class="tw-ml-2 tw-text-sm tw-font-medium tw-text-basic-700">Ya</label>
                    </div>
                    <div @click="openTab = 2" class="tw-flex tw-items-center">
                        <input id="default-radio-2" type="radio" name="default-radio" value="" checked class="tw-w-4 tw-h-4 tw-text-blue-600 tw-bg-gray-100 tw-border-gray-300 focus:tw-ring-blue-500 dark:focus:tw-ring-blue-600 dark:tw-ring-offset-gray-800 focus:tw-ring-2 dark:tw-bg-gray-700 dark:tw-border-gray-600">
                        <label for="default-radio-2" class="tw-ml-2 tw-text-sm tw-font-medium tw-text-basic-700">Tidak</label>
                    </div>
                </div>
        
                {{-- data orang tua --}}
                <div x-show="openTab === 1">
                    <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">F.  Data Orang Tua</div>
                    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="nama_ayah">
                                Nama Ayah
                            </label>
                            <input class="input-data" id="nama_ayah" type="text" name="nama_ayah" value="{{ $siswa->nama_ayah }}">
                        </div>
                    </div>
                    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="nama_ibu">
                                Nama Ibu
                            </label>
                            <input class="input-data" id="nama_ibu" type="text" name="nama_ibu" value="{{ $siswa->nama_ibu }}">
                        </div>
                    </div>
                    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="alamat_ortu">
                                Alamat
                            </label>
                            <textarea class="input-data" id="alamat_ortu" name="alamat_ortu">{{ $siswa->alamat_ortu }}</textarea>
                        </div>
                    </div>
                    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
                            <label class="label-input" for="no_telp_ortu">
                                No.Telp/HP
                            </label>
                            <input class="input-data" id="no_telp_ortu" type="text" name="no_telp_ortu" maxlength="20" value="{{ $siswa->no_telp_ortu }}">
                        </div>
                        <div class="tw-w-full md:tw-w-1/2 tw-px-3">
                            <label class="label-input" for="email_ortu">
                                Email
                            </label>
                            <input class="input-data" id="email_ortu" type="email_ortu" name="email_ortu" value="{{ $siswa->email_ortu }}">
                        </div>
                    </div>
                </div>
        
                {{-- data wali --}}
                <div x-show="openTab === 2">
                    <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">F.  Data Wali</div>
                    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="nama_wali">
                                Nama Wali
                            </label>
                            <input class="input-data" id="nama_wali" type="text" name="nama_wali" value="{{ $siswa->nama_wali }}">
                        </div>
                    </div>
                    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="alamat_wali">
                                Alamat
                            </label>
                            <textarea class="input-data" id="alamat_wali" type="text" name="alamat_wali">{{ $siswa->alamat_wali }}</textarea>
                        </div>
                    </div>
                    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="no_telp_wali">
                                No. Telp/HP
                            </label>
                            <input class="input-data" id="no_telp_wali" type="text" name="no_telp_wali"  maxlength="20" value="{{ $siswa->no_telp_wali }}">
                        </div>
                    </div>
                    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                        <div class="tw-w-full tw-px-3">
                            <label class="label-input" for="pekerjaan_wali_2">
                                Pekerjaan Wali
                            </label>
                            <input class="input-data" id="pekerjaan_wali_2" type="text" name="pekerjaan_wali" value="{{ $siswa->pekerjaan_wali }}">
                        </div>
                    </div>
                </div>

              @endif
            </div>


            {{-- meninggalkan sekolah --}}
            <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">G.  Meninggalkan Sekolah</div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <label class="label-input" for="tgl_meninggalkan_sekolah">
                        Tanggal
                    </label>
                    <input class="input-data" id="tgl_meninggalkan_sekolah" type="date" name="tgl_meninggalkan_sekolah" value="{{ $siswa->tgl_meninggalkan_sekolah }}">
                </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <label class="label-input" for="alasan_meninggalkan_sekolah">
                        Alasan
                    </label>
                    <input class="input-data" id="alasan_meninggalkan_sekolah" type="text" name="alasan_meninggalkan_sekolah" value="{{ $siswa->alasan_meninggalkan_sekolah }}">
                </div>
            </div>

            {{-- tamat di sekolah ini --}}
            <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">H.  Tamat di Sekolah ini</div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <label class="label-input" for="nomor_ijazah_smk">
                        Nomor Ijazah
                    </label>
                    <input class="input-data" id="nomor_ijazah_smk" type="text" name="nomor_ijazah_smk" value="{{ $siswa->no_ijazah_smk }}">
                </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <label class="label-input" for="tanggal_ijazah_smk">
                        Tanggal Ijazah
                    </label>
                    <input class="input-data" id="tanggal_ijazah_smk" type="date" name="tanggal_ijazah_smk" value="{{ $siswa->tgl_ijazah_smk }}">
                </div>
            </div>
            {{-- keterangan lain2 --}}
            <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">I.  Keterangan Lain-lain</div>
            <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
                <div class="tw-w-full tw-px-3">
                    <textarea class="input-data" id="keterangan_lain" type="text" name="keterangan_lain">{{ $siswa->keterangan_lain }}</textarea>
                </div>
            </div>
            {{-- rekap nilai --}}
            <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-8 tw-text-sims-400">J. Rekap Nilai</div>
            <div class="tw-flex tw-flex-col">
                <a href="/rekap-nilai" class="tw-py-2 tw-border tw-w-fit tw-border-gray-600 tw-px-6 hover:tw-text-sims-400 tw-text-gray-600 tw-rounded-md tw-bg-white tw-font-medium">View & Edit</a>
                <button type="submit" class="tw-bg-[#1D6F42] tw-w-fit tw-mt-4 tw-font-medium tw-text-white tw-py-3 tw-px-5 tw-rounded-lg">Upload dari excel</button>
            </div>
            <div class="tw-mx-auto tw-text-center tw-mt-10">
                <button type="submit" class="tw-bg-sims-400 tw-font-medium tw-text-white tw-py-3 tw-px-6 tw-rounded-lg">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

@endif
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
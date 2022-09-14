@extends('layouts.main')

@section('content')
<div class="container">
  <div class="tw-flex tw-flex-col tw-rounded-[35px] tw-bg-white tw-w-4/5 tw-p-8 tw-h-full tw-mx-auto tw-my-14 tw-shadow-lg">
    <a href="/detail" class="tw-text-sims tw-text-3xl"><i class="fa-solid fa-chevron-left"></i></a>
    <h3 class="tw-font-pop tw-font-semibold tw-mt-6 tw-text-sims tw-text-center">Tambah Data Siswa</h3>
    
    <form class="tw-w-full tw-mx-24 tw-my-10 tw-max-w-3xl tw-font-pop">
      {{-- biodata --}}
      <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-7 tw-text-sims">A.  Biodata Peserta Didik</div>
      <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
        <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
          <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nis">
            NIS
          </label>
          <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nis" name="nis" type="number">
        </div>
        <div class="tw-w-full md:tw-w-1/2 tw-px-3">
          <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nisn">
            NISN
          </label>
          <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nisn" name="nisn" type="number">
        </div>
      </div>
      <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
        <div class="tw-w-full tw-px-3">
          <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
            Nama Peserta Didik
          </label>
          <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="text" name="nama">
        </div>
      </div>
      <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
        <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
          <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="tmplahir">
            Tempat Lahir
          </label>
          <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="tmplahir" type="text">
        </div>
        <div class="tw-w-full md:tw-w-1/2 tw-px-3">
          <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="tgllahir">
            Tanggal Lahir
          </label>
          <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="tgllahir" type="date" placeholder="dd/mm/yyyy">
        </div>
      </div>
      <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
        <div class="tw-w-full tw-px-3">
          <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
            Agama
          </label>
          <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="text" name="nama">
        </div>
      </div>
      <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
        <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
          <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="grid-last-name">
            Anak-Ke
          </label>
          <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-last-name" type="number" placeholder="Doe">
        </div>
        <div class="tw-w-full md:tw-w-1/2 tw-px-3">
          <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="grid-last-name">
            Jenis Kelamin
          </label>
          <select class="tw-block tw-appearance-none tw-w-full tw-bg-gray-200 tw-border tw-border-gray-200 tw-text-gray-500 tw-py-3 tw-px-4 tw-pr-8 tw-rounded-xl tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-state">
            <option>Pilih</option>
            <option value="">Missouri</option>
            <option value="">Missouri</option>
          </select>
          <div class="tw-pointer-events-none tw-absolute tw-inset-y-0 tw-right-0 tw-flex tw-items-center tw-px-2 tw-text-gray-500">
            <svg class="tw-fill-current tw-h-4 tw-w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
          </div>
        </div>
      </div>
      <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
        <div class="tw-w-full tw-px-3">
          <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
            Status dalam keluarga
          </label>
          <select class="tw-block tw-appearance-none tw-w-full tw-bg-gray-200 tw-border tw-border-gray-200 tw-text-gray-500 tw-py-3 tw-px-4 tw-pr-8 tw-rounded-xl tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-state">
            <option>Pilih</option>
            <option value="">Missouri</option>
            <option value="">Missouri</option>
          </select>
          <div class="tw-pointer-events-none tw-absolute tw-inset-y-0 tw-right-0 tw-flex tw-items-center tw-px-2 tw-text-gray-500">
            <svg class="tw-fill-current tw-h-4 tw-w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
          </div>
        </div>
      </div>
      <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
        <div class="tw-w-full tw-px-3">
          <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
            Alamat Peserta Didik
          </label>
          <textarea class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="text" name="nama"></textarea>
        </div>
      </div>
      <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
        <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
          <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="grid-last-name">
            No. HP
          </label>
          <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-last-name" type="number">
        </div>
        <div class="tw-w-full md:tw-w-1/2 tw-px-3">
          <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="grid-last-name">
            Alamat Email
          </label>
          <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-last-name" type="email">
        </div>
      </div>

      {{-- section B, Diterima di sekolah ini --}}
    <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-7 tw-text-sims">B.  Diterima di sekolah ini</div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
          Di kelas
        </label>
        <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="text" name="nama">
      </div>
    </div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
          Pada Tanggal
        </label>
        <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="date" name="nama">
      </div>
    </div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
          Semester
        </label>
        <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="text" name="nama">
      </div>
    </div>

    {{-- sekolah asal --}}
    <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-7 tw-text-sims">C.  Sekolah Asal</div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
          Nama
        </label>
        <textarea class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="text" name="nama"></textarea>
      </div>
    </div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
          Alamat
        </label>
        <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="text" name="nama">
      </div>
    </div>

    {{-- ijazah smp --}}
    <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-7 tw-text-sims">D.  Ijazah SMP/MTs</div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="grid-last-name">
          Tahun
        </label>
        <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-last-name" type="date">
      </div>
      <div class="tw-w-full md:tw-w-1/2 tw-px-3">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="grid-last-name">
          Nomor
        </label>
        <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-last-name" type="number">
      </div>
    </div>

    {{-- skhun smp --}}
    <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-7 tw-text-sims">E.  SKHUN SMP/MTs</div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="grid-last-name">
          Tahun
        </label>
        <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-last-name" type="date">
      </div>
      <div class="tw-w-full md:tw-w-1/2 tw-px-3">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="grid-last-name">
          Nomor
        </label>
        <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-last-name" type="number">
      </div>
    </div>

    {{-- data orang tua --}}
    <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-7 tw-text-sims">F.  Data Orang Tua</div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
          Ayah
        </label>
        <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="text" name="nama">
      </div>
    </div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
          Ibu
        </label>
        <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="text" name="nama">
      </div>
    </div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
          Alamat Orang Tua
        </label>
        <textarea class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="text" name="nama"></textarea>
      </div>
    </div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full md:tw-w-1/2 tw-px-3 tw-mb-6 md:tw-mb-0">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="grid-last-name">
          No.Telp/HP
        </label>
        <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-last-name" type="number">
      </div>
      <div class="tw-w-full md:tw-w-1/2 tw-px-3">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="grid-last-name">
          Email
        </label>
        <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="grid-last-name" type="email">
      </div>
    </div>

    {{-- data wali --}}
    <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-7 tw-text-sims">G.  Data Wali</div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
          Nama Wali
        </label>
        <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="text" name="nama">
      </div>
    </div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
          Alamat
        </label>
        <textarea class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="text" name="nama"></textarea>
      </div>
    </div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
          No. Telp/HP
        </label>
        <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="number" name="nama">
      </div>
    </div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
          Pekerjaan Wali
        </label>
        <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="text" name="nama">
      </div>
    </div>

    {{-- meninggalkan sekolah --}}
    <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-7 tw-text-sims">H.  Meninggalkan Sekolah</div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
          Tanggal
        </label>
        <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="date" name="nama">
      </div>
    </div>
    <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
      <div class="tw-w-full tw-px-3">
        <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
          Alasan
        </label>
        <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="text" name="nama">
      </div>
    </div>

        {{-- tamat di sekolah ini --}}
        <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-7 tw-text-sims">I.  Tamat di Sekolah ini</div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
              Nomor Ijazah
            </label>
            <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="number" name="nama">
          </div>
        </div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <label class="tw-block tw-uppercase tw-tracking-wide tw-text-gray-500 tw-text-sm tw-font-bold tw-mb-2" for="nama">
              Tanggal Ijazah
            </label>
            <input class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="date" name="nama">
          </div>
        </div>

        {{-- keterangan lain2 --}}
        <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-7 tw-text-sims">J.  Keterangan Lain-lain</div>
        <div class="tw-flex tw-flex-wrap tw--mx-3 tw-mb-6">
          <div class="tw-w-full tw-px-3">
            <textarea class="tw-appearance-none tw-block tw-w-full tw-bg-gray-200 tw-text-gray-500 tw-border tw-border-gray-200 tw-rounded-xl tw-py-3 tw-px-4 tw-mb-3 tw-leading-tight focus:tw-outline-none focus:tw-bg-white focus:tw-border-gray-500" id="nama" type="text" name="nama"></textarea>
          </div>
        </div>

        {{-- rekap nilai --}}
        <div class="tw-font-pop tw-text-2xl tw-font-semibold tw-my-7 tw-text-sims">Rekap Nilai</div>
        <button type="submit" class="tw-bg-[#1D6F42] tw-font-medium tw-text-white tw-py-3 tw-px-5 tw-rounded-lg">Upload dari excel</button>

        <div class="tw-mx-auto tw-text-center tw-mt-10">
        <button type="submit" class="tw-bg-sims tw-font-medium tw-text-white tw-py-3 tw-px-6 tw-rounded-lg">Upload Data</button>
        </div>
    </form>
  </div>
</div>
@endsection
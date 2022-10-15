@extends('layouts.admin')

@section('content')
<div class="tw-mx-10 tw-w-screen tw-h-screen">
  <div class="tw-flex tw-flex-col tw-mt-8 tw-gap-8">

    {{-- title --}}
    <section class="tw-flex tw-items-center">
      <a href="/add-mutasi-keluar">
        <i class="fa-solid fa-chevron-left tw-text-gray-400 tw-text-2xl"></i>
      </a>
      <i class="fa-solid fa-user tw-text-admin-300 tw-text-3xl tw-ml-5"></i>
      <div class="tw-text-2xl tw-ml-4 tw-font-pop tw-font-semibold tw-text-gray-300">Edit Data Mutasi</div>
    </section>

    {{-- card form add data --}}
    <form action="" method="POST">
      @csrf
    <section class="tw-bg-white tw-rounded-xl tw-border-b-[17px] tw-border-admin-300 tw-py-20 tw-pl-10 tw-font-pop shadow-cs">
      <div class="tw-flex tw-w-full tw-items-center">
        {{-- @if()
        <img src="" alt="Pas Foto" srcset="" class="tw-rounded-xl tw-mb-10 tw-w-48 tw-h-52 tw-border tw-border-slate-400 tw-mx-auto md:tw-mt-20 sm:tw-mt-10">
        @else --}}
        {{-- <div class="tw-flex tw-flex-col">
          <div class="tw-bg-admin-300 tw-p-2 tw-rounded-2xl tw-text-white tw-w-60 tw-h-56 tw-items-center tw-flex tw-justify-center"><i class="fa-solid fa-user tw-text-9xl"></i></div>
          <div x-data="{}" class="tw-flex tw-justify-end">
            <a href="#" @click="show=true" class="tw-bg-[#5A6C7C] -tw-mt-9 -tw-mr-4 tw-absolute tw-float-right  tw-text-white tw-py-2 tw-px-4 tw-rounded-xl"><i class="fa-solid fa-file-image tw-text-2xl"></i></a>
          </div>
        </div> --}}
        {{-- @endif --}}
          <div class="md:tw-px-24 sm:tw-px-5 tw-w-full">
            <div class="tw-flex tw-flex-wrap tw-justify-between tw-w-full tw-mb-6">
              <div class="md:tw-w-1/2 sm:tw-w-full tw-pr-10 tw-mb-6 md:tw-mb-0 tw-font-ubuntu">
                <label class="tw-text-admin-300 tw-font-bold tw-ml-3 tw-text-lg" for="nama">
                  Nama
                </label>
                <input value="" class="input-account" id="nama" name="nama" type="text" required>
              </div>
              <div class="md:tw-w-1/2 sm:tw-w-full tw-px-3 tw-mb-6 md:tw-mb-0 tw-font-ubuntu">
                <label class="tw-text-admin-300 tw-font-bold tw-ml-3 tw-text-lg" for="tgl_keluar">
                  Tanggal Keluar
                </label>
                <input value="" class="input-account" id="tgl_keluar" name="tgl_keluar" type="date" required>
              </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw-justify-between tw-w-full tw-mb-6">
              <div class="md:tw-w-1/2 sm:tw-w-full tw-pr-10 tw-mb-6 md:tw-mb-0 tw-font-ubuntu tw-text-lg">
                <label class="tw-text-admin-300 tw-font-bold tw-ml-3" for="nis_siswa">
                  Nomor Induk
                </label>
                <input value="" class="input-account" id="nis_siswa" name="nis_siswa" type="number" required>
              </div>
              <div class="md:tw-w-1/2 sm:tw-w-full tw-px-3 tw-mb-6 md:tw-mb-0 tw-font-ubuntu">
                <label class="tw-text-admin-300 tw-font-bold tw-ml-3 tw-text-lg" for="sk_mutasi">
                  SK Mutasi
                </label>
                <input value="" class="input-account" id="sk_mutasi" name="sk_mutasi" type="text" required>
              </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw-justify-between tw-w-full tw-mb-6">
              <div class="md:tw-w-1/2 sm:tw-w-full tw-pr-10 tw-mb-6 md:tw-mb-0 tw-font-ubuntu tw-text-lg">
                <label class="tw-text-admin-300 tw-font-bold tw-ml-3 tw-text-lg" for="gender">
                  Gender
                </label>
                <select value="" class="input-account" id="gender" name="gender" required>
                  <option value="1">Perempuan</option>
                  <option value="2">Laki-laki</option>
                </select>
              </div>
              <div class="md:tw-w-1/2 sm:tw-w-full tw-px-3 tw-mb-6 md:tw-mb-0 tw-font-ubuntu">
                <label class="tw-text-admin-300 tw-font-bold tw-ml-3 tw-text-lg" for="alasan">
                  Alasan
                </label>
                <input value="" class="input-account" id="alasan" name="alasan" type="text" required>
              </div>
            </div>
            <div class="md:tw-w-1/2 sm:tw-w-full tw-pr-10 tw-mb-6 md:tw-mb-0 tw-font-ubuntu">
              <label class="tw-text-admin-300 tw-font-bold tw-ml-3 tw-text-lg" for="id_kelas">
                Keluar di Kelas
              </label>
              <input value="" class="input-account" id="keluar_di_kelas" name="id_kelas" type="text" required>
            </div>
          </div>
        </div>
      </section>
      <div class="tw-float-right tw-flex tw-justify-end tw-mt-12">
        <button type="submit" class="tw-bg-[#90C2C2] hover:tw-bg-sims-400 tw-mr-8 tw-py-5 tw-px-16 tw-text-white tw-font-ubuntu tw-rounded-lg">Save Changes</button>
      </div>
    </form>
    
  </div>
</div>
@endsection
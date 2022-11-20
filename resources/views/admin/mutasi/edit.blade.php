@extends('layouts.admin')

@section('content')
<div class="tw-mx-10 tw-w-screen tw-h-screen">
  <div class="tw-flex tw-flex-col tw-mt-8 tw-gap-8">

    {{-- title --}}
    <section class="tw-flex tw-items-center">
      <a href="/admin/detail-mutasi">
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
                  Tanggal Mutasi
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
            <div class="tw-flex tw-flex-wrap tw-justify-between tw-w-full tw-mb-6">
              <div class="md:tw-w-1/2 sm:tw-w-full tw-pr-10 tw-mb-6 md:tw-mb-0 tw-font-ubuntu tw-text-lg">
                <label class="tw-text-admin-300 tw-font-bold tw-ml-3" for="pindah_dari">
                  Pindah dari
                </label>
                <input value="" class="input-account" id="pindah_dari" name="pindah_dari" type="text" required>
              </div>
              <div class="md:tw-w-1/2 sm:tw-w-full tw-px-3 tw-mb-6 md:tw-mb-0 tw-font-ubuntu">
                <label class="tw-text-admin-300 tw-font-bold tw-ml-3 tw-text-lg" for="diterima_di_kelas">
                  Diterima di Kelas
                </label>
                <input value="" class="input-account" id="diterima_di_kelas" name="diterima_di_kelas" type="text" required>
              </div>
            </div>
            <div class="md:tw-w-1/2 sm:tw-w-full tw-pr-10 tw-mb-6 md:tw-mb-0 tw-font-ubuntu">
              <label class="tw-text-admin-300 tw-font-bold tw-ml-3 tw-text-lg" for="keluar_di_kelas">
                Keluar di Kelas
              </label>
              <input value="" class="input-account" id="keluar_di_kelas" name="keluar_di_kelas" type="text" required>
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
@extends('layouts.admin')

@section('content')
<div class="tw-mx-10 tw-w-screen tw-h-screen">
  <div class="tw-flex tw-flex-col tw-mt-8 tw-gap-8">

    {{-- title --}}
    <section class="tw-flex tw-items-center">
      <a href="/data-mutasi">
        <i class="fa-solid fa-chevron-left tw-text-gray-400 tw-text-2xl"></i>
      </a>
      <i class="fa-solid fa-user tw-text-oren-400 tw-text-3xl tw-ml-5"></i>
      <div class="tw-text-2xl tw-ml-4 tw-font-pop tw-font-semibold tw-text-gray-300">Detail Siswa Masuk</div>
    </section>
    
    {{-- detail mutasi card --}}
    <section class="tw-bg-white tw-flex tw-rounded-xl tw-w-full tw-h-full shadow-cs">
      <i class="fa-solid fa-user tw-text-9xl tw-text-white tw-rounded-l-xl tw-h-full tw-m-0 tw-bg-[#5A6C7C] tw-p-20"></i>
      <div class="tw-w-full tw-font-ubuntu tw-font-bold tw-justify-center tw-flex tw-flex-col tw-pl-20">
        <h1 class="tw-text-oren-400 tw-font-pop tw-text-3xl">Ibnu Asep Bin Budi</h2>
        <h3 class="tw-text-silver-400 tw-pt-5">Nomor Induk : <span class="tw-font-medium">2009381728</span></h3>
        <h3 class="tw-text-silver-400 tw-pt-2">Gender : <span class="tw-font-medium">Laki-laki</span></h3>
        <h3 class="tw-text-silver-400 tw-pt-2">Diterima di kelas : <span class="tw-font-medium">XI RPL 2</span></h3>
        <div class="tw-flex tw-justify-end tw-text-oren-300 -tw-mb-10 tw-pt-3">
          <h3 class="tw-mr-8">Tanggal Masuk<br> <span class="tw-font-medium">September 2023</span></h3>
        </div>
      </div>
    </section>

    {{-- more information, history, and action --}}
    <section class="tw-bg-white tw-rounded-xl tw-w-full shadow-cs tw-py-5 tw-px-8">
      <div class="tw-flex tw-w-3/5 tw-justify-between tw-text-xl tw-text-silver-400 tw-font-bold tw-font-pop">
        <h3>Alasan Kepindahan:<br> <span class="tw-font-normal tw-font-ubuntu">Pindah Agama</span></h3>
        <h3>Pindah dari:<br> <span class="tw-font-normal tw-font-ubuntu">SMK BPK Penabur</span></h3>
      </div>
      <div class="tw-flex tw-justify-between tw-pt-16">
        <div class="tw-text-oren-400 tw-font-pop tw-font-bold">
          <h3>Created : <span class="tw-font-medium">12 February 2023</span></h3>
          <h3 class="tw-pt-2">Updated : <span class="tw-font-medium"> 12 February 2023</span></h3>
        </div>
        <div class="tw-flex tw-gap-5">
          <a href="" class="tw-bg-salmon-400 hover:tw-bg-salmon-300 tw-text-white tw-font-ubuntu tw-py-4 tw-text-sm tw-px-8 tw-rounded-lg tw-h-fit tw-items-center tw-flex">Delete Data Mutasi</a>
          <a href="" class="tw-bg-warning-300 hover:tw-bg-warning-400 tw-text-white tw-font-ubuntu tw-py-4 tw-text-sm tw-px-8 tw-rounded-lg tw-h-fit tw-items-center tw-flex">Edit Detail Mutasi</a>
        </div>
      </div>
    </section>

  </div>
</div>
@endsection
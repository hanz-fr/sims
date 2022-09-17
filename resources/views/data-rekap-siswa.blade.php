@extends('layouts.main')

@section('content')
<div class="container">
    <div class="tw-flex tw-flex-row tw-gap-8 tw-mt-8">
      <div class="tw-bg-white tw-rounded-xl tw-flex tw-flex-col tw-p-14 tw-shadow-lg tw-font-pop tw-w-1/3">
        <div class="tw-flex tw-flex-row tw-mx-auto tw-text-sims">
          <div class="tw-text-4xl"><i class="fa-solid fa-user-group"></i></div>
          <div class="tw-text-xl my-auto tw-ml-3 tw-font-bold">Siswa</div>
        </div>
        <div class="tw-flex tw-flex-row">
          <div class="tw-flex tw-flex-col tw-text-sims tw-gap-3 tw-mt-8 tw-w-2/3">
            <div class="tw-text-base my-auto tw-font-normal tw-text-gray-500">Masuk Sekolah (Pindahan)</div>
            <div class="tw-text-base my-auto tw-font-normal tw-text-gray-500">Keluar Sekolah</div>
            <div class="tw-text-base my-auto tw-font-normal tw-text-gray-500">Siswa Tidak Naik Kelas</div>
            <div class="tw-text-base my-auto tw-font-normal tw-text-gray-500">Jumlah Siswa</div>
          </div>
          <div class="tw-flex tw-flex-col tw-text-sims tw-gap-3 tw-mt-8 tw-w-1/2 tw-ml-10">
            <div class="tw-text-base my-auto tw-font-bold">16</div>
            <div class="tw-text-base my-auto tw-font-bold tw-text-sims">5</div>
            <div class="tw-text-base my-auto tw-font-bold tw-text-sims">2</div>
            <div class="tw-text-base my-auto tw-font-bold tw-text-sims">1523</div>
          </div>
        </div>
      </div>
      <div class="tw-bg-white tw-grow tw-rounded-xl tw-p-10 tw-shadow-lg tw-font-pop tw-w-full">
      </div>
    </div>
    <div class="tw-gap-8 tw-flex tw-flex-row tw-mt-8">
      <div class="tw-bg-white tw-grow tw-rounded-xl tw-p-10 tw-shadow-lg tw-font-pop tw-w-1/2">
      </div>
      <div class="tw-bg-white tw-grow tw-rounded-xl tw-p-10 tw-shadow-lg tw-font-pop tw-w-1/2">
      </div>
    </div>
    <div class="tw-flex tw-flex-row tw-gap-8 tw-mt-8">
      <div class="tw-bg-white tw-grow tw-rounded-xl tw-p-10 tw-shadow-lg tw-font-pop tw-w-full">
      </div>
      <div class="tw-bg-white tw-rounded-xl tw-p-14 tw-shadow-lg tw-font-pop tw-w-2/3">
        <div class="tw-text-sims tw-text-center">
          <div class="tw-text-xl my-auto tw-ml-3 tw-font-bold tw-text-gray-500">Quick Access</div>
        </div>
        <div class="tw-grid tw-grid-cols-2 tw-gap-8 tw-mt-8 tw-px-8">
          <a href="#" class="tw-group">
            <div class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-px-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims tw-transition-all tw-duration-300">
              <div class="tw-text-4xl tw-text-sims group-hover:tw-text-white"><i class="fa-solid fa-graduation-cap"></i></div>
              <div class="tw-text-sm tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Siswa Masuk</div>
            </div>
          </a>
          <a href="#" class="tw-group">
            <div class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-px-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims tw-transition-all tw-duration-300">
              <div class="tw-text-4xl tw-text-sims group-hover:tw-text-white"><i class="fa-regular fa-book-open"></i></div>
              <div class="tw-text-sm tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Induk Siswa</div>
            </div>
          </a>
          <a href="#" class="tw-group">
            <div class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-px-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims tw-transition-all tw-duration-300">
              <div class="tw-text-4xl tw-text-sims group-hover:tw-text-white"><i class="fa-solid fa-clipboard-list"></i></div>
              <div class="tw-text-sm tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Siswa Tidak Naik Kelas</div>
            </div>
          </a>
          <a href="#" class="tw-group">
            <div class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-px-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims tw-transition-all tw-duration-300">
              <div class="tw-text-4xl tw-text-sims group-hover:tw-text-white"><i class="fa-solid fa-user-group"></i></div>
              <div class="tw-text-sm tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Perpindahan</div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
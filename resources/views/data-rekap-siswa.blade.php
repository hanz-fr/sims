@extends('layouts.main')

@section('content')
<div class="container">
  <div class="tw-flex tw-mt-10">
    <div class="tw-flex tw-flex-row tw-gap-8">
      <div class="tw-bg-white tw-rounded-xl tw-p-14 tw-shadow-lg tw-font-pop tw-w-2/3">
        <div class="tw-flex tw-flex-row tw-text-sims">
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
            <div class="tw-text-base my-auto tw-font-bold tw-text-sims ">16</div>
            <div class="tw-text-base my-auto tw-font-bold tw-text-sims ">5</div>
            <div class="tw-text-base my-auto tw-font-bold tw-text-sims ">2</div>
            <div class="tw-text-base my-auto tw-font-bold tw-text-sims ">1523</div>
          </div>
        </div>
      </div>
      <div class="tw-bg-white tw-rounded-xl tw-p-10 tw-shadow-lg tw-font-pop tw-w-1/2 tw-h-full">
      </div>
    </div>
  </div>
</div>
@endsection
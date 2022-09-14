@extends('layouts.main')

@section('content')
<div class="tw-mx-8">
  <div class="tw-flex">
    {{-- card jumlah --}}
    <div class="tw-flex tw-flex-col">
      <div class="tw-float-right tw-mt-3">
        <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-chevron-right"></i></a>
        <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-chevron-left"></i></a>
      </div>
      <ul class="list-unstyled grid-rows-3 tw-grid-flow-col tw-justify-between tw-flex tw-mt-3">
        <li>
          <div class="tw-columns-1 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
            <div class="tw-float-right">
              <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
            <div class="tw-px-12">
              <div class="tw-flex tw-flex-row">
                <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">659</div>
              </div>
            </div>
            <div class="tw-px-11 tw-pb-6">
              <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Siswa yang keluar</div>
            </div>
          </div>
        </li>
        <li>
          <div class="tw-columns-2 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
            <div class="tw-float-right">
              <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
            <div class="tw-px-12">
              <div class="tw-flex tw-flex-row">
                <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">659</div>
              </div>
            </div>
            <div class="tw-px-11 tw-pb-6">
              <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Rekap Jumlah Siswa</div>
            </div>
          </div>
        </li>
        <li>
          <div class="tw-columns-3 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
            <div class="tw-float-right">
              <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
            <div class="tw-px-12">
              <div class="tw-flex tw-flex-row">
                <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">659</div>
              </div>
            </div>
            <div class="tw-px-11 tw-pb-6">
              <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Siswa yang masuk</div>
            </div>
          </div>
        </li>
      </ul>
      <div class="tw-bg-white tw-shadow-md tw-h-96 tw-w-full">
        <div class="tw-px-10 tw-font-pop tw-pt-7">
          <div class="tw-text-sm tw-text-gray-400 tw-font-bold">Data Jumlah Siswa SMKN 11</div>
        </div>
      </div>
      <div class="tw-bg-white tw-font-pop tw-shadow-md tw-w-full tw-flex tw-h-52 tw-mt-5 tw-flex-col tw-mb-7">
        <div class="tw-float-right">
          <a href="#" class="tw-text-gray-500 tw-mr-4 hover:tw-text-gray-600 tw-pr-2 tw-mt-2 tw-text-lg tw-float-right"><i class="fa-solid fa-sliders-simple"></i></a>
        </div>
        <div class="tw-px-10">
        <div class="tw-text-sm tw-text-gray-400 tw-font-bold">Kuota Pendaftaran SMKN 11</div>
          <ul class="tw-flex tw-flex-row tw-gap-14 list-unstyled tw-mx-11 tw-mt-10">
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-sims tw-font-bold">18</div>
              <div class="tw-text-base tw-font-light tw-text-gray-400">AKL</div>
            </li>
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-sims tw-font-bold">12</div>
              <div class="tw-text-base tw-font-light tw-text-gray-400">DKV</div>
            </li>
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-sims tw-font-bold">25</div>
              <div class="tw-text-base tw-font-light tw-text-gray-400">MPLB</div>
            </li>
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-sims tw-font-bold">19</div>
              <div class="tw-text-base tw-font-light tw-text-gray-400">Pemasaran</div>
            </li>
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-sims tw-font-bold">12</div>
              <div class="tw-text-base tw-font-light tw-text-gray-400">PPLG</div>
            </li>
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-sims tw-font-bold">6</div>
              <div class="tw-text-base tw-font-light tw-text-gray-400">TJKT</div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="tw-w-1/2 tw-ml-8 tw-mt-7">
      <div class="tw-bg-white tw-shadow-md tw-h-96 tw-w-full">
      </div>
      <div class="tw-bg-white tw-shadow-md tw-border tw-w-full tw-flex tw-h-96 tw-flex-col tw-mb-7">

      </div>
    </div>
  </div>
</div>
@endsection
@extends('layouts.main')

@section('content')
<div class="tw-container">
  <div class="tw-flex">
    {{-- card jumlah --}}
    <div class="tw-flex tw-flex-col tw-ml-8">
      <ul class="list-unstyled grid-rows-3 tw-grid-flow-col tw-gap-4 tw-flex tw-mt-7">
        <li>
          <div class="tw-columns-2 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
            <div class="tw-float-right">
              <a href="#" class="tw-text-sims tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
            <div class="tw-px-12">
              <div class="tw-flex tw-flex-row">
                <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                <div class="tw-text-2xl tw-font-bold tw-text-abu tw-py-3 tw-pl-3">659</div>
              </div>
            </div>
            <div class="tw-px-3 tw-pb-6">
              <div class="tw-text-sm tw-text-abu tw-font-base tw-text-center tw-mt-2">Siswa yang keluar</div>
            </div>
          </div>
        </li>
        <li>
          <div class="tw-columns-2 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
            <div class="tw-float-right">
              <a href="#" class="tw-text-sims tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
            <div class="tw-px-12">
              <div class="tw-flex tw-flex-row">
                <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                <div class="tw-text-2xl tw-font-bold tw-text-abu tw-py-3 tw-pl-3">659</div>
              </div>
            </div>
            <div class="tw-px-3 tw-pb-6">
              <div class="tw-text-sm tw-text-abu tw-font-base tw-text-center tw-mt-2">Rekap Jumlah Siswa</div>
            </div>
          </div>
        </li>
        <li>
          <div class="tw-columns-2 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
            <div class="tw-float-right">
              <a href="#" class="tw-text-sims tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
            <div class="tw-px-12">
              <div class="tw-flex tw-flex-row">
                <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                <div class="tw-text-2xl tw-font-bold tw-text-abu tw-py-3 tw-pl-3">659</div>
              </div>
            </div>
            <div class="tw-px-3 tw-pb-6">
              <div class="tw-text-sm tw-text-abu tw-font-base tw-text-center tw-mt-2">Siswa yang masuk</div>
            </div>
          </div>
        </li>
      </ul>
      <div class="tw-bg-white tw-shadow-md tw-h-96 tw-w-full">
      </div>
      <div class="tw-bg-white tw-shadow-md tw-w-full tw-flex tw-h-52 tw-mt-5 tw-flex-col ">

      </div>
    </div>
    <div class="tw-w-1/2">
    
    </div>
  </div>
</div>
@endsection
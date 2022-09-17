@extends('layouts.main')

@section('content')
<div class="container">
  <div class="tw-flex sm:tw-flex-col md:tw-flex-col lg:tw-flex-row tw-gap-8">
    {{-- card jumlah --}}
    <div class="tw-flex tw-flex-col">
      <div class="tw-float-right tw-mt-3">
        <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-chevron-right"></i></a>
        <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-chevron-left"></i></a>
      </div>
      <ul class="list-unstyled tw-grid-rows-3 tw-gap-4 tw-flex tw-mt-3">
        <li>
          <div class="tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
            <div class="tw-float-right">
              <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
            <div class="tw-px-12">
              <div class="tw-flex tw-flex-row">
                <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">659</div>
              </div>
            </div>
            <div class="tw-pb-6"> 
              <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Siswa yang keluar</div>
            </div>
          </div>
        </li>
        <li>
          <div class="tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
            <div class="tw-float-right">
              <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
            <div class="tw-px-12">
              <div class="tw-flex tw-flex-row">
                <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">659</div>
              </div>
            </div>
            <div class="tw-pb-6">
              <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Jumlah Siswa</div>
            </div>
          </div>
        </li>
        <li>
          <div class="tw-columns-3 tw-flex-grow-0 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
            <div class="tw-float-right">
              <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
            <div class="tw-px-12">
              <div class="tw-flex tw-flex-row">
                <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">659</div>
              </div>
            </div>
            <div class="tw-pb-6">
              <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Siswa yang masuk</div>
            </div>
          </div>
        </li>
      </ul>
      {{-- chart view --}}
      <div class="tw-bg-white tw-shadow-md tw-h-96 tw-w-full">
        <div class="tw-px-10 tw-font-pop tw-pt-7">
          <div class="tw-text-sm tw-text-gray-400 tw-font-bold">Data Jumlah Siswa SMKN 11</div>
          <div>
            <canvas id="myChart" class="tw-mt-4"></canvas>          
          </div>          
        </div>
      </div>
    </div>

    {{-- kuota pendaftar --}}
    <div class="tw-w-1/2 tw-mt-7">
      <div class="tw-bg-white tw-font-pop tw-shadow-md tw-w-full sm:tw-w-fit tw-flex tw-h-56 tw-flex-col">
        <div class="tw-float-right">
          <a href="#" class="tw-text-gray-500 tw-mr-4 hover:tw-text-gray-600 tw-pr-2 tw-mt-2 tw-text-lg tw-float-right"><i class="fa-solid fa-sliders-simple"></i></a>
        </div>
        <div class="tw-px-10">
        <div class="tw-text-sm tw-text-gray-400 tw-font-bold">Kuota Pendaftaran SMKN 11</div>
          <ul class="tw-flex tw-flex-row tw-gap-10 list-unstyled tw-mx-11 tw-mt-10">
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
      {{-- <div class="tw-bg-white tw-shadow-md tw-h-96 tw-w-full">
      </div> --}}
      {{-- quick access --}}
      <div class="tw-bg-white tw-items-center tw-justify-center tw-shadow-md tw-font-pop tw-border tw-mt-6 tw-w-fit sm:tw-px-14 tw-flex tw-h-fit tw-py-12 tw-flex-col">
        <div class="tw-text-xl tw-text-gray-400 tw-font-bold tw-mb-10">Quick Access</div>
          <ul class="tw-flex tw-flex-row grid-rows-3 tw-justify-between tw-gap-3 tw-p-2 list-unstyled">
            <a href="#" class="tw-group">
              <li class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-px-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims tw-transition-all tw-duration-300">
                <div class="tw-text-4xl tw-text-sims group-hover:tw-text-white"><i class="fa-solid fa-graduation-cap"></i></div>
                <div class="tw-text-sm tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Jumlah Siswa</div>
              </li>
            </a>
            <a href="/data-induk-siswa" class="tw-group">
              <li class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-px-4 tw-bg-white tw-rounded-lg group-hover:tw-bg-sims group-hover:tw-text-white tw-transition-all tw-duration-300">
                <div class="tw-text-4xl tw-text-sims group-hover:tw-text-white"><i class="fa-regular fa-book-open"></i></div>
                <div class="tw-text-sm tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Induk Siswa</div>
              </li>
            </a>
            <a href="#" class="tw-group">
              <li class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-px-4 tw-bg-white tw-rounded-lg group-hover:tw-bg-sims group-hover:tw-text-white  tw-transition-all tw-duration-300">
                <div class="tw-text-4xl tw-text-sims group-hover:tw-text-white"><i class="fa-solid fa-user-group"></i></div>
                <div class="tw-text-sm tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Perpindahan</div>
              </li>
            </a>
          </ul>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // chart view dasbrot
const labels = [
  'Jan',
  'Feb',
  'Mar',
  'Apr',
  'May',
];
const data = {
  labels: labels,
  datasets: [{
    label: 'Rekap Jumlah Siswa',
    backgroundColor: '#4D9E9E',
    borderColor: '#4D9E9E',
    data: [800, 450, 500, 300, 200],
  }]
};

const config = {
  type: 'line',
  data: data,
  options: {}
};

const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
@endpush
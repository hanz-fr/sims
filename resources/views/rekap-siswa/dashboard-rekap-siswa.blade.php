@extends('layouts.main-new')

@section('content')
<div class="tw-mx-10">
    <div class="tw-flex lg:tw-flex-row sm:tw-flex-col tw-gap-8 tw-mt-8">
      <div class="tw-bg-white tw-rounded-xl tw-flex tw-flex-col tw-p-14 tw-shadow-lg lg:tw-w-1/4 tw-w-full">
        <div class="tw-flex tw-mx-auto tw-justify-center tw-items-center tw-text-sims-new-500">
          <div class="tw-text-4xl"><i class="fa-solid fa-user-group"></i></div>
          <div class="sims-heading-xl tw-ml-3">Siswa</div>
        </div>
        <div class="tw-flex tw-flex-col tw-my-auto">
          <div class="tw-flex tw-justify-between">
            <div class="my-auto sims-text-gray-lg">Masuk Sekolah (Pindahan)</div>
            <div class="sims-heading-lg my-auto">{{ $siswaMasuk }}</div>
          </div>
          <div class="tw-flex tw-justify-between tw-mt-10">
            <div class="sims-text-gray-lg my-auto">Keluar Sekolah</div>
            <div class="my-auto sims-heading-lg">{{ $siswaKeluar }}</div>
          </div>
          <div class="tw-flex tw-justify-between tw-mt-10">
            <div class="sims-text-gray-lg my-auto">Siswa Tidak Naik Kelas</div>
            <div class="my-auto sims-heading-lg">{{ $siswaTdkNaik }}</div>
          </div>
          <div class="tw-flex tw-justify-between tw-mt-10">
            <div class="sims-text-gray-lg my-auto">Jumlah Siswa</div>
            <div class="my-auto sims-heading-lg">{{ $jmlSiswa }}</div>
          </div>
          {{-- <div class="tw-flex tw-flex-col tw-text-sims-new-500 tw-gap-3 tw-mt-8 tw-w-1/2 tw-ml-10">
          </div> --}}
        </div>
      </div>
      <div class="tw-bg-white tw-grow tw-rounded-xl tw-p-10 tw-shadow-lg tw-font-pop tw-w-full">
        <div class="tw-text-base tw-text-gray-400 tw-font-bold tw-mb-3 tw-text-center">Grafik Perpindahan Siswa</div>
        <div class="tw-text-base tw-text-gray-400 tw-font-regular tw-mb-7 tw-text-center">Tahun {{ $current_year }}</div>
        <div class="tw-border tw-p-2">
          <canvas id="myChart" class="tw-mt-4"></canvas>          
        </div>  
      </div>
    </div>

    {{-- Rekap Data Jumlah Siswa --}}
    <div class="tw-flex lg:tw-flex-row sm:tw-flex-col tw-gap-8 tw-my-8">
      <div class="tw-bg-white tw-flex tw-flex-col tw-rounded-xl tw-pt-3 tw-pb-12 tw-px-16 tw-shadow-lg tw-font-satoshi tw-w-full">
        @cannot('wali kelas')
        <div class="tw-float-right -tw-mr-8">
          <a href="/rekap-jumlah-siswa" class="tw-text-sims-new-500 hover:tw-text-sims-new-700 tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        @endcannot
        <div class="tw-text-xl tw-text-sims-new-500 tw-font-bold tw-mb-1">Rekap Data Jumlah Siswa</div>
        <div class="tw-text-gray-400 tw-font-normal">Data per tanggal : {{ $current_date }}</div>
        <div class="tw-grid lg:tw-grid-cols-3 md:tw-grid-cols-2 tw-gap-5 sm:tw-grid-cols-1 tw-mt-14">
          <div class="shadow-card tw-bg-white tw-rounded-lg tw-pt-7 tw-pb-10 lg:tw-px-14 tw-px-10 tw-text-center">
            <h2 class="tw-text-gray-500 tw-font-bold tw-text-2xl">KELAS X</h2>
            <h1 class="tw-text-sims-new-500 tw-font-medium tw-text-6xl tw-font-sg tw-pt-6">{{ $jumlahSiswaX }}</h1>
          </div>
          <div class="shadow-card tw-bg-white tw-rounded-lg tw-pt-7 tw-pb-10 lg:tw-px-14 tw-px-10 tw-text-center">
            <h2 class="tw-text-gray-500 tw-font-bold tw-text-2xl">KELAS XI</h2>
            <h1 class="tw-text-sims-new-500 tw-font-medium tw-text-6xl tw-font-sg tw-pt-6">{{ $jumlahSiswaXI }}</h1>
          </div>
          <div class="shadow-card tw-bg-white tw-rounded-lg tw-pt-7 tw-pb-10 lg:tw-px-14 tw-px-10 tw-text-center">
            <h2 class="tw-text-gray-500 tw-font-bold tw-text-2xl">KELAS XII</h2>
            <h1 class="tw-text-sims-new-500 tw-font-medium tw-text-6xl tw-font-sg tw-pt-6">{{ $jumlahSiswaXII }}</h1>
          </div>
        </div>
      </div>

      {{-- Quick Access --}}
      <div class="tw-bg-white tw-rounded-xl tw-p-14 tw-shadow-lg tw-flex tw-flex-col tw-items-center tw-justify-center tw-font-satoshi lg:tw-w-3/4 tw-w-full">
        <div class="tw-text-sims-new-500 tw-text-center">
          <div class="tw-text-xl my-auto tw-ml-3 tw-font-bold tw-text-gray-500">Quick Access</div>
        </div>
        <div class="tw-grid tw-grid-cols-2 tw-gap-8 tw-mt-8 tw-items-center tw-justify-center">
          @can('rekap-siswa')
          <a href="/siswa-masuk" class="tw-group">
            <div class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims-new-500 tw-transition-all tw-duration-300">
              <div class="tw-text-2xl tw-text-sims-new-500 group-hover:tw-text-white"><i class="fa-solid fa-graduation-cap"></i></div>
              <div class="tw-text-base tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Mutasi Masuk</div>
            </div>
          </a>
          @endcan

          @can('rekap-siswa')
          <a href="/siswa-keluar" class="tw-group">
            <div class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims-new-500 tw-transition-all tw-duration-300">
              <div class="tw-text-2xl tw-text-sims-new-500 group-hover:tw-text-white"><i class="fa-solid fa-user-group"></i></div>
              <div class="tw-text-base tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Mutasi Keluar</div>
            </div>
          </a>
          @endcan

          <a href="/data-induk-siswa" class="tw-group">
            <div class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims-new-500 tw-transition-all tw-duration-300">
              <div class="tw-text-2xl tw-text-sims-new-500 group-hover:tw-text-white"><i class="fa-regular fa-book-open"></i></div>
              <div class="tw-text-base tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Induk Siswa</div>
            </div>
          </a>
          @cannot('wali kelas')
          <a href="/data-tidak-naik" class="tw-group">
            <div class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims-new-500 tw-transition-all tw-duration-300">
              <div class="tw-text-2xl tw-text-sims-new-500 group-hover:tw-text-white"><i class="fa-solid fa-clipboard-list"></i></div>
              <div class="tw-text-base tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white tw-px-2">Data Siswa Tidak Naik Kelas</div>
            </div>
          </a>
          @endcannot

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
  'Januari',
  'Februari',
  'Maret',
  'April',
  'Mei',
  'Juni',
  'Juli',
  'Agustus',
  'September',
  'Oktober',
  'November',
  'Desember',
];
const data = {
  labels: labels,
  datasets: [{
    label: 'Siswa Masuk',
    backgroundColor: '#47B2E0',
    borderColor: '#47B2E0',
    data: [
      {{ $siswaMasukJan }},
      {{ $siswaMasukFeb }},
      {{ $siswaMasukMar }},
      {{ $siswaMasukApr }},
      {{ $siswaMasukMei }},
      {{ $siswaMasukJun }},
      {{ $siswaMasukJul }},
      {{ $siswaMasukAgu }},
      {{ $siswaMasukSep }},
      {{ $siswaMasukOkt }},
      {{ $siswaMasukNov }},
      {{ $siswaMasukDes }},
    ],
  }, {
    label: 'Siswa Keluar',
    backgroundColor: '#DC98AC',
    borderColor: '#DC98AC',
    data: [
      {{ $siswaKeluarJan }},
      {{ $siswaKeluarFeb }},
      {{ $siswaKeluarMar }},
      {{ $siswaKeluarApr }},
      {{ $siswaKeluarMei }},
      {{ $siswaKeluarJun }},
      {{ $siswaKeluarJul }},
      {{ $siswaKeluarAgu }},
      {{ $siswaKeluarSep }},
      {{ $siswaKeluarOkt }},
      {{ $siswaKeluarNov }},
      {{ $siswaKeluarDes }},
    ],
  }]
};

const config = {
  type: 'line',
  data: data,
  options: {
    scale: {
      ticks: {
          precision: 0,
          beginAtZero: true,
      }
    }
  }
};

const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
@endpush
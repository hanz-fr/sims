@extends('layouts.main')

@section('content')
<div class="tw-mx-10">
    <div class="tw-flex tw-gap-8 tw-mt-8">
      <div class="tw-bg-white tw-rounded-xl tw-flex tw-flex-col tw-p-14 tw-shadow-lg tw-font-pop tw-w-1/4">
        <div class="tw-flex  tw-mx-auto tw-text-sims-400">
          <div class="tw-text-4xl"><i class="fa-solid fa-user-group"></i></div>
          <div class="tw-text-xl my-auto tw-ml-3 tw-font-bold">Siswa</div>
        </div>
        <div class="tw-flex tw-flex-col tw-my-auto">
          <div class="tw-flex tw-justify-between">
            <div class="tw-text-lg my-auto tw-font-normal tw-text-gray-500">Masuk Sekolah (Pindahan)</div>
            <div class="tw-text-base my-auto tw-font-bold tw-text-sims-400">{{ $siswaMasuk }}</div>
          </div>
          <div class="tw-flex tw-justify-between tw-mt-10">
            <div class="tw-text-lg my-auto tw-font-normal tw-text-gray-500">Keluar Sekolah</div>
            <div class="tw-text-base my-auto tw-font-bold tw-text-sims-400">{{ $siswaKeluar }}</div>
          </div>
          <div class="tw-flex tw-justify-between tw-mt-10">
            <div class="tw-text-lg my-auto tw-font-normal tw-text-gray-500">Siswa Tidak Naik Kelas</div>
            <div class="tw-text-base my-auto tw-font-bold tw-text-sims-400">{{ $siswaTdkNaik }}</div>
          </div>
          <div class="tw-flex tw-justify-between tw-mt-10">
            <div class="tw-text-base my-auto tw-font-normal tw-text-gray-500">Jumlah Siswa</div>
            <div class="tw-text-base my-auto tw-font-bold tw-text-sims-400">{{ $jmlSiswa }}</div>
          </div>
          {{-- <div class="tw-flex tw-flex-col tw-text-sims-400 tw-gap-3 tw-mt-8 tw-w-1/2 tw-ml-10">
          </div> --}}
        </div>
      </div>
      <div class="tw-bg-white tw-grow tw-rounded-xl tw-p-10 tw-shadow-lg tw-font-pop">
        <div class="tw-text-base tw-text-gray-400 tw-font-bold tw-mb-7 tw-text-center">Grafik Perpindahan Siswa</div>
        <div class="tw-border tw-p-2">
          <canvas id="myChart" class="tw-mt-4"></canvas>          
        </div>  
      </div>
    </div>
    {{-- Data Siswa Masuk --}}
    {{-- <div class="tw-gap-8 tw-flex  tw-mt-8">
      <div class="tw-bg-white tw-flex tw-flex-col tw-grow tw-rounded-xl tw-py-3 tw-px-7 tw-shadow-lg tw-font-pop tw-w-1/2">
        <div class="-tw-mr-6">
          <a href="/siswa-masuk" class="tw-text-sims-400 hover:tw-text-sims-600 tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="tw-text-lg tw-text-sims-400 tw-font-bold tw-mb-1 tw-text-center">Data Siswa yang Masuk</div>
        <div class="tw-text-sm tw-text-gray-400 tw-text-center tw-font-normal">Data Juli 2021</div>
        
        <div class="tw-flex tw-justify-between tw-mb-5 tw-mt-7">
          <div class="">
            <a href="#" class="tw-text-sims-400 hover:tw-text-sims-600 tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-sliders-simple"></i></a>
          </div>
          <div class="tw-relative tw-text-gray-600">
            <input class="tw-bg-gray-100 tw-h-8 tw-px-5 tw-pr-16 tw-rounded-lg tw-text-sm focus:tw-outline-sims-400 focus:tw-bg-white"
              type="search" name="search">
            <button type="submit" class="tw-absolute tw-right-0 tw-top-0 tw-mt-1 tw-mr-4">
              <i class="fa-solid fa-magnifying-glass tw-h-4 tw-w-4 tw-fill-current tw-text-sims-400"></i>
            </button>
          </div>
        </div>
        <table class="tw-w-full tw-text-sm tw-mt-3 tw-text-center">
          <thead class="tw-text-sm tw-text-gray-400 tw-border-b tw-border-gray-500 tw-font-pop">
              <tr class="">
                  <th scope="col" class="tw-py-3 tw-px-6">
                      No
                  </th>
                  <th scope="col" class="tw-py-3 tw-px-6">
                    Nomor Induk
                  </th>
                  <th scope="col" class="tw-py-3 tw-px-6">
                    Nama
                  </th>
                  <th scope="col" class="tw-py-3 tw-px-6">
                    Status
                  </th>
              </tr>
              <tr>
              </tr>
          </thead>
          <tbody class="tw-text-xs text-center">
              <tr class="tw-text-gray-500">
                  <th scope="col" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                    01
                  </th>
                  <td class="tw-py-4 tw-px-6">
                    2006510897
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    Samuel Toni
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    Asesmen
                  </td>
              </tr>
              <tr class="tw-text-gray-500">
                  <th scope="col" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                    02
                  </th>
                  <td class="tw-py-4 tw-px-6">
                    2006510897
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    Asep Slebew
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    Asesmen
                  </td>
              </tr>
              <tr class="tw-text-gray-500">
                  <th scope="col" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                    03
                  </th>
                  <td class="tw-py-4 tw-px-6">
                    2006510897
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    Jonas Budi
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    Proses Kelas
                  </td>
              </tr>
              <tr class="tw-text-gray-500">
                <th scope="col" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                  04
                </th>
                <td class="tw-py-4 tw-px-6">
                  2006510897
                </td>
                <td class="tw-py-4 tw-px-6">
                  Dimas Nugraha
                </td>
                <td class="tw-py-4 tw-px-6">
                  Surat Mutasi
                </td>
              </tr>
              <tr class="tw-text-gray-500">
                <th scope="col" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                  05
                </th>
                <td class="tw-py-4 tw-px-6">
                  2006510897
                </td>
                <td class="tw-py-4 tw-px-6">
                  Rapael Mudasir
                </td>
                <td class="tw-py-4 tw-px-6">
                  Asesmen
                </td>
              </tr>
              <tr class="tw-text-gray-500">
                <th scope="col" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                  06
                </th>
                <td class="tw-py-4 tw-px-6">
                  2006510897
                </td>
                <td class="tw-py-4 tw-px-6">
                  Jonathan Abraham Michael
                </td>
                <td class="tw-py-4 tw-px-6">
                  Masuk Kelas
                </td>
              </tr>
              <tr class="tw-text-gray-500">
                <th scope="col" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                  07
                </th>
                <td class="tw-py-4 tw-px-6">
                  2006510897
                </td>
                <td class="tw-py-4 tw-px-6">
                  Abdul Chad Juan
                </td>
                <td class="tw-py-4 tw-px-6">
                  Proses Kelas
                </td>
              </tr>
              <tr class="tw-text-gray-500">
                <th scope="col" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                  08
                </th>
                <td class="tw-py-4 tw-px-6">
                  2006510897
                </td>
                <td class="tw-py-4 tw-px-6">
                  Xue Huao Piao Piao
                </td>
                <td class="tw-py-4 tw-px-6">
                  Proses Kelas
                </td>
              </tr>
          </tbody>
      </table>
      <div class="tw-mx-auto tw-mt-3 tw-mb-7">
        <a href="#" class="tw-text-sims-400 hover:tw-text-sims-600 tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-chevron-right"></i></a>
        <a href="#" class="tw-text-sims-400 hover:tw-text-sims-600 tw-pr-7 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-chevron-left"></i></a>
      </div>
      </div>
      {{-- Data Siswa Keluar --}}
      {{-- <div class="tw-bg-white tw-flex tw-flex-col tw-grow tw-rounded-xl tw-py-3 tw-px-7 tw-shadow-lg tw-font-pop tw-w-1/2">
        <div class="-tw-mr-6">
          <a href="/siswa-keluar" class="tw-text-sims-400 hover:tw-text-sims-600 tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="tw-text-lg tw-text-sims-400 tw-font-bold tw-mb-1 tw-text-center">Data Siswa yang Keluar</div>
        <div class="tw-text-sm tw-text-gray-400 tw-text-center tw-font-normal">Data Juli 2021</div>
        <div class="tw-flex tw-justify-between tw-mb-5 tw-mt-7">
          <div class="">
            <a href="/siswa-keluar" class="tw-text-sims-400 hover:tw-text-sims-600 tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-sliders-simple"></i></a>
          </div>
          <div class="tw-relative tw-text-gray-600">
            <input class="tw-bg-gray-100 tw-h-8 tw-px-5 tw-pr-16 tw-rounded-lg tw-text-sm focus:tw-outline-sims-400 focus:tw-bg-white"
              type="search" name="search">
            <button type="submit" class="tw-absolute tw-right-0 tw-top-0 tw-mt-1 tw-mr-4">
              <i class="fa-solid fa-magnifying-glass tw-h-4 tw-w-4 tw-fill-current tw-text-sims-400"></i>
            </button>
          </div>
        </div>
        <table class="tw-w-full tw-text-sm tw-mt-3 tw-text-center">
          <thead class="tw-text-sm tw-text-gray-400 tw-border-b tw-border-gray-500 tw-font-pop">
              <tr class="">
                  <th scope="col" class="tw-py-3 tw-px-6">
                      No
                  </th>
                  <th scope="col" class="tw-py-3 tw-px-6">
                    Nomor Induk
                  </th>
                  <th scope="col" class="tw-py-3 tw-px-6">
                    Nama
                  </th>
                  <th scope="col" class="tw-py-3 tw-px-6">
                    Status
                  </th>
              </tr>
              <tr>
              </tr>
          </thead>
          <tbody class="tw-text-xs text-center">
              <tr class="tw-text-gray-500">
                  <th scope="col" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                    01
                  </th>
                  <td class="tw-py-4 tw-px-6">
                    2006510897
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    Samuel Toni
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    Asesmen
                  </td>
              </tr>
              <tr class="tw-text-gray-500">
                  <th scope="col" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                    02
                  </th>
                  <td class="tw-py-4 tw-px-6">
                    2006510897
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    Asep Slebew
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    Asesmen
                  </td>
              </tr>
              <tr class="tw-text-gray-500">
                  <th scope="col" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                    03
                  </th>
                  <td class="tw-py-4 tw-px-6">
                    2006510897
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    Jonas Budi
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    Proses Kelas
                  </td>
              </tr>
              <tr class="tw-text-gray-500">
                <th scope="col" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                  04
                </th>
                <td class="tw-py-4 tw-px-6">
                  2006510897
                </td>
                <td class="tw-py-4 tw-px-6">
                  Dimas Nugraha
                </td>
                <td class="tw-py-4 tw-px-6">
                  Surat Mutasi
                </td>
              </tr>
              <tr class="tw-text-gray-500">
                <th scope="col" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                  05
                </th>
                <td class="tw-py-4 tw-px-6">
                  2006510897
                </td>
                <td class="tw-py-4 tw-px-6">
                  Rapael Mudasir
                </td>
                <td class="tw-py-4 tw-px-6">
                  Asesmen
                </td>
              </tr>
              <tr class="tw-text-gray-500">
                <th scope="col" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                  06
                </th>
                <td class="tw-py-4 tw-px-6">
                  2006510897
                </td>
                <td class="tw-py-4 tw-px-6">
                  Jonathan Abraham Michael
                </td>
                <td class="tw-py-4 tw-px-6">
                  Masuk Kelas
                </td>
              </tr>
              <tr class="tw-text-gray-500">
                <th scope="col" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                  07
                </th>
                <td class="tw-py-4 tw-px-6">
                  2006510897
                </td>
                <td class="tw-py-4 tw-px-6">
                  Abdul Chad Juan
                </td>
                <td class="tw-py-4 tw-px-6">
                  Proses Kelas
                </td>
              </tr>
              <tr class="tw-text-gray-500">
                <th scope="col" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                  08
                </th>
                <td class="tw-py-4 tw-px-6">
                  2006510897
                </td>
                <td class="tw-py-4 tw-px-6">
                  Xue Huao Piao Piao
                </td>
                <td class="tw-py-4 tw-px-6">
                  Proses Kelas
                </td>
              </tr>
          </tbody>
      </table>
      <div class="tw-mx-auto tw-mt-3 tw-mb-7">
        <a href="#" class="tw-text-sims-400 hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-chevron-right"></i></a>
        <a href="#" class="tw-text-sims-400 hover:tw-text-[#428787] tw-pr-7 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-chevron-left"></i></a>
      </div>
      </div>
    </div> --}}

    {{-- Rekap Data Jumlah Siswa --}}
    <div class="tw-flex tw-gap-8 tw-my-8">
      <div class="tw-bg-white tw-flex tw-flex-col tw-rounded-xl tw-pt-3 tw-pb-12 tw-px-16 tw-shadow-lg tw-font-pop tw-w-full">
        <div class="tw-float-right -tw-mr-8">
          <a href="/rekap-jumlah-siswa" class="tw-text-sims-400 hover:tw-text-sims-600 tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="tw-text-xl tw-text-sims-400 tw-font-bold tw-mb-1">Rekap Data Jumlah Siswa</div>
        <div class="tw-text-gray-400 tw-font-normal">Data Juli 2021</div>
        <div class="tw-flex tw-justify-between tw-mt-14">
          <div class="shadow-card tw-bg-white tw-rounded-lg tw-pt-7 tw-pb-10 tw-px-14 tw-text-center">
            <h2 class="tw-text-gray-500 tw-font-bold tw-text-2xl">KELAS X</h2>
            <h1 class="tw-text-sims-400 tw-font-medium tw-text-6xl tw-pt-6">1141</h1>
          </div>
          <div class="shadow-card tw-bg-white tw-rounded-lg tw-pt-7 tw-pb-10 tw-px-14 tw-text-center">
            <h2 class="tw-text-gray-500 tw-font-bold tw-text-2xl">KELAS XI</h2>
            <h1 class="tw-text-sims-400 tw-font-medium tw-text-6xl tw-pt-6">1141</h1>
          </div>
          <div class="shadow-card tw-bg-white tw-rounded-lg tw-pt-7 tw-pb-10 tw-px-14 tw-text-center">
            <h2 class="tw-text-gray-500 tw-font-bold tw-text-2xl">KELAS XII</h2>
            <h1 class="tw-text-sims-400 tw-font-medium tw-text-6xl tw-pt-6">1141</h1>
          </div>
        </div>
      </div>

      {{-- Quick Access --}}
      <div class="tw-bg-white tw-rounded-xl tw-p-14 tw-shadow-lg tw-font-pop tw-w-3/4">
        <div class="tw-text-sims-400 tw-text-center">
          <div class="tw-text-xl my-auto tw-ml-3 tw-font-bold tw-text-gray-500">Quick Access</div>
        </div>
        <div class="tw-grid tw-grid-cols-2 tw-gap-8 tw-mt-8">
          <a href="/siswa-masuk" class="tw-group">
            <div class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims-400 tw-transition-all tw-duration-300">
              <div class="tw-text-2xl tw-text-sims-400 group-hover:tw-text-white"><i class="fa-solid fa-graduation-cap"></i></div>
              <div class="tw-text-base tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Siswa Masuk</div>
            </div>
          </a>
          <a href="/data-induk-siswa" class="tw-group">
            <div class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims-400 tw-transition-all tw-duration-300">
              <div class="tw-text-2xl tw-text-sims-400 group-hover:tw-text-white"><i class="fa-regular fa-book-open"></i></div>
              <div class="tw-text-base tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Induk Siswa</div>
            </div>
          </a>
          <a href="/data-tidak-naik" class="tw-group">
            <div class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims-400 tw-transition-all tw-duration-300">
              <div class="tw-text-2xl tw-text-sims-400 group-hover:tw-text-white"><i class="fa-solid fa-clipboard-list"></i></div>
              <div class="tw-text-base tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Siswa Tidak Naik Kelas</div>
            </div>
          </a>
          <a href="/siswa-keluar" class="tw-group">
            <div class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims-400 tw-transition-all tw-duration-300">
              <div class="tw-text-2xl tw-text-sims-400 group-hover:tw-text-white"><i class="fa-solid fa-user-group"></i></div>
              <div class="tw-text-base tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Siswa Keluar</div>
            </div>
          </a>
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
  '-',
  '-',
  '-',
  '-',
  '-',
];
const data = {
  labels: labels,
  datasets: [{
    label: 'Siswa Masuk',
    backgroundColor: '#47B2E0',
    borderColor: '#47B2E0',
    data: [{{ $siswaMasuk }}],
  }, {
    label: 'Siswa Keluar',
    backgroundColor: '#DC98AC',
    borderColor: '#DC98AC',
    data: [{{ $siswaKeluar }}],
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
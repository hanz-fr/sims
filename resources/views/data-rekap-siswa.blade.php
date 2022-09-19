@extends('layouts.main')

@section('content')
<div class="container">
    <div class="tw-flex tw-flex-row tw-gap-8 tw-mt-8">
      <div class="tw-bg-white tw-rounded-xl tw-flex tw-flex-col tw-p-14 tw-shadow-lg tw-font-pop tw-w-1/4">
        <div class="tw-flex tw-flex-row tw-mx-auto tw-text-sims">
          <div class="tw-text-4xl"><i class="fa-solid fa-user-group"></i></div>
          <div class="tw-text-xl my-auto tw-ml-3 tw-font-bold">Siswa</div>
        </div>
        <div class="tw-flex tw-flex-row tw-mt-10">
          <div class="tw-flex tw-flex-col tw-text-sims tw-gap-3 tw-mt-8">
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
      <div class="tw-bg-white tw-grow tw-rounded-xl tw-p-10 tw-shadow-lg tw-font-pop">
        <div class="tw-text-base tw-text-gray-400 tw-font-bold tw-mb-7 tw-text-center">Grafik Perpindahan Siswa</div>
        <div class="tw-border tw-p-2">
          <canvas id="myChart" class="tw-mt-4"></canvas>          
        </div>  
      </div>
    </div>
    {{-- Data Siswa Masuk --}}
    <div class="tw-gap-8 tw-flex tw-flex-row tw-mt-8">
      <div class="tw-bg-white tw-flex tw-flex-col tw-grow tw-rounded-xl tw-py-3 tw-px-7 tw-shadow-lg tw-font-pop tw-w-1/2">
        <div class="-tw-mr-6">
          <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="tw-text-lg tw-text-sims tw-font-bold tw-mb-1 tw-text-center">Data Siswa yang Masuk</div>
        <div class="tw-text-sm tw-text-gray-400 tw-text-center tw-font-normal">Data Juli 2021</div>
        
        <div class="tw-flex tw-justify-between tw-mb-5 tw-mt-7">
          <div class="">
            <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-sliders-simple"></i></a>
          </div>
          <div class="tw-relative tw-text-gray-600">
            <input class="tw-bg-gray-100 tw-h-8 tw-px-5 tw-pr-16 tw-rounded-lg tw-text-sm focus:tw-outline-sims focus:tw-bg-white"
              type="search" name="search">
            <button type="submit" class="tw-absolute tw-right-0 tw-top-0 tw-mt-1 tw-mr-4">
              <i class="fa-solid fa-magnifying-glass tw-h-4 tw-w-4 tw-fill-current tw-text-sims"></i>
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
        <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-chevron-right"></i></a>
        <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-7 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-chevron-left"></i></a>
      </div>
      </div>
      {{-- Data Siswa Keluar --}}
      <div class="tw-bg-white tw-flex tw-flex-col tw-grow tw-rounded-xl tw-py-3 tw-px-7 tw-shadow-lg tw-font-pop tw-w-1/2">
        <div class="-tw-mr-6">
          <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="tw-text-lg tw-text-sims tw-font-bold tw-mb-1 tw-text-center">Data Siswa yang Keluar</div>
        <div class="tw-text-sm tw-text-gray-400 tw-text-center tw-font-normal">Data Juli 2021</div>
        <div class="tw-flex tw-justify-between tw-mb-5 tw-mt-7">
          <div class="">
            <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-sliders-simple"></i></a>
          </div>
          <div class="tw-relative tw-text-gray-600">
            <input class="tw-bg-gray-100 tw-h-8 tw-px-5 tw-pr-16 tw-rounded-lg tw-text-sm focus:tw-outline-sims focus:tw-bg-white"
              type="search" name="search">
            <button type="submit" class="tw-absolute tw-right-0 tw-top-0 tw-mt-1 tw-mr-4">
              <i class="fa-solid fa-magnifying-glass tw-h-4 tw-w-4 tw-fill-current tw-text-sims"></i>
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
        <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-chevron-right"></i></a>
        <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-7 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-chevron-left"></i></a>
      </div>
      </div>
    </div>

    {{-- Rekap Data Jumlah Siswa --}}
    <div class="tw-flex tw-flex-row tw-gap-8 tw-my-8">
      <div class="tw-bg-white tw-grow tw-flex tw-flex-col tw-rounded-xl tw-py-3 tw-px-10 tw-shadow-lg tw-font-pop tw-w-full">
        <div class="tw-float-right -tw-mr-8">
          <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="tw-text-lg tw-text-sims tw-font-bold tw-mb-1 tw-text-center">Rekap Data Jumlah Siswa</div>
        <div class="tw-text-sm tw-text-gray-400 tw-text-center tw-font-normal">Data Juli 2021</div>
        <table class="tw-w-full tw-text-sm tw-text-center tw-mt-10">
          <thead class="tw-text-sm tw-text-gray-400 tw-border-b tw-border-gray-500 tw-font-pop">
              <tr class="">
                  <th rowspan="2" colspan="1" class="tw-py-3 tw-px-6">
                      #
                  </th>
                  <th rowspan="1" colspan="3" class="tw-py-3 tw-px-6">
                    KELAS X
                  </th>
                  <th rowspan="1" colspan="3" class="tw-py-3 tw-px-6">
                    KELAS XI
                  </th>
                  <th rowspan="1" colspan="3" class="tw-py-3 tw-px-6">
                    KELAS XII
                  </th>
              </tr>
              <tr>
                <th>L</th>
                <th>P</th>
                <th>JML</th>
                <th>L</th>
                <th>P</th>
                <th>JML</th>
                <th>L</th>
                <th>P</th>
                <th>JML</th>
              </tr>
          </thead>
          <tbody class="tw-text-xs text-center">
              <tr class="tw-text-gray-500">
                  <th scope="row" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                    AWAL BULAN
                  </th>
                  <td class="tw-py-4 tw-px-6">
                    70
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    72
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    75
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    70
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    72
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    75
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    70
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    72
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    75
                  </td>
              </tr>
              <tr class="tw-text-gray-500">
                  <th scope="row" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                    MASUK
                  </th>
                  <td class="tw-py-4 tw-px-6">
                    81
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    88
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    75
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    70
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    72
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    75
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    70
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    72
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    75
                  </td>
              </tr>
              <tr class="tw-text-gray-500">
                  <th scope="row" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                    KELUAR
                  </th>
                  <td class="tw-py-4 tw-px-6">
                    95
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    98
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    72
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    70
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    72
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    75
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    70
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    72
                  </td>
                  <td class="tw-py-4 tw-px-6">
                    75
                  </td>
              </tr>
              <tr class="tw-text-gray-500">
                <th scope="row" class="tw-py-4 tw-px-6 tw-font-normal tw-text-gray-400 tw-whitespace-nowrap">
                  AKHIR BULAN
                </th>
                <td class="tw-py-4 tw-px-6">
                  77
                </td>
                <td class="tw-py-4 tw-px-6">
                  77
                </td>
                <td class="tw-py-4 tw-px-6">
                  75
                </td>
                <td class="tw-py-4 tw-px-6">
                  70
                </td>
                <td class="tw-py-4 tw-px-6">
                  72
                </td>
                <td class="tw-py-4 tw-px-6">
                  75
                </td>
                <td class="tw-py-4 tw-px-6">
                  70
                </td>
                <td class="tw-py-4 tw-px-6">
                  72
                </td>
                <td class="tw-py-4 tw-px-6">
                  75
                </td>
              </tr>
          </tbody>
      </table>
      </div>

      {{-- Quick Access --}}
      <div class="tw-bg-white tw-rounded-xl tw-p-14 tw-shadow-lg tw-font-pop tw-w-2/3">
        <div class="tw-text-sims tw-text-center">
          <div class="tw-text-xl my-auto tw-ml-3 tw-font-bold tw-text-gray-500">Quick Access</div>
        </div>
        <div class="tw-grid tw-grid-cols-2 tw-gap-8 tw-mt-8">
          <a href="#" class="tw-group">
            <div class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims tw-transition-all tw-duration-300">
              <div class="tw-text-2xl tw-text-sims group-hover:tw-text-white"><i class="fa-solid fa-graduation-cap"></i></div>
              <div class="tw-text-xs tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Siswa Masuk</div>
            </div>
          </a>
          <a href="#" class="tw-group">
            <div class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims tw-transition-all tw-duration-300">
              <div class="tw-text-2xl tw-text-sims group-hover:tw-text-white"><i class="fa-regular fa-book-open"></i></div>
              <div class="tw-text-xs tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Induk Siswa</div>
            </div>
          </a>
          <a href="#" class="tw-group">
            <div class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims tw-transition-all tw-duration-300">
              <div class="tw-text-2xl tw-text-sims group-hover:tw-text-white"><i class="fa-solid fa-clipboard-list"></i></div>
              <div class="tw-text-xs tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Siswa Tidak Naik Kelas</div>
            </div>
          </a>
          <a href="#" class="tw-group">
            <div class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims tw-transition-all tw-duration-300">
              <div class="tw-text-2xl tw-text-sims group-hover:tw-text-white"><i class="fa-solid fa-user-group"></i></div>
              <div class="tw-text-xs tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Mutasi <br><br><br></div>
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
  'Jan',
  'Feb',
  'Mar',
  'Apr',
  'May',
];
const data = {
  labels: labels,
  datasets: [{
    label: 'Siswa Masuk',
    backgroundColor: '#47B2E0',
    borderColor: '#47B2E0',
    data: [20, 10, 10, 30, 60],
  }, {
    label: 'Siswa Keluar',
    backgroundColor: '#DC98AC',
    borderColor: '#DC98AC',
    data: [40, 20, 10, 10, 0],
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
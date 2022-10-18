@extends('layouts.main')

@section('content')
    <div class="tw-mx-10">
      <div class="tw-flex tw-mt-8 tw-items-center">
        <a href="/data-induk-siswa" class=" tw-text-sims-400 tw-text-3xl hover:tw-text-sims-600"><i class="fa-regular fa-chevron-left"></i></a>
        <div class="tw-text-2xl tw-text-sims-400 tw-font-pop tw-font-semibold tw-flex tw-flex-row tw-ml-4">Rekap Nilai Siswa</div>
      </div>
        <div class="tw-flex tw-justify-end tw-mb-5">
            <a href="" class="tw-bg-sims-400 tw-text-white hover:tw-text-white  tw-font-pop hover:tw-bg-sims-600 tw-px-5 tw-py-2 tw-rounded-lg tw-mr-5">Export</a>
            <a href="" class="tw-bg-sims-400 tw-text-white hover:tw-text-white  tw-font-pop hover:tw-bg-sims-600 tw-px-5 tw-py-2 tw-rounded-lg">import</a>
        </div>
        <div x-data="{
          selected: 1,
          activeClasses: 'tw-bg-sims-400 tw-text-white',
          inactiveClasses: 'tw-bg-white tw-text-sims-400'
      }">
        <div x-show="selected === 1" class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
            <table class="tw-w-full tw-text-sm tw-text-center">
                <thead class="tw-text-lg tw-bg-gray-100 tw-text-basic-700 tw-border-b tw-font-pop">
                    <tr class="tw-border">
                        <th scope="col" class="tw-py-3 tw-px-6">
                            Nama Mapel
                        </th>
                        <th scope="col" class="tw-py-3 tw-px-6">
                          Pengetahuan
                        </th>
                        <th scope="col" class="tw-py-3 tw-px-6">
                          Keterampilan
                        </th>
                        <th scope="col" class="tw-py-3 tw-px-6">
                          KKM
                        </th>
                    </tr>
                </thead>
                <tbody class="tw-text-base text-center">
                    <tr class="tw-bg-white tw-border">
                        <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                          Bahasa Inggris
                        </th>
                        <td class="tw-py-4 tw-px-6">
                          72
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          75
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          75
                        </td>
                    </tr>
                    <tr class="tw-border tw-bg-gray-100">
                        <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                          Bahasa Indonesia
                        </th>
                        <td class="tw-py-4 tw-px-6">
                          88
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          75
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          75
                        </td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                          Agama
                        </th>
                        <td class="tw-py-4 tw-px-6">
                          98
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          72
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          72
                        </td>
                    </tr>
                    <tr class="tw-bg-gray-100 tw-border">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        PPKN 
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        77
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        Matematika
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                    </tr>
                    <tr class="tw-bg-gray-100 tw-border">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        Bahasa Jepang
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        87
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div x-show="selected === 2" class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
          <table class="tw-w-full tw-text-sm tw-text-center">
              <thead class="tw-text-lg tw-bg-gray-100 tw-text-basic-700 tw-border-b tw-font-pop">
                  <tr class="tw-border">
                      <th scope="col" class="tw-py-3 tw-px-6">
                          Nama Mapel
                      </th>
                      <th scope="col" class="tw-py-3 tw-px-6">
                        Pengetahuan
                      </th>
                      <th scope="col" class="tw-py-3 tw-px-6">
                        Keterampilan
                      </th>
                      <th scope="col" class="tw-py-3 tw-px-6">
                        KKM
                      </th>
                  </tr>
              </thead>
              <tbody class="tw-text-base text-center">
                  <tr class="tw-bg-white tw-border">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        Bahasa Inggris
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                  </tr>
                  <tr class="tw-border tw-bg-gray-100">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        Bahasa Indonesia
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        88
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                  </tr>
                  <tr class="tw-bg-white tw-border">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        Agama
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        98
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                  </tr>
                  <tr class="tw-bg-gray-100 tw-border">
                    <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                      PPKN 
                    </th>
                    <td class="tw-py-4 tw-px-6">
                      77
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                  </tr>
                  <tr class="tw-bg-white tw-border">
                    <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                      Matematika
                    </th>
                    <td class="tw-py-4 tw-px-6">
                      72
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      72
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      72
                    </td>
                  </tr>
                  <tr class="tw-bg-gray-100 tw-border">
                    <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                      Bahasa Jepang
                    </th>
                    <td class="tw-py-4 tw-px-6">
                      87
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                  </tr>
                  <tr>
                    <th scope="row" rowspan="4" class="bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                      Absen
                    </th>
                    <td class="tw-border">
                      Sakit (hari)
                    </td>
                    <td class="tw-border">
                      75
                    </td>
                  </tr>
                  <tr class="tw-bg-gray-100">
                    <td class="tw-py-2 tw-px-6 tw-border">
                      Ijin (hari)
                    </td>
                    <td class="tw-border">
                      75
                    </td>
                  </tr>
                  <tr class="tw-bg-gray-100">
                    <td class="tw-py-2 tw-px-6 tw-border">
                      Alpa (hari)
                    </td>
                    <td class="tw-border">
                      75
                    </td>
                  </tr>
                  <tr class="tw-bg-gray-100">
                    <td class="tw-py-2 tw-px-6 tw-border">
                      Jumlah (hari)
                    </td>
                    <td class="tw-border">
                      75
                    </td>
                  </tr>
                  <tr>
                    <th scope="row" rowspan="3" class="tw-bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                      Status Akhir Tahun
                    </th>
                    <td class="tw-py-2 tw-px-6 tw-border">
                      Status Kenaikan
                    </td>
                    <td class="tw-border">
                      Naik
                    </td>
                  </tr>
                  <tr class="tw-bg-gray-100">
                    <td class="tw-py-2 tw-px-6 tw-border">
                      Naik ke
                    </td>
                    <td class="tw-border">
                      XI
                    </td>
                  </tr>
                  <tr class="tw-bg-gray-100">
                    <td class="tw-py-2 tw-px-6 tw-border">
                      Tanggal Kenaikan
                    </td>
                    <td class="tw-border">
                      24 Juni 2021
                    </td>
                  </tr>
              </tbody>
          </table>
        </div>
        <div x-show="selected === 3" class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
          <table class="tw-w-full tw-text-sm tw-text-center">
              <thead class="tw-text-lg tw-bg-gray-100 tw-text-basic-700 tw-border-b tw-font-pop">
                  <tr class="tw-border">
                      <th scope="col" class="tw-py-3 tw-px-6">
                          Nama Mapel
                      </th>
                      <th scope="col" class="tw-py-3 tw-px-6">
                        Pengetahuan
                      </th>
                      <th scope="col" class="tw-py-3 tw-px-6">
                        Keterampilan
                      </th>
                      <th scope="col" class="tw-py-3 tw-px-6">
                        KKM
                      </th>
                  </tr>
              </thead>
              <tbody class="tw-text-base text-center">
                  <tr class="tw-bg-white tw-border">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        Bahasa Inggris
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                  </tr>
                  <tr class="tw-border tw-bg-gray-100">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        Bahasa Indonesia
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        88
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                  </tr>
                  <tr class="tw-bg-white tw-border">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        Agama
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        98
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                  </tr>
                  <tr class="tw-bg-gray-100 tw-border">
                    <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                      PPKN 
                    </th>
                    <td class="tw-py-4 tw-px-6">
                      77
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                  </tr>
                  <tr class="tw-bg-white tw-border">
                    <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                      Matematika
                    </th>
                    <td class="tw-py-4 tw-px-6">
                      72
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      72
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      72
                    </td>
                  </tr>
                  <tr class="tw-bg-gray-100 tw-border">
                    <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                      Bahasa Jepang
                    </th>
                    <td class="tw-py-4 tw-px-6">
                      87
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                  </tr>
              </tbody>
          </table>
        </div>
        <div x-show="selected === 4" class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
          <table class="tw-w-full tw-text-sm tw-text-center">
              <thead class="tw-text-lg tw-bg-gray-100 tw-text-basic-700 tw-border-b tw-font-pop">
                  <tr class="tw-border">
                      <th scope="col" class="tw-py-3 tw-px-6">
                          Nama Mapel
                      </th>
                      <th scope="col" class="tw-py-3 tw-px-6">
                        Pengetahuan
                      </th>
                      <th scope="col" class="tw-py-3 tw-px-6">
                        Keterampilan
                      </th>
                      <th scope="col" class="tw-py-3 tw-px-6">
                        KKM
                      </th>
                  </tr>
              </thead>
              <tbody class="tw-text-base text-center">
                  <tr class="tw-bg-white tw-border">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        Bahasa Inggris
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                  </tr>
                  <tr class="tw-border tw-bg-gray-100">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        Bahasa Indonesia
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        88
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                  </tr>
                  <tr class="tw-bg-white tw-border">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        Agama
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        98
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                  </tr>
                  <tr class="tw-bg-gray-100 tw-border">
                    <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                      PPKN 
                    </th>
                    <td class="tw-py-4 tw-px-6">
                      77
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                  </tr>
                  <tr class="tw-bg-white tw-border">
                    <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                      Matematika
                    </th>
                    <td class="tw-py-4 tw-px-6">
                      72
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      72
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      72
                    </td>
                  </tr>
                  <tr class="tw-bg-gray-100 tw-border">
                    <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                      Bahasa Jepang
                    </th>
                    <td class="tw-py-4 tw-px-6">
                      87
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                  </tr>
                  <tr>
                    <th scope="row" rowspan="4" class="bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                      Absen
                    </th>
                    <td class="tw-border">
                      Sakit (hari)
                    </td>
                    <td class="tw-border">
                      75
                    </td>
                  </tr>
                  <tr class="tw-bg-gray-100">
                    <td class="tw-py-2 tw-px-6 tw-border">
                      Ijin (hari)
                    </td>
                    <td class="tw-border">
                      75
                    </td>
                  </tr>
                  <tr class="tw-bg-gray-100">
                    <td class="tw-py-2 tw-px-6 tw-border">
                      Alpa (hari)
                    </td>
                    <td class="tw-border">
                      75
                    </td>
                  </tr>
                  <tr class="tw-bg-gray-100">
                    <td class="tw-py-2 tw-px-6 tw-border">
                      Jumlah (hari)
                    </td>
                    <td class="tw-border">
                      75
                    </td>
                  </tr>
                  <tr>
                    <th scope="row" rowspan="3" class="tw-bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                      Status Akhir Tahun
                    </th>
                    <td class="tw-py-2 tw-px-6 tw-border">
                      Status Kenaikan
                    </td>
                    <td class="tw-border">
                      Naik
                    </td>
                  </tr>
                  <tr class="tw-bg-gray-100">
                    <td class="tw-py-2 tw-px-6 tw-border">
                      Naik ke
                    </td>
                    <td class="tw-border">
                      XI
                    </td>
                  </tr>
                  <tr class="tw-bg-gray-100">
                    <td class="tw-py-2 tw-px-6 tw-border">
                      Tanggal Kenaikan
                    </td>
                    <td class="tw-border">
                      24 Juni 2021
                    </td>
                  </tr>
              </tbody>
          </table>
        </div>
        <div x-show="selected === 5" class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
          <table class="tw-w-full tw-text-sm tw-text-center">
              <thead class="tw-text-lg tw-bg-gray-100 tw-text-basic-700 tw-border-b tw-font-pop">
                  <tr class="tw-border">
                      <th scope="col" class="tw-py-3 tw-px-6">
                          Nama Mapel
                      </th>
                      <th scope="col" class="tw-py-3 tw-px-6">
                        Pengetahuan
                      </th>
                      <th scope="col" class="tw-py-3 tw-px-6">
                        Keterampilan
                      </th>
                      <th scope="col" class="tw-py-3 tw-px-6">
                        KKM
                      </th>
                  </tr>
              </thead>
              <tbody class="tw-text-base text-center">
                  <tr class="tw-bg-white tw-border">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        Bahasa Inggris
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                  </tr>
                  <tr class="tw-border tw-bg-gray-100">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        Bahasa Indonesia
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        88
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                  </tr>
                  <tr class="tw-bg-white tw-border">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        Agama
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        98
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                  </tr>
                  <tr class="tw-bg-gray-100 tw-border">
                    <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                      PPKN 
                    </th>
                    <td class="tw-py-4 tw-px-6">
                      77
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                  </tr>
                  <tr class="tw-bg-white tw-border">
                    <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                      Matematika
                    </th>
                    <td class="tw-py-4 tw-px-6">
                      72
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      72
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      72
                    </td>
                  </tr>
                  <tr class="tw-bg-gray-100 tw-border">
                    <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                      Bahasa Jepang
                    </th>
                    <td class="tw-py-4 tw-px-6">
                      87
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                  </tr>
              </tbody>
          </table>
      </div>
        <div x-show="selected === 6" class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
          <table class="tw-w-full tw-text-sm tw-text-center">
              <thead class="tw-text-lg tw-bg-gray-100 tw-text-basic-700 tw-border-b tw-font-pop">
                  <tr class="tw-border">
                      <th scope="col" rowspan="2" class="tw-py-3 tw-px-6">
                          Nama Mapel
                      </th>
                      <th scope="col" rowspan="2" class="tw-py-3 tw-px-6">
                        Pengetahuan
                      </th>
                      <th scope="col" rowspan="2" class="tw-py-3 tw-px-6">
                        Keterampilan
                      </th>
                      <th scope="col" rowspan="2" class="tw-py-3 tw-px-6">
                        KKM
                      </th>
                      <th scope="col" colspan="2" class="tw-py-3 tw-px-6">
                        US
                      </th>
                      <th scope="col" colspan="2" class="tw-py-3 tw-px-6">
                        UKK
                      </th>
                  </tr>
                  <tr class="tw-border">
                    <th class="tw-border tw-py-3 tw-px-6">T</th>
                    <th class="tw-border tw-py-3 tw-px-6">P</th>
                    <th class="tw-border tw-py-3 tw-px-6">T</th>
                    <th class="tw-border tw-py-3 tw-px-6">P</th>
                  </tr>
              </thead>
              <tbody class="tw-text-base text-center">
                  <tr class="tw-bg-white tw-border">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        Bahasa Inggris
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                  </tr>
                  <tr class="tw-border tw-bg-gray-100">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        Bahasa Indonesia
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        88
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                  </tr>
                  <tr class="tw-bg-white tw-border">
                      <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                        Agama
                      </th>
                      <td class="tw-py-4 tw-px-6">
                        98
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        72
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                      <td class="tw-py-4 tw-px-6">
                        75
                      </td>
                  </tr>
                  <tr class="tw-bg-gray-100 tw-border">
                    <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                      PPKN 
                    </th>
                    <td class="tw-py-4 tw-px-6">
                      77
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                  </tr>
                  <tr class="tw-bg-white tw-border">
                    <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                      Matematika
                    </th>
                    <td class="tw-py-4 tw-px-6">
                      72
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      72
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      72
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                  </tr>
                  <tr class="tw-bg-gray-100 tw-border">
                    <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap">
                      Bahasa Jepang
                    </th>
                    <td class="tw-py-4 tw-px-6">
                      87
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                    <td class="tw-py-4 tw-px-6">
                      75
                    </td>
                  </tr>
                  <tr>
                      <th scope="row" rowspan="4" class="bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                        Absen
                      </th>
                      <td class="tw-border">
                        Sakit (hari)
                      </td>
                      <td class="tw-border">
                        75
                      </td>
                    </tr>
                    <tr class="tw-bg-gray-100">
                      <td class="tw-py-2 tw-px-6 tw-border">
                        Ijin (hari)
                      </td>
                      <td class="tw-border">
                        75
                      </td>
                    </tr>
                    <tr class="tw-bg-gray-100">
                      <td class="tw-py-2 tw-px-6 tw-border">
                        Alpa (hari)
                      </td>
                      <td class="tw-border">
                        75
                      </td>
                    </tr>
                    <tr class="tw-bg-gray-100">
                      <td class="tw-py-2 tw-px-6 tw-border">
                        Jumlah (hari)
                      </td>
                      <td class="tw-border">
                        75
                      </td>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="3" class="tw-bg-white tw-py-2 tw-px-6 tw-font-medium tw-text-basic-700 tw-whitespace-nowrap tw-border">
                        Status Akhir Tahun
                      </th>
                      <td class="tw-py-2 tw-px-6 tw-border">
                        Status Kenaikan
                      </td>
                      <td class="tw-border">
                        Naik
                      </td>
                    </tr>
                    <tr class="tw-bg-gray-100">
                      <td class="tw-py-2 tw-px-6 tw-border">
                        Naik ke
                      </td>
                      <td class="tw-border">
                        XI
                      </td>
                    </tr>
                    <tr class="tw-bg-gray-100">
                      <td class="tw-py-2 tw-px-6 tw-border">
                        Tanggal Kenaikan
                      </td>
                      <td class="tw-border">
                        24 Juni 2021
                      </td>
                    </tr>
              </tbody>
          </table>
        </div>
        <div class="tw-text-center tw-font-medium tw-mt-8 tw-mb-3 tw-text-gray-500 tw-font-pop tw-text-xl">SEMESTER</div>
        <div class="tw-flex tw-flex-row tw-justify-center tw-gap-4 tw-mb-8">
          <a x-on:click="selected = 1"
              :class="selected === 1 ? activeClasses : inactiveClasses" href="#"
              class="tw-rounded-lg tw-font-semibold tw-text-lg tw-py-2 tw-px-5 tw-shadow-md hover:tw-bg-sims-400 hover:tw-text-white">1</a>
          <a x-on:click="selected = 2"
              :class="selected === 2 ? activeClasses : inactiveClasses" href="#"
              class="tw-rounded-lg tw-font-semibold tw-text-lg tw-py-2 tw-px-5 tw-shadow-md hover:tw-bg-sims-400 hover:tw-text-white">2</a>
          <a x-on:click="selected = 3"
              :class="selected === 3 ? activeClasses : inactiveClasses" href="#"
              class="tw-rounded-lg tw-font-semibold tw-text-lg tw-py-2 tw-px-5 tw-shadow-md hover:tw-bg-sims-400 hover:tw-text-white">3</a>
          <a x-on:click="selected = 4"
              :class="selected === 4 ? activeClasses : inactiveClasses" href="#"
              class="tw-rounded-lg tw-font-semibold tw-text-lg tw-py-2 tw-px-5 tw-shadow-md hover:tw-bg-sims-400 hover:tw-text-white">4</a>
          <a x-on:click="selected = 5"
              :class="selected === 5 ? activeClasses : inactiveClasses" href="#"
              class="tw-rounded-lg tw-font-semibold tw-text-lg tw-py-2 tw-px-5 tw-shadow-md hover:tw-bg-sims-400 hover:tw-text-white">5</a>
          <a x-on:click="selected = 6"
              :class="selected === 6 ? activeClasses : inactiveClasses" href="#"
              class="tw-rounded-lg tw-font-semibold tw-text-lg tw-py-2 tw-px-5 tw-shadow-md hover:tw-bg-sims-400 hover:tw-text-white">6</a>
      </div>
    </div>
    </div>
@endsection
@extends('layouts.main')

@section('content')
  <div class="container">
    <div class="tw-text-3xl tw-text-sims tw-font-pop tw-font-semibold tw-flex tw-flex-row tw-mt-9 tw-mx-9">Data Siswa</div>
    {{-- foto profil --}}
    @foreach($siswa as $s)
    <div class="tw-flex sm:tw-flex-col md:tw-flex-row tw-font-pop">
      <div class="md:tw-w-[30%] sm:tw-w-full tw-text-center tw-text-basic tw-text-xl tw-font-pop tw-font-semibold tw-m-9">
        <img src="" alt="Pas Foto" srcset="" class="tw-rounded-xl tw-mb-10 tw-w-40 tw-h-52 tw-border tw-border-slate-400 tw-mx-auto md:tw-mt-20 sm:tw-mt-10">
        <div>{{ $s->nama_siswa }}</div>
        <div>{{ $s->nis_siswa }} / {{ $s->nisn_siswa }}</div>
        <div>{{ $s->KelasId }} / Jurusan</div>
      </div>
      
      {{-- data siswa n rekap nilai --}}
      <div x-data="{ openTab: 1,
        activeClasses: 'tw-bg-white tw-border',
        inactiveClasses: 'tw-bg-gray-200 tw-border-t tw-border-x'
      }"  class="md:tw-w-3/5 sm:tw-w-full">
      <div class="tw-float-right">
        <a href="#" class="tw-text-white tw-bg-kuning hover:tw-bg-[#D3A007] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-solid fa-pen-to-square"></i></a>
      </div>
        <ul class="tw-flex mb-0 mt-3 tw--ml-6">
          <li @click="openTab = 1" :class="{ 'tw--mb-px': openTab === 1 }" class="tw--mb-px tw-mr-1">
            <button :class="openTab === 1 ? activeClasses : inactiveClasses" class="tw-rounded-t-2xl tw-text-basic hover:tw-text-sims tw-inline-block tw-py-2 tw-px-4 tw-font-semibold" href="#">
              Data Diri
            </button>
          </li>
          <li @click="openTab = 2" :class="{ 'tw--mb-px': openTab === 2 }">
            <button :class="openTab === 2 ? activeClasses : inactiveClasses" class="tw-rounded-t-2xl tw-text-basic hover:tw-text-sims tw-inline-block tw-py-2 tw-px-4 tw-font-semibold" href="#">
              Rekap Nilai
            </button>
          </li>
        </ul>
        <div class="tw-w-full">
          <div x-show="openTab === 1">
            <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
              <table class="tw-w-full tw-text-sm tw-text-left">
                  <thead class="tw-text-lg tw-bg-gray-100 tw-text-basic tw-border tw-font-pop">
                      <tr>
                          <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">
                              Data Diri
                          </th>
                          <th scope="col" class="tw-py-3 tw-px-6">
                              Keterangan
                          </th>
                      </tr>
                  </thead>
                  <tbody class="tw-text-base">
                      <tr class="tw-bg-white tw-border">
                          <th scope="row" class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-text-basic tw-whitespace-nowrap">
                              Tempat, Tanggal Lahir
                          </th>
                          <td class="tw-py-4 tw-px-6">
                            {{ $s->tmp_lahir }}, {{ $s->tgl_lahir }}
                          </td>
                      </tr>
                      <tr class="tw-border tw-bg-gray-100">
                          <th scope="row" class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-text-basic tw-whitespace-nowrap">
                            Jenis Kelamin
                          </th>
                          <td class="tw-py-4 tw-px-6">
                            @if($s->jenis_kelamin == 'L')
                            Laki-laki
                            @elseif($s->jenis_kelamin == 'P')
                            Perempuan
                            @else
                            -
                            @endif
                          </td>
                      </tr>
                      <tr class="tw-bg-white tw-border">
                          <th scope="row" class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-text-basic tw-whitespace-nowrap">
                            Anak Ke-
                          </th>
                          <td class="tw-py-4 tw-px-6">
                            {{ $s->anak_ke }}
                          </td>
                      </tr>
                      <tr class="tw-bg-gray-100 tw-border">
                        <th scope="row" class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-text-basic tw-whitespace-nowrap">
                          Status dalam Keluarga
                        </th>
                        <td class="tw-py-4 tw-px-6">
                          @if($s->status == 'AK')
                          Anak Kandung
                          @elseif($s->status == 'AT')
                          Anak Tiri
                          @elseif($s->status == 'AA')
                          Anak Angkat
                          @endif
                        </td>
                      </tr>
                      <tr class="tw-bg-white tw-border">
                        <th scope="row" class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-text-basic tw-whitespace-nowrap">
                          Agama
                        </th>
                        <td class="tw-py-4 tw-px-6">
                          {{ $s->agama }}
                        </td>
                      </tr>
                      <tr class="tw-bg-gray-100 tw-border">
                        <th scope="row" class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-text-basic tw-whitespace-nowrap">
                          Alamat
                        </th>
                        <td class="tw-py-4 tw-px-6">
                          {{ $s->alamat_siswa }}
                        </td>
                      </tr>
                  </tbody>
              </table>
          </div> 
          <div class="tw-float-right tw-py-5 tw-px-3">
            @if($total == $response->to)
            <a class="tw-text-gray-300 tw-bg-[#2f5555] hover:tw-text-gray-300 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-right"></i></a>
            @else
            <a href="{{ $response->next_page_url }}" class="tw-text-white tw-bg-sims hover:tw-bg-[#3F7373] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-right"></i></a>
            @endif
          </div>
          @if($response->prev_page_url)
          <div class="tw-float-right tw-py-5">
            <a href="{{ $response->prev_page_url }}" class="tw-text-white tw-bg-sims hover:tw-bg-[#3F7373] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-left"></i></a>
          </div>
          @else
          <div class="tw-float-right tw-py-5">
            <a class="tw-text-gray-300 tw-bg-[#2f5555] hover:tw-text-gray-300 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-left"></i></a>
          </div>
          @endif         
          </div>
          <div x-show="openTab === 2">
            <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
              <table class="tw-w-full tw-text-sm tw-text-center">
                  <thead class="tw-text-lg tw-bg-gray-100 tw-text-basic tw-border-b tw-font-pop">
                      <tr class="tw-border">
                          <th scope="col" class="tw-py-3 tw-px-6">
                              Nama Mapel
                          </th>
                          <th scope="col" class="tw-py-3 tw-px-6">
                            KBM
                          </th>
                          <th scope="col" class="tw-py-3 tw-px-6">
                            Pengetahuan
                          </th>
                          <th scope="col" class="tw-py-3 tw-px-6">
                            Keterampilan
                          </th>
                      </tr>
                  </thead>
                  <tbody class="tw-text-base text-center">
                      <tr class="tw-bg-white tw-border">
                          <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic tw-whitespace-nowrap">
                            Bahasa Inggris
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
                      </tr>
                      <tr class="tw-border tw-bg-gray-100">
                          <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic tw-whitespace-nowrap">
                            Bahasa Indonesia
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
                      </tr>
                      <tr class="tw-bg-white tw-border">
                          <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic tw-whitespace-nowrap">
                            Agama
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
                      </tr>
                      <tr class="tw-bg-gray-100 tw-border">
                        <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic tw-whitespace-nowrap">
                          PPKN 
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
                      </tr>
                      <tr class="tw-bg-white tw-border">
                        <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic tw-whitespace-nowrap">
                          Matematika
                        </th>
                        <td class="tw-py-4 tw-px-6">
                           76
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          72
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          72
                        </td>
                      </tr>
                      <tr class="tw-bg-gray-100 tw-border">
                        <th scope="row" class="tw-py-4 tw-px-6 tw-font-medium tw-text-basic tw-whitespace-nowrap">
                          Bahasa Jepang
                        </th>
                        <td class="tw-py-4 tw-px-6">
                          72
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          87
                        </td>
                        <td class="tw-py-4 tw-px-6">
                          75
                        </td>
                      </tr>
                  </tbody>
              </table>
          </div> 
          <div class="tw-float-right tw-py-5 tw-px-3">
            <a href="#" class="tw-text-white tw-bg-sims hover:tw-bg-[#3F7373] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-right"></i></a>
          </div>
          <div class="tw-float-right tw-py-5">
            <a href="#" class="tw-text-white tw-bg-sims hover:tw-bg-[#3F7373] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-left"></i></a>
          </div>   
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>
@endsection
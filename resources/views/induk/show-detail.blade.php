@extends('layouts.main')

@section('content')
    @if ($status == 'error')
        <div class="tw-flex tw-justify-center">
            <div class="tw-block tw-my-32">
                <img src="{{ asset('assets/img/error_img.svg') }}" alt="error_img">
                <h1 class="tw-flex tw-justify-center tw-font-pop tw-font-bold tw-mt-6 tw-text-sims-400">404 Not Found</h1>
                <p class="tw-flex tw-justify-center tw-font-pop tw-text-md tw-font-semibold tw-text-gray-400 tw-mt-5">
                    {{ $message }}</p>
            </div>
        </div>
    @else
        <div class="tw-mx-10 tw-my-10">
            <div class="tw-text-3xl tw-text-sims-400 tw-font-pop tw-font-semibold tw-flex tw-mt-9 tw-mx-9">Data Siswa</div>
            {{-- foto profil --}}
            <div class="tw-flex sm:tw-flex-col md:tw-flex-row tw-font-pop">
                <div
                    class="md:tw-w-[30%] sm:tw-w-full tw-text-center tw-text-basic-700 tw-text-xl tw-font-pop tw-font-semibold tw-m-9">
                    @if ($siswa->foto)
                        <img src="{{ asset('foto/' . $siswa->foto) }}" alt="Pas Foto" srcset=""
                            class="tw-rounded-xl tw-mb-10 tw-w-48 tw-h-52 tw-border tw-border-slate-400 tw-mx-auto md:tw-mt-20 sm:tw-mt-10">
                    @else
                        <img src="https://cdn.nerdschalk.com/wp-content/uploads/2020/09/how-to-remove-profile-picture-on-zoom-12.png?width=1000?height=100"
                            alt="Pas Foto" srcset=""
                            class="tw-rounded-xl tw-mb-10 tw-w-48 tw-h-52 tw-border tw-border-slate-400 tw-mx-auto md:tw-mt-20 sm:tw-mt-10">
                    @endif
                    <div>{{ $siswa->nama_siswa }}</div>
                    <div>{{ $siswa->nis_siswa }} / {{ $siswa->nisn_siswa }}</div>
                    <div>{{ $siswa->kelas->id }} / {{ $siswa->kelas->jurusan }}</div>
                    @if($siswa->isAlumni === true)
                    <div class="tw-flex tw-gap-2 tw-justify-center tw-my-3">
                        <div class="tw-text-sims-400">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <div class="tw-font-pop tw-text-sm tw-text-sims-500 tw-my-auto">Alumni</div>
                    </div>
                    @endif
                </div>

                {{-- data siswa n rekap nilai --}}
                <div class="md:tw-w-3/5 sm:tw-w-full">
                    <div class="tw-float-right tw-flex tw-gap-2">
                        <div>
                            <button type="button" data-modal-toggle="modal" class="tw-bg-sims-400 tw-text-white hover:tw-text-white  tw-font-pop hover:tw-bg-sims-600 tw-px-5 tw-py-2 tw-rounded-lg">Export</button>

                            <div id="modal" tabindex="-1"
                             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                              <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                  <div class="tw-relative tw-bg-white tw-rounded-lg tw-shadow dark:tw-bg-slate-100 tw-font-pop">
                                      <button type="button"
                                        class="tw-absolute tw-top-3 tw-right-2.5 tw-text-gray-400 tw-bg-transparent hover:tw-bg-gray-200 hover:tw-text-gray-900 tw-rounded-lg tw-text-sm tw-p-1.5 tw-ml-auto tw-inline-flex tw-items-center"
                                        data-modal-toggle="modal">
                                          <svg aria-hidden="true" class="tw-w-5 tw-h-5" fill="currentColor"
                                              viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                              <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd">
                                              </path>
                                          </svg>
                                          <span class="sr-only">Close modal</span>
                                      </button>
                                      <div class="tw-p-6">
                                          <div class="tw-mb-8 tw-mt-5 tw-flex tw-justify-center tw-text-2xl tw-font-semibold tw-text-sims-400">
                                              Export Data
                                          </div>
                                          <div class="tw-gap-3 tw-grid">
                                              <a href=""
                                                class="tw-text-white tw-justify-center tw-bg-sims-400 tw-w-full hover:tw-bg-sims-500 hover:tw-text-white tw-font-medium tw-text-xl tw-inline-flex tw-items-center tw-py-8 tw-text-center">
                                                  Print data&nbsp;&nbsp;<i class="fa-solid fa-print tw-text-2xl"></i>
                                              </a>
                                              <a href=""
                                                class="tw-text-white tw-justify-center tw-bg-[#1D6F42] tw-w-full hover:tw-bg-green-800 hover:tw-text-white tw-font-medium tw-text-xl tw-inline-flex tw-items-center tw-py-8 tw-text-center">
                                                  Export data ke Excel&nbsp;&nbsp;<i class="fa-solid fa-file-excel tw-text-2xl"></i>
                                              </a>
                                              <a href="/data-siswa-pdf/{{ $siswa->nis_siswa }}"
                                                class="tw-text-white tw-justify-center tw-bg-danger-500 tw-w-full hover:tw-bg-danger-700 hover:tw-text-white tw-font-medium tw-text-xl tw-inline-flex tw-items-center tw-py-8 tw-text-center">
                                                  Export data ke PDF&nbsp;&nbsp;<i class="fa-solid fa-file-pdf tw-text-2xl"></i>
                                            </a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                        @can('tata usaha')
                        <form action="/api/siswa/delete/{{ $siswa->nis_siswa }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <input type="hidden" name="prevURLwithParams" value="{{ URL::previous() }}">

                            <button type="button" data-modal-toggle="popup-modal"
                                class="tw-text-white tw-text-sm tw-bg-red-400 hover:tw-bg-red-500 hover:tw-text-white tw-rounded-lg tw-py-2 tw-px-3">
                                <i class="fa-solid fa-trash mr-2"></i> Delete
                            </button>

                            <input type="hidden" name="prevURL" value="{{ $prevURL }}">

                            <div id="popup-modal" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                    <div class="tw-relative tw-bg-white tw-rounded-lg tw-shadow dark:tw-bg-slate-100">
                                        <button type="button"
                                            class="tw-absolute tw-top-3 tw-right-2.5 tw-text-gray-400 tw-bg-transparent hover:tw-bg-gray-200 hover:tw-text-gray-900 tw-rounded-lg tw-text-sm tw-p-1.5 tw-ml-auto tw-inline-flex tw-items-center"
                                            data-modal-toggle="popup-modal">
                                            <svg aria-hidden="true" class="tw-w-5 tw-h-5" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="tw-p-6">
                                            <svg aria-hidden="true"
                                                class="tw-mx-auto tw-mb-4 tw-w-14 tw-h-14 tw-text-gray-400 dark:tw-text-gray-200"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <div
                                                class="tw-mb-5 tw-flex tw-justify-center tw-text-md tw-font-normal tw-text-gray-500 dark:tw-text-gray-400">
                                                Hapus data siswa?</div>
                                            <div class="tw-flex tw-justify-center">
                                                <button type="submit" data-modal-toggle="popup-modal" type="button"
                                                    class="tw-text-white tw-bg-red-600 hover:tw-bg-red-800 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-red-300 dark:focus:tw-ring-red-800 tw-font-medium tw-rounded-lg tw-text-sm tw-inline-flex tw-items-center tw-py-2.5 tw-text-center tw-mr-2 tw-px-6">
                                                    Ya
                                                </button>
                                                <button data-modal-toggle="popup-modal" type="button"
                                                    class="tw-text-gray-500 tw-bg-white hover:tw-bg-gray-100 focus:tw-ring-4 focus:tw-outline-none focus:tw-ring-gray-200 tw-rounded-lg tw-border tw-border-gray-200 tw-text-sm tw-font-medium tw-py-2.5 hover:tw-text-gray-900 focus:tw-z-10 dark:tw-bg-gray-700 dark:tw-text-gray-300 dark:tw-border-gray-500 dark:hover:tw-text-white dark:hover:tw-bg-gray-600 dark:focus:tw-ring-gray-600 tw-px-4">Tidak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <a href="/edit-siswa/{{ $siswa->nis_siswa }}"
                            class="tw-text-white tw-text-sm tw-bg-yellow-400 hover:tw-text-white hover:tw-bg-yellow-500 tw-rounded-lg tw-py-2 tw-px-3"><i
                                class="fa-solid fa-pen-to-square mr-2"></i>Edit</a>
                        @endcan
                        @cannot('kesiswaan')
                        <a href="/rekap-nilai/{{ $siswa->nis_siswa }}"
                            class="tw-text-white tw-text-sm tw-bg-sims-400 hover:tw-text-white hover:tw-bg-sims-500 tw-rounded-lg tw-py-2 tw-px-3"><i
                                class="fa-light fa-clipboard-list mr-2"></i>Rekap Nilai</a>
                        @endcannot
                    </div>
                    <ul class="tw-flex mb-0 mt-3 tw--ml-6">
                        <li class="tw--mb-px tw-mr-1">
                            <div
                                class="tw-rounded-t-2xl tw-bg-white tw-border tw-text-basic-700 tw-inline-block tw-py-2 tw-px-4 tw-font-semibold">
                                Data Diri
                            </div>
                        </li>
                    </ul>
                    <div class="tw-w-full">
                        <div>
                            <div x-data="{
                                selected: 1,
                                activeClasses: 'tw-bg-sims-400 tw-text-white',
                                inactiveClasses: 'tw-bg-white tw-text-sims-400'
                            }">
                                <div x-show="selected === 1">
                                    <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
                                        <table class="tw-w-full tw-text-left tw-text-basic-700">
                                            <thead
                                                class="tw-text-lg tw-bg-gray-100 tw-border tw-font-pop">
                                                <tr>
                                                    <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">
                                                        Data Diri
                                                    </th>
                                                    <th scope="col" class="tw-py-3 tw-px-6">
                                                        Keterangan
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="tw-font-medium">
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Tempat, Tanggal Lahir
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->tmp_lahir }}, {{ $tgl_lahir_siswa }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-border tw-bg-gray-100">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Jenis Kelamin
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        @if ($siswa->jenis_kelamin == 'L')
                                                            Laki-laki
                                                        @elseif($siswa->jenis_kelamin == 'P')
                                                            Perempuan
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Agama
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->agama }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-gray-100 tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Anak Ke-
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->anak_ke }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Status dalam Keluarga
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        @if ($siswa->status == 'AK')
                                                            Anak Kandung
                                                        @elseif($siswa->status == 'AT')
                                                            Anak Tiri
                                                        @elseif($siswa->status == 'AA')
                                                            Anak Angkat
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-gray-100 tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Alamat Peserta Didik
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->alamat_siswa }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-border tw-bg-white">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Nomor Telepon/HP
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->no_telp_siswa }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div x-show="selected === 2">
                                    <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
                                        <table class="tw-w-full tw-text-left tw-text-basic-700">
                                            <thead
                                                class="tw-text-lg tw-bg-gray-100 tw-border tw-font-pop">
                                                <tr>
                                                    <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">
                                                        Data Diri
                                                    </th>
                                                    <th scope="col" class="tw-py-3 tw-px-6">
                                                        Keterangan
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="tw-font-medium">
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Alamat E-mail
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->email_siswa }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-gray-100 tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Tanggal diterima
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->tgl_diterima }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Diterima di kelas
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->diterima_di_kelas }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-gray-100 tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Semester diterima
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->semester_diterima }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Nama sekolah asal
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->sekolah_asal }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-gray-100 tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Alamat sekolah asal
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->alamat_sekolah_asal }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Tahun Ijazah SMP
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->thn_ijazah_smp }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div x-show="selected === 3">
                                    <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
                                        <table class="tw-w-full tw-text-left tw-text-basic-700">
                                            <thead
                                                class="tw-text-lg tw-bg-gray-100 tw-border tw-font-pop">
                                                <tr>
                                                    <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">
                                                        Data Diri
                                                    </th>
                                                    <th scope="col" class="tw-py-3 tw-px-6">
                                                        Keterangan
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="tw-font-medium">
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Nomor Ijazah SMP
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->no_ijazah_smp }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-gray-100 tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Tahun SKHUN SMP
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->thn_ijazah_smp }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Nomor SKHUN SMP
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->no_skhun_smp }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-gray-100 tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Nama Ayah
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->nama_ayah }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Nama Ibu
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->nama_ibu }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-gray-100 tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Alamat Orang Tua
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->alamat_ortu }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Nomor Telepon/HP Orang Tua
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->no_telp_ortu }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div x-show="selected === 4">
                                    <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
                                        <table class="tw-w-full tw-text-basic-700 tw-text-left">
                                            <thead
                                                class="tw-text-lg tw-bg-gray-100 tw-border tw-font-pop">
                                                <tr>
                                                    <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">
                                                        Data Diri
                                                    </th>
                                                    <th scope="col" class="tw-py-3 tw-px-6">
                                                        Keterangan
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="tw-font-medium">
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Alamat e-mail Orang Tua
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->email_ortu }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-border tw-bg-gray-100">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Nama Wali
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->nama_wali }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Alamat Wali
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->alamat_wali }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-gray-100 tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Nomor Telepon/HP Wali
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->no_telp_wali }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Pekerjaan Wali
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->pekerjaan_wali }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-gray-100 tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Tanggal Meninggalkan Sekolah
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->tgl_meninggalkan_sekolah }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Alasan Meninggalkan Sekolah
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->alasan_meninggalkan_sekolah }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div x-show="selected === 5">
                                    <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl">
                                        <table class="tw-w-full tw-text-basic-700 tw-text-left">
                                            <thead
                                                class="tw-text-lg tw-bg-gray-100 tw-border tw-font-pop">
                                                <tr>
                                                    <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">
                                                        Data Diri
                                                    </th>
                                                    <th scope="col" class="tw-py-3 tw-px-6">
                                                        Keterangan
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="tw-font-medium">
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Nomor Ijazah SMK
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->no_ijazah_smk }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-gray-100 tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Tanggal Ijazah SMK
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->tgl_ijazah_smk }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Keterangan Lain-lain
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->keterangan_lain }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-gray-100 tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Berat Badan
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->berat_badan }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Tinggi Badan
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->tinggi_badan }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-gray-100 tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Lingkar Kepala
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->lingkar_kepala }}
                                                    </td>
                                                </tr>
                                                <tr class="tw-bg-white tw-border">
                                                    <th scope="row"
                                                        class="tw-py-4 tw-px-6 tw-border-r tw-font-medium tw-whitespace-nowrap">
                                                        Golongan Darah
                                                    </th>
                                                    <td class="tw-py-4 tw-px-6">
                                                        {{ $siswa->golongan_darah }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{-- btn paginate --}}
                                <div class="tw-flex tw-justify-center tw-mt-8 tw-gap-4">
                                    <button x-on:click="selected = selected === 1 ? 5 : selected - 1"
                                        class="tw-text-white tw-bg-sims-400 hover:tw-bg-[#3F7373] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i
                                            class="fa-regular fa-arrow-left"></i></button>
                                    <button x-on:click="selected = selected === 5 ? 1 : selected + 1"
                                        class="tw-text-white tw-bg-sims-400 hover:tw-bg-[#3F7373] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i
                                            class="fa-regular fa-arrow-right"></i></button>
                                </div>
                            </div>
                            {{-- <div class="tw-float-right tw-py-5 tw-px-3">
            @if ($total == $response->to)
            <a class="tw-text-gray-300 tw-bg-[#2f5555] hover:tw-text-gray-300 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-right"></i></a>
            @else
            <a href="{{ $response->next_page_url }}" class="tw-text-white tw-bg-sims-400 hover:tw-bg-[#3F7373] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-right"></i></a>
            @endif
          </div> --}}

                            {{-- @if ($response->prev_page_url)
          <div class="tw-float-right tw-py-5">
            <a href="{{ $response->prev_page_url }}" class="tw-text-white tw-bg-sims-400 hover:tw-bg-[#3F7373] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-left"></i></a>
          </div>
          @else
          <div class="tw-float-right tw-py-5">
            <a class="tw-text-gray-300 tw-bg-[#2f5555] hover:tw-text-gray-300 tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-left"></i></a>
          </div>
          @endif --}}
                            {{-- <div class="tw-float-right tw-py-5 tw-px-3">
            <a href="#" class="tw-text-white tw-bg-sims-400 hover:tw-bg-[#3F7373] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-right"></i></a>
          </div>
          <div class="tw-float-right tw-py-5">
            <a href="#" class="tw-text-white tw-bg-sims-400 hover:tw-bg-[#3F7373] hover:tw-text-white tw-rounded-lg tw-text-xl tw-py-2 tw-px-3"><i class="fa-regular fa-arrow-left"></i></a>
          </div>    --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endif
@endsection

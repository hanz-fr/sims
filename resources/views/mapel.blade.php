@extends('layouts.admin')

@section('content')
    <div class="tw-mx-auto">
        <div class="tw-flex tw-justify-between tw-gap-5 tw-mt-8">
            <div class="tw-flex tw-flex-col">
                <h4 class="tw-font-pop tw-font-bold tw-mt-6 tw-text-sims-400">Data Mata Pelajaran</h4>
            </div>
        </div>

        <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl tw-mb-20">
            <table class="tw-w-full tw-text-sm tw-text-center">
                <thead class="tw-text-md tw-bg-gray-100 tw-text-basic-700 tw-border tw-font-pop">
                    <tr>
                        <th class="tw-py-3 tw-px-6 tw-border-r">ID MAPEL</th>
                        <th class="tw-py-3 tw-px-6 tw-border-r">NAMA MAPEL
                        </th>
                        <th class="tw-py-3 tw-px-6 tw-border-r">WAKTU PEMBUATAN</th>
                        <th class="tw-py-3 tw-px-6 tw-border-r">WAKTU PEMBARUAN</th>
                    </tr>
                </thead>
                <tbody class="tw-text-base">
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">RPLPBO</td>
                        <td class="tw-py-4 tw-px-6 tw-border">Pemrograman Berorientasi Objek</td>
                        <td class="tw-py-4 tw-px-6 tw-border">10 Oktober 2023, 09:00</td>
                        <td class="tw-py-4 tw-px-6 tw-border">27 Januari 2024, 23:44</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">RPLPWPB</td>
                        <td class="tw-py-4 tw-px-6 tw-border">Pemrograman Web dan Perangkat Bergerak (?)</td>
                        <td class="tw-py-4 tw-px-6 tw-border">10 Oktober 2023, 09:00</td>
                        <td class="tw-py-4 tw-px-6 tw-border">27 Januari 2024, 23:44</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">RPLPPL</td>
                        <td class="tw-py-4 tw-px-6 tw-border">Pemodelan Perangkat Lunak</td>
                        <td class="tw-py-4 tw-px-6 tw-border">10 Oktober 2023, 09:00</td>
                        <td class="tw-py-4 tw-px-6 tw-border">27 Januari 2024, 23:44</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">RPLPKK</td>
                        <td class="tw-py-4 tw-px-6 tw-border">Produk Kreatif dan Kewirausahaan</td>
                        <td class="tw-py-4 tw-px-6 tw-border">10 Oktober 2023, 09:00</td>
                        <td class="tw-py-4 tw-px-6 tw-border">27 Januari 2024, 23:44</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">RPLPBO</td>
                        <td class="tw-py-4 tw-px-6 tw-border">Pemrograman Berorientasi Objek</td>
                        <td class="tw-py-4 tw-px-6 tw-border">10 Oktober 2023, 09:00</td>
                        <td class="tw-py-4 tw-px-6 tw-border">27 Januari 2024, 23:44</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">RPLBD</td>
                        <td class="tw-py-4 tw-px-6 tw-border">Basis Data</td>
                        <td class="tw-py-4 tw-px-6 tw-border">10 Oktober 2023, 09:00</td>
                        <td class="tw-py-4 tw-px-6 tw-border">27 Januari 2024, 23:44</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">PPLGKJD</td>
                        <td class="tw-py-4 tw-px-6 tw-border">Komputer dan Jaringan Dasar</td>
                        <td class="tw-py-4 tw-px-6 tw-border">10 Oktober 2023, 09:00</td>
                        <td class="tw-py-4 tw-px-6 tw-border">27 Januari 2024, 23:44</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">PPLGSIS</td>
                        <td class="tw-py-4 tw-px-6 tw-border">Sistem Komunikasi Digital</td>
                        <td class="tw-py-4 tw-px-6 tw-border">10 Oktober 2023, 09:00</td>
                        <td class="tw-py-4 tw-px-6 tw-border">27 Januari 2024, 23:44</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">PPLGPROG</td>
                        <td class="tw-py-4 tw-px-6 tw-border">Pemrograman Dasar</td>
                        <td class="tw-py-4 tw-px-6 tw-border">10 Oktober 2023, 09:00</td>
                        <td class="tw-py-4 tw-px-6 tw-border">27 Januari 2024, 23:44</td>
                    </tr>
                </tbody>
                <tfoot>
            </table>
        </div>
    </div>
@endsection

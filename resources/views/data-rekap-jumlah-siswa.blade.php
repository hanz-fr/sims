@extends('layouts.main')

@section('content')
    <div class="tw-mx-10">
        <div class="tw-flex tw-justify-between tw-gap-5 tw-mt-8">
            <div class="tw-flex tw-flex-col">
                <h4 class="tw-font-pop tw-font-bold tw-mt-6 tw-text-sims-400">Data Rekap Jumlah Siswa</h4>
            </div>
        </div>
        
        <div x-data="{ openTab: 1,
            activeClasses: 'tw-bg-white tw-border tw-border-b-white',
            inactiveClasses: 'tw-bg-gray-200 tw-border'
          }"  class="">
          <div class="tw-float-right">
            <a href="" class="tw-bg-sims-400 tw-text-white hover:tw-text-white tw-font-pop hover:tw-bg-sims-600 tw-px-5 tw-py-2 tw-rounded-lg tw-mr-5">Export</a>
            <a href="" class="tw-bg-sims-400 tw-text-white hover:tw-text-white tw-font-pop hover:tw-bg-sims-600 tw-px-5 tw-py-2 tw-rounded-lg">import</a>
        </div>
            <ul class="tw-flex mb-0 mt-4 tw--ml-6 tw-font-pop tw-text-xl">
              <li @click="openTab = 1" :class="{ 'tw--mb-px': openTab === 1 }">
                <button :class="openTab === 1 ? activeClasses : inactiveClasses" class="tw-rounded-t-2xl tw-text-gray-500 hover:tw-text-sims-400 tw-inline-block tw-py-2 tw-px-10 tw-font-semibold" href="#">
                  X
                </button>
              </li>
              <li @click="openTab = 2" :class="{ 'tw--mb-px': openTab === 2 }">
                <button :class="openTab === 2 ? activeClasses : inactiveClasses" class="tw-rounded-t-2xl tw-text-gray-500 hover:tw-text-sims-400 tw-inline-block tw-py-2 tw-px-10 tw-font-semibold" href="#">
                  XI
                </button>
              </li>
              <li @click="openTab = 3" :class="{ 'tw--mb-px': openTab === 3 }">
                <button :class="openTab === 3 ? activeClasses : inactiveClasses" class="tw-rounded-t-2xl tw-text-gray-500 hover:tw-text-sims-400 tw-inline-block tw-py-2 tw-px-10 tw-font-semibold" href="#">
                  XII
                </button>
              </li>
            </ul>
            <div x-show="openTab === 1" class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl tw-mb-20">
                <table class="tw-w-full tw-text-sm tw-text-center">
                    <thead class="tw-text-md tw-bg-gray-100 tw-text-basic-700 tw-border tw-font-pop">
                        <tr>
                            <th scope="col" rowspan="2" class="tw-py-3 tw-px-6 tw-border-r">KELAS</th>
                            <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA AWAL BULAN</th>
                            <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA KELUAR</th>
                            <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA MASUK</th>
                            <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA AKHIR BULAN</th>
                        </tr>
                        <tr>
                            <th class="tw-border tw-py-3 tw-px-6">P</th>
                            <th class="tw-border tw-py-3 tw-px-6">L</th>
                            <th class="tw-border tw-py-3 tw-px-6">JML</th>
                            <th class="tw-border tw-py-3 tw-px-6">P</th>
                            <th class="tw-border tw-py-3 tw-px-6">L</th>
                            <th class="tw-border tw-py-3 tw-px-6">JML</th>
                            <th class="tw-border tw-py-3 tw-px-6">P</th>
                            <th class="tw-border tw-py-3 tw-px-6">L</th>
                            <th class="tw-border tw-py-3 tw-px-6">JML</th>
                            <th class="tw-border tw-py-3 tw-px-6">P</th>
                            <th class="tw-border tw-py-3 tw-px-6">L</th>
                            <th class="tw-border tw-py-3 tw-px-6">JML</th>
                        </tr>
                    </thead>
                    <tbody class="tw-text-base">
                        @foreach ($kelas as $k)
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $k->id }}</td>
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $k->jumlahSiswaPerempuan }}</td>
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $k->jumlahSiswaLaki }}</td>
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $k->jumlahSiswa }}</td>
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $k->siswaPerempuanKeluar }}</td>
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $k->siswaLakiKeluar}}</td>
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $k->jumlahSiswaKeluar }}</td>
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $k->siswaPerempuanMasuk }}</td>
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $k->siswaLakiMasuk }}</td>
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $k->jumlahSiswaMasuk }}</td>
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $k->jumlahSiswaPerempuan - $k->siswaPerempuanKeluar + $k->siswaPerempuanMasuk }}</td>
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $k->jumlahSiswaLaki - $k->siswaLakiKeluar + $k->siswaLakiMasuk }}</td>
                            <td class="tw-py-4 tw-px-6 tw-border">{{ $k->jumlahSiswaPerempuan - $k->siswaPerempuanKeluar + $k->siswaPerempuanMasuk + $k->jumlahSiswaLaki - $k->siswaLakiKeluar + $k->siswaLakiMasuk }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                      <th>JUMLAH SISWA</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                    </tfoot>
                </table>
                </div>
            <div x-show="openTab === 2" class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl tw-mb-20">
                <table class="tw-w-full tw-text-sm tw-text-center">
                    <thead class="tw-text-md tw-bg-gray-100 tw-text-basic-700 tw-border tw-font-pop">
                        <tr>
                            <th scope="col" rowspan="2" class="tw-py-3 tw-px-6 tw-border-r">KELAS</th>
                            <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA AWAL BULAN</th>
                            <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA KELUAR</th>
                            <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA MASUK</th>
                            <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA AKHIR BULAN</th>
                        </tr>
                        <tr>
                            <th class="tw-border tw-py-3 tw-px-6">P</th>
                            <th class="tw-border tw-py-3 tw-px-6">L</th>
                            <th class="tw-border tw-py-3 tw-px-6">JML</th>
                            <th class="tw-border tw-py-3 tw-px-6">P</th>
                            <th class="tw-border tw-py-3 tw-px-6">L</th>
                            <th class="tw-border tw-py-3 tw-px-6">JML</th>
                            <th class="tw-border tw-py-3 tw-px-6">P</th>
                            <th class="tw-border tw-py-3 tw-px-6">L</th>
                            <th class="tw-border tw-py-3 tw-px-6">JML</th>
                            <th class="tw-border tw-py-3 tw-px-6">P</th>
                            <th class="tw-border tw-py-3 tw-px-6">L</th>
                            <th class="tw-border tw-py-3 tw-px-6">JML</th>
                        </tr>
                    </thead>
                    <tbody class="tw-text-base">
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">XI AKL 1</td>
                            <td class="tw-py-4 tw-px-6 tw-border">29</td>
                            <td class="tw-py-4 tw-px-6 tw-border">5</td>
                            <td class="tw-py-4 tw-px-6 tw-border">34</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">29</td>
                            <td class="tw-py-4 tw-px-6 tw-border">5</td>
                            <td class="tw-py-4 tw-px-6 tw-border">34</td>
                        </tr>
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">XI AKL 2</td>
                            <td class="tw-py-4 tw-px-6 tw-border">30</td>
                            <td class="tw-py-4 tw-px-6 tw-border">4</td>
                            <td class="tw-py-4 tw-px-6 tw-border">34</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">30</td>
                            <td class="tw-py-4 tw-px-6 tw-border">4</td>
                            <td class="tw-py-4 tw-px-6 tw-border">34</td>
                        </tr>
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">XI AKL 3</td>
                            <td class="tw-py-4 tw-px-6 tw-border">29</td>
                            <td class="tw-py-4 tw-px-6 tw-border">4</td>
                            <td class="tw-py-4 tw-px-6 tw-border">33</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">29</td>
                            <td class="tw-py-4 tw-px-6 tw-border">4</td>
                            <td class="tw-py-4 tw-px-6 tw-border">33</td>
                        </tr>
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">XI OTKP 1</td>
                            <td class="tw-py-4 tw-px-6 tw-border">29</td>
                            <td class="tw-py-4 tw-px-6 tw-border">5</td>
                            <td class="tw-py-4 tw-px-6 tw-border">34</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">29</td>
                            <td class="tw-py-4 tw-px-6 tw-border">5</td>
                            <td class="tw-py-4 tw-px-6 tw-border">34</td>
                        </tr>
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">XI OTKP 2</td>
                            <td class="tw-py-4 tw-px-6 tw-border">28</td>
                            <td class="tw-py-4 tw-px-6 tw-border">5</td>
                            <td class="tw-py-4 tw-px-6 tw-border">33</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">28</td>
                            <td class="tw-py-4 tw-px-6 tw-border">5</td>
                            <td class="tw-py-4 tw-px-6 tw-border">33</td>
                        </tr>
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">XI OTKP 3</td>
                            <td class="tw-py-4 tw-px-6 tw-border">29</td>
                            <td class="tw-py-4 tw-px-6 tw-border">5</td>
                            <td class="tw-py-4 tw-px-6 tw-border">34</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">29</td>
                            <td class="tw-py-4 tw-px-6 tw-border">5</td>
                            <td class="tw-py-4 tw-px-6 tw-border">34</td>
                        </tr>
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">XI OTKP 4</td>
                            <td class="tw-py-4 tw-px-6 tw-border">34</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">34</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">34</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">34</td>
                        </tr>
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">XI BDP 1</td>
                            <td class="tw-py-4 tw-px-6 tw-border">20</td>
                            <td class="tw-py-4 tw-px-6 tw-border">10</td>
                            <td class="tw-py-4 tw-px-6 tw-border">30</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">20</td>
                            <td class="tw-py-4 tw-px-6 tw-border">10</td>
                            <td class="tw-py-4 tw-px-6 tw-border">30</td>
                        </tr>
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">XI BDP 2</td>
                            <td class="tw-py-4 tw-px-6 tw-border">18</td>
                            <td class="tw-py-4 tw-px-6 tw-border">14</td>
                            <td class="tw-py-4 tw-px-6 tw-border">32</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">18</td>
                            <td class="tw-py-4 tw-px-6 tw-border">14</td>
                            <td class="tw-py-4 tw-px-6 tw-border">32</td>
                        </tr>
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">XI BDP 3</td>
                            <td class="tw-py-4 tw-px-6 tw-border">19</td>
                            <td class="tw-py-4 tw-px-6 tw-border">16</td>
                            <td class="tw-py-4 tw-px-6 tw-border">35</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">19</td>
                            <td class="tw-py-4 tw-px-6 tw-border">16</td>
                            <td class="tw-py-4 tw-px-6 tw-border">35</td>
                        </tr>
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">XI MLOG</td>
                            <td class="tw-py-4 tw-px-6 tw-border">13</td>
                            <td class="tw-py-4 tw-px-6 tw-border">19</td>
                            <td class="tw-py-4 tw-px-6 tw-border">32</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">13</td>
                            <td class="tw-py-4 tw-px-6 tw-border">19</td>
                            <td class="tw-py-4 tw-px-6 tw-border">32</td>
                        </tr>
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">XI RPL 1</td>
                            <td class="tw-py-4 tw-px-6 tw-border">10</td>
                            <td class="tw-py-4 tw-px-6 tw-border">22</td>
                            <td class="tw-py-4 tw-px-6 tw-border">32</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">10</td>
                            <td class="tw-py-4 tw-px-6 tw-border">22</td>
                            <td class="tw-py-4 tw-px-6 tw-border">32</td>
                        </tr>
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">XI RPL 2</td>
                            <td class="tw-py-4 tw-px-6 tw-border">9</td>
                            <td class="tw-py-4 tw-px-6 tw-border">24</td>
                            <td class="tw-py-4 tw-px-6 tw-border">33</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">9</td>
                            <td class="tw-py-4 tw-px-6 tw-border">24</td>
                            <td class="tw-py-4 tw-px-6 tw-border">33</td>
                        </tr>
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">XI MM 1</td>
                            <td class="tw-py-4 tw-px-6 tw-border">10</td>
                            <td class="tw-py-4 tw-px-6 tw-border">22</td>
                            <td class="tw-py-4 tw-px-6 tw-border">32</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">10</td>
                            <td class="tw-py-4 tw-px-6 tw-border">22</td>
                            <td class="tw-py-4 tw-px-6 tw-border">32</td>
                        </tr>
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">XI MM 2</td>
                            <td class="tw-py-4 tw-px-6 tw-border">10</td>
                            <td class="tw-py-4 tw-px-6 tw-border">22</td>
                            <td class="tw-py-4 tw-px-6 tw-border">32</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">10</td>
                            <td class="tw-py-4 tw-px-6 tw-border">22</td>
                            <td class="tw-py-4 tw-px-6 tw-border">32</td>
                        </tr>
                        <tr class="tw-bg-white tw-border">
                            <td class="tw-py-4 tw-px-6 tw-border">XI TKJ</td>
                            <td class="tw-py-4 tw-px-6 tw-border">8</td>
                            <td class="tw-py-4 tw-px-6 tw-border">24</td>
                            <td class="tw-py-4 tw-px-6 tw-border">32</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">-</td>
                            <td class="tw-py-4 tw-px-6 tw-border">8</td>
                            <td class="tw-py-4 tw-px-6 tw-border">24</td>
                            <td class="tw-py-4 tw-px-6 tw-border">32</td>
                        </tr>
                    </tbody>
                    <tfoot>
                      <th>JUMLAH SISWA</th>
                      <th class="tw-border tw-py-3 tw-px-6">325</th>
                      <th class="tw-border tw-py-3 tw-px-6">201</th>
                      <th class="tw-border tw-py-3 tw-px-6">526</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                      <th class="tw-border tw-py-3 tw-px-6">-</th>
                      <th class="tw-border tw-py-3 tw-px-6">325</th>
                      <th class="tw-border tw-py-3 tw-px-6">201</th>
                      <th class="tw-border tw-py-3 tw-px-6">526</th>
                    </tfoot>
                </table>
                </div>            
            <div x-show="openTab === 3" class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl tw-mb-20">
            <table class="tw-w-full tw-text-sm tw-text-center">
                <thead class="tw-text-md tw-bg-gray-100 tw-text-basic-700 tw-border tw-font-pop">
                    <tr>
                        <th scope="col" rowspan="2" class="tw-py-3 tw-px-6 tw-border-r">KELAS</th>
                        <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA AWAL BULAN</th>
                        <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA KELUAR</th>
                        <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA MASUK</th>
                        <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA AKHIR BULAN</th>
                    </tr>
                    <tr>
                        <th class="tw-border tw-py-3 tw-px-6">P</th>
                        <th class="tw-border tw-py-3 tw-px-6">L</th>
                        <th class="tw-border tw-py-3 tw-px-6">JML</th>
                        <th class="tw-border tw-py-3 tw-px-6">P</th>
                        <th class="tw-border tw-py-3 tw-px-6">L</th>
                        <th class="tw-border tw-py-3 tw-px-6">JML</th>
                        <th class="tw-border tw-py-3 tw-px-6">P</th>
                        <th class="tw-border tw-py-3 tw-px-6">L</th>
                        <th class="tw-border tw-py-3 tw-px-6">JML</th>
                        <th class="tw-border tw-py-3 tw-px-6">P</th>
                        <th class="tw-border tw-py-3 tw-px-6">L</th>
                        <th class="tw-border tw-py-3 tw-px-6">JML</th>
                    </tr>
                </thead>
                <tbody class="tw-text-base">
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">XII AKL 1</td>
                        <td class="tw-py-4 tw-px-6 tw-border">29</td>
                        <td class="tw-py-4 tw-px-6 tw-border">5</td>
                        <td class="tw-py-4 tw-px-6 tw-border">34</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">29</td>
                        <td class="tw-py-4 tw-px-6 tw-border">5</td>
                        <td class="tw-py-4 tw-px-6 tw-border">34</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">XII AKL 2</td>
                        <td class="tw-py-4 tw-px-6 tw-border">30</td>
                        <td class="tw-py-4 tw-px-6 tw-border">4</td>
                        <td class="tw-py-4 tw-px-6 tw-border">34</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">30</td>
                        <td class="tw-py-4 tw-px-6 tw-border">4</td>
                        <td class="tw-py-4 tw-px-6 tw-border">34</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">XII AKL 3</td>
                        <td class="tw-py-4 tw-px-6 tw-border">29</td>
                        <td class="tw-py-4 tw-px-6 tw-border">4</td>
                        <td class="tw-py-4 tw-px-6 tw-border">33</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">29</td>
                        <td class="tw-py-4 tw-px-6 tw-border">4</td>
                        <td class="tw-py-4 tw-px-6 tw-border">33</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">XII OTKP 1</td>
                        <td class="tw-py-4 tw-px-6 tw-border">29</td>
                        <td class="tw-py-4 tw-px-6 tw-border">5</td>
                        <td class="tw-py-4 tw-px-6 tw-border">34</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">29</td>
                        <td class="tw-py-4 tw-px-6 tw-border">5</td>
                        <td class="tw-py-4 tw-px-6 tw-border">34</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">XII OTKP 2</td>
                        <td class="tw-py-4 tw-px-6 tw-border">28</td>
                        <td class="tw-py-4 tw-px-6 tw-border">5</td>
                        <td class="tw-py-4 tw-px-6 tw-border">33</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">28</td>
                        <td class="tw-py-4 tw-px-6 tw-border">5</td>
                        <td class="tw-py-4 tw-px-6 tw-border">33</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">XII OTKP 3</td>
                        <td class="tw-py-4 tw-px-6 tw-border">29</td>
                        <td class="tw-py-4 tw-px-6 tw-border">5</td>
                        <td class="tw-py-4 tw-px-6 tw-border">34</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">29</td>
                        <td class="tw-py-4 tw-px-6 tw-border">5</td>
                        <td class="tw-py-4 tw-px-6 tw-border">34</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">XII OTKP 4</td>
                        <td class="tw-py-4 tw-px-6 tw-border">34</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">34</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">34</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">34</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">XII BDP 1</td>
                        <td class="tw-py-4 tw-px-6 tw-border">20</td>
                        <td class="tw-py-4 tw-px-6 tw-border">10</td>
                        <td class="tw-py-4 tw-px-6 tw-border">30</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">20</td>
                        <td class="tw-py-4 tw-px-6 tw-border">10</td>
                        <td class="tw-py-4 tw-px-6 tw-border">30</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">XII BDP 2</td>
                        <td class="tw-py-4 tw-px-6 tw-border">18</td>
                        <td class="tw-py-4 tw-px-6 tw-border">14</td>
                        <td class="tw-py-4 tw-px-6 tw-border">32</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">18</td>
                        <td class="tw-py-4 tw-px-6 tw-border">14</td>
                        <td class="tw-py-4 tw-px-6 tw-border">32</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">XII BDP 3</td>
                        <td class="tw-py-4 tw-px-6 tw-border">19</td>
                        <td class="tw-py-4 tw-px-6 tw-border">16</td>
                        <td class="tw-py-4 tw-px-6 tw-border">35</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">19</td>
                        <td class="tw-py-4 tw-px-6 tw-border">16</td>
                        <td class="tw-py-4 tw-px-6 tw-border">35</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">XII MLOG</td>
                        <td class="tw-py-4 tw-px-6 tw-border">13</td>
                        <td class="tw-py-4 tw-px-6 tw-border">19</td>
                        <td class="tw-py-4 tw-px-6 tw-border">32</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">13</td>
                        <td class="tw-py-4 tw-px-6 tw-border">19</td>
                        <td class="tw-py-4 tw-px-6 tw-border">32</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">XII RPL 1</td>
                        <td class="tw-py-4 tw-px-6 tw-border">10</td>
                        <td class="tw-py-4 tw-px-6 tw-border">22</td>
                        <td class="tw-py-4 tw-px-6 tw-border">32</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">10</td>
                        <td class="tw-py-4 tw-px-6 tw-border">22</td>
                        <td class="tw-py-4 tw-px-6 tw-border">32</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">XII RPL 2</td>
                        <td class="tw-py-4 tw-px-6 tw-border">9</td>
                        <td class="tw-py-4 tw-px-6 tw-border">24</td>
                        <td class="tw-py-4 tw-px-6 tw-border">33</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">9</td>
                        <td class="tw-py-4 tw-px-6 tw-border">24</td>
                        <td class="tw-py-4 tw-px-6 tw-border">33</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">XII MM 1</td>
                        <td class="tw-py-4 tw-px-6 tw-border">10</td>
                        <td class="tw-py-4 tw-px-6 tw-border">22</td>
                        <td class="tw-py-4 tw-px-6 tw-border">32</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">10</td>
                        <td class="tw-py-4 tw-px-6 tw-border">22</td>
                        <td class="tw-py-4 tw-px-6 tw-border">32</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">XII MM 2</td>
                        <td class="tw-py-4 tw-px-6 tw-border">10</td>
                        <td class="tw-py-4 tw-px-6 tw-border">22</td>
                        <td class="tw-py-4 tw-px-6 tw-border">32</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">10</td>
                        <td class="tw-py-4 tw-px-6 tw-border">22</td>
                        <td class="tw-py-4 tw-px-6 tw-border">32</td>
                    </tr>
                    <tr class="tw-bg-white tw-border">
                        <td class="tw-py-4 tw-px-6 tw-border">XII TKJ</td>
                        <td class="tw-py-4 tw-px-6 tw-border">8</td>
                        <td class="tw-py-4 tw-px-6 tw-border">24</td>
                        <td class="tw-py-4 tw-px-6 tw-border">32</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">-</td>
                        <td class="tw-py-4 tw-px-6 tw-border">8</td>
                        <td class="tw-py-4 tw-px-6 tw-border">24</td>
                        <td class="tw-py-4 tw-px-6 tw-border">32</td>
                    </tr>
                </tbody>
                <tfoot>
                  <th>JUMLAH SISWA</th>
                  <th class="tw-border tw-py-3 tw-px-6">325</th>
                  <th class="tw-border tw-py-3 tw-px-6">201</th>
                  <th class="tw-border tw-py-3 tw-px-6">526</th>
                  <th class="tw-border tw-py-3 tw-px-6">-</th>
                  <th class="tw-border tw-py-3 tw-px-6">-</th>
                  <th class="tw-border tw-py-3 tw-px-6">-</th>
                  <th class="tw-border tw-py-3 tw-px-6">-</th>
                  <th class="tw-border tw-py-3 tw-px-6">-</th>
                  <th class="tw-border tw-py-3 tw-px-6">-</th>
                  <th class="tw-border tw-py-3 tw-px-6">325</th>
                  <th class="tw-border tw-py-3 tw-px-6">201</th>
                  <th class="tw-border tw-py-3 tw-px-6">526</th>
                </tfoot>
            </table>
            </div>
        </div>
    </div>
@endsection

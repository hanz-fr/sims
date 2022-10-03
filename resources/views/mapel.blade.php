@extends('layouts.main')

@section('content')
    <div class="tw-mx-10">
        <div class="tw-flex tw-justify-between tw-gap-5 tw-mt-8">
            <div class="tw-flex tw-flex-col">
                <h4 class="tw-font-pop tw-font-bold tw-mt-6 tw-text-sims-400">Data Mapel Jurusan</h4>
            </div>
        </div>

        <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl tw-mb-20">
            <table class="tw-w-full tw-text-sm tw-text-center">
                <thead class="tw-text-md tw-bg-gray-100 tw-text-basic-700 tw-border tw-font-pop">
                    <tr>
                        <th scope="col" rowspan="2" class="tw-py-3 tw-px-6 tw-border-r">KELAS</th>
                        <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA AWAL BULAN
                        </th>
                        <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA KELUAR</th>
                        <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA MASUK</th>
                        <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA AKHIR BULAN
                        </th>
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
                        <td class="tw-py-4 tw-px-6 tw-border">X AKL 1</td>
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
                        <td class="tw-py-4 tw-px-6 tw-border">X AKL 2</td>
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
                        <td class="tw-py-4 tw-px-6 tw-border">X AKL 3</td>
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
                        <td class="tw-py-4 tw-px-6 tw-border">X OTKP 1</td>
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
                        <td class="tw-py-4 tw-px-6 tw-border">X OTKP 2</td>
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
                        <td class="tw-py-4 tw-px-6 tw-border">X OTKP 3</td>
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
                        <td class="tw-py-4 tw-px-6 tw-border">X OTKP 4</td>
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
                        <td class="tw-py-4 tw-px-6 tw-border">X BDP 1</td>
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
                        <td class="tw-py-4 tw-px-6 tw-border">X BDP 2</td>
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
                        <td class="tw-py-4 tw-px-6 tw-border">X BDP 3</td>
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
                        <td class="tw-py-4 tw-px-6 tw-border">X MLOG</td>
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
                        <td class="tw-py-4 tw-px-6 tw-border">X RPL 1</td>
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
                        <td class="tw-py-4 tw-px-6 tw-border">X RPL 2</td>
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
                        <td class="tw-py-4 tw-px-6 tw-border">X MM 1</td>
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
                        <td class="tw-py-4 tw-px-6 tw-border">X MM 2</td>
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
                        <td class="tw-py-4 tw-px-6 tw-border">X TKJ</td>
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
@endsection

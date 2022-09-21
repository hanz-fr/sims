@extends('layouts.main')

@section('content')
    <div class="tw-mx-10">
        <div class="tw-flex tw-justify-between tw-gap-5 tw-mt-8">
            <div class="tw-flex tw-flex-col">
                <h4 class="tw-font-pop tw-font-bold tw-mt-6 tw-text-sims">Rekap Jumlah Siswa</h4>
            </div>


        </div>

        <div class="tw-flex tw-justify-between sm:tw-flex-wrap sm:tw-gap-5">
            <div class="tw-flex">
                <form action="">
                    <div class="relative tw-border-2 tw-rounded-lg focus:tw-ring-sims">
                        <input type="text" class="tw-py-1 tw-px-5 tw-border-none tw-rounded-md">
                        <i class="fa-solid fa-magnifying-glass tw-pr-5 tw-pl-3 tw-text-slate-600"></i>
                    </div>
                </form>
                <div class="tw-text-base pt-1 tw-text-basic tw-ml-4 tw-mr-2 tw-font-normal tw-font-pop">Show</div>
                <div class="dropdown">
                    <button class="dropdown-toggle tw-bg-gray-300 tw-font-bold tw-py-1 tw-px-3 tw-rounded-xl tw-text"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        10
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">25</a></li>
                        <li><a class="dropdown-item" href="#">50</a></li>
                        <li><a class="dropdown-item" href="#">100</a></li>
                    </ul>
                </div>
                <div class="tw-text-base pt-1 tw-mx-2 tw-font-pop tw-font-normal tw-text-basic">Entries</div>
            </div>
        </div>

        <div class="tw-overflow-x-auto tw-relative tw-shadow-md sm:tw-rounded-xl tw-my-5">
            <table class="tw-w-full tw-text-sm tw-text-center">
                <thead class="tw-text-md tw-bg-gray-100 tw-text-basic tw-border tw-font-pop">
                    <tr>
                        <th scope="col" class="tw-py-3 tw-px-6 tw-border-r">KELAS</th>
                        <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA AWAL BULAN</th>
                        <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA KELUAR</th>
                        <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA MASUK</th>
                        <th scope="col" colspan="3" class="tw-py-3 tw-px-6 tw-border-r">JUMLAH SISWA AKHIR BULAN</th>
                    </tr>
                    <tr>
                        <th></th>
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
@endsection

@extends('layouts.main')

@section('content')
<div class="tw-mx-10">
    <div class="tw-flex sm:tw-flex-col lg:tw-flex-row tw-gap-8">
        
        <div class="lg:tw-w-1/2 sm:tw-w-full tw-flex tw-flex-col tw-mt-8">

            {{-- halo deck --}}
            <section class="tw-px-8 tw-flex tw-pt-8 tw-rounded-xl tw-w-full tw-justify-between tw-bg-no-repeat" style="background-image: url('{{ URL::asset('assets/img/bg-hello.svg') }}')">
                <div class="tw-text-white tw-font-pop tw-h-full">
                    <h1 class="tw-text-2xl">Halo, <span class="tw-font-bold">{{ auth()->user()->nama }}</span></h1>
                    <p class="tw-font-bold">Apa yang akan anda lakukan hari ini? ^_^</p>
                </div>
                <div class="tw-flex">
                    <img src="{{ URL::asset('assets/img/halodek.svg') }}" class="tw-w-full tw-h-auto -tw-mb-1" alt="kerja woi">
                </div>
            </section>

            {{-- chart view --}}
            <section class="tw-bg-white tw-shadow-md tw-h-fit tw-px-10 tw-py-9 lg:tw-w-full sm:tw-w-full tw-mt-7">
                <div class="tw-font-pop tw-text-gray-400 tw-font-bold">Grafik Jumlah Siswa SMKN 11</div>
                <div class="tw-font-pop tw-flex tw-justify-around">
                    <div style="height: 400px">
                        <canvas id="myChart" class="tw-mt-4"></canvas>          
                    </div>   
                    <div>
                        <canvas id="chart" class="tw-mt-4"></canvas>
                    </div>       
                </div>
            </section>


        </div>

        <div class="lg:tw-w-[710px] sm:tw-w-full tw-h-full">

            {{-- carousel info --}}
            <section x-data="{
              currentPage: 0,
              pages: [],
              decrementPage() {if(this.currentPage > 0){ this.currentPage--}},
              incrementPage() {if(this.currentPage < this.pages.length -1) this.currentPage++ },
              setIndex(value) {this.currentPage = value;},
              scrollContainer(value) {$refs.container.scrollLeft = $refs.container.scrollWidth / this.pages.length * value}
              }" 
              @register="pages.push($event.detail.id)" class="tw-flex tw-flex-col md:tw-w-full sm:tw-w-[480px]">
                <div>
                    <div class="tw-float-right tw-mt-3 tw-text-sm tw-flex tw-flex-row">
                        <button @click="decrementPage();
                          scrollContainer(currentPage);" 
                          class="tw-text-sims-400 hover:tw-text-sims-600 tw-pr-2 tw-mt-2">
                          <i class="fa-solid fa-chevron-left"></i>        
                        </button>
                        <button @click="incrementPage();
                          scrollContainer(currentPage);" 
                          class="tw-text-sims-400 hover:tw-text-sims-600 tw-pr-2 tw-mt-2">
                          <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>

                <div x-ref="container" class="tw-overflow-x-scroll tw-w-full tw-flex snap tw-gap-4 tw-mt-4 ">

                    <div x-init="$dispatch('register', {id: 1})"  
                      x-intersect:enter.half="setIndex(0)" x-transition.duration.500ms>
                        <div class="card-dashboard">
                            <div>
                                <a href="/siswa-keluar" class="tw-text-sims-400 hover:tw-text-sims-600 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            </div>
                            <div class="sm:tw-px-12 md:tw-px-8">
                                <div class="tw-flex tw-flex-row">
                                    <div class="tw-text-5xl tw-text-[#FF869C]"><i class="fa-solid fa-user"></i></div>
                                    <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">{{ $mutasi }}</div>
                                </div>
                            </div>
                            <div> 
                                <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Siswa yang keluar</div>
                            </div>
                        </div>
                    </div>

                    <div x-init="$dispatch('register', {id: 2})"  
                      x-intersect:enter.half="setIndex(1)" x-transition.duration.500ms>
                      <div class="card-dashboard">
                          <div>
                              <a href="/rekap-jumlah-siswa" class="tw-text-sims-400 hover:tw-text-sims-600 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                          </div>
                          <div class="sm:tw-px-12 md:tw-px-4">
                              <div class="tw-flex tw-flex-row">
                                  <div class="tw-text-5xl tw-text-[#FFA386]"><i class="fa-solid fa-user"></i></div>
                              <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">{{ $siswa }}</div>
                              </div>
                          </div>
                          <div class="/rekap-jumlah-siswa"> 
                              <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Jumlah Siswa</div>
                          </div>
                      </div>
                    </div>

                    <div x-init="$dispatch('register', {id: 3})"  
                      x-intersect:enter.half="setIndex(2)" x-transition.duration.500ms>
                        <div class="card-dashboard">
                            <div>
                                <a href="/siswa-masuk" class="tw-text-sims-400 hover:tw-text-sims-600 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            </div>
                            <div class="sm:tw-px-12 md:tw-px-8">
                                <div class="tw-flex tw-flex-row">
                                    <div class="tw-text-5xl tw-text-[#6fc5bb]"><i class="fa-solid fa-user"></i></div>
                                    <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">{{ $siswaMasuk }}</div>
                                </div>
                            </div>
                            <div> 
                                <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Siswa Masuk</div>
                            </div>
                        </div>
                    </div>

                    <div x-init="$dispatch('register', {id: 4})"  
                      x-intersect:enter.half="setIndex(3)" x-transition.duration.500ms>
                        <div class="card-dashboard">
                            <div>
                                <a href="/data-alumni" class="tw-text-sims-400 hover:tw-text-sims-600 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            </div>
                            <div class="sm:tw-px-12 md:tw-px-8">
                                <div class="tw-flex tw-flex-row">
                                    <div class="tw-text-5xl tw-text-gray-400"><i class="fa-solid fa-user-graduate"></i></div>
                                    <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">{{ $alumni }}</div>
                                </div>
                            </div>
                            <div> 
                                <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Alumni</div>
                            </div>
                        </div>
                    </div>

                    <div x-init="$dispatch('register', {id: 5})"  
                      x-intersect:enter.half="setIndex(4)" x-transition.duration.500ms>
                        <div class="card-dashboard">
                            <div>
                                <a href="/jurusan" class="tw-text-sims-400 hover:tw-text-sims-600 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            </div>
                            <div class="sm:tw-px-12 md:tw-px-8">
                                <div class="tw-flex tw-flex-row">
                                    <div class="tw-text-5xl tw-text-sky-400"><i class="fa-solid fa-chalkboard-user"></i></div>
                                    <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">{{ $kelas }}</div>
                                </div>
                            </div>
                            <div> 
                                <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Kelas</div>
                            </div>
                        </div>
                    </div>

                    <div x-init="$dispatch('register', {id: 6})"  
                      x-intersect:enter.half="setIndex(5)" x-transition.duration.500ms>
                        <div class="card-dashboard">
                            <div>
                                <a href="/jurusan" class="tw-text-sims-400 hover:tw-text-sims-600 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            </div>
                            <div class="sm:tw-px-12 md:tw-px-8">
                                <div class="tw-flex tw-flex-row">
                                    <div class="tw-text-5xl tw-text-indigo-400"><i class="fa-solid fa-shapes"></i></div>
                                    <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">{{ $jurusan }}</div>
                                </div>
                            </div>
                            <div> 
                                <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Jurusan</div>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
            {{-- end of card carousel --}}
            
            {{-- quick access --}}
            <section class="tw-bg-white tw-w-full tw-items-center tw-justify-center tw-shadow-md tw-font-pop tw-border tw-mt-6 tw-flex tw-h-fit tw-py-10 tw-flex-col">
              <div class="tw-text-xl tw-text-gray-400 tw-font-bold tw-mb-10">Quick Access</div>
                <div class="tw-flex lg:tw-flex-row sm:tw-flex-col tw-justify-between tw-gap-3 tw-p-2">
                    @can('rekap-siswa')
                    <a href="/rekap-jumlah-siswa" class="tw-group">
                        <div class="tw-justify-center tw-flex lg:tw-flex-col sm:tw-flex-row tw-text-center tw-border-2 tw-p-6 tw-items-center tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims-400 tw-transition-all tw-duration-300">
                            <div class="tw-text-4xl tw-text-sims-400 group-hover:tw-text-white"><i class="fa-solid fa-graduation-cap"></i></div>
                            <div class="tw-text-gray-500 tw-text-sm tw-font-normal lg:tw-mt-4 sm:tw-ml-4 group-hover:tw-text-white">Data Jumlah Siswa</div>
                        </div>
                    </a>
                    @endcan
                    <a href="/data-induk-siswa?perPage=10&page=1" class="tw-group">
                        <div class="tw-justify-center tw-flex lg:tw-flex-col sm:tw-flex-row  tw-text-center tw-border-2 tw-p-6 tw-items-center tw-bg-white tw-rounded-lg group-hover:tw-bg-sims-400 group-hover:tw-text-white tw-transition-all tw-duration-300">
                            <div class="tw-text-4xl tw-text-sims-400 group-hover:tw-text-white"><i class="fa-regular fa-book-open"></i></div>
                            <div class="tw-text-gray-500 tw-text-sm tw-font-normal lg:tw-mt-4 sm:tw-ml-4 group-hover:tw-text-white">Data Induk Siswa</div>
                        </div>
                    </a>
                    @can('rekap-siswa')
                    <a href="/siswa-keluar" class="tw-group">
                        <div class="tw-justify-center tw-flex lg:tw-flex-col sm:tw-flex-row  tw-text-center tw-border-2 tw-p-6 tw-items-center tw-bg-white tw-rounded-lg group-hover:tw-bg-sims-400 group-hover:tw-text-white  tw-transition-all tw-duration-300">
                            <div class="tw-text-4xl tw-text-sims-400 group-hover:tw-text-white"><i class="fa-solid fa-user-group"></i></div>
                            <div class="tw-text-gray-500 tw-text-sm tw-font-normal lg:tw-mt-4 sm:tw-ml-4 group-hover:tw-text-white">Data Perpindahan</div>
                        </div>
                    </a>
                    @endcan
                </div>
            </section>

            {{-- jumlah per jurusan --}}
            <section class="tw-bg-white tw-font-pop tw-shadow-md tw-flex tw-flex-col tw-my-5">
                <div class="tw-px-10 tw-mt-10">
                  <div class=" tw-text-gray-400 tw-font-bold">Persebaran Murid SMKN 11</div>
                    <ul class="tw-flex tw-justify-center md:tw-gap-10 sm:tw-gap-2 tw-list-none tw-py-10">
                        <li class="tw-flex-row tw-text-center">
                            <div class="tw-text-2xl tw-text-sims-400 tw-font-bold">{{ $jumlahSiswaAKL }}</div>
                            <div class=" tw-font-light tw-text-gray-400">AKL</div>
                        </li>
                        <li class="tw-flex-row tw-text-center">
                            <div class="tw-text-2xl tw-text-sims-400 tw-font-bold">{{ $jumlahSiswaDKV }}</div>
                            <div class=" tw-font-light tw-text-gray-400">DKV</div>
                        </li>
                        <li class="tw-flex-row tw-text-center">
                            <div class="tw-text-2xl tw-text-sims-400 tw-font-bold">{{ $jumlahSiswaMPLB }}</div>
                            <div class=" tw-font-light tw-text-gray-400">MPLB</div>
                        </li>
                        <li class="tw-flex-row tw-text-center">
                            <div class="tw-text-2xl tw-text-sims-400 tw-font-bold">{{ $jumlahSiswaPM }}</div>
                            <div class=" tw-font-light tw-text-gray-400">PM</div>
                        </li>
                        <li class="tw-flex-row tw-text-center">
                            <div class="tw-text-2xl tw-text-sims-400 tw-font-bold">{{ $jumlahSiswaPPLG }}</div>
                            <div class=" tw-font-light tw-text-gray-400">PPLG</div>
                        </li>
                        <li class="tw-flex-row tw-text-center">
                            <div class="tw-text-2xl tw-text-sims-400 tw-font-bold">{{ $jumlahSiswaTJKT }}</div>
                            <div class=" tw-font-light tw-text-gray-400">TJKT</div>
                        </li>
                    </ul>
                </div>
            </section>

        </div>

    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chart');
    const chart = new Chart(ctx, {
        type: 'polarArea',
        data: {
            labels: ['Siswa Masuk', 'Siswa Keluar', 'Siswa Tidak Naik'],
            datasets: [{
                label: '# of Votes',
                data: [{{ $siswaMasuk }}, {{ $siswaKeluar }}, {{ $siswaTdkNaik }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scale: {
                ticks: {
                    precision: 0
                }
            }
        },
    });
</script>


<script>


const data = {
    datasets: [{
        data: [{{ $jumlahSiswaX }}, {{ $jumlahSiswaXI }}, {{ $jumlahSiswaXII }}],
        backgroundColor: ['rgba(144,194,194,1)','rgba(255,163,134,1)','rgba(149,187,232,1)'], 
        hoverBackgroundColor: ['rgba(146, 212, 212,1)','rgba(255, 177, 153,1)','rgba(181, 215, 255)'], 
        hoverBorderColor: ['rgba(146, 212, 212,1)','rgba(255, 177, 153,1)','rgba(181, 215, 255)'],
        hoverOffset: 2
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'Kelas X',
        'Kelas XI',
        'Kelas XII'
    ]
};

const config = {
  type: 'doughnut',
  data: data,
  options: {  
    responsive: true,
    maintainAspectRatio: false,
    layout: {
            padding: {
                bottom: 10,
                top: 20
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
@extends('layouts.main')

@section('content')
<div class="tw-mx-10">
  <div class="tw-flex sm:tw-flex-col md:tw-flex-col lg:tw-flex-row tw-gap-8">
    
    <div class="tw-flex tw-flex-col tw-w-1/2">
          {{-- card jumlah --}}
        <div x-data="{
            currentPage: 0,
            pages: [],
            decrementPage() {if(this.currentPage > 0){ this.currentPage--}},
            incrementPage() {if(this.currentPage < this.pages.length -1) this.currentPage++ },
            setIndex(value) {this.currentPage = value;},
            scrollContainer(value) {$refs.container.scrollLeft = $refs.container.scrollWidth / this.pages.length * value}
        }" 
        @register="pages.push($event.detail.id)" class="tw-flex tw-flex-col">
        <div class="">
          <div class="tw-float-right tw-mt-3 tw-flex tw-flex-row">
            <button @click="decrementPage();
            scrollContainer(currentPage);" 
            class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right">
            <i class="fa-solid fa-chevron-left"></i>        
            </button>
            <button @click="incrementPage();
            scrollContainer(currentPage);" 
            class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right">
            <i class="fa-solid fa-chevron-right"></i>
            </button>
          </div>
        </div>
      <div x-ref="container"
      class="tw-overflow-x-scroll tw-w-[850px] snap tw-flex">

        <div x-init="$dispatch('register', {id: 1})"  
        x-intersect:enter.half="setIndex(0)" 
        class="tw-w-full tw-flex-shrink-0">
        <ul class="list-unstyled tw-grid-rows-3 tw-gap-9 tw-flex tw-mt-3">
          <li class="">
            <div class=" tw-h-fit tw-pb-8 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
              <div class="tw-float-right">
                <a href="/siswa-keluar" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
              </div>
              <div class="sm:tw-px-12 md:tw-px-8">
                <div class="tw-flex tw-flex-row">
                  <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                  <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">658</div>
                </div>
              </div>
              <div class=""> 
                <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Siswa yang keluar</div>
              </div>
            </div>
          </li>
          <li class="">
            <div class=" tw-h-fit tw-pb-8 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
              <div class="tw-float-right">
                <a href="/siswa-keluar" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
              </div>
              <div class="sm:tw-px-12 md:tw-px-8">
                <div class="tw-flex tw-flex-row">
                  <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                  <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">658</div>
                </div>
              </div>
              <div class=""> 
                <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Siswa yang keluar</div>
              </div>
            </div>
          </li>
          <li class="">
            <div class=" tw-h-fit tw-pb-8 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
              <div class="tw-float-right">
                <a href="" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
              </div>
              <div class="sm:tw-px-12 md:tw-px-8">
                <div class="tw-flex tw-flex-row">
                  <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                  <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">659</div>
                </div>
              </div>
              <div class="/rekap-siswa"> 
                <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Jumlah Siswa</div>
              </div>
            </div>
          </li>
          <li class="">
            <div class=" tw-h-fit tw-pb-8 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
              <div class="tw-float-right">
                <a href="/siswa-masuk" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
              </div>
              <div class="sm:tw-px-12 md:tw-px-8">
                <div class="tw-flex tw-flex-row">
                  <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                  <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">659</div>
                </div>
              </div>
              <div class=""> 
                <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Siswa yang masuk</div>
              </div>
            </div>
          </li>
        </ul>
        </div>

        <div x-init="$dispatch('register', {id: 2})"  
        x-intersect:enter.half="setIndex(1)" 
        class="tw-w-full tw-flex-shrink-0">
        <ul class="list-unstyled tw-grid-rows-3 tw-gap-9 tw-flex tw-mt-3">
          <li class="">
            <div class=" tw-h-fit tw-pb-8 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
              <div class="tw-float-right">
                <a href="/siswa-keluar" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
              </div>
              <div class="sm:tw-px-12 md:tw-px-8">
                <div class="tw-flex tw-flex-row">
                  <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                  <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">658</div>
                </div>
              </div>
              <div class=""> 
                <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Siswa yang keluar</div>
              </div>
            </div>
          </li>
          <li class="">
            <div class=" tw-h-fit tw-pb-8 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
              <div class="tw-float-right">
                <a href="/siswa-keluar" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
              </div>
              <div class="sm:tw-px-12 md:tw-px-8">
                <div class="tw-flex tw-flex-row">
                  <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                  <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">658</div>
                </div>
              </div>
              <div class=""> 
                <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Siswa yang keluar</div>
              </div>
            </div>
          </li>
          <li class="">
            <div class=" tw-h-fit tw-pb-8 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
              <div class="tw-float-right">
                <a href="" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
              </div>
              <div class="sm:tw-px-12 md:tw-px-8">
                <div class="tw-flex tw-flex-row">
                  <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                  <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">659</div>
                </div>
              </div>
              <div class="/rekap-siswa"> 
                <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Jumlah Siswa</div>
              </div>
            </div>
          </li>
          <li class="">
            <div class=" tw-h-fit tw-pb-8 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
              <div class="tw-float-right">
                <a href="/siswa-masuk" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
              </div>
              <div class="sm:tw-px-12 md:tw-px-8">
                <div class="tw-flex tw-flex-row">
                  <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                  <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">659</div>
                </div>
              </div>
              <div class=""> 
                <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Siswa yang masuk</div>
              </div>
            </div>
          </li>
        </ul>
        </div>

      <div x-init="$dispatch('register', {id: 3})"  
      x-intersect:enter.half="setIndex(2)" 
      class="tw-w-full tw-flex-shrink-0">
      <ul class="list-unstyled tw-grid-rows-3 tw-gap-9 tw-flex tw-mt-3">
        <li class="">
          <div class=" tw-h-fit tw-pb-8 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
            <div class="tw-float-right">
              <a href="/siswa-keluar" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
            <div class="sm:tw-px-12 md:tw-px-8">
              <div class="tw-flex tw-flex-row">
                <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">658</div>
              </div>
            </div>
            <div class=""> 
              <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Siswa yang keluar</div>
            </div>
          </div>
        </li>
        <li class="">
          <div class=" tw-h-fit tw-pb-8 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
            <div class="tw-float-right">
              <a href="/siswa-keluar" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
            <div class="sm:tw-px-12 md:tw-px-8">
              <div class="tw-flex tw-flex-row">
                <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">658</div>
              </div>
            </div>
            <div class=""> 
              <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Siswa yang keluar</div>
            </div>
          </div>
        </li>
        <li class="">
          <div class=" tw-h-fit tw-pb-8 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
            <div class="tw-float-right">
              <a href="" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
            <div class="sm:tw-px-12 md:tw-px-8">
              <div class="tw-flex tw-flex-row">
                <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">659</div>
              </div>
            </div>
            <div class="/rekap-siswa"> 
              <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Jumlah Siswa</div>
            </div>
          </div>
        </li>
        <li class="">
          <div class=" tw-h-fit tw-pb-8 tw-flex tw-flex-col tw-rounded-lg tw-font-pop tw-border tw-border-sims tw-bg-white">
            <div class="tw-float-right">
              <a href="/siswa-masuk" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
            <div class="sm:tw-px-12 md:tw-px-8">
              <div class="tw-flex tw-flex-row">
                <div class="tw-text-5xl tw-text-sims"><i class="fa-solid fa-user"></i></div>
                <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">659</div>
              </div>
            </div>
            <div class=""> 
              <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Siswa yang masuk</div>
            </div>
          </div>
        </li>
      </ul>
        </div>
      </div>
        </div>
      
      {{-- chart view --}}
      <div class="tw-bg-white tw-shadow-md tw-h-fit tw-py-10 tw-w-full">
        <div class="tw-px-10 tw-font-pop">
          <div class="tw-text-base tw-text-gray-400 tw-font-bold">Data Jumlah Siswa SMKN 11</div>
          <div>
            <canvas id="myChart" class="tw-mt-4"></canvas>          
          </div>          
        </div>
      </div>
    </div>

    {{-- kuota pendaftar --}}
    <div class="tw-w-1/2 tw-mt-7">
      <div class="tw-bg-white tw-font-pop tw-shadow-md tw-flex tw-flex-col">
        <div class="tw-float-right">
          <a href="#" class="tw-text-gray-500 tw-mr-4 hover:tw-text-gray-600 tw-pr-2 tw-mt-5 tw-text-lg tw-float-right"><i class="fa-solid fa-sliders-simple"></i></a>
        </div>
        <div class="tw-px-10">
        <div class="tw-text-base tw-text-gray-400 tw-font-bold">Kuota Pendaftaran SMKN 11</div>
          <ul class="tw-flex tw-justify-center tw-flex-row tw-gap-10 list-unstyled tw-mx-11 tw-mt-12 tw-mb-20">
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-sims tw-font-bold">18</div>
              <div class="tw-text-base tw-font-light tw-text-gray-400">AKL</div>
            </li>
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-sims tw-font-bold">12</div>
              <div class="tw-text-base tw-font-light tw-text-gray-400">DKV</div>
            </li>
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-sims tw-font-bold">25</div>
              <div class="tw-text-base tw-font-light tw-text-gray-400">MPLB</div>
            </li>
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-sims tw-font-bold">19</div>
              <div class="tw-text-base tw-font-light tw-text-gray-400">Pemasaran</div>
            </li>
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-sims tw-font-bold">12</div>
              <div class="tw-text-base tw-font-light tw-text-gray-400">PPLG</div>
            </li>
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-sims tw-font-bold">6</div>
              <div class="tw-text-base tw-font-light tw-text-gray-400">TJKT</div>
            </li>
          </ul>
        </div>
      </div>
      {{-- <div class="tw-bg-white tw-shadow-md tw-h-96 tw-w-full">
      </div> --}}
      {{-- quick access --}}
      <div class="tw-bg-white tw-items-center tw-justify-center tw-shadow-md tw-font-pop tw-border tw-mt-6 sm:tw-px-14 tw-flex tw-h-fit tw-py-20 tw-flex-col">
        <div class="tw-text-lg tw-text-gray-400 tw-font-bold tw-mb-10">Quick Access</div>
          <ul class="tw-flex tw-flex-row grid-rows-3 tw-justify-between tw-gap-3 tw-p-2 list-unstyled">
            <a href="/rekap-siswa" class="tw-group">
              <li class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-px-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims tw-transition-all tw-duration-300">
                <div class="tw-text-4xl tw-text-sims group-hover:tw-text-white"><i class="fa-solid fa-graduation-cap"></i></div>
                <div class="tw-text-sm tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Jumlah Siswa</div>
              </li>
            </a>
            <a href="/data-induk-siswa" class="tw-group">
              <li class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-px-4 tw-bg-white tw-rounded-lg group-hover:tw-bg-sims group-hover:tw-text-white tw-transition-all tw-duration-300">
                <div class="tw-text-4xl tw-text-sims group-hover:tw-text-white"><i class="fa-regular fa-book-open"></i></div>
                <div class="tw-text-sm tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Induk Siswa</div>
              </li>
            </a>
            <a href="/siswa-keluar" class="tw-group">
              <li class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-px-4 tw-bg-white tw-rounded-lg group-hover:tw-bg-sims group-hover:tw-text-white  tw-transition-all tw-duration-300">
                <div class="tw-text-4xl tw-text-sims group-hover:tw-text-white"><i class="fa-solid fa-user-group"></i></div>
                <div class="tw-text-sm tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Perpindahan</div>
              </li>
            </a>
          </ul>
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
    label: 'Rekap Jumlah Siswa',
    backgroundColor: '#4D9E9E',
    borderColor: '#4D9E9E',
    data: [800, 450, 500, 300, 200],
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
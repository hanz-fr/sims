@extends('layouts.main')

@section('content')
<div class="tw-mx-10">
  <div class="tw-flex sm:tw-flex-col lg:tw-flex-row tw-gap-8">
    
    <div class="tw-w-1/2">
          {{-- card jumlah --}}
        <div class="tw-flex tw-flex-col">
          <div>
            <a href="#carouselExampleIndicators2" class="tw-text-sims-400 hover:tw-text-sims-600 tw-pr-2 tw-mt-2 tw-text-sm tw-float-right" role="button" data-slide="prev">
                <i class="fa-solid fa-chevron-right"></i>        
            </a>
            <a href="#carouselExampleIndicators2" class="tw-text-sims-400 hover:tw-text-sims-600 tw-pr-2 tw-mt-2 tw-text-sm tw-float-right" role="button" data-slide="next">
                <i class="fa-solid fa-chevron-left"></i>        
            </a>
        </div>
    
            <div>
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active"> 
                            <div class="tw-flex tw-gap-4">
                                <div class="card-dashboard">
                                  <div class="tw-float-right">
                                    <a href="/siswa-keluar" class="tw-text-sims-400 hover:tw-text-sims-600 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                  </div>
                                  <div class="sm:tw-px-12 md:tw-px-8">
                                    <div class="tw-flex tw-flex-row">
                                      <div class="tw-text-5xl tw-text-gray-400"><i class="fa-solid fa-user-graduate"></i></div>
                                      <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">{{ $alumni }}</div>
                                    </div>
                                  </div>
                                  <div class=""> 
                                    <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Alumni</div>
                                  </div>
                                </div>
                                <div class="card-dashboard">
                                  <div class="tw-float-right">
                                    <a href="/siswa-keluar" class="tw-text-sims-400 hover:tw-text-sims-600 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                  </div>
                                  <div class="sm:tw-px-12 md:tw-px-8">
                                    <div class="tw-flex tw-flex-row">
                                      <div class="tw-text-5xl tw-text-[#FF869C]"><i class="fa-solid fa-user"></i></div>
                                      <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">{{ $mutasi }}</div>
                                    </div>
                                  </div>
                                  <div class=""> 
                                    <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Siswa yang keluar</div>
                                  </div>
                                </div>
                                <div class="card-dashboard">
                                  <div class="tw-float-right">
                                    <a href="" class="tw-text-sims-400 hover:tw-text-sims-600 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                  </div>
                                  <div class="sm:tw-px-12 md:tw-px-8">
                                    <div class="tw-flex tw-flex-row">
                                      <div class="tw-text-5xl tw-text-[#6fc5bb]"><i class="fa-solid fa-user"></i></div>
                                      <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">{{ $siswaMasuk }}</div>
                                    </div>
                                  </div>
                                  <div class="/rekap-siswa"> 
                                    <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Siswa Masuk</div>
                                  </div>
                                </div>
                                <div class="card-dashboard">
                                  <div class="tw-float-right">
                                    <a href="" class="tw-text-sims-400 hover:tw-text-sims-600 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                  </div>
                                  <div class="sm:tw-px-12 md:tw-px-8">
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
                        </div>
                        <div class="carousel-item"> 
                            <div class="tw-flex tw-gap-4">
                                <div class="card-dashboard">
                                  <div class="tw-float-right">
                                    <a href="/siswa-keluar" class="tw-text-sims-400 hover:tw-text-sims-600 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                  </div>
                                  <div class="sm:tw-px-12 md:tw-px-8">
                                    <div class="tw-flex tw-flex-row">
                                      <div class="tw-text-5xl tw-text-indigo-400"><i class="fa-solid fa-shapes"></i></div>
                                      <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">{{ $jurusan }}</div>
                                    </div>
                                  </div>
                                  <div class=""> 
                                    <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Jurusan</div>
                                  </div>
                                </div>
                                <div class="card-dashboard">
                                  <div class="tw-float-right">
                                    <a href="/siswa-masuk" class="tw-text-sims-400 hover:tw-text-sims-600 tw-mt-2 tw-text-sm tw-float-right"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                  </div>
                                  <div class="sm:tw-px-12 md:tw-px-8">
                                    <div class="tw-flex tw-flex-row">
                                      <div class="tw-text-5xl tw-text-sims-400"><i class="fa-solid fa-book"></i></div>
                                      <div class="tw-text-2xl tw-font-bold tw-text-gray-500 tw-py-3 tw-pl-3">{{ $mapel }}</div>
                                    </div>
                                  </div>
                                  <div class=""> 
                                    <div class="tw-text-sm tw-text-gray-500 tw-font-base tw-text-center tw-mt-2">Mapel</div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      {{-- end of card carousel --}}
      
      {{-- quick access --}}
      <section class="tw-bg-white tw-items-center tw-justify-center tw-shadow-md tw-font-pop tw-border tw-mt-6 sm:tw-px-14 tw-flex tw-h-fit tw-py-20 tw-flex-col">
        <div class="tw-text-lg tw-text-gray-400 tw-font-bold tw-mb-10">Quick Access</div>
          <ul class="tw-flex grid-rows-3 tw-justify-between tw-gap-3 tw-p-2 list-unstyled">
            <a href="/rekap-jumlah-siswa" class="tw-group">
              <li class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-px-4 tw-bg-white tw-rounded-lg group-hover:tw-text-white group-hover:tw-bg-sims-400 tw-transition-all tw-duration-300">
                <div class="tw-text-4xl tw-text-sims-400 group-hover:tw-text-white"><i class="fa-solid fa-graduation-cap"></i></div>
                <div class="tw-text-sm tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Jumlah Siswa</div>
              </li>
            </a>
            <a href="/data-induk-siswa?perPage=10" class="tw-group">
              <li class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-px-4 tw-bg-white tw-rounded-lg group-hover:tw-bg-sims-400 group-hover:tw-text-white tw-transition-all tw-duration-300">
                <div class="tw-text-4xl tw-text-sims-400 group-hover:tw-text-white"><i class="fa-regular fa-book-open"></i></div>
                <div class="tw-text-sm tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Induk Siswa</div>
              </li>
            </a>
            <a href="/siswa-keluar" class="tw-group">
              <li class="tw-flex tw-flex-col tw-justify-center tw-text-center tw-border-2 tw-py-4 tw-px-4 tw-bg-white tw-rounded-lg group-hover:tw-bg-sims-400 group-hover:tw-text-white  tw-transition-all tw-duration-300">
                <div class="tw-text-4xl tw-text-sims-400 group-hover:tw-text-white"><i class="fa-solid fa-user-group"></i></div>
                <div class="tw-text-sm tw-text-gray-500 tw-font-normal tw-mt-3 group-hover:tw-text-white">Data Perpindahan</div>
              </li>
            </a>
          </ul>
      </section>

    </div>

    <div class="md:tw-w-1/2 sm:tw-w-full tw-mt-7">
    {{-- kuota pendaftar --}}
      {{-- <div class="tw-bg-white tw-font-pop tw-shadow-md tw-flex tw-flex-col">
        <div class="tw-px-10 tw-mt-10">
        <div class=" tw-text-gray-400 tw-font-bold">Kuota Pendaftaran SMKN 11</div>
          <ul class="tw-flex tw-justify-center md:tw-gap-10 sm:tw-gap-2 list-unstyled tw-mt-12 tw-mb-20">
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-slate-200 tw-font-normal">-</div>
              <div class=" tw-font-light tw-text-gray-400">AKL</div>
            </li>
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-slate-200 tw-font-normal">-</div>
              <div class=" tw-font-light tw-text-gray-400">DKV</div>
            </li>
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-slate-200 tw-font-normal">-</div>
              <div class=" tw-font-light tw-text-gray-400">MPLB</div>
            </li>
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-slate-200 tw-font-normal">-</div>
              <div class=" tw-font-light tw-text-gray-400">PM</div>
            </li>
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-slate-200 tw-font-normal">-</div>
              <div class=" tw-font-light tw-text-gray-400">PPLG</div>
            </li>
            <li class="tw-flex-row tw-text-center">
              <div class="tw-text-2xl tw-text-slate-200 tw-font-normal">-</div>
              <div class=" tw-font-light tw-text-gray-400">TJKT</div>
            </li>
          </ul>
        </div>
      </div> --}}
      {{-- <div class="tw-bg-white tw-shadow-md tw-h-96 tw-w-full">
      </div> --}}
      {{-- chart view --}}
      <div class="tw-bg-white tw-shadow-md tw-h-fit tw-py-10 tw-w-full">
        <div class="tw-px-10 tw-font-pop">
          <div class=" tw-text-gray-400 tw-font-bold">Data Jumlah Siswa SMKN 11</div>
          <div>
            <canvas id="myChart" class="tw-mt-4"></canvas>          
          </div>          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // chart view dasbrot
const labels = [
  '-',
  '-',
  '-',
  '-',
];
const data = {
  labels: labels,
  datasets: [{
    label: 'Rekap Jumlah Siswa',
    backgroundColor: '#4D9E9E',
    borderColor: '#4D9E9E',
    data: [{{ $siswa }}],
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
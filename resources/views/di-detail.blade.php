@extends('layouts.main')

@section('content')
  <div class="tw-container">
    <div class="tw-text-3xl tw-text-sims tw-font-pop tw-font-semibold tw-flex tw-flex-row tw-mt-9 tw-mx-9">Data Siswa</div>
    {{-- foto profil --}}
    <div class="tw-flex tw-font-pop">
      <div class="tw-w-2/5 tw-text-center tw-text-basic tw-text-xl tw-font-pop tw-font-semibold tw-m-9">
        <img src="" alt="Pas Foto" srcset="" class="tw-rounded-xl tw-mb-10 tw-w-40 tw-h-52 tw-border tw-border-slate-400 tw-mx-auto tw-mt-20">
        <div>Mudashir Alhamdulillah</div>
        <div>NIS/NISN</div>
        <div>Kelas/Jurusan</div>
      </div>
      
      {{-- data siswa n rekap nilai --}}
      <div x-data="{ openTab: 1,
        activeClasses: 'tw-bg-white',
        inactiveClasses: 'tw-bg-gray-200'
      }"  class="tw-w-3/5 tw-p-6">
        <ul class="tw-flex tw-border-b">
          <li @click="openTab = 1" :class="{ 'tw--mb-px': openTab === 1 }" class="tw--mb-px tw-mr-1">
            <button :class="openTab === 1 ? activeClasses : inactiveClasses" class="tw-rounded-t-2xl tw-text-basic tw-border hover:tw-text-sims tw-inline-block tw-py-2 tw-px-4 tw-font-semibold" href="#">
              Data Diri
            </button>
          </li>
          <li @click="openTab = 2" :class="{ 'tw--mb-px': openTab === 2 }">
            <button :class="openTab === 2 ? activeClasses : inactiveClasses" class="tw-rounded-t-2xl tw-text-basic tw-border hover:tw-text-sims tw-inline-block tw-py-2 tw-px-4 tw-font-semibold" href="#">
              Rekap Nilai
            </button>
          </li>
        </ul>
        <div class="tw-w-full tw-pt-4">
          <div x-show="openTab === 1">Tab #1</div>
          <div x-show="openTab === 2">Tab #2</div>
        </div>
      </div>
    </div>
  </div>
@endsection
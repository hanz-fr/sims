@extends('layouts.admin')

@section('content')
<div class="tw-w-screen tw-mx-10">
    <section class="tw-flex tw-gap-4 mt-8">
        <a href="/admin/nilai-mapel">
          <i class="fa-solid fa-chevron-left tw-text-gray-400 tw-text-2xl"></i>
        </a>
        <i class="fa-solid fa-file-chart-column tw-text-admin-300 tw-text-3xl"></i>
        <div class="tw-text-2xl tw-font-pop tw-font-semibold tw-text-gray-300">Detail Nilai Mapel</div>
      </section>

    <div class="card-data-white tw-mt-8">
        <div class="tw-flex tw-bg-admin-400 tw-font-ubuntu tw-text-white tw-rounded-l-xl tw-gap-8 tw-py-16 tw-px-12">
           <div class="tw-flex tw-flex-col">
              <i class="fa-solid fa-user tw-text-7xl tw-mx-5"></i>
           </div>
        </div>
        <div class="tw-w-full tw-text-lg tw-font-ubuntu tw-text-silver-400 tw-font-semibold tw-justify-center tw-flex tw-flex-col tw-pl-16">
            <h1 class="tw-font-pop tw-text-2xl tw-py-4">Ibnu Asep Bin Budi</h2>
            <h3 class="">NIS : <span class="tw-font-medium">2009381728</span></h3>
            <h3 class="">ID RAPOR : <span class="tw-font-medium">RPT-1213</span></h3>
            <h3 class="">X RPL 2</h3>
            <div class="tw-flex tw-justify-end ">
              <h3 class="tw-mr-8">Updated: <span class="tw-font-medium">September 2023</span></h3>
            </div>
        </div>
  </div>
</div>
@endsection
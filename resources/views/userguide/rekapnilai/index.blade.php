@extends('layouts.main-new')

@section('content')
<div class="tw-container tw-mx-auto">

    <!-- spacing !-->
    <div class="tw-mt-14"></div> 
    <!-------------->

    <div role="status" class="tw-flex tw-justify-center">
        <div class="lg:tw-w-1/2">
            <img src="{{ URL::asset('assets/img/hc-header-rekapnilai.svg') }}" class="" alt="hc-header-img">
        </div>
    </div>
    

    <!-- spacing !-->
    <div class="tw-mt-12"></div> 
    <!-------------->

    <div class="tw-mx-60">

        <div class="tw-text-center hc-title-3xl tw-mb-24">Rekap Nilai</div>

        <div class="row tw-justify-center tw-items-center">

            <div class="col-lg-6 pr-5">
            <h3 class="hc-title-2xl tw-mb-5"><span class="tw-text-bluewood-800">Tentang</span> Rekap Nilai</h3>
                <p class="tw-text-justify tw-mt-5 hc-text-lg">
                    Halaman ini berisi semua rekapitulasi nilai siswa dari semester 1 
                    sampai 5, rekap nilai sendiri juga merupakan bagian dari buku induk 
                    siswa. 
                </p>
            </div>

            <div class="col-lg-6 tw-pl-10">
                <div class="tw-rounded-lg tw-overflow-hidden tw-drop-shadow-lg">
                    <img src="{{ URL::asset('assets/img/login.jpeg') }}" alt="">
                </div>
            </div>

        </div>

        <!-- spacing !-->
        <div class="tw-my-24"></div> 
        <!-------------->
    </div>
</div>
@endsection
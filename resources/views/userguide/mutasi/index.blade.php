@extends('layouts.main-new')

@section('content')
<div class="tw-container tw-mx-auto">

  <!-- spacing !-->
  <div class="tw-mt-8"></div> 
  <!-------------->

  <div role="status" class="tw-flex tw-justify-center">
      <div class="lg:tw-w-[40%]">
          <img src="{{ URL::asset('assets/img/hc-header-mutasi.svg') }}" class="" alt="hc-header-img">
      </div>
  </div>
  

  <!-- spacing !-->
  <div class="tw-mt-8"></div> 
  <!-------------->

  <div class="tw-mx-60">

    <div class="tw-text-center hc-title-3xl tw-mb-24">Data Mutasi</div>

  </div>
</div>
@endsection
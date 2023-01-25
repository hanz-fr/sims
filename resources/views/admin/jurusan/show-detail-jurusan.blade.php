@extends('layouts.main-new')

@section('content')

<div class="tw-flex tw-flex-col tw-my-10 tw-mx-10">
    <div class="tw-my-10">
        <h4 class="sims-heading-3xl">Detail Jurusan</h4>
    </div>

    <!-- spacing -->
    <div class="tw-my-10"></div>

    <div class="sims-card-1 tw-flex tw-justify-between">
        <div class="tw-flex tw-mx-10">
            <img src="{{ URL::asset('assets/img/logoesemka.png') }}" class="tw-w-full tw-h-auto -tw-mb-1" alt="logo">
        </div>
    </div>
</div>

@endsection
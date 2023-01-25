@extends('layouts.main-new')

@section('content')

<div class="tw-flex tw-flex-col tw-my-10 tw-mx-10">
    <div class="tw-my-10">
        <h4 class="sims-heading-3xl">Detail Jurusan</h4>
    </div>


    <div class="sims-card-1 tw-flex tw-justify-between">
        <!-- Left Side -->
        <div class="tw-flex tw-mx-10 tw-gap-10">
            <img src="{{ URL::asset('assets/img/logoesemka.png') }}" class="tw-w-full tw-h-auto -tw-mb-1" alt="logo">

            
            <div class="tw-flex tw-flex-col tw-my-auto">
                <div class="sims-text-gray-sm tw-truncate">Nama Jurusan</div>
                <div class="sims-heading-2xl-black">{{ $jurusan->nama }}</div>
            </div>
        </div>

        <!-- Right Side -->
        <div class="tw-flex tw-gap-16 tw-mx-12">
            <div class="tw-flex tw-flex-col tw-justify-end">
                <div class="sims-text-gray-sm">Id</div>
                <div class="sims-heading-md-black">{{ $jurusan->id }}</div>
            </div>
            <div class="tw-flex tw-flex-col tw-justify-end">
                <div class="sims-text-gray-sm">Konsentrasi</div>
                <div class="sims-heading-md-black">{{ $jurusan->konsentrasi }}</div>
            </div>
        </div>
    </div>

    <!-- spacing -->
    <div class="tw-my-5"></div>

    <div class="tw-flex tw-justify-between">

        <!-- Desc -->
        <div class="tw-flex tw-flex-col">
            <div class="sims-heading-lg">Deskripsi</div>
            <div class="sims-text-gray-sm tw-w-1/2">{{ $jurusan->desc }}</div>
        </div>

        
        <div class="tw-flex tw-flex-col">
            <!-- Delete & Edit Button -->
            <div class="tw-flex tw-gap-5">
                <button class="tw-px-8 tw-py-2 tw-bg-[#F87171] tw-text-white tw-font-normal sims-heading-sm tw-rounded-lg tw-shadow-sm hover:tw-shadow-lg hover:tw-bg-[#d45656] tw-transition-all tw-truncate">Hapus Data</button>
                <button class="tw-px-8 tw-py-2 tw-bg-[#FBBF24] tw-text-white tw-font-normal sims-heading-sm tw-rounded-lg tw-shadow-sm hover:tw-shadow-lg hover:tw-bg-[#daa728] tw-transition-all tw-truncate">Edit Data</button>
            </div>

            <!-- Data CreatedAt & UpdatedAt -->
            <div class="tw-flex tw-flex-col tw-my-8 tw-mx-auto">
                <div class="sims-text-gray-sm"><b>Dibuat :</b> {{ $jurusan->createdAt }}</div>
                <div class="sims-text-gray-sm"><b>Diupdate :</b> {{ $jurusan->updatedAt }}</div>
            </div>
        </div>
    </div>
</div>

@endsection
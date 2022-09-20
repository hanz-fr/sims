@extends('layouts.main')

@section('content')
<div class="tw-mx-10">
    <div class="tw-flex tw-flex-col tw-my-5">
        <div class="tw-flex tw-flex-col tw-bg-white tw-shadow-md tw-w-full">
            <div class="tw-mt-5 tw-mr-5">
                <div class="tw-float-right">
                    <a href="#" class="tw-text-sims tw-text-2xl"><i class="fa-solid fa-pen-line"></i></a>
                </div>
            </div>
            <div class="tw-flex -tw-mt-10">
                <div class="profile">
                    <img src="" alt="Foto Profil" srcset="" class="tw-rounded-xl tw-mb-10 tw-w-40 tw-h-40 tw-border tw-border-slate-400 tw-mx-20 sm:tw-mt-10">
                </div>
                <div class="username tw-flex tw-flex-col tw-justify-center">
                    <div class="tw-text-sims tw-font-pop tw-font-bold tw-text-2xl tw-mb-2">{{ auth()->user()->nama }}</div>
                    <div class="tw-text-sims tw-font-pop tw-text-xl">{{ auth()->user()->email }}</div>
                </div>
            </div>
        </div>
        {{-- detail --}}
        <div class="tw-flex tw-flex-row tw-bg-white tw-shadow-md tw-w-full tw-h-fit tw-mt-5 tw-font-pop tw-px-20">
            <div class="tw-w-3/5 tw-flex tw-flex-col">
                <div class="tw-flex tw-justify-between tw-my-20">
                    <div class="tw-text-gray-300 tw-font-pop tw-font-bold tw-text-3xl">Details</div>
                    <div>
                        <a href="#" class="tw-text-sims tw-text-2xl"><i class="fa-solid fa-pen-line"></i></a>
                    </div>
                </div>
                <div class="tw-flex tw-justify-between tw-mb-8 tw-mr-20">
                    <div class="tw-text-sims tw-font-bold tw-text-base">NIP</div>
                    <div class="tw-text-sims tw-font-normal tw-text-base">{{ auth()->user()->nip }}</div>
                </div>
                <div class="tw-flex tw-justify-between tw-mb-8 tw-mr-20">
                    <div class="tw-text-sims tw-font-bold tw-text-base">Nomor HP</div>
                    <div class="tw-text-sims tw-font-normal tw-text-base">088271872817827</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
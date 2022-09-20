@extends('layouts.main')

@section('content')
<div class="container">
    <div class="tw-flex tw-flex-col tw-my-5">
        <div class="tw-flex tw-bg-white tw-shadow-md tw-w-full">
            <div class="tw-float-right">
                <a href="#" class="tw-text-sims hover:tw-text-[#428787] tw-pr-2 tw-mt-2 tw-text-sm"><i class="fa-regular fa-pen-line"></i></a>
            </div>
            <div class="tw-flex">
                <div class="profile">
                    <img src="" alt="Foto Profil" srcset="" class="tw-rounded-xl tw-mb-10 tw-w-40 tw-h-40 tw-border tw-border-slate-400 tw-mx-20 sm:tw-mt-10">
                </div>
                <div class="username tw-flex tw-flex-col tw-justify-center">
                    <div class="tw-text-sims tw-font-pop tw-font-bold tw-text-xl">Ibnu Asep bin Budi</div>
                    <div class="tw-text-sims tw-font-pop tw-text-lg">ibnuasepbinbudi@gmail.com</div>
                </div>
            </div>
        </div>
        {{-- detail --}}
        <div class="tw-flex tw-bg-white tw-shadow-md tw-w-full tw-mt-5">
            <div class="tw-flex tw-justify-between">
                <div class="tw-text-gray-500 tw-font-pop tw-font-bold tw-px-5 tw-text-xl tw-pl-24">Ibnu Asep bin Budi</div>
                <a href="#" class="fa-regular fa-pen-line"></a>
                
            </div>
        </div>
    </div>
</div>
@endsection
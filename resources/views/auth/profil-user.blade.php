@extends('layouts.main')

@section('content')
<div class="tw-mx-10">
    <div class="tw-flex tw-flex-col tw-my-5">

        {{-- username+roles --}}
        <section class="tw-flex tw-flex-col tw-bg-white tw-shadow-md tw-w-full">
            <div class="tw-mt-5 tw-mr-5">
                <div class="tw-float-right">
                    <a href="/edit-profile" class="tw-text-sims-400 hover:tw-text-sims-600 tw-text-2xl"><i class="fa-solid fa-pen-line"></i></a>
                </div>
            </div>
            <div class="tw-flex tw-flex-col tw-justify-center tw-text-sims-400 tw-font-pop tw-font-bold tw-mx-20 tw-mb-12">
                <div class="tw-text-2xl tw-mb-2">{{ auth()->user()->nama }}</div>
                <div class="tw-text-xl tw-text-silver-400">
                    @if (auth()->user()->role === 1)
                        Tata Usaha
                    @endif
                    @if (auth()->user()->role === 2)
                        Kesiswaan
                    @endif
                    @if (auth()->user()->role === 3)
                        Kurikulum
                    @endif
                    @if (auth()->user()->role === 4)
                        Wali Kelas
                    @endif
                </div>
            </div>
        </section>

        {{-- detail --}}
        <section class="tw-flex lg:tw-flex-row sm:tw-flex-col tw-w-full tw-h-fit tw-mt-5 tw-gap-8">
            <div class="lg:tw-w-3/5 sm:tw-w-full tw-flex tw-flex-col tw-bg-white tw-shadow-md tw-font-pop tw-px-20 tw-pt-10 tw-pb-24">
                <div class="tw-text-basic-200 tw-mb-20 tw-font-bold tw-text-3xl">Detail</div>
                <div class="tw-grid tw-grid-cols-2 tw-justify-between tw-gap-14">
                    <div class="tw-flex tw-flex-col tw-gap-5 tw-font-bold tw-text-xl">
                        <div class="tw-text-sims-400">Nama</div>
                        <div class="tw-text-basic-200">{{ auth()->user()->nama }}</div>
                    </div>
                    <div class="tw-flex tw-flex-col tw-gap-5 tw-font-bold tw-text-xl">
                        <div class="tw-text-sims-400">NIP</div>
                        <div class="tw-text-basic-200">{{ auth()->user()->nip }}</div>
                    </div>
                    <div class="tw-flex tw-flex-col tw-gap-5 tw-font-bold tw-text-xl">
                        <div class="tw-text-sims-400">Email</div>
                        <div class="tw-text-basic-200">{{ auth()->user()->email }}</div>
                    </div>
                    <div class="tw-flex tw-flex-col tw-gap-5 tw-font-bold tw-text-xl">
                        <div class="tw-text-sims-400">Nomor Telepon</div>
                        <div class="tw-text-basic-200">
                            {{ auth()->user()->no_telp }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- activity history --}}
            <div class="lg:tw-w-2/5 sm:tw-w-full lg:tw-mt-0 tw-bg-white tw-shadow-md tw-px-16 tw-pt-10 tw-pb-24 tw-font-pop">
                <h1 class="tw-text-3xl tw-font-bold tw-text-gray-300 tw-text-center tw-mb-20">Activity</h1>
                <div class="tw-justify-between tw-flex">
                    <ul class="tw-list-none tw-text-xl tw-font-bold tw-text-admin-300 tw-flex tw-flex-col tw-gap-5">
                        <li>Create New Siswa</li>
                        <li>Update Siswa</li>
                        <li>Delete Siswa</li>
                        <li>Update Raport</li>
                    </ul>
                    <ul class="tw-list-none tw-text-xl tw-font-bold tw-text-basic-200 tw-flex tw-flex-col tw-gap-5">
                        <li>5 Mins Ago</li>
                        <li>10 Mins Ago</li>
                        <li>12 Mins Ago</li>
                        <li>10 Mins Ago</li>
                    </ul>
                </div>
            </div>

        </section>
        
    </div>
</div>
@endsection
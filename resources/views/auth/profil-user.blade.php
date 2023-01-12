@extends('layouts.main-new')

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
                        <div class="tw-flex">
                            <div class="tw-text-sims-400 tw-mr-4">Email</div>
                            @if (auth()->user()->email_verified_at)
                                <span class="tw-text-xs tw-flex tw-py-1 tw-px-2.5 tw-text-center tw-whitespace-nowrap tw-items-center tw-justify-center tw-font-bold tw-bg-ijo-400 tw-text-white tw-rounded-full">Terverifikasi</span>
                            @else
                                <a href="/edit-profile"><span class="tw-text-xs tw-flex tw-py-1 tw-px-2.5 tw-text-center tw-whitespace-nowrap tw-items-center tw-justify-center tw-font-bold tw-bg-gray-400 hover:tw-bg-gray-600 tw-text-white tw-rounded-full">Belum Terverifikasi</span></a>
                            @endif
                        </div>
                        <div class="tw-text-basic-200">{{ auth()->user()->email }}</div>
                    </div>
                </div>
            </div>

            {{-- activity history --}}
            <div class="lg:tw-w-2/5 sm:tw-w-full lg:tw-mt-0 tw-bg-white tw-shadow-md tw-px-16 tw-pt-10 tw-pb-24 tw-font-pop">
                <h1 class="tw-text-3xl tw-font-bold tw-text-basic-200 tw-text-center">Aktivitas</h1>
                <p class="tw-font-pop tw-text-gray-300 tw-font-regular tw-text-md tw-text-center tw-mb-14">5 aktivitas terakhir</p>
                <div class="tw-justify-center tw-flex">
                    @if($history === [])
                        <div class="tw-flex tw-flex-col">
                            <img src="{{ URL::asset('assets/img/history-empty.jpg') }}" class="tw-mx-auto" alt="no_history" width="50%">
                            <div class="tw-mx-auto tw-font-pop tw-text-sm tw-text-gray-400 tw-font-light tw-mt-5">Anda belum memiliki aktifitas.</div>
                        </div>
                    @else
                    <div class="tw-flex tw-flex-col tw-gap-5">
                        @foreach($history as $h)
                            <div class="tw-flex tw-justify-between tw-gap-16">
                                <div class="tw-font-pop tw-text-md tw-text-gray-400 tw-font-medium">{{ $h->activityName }}</div>
                                <div class="tw-font-pop tw-text-md tw-text-gray-400 tw-font-light">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($h->createdAt))->diffForHumans() }}</div>
                            </div>
                        @endforeach
                        <!-- spacing !-->
                        <div class="tw-mt-10"></div> 
                        <!-------------->
        
                        <div class="tw-flex tw-justify-center">
                            <a href="/history/my" class="tw-font-pop tw-text-blue-300 tw-transition tw-duration-75 tw-font-regular tw-text-md hover:tw-text-blue-400 tw-underline">lihat semua histori</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>
        
    </div>
</div>
@endsection
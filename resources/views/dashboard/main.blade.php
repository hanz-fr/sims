@extends('layouts.main-new')

@section('content')

    <!-- Welcome Banner -->
    <div class="tw-flex tw-flex-col tw-my-10">
        <div class="sims-card-1">
            <div class="tw-flex tw-justify-between tw-mx-16">
                <div class="tw-flex tw-flex-col tw-gap-1">
                    <div class="lg:sims-heading-3xl sm:sims-heading-xl">Selamat Malam, <div class="tw-inline tw-font-black">
                            Versatile</div>
                    </div>
                    <div class="lg:sims-text-gray-sm sm:sims-text-gray-xs">Apa yang akan anda lakukan hari ini?</div>
                </div>
                <i class="fa-solid fa-circle-user lg:sims-icon-5xl sm:sims-icon-4xl"></i>
            </div>
        </div>

        <!-- spacing -->
        <div class="tw-my-5"></div>

        <!-- Content -->
        <div class="tw-flex">
            <!-- Carousel -->
            <div class="tw-flex tw-flex-col">
                <!-- Card -->
                <div class="sims-card-1">
                    <div class="tw-flex tw-justify-evenly">
                        <i class="fa-solid fa-user sims-icon-3xl"></i>
                        <div class="tw-flex tw-flex-col">
                            <div class="sims-heading-xl tw-font-black">1728</div>
                            <div class="sims-text-gray-sm">Jumlah Siswa</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slider main container -->
            <div class="swiper tw-w-64 tw-h-52 tw-bg-slate-200">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">Slide 1</div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>
                    ...
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
    
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>

    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endsection

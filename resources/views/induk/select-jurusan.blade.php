@extends('layouts.main')

@section('content')
<div class="tw-mx-10">
    <h1 class="tw-text-sims-400 tw-font-pop tw-text-2xl tw-my-9">Buku Induk Siswa</h1>
    
    <div class="tw-grid lg:tw-grid-cols-4 md:tw-grid-cols-2 tw-gap-4 sm:tw-grid-cols-1">
        <form action="/angkatan">
            <button type="submit" class="tw-flex tw-transition-all tw-ease-in tw-delay-[100] hover:-tw-translate-y-1 hover:tw-shadow-lg tw-w-full tw-text-white tw-bg-[#1b4cff] tw-p-5 tw-rounded-xl tw-shadow-md hover:tw-bg-blue-700 hover:tw-text-white tw-h-36 tw-items-center">
                <input type="hidden" name="jurusan" value="AKL">
                <i class="fa-solid fa-money-bills tw-text-6xl tw-text tw-py-5"></i>
                <p class="tw-text-base tw-pl-5 tw-py-5 fw-bolder">AKUTANSI DAN KEUANGAN LEMBAGA</p>
            </button>
        </form>
        <form action="/angkatan">
            <button type="submit" class="tw-flex tw-transition-all tw-ease-in tw-delay-[100] hover:-tw-translate-y-1 hover:tw-shadow-lg tw-w-full tw-text-white tw-bg-[#FF5C5C] tw-p-5 tw-rounded-xl tw-shadow-md hover:tw-bg-[#c74848] hover:tw-text-white tw-h-36">
                <input type="hidden" name="jurusan" value="PM">
                <i class="fa-solid fa-cart-shopping tw-text-6xl tw-text tw-py-5"></i>
                <p class="tw-text-lg tw-pl-5 tw-pt-8 fw-bolder">PEMASARAN</p>
            </button>
        </form>
        <form action="/angkatan">
            <button class="tw-flex tw-transition-all tw-ease-in tw-delay-[100] hover:-tw-translate-y-1 hover:tw-shadow-lg tw-w-full tw-text-white tw-bg-[#527DB9] tw-p-5 tw-rounded-xl tw-shadow-md hover:tw-bg-[#3c5d89] hover:tw-text-white tw-h-36 tw-items-center">
                <input type="hidden" name="jurusan" value="MPLB">
                <i class="fa-solid fa-book-bookmark tw-text-6xl tw-text tw-py-5"></i>
                <p class="tw-text-base tw-pl-5 tw-pt-2 fw-bolder">MANAJEMEN PERKANTORAN DAN LAYANAN BISNIS</p>
            </button>
        </form>
        <form action="/angkatan">
            <button class="tw-flex tw-transition-all tw-ease-in tw-delay-[100] hover:-tw-translate-y-1 hover:tw-shadow-lg tw-w-full tw-text-white tw-bg-[#FF5C5C] tw-p-5 tw-rounded-xl tw-shadow-md hover:tw-bg-[#c74848] hover:tw-text-white tw-h-36">
                <input type="hidden" name="jurusan" value="MLOG">
                <i class="fa-solid fa-box tw-text-6xl tw-text tw-py-5"></i>
                <p class="tw-text-base tw-pl-5 tw-pt-8 fw-bolder">MANAJEMEN LOGISTIK</p>
            </button>
        </form>
        <form action="/angkatan">
            <button class="tw-flex tw-transition-all tw-ease-in tw-delay-[100] hover:-tw-translate-y-1 hover:tw-shadow-lg tw-w-full tw-text-white tw-bg-[#BF32FC] tw-p-5 tw-rounded-xl tw-shadow-md hover:tw-bg-[#9727c6] hover:tw-text-white tw-h-36 tw-items-center">
                <input type="hidden" name="jurusan" value="DKV">
                <i class="fa-solid fa-camera tw-text-6xl tw-text tw-py-5"></i>
                <p class="tw-text-base tw-pl-5 tw-p-5 fw-bolder">DESAIN KOMUNIKASI VISUAL</p>
            </button>
        </form>
        <form action="/angkatan">
            <button class="tw-flex tw-transition-all tw-ease-in tw-delay-[100] hover:-tw-translate-y-1 hover:tw-shadow-lg tw-w-full tw-text-white tw-bg-[#6F6D6D] tw-p-5 tw-rounded-xl tw-shadow-md hover:tw-bg-[#585656] hover:tw-text-white tw-h-36 tw-items-center">
                <input type="hidden" name="jurusan" value="TJKT">
                <i class="fa-solid fa-desktop tw-text-6xl tw-text tw-py-5"></i>
                <p class="tw-text-base tw-pl-5 tw-p-2 fw-bolder">TEKNIK JARINGAN KOMPUTER DAN TELEKOMUNIKASI</p>
            </button>
        </form>
        <form action="/angkatan">
            <button class="tw-flex tw-transition-all tw-ease-in tw-delay-[100] hover:-tw-translate-y-1 hover:tw-shadow-lg tw-w-full tw-text-white tw-bg-[#2CC06F] tw-p-5 tw-rounded-xl tw-shadow-md hover:tw-bg-[#249f5b] hover:tw-text-white tw-h-36 tw-items-center">
                <input type="hidden" name="jurusan" value="PPLG">
                <i class="fa-solid fa-code tw-text-6xl tw-text tw-py-5"></i>
                <p class="tw-text-base tw-pl-5 tw-p-2 fw-bolder">PENGEMBANGAN PERANGKAT LUNAK DAN GIM</p>
            </button>
        </form>
        <a href="/data-alumni?page=1&perPage=10&search=" class="tw-flex tw-transition-all tw-ease-in tw-delay-[100] hover:-tw-translate-y-1 hover:tw-shadow-lg tw-w-full tw-text-white tw-bg-sims-400 tw-p-5 tw-rounded-xl tw-shadow-md hover:tw-bg-[#3f7f7f] hover:tw-text-white tw-h-36 tw-items-center">
            <i class="fa-solid fa-user-graduate tw-text-6xl tw-text tw-py-5"></i>
            <p class="tw-text-base tw-pl-5 tw-pt-8 fw-bolder">ALUMNI</p>
        </a>
    </div>
    
</div>
@endsection

@extends('layouts.plainpage')

@section('content')

<div class="tw-flex tw-justify-center">

<div style="position: absolute;left: 50%; top: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
    
    <div class="tw-flex tw-flex-col tw-text-center">
        <i class="fa-solid fa-triangle-exclamation tw-text-9xl tw-text-red-400"></i>
        <div class="tw-font-pop tw-font-bold tw-text-5xl tw-my-3 tw-text-gray-300">403 FORBIDDEN</div>
        <div class="tw-font-pop tw-font-normal tw-text-lg tw-text-gray-300">Maaf anda tidak diizinkan untuk akses ke halaman yang dituju.</div>
        <a href="{{ url()->previous() }}" class="tw-mx-auto tw-my-5 tw-flex tw-justify-center tw-px-10 tw-py-2 tw-bg-sims-400 tw-rounded-md hover:tw-bg-sims-500 tw-transition-all" style="text-decoration: inherit; color: inherit;">
            <div class="tw-text-white tw-font-pop">Kembali ke halaman sebelumnya</div> 
        </a>
    </div>

</div>

@endsection
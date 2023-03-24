@extends('layouts.main-new')

@section('content')
    <div class="tw-flex tw-flex-col tw-my-10">

        <div class="sims-heading-2xl tw-flex tw-justify-center">Update Mata Pelajaran</div>

        <!-- spacing -->
        <div class="tw-my-20"></div>

        <div class="tw-flex tw-justify-center">

            <form action="/admin/mata-pelajaran/update/{{ $mapel->id }}" method="POST" class="tw-flex tw-flex-col tw-gap-8 tw-w-1/4">
                @csrf
                @method('PUT')
                <div class="tw-flex tw-flex-col tw-gap-1">
                    <div class="tw-flex tw-gap-3">
                        <div class="sims-text-gray-sm tw-my-auto">Id Mata Pelajaran</div>
                        <!--Code Block for white tooltip starts-->
                        <a tabindex="0" role="link" aria-label="tooltip 1"
                            class="focus:outline-none focus:ring-gray-300 rounded-full focus:ring-offset-2 focus:ring-2 focus:bg-gray-200 relative mt-20 md:mt-0"
                            onmouseover="showTooltip(1)" onfocus="showTooltip(1)" onmouseout="hideTooltip(1)">
                            <div class=" cursor-pointer">
                                <i data-tooltip-target="tooltip-animation"
                                    class="fa-regular fa-circle-question tw-text-lg tw-text-sims-new-500"></i>
                            </div>
                            <div id="tooltip1" role="tooltip"
                                class="z-20 tw-w-64 absolute transition duration-150 ease-in-out tw-right-0 tw-left-8 tw-top-0 ml-8 shadow-lg bg-white p-4 rounded hidden">
                                <p class="tw-text-sm tw-font-satoshi tw-font-bold text-gray-600">Id Mata Pelajaran</p>
                                <p class="tw-text-sm tw-font-satoshi tw-font-normal leading-4 text-gray-600">merupakan singkatan dari mata pelajaran. (Contoh: PBO => Pemrograman Berorientasi Objek).<br><br>Untuk update mapel, Id mata pelajaran tidak dapat diubah. Jika anda ingin mengubah Id mata pelajaran, anda harus menghapus data yang lama dan membuat data yang baru.</p>
                            </div>
                        </a>
                        <!--Code Block for white tooltip ends-->
                    </div>
                    <input disabled required name="id" value="{{ $mapel->id }}" class="tw-border-[1.5px] tw-transition-all tw-duration-500 tw-ease-out tw-font-satoshi tw-font-normal tw-text-gray-500 tw-border-gray-300 tw-py-1 tw-px-5 tw-rounded-xl focus:tw-outline-sims-new-500">
                </div>
                <div class="tw-flex tw-flex-col tw-gap-1">
                    <div class="sims-text-gray-sm">Nama Mata Pelajaran</div>
                    <input required name="nama" value="{{ $mapel->nama }}" class="tw-border-[1.5px] tw-transition-all tw-duration-500 tw-ease-out tw-font-satoshi tw-font-normal tw-text-gray-500 tw-border-gray-300 tw-py-1 tw-px-5 tw-rounded-xl focus:tw-outline-sims-new-500">
                </div>
                @if ($message = Session::get('error'))
                    <div class="sims-text-gray-xs tw-text-red-500">{{ $message }}</div>
                @endif
                <div class="tw-flex tw-justify-end">
                    @if(isset($_GET['fromDetailPage']))<input type="hidden" name="fromDetailPage" value="true">@endif
                    <button type="submit" class="tw-bg-sims-new-500 tw-transition-all tw-w-fit tw-text-white hover:tw-text-white hover:tw-bg-sims-new-700 tw-font-satoshi tw-transition-all tw-rounded-lg tw-px-8 tw-py-2"> Update </button>
                </div>
            </form>

        </div>


    </div>


    <script>
        function showTooltip(flag) {
            switch (flag) {
                case 1:
                    document.getElementById("tooltip1").classList.remove("hidden");
                    break;
                case 2:
                    document.getElementById("tooltip2").classList.remove("hidden");
                    break;
                case 3:
                    document.getElementById("tooltip3").classList.remove("hidden");
                    break;
            }
        }

        function hideTooltip(flag) {
            switch (flag) {
                case 1:
                    document.getElementById("tooltip1").classList.add("hidden");
                    break;
                case 2:
                    document.getElementById("tooltip2").classList.add("hidden");
                    break;
                case 3:
                    document.getElementById("tooltip3").classList.add("hidden");
                    break;
            }
        }
    </script>
@endsection

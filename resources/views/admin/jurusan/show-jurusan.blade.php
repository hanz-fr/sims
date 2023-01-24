@extends('layouts.main-new')

@section('content')
<style>
    .no-spin::-webkit-inner-spin-button, .no-spin::-webkit-outer-spin-button {
    -webkit-appearance: none !important;
    margin: 0 !important;
    }
</style>

<div class="tw-mt-10">
    <div class="tw-flex tw-mt-8 tw-ml-8">
        <h4 class="sims-heading-3xl">Data Jurusan</h4>
    </div>

        <div class="tw-flex tw-justify-between tw-ml-8 tw-mt-8 lg:tw-flex-row sm:tw-flex-col sm:tw-gap-5">
            <div class="tw-flex tw-my-auto">
                <form action="#"> 
                    <div class="relative tw-border-[1.5px] tw-border-gray-300 tw-rounded-xl focus:tw-ring-sims-new-500">
                        
                        <input name="page" value="1" type="hidden">
                        <input name="perPage" value="10" type="hidden">
                        <input type="text" id="search" name="search" class="tw-block tw-py-1 tw-px-5 tw-border-none tw-rounded-xl" value="{{ request()->search }}">
                        
                        <i class="fa-thin fa-magnifying-glass tw-absolute tw-text-gray-400 right-0 tw-inset-y-1.5 tw-pr-5 tw-text-sm"></i>
                    </div>
                </form>

                <div class="tw-my-auto tw-text-basic-700 tw-ml-8 tw-mr-2 tw-font-normal tw-font-satoshi">Tampilkan</div>
                <select name="show-data-perpage" id="show-data-perpage" class="tw-px-5 tw-text-sm focus:tw-outline-none focus:tw-ring-0 focus:tw-border-gray-200 tw-peer tw-font-bold  bg-transparent tw-border-0 tw-border-b-2 tw-border-gray-200 tw-appearance-none tw-block">
                    <option value="/admin/jurusan?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=10&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif" @isset($_GET['perPage']) @if( $_GET['perPage'] === '10') selected @endif @endisset class="tw-bg-white">10</option>
                    <option value="/admin/jurusan?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=25&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif" @isset($_GET['perPage']) @if( $_GET['perPage'] === '25') selected @endif @endisset class="tw-bg-white">25</option>
                    <option value="/admin/jurusan?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=50&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif" @isset($_GET['perPage']) @if( $_GET['perPage'] === '50') selected @endif @endisset class="tw-bg-white">50</option>
                    <option value="/admin/jurusan?page=@if(!empty($_GET['page'])){{ $_GET['page'] }}@endif&perPage=100&search=@if(isset($_GET['search'])){{ $_GET['search'] }}@endif" @isset($_GET['perPage']) @if( $_GET['perPage'] === '100') selected @endif @endisset class="tw-bg-white">100</option>
                </select>
                <div class="tw-my-auto tw-mx-2 tw-font-satoshi tw-font-normal tw-text-basic-700">data</div>
            </div>

            <div class="tw-flex md:tw-justify-center tw-items-center tw-mr-7">
              <button type="button" data-modal-toggle="popup-modal" class="tw-bg-sims-new-500 tw-text-white hover:tw-text-white hover:tw-bg-sims-new-700 tw-font-satoshi tw-rounded-lg tw-px-8 tw-py-2 tw-mr-7">
                Tambah Data +
              </button>
            </div>
        </div>

        <div class="tw-overflow-x-auto tw-relative tw-mt-7">
            <table class="tw-w-full tw-text-lg tw-text-center tw-font-satoshi tw-text-bluewood-900">
                <thead class="tw-border-y">
                    <tr>
                        <th scope="col" class="tw-py-5 tw-px-6">Id</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Nama</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Konsentrasi</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Deskripsi</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Dibuat</th>
                        <th scope="col" class="tw-py-5 tw-px-6">Aksi</th>
                    </tr>
                </thead>
                <tbody class="tw-text-base">
                    @foreach($jurusan as $j)
                    <tr class="tw-bg-white">
                        <td class="tw-p-8">{{ $j->id }}</td>
                        <td class="tw-p-8">{{ $j->nama }}</td>
                        <td class="tw-p-8">{{ $j->konsentrasi }}</td>
                        <td class="tw-p-8 tw-w-1/3">{{ $j->desc }}</td>
                        <td>-</td>
                        <td class="tw-flex tw-justify-center tw-gap-3 tw-py-2">
                          <a href="#" class="tw-text-kuning-500  hover:tw-text-white hover:tw-bg-kuning-500 hover:tw-shadow-md tw-rounded-lg tw-text-xl tw-py-2 tw-px-3 tw-w-12 tw-transition-all" title="Edit Data Siswa">
                              <i class="fa-solid fa-pen-to-square"></i>
                          </a>
                          <a href="#" class="tw-text-gray-400  hover:tw-text-white hover:tw-bg-gray-400 hover:tw-shadow-md tw-rounded-lg tw-text-xl tw-py-2 tw-px-3 tw-w-12 tw-transition-all" title="Detail Data">
                              <i class="fa-regular fa-eye"></i>
                          </a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(function(){
          // bind change event to select
          $('#show-data-perpage').on('change', function () {
              var url = $(this).val(); // get selected value
              if (url) { // require a URL
                  window.location = url; // redirect
              }
              return false;
          });
        });
    </script>
    <script src="index.js"></script>
    <script>function showTooltip(flag) {
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

{{-- @push('scripts')
    <script>
        var copyBtn = document.querySelector('#copy_btn');
    
        copyBtn.addEventListener('click', function () {

        var urlField = document.querySelector('table');
        
        var range = document.createRange();  

        range.selectNode(urlField);

        window.getSelection().addRange(range);
        
        document.execCommand('copy');
    }, 
    false);
    </script>
@endpush --}}
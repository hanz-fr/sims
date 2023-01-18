@extends('layouts.main-new')

@section('content')
    <div class="tw-mx-10">
        <h1 class="sims-heading-3xl tw-my-9">Angkatan Alumni</h1>
        <div class="tw-grid lg:tw-grid-cols-3 md:tw-grid-cols-2 tw-gap-5 tw-mt-8 sm:tw-grid-cols-1">
            
            @php $n = \Carbon\Carbon::now()->year @endphp
            @for ($i = 2000; $i < \Carbon\Carbon::now()->year; $i++)
                @while($i != $n)
                <a href="/data-alumni?jurusan={{ $_GET['jurusan'] }}&angkatan={{ $i++ }}&page=1&perPage=10&search=">
                  <div class="tw-bg-white tw-shadow-md hover:tw-bg-sims-500 hover:tw-text-white tw-text-sims-500 tw-p-5 tw-rounded-xl tw-transition-all tw-delay-[100] hover:-tw-translate-y-1 hover:tw-shadow-lg tw-ease-in">
                      <div class="tw-flex tw-pl-10">
                          <i class="fa-regular fa-graduation-cap tw-text-2xl"></i>
                            <span class="tw-font-satoshi tw-font-regular tw-my-auto tw-ml-5 tw-text-lg tw-h-fit">
                              Angkatan 
                            </span>
                        <div class="tw-font-sg tw-font-bold tw-text-xl tw-px-3 tw-my-auto">{{ $i - 1 }}</div>
                      </div>
                  </div>
                </a>
                @endwhile
            @endfor

        </div>
    </div>
@endsection 
@extends('layouts.main-new')

@section('content')


<div class="tw-my-16 tw-mx-32">

    {{-- Title --}}
    <div class="tw-flex tw-justify-between tw-h-fit tw-mb-5">
      <div class="sims-heading-2xl">
          Riwayat Aktivitas SIMS
      </div>
      <a href="/history/my" class="hover:tw-text-blue-400 tw-transition-all tw-duration-75 tw-underline tw-font-satoshi tw-text-sm tw-text-blue-300">lihat histori saya <i class="fa-sharp fa-solid fa-arrow-up-right-from-square tw-text-xs tw-ml-2"></i></a>
  </div>

    @if($history === [])

    <div class="tw-font-satoshi tw-text-sims-new-500 tw-text-xl">Belum ada riwayat aktivitas yang tersimpan.</div>

    @else
  
      @if(isset($today_history))

        {{-- kalau misal ada aktivitas di hari ini --}}
        @if($today_history != [])
          <div class="sims-heading-lg">Hari Ini</div>
          @foreach($today_history as $th)
          {{-- Accordion --}}
          <div id="accordion-flush" data-accordion="collapse" data-active-classes="tw-bg-white tw-text-sims-new-500" data-inactive-classes="tw-text-gray-500">
            <h2 id="accordion-flush-heading-{{ $th->id }}">
              <button type="button" class="hover:tw-text-sims-300 tw-transition-all tw-ease-out tw-flex tw-font-satoshi tw-items-center tw-justify-between tw-w-full tw-py-5 tw-font-medium tw-text-left tw-text-gray-500 tw-border-b tw-border-gray-200" data-accordion-target="#accordion-flush-body-{{ $th->id }}" aria-expanded="false" aria-controls="accordion-flush-body-{{ $th->id }}">
                <div>
                    <span class="tw-text-base tw-font-medium">{{ $th->activityName }}</span>
                    <span class="tw-text-base tw-font-normal tw-mx-5 tw-text-gray-400">{{ $th->activityAuthor }}</span>
                </div>
                <div class="tw-flex">
                    {{-- <span class="tw-text-base tw-font-normal tw-mx-10 tw-text-gray-400">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($th->createdAt))->setTimezone('+14')->diffForHumans() }}</span> --}}
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </div>
              </button>
            </h2>
            <div id="accordion-flush-body-{{ $th->id }}" class="hidden" aria-labelledby="accordion-flush-heading-{{ $th->id }}">
                <div class="tw-py-5 tw-font-normal tw-border-b tw-border-gray-200">
                  <p class="tw-font-satoshi tw-text-base tw-font-medium tw-text-gray-400 tw-w-1/2">
                    {{ $th->activityDesc }}
                  </p>
                  <p class="tw-font-satoshi tw-text-xs tw-text-gray-400">
                    {{ \Carbon\Carbon::parse(strtotime($th->createdAt))->translatedFormat('l d F Y') }}, {{ \Carbon\Carbon::parse(strtotime($th->createdAt))->setTimezone('+7')->format('H:i') }}
                  </p>
                </div>
            </div>image.png
            
          </div>
          @endforeach
          
        @endif

        {{-- kalau misal ada aktivitas di hari kemarin dan seterusnya --}}
        @if($older_history != [])

          <div class="tw-flex tw-border-2 tw-mx-10 tw-my-16 tw-border-slate-200"></div>

          @foreach($older_history as $h)
          {{-- Accordion --}}
          <div id="accordion-flush" data-accordion="collapse" data-active-classes="tw-bg-white tw-text-sims-new-500" data-inactive-classes="tw-text-gray-500">
              <h2 id="accordion-flush-heading-{{ $h->id }}">
                <button type="button" class="hover:tw-text-sims-300 tw-transition-all tw-ease-out tw-flex tw-font-satoshi tw-items-center tw-justify-between tw-w-full tw-py-5 tw-font-medium tw-text-left tw-text-gray-500 tw-border-b tw-border-gray-200" data-accordion-target="#accordion-flush-body-{{ $h->id }}" aria-expanded="false" aria-controls="accordion-flush-body-{{ $h->id }}">
                  <div>
                      <span class="tw-text-base tw-font-medium">{{ $h->activityName }}</span>
                      <span class="tw-text-base tw-font-normal tw-mx-5 tw-text-gray-400">{{ $h->activityAuthor }}</span>
                  </div>
                  <div class="tw-flex">
                      {{-- <span class="tw-text-base tw-font-normal tw-mx-10 tw-text-gray-400">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($h->createdAt))->diffForHumans() }}</span> --}}
                      <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </div>
                </button>
              </h2>
              <div id="accordion-flush-body-{{ $h->id }}" class="hidden" aria-labelledby="accordion-flush-heading-{{ $h->id }}">
                  <div class="tw-py-5 tw-font-normal tw-border-b tw-border-gray-200">
                    <p class="tw-font-satoshi tw-text-base tw-font-medium tw-text-gray-400 tw-w-1/2">
                      {{ $h->activityDesc }}
                    </p>
                    <p class="tw-font-satoshi tw-text-xs tw-text-gray-400">
                      {{ \Carbon\Carbon::parse(strtotime($h->createdAt))->translatedFormat('l d F Y'); }}, {{ \Carbon\Carbon::parse(strtotime($h->createdAt))->setTimezone('+14')->format('H:i') }}
                    </p>
                  </div>
              </div>
          </div>
          @endforeach
          
        @endif

      @else

        @foreach($history as $h)
        {{-- Accordion --}}
        <div id="accordion-flush" data-accordion="collapse" data-active-classes="tw-bg-white tw-text-sims-new-500" data-inactive-classes="tw-text-gray-500">
            <h2 id="accordion-flush-heading-{{ $h->id }}">
              <button type="button" class="hover:tw-text-sims-300 tw-transition-all tw-ease-out tw-flex tw-font-satoshi tw-items-center tw-justify-between tw-w-full tw-py-5 tw-font-medium tw-text-left tw-text-gray-500 tw-border-b tw-border-gray-200" data-accordion-target="#accordion-flush-body-{{ $h->id }}" aria-expanded="false" aria-controls="accordion-flush-body-{{ $h->id }}">
                <div>
                    <span class="tw-text-base tw-font-medium">{{ $h->activityName }}</span>
                    <span class="tw-text-base tw-font-normal tw-mx-5 tw-text-gray-400">{{ $h->activityAuthor }}</span>
                </div>
                <div class="tw-flex">
                    <span class="tw-text-base tw-font-normal tw-mx-10 tw-text-gray-400">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($h->createdAt))->diffForHumans() }}</span>
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </div>
              </button>
            </h2>
            <div id="accordion-flush-body-{{ $h->id }}" class="hidden" aria-labelledby="accordion-flush-heading-{{ $h->id }}">
                <div class="tw-py-5 tw-font-normal tw-border-b tw-border-gray-200">
                  <p class="tw-font-satoshi tw-text-base tw-font-medium tw-text-gray-400 tw-w-1/2">
                    {{ $h->activityDesc }}
                  </p>
                  <p class="tw-font-satoshi tw-text-xs tw-text-gray-400">
                    {{ \Carbon\Carbon::parse(strtotime($h->createdAt))->translatedFormat('l d F Y'); }}, {{ \Carbon\Carbon::parse(strtotime($h->createdAt))->setTimezone('+7')->format('H:i') }}
                  </p>
                </div>
            </div>
        </div>
        @endforeach

      @endif

    @endif
</div>
@endsection
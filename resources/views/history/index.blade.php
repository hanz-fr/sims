@extends('layouts.white-bg')

@section('content')


<div class="tw-my-16 tw-mx-32">

    {{-- Title --}}
    <div class="title-main tw-text-2xl tw-mb-5">
        Histori Aktivitas
    </div>


    @if($history === [])

    <div class="tw-font-pop tw-text-gray-400 tw-text-xl">Belum ada histori yang tersimpan.</div>

    @else
        @foreach($history as $h)
        {{-- Accordion --}}
        <div id="accordion-flush" data-accordion="collapse" data-active-classes="tw-bg-white tw-text-sims-400" data-inactive-classes="tw-text-gray-500">
            <h2 id="accordion-flush-heading-{{ $h->id }}">
              <button type="button" class="tw-flex tw-font-pop tw-items-center tw-justify-between tw-w-full tw-py-5 tw-font-medium tw-text-left tw-text-gray-500 tw-border-b tw-border-gray-200" data-accordion-target="#accordion-flush-body-{{ $h->id }}" aria-expanded="false" aria-controls="accordion-flush-body-{{ $h->id }}">
                <div>
                    <span class="tw-text-base tw-font-medium">{{ $h->activityName }}</span>
                    <span class="tw-text-sm tw-font-normal tw-mx-5 tw-text-gray-400">{{ $h->activityAuthor }}</span>
                </div>
                <div class="tw-flex">
                    <span class="tw-text-base tw-font-normal tw-mx-10 tw-text-gray-400">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($h->createdAt))->diffForHumans() }}</span>
                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </div>
              </button>
            </h2>
            <div id="accordion-flush-body-{{ $h->id }}" class="hidden" aria-labelledby="accordion-flush-heading-{{ $h->id }}">
                <div class="tw-py-5 tw-font-normal tw-border-b tw-border-gray-200">
                  <p class="tw-font-pop tw-text-sm tw-text-gray-400 tw-w-1/2">
                    {{ $h->activityDesc }}
                  </p>
                  <p class="tw-font-pop tw-text-xs tw-text-gray-400">
                    {{ \Carbon\Carbon::parse(strtotime($h->createdAt))->translatedFormat('l d F Y'); }}, {{ \Carbon\Carbon::parse(strtotime($h->createdAt))->setTimezone('+7')->format('H:i') }}
                  </p>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>
@endsection
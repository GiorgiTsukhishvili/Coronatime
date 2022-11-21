<x-layout>
    <x-slot name='content'>

        <x-navbar :route="route('by-country')" />

        @php
            echo url()->full();
        @endphp

        <div class="pl-4 pt-6 xs:px-[108px] xs:pt-10 ">
            <h1 class="font-black text-xl xs:text-2xl xs:leading-[30px] leading-6 text-black-150 mb-6 xs:mb-10">
                {{ __('landing.country-stats') }}
            </h1>

            <div class="flex justify-start gap-6 items-center border-b border-neutral-250">
                <a href="{{ route('worldwide') }}?lang={{ app()->getLocale() }}"
                    class="font-bold text-sm xs:text-base xs:leading-8.5 leading-[17px] text-black-150 pb-[19px] ">{{ __('landing.worldwide') }}</a>
                <a href="{{ route('by-country') }}?lang={{ app()->getLocale() }}"
                    class="font-bold text-sm leading-[17px] xs:text-base xs:leading-8.5 text-black-150 pb-4 border-b-[3px] border-black-150">{{ __('landing.by-country') }}</a>
            </div>

            <form action="{{ route('by-country') }}" method="GET"
                class="flex items-center mt-6 xs:my-10 xs:border xs:border-neutral-250 xs:rounded-lg xs:w-60 xs:py-[14px] xs:pl-6">
                @csrf

                <button type="submit" class="mr-2 xs:mr-4">
                    <x-svgs.search-button />
                </button>

                <input type="text" name="search" placeholder="{{ __('landing.country-search') }}"
                    class="outline-none text-zinc-550 text-sm leading-[17px] placeholder:text-sm placeholder:leading-[17px] xs:w-44">

                <input type="text" name="lang" value="{{ app()->getLocale() }}" class="hidden">
            </form>
        </div>
        <div class="mt-6 xs:mt-10 bg-neutral-150 py-5 pl-4 xs:mx-[108px] xs:rounded-t-lg">
            <div class="xs:pl-6 grid grid-cols-4 xs:grid-cols-6">
                <h1 class=" text-black-150 font-semibold text-sm leading-[17px] pr-4 break-words">
                    {{ __('landing.location') }}
                </h1>
                <h1 class=" text-black-150 font-semibold text-sm leading-[17px] pr-4 break-words">
                    {{ __('landing.new-cases') }}
                </h1>
                <h1 class=" text-black-150 font-semibold text-sm leading-[17px] pr-4 break-words">
                    {{ __('landing.death') }}
                </h1>
                <h1 class=" text-black-150 font-semibold text-sm leading-[17px] pr-4 break-words">
                    {{ __('landing.recovered') }}
                </h1>
            </div>
        </div>
        @if (count($countries) > 0)
            <div
                class="ml-4 xs:h-[547px] xs:overflow-auto xs:mx-[108px] xs:border xs:border-neutral-150 xs:rounded-b-lg shadow-box">
                @if (count($countries) > 1)
                    <div class="xs:pl-10 grid grid-cols-4 xs:grid-cols-6 py-4 border-b border-neutral-150">
                        <h1 class=" text-black-150 font-normal text-sm leading-[17px] pr-4 break-words">
                            {{ __('landing.worldwide') }}
                        </h1>
                        <h1 class=" text-black-150 font-normal text-sm leading-[17px] pr-4 break-words">
                            {{ $confirms }}
                        </h1>
                        <h1 class=" text-black-150 font-normal text-sm leading-[17px] pr-4 break-words">
                            {{ $deaths }}
                        </h1>
                        <h1 class=" text-black-150 font-normal text-sm leading-[17px] pr-4 break-words">
                            {{ $recovers }}
                        </h1>
                    </div>
                @endif

                @foreach ($countries as $country)
                    <x-country.country-template :country="$country" />
                @endforeach


            </div>
        @else
            <div
                class="ml-4 xs:h-[547px] xs:overflow-auto xs:mx-[108px] xs:border xs:border-neutral-150 xs:rounded-b-lg shadow-box">
                <h1 class="text-black-150 font-normal text-2xl leading-[17px] pr-4 py-4 break-words">
                    {{ __('landing.no-country') }}</h1>
            </div>
        @endif
    </x-slot>
</x-layout>

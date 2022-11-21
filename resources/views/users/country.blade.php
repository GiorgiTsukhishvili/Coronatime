<x-layout>
    <x-slot name='content'>

        <x-navbar :route="route('by-country')" />



        <div class="pl-4 pt-6 xs:px-[108px] xs:pt-10">
            <h1 class="font-black text-xl xs:text-2xl xs:leading-[30px] leading-6 text-black-150 mb-6 xs:mb-10">
                {{ __('landing.country-stats') }}
            </h1>

            <div class="flex justify-start gap-6 items-center">
                <a href="{{ route('worldwide') }}?lang={{ app()->getLocale() }}"
                    class="font-bold text-sm xs:text-base xs:leading-8.5 leading-[17px] text-black-150 pb-[19px] ">{{ __('landing.worldwide') }}</a>
                <a href="{{ route('by-country') }}?lang={{ app()->getLocale() }}"
                    class="font-bold text-sm leading-[17px] xs:text-base xs:leading-8.5 text-black-150 pb-4 border-b-[3px] border-black-150">{{ __('landing.by-country') }}</a>
            </div>

        </div>
    </x-slot>
</x-layout>

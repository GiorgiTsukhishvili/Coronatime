<x-layout>
    <x-slot name='content'>

        <x-navbar :route="route('by-country')" />



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

            <form action="#"
                class="flex items-center mt-6 xs:my-10 xs:border xs:border-neutral-250 xs:rounded-lg xs:w-60 xs:py-[14px] xs:pl-6">
                @csrf

                <button type="submit" class="mr-2 xs:mr-4">
                    <x-svgs.search-button />
                </button>

                <input type="text" placeholder="{{ __('landing.country-search') }}"
                    class="outline-none text-zinc-550 text-sm leading-[17px] placeholder:text-sm placeholder:leading-[17px] xs:w-44">

            </form>

        </div>
    </x-slot>
</x-layout>

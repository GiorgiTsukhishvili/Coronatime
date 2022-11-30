<x-layout>
    <x-slot name='content'>


        <x-navbar :route="(is_null(request('sort')) ? route('by-country') : route('sort')) .
            (!is_null(request('search')) ? '?search=' . request('search') : '') .
            (!is_null(request('sort')) ? '?sort=' . request('sort') . '&order=' . request('order') : '')" />


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
                class="flex items-center mt-6 xs:my-10 xs:border xs:border-neutral-250 xs:rounded-lg xs:w-72 xs:py-[14px] xs:pl-6">
                @csrf

                <button type="submit" class="mr-2 xs:mr-4">
                    <x-svgs.search-button />
                </button>

                <input type="text" value="{{ request('search') }}" name="search"
                    placeholder="{{ __('landing.country-search') }}"
                    class="outline-none border-none focus:outline-none text-zinc-550 text-sm leading-[17px] placeholder:text-sm placeholder:leading-[17px] xs:w-52">

                <input type="text" name="lang" value="{{ app()->getLocale() }}" class="hidden">
            </form>
        </div>
        <div class="mt-6 xs:mt-10 bg-neutral-150 py-5 pl-4 xs:mx-[108px] xs:rounded-t-lg">
            <div class="xs:pl-6 grid grid-cols-4 xs:grid-cols-6">
                <a href="{{ route('sort') }}?sort=name&order={{ (request('sort') === 'name') & (request('order') === 'asc') ? 'desc' : 'asc' }}&lang={{ app()->getLocale() }}&search={{ request('search') }}""
                    class="flex items-center gap-2 text-black-150 font-semibold text-sm leading-[17px] pr-4 break-words">
                    <span class="w-[74px] break-words xs:w-fit">{{ __('landing.location') }}</span>

                    <div class="flex flex-col gap-[1px]">
                        <x-svgs.up-arrow :fill="(request('sort') === 'name') & (request('order') === 'desc') ? 'true' : 'false'" />
                        <x-svgs.down-arrow :fill="(request('sort') === 'name') & (request('order') === 'asc') ? 'true' : 'false'" />

                    </div>
                </a>
                <a href="{{ route('sort') }}?sort=confirmed&order={{ (request('sort') === 'confirmed') & (request('order') === 'asc') ? 'desc' : 'asc' }}&lang={{ app()->getLocale() }}&search={{ request('search') }}""
                    class="flex items-center gap-2 text-black-150 font-semibold text-sm leading-[17px] pr-4 break-words">
                    <span class="w-[74px] break-words xs:w-fit"> {{ __('landing.new-cases') }}
                    </span>
                    <div class="flex flex-col gap-[1px]">
                        <x-svgs.up-arrow :fill="(request('sort') === 'confirmed') & (request('order') === 'desc') ? 'true' : 'false'" />
                        <x-svgs.down-arrow :fill="(request('sort') === 'confirmed') & (request('order') === 'asc') ? 'true' : 'false'" />

                    </div>
                </a>
                <a href="{{ route('sort') }}?sort=deaths&order={{ (request('sort') === 'deaths') & (request('order') === 'asc') ? 'desc' : 'asc' }}&lang={{ app()->getLocale() }}&search={{ request('search') }}""
                    class="flex items-center gap-2 text-black-150 font-semibold text-sm leading-[17px] pr-4 break-words">
                    <span class="w-[74px] break-words xs:w-fit"> {{ __('landing.death') }}
                    </span>
                    <div class="flex flex-col gap-[1px]">
                        <x-svgs.up-arrow :fill="(request('sort') === 'deaths') & (request('order') === 'desc') ? 'true' : 'false'" />
                        <x-svgs.down-arrow :fill="(request('sort') === 'deaths') & (request('order') === 'asc') ? 'true' : 'false'" />

                    </div>
                </a>
                <a href="{{ route('sort') }}?sort=recovered&order={{ (request('sort') === 'recovered') & (request('order') === 'asc') ? 'desc' : 'asc' }}&lang={{ app()->getLocale() }}&search={{ request('search') }}""
                    class="flex items-center gap-2 text-black-150 font-semibold text-sm leading-[17px] pr-4 break-words">
                    <span class="w-[74px] break-words xs:w-fit"> {{ __('landing.recovered') }}
                    </span>
                    <div class="flex flex-col gap-[1px]">
                        <x-svgs.up-arrow :fill="(request('sort') === 'recovered') & (request('order') === 'desc') ? 'true' : 'false'" />
                        <x-svgs.down-arrow :fill="(request('sort') === 'recovered') & (request('order') === 'asc') ? 'true' : 'false'" />

                    </div>
                </a>
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

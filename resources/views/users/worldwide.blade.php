<x-layout>
    <x-slot name='content'>

        <x-navbar :route="route('worldwide')" />


        <div class="pl-4 pt-6 xs:px-[108px] xs:pt-10">
            <h1 class="font-black text-xl xs:text-2xl xs:leading-[30px] leading-6 text-black-150 mb-6 xs:mb-10">
                {{ __('landing.worldwide-stats') }}
            </h1>

            <div class="flex justify-start gap-6 items-center">
                <a href="{{ route('worldwide') }}?lang={{ app()->getLocale() }}"
                    class="font-bold text-sm xs:text-base xs:leading-8.5 leading-[17px] text-black-150 pb-4 border-b-[3px] border-black-150">{{ __('landing.worldwide') }}</a>
                <a href="{{ route('by-country') }}?lang={{ app()->getLocale() }}"
                    class="font-bold text-sm leading-[17px] xs:text-base xs:leading-8.5 text-black-150 pb-[19px]">{{ __('landing.by-country') }}</a>
            </div>


            <div class="flex justify-center items-center flex-wrap xs:flex-auto gap-4 xs:gap-6 pt-10">
                <div
                    class="w-[343px] flex flex-col justify-center items-center  shadow-box h-[193px] xs:w-[392px] xs:h-[255px] bg-blue-750 bg-opacity-[0.08] rounded-2xl">



                    <x-svgs.diagram-blue />

                    <h1 class="text-black-150 py-4 xs:pt-6 xs:text-xl xs:leading-6 font-base leading-8.5 font-medium">
                        {{ __('landing.new-cases') }}</h1>
                    <h1 class="font-black xs:text-[39px] xs:leading-[47px] text-2xl leading-[30px] text-blue-750">0</h1>
                </div>
                <div
                    class="w-[163px] flex flex-col justify-center items-center shadow-box h-[193px] xs:w-[392px] xs:h-[255px] bg-green-550 bg-opacity-[0.08] rounded-2xl">
                    <x-svgs.diagram-green />

                    <h1 class="text-black-150 py-4 xs:pt-6 xs:text-xl xs:leading-6 font-base leading-8.5 font-medium">
                        {{ __('landing.recovered') }}
                    </h1>
                    <h1 class="font-black xs:text-[39px] xs:leading-[47px] text-2xl leading-[30px] text-green-550">0
                    </h1>
                </div>
                <div
                    class="w-[163px] flex flex-col justify-center items-center shadow-box h-[193px] xs:w-[392px] xs:h-[255px] bg-yellow-450 bg-opacity-[0.08] rounded-2xl">
                    <x-svgs.diagram-yellow />

                    <h1 class="text-black-150 py-4 xs:pt-6 xs:text-xl xs:leading-6 font-base leading-8.5 font-medium">
                        {{ __('landing.death') }}
                    </h1>
                    <h1 class="font-black xs:text-[39px] xs:leading-[47px] text-2xl leading-[30px] text-yellow-450">0
                    </h1>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>

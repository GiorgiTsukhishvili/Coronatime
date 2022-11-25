<x-layout>
    <x-slot name='content'>



        <div class="flex flex-col items-start xs:items-center mt-6 xs:m-10 ml-4 ">
            <x-svgs.logo />




        </div>

        <div class="flex flex-col justify-center items-center gap-4"
            style="position: absolute; top: 50%; left:50%; transform: translate(-50%, -50%)">
            <img src="{{ asset('imgs/check.png') }}" alt="check">
            <h1 class="text-center font-normal xs:text-lg xs:leading-[22px] text-base leading-8.5 text-black-150">
                {{ __('email.account-verified') }}
            </h1>
            <a href="{{ route('login', ['lang' => app()->getLocale()]) }}"
                class="bg-green-550 text-center mt-6 py-[15px] rounded-lg w-full uppercase text-sm leading-[17px] font-bold text-white xs:text-base xs:leading-8.5">

                {{ __('email.sign-in') }}
            </a>
        </div>
    </x-slot>
</x-layout>

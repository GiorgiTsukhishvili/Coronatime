<x-layout>
    <x-slot name='content'>



        <div class="flex flex-col items-start xs:items-center mt-6 xs:m-10 ml-4 ">
            <x-svgs.logo />




        </div>

        <div class="flex flex-col justify-center items-center gap-4"
            style="position: absolute; top: 50%; left:50%; transform: translate(-50%, -50%)">
            <img src="{{ asset('imgs/check.png') }}" alt="check">
            <h1 class="text-center font-normal xs:text-lg xs:leading-[22px] text-base leading-8.5 text-black-150">
                {{ __('login.email-sent') }}
            </h1>
        </div>
    </x-slot>
</x-layout>

<x-layout>
    <x-slot name='content'>

        <div class="w-full pt-6 pl-4 xs:flex xs:flex-col xs:justify-center xs:items-center">

            <x-svgs.logo />


            <h1
                class="my-10 xs:mt-36 xs:mb-14 xs:text-[25px] xs:leading-[30px] text-center text-black-150 text-xl leading-6 font-black">
                {{ __('reset.reset') }}
            </h1>


            <form method="POST" action="#" class="xs:flex xs:flex-col ">
                @csrf

                <label for="email"
                    class=" pt-6 font-bold text-sm leading-4 xs:leading-8.5 xs:text-base text-black-150">{{ __('reset.email') }}</label>
                <input required type="email" name="email" id="email" placeholder="{{ __('reset.email-input') }}"
                    class="mb-[337px] xs:mb-14  mt-2 border border-neutral-250 rounded-lg py-[18px] px-6 xs:w-[392px] w-[343px] placeholder-zinc-550 placeholder:leading-8.5 placeholder:font-normal">


                <x-form.button :text="__('reset.sign-up')" />

            </form>
        </div>


    </x-slot>
</x-layout>

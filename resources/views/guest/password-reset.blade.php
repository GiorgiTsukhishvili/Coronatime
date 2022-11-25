<x-layout>
    <x-slot name='content'>

        <div class="absolute top-6 left-60 xs:left-[900px] xs:top-10">
            <x-language :route="route('reset')" />

        </div>

        <div class="w-full pt-6 pl-4 xs:flex xs:flex-col xs:justify-center xs:items-center">

            <x-svgs.logo />


            <h1
                class="my-10 xs:mt-36 xs:mb-14 xs:text-[25px] xs:leading-[30px] text-center text-black-150 text-xl leading-6 font-black">
                {{ __('reset.reset') }}
            </h1>


            <form method="POST" action="{{ route('post-password-reset', ['lang' => app()->getLocale()]) }}"
                class="xs:flex xs:flex-col ">
                @csrf
                <div class="pt-6 relative ">

                    <label for="email"
                        class=" pt-6 block font-bold text-sm leading-4 xs:leading-8.5 xs:text-base text-black-150">{{ __('reset.email') }}</label>
                    <input required type="email" name="email" id="email"
                        placeholder="{{ __('reset.email-input') }}"
                        class="focus:shadow-focus-box {{ $errors->has('email') ? 'border-error' : 'border-neutral-250' }} focus:border focus:outline-none focus:border-blue-750   mt-2 border border-neutral-250 rounded-lg py-[18px] px-6 xs:w-[392px] w-[343px] placeholder-zinc-550 placeholder:leading-8.5 placeholder:font-normal">
                    <div class="absolute right-8 xs:right-4 top-[92px] hidden">
                        <x-svgs.green-circle />
                    </div>

                    @error('email')
                        <p class="flex items-center mt-2.5 gap-2 text-sm font-normal leading-[17px] text-error">
                            <x-svgs.error-circle /> {{ __('reset.invalid-email') }}
                        </p>
                    @enderror

                </div>

                <div class="mt-[337px] xs:mt-14">
                    <x-form.button :text="__('reset.sign-up')" />
                </div>
            </form>
        </div>


    </x-slot>
</x-layout>

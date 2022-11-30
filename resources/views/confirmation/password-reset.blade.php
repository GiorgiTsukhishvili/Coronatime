<x-layout>
    <x-slot name='content'>


        <div class="w-full pt-6 pl-4 xs:flex xs:flex-col xs:justify-center xs:items-center">

            <x-svgs.logo />


            <h1
                class="my-10 xs:mt-36 xs:mb-14 xs:text-[25px] xs:leading-[30px] text-center text-black-150 text-xl leading-6 font-black">
                {{ __('reset.reset') }}
            </h1>


            <form method="POST"
                action="{{ route('new-password.post', ['lang' => app()->getLocale(), 'token' => $token]) }}"
                class="xs:flex xs:flex-col ">
                @csrf
                <div class="pt-6 relative xs:flex xs:flex-col">
                    <label for="password"
                        class="font-bold text-sm leading-4 xs:leading-8.5 xs:text-base text-black-150">{{ __('reset.new-password') }}</label>
                    <input required type="password" name="password" id="password"
                        placeholder="{{ __('reset.enter-new') }}"
                        class="focus:shadow-focus-box focus:border focus:outline-none focus:border-blue-750 mt-2 border {{ $errors->has('password') ? 'border-error' : 'border-neutral-250' }} rounded-lg py-[18px] px-6 xs:w-[392px] w-[343px] placeholder-zinc-550 placeholder:leading-8.5 placeholder:font-normal">

                    <div class="absolute right-8 bottom-5 hidden">
                        <x-svgs.green-circle />
                    </div>
                </div>

                @error('password')
                    <p class="flex w-[392px] items-center mt-2.5 gap-2 text-sm font-normal leading-[17px] text-error">
                        <x-svgs.error-circle /> {{ __('register.password') }}
                    </p>
                @enderror

                <div class="pt-6 relative xs:flex xs:flex-col">
                    <label for="password_confirmation"
                        class="font-bold text-sm leading-4 xs:leading-8.5 xs:text-base text-black-150">{{ __('register.password_confirmation') }}</label>
                    <input required type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="{{ __('register.password_confirmation') }}"
                        class="focus:shadow-focus-box focus:border focus:outline-none focus:border-blue-750 mt-2 border {{ $errors->has('password') ? 'border-error' : 'border-neutral-250' }} rounded-lg py-[18px] px-6 xs:w-[392px] w-[343px] placeholder-zinc-550 placeholder:leading-8.5 placeholder:font-normal">

                    <div class="absolute right-8 bottom-5 hidden">
                        <x-svgs.green-circle />
                    </div>
                </div>
        </div>

        <div class="mt-[337px] xs:mt-14 w-[343px] mx-auto xs:w-[392px]">
            <x-form.button :text="__('reset.save-changes')" />
        </div>
        </form>
        </div>


    </x-slot>
</x-layout>

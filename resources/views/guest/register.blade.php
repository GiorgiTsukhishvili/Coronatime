<x-layout>
    <x-slot name='content'>
        <div class="absolute top-6 left-60 xs:left-96 xs:top-10">
            <x-language :route="route('register')" />

        </div>

        <div class="flex justify-between">

            <div class="xs:pt-[40px] xs:pl-[108px] pt-6 pl-4">


                <x-svgs.logo />

                <h1
                    class='font-black xs:text-2xl xs:leadin-[30px] text-xl leading-6 pt-10 
                xs:pt-14 text-black-150'>
                    {{ __('register.welcome') }}</h1>

                <h1 class="font-normal xs:text-xl xs:leading-6 xs:pt-4 pt-2 text-base leading-5 text-zinc-550">
                    {{ __('register.welcome-two') }}</h1>


                <form method="POST" action="{{ route('post-register') }}?lang={{ app()->getlocale() }}"
                    class="flex flex-col xs:max-w-[392px] max-w-[343px]">
                    @csrf

                    <div class="pt-6 relative">
                        <label for="username"
                            class=" font-bold text-sm leading-4 xs:leading-8.5 xs:text-base text-black-150">{{ __('login.username') }}</label>
                        <input required type="text" name="username" id="username"
                            placeholder="{{ __('register.username-input') }}" value="{{ old('username') }}"
                            class="focus:shadow-focus-box focus:border focus:outline-none focus:border-blue-750 mt-2 border {{ $errors->has('username') ? 'border-error' : 'border-neutral-250' }} rounded-lg py-[18px] px-6 xs:w-[392px] w-[343px] placeholder-zinc-550 placeholder:leading-8.5 placeholder:font-normal">

                        <div class="absolute right-4 bottom-5 hidden">
                            <x-svgs.green-circle />
                        </div>
                    </div>

                    @error('username')
                        <p class="flex items-center mt-2.5 gap-2 text-sm font-normal leading-[17px] text-error">
                            <x-svgs.error-circle /> {{ __('register.username') }}
                        </p>
                    @enderror

                    <div class="pt-6 relative">
                        <label for="email"
                            class="font-bold text-sm leading-4 xs:leading-8.5 xs:text-base text-black-150">{{ __('register.email') }}</label>
                        <input required type="text" name="email" id="email"
                            placeholder="{{ __('register.email-input') }}" value="{{ old('email') }}"
                            class="focus:shadow-focus-box focus:border focus:outline-none focus:border-blue-750 mt-2 border {{ $errors->has('email') ? 'border-error' : 'border-neutral-250' }} rounded-lg py-[18px] px-6 xs:w-[392px] w-[343px] placeholder-zinc-550 placeholder:leading-8.5 placeholder:font-normal">
                        <div class="absolute right-4 bottom-5 hidden">
                            <x-svgs.green-circle />
                        </div>
                    </div>

                    @error('email')
                        <p class="flex items-center mt-2.5 gap-2 text-sm font-normal leading-[17px] text-error">
                            <x-svgs.error-circle /> {{ __('register.email-input') }}
                        </p>
                    @enderror

                    <div class="pt-6 relative">
                        <label for="password"
                            class="font-bold text-sm leading-4 xs:leading-8.5 xs:text-base text-black-150">{{ __('login.password') }}</label>
                        <input required type="password" name="password" id="password"
                            placeholder="{{ __('login.password-input') }}"
                            class="focus:shadow-focus-box focus:border focus:outline-none focus:border-blue-750 mt-2 border {{ $errors->has('password') ? 'border-error' : 'border-neutral-250' }} rounded-lg py-[18px] px-6 xs:w-[392px] w-[343px] placeholder-zinc-550 placeholder:leading-8.5 placeholder:font-normal">

                        <div class="absolute right-4 bottom-5 hidden">
                            <x-svgs.green-circle />
                        </div>
                    </div>

                    @error('password')
                        <p class="flex items-center mt-2.5 gap-2 text-sm font-normal leading-[17px] text-error">
                            <x-svgs.error-circle /> {{ __('register.password') }}
                        </p>
                    @enderror

                    <div class="pt-6 relative">
                        <label for="password_confirmation"
                            class="font-bold text-sm leading-4 xs:leading-8.5 xs:text-base text-black-150">{{ __('register.password_confirmation') }}</label>
                        <input required type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="{{ __('register.password_confirmation') }}"
                            class="focus:shadow-focus-box focus:border focus:outline-none focus:border-blue-750 mt-2 border {{ $errors->has('password') ? 'border-error' : 'border-neutral-250' }} rounded-lg py-[18px] px-6 xs:w-[392px] w-[343px] placeholder-zinc-550 placeholder:leading-8.5 placeholder:font-normal">

                        <div class="absolute right-4 bottom-5 hidden">
                            <x-svgs.green-circle />
                        </div>
                    </div>

                    <x-form.button :text="__('reset.sign-up')" />

                    <div class="text-center mt-6 flex items-center justify-center">
                        <h1 class="xs:text-base xs:leading-8.5 text-sm leading-[17px] text-zinc-550 font-normal">
                            {{ __('register.have-account') }} <a
                                href="{{ route('login') }}?lang={{ app()->getLocale() }}"
                                class="text-black-150 font-black">{{ __('login.login') }}</a></h1>
                    </div>
                </form>



            </div>
            <img src="{{ asset('imgs/covid-photo.png') }}" alt="Covid"
                class="xs:inline hidden h-screen w-[600px] object-cover">
        </div>

    </x-slot>
</x-layout>

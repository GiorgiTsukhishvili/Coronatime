<x-layout>
    <x-slot name='content'>


        <div class="flex md:justify-between justify-center">

            <div class="md:pt-10 md:pl-[108px] pt-6 pl-4">

                <div class="flex">


                    <x-svgs.logo />
                    <x-language :route="route('login')" />

                </div>
                <h1
                    class='font-black md:text-2xl md:leadin-[30px] text-xl leading-6 pt-10 
                md:pt-14 text-black-150'>
                    {{ __('login.welcome') }}</h1>

                <h1 class="font-normal md:text-xl md:leading-6 md:pt-4 pt-2 text-base leading-5 text-zinc-550">
                    {{ __('login.welcome-two') }}</h1>


                <form method="POST" action="{{ route('login') }}?lang={{ app()->getLocale() }}"
                    class="flex flex-col md:max-w-[392px] max-w-[343px]">
                    @csrf

                    <div class="pt-6 relative">
                        <label for="login"
                            class=" font-bold text-sm leading-4 md:leading-8.5 md:text-base text-black-150">{{ __('login.username') }}</label>
                        <input required type="text" name="login" id="login" minlength="3"
                            placeholder="{{ __('login.username-input') }}" value="{{ old('login') }}"
                            class="focus:shadow-focus-box focus:border focus:outline-none focus:border-blue-750       mt-2 border {{ $errors->any() ? 'border-error' : 'border-neutral-250' }} rounded-lg py-[18px] px-6 md:w-[392px] w-full placeholder-zinc-550 placeholder:leading-8.5 placeholder:font-normal">

                        <div class="absolute right-4 bottom-5 hidden">
                            <x-svgs.green-circle />
                        </div>
                    </div>

                    @if ($errors->any())
                        <p class="flex items-center mt-2.5 gap-2 text-sm font-normal leading-[17px] text-error">
                            <x-svgs.error-circle /> {{ __('login.login-error') }}
                        </p>
                    @endif



                    <div class="pt-6 relative">
                        <label for="password"
                            class=" font-bold text-sm leading-4 md:leading-8.5 md:text-base text-black-150">{{ __('login.password') }}</label>
                        <input required type="password" name="password" id="password" minlength="3"
                            placeholder="{{ __('login.password-input') }}"
                            class=" focus:shadow-focus-box focus:border focus:outline-none focus:border-blue-750 mt-2 border {{ $errors->any() ? 'border-error' : 'border-neutral-250' }} rounded-lg py-[18px] px-6 md:w-[392px] w-full placeholder-zinc-550 placeholder:leading-8.5 placeholder:font-normal">
                        <div class="absolute right-4 bottom-5 hidden">
                            <x-svgs.green-circle />
                        </div>
                    </div>
                    <div class="flex justify-between mt-6">



                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox" value="1"
                                class="w-4 h-4 text-green-650 bg-gray-100 rounded border-neutral-250 focus:ring-green-500 dark:focus:ring-green-650 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-650">
                            <label for="remember"
                                class="ml-2 text-sm font-semibold text-black-150">{{ __('login.remember') }}</label>
                        </div>

                        <a href="{{ route('reset') }}?lang={{ app()->getLocale() }}"
                            class="text-blue-750 text-sm leading-[17px] font-semibold">{{ __('login.forgot') }}</a>
                    </div>

                    <x-form.button :text="__('login.login')" />
                    <div class="text-center mt-6 flex items-center justify-center">
                        <h1 class="md:text-base md:leading-8.5 text-sm leading-[17px] text-zinc-550 font-normal">
                            {{ __('login.register') }} <a
                                href="{{ route('register') }}?lang={{ app()->getLocale() }}"
                                class="text-black-150 font-black">{{ __('login.register-link') }}</a></h1>
                    </div>
                </form>



            </div>
            <img src="{{ asset('imgs/covid-photo.png') }}" alt="Covid"
                class="md:inline hidden h-screen w-[600px] object-cover">
        </div>

    </x-slot>
</x-layout>

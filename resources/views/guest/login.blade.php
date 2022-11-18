<x-layout>
    <x-slot name='content'>


        <div class="flex justify-between">

            <div class="xs:pt-[40px] xs:pl-[108px] pt-6 pl-4">


                <x-svgs.logo />

                <h1
                    class='font-black xs:text-2xl xs:leadin-[30px] text-xl leading-6 pt-10 
                xs:pt-14 text-black-150'>
                    {{ __('login.welcome') }}</h1>

                <h1 class="font-normal xs:text-xl xs:leading-6 xs:pt-4 pt-2 text-base leading-5 text-zinc-550">
                    {{ __('login.welcome-two') }}</h1>


                <form method="POST" action="#" class="flex flex-col xs:max-w-[392px] max-w-[343px]">
                    @csrf

                    <label for="username"
                        class="pt-6 font-bold text-sm leading-4 xs:leading-8.5 xs:text-base text-black-150">{{ __('login.username') }}</label>
                    <input required type="text" name="username" id="username"
                        placeholder="{{ __('login.username-input') }}"
                        class="mt-2 border border-neutral-250 rounded-lg py-[18px] px-6 xs:w-[392px] w-[343px] placeholder-zinc-550 placeholder:leading-8.5 placeholder:font-normal">

                    <label for="password"
                        class="pt-6 font-bold text-sm leading-4 xs:leading-8.5 xs:text-base text-black-150">{{ __('login.password') }}</label>
                    <input required type="password" name="password" id="password"
                        placeholder="{{ __('login.password-input') }}"
                        class="mt-2 border border-neutral-250 rounded-lg py-[18px] px-6 xs:w-[392px] w-[343px] placeholder-zinc-550 placeholder:leading-8.5 placeholder:font-normal">


                    <div class="flex justify-between mt-6">



                        <div class="flex items-center">
                            <input id="remember" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-neutral-250 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="remember"
                                class="ml-2 text-sm font-semibold text-black-150">{{ __('login.remember') }}</label>
                        </div>

                        <a href="{{ route('reset') }}"
                            class="text-blue-750 text-sm leading-[17px] font-semibold">{{ __('login.forgot') }}</a>
                    </div>

                    <x-form.button :text="__('login.login')" />
                </form>

                <div class="text-center mt-6 flex items-center justify-center">
                    <h1 class="xs:text-base xs:leading-8.5 text-sm leading-[17px] text-zinc-550 font-normal">
                        {{ __('login.register') }} <a href="#"
                            class="text-black-150 font-black">{{ __('login.register-link') }}</a></h1>
                </div>

            </div>
            <img src="{{ asset('imgs/covid-photo.png') }}" alt="Covid" class="xs:inline hidden">
        </div>

    </x-slot>
</x-layout>

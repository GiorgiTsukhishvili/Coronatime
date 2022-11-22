@props(['route'])


<div class="pl-4 pr-[29px] xs:px-[108px] flex justify-between items-center border-b border-neutral-250 h-20 w-full">
    <x-svgs.logo />





    <div class="flex justify-center items-center  xs:gap-40px">

        <x-language :route="$route" />


        <div class="xs:hidden  flex justify-center">
            <div x-data="{
                open: false,
                toggle() {
                    if (this.open) {
                        return this.close()
                    }
            
                    this.$refs.button.focus()
            
                    this.open = true
                },
                close(focusAfter) {
                    if (!this.open) return
            
                    this.open = false
            
                    focusAfter && focusAfter.focus()
                }
            }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
                class="relative">
                <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                    :aria-controls="$id('dropdown-button')" type="button"
                    class="flex items-center gap-2 bg-white  xs:px-5 py-2.5 rounded-md font-normal text-base text-black-150 leading-8.5">

                    <x-svgs.burger />


                </button>


                <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
                    :id="$id('dropdown-button')" style="display: none;"
                    class="absolute left-[-55px] mt-2 w-24 rounded-md bg-white shadow-md flex flex-col justify-center items-center">
                    <h1 class="text-black-150 py-2 font-bold leading-8.5 text-base">{{ auth()->user()->username }}</h1>

                    <a href="{{ route('logout') }}?lang={{ app()->getLocale() }}"
                        class="text-black-150 py-2 font-bold leading-8.5 text-base">{{ __('landing.log-out') }}</a>


                </div>
            </div>
        </div>

        <div class="hidden xs:flex xs:items-center">

            <h1 class="text-black-150 pr-4 font-bold leading-8.5 text-base">{{ auth()->user()->username }}</h1>

            <a href="{{ route('logout') }}?lang={{ app()->getLocale() }}"
                class="text-black-150 font-medium text-sm leading-[17px] pl-4 py-2 border-l border-neutral-250">{{ __('landing.log-out') }}</a>

        </div>

    </div>


</div>

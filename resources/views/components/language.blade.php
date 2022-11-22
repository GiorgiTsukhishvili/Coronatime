@props(['route'])

<div class="flex justify-center">
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
        x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']" class="relative">
        <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
            type="button"
            class="flex items-center gap-2 bg-white px-5 py-2.5 rounded-md font-normal text-base text-black-150 leading-8.5">
            {{ app()->getLocale() === 'en' ? __('language.english') : __('language.georgian') }}

            <x-svgs.dropdown-arrow />

        </button>


        <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
            :id="$id('dropdown-button')" style="display: none;"
            class="absolute left-0 mt-2 w-32 rounded-md bg-white shadow-md">
            <a href="{{ $route }}{{ (str_contains($route, 'search') ? '&lang=en' : str_contains($route, 'sort')) ? '&lang=en' : '?lang=en' }}"
                class="font-normal text-base text-black-150 leading-8.5 flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left  hover:bg-gray-50 disabled:text-gray-500">
                {{ __('language.english') }}
            </a>

            <a href="{{ $route }}{{ (str_contains($route, 'search') ? '&lang=ka' : str_contains($route, 'sort')) ? '&lang=ka' : '?lang=ka' }}"
                class="font-normal text-base text-black-150 leading-8.5 flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left  hover:bg-gray-50 disabled:text-gray-500">
                {{ __('language.georgian') }}
            </a>


        </div>
    </div>
</div>

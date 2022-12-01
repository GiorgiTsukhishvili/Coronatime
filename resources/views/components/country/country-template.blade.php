@props(['country'])

<div class="md:pl-10 grid grid-cols-4 md:grid-cols-6 py-4 border-b border-neutral-150">
    <h1 class=" text-black-150 font-normal text-sm leading-[17px] pr-4 break-words">
        {{ $country->name }}
    </h1>
    <h1 class=" text-black-150 font-normal text-sm leading-[17px] pr-4 break-words">
        {{ $country->confirmed }}
    </h1>
    <h1 class=" text-black-150 font-normal text-sm leading-[17px] pr-4 break-words">
        {{ $country->deaths }}
    </h1>
    <h1 class=" text-black-150 font-normal text-sm leading-[17px] pr-4 break-words">
        {{ $country->recovered }}
    </h1>
</div>

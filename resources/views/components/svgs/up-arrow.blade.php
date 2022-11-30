@props(['fill'])

<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z" class="{{ $fill === 'false' ? 'fill-gray-arrow' : 'fill-dark-arrow' }}"
        fill="none" />
</svg>

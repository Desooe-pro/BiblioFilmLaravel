@props(['active' => false])

<li><a {{ $attributes->class(["text-gray-100", 'hover:text-gray-400', 'font-bold' => $active]) }}>{{ $slot }}</a></li>

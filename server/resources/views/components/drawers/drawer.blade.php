@php
    $links = [
        [
            'name' => 'Dashboard',
            'url' => '/dashboard',
            'icon' => 'dashboard',
        ],
        [
            'name' => 'Sales',
            'url' => '/sales',
            'icon' => 'insights',
        ],
        [
            'name' => 'Settings',
            'url' => '/settings',
            'icon' => 'settings',
        ],
    ];
@endphp

<div class="flex">

    <ul class="w-full py-2 pr-2">

        @foreach ($links as $link)
            <li>
                <a class="flex items-center py-2 px-2 justify-start hover:bg-gray-100 rounded-tr-full rounded-br-full"
                    href="{{ url($link['url']) }}">
                    <span class="material-icons text-2xl mr-2 text-gray-600">
                        {{ $link['icon'] }}
                    </span>

                    <span class="text-gray-900 font-medium">
                        {{ $link['name'] }}
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
</div>

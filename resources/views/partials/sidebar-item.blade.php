@if ($item['type'] === 'header')
    <li class="nav-header">{{ __('admlte::' . $item['text'], [], 'admlte') }}</li>
@elseif ($item['type'] === 'link')
    <li class="nav-item {{ isset($item['submenu']) ? 'has-treeview' : '' }}">
        <a href="{{ $item['route'] ? route($item['route']) : '#' }}"
            class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}"
            @if (config('admlte.livewire')) wire:navigate @endif>
            <i class="nav-icon {{ $item['icon'] }}"></i>
            <p>
                {{ __('admlte::' . $item['text']) }}
                @if (isset($item['submenu']))
                    <i class="nav-arrow fas fa-chevron-right"></i>
                @endif
            </p>
        </a>
        @if (isset($item['submenu']))
            <ul class="nav nav-treeview">
                @foreach ($item['submenu'] as $subItem)
                    <li class="nav-item">
                        <a href="{{ $subItem['route'] ? route($subItem['route']) : '#' }}"
                            class="nav-link {{ request()->routeIs($subItem['route']) ? 'active' : '' }}"
                            @if (config('admlte.livewire')) wire:navigate @endif>
                            <i class="nav-icon {{ $subItem['icon'] }}"></i>
                            <p>{{ __('admlte::' . $subItem['text']) }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </li>
@endif

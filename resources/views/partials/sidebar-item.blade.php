@if (isset($item['type']) && $item['type'] === 'header')
    <li class="nav-header">{{ __('admlte::' . $item['text'], [], 'admlte') }}</li>
@else
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
                    @if (empty($subItem['permission']))
                        @include('admlte::partials.sidebar-item', ['item' => $subItem])
                    @else
                        @if (config('admlte.permission_system') === 'laratrust')
                            @if (\Laratrust::hasPermission($subItem['permission']))
                                @include('admlte::partials.sidebar-item', ['item' => $subItem])
                            @endif
                        @else
                            @if (Gate::allows($subItem['permission']))
                                @include('admlte::partials.sidebar-item', ['item' => $subItem])
                            @endif
                        @endif
                    @endif
                @endforeach
            </ul>
        @endif
    </li>
@endif

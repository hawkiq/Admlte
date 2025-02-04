@if (isset($item['type']) && $item['type'] === 'header')
    <li class="nav-header">{{ admlte_translate($item['text']) }}</li>
@else
    <li class="nav-item {{ isset($item['submenu']) ? 'has-treeview' : '' }}">
        <a href="{{ $item['url'] ?? (isset($item['route']) ? route($item['route']) : '#') }}"
            @isset($item['target']) target="{{ $item['target'] }}"@endisset
            class="nav-link {{ isset($item['route']) && request()->routeIs($item['route']) ? 'active' : '' }}"
            @if (config('admlte.livewire')) wire:navigate @endif>
            <i class="nav-icon {{ $item['icon'] }}"></i>
            <p>
                {{ admlte_translate($item['text']) }}
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

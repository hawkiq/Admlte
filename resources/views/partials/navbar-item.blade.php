<li
    class="nav-item d-none d-md-block @isset($item['class']){{ $item['class'] }}@endisset @isset($item['submenu']) dropdown @endisset">
    <a @isset($item['submenu'])data-bs-toggle="dropdown"@endisset
        href="{{ $item['url'] ?? (isset($item['route']) ? route($item['route']) : '#') }}"
        @isset($item['target']) target="{{ $item['target'] }}"@endisset class="nav-link">
        @isset($item['icon'])
            <i class="fas fa-fw {{ $item['icon'] }} {{ isset($item['icon_color']) ? $item['icon_color'] : '' }}"></i>
            {{ __('admlte::' . $item['text'], [], 'admlte') }}
            @endisset @isset($item['label'])
            <span
                class="badge rounded-pill {{ isset($item['label_color']) ? $item['label_color'] : 'text-bg-danger' }}">{{ $item['label'] }}</span>
        @endisset
    </a>
    @if (isset($item['submenu']) && count($item['submenu']) > 0)
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-start">
            @foreach ($item['submenu'] as $subItem)
                @if (isset($subItem['type']) && $subItem['type'] === 'seperator')
                    <div class="dropdown-divider"></div>
                @else
                    <a href="{{ $subItem['url'] ?? (isset($subItem['route']) ? route($subItem['route']) : '#') }}"
                        class="dropdown-item">
                        <i
                            class="fas me-2 {{ isset($subItem['icon']) ? $subItem['icon'] : '' }} {{ isset($subItem['icon_color']) ? $subItem['icon_color'] : '' }}"></i>
                        {{ __('admlte::' . $subItem['text']) }}
                        @isset($subItem['secondary_text'])
                            <span class="float-end text-secondary fs-7">{{ $subItem['secondary_text'] }}</span>
                        @endisset
                    </a>
                @endif
            @endforeach
        </div>
    @endif
</li>

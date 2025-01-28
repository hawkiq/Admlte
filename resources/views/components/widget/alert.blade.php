<div {{ $attributes->merge(['class' => $alertClasses()]) }} role="alert">

    {{-- Dismiss button --}}
    @isset($dismissable)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endisset

    {{-- Alert header --}}
    @if (!empty($title) || !empty($icon))
        <h5>
            @if (!empty($icon))
                <i class="icon {{ $icon }}"></i>
            @endif

            @if (!empty($title))
                {{ $title }}
            @endif
        </h5>
    @endif

    {{-- Alert content --}}
    {{ $slot }}

</div>

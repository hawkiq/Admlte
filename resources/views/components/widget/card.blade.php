<div {{ $attributes->merge(['class' => $cardClasses()]) }}>

    {{-- Card header --}}
    @if (!$isCardHeaderEmpty(isset($toolsSlot)))
        <div class="{{ $cardHeaderClass() }}">

            {{-- Title --}}
            <h3 class="{{ $cardTitleClasses() }}">
                @isset($icon)
                    <i class="{{ $icon }} mr-1"></i>
                @endisset
                @isset($title)
                    {{ $title }}
                @endisset
            </h3>

            {{-- Tools --}}
            <div class="card-tools">

                {{-- Extra tools slot --}}
                @isset($toolsSlot)
                    {{ $toolsSlot }}
                @endisset

                {{-- Default tools --}}
                @isset($maximizable)
                    <x-admlte-button theme="tool" data-lte-toggle="card-maximize" icon="fas fa-lg fa-expand" />
                @endisset

                @if ($collapsible === 'collapsed')
                    <x-admlte-button theme="tool" data-lte-toggle="card-collapse" data-lte-icon="fas fa-lg fa-plus"
                        icon="fas fa-lg fa-plus" />
                @elseif(isset($collapsible))
                    <x-admlte-button theme="tool" data-lte-toggle="card-collapse" data-lte-icon="fas fa-lg fa-minus"
                        icon="fas fa-lg fa-minus" />
                @endif

                @isset($removable)
                    <x-admlte-button theme="tool" data-lte-toggle="card-remove" icon="fas fa-lg fa-times" />
                @endisset

            </div>

        </div>
    @endif

    {{-- Card body --}}
    @if (!$slot->isEmpty())
        <div class="{{ $cardBodyClasses() }}">
            {{ $slot }}
        </div>
    @endif

    {{-- Card footer --}}
    @isset($footerSlot)
        <div class="{{ $cardFooterClasses() }}">
            {{ $footerSlot }}
        </div>
    @endisset

    {{-- Card overlay --}}
    {{-- @if ($disabled)
        <div class="overlay">
            <i class="fas fa-2x fa-ban text-gray"></i>
        </div>
    @endif --}}

</div>

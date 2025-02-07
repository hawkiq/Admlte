<li class="nav-item d-none d-md-block dropdown">
    <a data-bs-toggle="dropdown" href="#" class="nav-link">
        <i class="fas fa-fw fa-globe"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        @foreach (config('admlte.app_locals') as $language => $code)
            <a href="{{ route('admlte.change_language', $code) }}" class="dropdown-item">
                <i class="fas me-2"></i>
                {{ admlte_translate($language) }}
            </a>
        @endforeach
    </div>
</li>
